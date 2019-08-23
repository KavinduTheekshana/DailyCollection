<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

}
