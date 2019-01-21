<?php

namespace AntonioEatGoat\UnittestLesson;


class PostsManager {

	/**
	 * @var TitleParser
	 */
	private $title_parser_factory;

	public function __construct( TitleParserFactory $title_parser_factory ) {
		$this->title_parser_factory = $title_parser_factory;
	}

	public function init_hooks() {
		add_filter( 'the_title', [ $this, 'override_title' ], 10, 2 );
	}

	public function override_title( string $title, int $post_id ): string {
		$post = get_post( $post_id );

		$title_parser = $this->title_parser_factory->create( $post );

		return apply_filters( 'eatgoat/title_parser/post_title', $title_parser->parse(), $post );
	}

}