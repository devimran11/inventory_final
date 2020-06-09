<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
    protected $fillable = [
        'emp_id', 'month', 'year', 'advance_salary',
    ];
}
