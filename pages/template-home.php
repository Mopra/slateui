<?php
/*
Template Name: Home Template
*/
get_header();

$title 			  = get_field( 'title' );
$background_image = get_field( 'background_image' );
$text 			  = get_field( 'text_intro' );
$link 			  = get_field( 'link' );

if($background_image || $title || $text || $link):
	?>
	<!-- intro section-->
	<section class="intro-section">
		<div class="container">
			<?php if ($background_image || $title): ?>
				<div class="heading-holder">
					<?php if ($background_image): ?>
						<div class="bg-holder bg-cover" style="background-image: url(<?php echo $background_image; ?>);"></div>
					<?php endif; ?>
					<?php if ($title): ?>
						<div class="fake-heading">
							<strong class="h1"><?php echo do_shortcode($title); ?></strong>
							<div class="heading-block">
								<h1 class="typed" data-text='<?php echo do_shortcode($title); ?>'></h1>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ($text || $link): ?>
				<div class="text-holder">
					<?php
					if ($text) {
						echo $text;
					}
					if ($link) {
						echo wps_get_link($link,'btn btn-primary');
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php 
endif;
if ( $posts = get_field( 'articles' ) ) : 

	?>
	<!--article section-->
	<section class="article-section">
		<div class="container">
			<div class="row">
				<?php 
				foreach ( $posts as $post) :
					setup_postdata( $post );
					?>
					<div class="col-xs-12 col-sm-6">
						<article class="article-item"><a href="<?php the_permalink(); ?>">
							<div class="bg-holder bg-cover"<?php if(has_post_thumbnail()):?> style="background-image: url(<?php echo get_thumbnail_src('341x208'); ?>);"<?php endif; ?>></div>
							<div class="text-holder">
								<h3><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
							</div></a>
							
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


$image       = get_field( 'image' );
$blockquote  = get_field( 'blockquote' );
$author_name = get_field( 'author_name' );
$position    = get_field( 'position' );

if($image || $author_name || $position || $blockquote):
	?>
	<!-- blockquote box -->
	<div class="blockquote-holder">
		<div class="container">
			<blockquote>
				<?php echo $blockquote; ?>
				<footer class="blockquote-footer">
					<?php if ($image): ?>
						<div class="img-block rounded-circle">
							<?php echo wp_get_attachment_image($image['id'],'64x64'); ?>
						</div>
					<?php endif; ?>
					<?php if ($author_name || $position): ?>
						<cite>
							<?php if ($author_name): ?>
								<span class="author-name"><?php echo $author_name; ?></span>
							<?php endif; ?>
							<?php if ($position): ?>
								<span class="position"><?php echo $position; ?></span>
							<?php endif; ?>
						</cite>
					<?php endif; ?>
				</footer>
			</blockquote>
		</div>
	</div>
	<?php 
endif;

$vimeo_id 				= get_field( 'vimeo_id' );
$background_image_video = get_field( 'background_image_video' );
$text 					= get_field( 'text' );

if($background_image_video || $vimeo_id || $text):
	?>
	<!-- video block-->
	<div class="video-holder">
		<div class="container">
			<div class="row">
				<?php if ($background_image_video || $vimeo_id): ?>
					<div class="col-sm-12 col-md-6">
						<div class="video-box bg-cover" data-background-video='{"type": "vimeo", "video": "<?php echo $vimeo_id; ?>", "autoplay": false, "fluidWidth": true}' style="background-image: url(<?php echo $background_image_video; ?>)">
							<a href="#" class="btn-play"><i class="icon-play-btn"></i></a>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($text): ?>
					<div class="col-sm-12 col-md-6">
						<div class="text-holder">
							<?php echo $text; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php 
endif;
get_template_part( 'blocks/contact' );
get_footer();
?>