<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Auth;
use DB;
// use App\Admin;
use Illuminate\Routing\Controller;

class UserController extends Controller
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

    public function viewuser()
    {
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        // $data = DB::table('admins')->join('admin_role','admins.id','=','admin_role.admin_id')->join('roles','admin_role.role_id','=','roles.id')->get();
        // $data = DB::table('admins')->join('admin_role','admin_role.admin_id','=','admins.id')->get();
        $data = DB::table('admins')->join('admin_role', 'admin_role.admin_id', '=', 'admins.id')->
            join('roles', 'roles.id', '=', 'admin_role.role_id')->select('admins.id as adminid', 'admins.name as adminname',
            'admins.email as adminemail', 'admins.phone as adminphone', 'admins.nic as adminnic',
            'roles.name as rolename')->get();
        // return $data;
        // $data = Admin::all();
        return view('vendor.multiauth.admin.usersview', ['data' => $data, 'profile' => $profile]);
    }

    public function updateuser($ids)
    {
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        $data = DB::table('admins')->join('admin_role', 'admin_role.admin_id', '=', 'admins.id')->
            join('roles', 'roles.id', '=', 'admin_role.role_id')->select('admins.id as adminid', 'admins.name as adminname'
            , 'admins.address as adminaddress',
            'admins.email as adminemail', 'admins.phone as adminphone', 'admins.nic as adminnic',
            'roles.name as rolename')->where(['admins.id' => $ids])->first();
        // $user = DB::table('users')->join('cities','users.city','=','cities.city_id')->where(['id'=>$ids])->first();
        // dd($data);
        return view('vendor.multiauth.admin.updateuser', ['data' => $data, 'profile' => $profile]);
    }

}
