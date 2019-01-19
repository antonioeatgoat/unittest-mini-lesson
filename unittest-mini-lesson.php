<?php

/*
 * Plugin Name: Unit test lesson
 * Description: A plugin used for a small unittest lesson on WordPress
 * Version: 1.0.0
 */

use AntonioEatGoat\UnittestLesson\Bootstrap;

define( 'UML_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( file_exists( UML_PLUGIN_DIR . 'vendor/autoload.php' ) ) {
	require_once UML_PLUGIN_DIR . 'vendor/autoload.php';
}

Bootstrap::init();