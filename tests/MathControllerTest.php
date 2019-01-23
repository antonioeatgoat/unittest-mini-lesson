<?php

namespace AntonioEatGoat\UnittestLesson\Test;

use AntonioEatGoat\UnittestLesson\MathController;
use AntonioEatGoat\UnittestLesson\MathFactory;
use PHPUnit\Framework\TestCase;

class MathControllerTest extends TestCase {

	public function test_calculate() {
		\WP_Mock::userFunction( 'current_user_can', [
			'times'  => 1,
			'args'   => 'manage_options',
			'return' => false
		] );

		$fetcher_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\OperandsFetcher' );
		$fetcher_mocked->shouldReceive( 'fetch_operand1' )->andReturn( 5 );
		$fetcher_mocked->shouldReceive( 'fetch_operand2' )->andReturn( 2 );

		$math_controller = new MathController( new MathFactory(), $fetcher_mocked );

		$this->assertEquals( 2.5, $math_controller->calculate() );
	}

	public function test_calculate_with_exception() {
		\WP_Mock::userFunction( 'current_user_can', [
			'times'  => 1,
			'args'   => 'manage_options',
			'return' => false
		] );

		$fetcher_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\OperandsFetcher' );
		$fetcher_mocked->shouldReceive( 'fetch_operand1' )->andReturn( 5 );
		$fetcher_mocked->shouldReceive( 'fetch_operand2' )->andReturn( 0 );

		$this->expectException( \RuntimeException::class );

		$math_controller = new MathController( new MathFactory(), $fetcher_mocked );
		$math_controller->calculate();
	}

	public function test_calculate_with_role_admin() {
		\WP_Mock::userFunction( 'current_user_can', [
			'times'  => 1,
			'args'   => 'manage_options',
			'return' => true
		] );

		$fetcher_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\OperandsFetcher' );
		$fetcher_mocked->shouldReceive( 'fetch_operand1' )->andReturn( 5 );
		$fetcher_mocked->shouldReceive( 'fetch_operand2' )->andReturn( 2 );

		$math_controller = new MathController( new MathFactory(), $fetcher_mocked );

		$this->assertEquals( 5, $math_controller->calculate() );
	}
}
