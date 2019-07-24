<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
// use App\Admin;
use Illuminate\Routing\Controller;

class HolidaysController extends Controller
{
    
    public function add()
    {
        $data = Admin::all();
        return view('vendor.multiauth.admin.usersview',['data'=>$data]);
    }

}
