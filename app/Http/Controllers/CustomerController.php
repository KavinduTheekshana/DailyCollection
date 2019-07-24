<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function addcoustomer(){
        $title='Add Member';
        $id =Auth::user()->id;
        $profile = DB::table('users')->where(['id'=>$id])->first();
        $members = DB::table('users')->orderBy('id', 'desc')->paginate(16);
        $messagecount=DB::table('messages')->where('read_or_not','0')->get();
        $message=DB::table('messages')->where('read_or_not','0')->orderby('id','desc')->get();
        $notification=DB::table('notifications')->where('read_or_not','0')->orderby('id','desc')->get();
        $cities = citie::all();
        return view('admin.pages.addmember',['profile'=>$profile,'members'=>$members,
        'title'=>$title,'messagecount'=>$messagecount,'message'=>$message,
        'cities'=>$cities,'notification'=>$notification]);
      }
}
