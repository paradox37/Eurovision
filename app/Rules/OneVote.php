<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OneVote implements Rule {
	/**
	 * Create a new rule instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param  string $attribute
	 * @param  mixed $value
	 *
	 * @return bool
	 */
	public function passes( $attribute, $value ) {
		if ( @count( array_unique( $value ) ) == @count( $value ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message() {
		return 'You can not vote for the same country twice.';
	}
}
