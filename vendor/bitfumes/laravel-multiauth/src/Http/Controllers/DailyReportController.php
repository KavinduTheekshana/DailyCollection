<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Holiday;
use App\Installment;
use App\Route;
use App\Transaction;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
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


    public function show(Request $request)
    {
        $filterRoute = $request->route;
        $transactions = Installment::transactionWithTodayInstallment()->get();
        if ($filterRoute){
            $transactions = Installment::transactionWithTodayInstallment($filterRoute)->get();
        }
        $route = Route::all();
        $profile = Auth::user();
        return view('vendor.multiauth.admin.dailyreports',compact('transactions','route','profile'));
    }

    private function daysBetween(Carbon $start_date, Carbon $end_date = null, $type = 'daily')
    {
        $end_date = (!empty($end_date) ? $end_date : Carbon::now());
        $days = CarbonPeriod::create($start_date, 'P1D', $end_date);
        $holidays = Holiday::whereBetween('date', [$start_date, $end_date])->get()->pluck('date')->toArray();

        $days = ($type == 'daily') ? $this->daysInPeriod($days, $holidays) : $this->weeksInPeriod($days, $holidays);
        return $days->toArray();
    }

    private function daysInPeriod(CarbonPeriod $days, $holidays)
    {
        return $days->filter(function ($date) use ($holidays) {
            return $date->dayOfWeek != Carbon::SUNDAY && !in_array($date, $holidays);
        });
    }


    public function debug(){

    }

}
