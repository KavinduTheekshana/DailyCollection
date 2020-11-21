<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ValiedNicController extends Controller
{
    public function valid_nic(Request $request)
    {
        $nic = $request->input('nic');
        $status;
        $isavalible = DB::table('customers')->where('nic', $nic)->first();

        if (!empty($isavalible)) {
            if ($isavalible->status) {
                return response()->json($isavalible);
            } else {
                return '0';
                // $status='0';
            }

        } else {
            return '2';
            // $status="2";
        }

    }
}
