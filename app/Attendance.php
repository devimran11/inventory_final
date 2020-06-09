<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected  $fillable=[
        'user_id','att_date','att_year','attendance','month',
    ];
}
