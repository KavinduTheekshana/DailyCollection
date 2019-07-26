<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Route;

class CustomerController extends Controller
{
    public function submitcustomers(Request $request){
        $this->validate($request, [
            'cname' => ['required', 'string', 'max:255'],
            'g1name' => ['required', 'string', 'max:255'],
            'g2name' => ['required', 'string', 'max:255'],
            'cnic' => ['required','min:9','max:12'],
            'g1nic' => ['required','min:9','max:12'],
            'g2nic' => ['required','min:9','max:12'],
            'address' => ['required'],
            'cmobile' => ['required','min:10','max:10'],
            'g1mobile' => ['required','min:10','max:10'],
            'g2mobile' => ['required','min:10','max:10'],
            'clanline' => ['required','min:10','max:10'],
            'g1lanline' => ['required','min:10','max:10'],
            'g2lanline' => ['required','min:10','max:10'],
            'croute' => ['required']
          
         ]);
         $admin = new Admin();
         $id=$request->input('id');
         $admin = Admin::find($id);
         $admin ->name= $request->input('name');
         $admin->email = $request->input('email');
         $admin->phone = $request->input('phone');
         $admin->nic = $request->input('nic');
         $admin->address = $request->input('address');
         
        //  dd($admin);
         $admin->save();
         return redirect('viewuser')->with('status', 'User Details Update Sucessfully');
      }

      public function addcustomers()
      {
          $data = Route::all();
          return view('vendor.multiauth.admin.addcustomer',['data'=>$data]);
      }
}
