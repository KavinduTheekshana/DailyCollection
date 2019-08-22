<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Customer;
use App\Transaction;
use Auth;
use DB;
use Illuminate\Routing\Controller;

class ReportController extends Controller
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

    public function viewTransactions(Transaction $transaction)
    {
        $profile =  Auth::user();
        $customer = $transaction->transaction_customer;
        return view('vendor.multiauth.admin.viewtransactions', compact('profile','customer'));
    }

    public function show(Transaction $transaction)
    {
        $data = DB::table('transactions')->join('customers as c', 'c.id', '=', 'transactions.customer')
            ->join('customers as g1', 'g1.id', '=', 'transactions.firstguarantor')
            ->join('customers as g2', 'g2.id', '=', 'transactions.secondguarantor')
            ->select('c.name as cname', 'c.nic as cnic', 'c.address as caddress', 'c.mobile as cmobile',
                'c.lanline as clanline', 'transactions.route as route',
                'g1.name as g1name', 'g1.nic as g1nic', 'g1.address as g1address', 'g1.mobile as g1mobile',
                'g1.lanline as g1lanline',
                'g2.name as g2name', 'g2.nic as g2nic', 'g2.address as g2address', 'g2.mobile as g2mobile',
                'g2.lanline as g2lanline',
                'transactions.id as id', 'transactions.paymenttype as paymenttype', 'transactions.amount as amount',
                'transactions.installment as installment', 'transactions.totalincome as totalincome',
                'transactions.datepurchased as datepurchased', 'transactions.duedate as duedate',
                'transactions.remain as remain'
            )->where(['transactions.status' => 0])
            ->orderBy('id', 'desc')->get();
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('vendor.multiauth.admin.reports', ['data' => $data, 'profile' => $profile]);
    }

}
