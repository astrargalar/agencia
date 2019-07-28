<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<article class="container blog" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_sticky() && is_home() && !is_paged()) {
			printf('<span class="sticky-post">%s</span>', _x('Featured', 'post', 'twentynineteen'));
		}
		the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
		<footer class="entry-footer">
			<?php twentynineteen_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</header><!-- .entry-header -->
	<?php
	// check if the post has a Post Thumbnail assigned to it.
	if (has_post_thumbnail()) {
		the_post_thumbnail();
		//the_post_thumbnail('blog-grande');
	}
	?>


	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->