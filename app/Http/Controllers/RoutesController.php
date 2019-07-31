<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use DB;

class RoutesController extends Controller
{

    public function addroute(Request $request){
        $this->validate($request, [
          'route' => ['required', 'string', 'max:255']
          
         ]);
         $route = new Route();
         $route->route = $request->input('route');
         $route->save();
         return back()->with('status', 'Route Added Sucessfully');
      }


      public function deleteroute($id){
        DB::table('routes')->where('id', $id)->delete();
        return redirect()->back();
      }

      public function show()
      {
          $data = Route::all();
          return view('vendor.multiauth.admin.routes',['data'=>$data]);
      }

}
