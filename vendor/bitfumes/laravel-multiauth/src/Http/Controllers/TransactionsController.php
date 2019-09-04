<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Customer;
use App\Route;
use Auth;
use DB;
use Illuminate\Routing\Controller;

class TransactionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('role:super', ['only' => 'show']);
    }

    public function show()
    {
        $route = Route::all();
        $customer = Customer::all();
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('vendor.multiauth.admin.transactions', ['route' => $route, 'customer' => $customer, 'profile' => $profile]);
    }

}
