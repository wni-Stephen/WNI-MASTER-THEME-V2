<?php
/**
 * WebsiteNI Starter Theme
 *
 * Front page template.
 *
 * Homepage content is built using dedicated
 * ACF field groups rather than Flexible Content.
 */

defined('ABSPATH') || exit;

get_header();
?>

<main
	id="content"
	class="content"
>

	<?php if (have_posts()) : ?>

		<?php
		while (have_posts()) :
			the_post();
			?>

			<?php
			/**
			 * Homepage sections are added here
			 * on a project-by-project basis.
			 *
			 * Example:
			 *
			 * $hero_title = get_field('hero_title');
			 * $hero_image = get_field('hero_image');
			 */
			?>

		<?php endwhile; ?>

	<?php endif; ?>

</main>

<?php
get_footer();