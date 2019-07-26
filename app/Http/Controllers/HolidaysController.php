<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
use DB;

class HolidaysController extends Controller
{
  public function addholiday(Request $request){
    $this->validate($request, [
      'date' => ['required', 'date'],
      'description' => ['required', 'string', 'max:255'],
      'type' => ['required']
      
     ]);
     
     $holoday = new Holiday();
     $holoday->date = $request->input('date');
     $holoday->description = $request->input('description');
     $holoday->type = $request->input('type');
     $holoday->save();
     return back()->with('status', 'Holiday Added Sucessfully');
  }

  public function deleteholidaty($id){
    DB::table('holidays')->where('id', $id)->delete();
    return redirect()->back();
  }

}
