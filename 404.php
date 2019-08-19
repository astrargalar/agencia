<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e('¡Vaya, que corte! Parece que no puedo encontrar la página que buscas.', 'twentynineteenchild'); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e('Parece que no se encontró nada en esa dirección. Mejor intenta una nueva búsqueda.', 'twentynineteenchild'); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</div><!-- .error-404 -->

	</main><!-- #main -->
</section><!-- #primary -->
<br>
<br>
<?php
get_footer();
