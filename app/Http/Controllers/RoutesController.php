<?php

namespace App\Http\Controllers;

use App\Route;
use Auth;
use DB;
use Illuminate\Http\Request;

class RoutesController extends Controller
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

    public function addroute(Request $request)
    {
        $this->validate($request, [
            'route' => ['required', 'string', 'max:255'],

        ]);
        $route = new Route();
        $route->route = $request->input('route');
        $route->save();
        return back()->with('status', 'Route Added Sucessfully');
    }

    public function deleteroute($id)
    {
        DB::table('routes')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function show()
    {
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        $data = Route::all();
        return view('vendor.multiauth.admin.routes', ['data' => $data, 'profile' => $profile]);
    }

}
