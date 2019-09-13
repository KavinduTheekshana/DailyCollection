<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function scopeDueToToday($query)
    {
        return $query/*->whereStatus(0)*/
            ->whereDate('payment_date', '<=', Carbon::now()->format('Y-m-d'));
    }

    public function scopeTransactionWithTodayInstallment($query,$route =null)
    {
        $today = Carbon::now();
        $referenceTimeHour = 14;
        if ($referenceTimeHour < $today->hour) {
            if ($route){
                $dueInstallmemts = Installment::WhereHas('transaction', function ($query)  use ($route){
                    $query->where('route', '=', $route);
                })
                    ->whereDate('payment_date', Carbon::now()->format('Y-m-d'))
                    ->whereStatus(0)->with(['transaction', 'transaction.customerData']);
            }else{
                $dueInstallmemts = Installment::whereDate('payment_date', Carbon::now()->format('Y-m-d'))
                    ->whereStatus(0)->with(['transaction', 'transaction.customerData']);
            }

        } else {
            if ($route){
                $dueInstallmemts = Installment::WhereHas('transaction', function ($query) use ($route) {
                    $query->where('route', '=', $route);
                })
                    ->whereDate('payment_date', Carbon::yesterday()->format('Y-m-d'))
                    ->whereStatus(0)->with(['transaction', 'transaction.customerData']);
            }else{
                $dueInstallmemts = Installment::whereDate('payment_date', Carbon::yesterday()->format('Y-m-d'))
                    ->whereStatus(0)->with(['transaction', 'transaction.customerData']);
            }

        }

        return $dueInstallmemts;

    }

}
