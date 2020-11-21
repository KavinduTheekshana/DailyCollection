<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{

    const weekend = Carbon::SUNDAY;
    public static $FIRE_EVENTS = true;

    public function transaction_customer()
    {
        return $this->belongsTo(Customer::class, 'customer');
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function customerData()
    {
        return $this->belongsTo(Customer::class, 'customer');
    }

    public function complete()
    {
        if ($this::$FIRE_EVENTS) {
            Transaction::$FIRE_EVENTS = false;
            $this->status = 1;
            $this->save();
            $this->deleteInstalments($this);
        }
    }

    public function deleteInstalments($transaction){
       $installments = Installment::whereBetween('payment_date',[Carbon::now(),$transaction->duedate])->whereStatus(0)->get()->pluck('id');
       Installment::destroy($installments);
    }


}
