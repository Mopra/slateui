<?php

function slate_themeColors_customize_register( $wp_customize ) {

  $wp_customize->add_setting('themeColors_primary', array(
    'standard' => '#1e87f0',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_secondary', array(
    'standard' => '#222',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_muted', array(
    'standard' => '#222',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_default', array(
    'standard' => '#222',
    'transport' => 'refresh',
  ));

  $wp_customize->add_section('themeColors_standard', array(
    'title' => __('standard theme colors', 'Slate'),
    'priority' => 30,
  ));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_primary_control', array(
    'label' => __('Primary Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_primary',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_secondary_control', array(
    'label' => __('Secondary Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_secondary',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_muted_control', array(
    'label' => __('Muted Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_muted',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_default_control', array(
    'label' => __('Default Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_default',
  ) ) );

}

add_action('customize_register', 'slate_themeColors_customize_register');


//Output themeColors

function slate_themeColors_customize_css() { ?>

  <style type="text/css">
    /*UK theme edits*/
    .uk-background-primary { background-color: <?php echo get_theme_mod('themeColors_primary'); ?>; }
    .uk-navbar-primary { background-color: <?php echo get_theme_mod('themeColors_primary'); ?>; }
    .uk-background-secondary { background-color: <?php echo get_theme_mod('themeColors_secondary'); ?>; }
    .uk-background-muted { background-color: <?php echo get_theme_mod('themeColors_muted'); ?>; }
    .uk-background-standard { background-color: <?php echo get_theme_mod('themeColors_default'); ?>; }
    .uk-link, a { color: <?php echo get_theme_mod('themeColors_secondary'); ?>; }
    /*Gutenberg theme edits*/
    ul.wp-block-latest-posts li:hover { background-color: <?php echo get_theme_mod('themeColors_muted'); ?>; }

    /*Generel purpose theme edits*/
  </style>

<?php }

add_action('wp_head', 'slate_themeColors_customize_css');
