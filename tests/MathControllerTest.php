<?php

namespace AntonioEatGoat\UnittestLesson\Test;

use AntonioEatGoat\UnittestLesson\MathController;
use AntonioEatGoat\UnittestLesson\MathFactory;
use PHPUnit\Framework\TestCase;

class MathControllerTest extends TestCase {

	public function test_calculate( ) {
		$fetcher_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\OperandsFetcher' );
		$fetcher_mocked->shouldReceive( 'fetch_operand1' )->andReturn( 5 );
		$fetcher_mocked->shouldReceive( 'fetch_operand2' )->andReturn( 2 );

		$math_controller = new MathController( new MathFactory(), $fetcher_mocked );

		$this->assertEquals( 2.5, $math_controller->calculate() );
	}

	public function test_calculate_with_exception( ) {
		$fetcher_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\OperandsFetcher' );
		$fetcher_mocked->shouldReceive( 'fetch_operand1' )->andReturn( 5 );
		$fetcher_mocked->shouldReceive( 'fetch_operand2' )->andReturn( 0 );

		$this->expectException( \RuntimeException::class );

		$math_controller = new MathController( new MathFactory(), $fetcher_mocked );
		$math_controller->calculate();
	}

}
