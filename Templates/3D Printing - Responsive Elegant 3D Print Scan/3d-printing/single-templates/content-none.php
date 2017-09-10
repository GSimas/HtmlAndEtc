<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<div class="entry-header">
		<h2 class="entry-title"><?php _e( 'Nothing Found', '3dprinting' ); ?></h2>
	</div>

	<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', '3dprinting' ); ?></p>
			<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->