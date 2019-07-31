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
<div class="container">
	<div class="column active">
		<div class="content">
			<h1>1</h1>
			<div class="box">
				<h2>Adaptamos plantillas a tu negocio</h2>
				<p>Busca tu plantilla favorita y te la adaptamos por menos de lo que crees.</p>
			</div>
		</div>
		<div class="bg bg1"></div>
	</div>
	<div class="column">
		<div class="content">
			<h1>2</h1>
			<div class="box">
				<h2>Mantenimiento WordPress</h2>
				<p>Tu sitio web al día evitará problemas de seguridad y falta de rendimiento.</p>
			</div>
		</div>
		<div class="bg bg2"></div>
	</div>
	<div class="column">
		<div class="content">
			<h1>3</h1>
			<div class="box">
				<h2>Alta en Google My Business</h2>
				<p>Te configuramos tu negocio para que aparezcas destacado en Google My Business.</p>
			</div>
		</div>
		<div class="bg bg3"></div>
	</div>
	<div class="column">
		<div class="content">
			<h1>4</h1>
			<div class="box">
				<h2>WordPress a medida</h2>
				<p>Creamos un sitio web expresamente concebido para tu negocio o tu blog.</p>
			</div>
		</div>
		<div class="bg bg4"></div>
	</div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
	$(document).on('mouseover', '.caja .column', function() {
		$(this).addClass('active').siblings().removeClass('active');
	})(jQuery);
</script> -->
<!--  Fin de la página de servicios -->

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