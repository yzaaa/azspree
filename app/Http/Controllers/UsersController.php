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

        Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required',
                'contact_no' => 'required',
                'password' => 'required'
            ]
            
        )->validate();

        $user = new User();
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        $user->password = $request->input('password');
        // $user->password = Hash::make($request['password']);
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
    
        
    
        // return ( new Reference( $addcart ))
        //         ->response()
        //         ->setStatusCode(201);

        //return json based from the resource data
        // return ( new Reference( $user ))
        //         ->response()
        //         ->setStatusCode(201);

        

    }

}
