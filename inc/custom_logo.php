<?php

//Custom Logo
add_theme_support( 'custom-logo', array(
  'label'       => 'Header Logo',
  'height'      => 100,
  'width'       => 100,
  'flex-height' => false,
  'flex-width'  => false,
  'header-text' => array( 'site-title', 'site-description' )
) );


function your_theme_customizer_setting($wp_customize) {
// add a setting
    $wp_customize->add_setting('your_theme_hover_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'your_theme_hover_logo', array(

        'label' => 'Footer Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'your_theme_hover_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'your_theme_customizer_setting');
