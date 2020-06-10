<?php

// Default settings
include( get_template_directory() . '/inc/default.php' );

// Custom Post Types
include( get_template_directory() . '/inc/cpt.php' );

// Theme functions
include( get_template_directory() . '/inc/theme_functions.php' );

// Theme thumbnails
include( get_template_directory() . '/inc/thumbnails.php' );

// Theme menus
include( get_template_directory() . '/inc/menus.php' );

// Theme css & js
include( get_template_directory() . '/inc/scripts.php' );

// Disable stuff to optimize WP
include( get_template_directory() . '/inc/optimize.php' );

// Theme logo
include( get_template_directory() . '/inc/custom_logo.php' );

// Theme text blocks
include( get_template_directory() . '/inc/text_blocks.php' );

// Theme colors
include( get_template_directory() . '/inc/theme_colors.php' );


class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap uk-navbar-dropdown'><ul class='sub-menu uk-nav uk-navbar-dropdown-nav'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}
