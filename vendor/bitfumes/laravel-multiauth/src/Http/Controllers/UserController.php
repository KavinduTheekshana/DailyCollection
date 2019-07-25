<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use DB;
// use App\Admin;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function viewuser()
    {
        // $data = DB::table('admins')->join('admin_role','admins.id','=','admin_role.admin_id')->join('roles','admin_role.role_id','=','roles.id')->get();
        // $data = DB::table('admins')->join('admin_role','admin_role.admin_id','=','admins.id')->get();
        $data = DB::table('admins')->join('admin_role', 'admin_role.admin_id', '=', 'admins.id')->
            join('roles', 'roles.id', '=', 'admin_role.role_id')->select('admins.id as adminid','admins.name as adminname',
             'admins.email as adminemail', 'admins.phone as adminphone', 'admins.nic as adminnic',
              'roles.name as rolename')->get();
        // return $data;
        // $data = Admin::all();
        return view('vendor.multiauth.admin.usersview', ['data' => $data]);
    }


    
    // public function updateuser($ids){
    //     $data = DB::table('admins')->join('admin_role', 'admin_role.admin_id', '=', 'admins.id')->
    //         join('roles', 'roles.id', '=', 'admin_role.role_id')->select('admins.id as adminid','admins.name as adminname',
    //          'admins.email as adminemail', 'admins.phone as adminphone', 'admins.nic as adminnic',
    //           'roles.name as rolename')->where(['admins.id'=>$ids])->get();
    //     // $user = DB::table('users')->join('cities','users.city','=','cities.city_id')->where(['id'=>$ids])->first();
    //     return view('vendor.multiauth.admin.updateuser', ['data' => $data]);
    //   }

}
