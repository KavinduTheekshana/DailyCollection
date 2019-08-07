<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Auth;
use DB;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
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

    public function index()
    {
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('multiauth::admin.profile', ['profile' => $profile]);
        // return view('multiauth::admin.home');
    }

}
