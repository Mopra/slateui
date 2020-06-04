<?php


/*
 * Register Our Customizer Stuff Here
 */
function slate_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'text_blocks', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Text Blocks', 'slate' ),
		'description'    => __( 'Set editable text for certain content.', 'slate' ),
	) );

	// Add Footer Text
	// Add setting
	$wp_customize->add_setting( 'footer_text_block', array(
		 'default'           => __( '', 'slate' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	$wp_customize->add_setting( 'footer2_text_block', array(
		 'default'           => __( '', 'slate' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add section.
	$wp_customize->add_section( 'custom_footer_text' , array(
		'title'    => __('Change Footer Text','slate'),
		'panel'    => 'text_blocks',
		'priority' => 10
	) );

	$wp_customize->add_section( 'custom_footer2_text' , array(
		'title'    => __('Change Footer2 Text','slate'),
		'panel'    => 'text_blocks',
		'priority' => 10
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_footer_text',
		    array(
		        'label'    => __( 'Footer Text', 'slate' ),
		        'section'  => 'custom_footer_text',
		        'settings' => 'footer_text_block',
		        'type'     => 'text'
		    )
	    )
	);

	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_footer2_text',
		    array(
		        'label'    => __( 'Footer2 Text', 'slate' ),
		        'section'  => 'custom_footer2_text',
		        'settings' => 'footer2_text_block',
		        'type'     => 'textarea'
		    )
	    )
	);


 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}

// Change the footer text in Genesis with a back up if blank
add_filter('slate_footer_creds_text', 'slatechild_footer_text');

function slatechild_footer_text() {
	if( get_theme_mod( 'footer_text_block') != "" ) {
		echo get_theme_mod( 'footer_text_block');
	}
	else{
		echo ''; // Add you default footer text here
	}

}

add_action( 'customize_register', 'slate_register_theme_customizer' );
