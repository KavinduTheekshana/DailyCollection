<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Route;
use Auth;
use DB;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only' => 'show']);
    }

    public function addcustomers()
    {
        $data = Route::all();
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('vendor.multiauth.admin.addcustomer', ['data' => $data, 'profile' => $profile]);
    }

    public function valid_nic($nic)
    {
        // $nic=$request->nic;
        // $status;
        // $isavalible=DB::table('customers')->where('nic',$nic)->first();
        // $checkstatus=DB::table('customers')->where('nic',$nic)->first();

        // if(!empty($isavalible)){
        //     if($checkstatus->status){
        //         $status='1';
        //     }else{
        //         $status='0';
        //     }

        // }else{
        //     $status="3";
        // }
        // return $status;

        return "1";
    }

}
