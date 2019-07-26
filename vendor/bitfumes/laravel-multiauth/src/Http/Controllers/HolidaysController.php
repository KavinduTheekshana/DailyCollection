<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Holiday;

class HolidaysController extends Controller
{
    
    public function show()
    {
        $data = Holiday::all();
        return view('vendor.multiauth.admin.holiday',['data'=>$data]);
    }

}
