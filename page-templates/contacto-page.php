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
		<h2>Aquí nos puedes encontrar</h2>
		<div class="content-map">

			<div id="mapid" class="map"></div>
			<div class="direcciones">
				<div class="redes"><a href="https://www.facebook.com/100026348976151" rel="nofollow"><img src="http://localhost/tswp/wp-content/uploads/2019/08/facebook.png" alt="sigue a El taller de Astrargalar en Facebook" title="sigue a El taller de Astrargalar en Facebook"></a>
					<a href="https://twitter.com/astrargalar" rel="nofollow"><img src="http://localhost/tswp/wp-content/uploads/2019/08/twitter.png" alt="sigue a El taller de Astrargalar Twitter" title="sigue a El taller de Astrargalar Twitter"></a>
					<a href="https://www.youtube.com/channel/UChRx8eCuQ_40ixbxjErm1rA" rel="nofollow"><img src="http://localhost/tswp/wp-content/uploads/2019/08/youtube.png" alt="sigue a El taller de Astrargalar en Youtube" title="sigue a El taller de Astrargalar en Youtube"></a>
					<a href="https://www.linkedin.com/in/francisco-silva-richarte-03030219/" rel="nofollow"><img src="http://localhost/tswp/wp-content/uploads/2019/08/linkedin.png" alt="sigue a El taller de Astrargalar LinkedIn" title="sigue a El taller de Astrargalar LinkedIn"></a>
				</div>
				<hr>
				<p>Cádiz - Avenida de las Cortes de Cádiz - 11005</p>
				<hr>
				<p>Chiclana - Avenida Severo Ochoa s/n - 11130</p>
				<hr>
			</div>

		</div>
		<?php get_template_part('template-parts/content/content-loop'); ?>
	</div>
</div>
<?php get_footer();
