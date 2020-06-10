<?php
  get_header();
?>

<header>

<div class="topNav">

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
              				'items_wrap'     => '<ul id="%1$s" class="%2$s" uk-nav>%3$s</ul>',
                      'walker'         => new WPSE_78121_Sublevel_Walker,
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

<?php
  while ( have_posts() ) : the_post();
?>

<div class="uk-container uk-container-xsmall page-header">
  <?php the_title('<h1>','</h1>'); ?>
</div>
<div class="uk-container uk-container-xsmall">
  <?php the_content(); ?>
</div>
<?php
  endwhile;
  get_footer();
?>
