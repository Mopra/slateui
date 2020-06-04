<?php
// Theme functions
function wps_get_link($link,$class = ''){
	if ($link) {

		$title = $link['url'];
		$url = $link['url'];
		$target = '';

		if (isset($link['title']) and !empty($link['title'])) {
			$title = $link['title'];
		}

		if ($target = $link['target']) {
			$target = ' target="'.$target.'" ';
		}

		if (!empty($class)) {
			$class = 'class="'.$class.'" ';
		}

		return '<a href="'.esc_url($url).'" '.$class.$target.'>'.$title.'</a>';
	}
}

function get_thumbnail_src( $size ) {
	$post_id = get_the_ID();
	$attachment_id = get_post_thumbnail_id( $post_id );

	$image = wp_get_attachment_image_src( $attachment_id, $size );

	return $image[0];
}
