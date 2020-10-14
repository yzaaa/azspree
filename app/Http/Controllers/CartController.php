<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Resources\Reference;
use App\Models\Supplier;
use App\Models\User;
use App\Models\CartHeader;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Session;
use DB;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user_hash')){

            $srhr_hash = session('user_hash');
            $title = 'MyCart';

            $data['mycart'] = CartDetail::leftJoin('inmr', 'inmr.inmr_hash', '=', 'srln.inmr_hash')
            ->where('srln.srhr_hash', $srhr_hash)
            ->where('srln.status', 0)
            ->orderBy('srln.srhr_hash', 'desc')
            ->get();

            $data['supplier'] =  CartDetail::leftJoin('sumr', 'sumr.sumr_hash', '=', 'srln.sumr_hash')
            ->leftJoin('srhr', 'srhr.srhr_hash', '=', 'srln.srhr_hash')
            ->where('srln.srhr_hash', $srhr_hash)
            ->where('srln.status', 0)
            ->groupBy('srln.sumr_hash')
            ->orderBy('sumr.sumr_hash', 'desc')
            ->get();

            // $data['supplier'] =  DB::table('sumr')->where('sumr.status', 0)->get();

        return view('pages.mycart')->with('data', $data);
    }else{
        return view('pages.login');
        }
    }

    public function indexcheckout()
    {
        if(Session::has('user_hash')){

            $srhr_hash = session('user_hash');
            $title = 'checkout';

            $data['mycart'] = CartDetail::leftJoin('inmr', 'inmr.inmr_hash', '=', 'srln.inmr_hash')
            ->where('srln.srhr_hash', $srhr_hash)
            ->where('srln.is_selected', 1)
            ->where('srln.status', 0)
            ->orderBy('srln.srhr_hash', 'desc')
            ->get();

            $data['supplier'] =  CartDetail::leftJoin('sumr', 'sumr.sumr_hash', '=', 'srln.sumr_hash')
            ->leftJoin('srhr', 'srhr.srhr_hash', '=', 'srln.srhr_hash')
            ->where('srln.srhr_hash', $srhr_hash)
            ->where('srln.is_selected', 1)
            ->where('srln.status', 0)
            ->groupBy('srln.sumr_hash')
            ->orderBy('sumr.sumr_hash', 'desc')
            ->get();

            // $data['supplier'] =  DB::table('sumr')->where('sumr.status', 0)->get();

        return view('pages.checkout')->with('data', $data);
    }else{
        return view('pages.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {
        if(Session::has('user_hash')){
        $srhr_hash = session('user_hash');
        $title = 'MyCart';
        $data['mycart'] =  User::where('is_deleted', 0)->findOrFail($srhr_hash);

        $addcart = new CartDetail();
        $addcart->srhr_hash = $srhr_hash;
        $addcart->inmr_hash = $request['inmr_hash'];
        $addcart->sumr_hash = $request['sumr_hash'];
        $addcart->unit_price = $request['cost_amt'];
        $addcart->qty = $request->input('qty');
        $addcart->variant_1 = $request->input('variant_1');
        $addcart->variant_2 = $request->input('variant_2');
        $addcart->create_datetime = Carbon::now();
        $addcart->save();

        $addcart = CartDetail::findOrFail($addcart->srln_hash);
        $srln_hash = $addcart->srln_hash;
        
        $data = array(
            'srln_hash' => $addcart->srln_hash,
            'email' => $request->input('total_qty')
            );
                
        $response['stat']='success';
        $response['msg']='<b>Successfully Added To Cart.</b>';
        echo json_encode($response);
    }
    // } else {
        // return redirect('login');
        // error_log('Some message here.');
        // return ['message' => 'User Deleted.'];
        // return redirect()->action('PagesController@login');
        // return view('pages.signup');
        // }
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
        $data['products'] = Product::leftJoin('inct', 'inct.inct_hash', '=', 'inmr.inct_hash')
        ->leftJoin('insc', 'insc.insc_hash', '=', 'inmr.insc_hash')
        ->findOrFail($id);
        return view('pages.productdetails')->with('data', $data);
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
            
        
            $srhr_hash = session('user_hash');
            $title = 'MyCart';
            $data['mycart'] =  User::where('is_deleted', 0)->findOrFail($srhr_hash);

            $addcart = CartDetail::findOrFail($id);
            $addcart->srhr_hash = $srhr_hash;
            $addcart->qty = $request->input('qty');
            $addcart->update_datetime = Carbon::now();
            $addcart->save();

            // return redirect('/mycart')->with('successMsg', ' Successfully updated!');

    }

    public function updatecart(Request $request)
    {       

            $id = $request->srln_hash;
            
            $updatecart = CartDetail::findOrFail($id);
            $updatecart->is_selected = $request->is_selected;
            $updatecart->save();

    }   
    
    
    public function updateqty(Request $request)
    {       

            $id = $request->srln_hash;
            
            $updatecart = CartDetail::findOrFail($id);
            $updatecart->qty = $request->qty;
            $updatecart->save();

    }   
    

    public function delete($id)
    {   
        $addcart = CartDetail::findOrFail($id);

        $addcart->status = 1;
        $addcart->update_datetime = Carbon::now();
        $addcart->save();

        // return redirect('/mycart')->with($response['stat']='success', $response['msg']='<b>Successfully Deleted.</b>');
        return redirect('/mycart')->with('successMsg', ' Successfully Deleted!');

        // $data = array(
        //     'srln_hash' => $addcart->srln_hash,
        //     );      
        // $response['stat']='success';
        // $response['msg']='<b>Successfully Deleted.</b>';
        // echo json_encode($response);
        
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
