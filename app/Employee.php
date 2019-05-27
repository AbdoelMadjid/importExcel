<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
	use SoftDeletes;

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
		'affiliated',
		'affiliated_date',
		'disaffiliated_date',
		'description',
    ];

    public function emails()
    {

    	return $this->hasMany(EmailEmployee::class);

    }

    public function phones()
    {

    	return $this->hasMany(Phone::class);

    }
}
