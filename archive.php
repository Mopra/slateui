<?php get_header(); ?>
<?php
	if ( have_posts() ) : 
?>
	<!--article section-->
	<section class="article-section">
		<div class="container">
			<div class="row">
				<div class="title">
					<?php single_term_title( '<h1>', '</h1>' ); ?>
				</div>
			</div>
			<div class="row">
				<?php 
				foreach ( $posts as $post) :
					setup_postdata( $post );
					?>
					<div class="col-xs-12 col-sm-6">
						<article class="article-item"><a href="<?php the_permalink(); ?>">
							<div class="bg-holder bg-cover"<?php if(has_post_thumbnail()):?> style="background-image: url(<?php echo get_thumbnail_src('850x518'); ?>);"<?php endif; ?>></div>
								<h3><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
							</a>
							
							<?php 
								$link_text       = get_field( 'link_text' );
								if($link_text):
							?>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo $link_text ?></a>
							<?php else: ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary">Læs mere</a>
							<?php endif; ?>
						</article>
					</div>
					<?php 
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<?php
		endif; 
	?>

<?php get_footer(); ?>



