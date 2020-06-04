<article class="uk-article" id="post-<?php the_ID(); ?>">
		<?php the_title( '<h1 class="uk-article-title">', '</h1>' ); ?>
		<?php the_post_thumbnail( 'full', '' ); ?>
		<?php	the_excerpt(); ?>
<img data-src="" width="" height="" alt="" uk-img>
		<div class="uk-grid-small uk-child-width-auto" uk-grid>
			<div>
					<a class="uk-button uk-button-text" href="<?php the_permalink(); ?>">Read more</a>
			</div>
		</div>
</article>
