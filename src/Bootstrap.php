<?php

namespace AntonioEatGoat\UnittestLesson;

class Bootstrap {

	public static function init() {
		$title_parsers_factory = new MathFactory();
		$posts_manager         = new MathController( $title_parsers_factory );

		$posts_manager->init_hooks();

	}

}