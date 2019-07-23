<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addusers(Request $request){
        $this->validate($request, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
          'phone'=>['required','string'],
          'nic'=>['required','string'],
          'address'=>['required','string'],
          'password' => ['required', 'string', 'min:6', 'confirmed'],
         ]);

         
         $users = new users();
         $users->name = $request->input('name');
         $users->email = $request->input('email');
         $users->password = Hash::make($request['password']);
         $users->birthday = $request->input('year').'.'.$request->input('month').'.'.$request->input('date');
         $users->gender = $request->input('gender');
         $users->city = $request->input('city');
         $users->suburb = $request->input('suburb');
         $users->job = $request->input('job');
              if(Input::hasFile('profile_pic')){
                  $file=Input::file('profile_pic');
                  $file->move(public_path().'/uploads/',
                  $file->getClientOriginalName());
                  $url=URL::to("/").'/uploads/'.$file->getClientOriginalName();
                  $users->profile_pic = $url;
              }else {
                $users->profile_pic = 'http://localhost/basicwebsite/public/uploads/default.jpg';
              }
         $users->save();
         return redirect('adduser')->with('status', 'Profile Added Sucessfully');
      }
}
