<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable=[
        'details','amount','month','date','year',
    ];
}
