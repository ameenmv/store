<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show($PaymentId){
        $payment = Payment::find($PaymentId);
        if (!$payment) {
            return response()->json([
                'status'  => false,
                'message' => 'Payment not found'
            ], 404);
        }
        return response()->json(['status'=>'success','data'=>$payment]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $order = Order::findOrFail($request->order_id);

        if ($order->user_id != Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        $paymentExists = Payment::where('order_id', $order->id)->first();
        if ($paymentExists) {
            return response()->json(['status' => false, 'message' => 'Payment already exists'], 400);
        }

        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $request->amount,
            'payment_method' => 'paypal',
            'status' => $request->status,
        ]);

        return response()->json(['status' => true, 'payment' => $payment],201);
    }
    public function update(Request $request, $PaymentId)
    {
        $payment = Payment::find($PaymentId);
        if($payment == null){
            return response()->json(['status' => 404, 'message' => 'Payment not found'], 404);
        }
        $request->validate([
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);
        $data = $request->only(['amount', 'status']);
        $data['payment_method'] = 'paypal';
        $payment->update($data);
        $payment->refresh();
        return response()->json(['status' => true, 'payment' => $payment],200);

    }
    public function destroy($PaymentId)
    {
        $payment = Payment::find($PaymentId);
        if($payment == null){
            return response()->json(['status' => 404, 'message' => 'Payment not found'], 404);
        }
        $payment->delete();
        return response()->json(['status' => true, 'message' => 'delete successfully'],200);
    }

}
