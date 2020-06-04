<?php
// Theme css & js

function slate_scripts_styles() {
	$in_footer = true;

	//UIKIT JS
	wp_enqueue_script( 'slate-bootstrap-js', 'https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit.min.js', array( 'jquery' ), '', $in_footer );
	wp_enqueue_script( 'slate-bootstrap-js', 'https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit-icons.min.js', array( 'jquery' ), '', $in_footer );
	//CUSTOM JQUERY
	wp_enqueue_script( 'slate-script', get_template_directory_uri() . '/js/jquery.main.js', array( 'jquery' ), '', $in_footer );
	//UIKIT CSS
	wp_enqueue_style( 'slate-uikit-css', 'https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/css/uikit.min.css', array() );
	//GOOGLE FONTS
	wp_enqueue_style( 'slate-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700%7CPublic+Sans:400,900,900i&display=swap', array() );
	//CUSTOM STYLING
	wp_enqueue_style( 'slate-style', get_stylesheet_uri(), array() );
	//THEME STYLING
	wp_enqueue_style( 'slate-theme', get_template_directory_uri() . '/css/theme.css', array() );
	//THEME SLATEUI GUTENBERG BLOCKS
	wp_enqueue_style( 'slate-gutenberg', get_template_directory_uri() . '/css/gutenberg.css', array() );

}
add_action( 'wp_enqueue_scripts', 'slate_scripts_styles' );
