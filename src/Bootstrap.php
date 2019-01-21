<?php

namespace AntonioEatGoat\UnittestLesson;

class Bootstrap {

	public static function init() {
		$title_parsers_factory = new TitleParserFactory();
		$posts_manager         = new PostsManager( $title_parsers_factory );

		$posts_manager->init_hooks();

	}

}