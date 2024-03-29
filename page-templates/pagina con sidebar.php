<?php

/**
 * Template Name: Página con sidebar
 * Template Post Type: page
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="container-about">
	<section id="primary" class="content-area-sidebar">
		<main id="main" class="site-main">

			<?php
			if (have_posts()) {

				// Load posts loop.
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/content/content-sidebar');
				}

				// Previous/next page navigation.
				twentynineteen_the_posts_navigation();
			} else {

				// If no content, include the "No posts found" template.
				get_template_part('template-parts/content/content', 'none');
			}
			?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
	<div class="side-bar">
		<?php dynamic_sidebar("sidebar-2"); ?>
		<div id="mapid"></div>
	</div><!-- side-bar -->
</div><!-- container -->
<?php get_footer();
