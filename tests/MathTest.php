<?php

namespace AntonioEatGoat\UnittestLesson\Test;

use AntonioEatGoat\UnittestLesson\Math;

class MathTest extends UnitTestCase {

	/**
	 * @dataProvider provider_multiply
	 *
	 * @param $expected
	 * @param $operand1
	 * @param $operand2
	 */
	public function test_multiply( $expected, $operand1, $operand2 ) {
		$math = new Math( $operand1, $operand2 );

		$this->assertEquals( $expected, $math->multiply() );
	}

	public function provider_multiply() {
		return [
			[ 0, 0, 3 ],
			[ 15, 3, 5 ],
			[ -5, -1, 5 ],
			[ 5, -1, -5 ],
		];
	}

	/**
	 * @dataProvider provider_divide
	 *
	 * @param $expected
	 * @param $operand1
	 * @param $operand2
	 */
	public function test_divide( $expected, $operand1, $operand2 ) {
		$math = new Math( $operand1, $operand2 );

		$this->assertEquals( $expected, $math->divide() );
	}

	public function provider_divide() {
		return [
			[ 0, 0, 3 ],
			[ 0.6, 3, 5 ],
			[ -0.2, -1, 5 ],
			[ 0.2, -1, -5 ],
		];
	}

	public function test_divide_with_exception() {
		$math = new Math( 5, 0 );

		$this->expectException( \Exception::class );

		$math->divide();
	}

	/**
	 * @dataProvider provider_sum
	 *
	 * @param $expected
	 * @param $operand1
	 * @param $operand2
	 */
	public function test_sum( $expected, $operand1, $operand2 ) {
		$math = new Math( $operand1, $operand2 );

		$this->assertEquals( $expected, $math->sum() );
	}

	public function provider_sum() {
		return [
			[ 3, 0, 3 ],
			[ 8, 3, 5 ],
			[ 4, -1, 5 ],
			[ -6, -1, -5 ],
		];
	}

	/**
	 * @dataProvider provider_subtract
	 *
	 * @param $expected
	 * @param $operand1
	 * @param $operand2
	 */
	public function test_subtract( $expected, $operand1, $operand2 ) {
		$math = new Math( $operand1, $operand2 );

		$this->assertEquals( $expected, $math->subtract() );
	}

	public function provider_subtract() {
		return [
			[ 5, 10, 5 ],
			[ -3, 0, 3 ],
			[ -2, 3, 5 ],
			[ -6, -1, 5 ],
			[ 4, -1, -5 ],
		];
	}
}
