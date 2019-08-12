<?php

/**
 * Template Name: Página de Contacto y mapa
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
<!--  Inicio de la página de servicios -->

<div class="container">
	<div class="column active">
		<h2>Aquí me puedes encontrar</h2>
		<div class="content-map">
			<div id="mapid" class="map"></div>
			<div class="direcciones">
				<?php get_template_part('template-parts/content/content-redes'); ?>
				<!-- Agrego el contenido de las redes sociales en un template part para poder reutilizarlo -->
				<!-- <hr> -->
				<p>Cádiz - Avenida de las Cortes de Cádiz - 11005</p>
				<!-- <hr> -->
				<p>Chiclana - Avenida Severo Ochoa s/n - 11130</p>
				<!-- <hr> -->
			</div>
		</div>
		<?php get_template_part('template-parts/content/content-loop'); ?>
	</div>
</div>
<?php get_footer();
