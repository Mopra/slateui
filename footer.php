</main>
<footer class="uk-background-muted">

  <div class="uk-container uk-container-xsmall">
    <div class="uk-child-width-expand" uk-grid>

      <div>
        <?php if( get_theme_mod( 'your_theme_hover_logo') != "" ): ?>
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod( 'your_theme_hover_logo'); ?>"></a>
        <?php endif; ?>
      </div>

      <div class="uk-inline uk-margin-small-left">

          <?php
          if( has_nav_menu( 'primary' ) ){
            wp_nav_menu( array(
              'container'      => false,
              'theme_location' => 'primary',
              'menu_class'     => 'uk-nav uk-nav-default uk-position-center	',
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
          }
          ?>

      </div>
      <div class="uk-inline uk-margin-small-left">

          <?php
          if( has_nav_menu( 'secondary' ) ){
            wp_nav_menu( array(
              'container'      => false,
              'theme_location' => 'secondary',
              'menu_class'     => 'uk-nav uk-nav-default uk-position-center	',
              'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
          }
          ?>

      </div>
    </div>
  </div>

</footer>
<address class="uk-background-muted">
  <div class="uk-container uk-container-xsmall">
    <div class="uk-panel">

        <?php if( get_theme_mod( 'footer_text_block') != "" ): ?>
          <?php echo get_theme_mod( 'footer_text_block'); ?>
        <?php endif; ?>

        <?php if( get_theme_mod( 'footer2_text_block') != "" ): ?>
          <?php echo get_theme_mod( 'footer2_text_block'); ?>
        <?php endif; ?>

    </div>
  </div>
</address>

<?php wp_footer(); ?>
</body>
</html>
