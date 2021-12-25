<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
	protected $fillable = [
			'first_name', 'last_name', 'email', 'phone', 'address1', 'address2', 'city', 'state', 'zip_code', 'country', 'affiliate'
	];
	
	
//	public function user()
//	{
//		return $this->belongsTo('App\User');
//	}
}