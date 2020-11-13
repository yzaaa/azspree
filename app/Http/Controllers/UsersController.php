<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CartHeader;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Hash;
use Session;
use DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validator= Validator::make($request->all(),
            [
                'fullname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email:rfc,dns',
                'contact_no' => 'required|regex:/(09)[0-9]{9}$/',
                'password' => 'required'
            ]
            
        );
        
        $message = [
            'required' => 'The :attribute field is required.',
            'contact_no.required' => 'Contact Number must be (09XXXXXXXXX)',
            
        ];

        if($validator->fails()){
            $response['stat']='error';
            // $response['msg'] =$message;
            $response['msg']='<b>Please fill out all required field.</b> <br> <b>Contact Number must be (09XXXXXXXXX).</b>';
            echo json_encode($response);
        } else {
            
        $user = new User();
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        // $user->password = $request->input('password');
        $user->password = Hash::make($request['password']);
        $user->type = 'US';
        $user->status = 'A';
        $user->create_datetime = Carbon::now();
        $user->save();

        //For SRHR
        $addcart = new CartHeader();
        $addcart->user_hash = $user->user_hash;
        $addcart->create_datetime = Carbon::now();
        $addcart->save();

        $user = User::findOrFail($user->user_hash);
        $user_hash = $user->user_hash;


        $data = array(
            'user_hash' => $user->user_hash,
            'email' => $request->input('fullname')
            );
                
        $response['stat']='success';
        $response['msg']='<b>Successfully Signup.</b> Please login now.';
        echo json_encode($response);
        }        

    }

}
