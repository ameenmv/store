<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items')->get();
        return response()->json(['status' => true, 'data' => $orders], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'status'  => 'pending',
            'total'   => 0,
            'address' => $request->address,
        ]);

        return response()->json(['status' => true, 'data' => $order], 201);
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        return response()->json(['status' => true, 'data' => $order], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,shipped,delivered,canceled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return response()->json(['status' => true, 'data' => $order], 200);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['status' => true, 'message' => 'Order deleted'], 200);
    }

}
