<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Route;
use App\Customer;

class TransactionsController extends Controller
{
    
    public function show()
    {
        $route = Route::all();
        $customer = Customer::all();
        return view('vendor.multiauth.admin.transactions',['route'=>$route,'customer'=>$customer]);
    }

}
