<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItemResource;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function show($id)
    {
        $order = new OrderItemResource(OrderItem::find($id));
        return response()->json(['status'=>'success','data'=>$order]);
    }

    public function store(Request $request, $orderId)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($orderId);
        $product = Product::findOrFail($request->product_id);

        if ($order->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }
        if ($order->status !== 'pending') {
            return response()->json(['status' => false, 'message' => 'Order can no longer be modified'], 422);
        }

        $item = OrderItem::where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            $item = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);
        }

        $order->total = $order->items->sum(fn($i) => $i->quantity * $i->price);
        $order->save();

        return response()->json(['status' => true, 'data' => $item], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item = OrderItem::findOrFail($id);
        $item->quantity = $request->quantity;
        $item->save();

        $order = $item->order;
        $order->total = $order->items->sum(fn($i) => $i->quantity * $i->price);
        $order->save();

        return response()->json(['status' => true, 'data' => $item], 200);
    }

    public function destroy($id)
    {
        $item = OrderItem::findOrFail($id);
        $order = $item->order;

        $item->delete();

        $order->total = $order->items->sum(fn($i) => $i->quantity * $i->price);
        $order->save();

        return response()->json(['status' => true, 'message' => 'Item removed'], 200);
    }
}
