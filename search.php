<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<h1><?php printf( __( 'Search Results for: %s', 'slate' ), '<span>' . get_search_query() . '</span>'); ?></h1>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'blocks/content', get_post_type() ); ?>
	<?php endwhile; ?>
	<?php get_template_part( 'blocks/pager' ); ?>
	<?php else : ?>
	<?php get_template_part( 'blocks/not_found' ); ?>
	<?php endif; ?>
	<?php get_footer(); ?>
