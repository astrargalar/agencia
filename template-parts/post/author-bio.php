<?php

/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
//if (function_exists('wpb_author_info_box')) : return;
if ((bool) get_the_author_meta('description')) : ?>
<div class="author-bio">
	<h2 class="author-title">
		<span class="author-heading">
			<?php
				printf(
					/* translators: %s: post author */
					__('Publicado por %s', 'twentynineteenchild'),
					esc_html(get_the_author())
				);
				?>
		</span>

	</h2>
	<div class="autor_mio">
		<p class="author_details"><?php echo (get_avatar(get_the_author_meta('user_email'), 100) . nl2br($user_description)); ?></p>
		<?php echo (twentynineteen_entry_footer() . '<hr>'); ?>

		<p class="autor_color"><!-- author-description (eliminada esta clase) -->
			<?php the_author_meta('description'); ?>
			<a class="author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
				<?php _e('Ver más posts', 'twentynineteenchild'); ?>
			</a>
		</p><!-- .author-description -->
	</div>
</div><!-- .author-bio -->
<?php endif; ?>