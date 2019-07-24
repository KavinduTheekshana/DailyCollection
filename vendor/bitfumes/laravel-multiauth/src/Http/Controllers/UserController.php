<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
// use App\Admin;
use Illuminate\Routing\Controller;
use DB;

class UserController extends Controller
{
    
    public function viewuser()
    {
        // $data = DB::table('admins')->join('admin_role','admins.id','=','admin_role.admin_id')->join('roles','admin_role.role_id','=','roles.id')->get();
        // $data = DB::table('admins')->join('admin_role','admin_role.admin_id','=','admins.id')->get();
        $data = DB::table('admins')->join('admin_role','admin_role.admin_id','=','admins.id')->
        join('roles','roles.id','=','admin_role.role_id')->get();
        // return $data;
        // $data = Admin::all();
        return view('vendor.multiauth.admin.usersview',['data'=>$data]);
    }

}
