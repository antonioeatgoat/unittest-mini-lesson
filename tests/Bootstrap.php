<?php

namespace AntonioEatGoat\UnittestLesson\Test;

use PHPUnit\Framework\TestCase;

\WP_Mock::bootstrap();

class UnitTestCase extends TestCase {
	/**
	 * SetUp initial settings
	 */
	function setUp() {
		\WP_Mock::setUp();
	}
	/**
	 * Break down for next test
	 */
	function tearDown() {
		\WP_Mock::tearDown();
	}
}