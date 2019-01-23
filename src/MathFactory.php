<?php

namespace AntonioEatGoat\UnittestLesson;


class MathFactory {

	/**
	 * @param int $operand1
	 * @param int $operand2
	 *
	 * @return Math
	 */
	public function create( int $operand1, int $operand2 ): Math {
		return new Math( $operand1, $operand2 );
	}
}