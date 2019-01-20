<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {
	protected $fillable = [
		'country_id',
		'voter_id',
		'score'
	];

	public function country(){
		return $this->hasOne('App\Country', 'id', 'country_id');
	}
}
