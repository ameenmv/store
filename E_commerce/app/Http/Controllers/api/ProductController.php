<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
class ProductController extends Controller
{
    // show all product by anyone
    public function index()
    {
        $products = ProductResource::collection(Product::all());
        return response()->json(['status' => true, 'data' => $products]);
    }

    public function show($id)
    {
        if (Product::find($id) == null){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }
        $product = new ProductResource(Product::find($id));
        return response()->json(['status' => true, 'data' => $product]);
    }
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'company') {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized - Only companies can add products'
            ], 403);
        }
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|max:255',
           'description' => 'required|string',
           'price' => 'required',
           'stock' => 'required',
           'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
        $product = Product::create([
            'company_id'  => $request->company_id,
            'name' => $request->name,
            'description' => $request->description,
            'price'  => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $imagePath,

        ]);
        return response()->json(['status' => True , 'data' => $product],201);

    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product == null){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        $data = $request->only(['name','description','price','stock','category_id']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($data);
        $product->refresh();

        return response()->json(['status' => true, 'data' => $product]);
    }
      public function destroy($id)
      {
          $product = Product::find($id);
          if($product == null){
              return response()->json(['status' => false, 'message' => 'Product not found']);
          }
          $product->delete();
          return response()->json(['status' => true, 'message' => 'deleted successfully']);
      }
}
