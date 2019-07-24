<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;

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

}
