<?php

/**
 * Template Name: Página de Servicios
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
<div class="container-hero">
	<!--container-->
	<div class="column active">
		<div class="content">
			<h1>1</h1>
			<div class="box">
				<div class="banner-servicio-container">
					<div class="banner-servicio">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/email_marketing.png" alt="">
					</div>
				</div>
				<h2>Adaptamos plantillas a tu negocio</h2>
				<p>Busca tu plantilla favorita y te la adaptamos por menos de lo que crees.</p>
				<div class="btn-accion">
					<a href=" ./adaptamos-plantillas/"> <span>Más información</span> </a>
				</div>
			</div>
		</div>
		<div class="bg bg1"></div>
	</div>
	<div class="column">
		<div class="content">
			<h1>2</h1>
			<div class="box">
				<div class="banner-servicio-container">
					<div class="banner-servicio">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icono-website-128-128.png" alt="">
					</div>
				</div>
				<h2>Mantenimiento WordPress</h2>
				<p>Tu sitio web al día evitará problemas de seguridad y falta de rendimiento.</p>
				<div class="btn-accion">
					<a href="./mantenimiento-wordpress/"><span>Más información</span></a>
				</div>
			</div>
		</div>
		<div class="bg bg2"></div>
	</div>
	<div class="column">
		<div class="content">
			<h1>3</h1>
			<div class="box">
				<div class="banner-servicio-container">
					<div class="banner-servicio">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images//google-my-business-shop-store.ico" alt="">
					</div>
				</div>
				<h2>Alta en Google My Business</h2>
				<p>Te configuramos tu negocio para que aparezcas destacado en Google My Business.</p>
				<div class="btn-accion">
					<a href="./gestion-mybusiness/"><span>Más información</span></a>
				</div>
			</div>
		</div>
		<div class="bg bg3"></div>
	</div>
	<div class="column">
		<div class="content">
			<h1>4</h1>
			<div class="box">
				<div class="banner-servicio-container">
					<div class="banner-servicio">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web_a_medida.png" alt="">
					</div>
				</div>
				<h2>WordPress a medida</h2>
				<p>Creamos un sitio web expresamente concebido para tu negocio o tu blog.</p>
				<div class="btn-accion">
					<a href="./tema-blog-wordpress-a-medida/"><span>Más información</span></a>
				</div>
			</div>
		</div>
		<div class="bg bg4"></div>
	</div>
</div>
<!--  Fin de la página de servicios -->
<?php get_footer(); ?>