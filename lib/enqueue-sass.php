<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
function reverie_sass_style()
{
	// Register the main style
	wp_register_style( 'normalize-stylesheet', get_template_directory_uri() . '/css/normalize.css', array(), '', 'all' );
	wp_register_style( 'oniris-stylesheet', get_template_directory_uri() . '/css/style.css', array(), '', 'all' );
	wp_enqueue_style( 'normalize-stylesheet' );
	wp_enqueue_style( 'oniris-stylesheet' );
}
add_action( 'wp_enqueue_scripts', 'reverie_sass_style' );
?>