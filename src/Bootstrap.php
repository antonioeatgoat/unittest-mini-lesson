<?php

namespace AntonioEatGoat\UnittestLesson;

class Bootstrap {

	public static function init() {
		$title_parsers_factory = new MathFactory();
		$operands_fetcher      = new OperandsFetcher();
		$posts_manager         = new MathController( $title_parsers_factory, $operands_fetcher );

		$posts_manager->init_hooks();

	}

}