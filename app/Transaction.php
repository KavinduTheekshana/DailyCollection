<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{

    public static $FIRE_EVENTS = true;

    public function transaction_customer(){
        return $this->belongsTo(Customer::class,'customer');
    }

    public function installments(){
        return $this->hasMany(Installment::class);
    }

    public function complete(){
        if($this::$FIRE_EVENTS) {
            Transaction::$FIRE_EVENTS = false;
            $this->status = 1;
            $this->save();
        }
    }
}
