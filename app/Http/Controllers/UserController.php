<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Route;
use Auth;
use DB;
use Illuminate\Http\Request;

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

    public function addusers(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:10', 'max:10'],
            'nic' => ['required', 'min:9', 'max:12'],

        ]);
        $route = new Route();
        $route->route = $request->input('route');
        $route->save();
        return back()->with('status', 'Route Added Sucessfully');
    }

    public function deleteuser($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        DB::table('admin_role')->where('admin_id', $id)->delete();
        return redirect()->back();
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

    public function edituser(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:10', 'max:10'],
            'nic' => ['required', 'min:9', 'max:12'],
            'address' => ['required'],

        ]);
        $admin = new Admin();
        $id = $request->input('id');
        $admin = Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->phone = $request->input('phone');
        $admin->nic = $request->input('nic');
        $admin->address = $request->input('address');

        //  dd($admin);
        $admin->save();
        return redirect('viewuser')->with('status', 'User Details Update Sucessfully');
    }

}
