<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
          $company = CompanyResource::collection(Company::all());
          return response()->json(['status' => true ,'data' => $company]);
    }
    public function show($id)
    {
        $company = Company::find($id);
        if ($company == null) {
            return response()->json(['status' => false, 'message' => 'Company not found'], 404);
        }

        $company = new CompanyResource(Company::find($id));
        return response()->json(['status' => true ,'data' => $company]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'company') {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $logopath = null;
        if ($request->hasFile('logo')) {
            $logopath = $request->file('logo')->store('logos', 'public');
        }
        $company = Company::create([
           'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'logo' => $logopath,
        ]);
        return response()->json(['status' => true ,'data' => $company], 201);
    }
   public function update(Request $request, $id)
   {
       $user = $request->user();
       if($user->role !== 'company') {
           return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
       }

       $company = Company::find($id);
       if ($company == null) {
           return response()->json(['status' => false, 'message' => 'Company not found'], 404);
       }
       $data = $request->only(['name', 'email', 'address', 'phone', 'logo']);

       if ($request->hasFile('logo')) {
           $data['logo'] = $request->file('logo')->store('logos', 'public');
       }
       $company->update($data);
       $company->refresh();
       return response()->json(['status' => true ,'data' => $company]);
   }
   public function destroy(Request $request,$id)
   {
       $user = $request->user();
       if ($user->role !== 'admin') {
           return response()->json(['status' => false, 'message' => 'Only admin can delete companies'], 403);
       }

       $company = Company::find($id);
       if ($company == null) {
           return response()->json(['status' => false, 'message' => 'Company not found'], 404);
       }
       $company->delete();
       return response()->json(['status' => true ,'message' => 'Company deleted' ]);
   }

}
