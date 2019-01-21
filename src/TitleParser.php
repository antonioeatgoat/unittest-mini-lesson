<?php

namespace AntonioEatGoat\UnittestLesson;


class TitleParser {

	/**
	 * @var \WP_Post
	 */
	private $post;

	public function __construct( \WP_Post $post ) {
		$this->post = $post;
	}

	public function parse(): string {
		return strrev( $this->post->post_title );
	}
}