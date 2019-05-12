<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
	    'cedula',
	    'name',
	    'sex',
	    'date_admission',
		'birthday',
		'type',
		'cost',
		'cost_description',
		'sap',
		'sap_description',
		'job',
		'job_description',
		'location',
    ];
}
