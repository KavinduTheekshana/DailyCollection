<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Illuminate\Http\Request;
use App\Route;
use Illuminate\Routing\Controller;
use DB;

class CustomerController extends Controller
{

    public function addcustomers()
    {
        $data = Route::all();
        return view('vendor.multiauth.admin.addcustomer',['data'=>$data]);
    }



    public function valid_nic($nic){
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
