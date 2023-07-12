<?php

namespace App\Http\Controllers\APICustomer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        if($customers->count() > 0){
            
            return response()->json([
                'status' => 200,
                'customers' => $customers
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'middle_initial' => 'nullable|string|max:2',
            'ext_name' => 'nullable|string',
            'email' => 'required|email|unique:customers',
            'password' => 'required|string|min:6',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'house_no' => 'required|string',
            'subdivision' => 'required|string',
            'barangay' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'region' => 'required|string',
            'phone_number' => 'required|digits:12',
            'driverse_license' => 'required|string',
            'supporting_id' => 'required|string',
            'supporting_id_number' => 'required|string',
            'driverselicense_img' => 'required|string', //required|image|max:2048',
            'driverselicense_img2' => 'required|string', //required|image|max:2048',
            'supportingid_img' => 'required|string', //required|image|max:2048',
            'supportingid_img2' => 'required|string',  //required|image|max:2048',
            'selfie_image' => 'required|string', //required|image|max:2048',
            'contactperson1' => 'required|string',
            'contactperson2' => 'required|string',
            'contactperson1_number' => 'required|digits:12',
            'contactperson2_number' => 'required|digits:12',
        ]);
        
        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            
            $customer = Customer::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'middle_initial' => $request->middle_initial,
                'ext_name' => $request->ext_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'house_no' => $request->house_no,
                'subdivision' => $request->subdivision,
                'barangay' => $request->barangay,
                'city' => $request->city,
                'province' => $request->province,
                'region' => $request->region,
                'phone_number' => $request->phone_number,
                'driverse_license' => $request->driverse_license,
                'supporting_id' => $request->supporting_id,
                'supporting_id_number' => $request->supporting_id_number,
                'driverselicense_img' => $request->driverselicense_img,
                'driverselicense_img2' => $request->driverselicense_img2,
                'supportingid_img' => $request->supportingid_img,
                'supportingid_img2' => $request->supportingid_img2,
                'selfie_image' => $request->selfie_image,
                'contactperson1' => $request->contactperson1,
                'contactperson2' => $request->contactperson2,
                'contactperson1_number' => $request->contactperson1_number,
                'contactperson2_number' => $request->contactperson2_number,

            ]);

            if($customer){

                return response()->json([
                    'status' => 200,
                    'message' => "Your Account is Created Successfully"
                ], 200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }
}
