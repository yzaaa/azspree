<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Product;
use Session;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user_hash')){
            $user_hash = session('user_hash');
            $title = 'Profile';
            $data['profile'] =  User::where('is_deleted', 0)->findOrFail($user_hash);

            // SHOW ALL THE ORDERS OF 1 USE
            // $data['orders'] = Orders::leftJoin('products', 'products.id', '=', 'orders.productId')
            // ->where('orders.id', $id)
            // ->orderBy('orders.id', 'desc')->get();


        return view('pages.profile')->with('data', $data);
    }else{
        return view('pages.login');
        }
    }

    // public function cart($id)
    // {
    //     if(Session::has('user_hash')){
    //         $user_hash = session('user_hash');
    //         $title = 'MyCart';
    //         $data['mycart'] =  DB::table('user')->where('is_deleted', 0)->orderBy('user_hash')->get();

    //         $data['products'] = Product::where('is_deleted', 0)->findOrFail($user_hash);

    //     return view('pages.mycart')->with('data', $data);
    // }else{
    //     return view('pages.login');
    //     }
    // }

    // public function mycart($id)
    // {
    //     $data['products'] = Product::where('is_deleted', 0)->findOrFail($id);
    //     return view('pages.mycart')->with('data', $data);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
