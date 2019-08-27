<?php

/**
 * Template Name: Servicios en cards
 *Template Post Type: page
 * Pagina de servicios basada en Tarjetas.
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

<h2 class="titulo-seccion max">Nuestros Servicios WordPress para ti</h2>
<section class="servicios">
	<!-- <div class="container-servicios"> -->
	<div class="listado-servicios max">

		<!-- SERVICIO ADAPTACIÓN PLANTILLAS -->
		<article class="servicio">
			<a href="./plantillas/">
				<div class="info-servicio">
					<div class="banner-servicio-container">
						<div class="banner-servicio">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/market.png" />
						</div>
					</div>
					<div class="descripcion">
						<h2 class="nombre-servicio">Adaptamos plantillas a tu negocio</h2>
						<p>Busca tu plantilla favorita y te la adaptamos por menos de lo que crees.</p>
					</div>
				</div>
				<div class="btn-precio">
					<div class="precio">
						<div class="desde-precio">
							<div class="desde">Desde</div>
							<div class="cantidad">225</div>
						</div>

						<div class="euros-iva">
							<div class="euros">€</div>
							<div class="iva">+ IVA</div>
						</div>
					</div>
					<div class="btn-accion">
						<span>Más información</span>
					</div>
				</div>
			</a>
		</article>

		<!-- SERVICIO MANTENIMIENTO WordPress -->
		<article class="servicio">
			<a href="./mantenimientowp/">
				<div class="info-servicio">
					<div class="banner-servicio-container">
						<div class="banner-servicio">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icono-website-128-128.png" alt="">
						</div>
					</div>
					<div class="descripcion">
						<h2 class="nombre-servicio">Mantenimiento WordPress</h2>
						<p>Tu sitio web al día evitará problemas de seguridad y falta de rendimiento.</p>
					</div>
				</div>
				<div class="btn-precio">
					<div class="precio">
						<div class="desde-precio">
							<div class="desde">Desde</div>
							<div class="cantidad">30</div>
						</div>

						<div class="euros-iva">
							<div class="euros">€</div>
							<div class="iva">+ IVA</div>
						</div>
						<div class="barra-lateral">
							/
							<div class="tiempo">mes</div>
						</div>
					</div>
					<div class="btn-accion">
						<span>Ver planes</span>
					</div>
				</div>
			</a>
		</article>

		<!-- SERVICIO MY BUSINESS -->
		<article class="servicio">
			<a href="./mybusiness">
				<div class="info-servicio">
					<div class="banner-servicio-container">
						<div class="banner-servicio">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images//google-my-business-shop-store.ico" alt="">
						</div>
					</div>
					<div class="descripcion">
						<h2 class="nombre-servicio">Alta en Google My Business</h2>
						<p>Te configuramos tu negocio para que aparezcas destacado en Google My Business.</p>
					</div>
				</div>
				<div class="btn-precio">
					<div class="precio">
						<div class="desde-precio">
							<div class="desde">Desde</div>
							<div class="cantidad">125</div>
						</div>

						<div class="euros-iva">
							<div class="euros">€</div>
							<div class="iva">+ IVA</div>
						</div>
					</div>

					<div class="btn-accion">
						<span>Más información</span>
					</div>
				</div>
			</a>
		</article>
		<!-- SERVICIO WordPress A MEDIDA -->
		<article class="servicio">
			<a href="./wpamedida">
				<div class="info-servicio">
					<div class="banner-servicio-container">
						<div class="banner-servicio">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web_a_medida.png" alt="">
						</div>
					</div>
					<div class="descripcion">
						<h2 class="nombre-servicio">WordPress a medida</h2>
						<p>Creamos un sitio web expresamente concebido para tu negocio o tu blog</p>
					</div>
				</div>
				<div class="btn-precio">
					<div class="precio">
						<div class="desde-precio">
							<div class="desde">Desde</div>
							<div class="cantidad">425</div>
						</div>

						<div class="euros-iva">
							<div class="euros">€</div>
							<div class="iva">+ IVA</div>
						</div>
					</div>

					<div class="btn-accion">
						<span>Más información</span>
					</div>
				</div>
			</a>
		</article>
		<!-- SERVICIO EMAIL -->
		<article class="servicio">
			<a href="./e-marketing">
				<div class="info-servicio">
					<div class="banner-servicio-container">
						<div class="banner-servicio">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/email_marketing.png" alt="">
						</div>
					</div>
					<div class="descripcion">
						<h2 class="nombre-servicio">Campañas de email-marketing</h2>
						<p>Configuramos tu campaña de email-marketing, diseño de emails, informes y estadisticas .</p>
					</div>
				</div>
				<div class="btn-precio">
					<div class="precio">
						<div class="desde-precio">
							<div class="desde">Desde</div>
							<div class="cantidad">150</div>
						</div>

						<div class="euros-iva">
							<div class="euros">€</div>
							<div class="iva">+ IVA</div>
						</div>
					</div>

					<div class="btn-accion">
						<span>Más información</span>
					</div>
				</div>
			</a>
		</article>
		<!-- SERVICIO WOOCOMMERCE -->
		<article class="servicio">
			<a href="./tienda-on-line">
				<div class="info-servicio">
					<div class="banner-servicio-container">
						<div class="banner-servicio">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/woocommerce.png" alt="">
						</div>
					</div>
					<div class="descripcion">
						<h2 class="nombre-servicio">Creamos tu tienda online</h2>
						<p>Para que vendas tus productos por internet. Nosotros nos ocupamos de todo.</p>
					</div>
				</div>
				<div class="btn-precio">
					<div class="precio">
						<div class="desde-precio">
							<div class="desde">Desde</div>
							<div class="cantidad">625</div>
						</div>

						<div class="euros-iva">
							<div class="euros">€</div>
							<div class="iva">+ IVA</div>
						</div>
					</div>

					<div class="btn-accion">
						<span>Más información</span>
					</div>
				</div>
			</a>
		</article>


	</div>

</section>
<!--  Fin de la página de servicios -->
<?php get_footer();
