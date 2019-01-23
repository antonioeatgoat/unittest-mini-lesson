<?php

namespace AntonioEatGoat\UnittestLesson;

class Bootstrap {

	public static function init() {
		$posts_manager = new MathController();

		$posts_manager->init_hooks();

	}

}