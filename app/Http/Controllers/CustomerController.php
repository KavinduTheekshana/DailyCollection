<?php

namespace App\Http\Controllers;

use App\Customer;
use App\FirstGuarantor;
use App\Route;
use App\SecondGuarantor;
use DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function submitcustomers(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nic' => ['required', 'min:9', 'max:12', 'unique:customers'],
            'address' => ['required'],
            'mobile' => ['required', 'min:10', 'max:10'],

        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->nic = $request->input('nic');
        $customer->address = $request->input('address');
        $customer->mobile = $request->input('mobile');
        $customer->lanline = $request->input('lanline');
        $customer->save();
        return back()->with('status', 'Customer Details Added Sucessfully');

    }

    public function submitcustomersdemo(Request $request)
    {

        $this->validate($request, [
            'cname' => ['required', 'string', 'max:255'],
            'cnic' => ['required', 'min:9', 'max:12'],
            'caddress' => ['required'],
            'cmobile' => ['required', 'min:10', 'max:10'],
            'clanline' => ['min:10', 'max:10'],
            'croute' => ['required'],

            'g1name' => ['required', 'string', 'max:255'],
            'g1nic' => ['required', 'min:9', 'max:12'],
            'g1mobile' => ['required', 'min:10', 'max:10'],
            'g1lanline' => ['min:10', 'max:10'],

            'g2name' => ['required', 'string', 'max:255'],
            'g2nic' => ['required', 'min:9', 'max:12'],
            'g2mobile' => ['required', 'min:10', 'max:10'],
            'g2lanline' => ['min:10', 'max:10'],

        ]);

        $customer = new Customer();
        $customer->name = $request->input('cname');
        $customer->nic = $request->input('cnic');
        $customer->address = $request->input('caddress');
        $customer->mobile = $request->input('cmobile');
        $customer->lanline = $request->input('clanline');
        $customer->route = $request->input('croute');
        $customer->save();

        $id = $customer->id;
        $nic = $request->input('cnic');

        $firstguarantor = new FirstGuarantor();
        $firstguarantor->name = $request->input('g1name');
        $firstguarantor->nic = $request->input('g1nic');
        $firstguarantor->mobile = $request->input('g1mobile');
        $firstguarantor->lanline = $request->input('g1lanline');
        $firstguarantor->customerid = $id;
        $firstguarantor->customernic = $nic;
        $firstguarantor->save();

        $secondguarantor = new SecondGuarantor();
        $secondguarantor->name = $request->input('g2name');
        $secondguarantor->nic = $request->input('g2nic');
        $secondguarantor->mobile = $request->input('g2mobile');
        $secondguarantor->lanline = $request->input('g2lanline');
        $secondguarantor->customerid = $id;
        $secondguarantor->customernic = $nic;
        $secondguarantor->save();

    }

    public function addcustomers()
    {
        $data = Route::all();
        return view('vendor.multiauth.admin.addcustomer', ['data' => $data]);
    }

    public function managecustomers()
    {
        $data = Customer::all();
        return view('vendor.multiauth.admin.viewcustomer', ['data' => $data]);
    }

    public function blockcustomer($id)
    {
        $task = Customer::find($id);
        $task->status = 0;
        $task->save();
        return redirect()->back();
    }

    public function unblockcustomer($id)
    {
        $task = Customer::find($id);
        $task->status = 1;
        $task->save();
        return redirect()->back();
    }

    public function deletecustomer($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function editcustomers(Request $request)
    {
        $this->validate($request, [
            'modelname' => ['required', 'string', 'max:255'],
            'modeladdress' => ['required'],
            'modelmobile' => ['required', 'min:10', 'max:10'],

        ]);

        $customer = new Customer();
        $id = $request->input('modelid');
        $customer = Customer::find($id);
        $customer->name = $request->input('modelname');
        $customer->address = $request->input('modeladdress');
        $customer->mobile = $request->input('modelmobile');
        $customer->lanline = $request->input('modellanline');
        $customer->save();
        // return back()->with('status', 'Customer Details Added Sucessfully');
        return redirect()->back();
    }

    public function valid_nic($nic){
        // $nic=$request->nic;
        $status;
        $isavalible=DB::table('customers')->where('nic',$nic)->first();
        // dd($isavalible->status);
        $checkstatus=DB::table('customers')->where('nic',$nic)->first();

        if(!empty($isavalible)){
            if($checkstatus->status){
                $status='1';   
            }else{
                $status='0';  
            }
            
        }else{
            $status="3";
        }
        return $status;
     }

    //  function isBlockUser($nic){
    //     $block_users=DB::select('select id from customers where nic=?',[$nic]);
    //     if(!empty($block_users))
    //      return "Blocked User";
    //     else
    //      return "";
    // }
}
