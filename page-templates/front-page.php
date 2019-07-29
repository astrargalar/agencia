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
	<span class="texto1">Bienvenido</span>
	<span class="texto2">al taller de Astrargalar</span>
</div>
<div class="site-info pie">
	<?php $blog_info = get_bloginfo('name'); ?>
	<?php if (!empty($blog_info)) : ?>
		<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php crear_aviso_copyright(); ?></a>
	<?php endif; ?>
	<a href="<?php echo esc_url(__('https://pacosilva.com/', 'twentynineteen')); ?>" class="imprint">
		<?php
		/* translators: %s: WordPress. */
		printf(__('Hecho con mucho esfuerzo por  %s.', 'twentynineteen'), 'Paco Silva');
		?>
	</a>
</div>