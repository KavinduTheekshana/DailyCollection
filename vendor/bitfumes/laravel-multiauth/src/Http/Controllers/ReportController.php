<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Holiday;
use App\Installment;
use App\Transaction;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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
        $customer = $transaction->transaction_customer;
        $profile = Auth::user();
        if ($transaction->remain >= 0){
            $type = $transaction->paymenttype;
            $purchased_date = Carbon::parse($transaction->datepurchased);
            $installments = $transaction->installments()->dueToToday()->get();

//            $days = ($type === 'daily')?$this->daysBetween($purchased_date):$this->daysBetween($purchased_date,null,'weekly');
//            $days=array_reverse($days);
//
//            $data=new Collection();
//            foreach ($days as $day){
//                $flag=true;
//                foreach ($installments as $installment){
//                    if ($day == Carbon::parse($installment->date)){
//                        $data->add($installment);
//                        $flag=false;
//                    }
//                }
//                if ($flag){
//                    $data->add($day);
//                }
//            }

            $data=$installments;
        }else{
            $data=[];
        }


        return view('vendor.multiauth.admin.viewtransactions', compact('profile', 'transaction','customer','data'));
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

    public function makeInstallment(Request $request)
    {
        Transaction::$FIRE_EVENTS=true;
        $installment =Installment::find($request->instalment_id);
        $installment->payment_date = Carbon::parse($request->date)->format('Y-m-d');
        $installment->amount = $request->amount;
        $installment->status =1;
        $transaction=Transaction::find($request->transaction_id);
        $transaction->remain = $transaction->remain - $installment->amount;
        $installment->remain = $transaction->remain;
        $transaction->installments()->save($installment);
        return redirect()->route('admin.home');
    }

    private function daysBetween(Carbon $start_date, Carbon $end_date = null,$type='daily')
    {
        $end_date = (!empty($end_date) ? $end_date : Carbon::now());
        $days = CarbonPeriod::create($start_date, 'P1D', $end_date);
        $holidays = Holiday::whereBetween('date', [$start_date, $end_date])->get()->pluck('date')->toArray();

        $days = ($type=='daily')?$this->daysInPeriod($days,$holidays):$this->weeksInPeriod($days,$holidays);
        return $days->toArray();
    }

    private function daysInPeriod(CarbonPeriod $days,$holidays){
        return $days  ->filter(function ($date) use ($holidays) {
            return $date->dayOfWeek != Carbon::SUNDAY && !in_array($date, $holidays);
        });
    }

    private function weeksInPeriod(CarbonPeriod $days,$holidays){
        $weeks = $days->setDateInterval('1w');
        $weekDays =collect();
        foreach ($weeks as $weekDay){
            if ($weekDay->dayOfWeek == Carbon::SUNDAY){
                $weekDay = $weekDay->addDay();
            }
            if(in_array($weekDay, $holidays)){
                $weekDay = $weekDay->addDay();
            }
            $weekDays->add($weekDay);
        }
        return $weekDays;
    }

    private function dayCountFromPurchased(Carbon $purchased_date, Carbon $toDate = null)
    {
        $toDate = (!empty($toDate) ? $toDate : Carbon::now());
        $holidays = Holiday::whereBetween('date', [$purchased_date, $toDate])->get()->pluck('date')->toArray();
        $difference = $purchased_date->diffInDaysFiltered(function ($date) use ($holidays) {
            return $date->dayOfWeek != Carbon::SUNDAY && !in_array($date, $holidays);
        }, $toDate);
        return $difference;
    }

}
