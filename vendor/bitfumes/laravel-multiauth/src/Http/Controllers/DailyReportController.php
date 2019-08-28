<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Holiday;
use App\Installment;
use App\Transaction;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use App\Route;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DailyReportController extends Controller
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

 

    public function show(Transaction $transaction)
    {
        $route = Route::all();
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('vendor.multiauth.admin.dailyreports', ['route' => $route,'profile' => $profile]);
    }

    public function makeInstallment(Request $request)
    {
        $installment = new Installment();
        $installment->date = Carbon::parse($request->date)->format('Y-m-d');
        $installment->amount = $request->amount;

        $transaction=Transaction::find($request->transaction_id);
        $transaction->remain = $transaction->remain-  $installment->amount;
        $installment->remain = $transaction->remain;
        $transaction->installments()->save($installment);
        return redirect()->back();
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
