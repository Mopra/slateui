<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<script type="text/javascript">
		var pathInfo = {
			base: '<?php echo get_template_directory_uri(); ?>/',
			css: 'css/',
			js: 'js/',
			swf: 'swf/',
		}
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>

<div class="uk-light">

  <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky uk-navbar-transparent; cls-inactive: uk-navbar-transparent; top: 200">

      <nav class="uk-navbar-container uk-background-primary" uk-navbar>

        <div class="uk-navbar-left">
          <div class="uk-navbar-item uk-logo">
            <?php
               $custom_logo_id = get_theme_mod( 'custom_logo' );
               $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>
            <a href="/"><img src="<?php echo $image[0]; ?>" alt=""></a>
          </div>
          <div class="uk-navbar-item uk-inline">
            <h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
            <h2><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2>
          </div>
        </div>

        <div class="uk-navbar-right uk-visible@m">
          <div class="uk-navbar-item">

                <?php
              		if( has_nav_menu( 'primary' ) ){
              			wp_nav_menu( array(
              				'container'      => false,
              				'theme_location' => 'primary',
              				'menu_class'     => 'uk-navbar-nav',
              				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              			));
              		}
            		?>

          </div>
        </div>

        <div class="uk-navbar-right uk-hidden@m">
            <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="" uk-toggle="target: #offcanvas-nav"></a>
        </div>

      </nav>
  </div>

</div>


<div id="offcanvas-nav" uk-offcanvas="mode: push; overlay: true; esc-close: true; flip: true; overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column uk-background-primary">

       <button class="uk-offcanvas-close" type="button" uk-close></button>
        <?php
          if( has_nav_menu( 'primary' ) ){
            wp_nav_menu( array(
              'container'      => false,
              'theme_location' => 'primary',
              'menu_class'     => 'uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical',
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
          }
        ?>

    </div>
</div>


</header>
<main>
