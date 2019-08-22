<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holiday extends Model
{
    public function getDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}
