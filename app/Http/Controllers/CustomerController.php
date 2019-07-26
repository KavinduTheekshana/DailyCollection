<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Route;

class CustomerController extends Controller
{
    public function editcoustomer(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','min:10','max:10'],
            'nic' => ['required','min:9','max:12'],
            'address' => ['required']
          
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
