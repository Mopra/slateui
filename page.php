<?php
  get_header();
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
