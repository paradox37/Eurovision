<?php

use Illuminate\Database\Seeder;
use App\Vote;

class VotesTableSeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Vote::create( [ 'score' => 1 ] );
		Vote::create( [ 'score' => 2 ] );
		Vote::create( [ 'score' => 3 ] );
		Vote::create( [ 'score' => 4 ] );
		Vote::create( [ 'score' => 5 ] );
		Vote::create( [ 'score' => 6 ] );
		Vote::create( [ 'score' => 7 ] );
		Vote::create( [ 'score' => 8 ] );
		Vote::create( [ 'score' => 10 ] );
		Vote::create( [ 'score' => 12 ] );
	}
}
