<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Holiday;
use App\Transaction;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
        $profile = Auth::user();
        $customer = $transaction->transaction_customer;
        $today = Carbon::now()->toDateString();
        $purchased_date = Carbon::parse($transaction->datepurchased);
        $days = $this->daysBetween($purchased_date);

        return view('vendor.multiauth.admin.viewtransactions', compact('profile', 'transaction','customer','days'));
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

    private function daysBetween(Carbon $start_date, Carbon $end_date = null)
    {
        $end_date = (!empty($end_date) ? $end_date : Carbon::now());
        $holidays = Holiday::all()->pluck('date')->toArray();
        $days = CarbonPeriod::create($start_date, 'P1D', $end_date)
            ->filter(function ($date) use ($holidays) {
                return $date->dayOfWeek != Carbon::SATURDAY && !in_array($date, $holidays);
            });
        return $days->toArray();
    }

    private function dayCountFromPurchased(Carbon $purchased_date, Carbon $toDate = null)
    {
        $toDate = (!empty($toDate) ? $toDate : Carbon::now());
        $holidays = Holiday::all()->pluck('date')->toArray();
        $difference = $purchased_date->diffInDaysFiltered(function ($date) use ($holidays) {
            return $date->dayOfWeek != Carbon::SATURDAY && !in_array($date, $holidays);
        }, $toDate);
        return $difference;
    }

}
