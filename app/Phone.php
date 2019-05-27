<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
	    'employee_id',
	    'phone',
	    'code',
    ];
}
