<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Holiday;
use Auth;
use DB;
use Illuminate\Routing\Controller;

class HolidaysController extends Controller
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

    public function show()
    {
        $data = Holiday::all();
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('vendor.multiauth.admin.holiday', ['data' => $data, 'profile' => $profile]);
    }

}
