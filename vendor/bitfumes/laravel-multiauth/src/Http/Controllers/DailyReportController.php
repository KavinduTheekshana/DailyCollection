<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use App\Holiday;
use App\Installment;
use App\Route;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
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
        // $this->middleware('role:super', ['only' => 'show']);
    }


    public function show(Request $request)
    {
        $pdf = $request->pdf;
        $filterRoute = $request->route;
        $transactions = Installment::transactionWithTodayInstallment()->get();
        if ($filterRoute!='all') {
            $transactions = Installment::transactionWithTodayInstallment($filterRoute)->get();
        }
        $route = Route::all();
        $profile = Auth::user();
        if (!empty($pdf)) {
            return $this->generateDailyReportPdf($filterRoute, $transactions);
        }

        return view('vendor.multiauth.admin.dailyreports', compact('transactions', 'route', 'profile'));
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


    private function generateDailyReportPdf($route, $transactions)
    {
        $today = Carbon::now();
        $referenceTimeHour = 15;
        $date = ($referenceTimeHour > $today->hour) ? Carbon::now()->format('Y-m-d') : Carbon::yesterday()->format('Y-m-d');
        $route = (is_null($route)) ? 'All' : $route;
        $data = ['date' => $date, 'route' => $route, 'transactions' => $transactions];
        $pdf = PDF::loadView('vendor.multiauth.pdf.daily-transaction', $data);
        return $pdf->download($date.' daily-report.pdf');
//        return $pdf->stream();
    }

    public function debug()
    {

    }


}
