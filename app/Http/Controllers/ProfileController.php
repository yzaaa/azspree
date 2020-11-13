<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderHeader;
use App\Models\OrderDetail;
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

            // SHOW ALL THE ORDERS OF 1 USER
            // $data['order'] = OrderDetail::leftJoin('inmr', 'inmr.inmr_hash', '=', 'soln.inmr_hash')
            // ->leftJoin('sohr', 'sohr.sohr_hash', '=', 'soln.sohr_hash')
            // ->where('sohr.user_hash', $user_hash)
            // ->get(); 

            $data['order_no'] = OrderDetail::leftJoin('inmr', 'inmr.inmr_hash', '=', 'soln.inmr_hash')
            ->leftJoin('sohr', 'sohr.sohr_hash', '=', 'soln.sohr_hash')
            ->where('sohr.user_hash', $user_hash)
            ->groupBy('sohr.order_no')
            ->orderBy('sohr.sohr_hash', 'desc')
            ->get(); 

            $data['order'] = OrderDetail::leftJoin('inmr', 'inmr.inmr_hash', '=', 'soln.inmr_hash')
            ->leftJoin('sohr', 'sohr.sohr_hash', '=', 'soln.sohr_hash')
            ->where('sohr.user_hash', $user_hash)
            ->orderBy('sohr.sohr_hash', 'desc')
            ->get(); 


        return view('pages.profile')->with('data', $data);
    }else{
        return view('pages.login');
        }
    }

    public function updatestatus($id)
    {       
            
            $order = OrderHeader::findOrFail($id);
            $order->status = 'COMPLETED';
            $order->save();
            return redirect('/profile');
    }   
    
    public function review(Request $request, $id)
    {       
            
            $order = OrderDetail::findOrFail($id);
            $order->rating = $request->rating;
            $order->remarks = $request->remarks;
            $order->status_ratings = 1;
            $order->inmr_hash = $request['inmr_hash'];
            $order->save();

             DB::table('inmr')->where('inmr_hash', $order->inmr_hash)->increment('total_ratings', $order->rating);    
             Product::where('inmr_hash', $order->inmr_hash)->update(['number_ratings' => DB::raw('number_ratings + 1')]);

            return redirect('/profile');
    }   


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
