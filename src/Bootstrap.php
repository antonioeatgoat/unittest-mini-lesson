<?php

namespace AntonioEatGoat\UnittestLesson;

class Bootstrap {

	public static function init() {
		$math = new Math( 5, 2 );

		try {
			wp_die( $math->divide() );
		} catch ( \RuntimeException $e ) {
			wp_die( $e->getMessage() );
		}
	}

}