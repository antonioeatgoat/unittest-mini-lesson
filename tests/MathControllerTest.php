<?php

namespace AntonioEatGoat\UnittestLesson\Test;

use AntonioEatGoat\UnittestLesson\MathController;
use PHPUnit\Framework\TestCase;

class MathControllerTest extends TestCase {

	public function test_calculate( ) {
		$expected = 5;

		$math_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\Math' );
		$math_mocked->shouldReceive( 'divide' )->andReturn( $expected );

		$math_factory_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\MathFactory' );
		$math_factory_mocked->shouldReceive( 'create' )->andReturn( $math_mocked );

		$math_controller = new MathController( $math_factory_mocked );

		$this->assertEquals( $expected, $math_controller->calculate() );
	}

	public function test_calculate_with_exception( ) {
		$expected = 5;

		$math_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\Math' );
		$math_mocked->shouldReceive( 'divide' )->andThrow( \RuntimeException::class );

		$math_factory_mocked = \Mockery::mock( 'AntonioEatGoat\UnittestLesson\MathFactory' );
		$math_factory_mocked->shouldReceive( 'create' )->andReturn( $math_mocked );

		$math_controller = new MathController( $math_factory_mocked );

		$this->expectException( \RuntimeException::class );

		$this->assertEquals( $expected, $math_controller->calculate() );
	}

}
