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

  $wp_customize->add_setting('themeColors_standard', array(
    'standard' => '#222',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_topNav', array(
    'standard' => '#ffff',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_topNavSub', array(
    'standard' => '#999',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_footerNav', array(
    'standard' => '#000',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('themeColors_pageLinks', array(
    'standard' => '#1e87f0',
    'transport' => 'refresh',
  ));

  $wp_customize->add_section('themeColors_standard', array(
    'title' => __('Standard theme colors', 'Slate'),
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

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_standard_control', array(
    'label' => __('Standard Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_standard',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_topNav_control', array(
    'label' => __('Top Nav Text Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_topNav',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_topNavSub_control', array(
    'label' => __('Top Nav Sub Text Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_topNavSub',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_footerNav_control', array(
    'label' => __('Footer Nav Text Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_footerNav',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColors_pageLinks_control', array(
    'label' => __('Page Links Text Color', 'Slate'),
    'section' => 'themeColors_standard',
    'settings' => 'themeColors_pageLinks',
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
    .uk-background-default { background-color: <?php echo get_theme_mod('themeColors_standard'); ?>; }

      /*topNav*/
      .topNav .uk-navbar-item h1 { color: <?php echo get_theme_mod('themeColors_topNav'); ?>; }
      .topNav .uk-navbar-item h2 { color: <?php echo get_theme_mod('themeColors_topNav'); ?>; }
      .topNav .uk-nav li>a { color: <?php echo get_theme_mod('themeColors_topNav'); ?>; }
      .topNav .uk-navbar-dropdown-nav>li>a { color: <?php echo get_theme_mod('themeColors_topNavSub'); ?>; }
      .uk-navbar-toggle { color: <?php echo get_theme_mod('themeColors_topNav'); ?>; }
      .uk-offcanvas-bar .uk-nav-primary>li>a { color: <?php echo get_theme_mod('themeColors_topNav'); ?>; }
      .uk-offcanvas-bar .uk-navbar-dropdown-nav>li>a { color: <?php echo get_theme_mod('themeColors_topNavSub'); ?>; }
      /*footerNav*/
      .uk-nav-default>li>a { color: <?php echo get_theme_mod('themeColors_footerNav'); ?>; }
      .uk-nav li>a { color: <?php echo get_theme_mod('themeColors_footerNav'); ?>; }

      /*pageLinks*/
      .uk-link, a { color: <?php echo get_theme_mod('themeColors_pageLinks'); ?>; }


    /*Gutenberg theme edits*/
    ul.wp-block-latest-posts li:hover { background-color: <?php echo get_theme_mod('themeColors_muted'); ?>; }

    /*Generel purpose theme edits*/
  </style>

<?php }

add_action('wp_head', 'slate_themeColors_customize_css');
