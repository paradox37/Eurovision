<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
	protected $fillable = [
		'title',
		'code'
	];

	public function votes() {
		return $this->belongsToMany( 'App\Vote' );
	}

	public function voted() {
		return $this->hasMany('App\Result', 'voter_id');
	}
}
