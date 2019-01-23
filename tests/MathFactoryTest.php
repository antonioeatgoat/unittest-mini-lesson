<?php

namespace AntonioEatGoat\UnittestLesson\Test;

use AntonioEatGoat\UnittestLesson\Math;
use AntonioEatGoat\UnittestLesson\MathFactory;
use PHPUnit\Framework\TestCase;

class MathFactoryTest extends TestCase {

	public function test_create() {
		$expected     = new Math( 5, 2 );
		$math_factory = new MathFactory();

		$this->assertEquals( $expected, $math_factory->create( 5, 2 ) );
	}
}
