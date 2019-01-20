<?php

namespace App\Http\Controllers;

use App\Country;
use App\Result;
use App\Vote;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index() {
		return view( 'index' );
	}

	public function results() {
		$data['results'] = DB::table( 'results' )
		                     ->selectRaw( 'sum(score) as sum, results.country_id, countries.title' )
		                     ->leftJoin( 'countries', 'results.country_id', 'countries.id' )
		                     ->groupBy( 'results.country_id', 'countries.title' )
		                     ->orderBy( 'sum', 'DESC' )
		                     ->get();

		$data['resultsMatrix'] =  Result::get();
		$data['countries'] = Country::get();

		return view( 'results.index', $data );
	}

	public function countries() {
		$data['countries'] = Country::get();

		return view( 'countries.index', $data );
	}

	public function country( Country $country ) {
		if ( @count( $country->voted ) ) {
			return redirect()->route( 'countries' );
		}
		$data['country']   = $country;
		$data['countries'] = Country::where( 'id', '!=', $country->id )->get();
		$data['votes']     = Vote::get();

		return view( 'countries.show', $data );
	}
}

