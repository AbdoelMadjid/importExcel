<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailEmployee extends Model
{
    protected $fillable = [
    	'employee_id',
		'email',
    ];
}
