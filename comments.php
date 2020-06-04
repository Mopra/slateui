<?php

// Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) {
	?> <p><?php _e( 'This post is password protected. Enter the password to view comments.', 'slate' ); ?></p> <?php
	return;
}

function theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

	<div class="commentlist-item">
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<div class="avatar-holder"><?php echo get_avatar( $comment, 48 ); ?></div>
			<div class="commentlist-holder">
				<?php edit_comment_link( __( '(Edit)', 'slate' ), '<p class="edit-link">', '</p>' ); ?>
				<p class="meta"><?php comment_date(); ?> <?php _e( 'at', 'slate' ); ?> <?php comment_time(); ?>, <?php comment_author_link(); ?> <?php _e( 'said:', 'slate' ); ?></p>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<p><?php _e( 'Your comment is awaiting moderation.', 'slate' ); ?></p>
				<?php else : ?>
				<?php comment_text(); ?>
				<?php endif; ?>

				<?php
				comment_reply_link( array_merge( $args, array(
					'reply_text' => __( 'Reply', 'slate' ),
					'before'     => '<p>',
					'after'      => '</p>',
					'depth'      => $depth,
					'max_depth'  => $args['max_depth'],
				) ) ); ?>
			</div>
		</div>
	<?php }

	function theme_comment_end() { ?>
		</div>
	<?php }
?>

<?php if ( have_comments() ) : ?>
	<div class="section comments" id="comments">
		<h2><?php comments_number( __('No Responses', 'slate' ), __( 'One Response', 'slate' ), __( '% Responses', 'slate' ) );?> <?php _e( 'to', 'slate' ); ?> &#8220;<?php the_title(); ?>&#8221;</h2>
		<div class="commentlist">
			<?php wp_list_comments( array(
				'callback'     => 'theme_comment',
				'end-callback' => 'theme_comment_end',
				'style'        => 'div',
			) ); ?>
		</div>
		<?php if( $comments_links = paginate_comments_links( array( 'echo' => false ) ) ): ?>
		<div class="navigation-comments">
			<?php echo $comments_links; ?>
		</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div class="section respond">
		<?php comment_form(); ?>
	</div>
<?php else : ?>
	<?php if ( is_singular( array( 'post' ) ) ) : ?>
		<p><?php _e( 'Comments are closed.', 'slate' ); ?></p>
	<?php endif; ?>
<?php endif; ?>
