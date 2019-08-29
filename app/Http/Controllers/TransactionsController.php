<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Holiday;
use App\Installment;
use App\Transaction;
use Auth;
use Carbon\carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Http\Request;

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
        $this->middleware('role:super', ['only' => 'show']);
    }

    public function submitcustomers(Request $request)
    {

        $this->validate($request, [
            'customer_id' => ['required'],
            'route' => ['required', 'string'],
            'first_guaranter_id' => ['required'],
            'second_guaranter_id' => ['required'],
            'payment_type' => ['required'],
            'amount' => ['required'],
            'installment' => ['required'],
            'totalincome' => ['required'],
            'datepurchased' => ['required'],
            'duedate' => ['required'],
        ]);

        $firstguarantor = $request->input('first_guaranter_id');
        $secondguarantor = $request->input('second_guaranter_id');
        $customer = $request->input('customer_id');

        // $firstguarantor = 0;
        // $secondguarantor = 2;
        // $customer = 1;

        $customercount1 = DB::table('transactions')
            ->where('firstguarantor', $firstguarantor)
            ->where('status', false)
            ->orWhere(function ($query) use ($firstguarantor) {
                $query->where('secondguarantor', '=', $firstguarantor)
                    ->where('status', '=', false);
            })
            ->count();

        $customercount2 = DB::table('transactions')
            ->where('firstguarantor', $secondguarantor)
            ->where('status', false)
            ->orWhere(function ($query) use ($secondguarantor) {
                $query->where('secondguarantor', '=', $secondguarantor)
                    ->where('status', '=', false);
            })
            ->count();

        // $customercount1 = DB::table('transactions')
        //     ->where('firstguarantor', $firstguarantor)
        //     ->where('status', false)
        //     ->orwhere(['secondguarantor' => $firstguarantor, 'status' => false])
        //     ->orWhere(function ($query) use ($firstguarantor) {
        //         $query->where('secondguarantor', '=', $firstguarantor)
        //             ->where('status', '=', false);
        //     })
        //     ->count();

        // dd($customercount1);

        // $firstguarantorcountfirst = DB::table('transactions')->where(['firstguarantor' => $firstguarantor])->count();
        // $secondguarantorcountfirst = DB::table('transactions')->where(['secondguarantor' => $firstguarantor])->count();

        // $firstguarantorcountsecond = DB::table('transactions')->where(['firstguarantor' => $secondguarantor])->count();
        // $secondguarantorcountsecond = DB::table('transactions')->where(['secondguarantor' => $secondguarantor])->count();

        // $guarantorcountsumfirst = $firstguarantorcountfirst + $secondguarantorcountfirst;
        // $guarantorcountsumsecond = $firstguarantorcountsecond + $secondguarantorcountsecond;

        // $customercount1 = DB::table('transactions')->where(['firstguarantor' => $firstguarantor])->orwhere(['secondguarantor' => $firstguarantor])->count();
        // $customercount2 = DB::table('transactions')->where(['firstguarantor' => $secondguarantor])->orwhere(['secondguarantor' => $secondguarantor])->count();

        // if ($customercount1 >= 2 || $customercount2 >= 2) {
        //     dd('if');
        // } else {
        //     dd('else');
        // }

        $customercount = DB::table('transactions')->where(['customer' => $customer, 'status' => false])->count();

        if ($customercount >= 1) {
            return back()->with('statusdanger', 'This Customeris Already Excist And Not Complete');
        } else {

            if ($customercount1 >= 2 || $customercount2 >= 2) {
                return back()->with('statusdanger', 'This Guranteers Are Already Guranterd 2 Customers');
            } else {
                $transaction = new Transaction();
                $transaction->customer = $request->input('customer_id');
                $transaction->route = $request->input('route');
                $transaction->firstguarantor = $request->input('first_guaranter_id');
                $transaction->secondguarantor = $request->input('second_guaranter_id');
                $transaction->paymenttype = $request->input('payment_type');
                $transaction->amount = $request->input('amount');
                $transaction->remain = $request->input('amount');
                $transaction->installment = $request->input('installment');
                $transaction->totalincome = $request->input('totalincome');
                $transaction->datepurchased = $request->input('datepurchased');
                $transaction->duedate = $request->input('duedate');

                $transaction->save();


                $this->setInstallmentDates($transaction);

                return back()->with('status', 'New Transaction Details Added Sucessfully');
            }

        }

    }



    public function transactionslistcompleted()
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
                'transactions.datepurchased as datepurchased', 'transactions.duedate as duedate'
            )->where(['transactions.status' => 1])
            ->orderBy('id', 'desc')->get();
        $id = Auth::user()->id;
        $profile = DB::table('admins')->where(['id' => $id])->first();
        return view('vendor.multiauth.admin.transactionslistcompleted', ['data' => $data, 'profile' => $profile]);
    }

    public function transactionslistnotcompleted()
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
        return view('vendor.multiauth.admin.transactionslistnotcompleted', ['data' => $data, 'profile' => $profile]);
    }

    public function duedate(Request $request)
    {
        // $datepurchased = $request->date;

        $datepurchased = $request->date;
        $holidays = DB::table('holidays')->get();

        $now = new Carbon($datepurchased);
        $x = 0;
        $b = 0;
        while ($x < 60) {
            $date1 = Carbon::parse($now);
            $string = $date1->englishDayOfWeek;
            if ($string != "Sunday") {
                foreach ($holidays as $holiday) {
                    $holidayDate = new Carbon($holiday->date);
                    $date2 = Carbon::parse($holidayDate)->toDateString();
                    $now2 = Carbon::parse($now)->toDateString();
                    if ($now2 == $date2) {
                        $now->addDays(1);
                    }
                }
                $now->addDays(1);
                $x = $x + 1;

            } else {
                $now->addDays(1);
            }
        }
        return $now->toDateString();

        // $now = new Carbon();
        // $holidays = DB::table('holidays')->get();
        // $x = 0;
        // $b = 0;
        // while ($x < 10) {
        //     $date1 = Carbon::parse($now);
        //     $string = $date1->englishDayOfWeek;
        //     if ($string != "Sunday") {
        //         foreach ($holidays as $holiday) {
        //             $holidayDate = new Carbon($holiday->date);
        //             $date2 = Carbon::parse($holidayDate)->toDateString();
        //             $now2 = Carbon::parse($now)->toDateString();
        //             if ($now2 == $date2) {
        //                 $now->addDays(1);
        //             }
        //         }
        //         $now->addDays(1);
        //         $x = $x + 1;

        //     } else {
        //         $now->addDays(1);
        //     }
        // }
        // return $now->toDateString();

        // $holidays = DB::table('holidays')->get();
        // foreach ($holidays as $holiday) {
        //     $holidayDate = new Carbon($holiday->date);
        //     $date2 = Carbon::parse($holidayDate)->toDateString();
        // }

        // if ($date1->lt($date2)) {
        // }

        // $now = new Carbon();
        // $x = 0;

        // while ($x < 60) {
        //     $date1 = Carbon::parse($now);
        //     $string = $date1->englishDayOfWeek;
        //     if ($string != "Sunday") {
        //         $now->addDays(1);
        //         $x = $x + 1;

        //     } else {
        //         $now->addDays(1);
        //     }
        // }
        // return $now->toDateString();

        //     if($selection=="option1"){
        //     $due_date=date('Y-m-d', strtotime($date_purchased. ' + 70days'));
        //     $next_date=$date_purchased;
        //     for($i=0;$i<10;$i++){
        //         $isSundays=$this->isSunday($next_date);
        //         $isHolidays=$this->isHoliday($date_purchased,$due_date,$next_date);
        //           if($isSundays || $isHolidays){
        //             echo $next_date;
        //             $next_date=date('Y-m-d', strtotime($next_date. ' + 7days'));
        //           }
        //           $next_date=date('Y-m-d', strtotime($next_date. ' + 7days'));
        //     }

        //     echo $next_date;
        //    }

        //    else{
        //      $due_date=date('Y-m-d', strtotime($date_purchased. ' + 60days'));
        //     $next_date=$date_purchased;
        //     for($i=0;$i<60;$i++){
        //           $isSunday=$this->isSunday($next_date);
        //           $isHolidays=$this->isHoliday($next_date);
        //          if($isSunday || $isHolidays)
        //            $next_date=date('Y-m-d', strtotime($next_date. ' + 1days'));
        //           $next_date=date('Y-m-d', strtotime($next_date. ' + 1days'));
        //      }
        //      echo $next_date;
        //    }

    }


    public function makeInstallment(Request $request)
    {
        Transaction::$FIRE_EVENTS=true;
        $installment = new Installment();
        $installment->date = Carbon::parse($request->date)->format('Y-m-d');
        $installment->amount = $request->amount;
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

    private function setInstallmentDates(Transaction $transaction){
        $purchased_date = Carbon::parse($transaction->datepurchased);
        $due_date = Carbon::parse($transaction->duedate);
        $type =$transaction->paymenttype;
        $days = ($type === 'daily')?$this->daysBetween($purchased_date,$due_date):$this->daysBetween($purchased_date,$due_date,'weekly');
        foreach ($days as $day){
            Transaction::$FIRE_EVENTS=false;
            $installment = new Installment();
            $installment->payment_date = $day->format('Y-m-d');
            $installment->amount = $transaction->installment;
            $installment->remain = $transaction->remain;
            $transaction->installments()->save($installment);
        }
        Transaction::$FIRE_EVENTS=true;
    }



}
