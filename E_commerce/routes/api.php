<?php

use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\OrderItemController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\RviewController;
use App\Http\Controllers\api\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Controller the user doing (customer, company, admin)
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::post('/users',[UserController::class,'store']);
Route::put('/users/{id}',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'destroy']);

// Controller the Company you know company by user and company appreciates add product just
Route::middleware('auth:sanctum')->group(function(){
Route::get('/companies',[CompanyController::class,'index']);
Route::get('/companies/{id}',[CompanyController::class,'show']);
Route::post('/companies',[CompanyController::class,'store']);
Route::put('/companies/{id}',[CompanyController::class,'update']);
Route::delete('/companies/{id}',[CompanyController::class,'destroy']);
});

// this route not authentication Because appreciates anyone view page products
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);

// is route product authentication you know by Company and Admin
Route::middleware('auth:sanctum')->group(function(){
Route::post('/products',[ProductController::class,'store']);
Route::put('/products/{id}',[ProductController::class,'update']);
Route::delete('/products/{id}',[ProductController::class,'destroy']);
});

// page orders for the users
Route::middleware('auth:sanctum')->group(function(){
   Route::get('/orders',[OrderController::class,'index']);
   Route::get('/orders/{id}',[OrderController::class,'show']);
   Route::post('/orders',[OrderController::class,'store']);
   Route::put('/orders/{id}',[OrderController::class,'update']);
   Route::delete('/orders/{id}',[OrderController::class,'destroy']);

});

// details the orders
Route::middleware('auth:sanctum')->group(function(){
   Route::get('/orderItem',[OrderItemController::class,'index']);
   Route::get('/orderItem/{id}',[OrderItemController::class,'show']);
   Route::post('/orders/{orderId}/items', [OrderItemController::class, 'store']);
   Route::put('/orderItem/{id}',[OrderItemController::class,'update']);
   Route::delete('/orderItem/{id}',[OrderItemController::class,'destroy']);
});

// operation before order or use before order
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart', [CartController::class, 'Create']);
    Route::get('/cart/{cartId}', [CartController::class, 'show']);
    Route::post('/cart/{cartId}/items', [CartController::class, 'store']);
    Route::put('/cart/{cartId}/items/{itemId}', [CartController::class, 'update']);
    Route::delete('/cart/{cartId}/items/{itemId}', [CartController::class, 'destroy']);
});

// reviews product
Route::middleware('auth:sanctum')->group(callback: function () {
    Route::get('/reviews', [RviewController::class, 'index']);
    Route::get('/reviews/{ReviewId}', [RviewController::class, 'show']);
    Route::post('/reviews', [RviewController::class, 'store']);
    Route::put('/reviews/{ReviewId}', [RviewController::class, 'update']);
    Route::delete('/reviews/{ReviewId}', [RviewController::class, 'destroy']);
});

// operation payment
Route::middleware('auth:sanctum')->group(callback: function () {
    Route::get('/payment/{PaymentId}', [PaymentController::class, 'show']);
    Route::post('/payment', [PaymentController::class, 'store']);
    Route::put('/payment/{PaymentId}', [PaymentController::class, 'update']);
    Route::delete('/payment/{PaymentId}', [PaymentController::class, 'destroy']);
});

// login use (email, password, device_name => definition device user )
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
// link token
    return $user->createToken($request->device_name)->plainTextToken;

});
