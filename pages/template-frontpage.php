<?php
/*
Template Name: Frontpage Template
*/
get_header();

$title 			= get_field( 'title' );
$atf_img		= get_field( 'atf_img' );
$text 			= get_field( 'text_intro' );
$link 			= get_field( 'link' );

if($atf_img || $title || $text || $link):
	?>
	<!-- intro section-->
	<section class="atf">
		<div class="container-fluid">
			<div class="row">

			<div class="col-xl-8">
	
				
				<?php
					$vimeo_id 				= get_field( 'vimeo_id' );
					$background_image_video = get_field( 'background_image_video' );
					if ($vimeo_id): 
				?>
				<div class="atf_vid" style="background-image:url('<?php echo $background_image_video; ?>');">
				
					<iframe frameborder="0" src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>?api=1&background=1&autoplay=1&loop=1" border="none"></iframe>
					
				</div>
				<?php endif; ?>
	
			</div>
			
			<div class="col-xl-4">
				<?php if ($atf_img): ?>
					<div class="atf_img" style="background-image: url(<?php echo $atf_img; ?>);"></div>
				<?php endif; ?>
				<?php if ($title || $text || $link): ?>
					<div class="atf_txt">
						<h1>
							<?php
							if ($title) {
								echo $title;
							}
							?>
						</h1>
						<?php
						if ($text) {
							echo $text;
						}
						if ($link) {
							echo wps_get_link($link,'btn btn-primary');
						}
						?>
						<a href="#doors" class="mouse"></a>
					</div>
				<?php endif; ?>
				
			</div>

			</div>
		</div>
	</section>
<?php endif; ?>





<?php 
	while ( have_rows('doors' ) ) : the_row();

	$door_class 	= get_sub_field( 'door_class' );	
	$door_icon 		= get_sub_field( 'door_icon' );		
	$door_heading 	= get_sub_field( 'door_heading' );	
	$door_text 		= get_sub_field( 'door_text' );	
	$door_link 		= get_sub_field( 'door_link' );	

	if ( get_row_layout() == 'door' ) {
?>
<div class="container-fluid doors" id="doors">
<div class="row">
	<div class="col-xl-3 col-lg-6">
		<div class="door <?php echo $door_class; ?>">
			<div class="door-content">
				<?php echo wp_get_attachment_image( get_sub_field( 'door_icon' )['id'], 'full');  ?>
				<h3><?php echo $door_heading; ?></h3>
				<p><?php echo $door_text; ?></p>
				<?php echo wps_get_link($door_link,'btn btn-primary'); ?>	
			</div>
		</div>
	</div>
</div>
</div>	
<?php 
	}
	endwhile;
?>	




<div class="container-fluid doors-new" id="doors-new">
<div class="row">

<?php 
	while ( have_rows('doors_new' ) ) : the_row();

	$door_new_class 	= get_sub_field( 'door_new_class' );	
	$door_new_icon 		= get_sub_field( 'door_new_icon' );		
	$door_new_heading 	= get_sub_field( 'door_new_heading' );	
	$door_new_text 		= get_sub_field( 'door_new_text' );	
	$door_new_link 		= get_sub_field( 'door_new_link' );	
	$door_new_video	= get_sub_field( 'door_new_video' );	

	if ( get_row_layout() == 'door_new' ) {
?>

	<div class="col-xl-3 col-lg-6">
		<div class="door-new" style="background-image:linear-gradient(<? echo $door_new_class; ?>), url(<?php echo $door_new_icon; ?>);">

				<div class="door-new-video">

					<?php if($door_new_video): ?>
					<iframe frameborder="0" src="https://player.vimeo.com/video/<?php echo $door_new_video; ?>?api=1&background=1&autoplay=1&loop=1" border="none"></iframe>
					<div class="vid-overlay"></div>
					<?php endif; ?>

				</div>
				<div class="door-new-content">

					<h3><?php echo $door_new_heading; ?></h3>
					<p><?php echo $door_new_text; ?></p>
					<?php echo wps_get_link($door_new_link,'btn btn-primary'); ?>	
				</div>
	
		</div>
	</div>
		
<?php 
	}
	endwhile;
?>	
</div>
</div>


<div class="container-fluid">
<div class="row">

<?php 
	$mission 			= get_field('mission');
	$mission_background = get_field('mission_background');
?>
	
	<?php if($mission || $mission_background): ?>
		<div class="mission" style="background-image: url(<?php echo $mission_background; ?>);">
			<div class="mission-content">
				<?php echo $mission; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
</div>

<?php

$article_section_heading = get_field('article_section_heading');

if ( $posts = get_field( 'articles' ) ) : 

	?>
	<!--article section-->
	<section class="article-section frontpage">
		<div class="container">
			<div class="row">
				<h2>
					<?php 
						if ($article_section_heading): 
							echo $article_section_heading;
						endif;
					?>
				</h2>
			</div>
			<div class="row">
				<?php 
				foreach ( $posts as $post) :
					setup_postdata( $post );
					?>
					<div class="col-xs-12 col-sm-6">
						<article class="article-item">
							<a href="<?php the_permalink(); ?>">
							<div class="bg-holder bg-cover"<?php if(has_post_thumbnail()):?> style="background-image: url(<?php echo get_thumbnail_src('850x518'); ?>);"<?php endif; ?>></div>
							</a>
							<a href="<?php the_permalink(); ?>">
							<h3>
								<?php   
									$header_sub_title = get_field('header_sub_title');
									if ($header_sub_title):
										echo $header_sub_title;
									endif;
								?>
							</h3>
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


			
<?php  get_footer(); ?>