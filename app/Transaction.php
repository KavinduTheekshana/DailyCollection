<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{

    public function transaction_customer(){
        return $this->belongsTo(Customer::class,'customer');
    }

    public function installments(){
        return $this->hasMany(Installment::class);
    }
}
