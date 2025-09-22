<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class RviewController extends Controller
{
    public function index()
    {
        $review = Review::all();
        return response()->json(['status' => 200, 'data' => $review]);
    }
    public function show($ReviewId)
    {
        $review = Review::find($ReviewId);
        if($review == null){
            return response()->json(['status' => 404, 'message' => 'Review not found'], 404);
        }
        return response()->json(['status' => 200, 'data' => $review]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($existingReview) {
            return response()->json([
                'status'  => false,
                'message' => 'You have already reviewed this product.'
            ], 422);
        }

        $review = Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return response()->json([
            'status' => true,
            'review' => $review
        ], 201);
    }
    public function update(Request $request, $reviewId)
    {
        $review = Review::find($reviewId);
        if($review == null){
            return response()->json(['status' => 404, 'message' => 'Review not found'], 404);
        }
        $request->validate([
            'rating'     => 'sometimes|integer|min:1|max:5',
            'comment'    => 'sometimes|string',
        ]);
        $data = $request->only(['rating', 'comment']);
        $review->update($data);
        $review->refresh();
        return response()->json(['status' => 200, 'data' => $review]);
    }
    public function destroy($reviewId)
    {
        $review = Review::find($reviewId);
        if($review == null){
            return response()->json(['status' => 404, 'message' => 'Review not found'], 404);
        }
        $review->delete();
        return response()->json(['status' => 200, 'message' => 'Review deleted successfully']);
    }
}
