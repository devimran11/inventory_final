<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'experience', 'salary', 'vacation', 'city','nid_no', 'photo',
    ];
}
