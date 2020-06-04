<?php
/*
Template Name: Blog Masonry
*/
?>

<?php get_header(); ?>

<div class="uk-container uk-container-xsmall">
  <?php
    while ( have_posts() ) : the_post();

    the_title();
    the_content();

    endwhile;
  ?>

</div>

<?php get_footer(); ?>
