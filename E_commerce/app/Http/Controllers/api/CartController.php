<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function show($cartId)
    {
        $cart = Cart::with('items.product')->findOrFail($cartId);

        if ($cart->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        return response()->json(['status' => true, 'data' => $cart], 200);
    }
    public function Create()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        return response()->json(['status' => true, 'data' => $cart], 200);
    }
    public function store(Request $request, $cartId)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($cartId);

        if ($cart->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        $product = Product::findOrFail($request->product_id);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            $item = CartItem::create([
                'cart_id'   => $cart->id,
                'product_id'=> $product->id,
                'quantity'  => $request->quantity,
                'price'     => $product->price,
            ]);
        }

        $total = CartItem::where('cart_id', $cart->id)
            ->sum(\DB::raw('quantity * price'));

        return response()->json([
            'status' => true,
            'data'   => $item,
            'total'  => $total
        ], 201);
    }
    public function update(Request $request, $cartId, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($cartId);

        if ($cart->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        $item = CartItem::where('cart_id', $cart->id)->findOrFail($itemId);
        $item->quantity = $request->quantity;
        $item->save();

        $total = CartItem::where('cart_id', $cart->id)
            ->sum(\DB::raw('quantity * price'));

        return response()->json(['status' => true, 'data' => $item ,'total'  => $total], 200);
    }
    public function destroy($cartId, $itemId)
    {
        $cart = Cart::findOrFail($cartId);

        if ($cart->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        $item = CartItem::where('cart_id', $cart->id)->findOrFail($itemId);
        $item->delete();

        $total = CartItem::where('cart_id', $cart->id)
            ->sum(\DB::raw('quantity * price'));

        return response()->json(['status' => true,'total'  => $total, 'message' => 'Item removed']);
    }


}
