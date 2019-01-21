<?php

namespace AntonioEatGoat\UnittestLesson;


class TitleParserFactory {

	public function create( \WP_Post $post ): TitleParser {
		return new TitleParser( $post );
	}
}