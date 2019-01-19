<?php

namespace App\Http\Controllers\API;

use App\Country;
use App\Result;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	public function countries() {
		return Country::get();
	}

	public function votes() {
		return Vote::get();
	}

	public function vote( Request $request ) {
		$input = $request->input();
		$votes = Vote::get();

		$results = [];
		foreach ( $input['countries'] as $key => $country ) {
			$results[ $key ]['voter_id']   = $input['id'];
			$results[ $key ]['country_id'] = $country;
			$results[ $key ]['score']    = $votes[ $key ]->score;
		}

		foreach ( $results as $result ) {
			Result::create( $result );
		}

		return $votes;
	}
}
