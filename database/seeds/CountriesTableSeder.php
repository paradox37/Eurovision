<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$countries = [
			[ 'title' => 'Albania', 'code' => 'al' ],
			[ 'title' => 'Armenia', 'code' => 'am' ],
			[ 'title' => 'Australia', 'code' => 'au' ],
			[ 'title' => 'Austria', 'code' => 'at' ],
			[ 'title' => 'Azerbaijan', 'code' => 'az' ],
			[ 'title' => 'Belarus', 'code' => 'by' ],
			[ 'title' => 'Belgium', 'code' => 'be' ],
			[ 'title' => 'Bosnia and Herzegovina', 'code' => 'ba' ],
			[ 'title' => 'Bulgaria', 'code' => 'bg' ],
			[ 'title' => 'Croatia', 'code' => 'hr' ],
			[ 'title' => 'Cyprus', 'code' => 'cy' ],
			[ 'title' => 'Czech Republic', 'code' => 'cz' ],
			[ 'title' => 'Denmark', 'code' => 'dk' ],
			[ 'title' => 'Estonia', 'code' => 'ee' ],
			[ 'title' => 'Finland', 'code' => 'fi' ],
			[ 'title' => 'France', 'code' => 'fr' ],
			[ 'title' => 'Georgia', 'code' => 'ge' ],
			[ 'title' => 'Germany', 'code' => 'de' ],
			[ 'title' => 'Greece', 'code' => 'gr' ],
			[ 'title' => 'Hungary', 'code' => 'hu' ],
			[ 'title' => 'Iceland', 'code' => 'is' ],
			[ 'title' => 'Ireland', 'code' => 'ie' ],
			[ 'title' => 'Israel', 'code' => 'il' ],
			[ 'title' => 'Italy', 'code' => 'it' ],
			[ 'title' => 'Latvia', 'code' => 'lv' ],
			[ 'title' => 'Lithuania', 'code' => 'lt' ],
			[ 'title' => 'Macedonia', 'code' => 'mk' ],
			[ 'title' => 'Malta', 'code' => 'ml' ],
			[ 'title' => 'Moldova', 'code' => 'md' ],
			[ 'title' => 'Montenegro', 'code' => 'me' ],
			[ 'title' => 'Netherlands', 'code' => 'nl' ],
			[ 'title' => 'Norway', 'code' => 'no' ],
			[ 'title' => 'Poland', 'code' => 'pl' ],
			[ 'title' => 'Portugal', 'code' => 'pt' ],
			[ 'title' => 'Romania', 'code' => 'ro' ],
			[ 'title' => 'Russia', 'code' => 'ru' ],
			[ 'title' => 'San Marino', 'code' => 'sm' ],
			[ 'title' => 'Serbia', 'code' => 'rs' ],
			[ 'title' => 'Slovakia', 'code' => 'sk' ],
			[ 'title' => 'Slovenia', 'code' => 'si' ],
			[ 'title' => 'Spain', 'code' => 'es' ],
			[ 'title' => 'Sweden', 'code' => 'se' ],
			[ 'title' => 'Switzerland', 'code' => 'ch' ],
			[ 'title' => 'Turkey', 'code' => 'tr' ],
			[ 'title' => 'Ukraine', 'code' => 'ua' ],
			[ 'title' => 'United Kingdom', 'code' => 'gb' ]
		];

		foreach ($countries as $country){
			Country::create($country);
		}
	}
}
