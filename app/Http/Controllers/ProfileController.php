<?php

namespace App\Http\Controllers;

// namespace Bitfumes\Multiauth\Http\Controllers;

use App\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
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

    public function updateprofilepic(Request $request)
    {
        $validatedData = $request->validate([
            'profilepic' => 'required',
        ]);

        $id = Auth::user()->id;
        $Admin = new Admin();
        if (Input::hasFile('profilepic')) {
            $file = Input::file('profilepic');
            $file->move(public_path() . '/uploads/',
                $file->getClientOriginalName());
            $url = '../uploads/' . $file->getClientOriginalName();
            $Admin->profilepic = $url;
        }
        $data = array(
            'profilepic' => $Admin->profilepic,
        );
        Admin::where('id', $id)->update($data);
        $Admin->update();
        return redirect()->back()->with('status', 'Profile Picture Update Sucessfully');
    }

    public function updatepassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'confirmed', 'min:6',
        ]);

        $id = Auth::user()->id;
        $Admin = new Admin();
        $Admin->password = Hash::make($request['password']);
        $data = array(
            'password' => $Admin->password,
        );
        Admin::where('id', $id)->update($data);
        $Admin->update();
        return redirect()->back()->with('status2', 'Password Update Sucessfully');
    }

    public function updateprofiledetails(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required', 'string', 'max:255',
            'address' => 'required',
            'phone' => 'required', 'min:10', 'max:10',
            'nic' => 'required', 'min:9', 'max:12',
        ]);

        $id = Auth::user()->id;
        $Admin = new Admin();
        $Admin->name = $request->input('name');
        $Admin->address = $request->input('address');
        $Admin->phone = $request->input('phone');
        $Admin->nic = $request->input('nic');
        $data = array(
            'name' => $Admin->name,
            'address' => $Admin->address,
            'phone' => $Admin->phone,
            'nic' => $Admin->nic,
        );
        Admin::where('id', $id)->update($data);
        $Admin->update();
        return redirect()->back()->with('status', 'Profile Update Sucessfully');
    }

}
