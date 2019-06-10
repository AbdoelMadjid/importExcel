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
	    'sex_id',
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
		'monto_802',
		'monto_804',
		'monto_806',
		'monto_807',
		'monto_808',
		'memo',
    ];

    public function emails()
    {

    	return $this->hasMany(EmailEmployee::class);

    }

    public function phones()
    {

    	return $this->hasMany(Phone::class);

    }

    public function secretaries()
    {
    	return $this->belongsToMany(Secretary::class);
    }

    public function sex()
    {
    	return $this->belongsTo(Sex::class);
    }
}
