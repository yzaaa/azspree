<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;

class LoginController extends Controller
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
    public function login(Request $request)
    {

        // $credentials = request(['email', 'password']);

        // if (! $token = auth()->attempt(array('is_deleted'=>0, 'email' => $credentials['email'], 'password' => $credentials['password']))) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        // return $this->respondWithToken($token);

        Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required'
            ]
        )->validate();

        $email = $request->input('email');
        $password = $request->input('password');

        $result = User::select('*')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->get();
        
        if(count($result) > 0){

            session()->put('user_hash', $result[0]->user_hash);
            session()->put('fullname', $result[0]->fullname);
            session()->save();

            $response['stat']='success';
            $response['msg']='Login Successfully.';
            echo json_encode($response);
        }else{
            $response['stat']='error';
            $response['msg']='Invalid email or password.';
            echo json_encode($response);
        }
    }

    
    public function logout()
    {
        Session::forget('user_hash');
        return view('pages.login');
    }
}
