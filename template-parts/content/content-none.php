<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e('No he encontrado nada', 'twentynineteenchild'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__('¿Preparado para publicar tu primer post? <a href="%1$s">Empieza aquí</a>.', 'twentynineteenchild'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);

		elseif (is_search()) :
			?>

		<p><?php _e('Perdón, no he encontrado nada que coincida con lo que buscas. Puedes intentarlo de nuevo con un término diferente.', 'twentynineteenchild'); ?></p>
		<?php
			get_search_form();

		else :
			?>

		<p><?php _e('Parece que no podemos encontrar lo que estás buscando. Puede que una nueva búsqueda te pueda ayudar. .', 'twentynineteenchild'); ?></p>
		<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->