<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /*
     * page users definition admin, customer and company
     * Admin control all users
     * company control product and create product and delete product
     * customer view product and use order cart
     */

    public function index()
    {
    // show all users
        $user = UserResource::collection(User::all());
        return response()->json(['status' => True , 'data' => $user]);

    }


    public function show($id)
    {
        // show one user only by id

        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $user = new UserResource(User::find($id));
        return response()->json(['status' => True , 'data' => $user]);
    }
    public function store(Request $request)
    {
        //this register users and validation user

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:5',
            'phone'    => 'required',
            'address'    => 'required',
            'role'          => 'required|in:customer,company',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $profileImagePath = null;
        if ($request->hasFile('image_url')) {
            $profileImagePath = $request->file('image_url')->store('profiles', 'public');
        }
        $user =  User::create(array(
            'name' => \request('name'),
            'email' => \request('email'),
            'password' => Hash::make(\request('password')),
            'phone' => \request('phone'),
            'address' => \request('address'),
           'role'     => $request->role ?? 'customer',
            'image_url' => $profileImagePath,
        ));
            return response()->json(['status' => True , 'data' => $user],201);

    }
    public function update(Request $request, $id)
    {
        // update user if you know array
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'       => 'sometimes|string|max:255',
            'email'      => 'sometimes|email|unique:users,email,' . $id,
            'password'   => 'sometimes|string|min:5',
            'phone'      => 'sometimes',
            'address'    => 'sometimes',
            'role'       => 'sometimes|in:admin,customer,company',
            'image_url'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $profileImagePath = $user->image_url;
        if ($request->hasFile('image_url')) {
            $profileImagePath = $request->file('image_url')->store('profiles', 'public');
        }

        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->filled('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->filled('address')) {
            $user->address = $request->address;
        }
        if ($request->filled('role')) {
            $user->role = $request->role;
        }
        if ($profileImagePath) {
            $user->image_url = $profileImagePath;
        }

        $user->save();

        return response()->json(['status' => true, 'data' => $user], 200);
    }
    public function destroy($id)
    {

        $user = User::find($id);
        if(!$user){
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        User::destroy($id);
        return response()->json(['status' => true, 'message' => 'user delete success'], 200);

    }

}
