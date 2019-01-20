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
		return $this->hasMany( 'App\Result', 'voter_id' );
	}

	public function countryVote( $voter, $votedFor ) {
		$result = Result::where( 'voter_id', $voter->id )->where( 'country_id', $votedFor->id )->first();
		return $result ? $result->score : '';
	}
}
