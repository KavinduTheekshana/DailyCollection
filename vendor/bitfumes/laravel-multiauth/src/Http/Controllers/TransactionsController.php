<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Route;

class TransactionsController extends Controller
{
    
    public function show()
    {
        $data = Route::all();
        return view('vendor.multiauth.admin.transactions',['data'=>$data]);
    }

}
