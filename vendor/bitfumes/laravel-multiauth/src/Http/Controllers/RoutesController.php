<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Illuminate\Http\Request;
use App\Route;
use Illuminate\Routing\Controller;
use DB;

class RoutesController extends Controller
{

    public function show()
    {
        $data = Route::all();
        return view('vendor.multiauth.admin.routes',['data'=>$data]);
    }

    
    
    public function deleteroute($id){
        DB::table('routes')->where('id', $id)->delete();
        return redirect()->back();
      }
}
