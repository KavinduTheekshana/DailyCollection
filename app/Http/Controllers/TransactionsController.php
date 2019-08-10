<?php

namespace App\Http\Controllers;

use Carbon\carbon;
// use DB;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function duedate(Request $request)
    {
        $datepurchased = $request->date;

        // $holidays = DB::table('holidays')->get();
        // foreach ($holidays as $holiday) {
        //     $holidayDate = new Carbon($holiday->date);
        //     $date2 = Carbon::parse($holidayDate)->toDateString();
        // }

        // if ($date1->lt($date2)) {
        // }

        $now = new Carbon();
        $x = 0;

        while ($x < 60) {
            $date1 = Carbon::parse($now);
            $string = $date1->englishDayOfWeek;
            if ($string != "Sunday") {
                $now->addDays(1);
                $x = $x + 1;

            } else {
                $now->addDays(1);
            }
        }
        return $now->toDateString();

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
}
