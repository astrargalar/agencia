<?php

/**
 * Template Name: Plantilla front-page
 *Template Post Type: page
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
<div class="container-portada">
	<span class="texto1">¡¡BIENVENIDO!!</span>
	<span class="texto2">TODO WordPress PARA TU EMPRESA</span>
</div>
<div class="site-info pie">
	<?php $blog_info = get_bloginfo('name'); ?>
	<?php if (!empty($blog_info)) : ?>
	<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php crear_aviso_copyright(); ?></a>
	<?php endif; ?>
	<a href="<?php echo esc_url(__('https://pacosilva.com/', 'twentynineteenchild')); ?>" class="imprint">
		<?php
		/* translators: %s: WordPress. */
		printf(__('Hecho con mucho esfuerzo por  %s.', 'twentynineteenchild'), 'Paco Silva');
		?>
	</a>
</div>