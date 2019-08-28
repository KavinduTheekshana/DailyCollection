<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function scopeDueToToday($query){
        return $query->whereStatus(0)
            ->whereDate('payment_date','<=',Carbon::now()->format('Y-m-d'));
    }

}
