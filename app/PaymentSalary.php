<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSalary extends Model
{
    protected $fillable = [
        'employee_id', 'salary_month', 'paid_amount',
    ];
}
