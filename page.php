<?php
/**
 * Created by WebsiteNI.
 */
defined('ABSPATH') || exit;
get_header();
?>
<main id="content" class="content">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php
			/**
			 * Flexible Content page builder.
			 *
			 * If the page has Flexible Content layouts,
			 * render those instead of the standard editor.
			 */
			$has_flexible_content = (
				function_exists('get_field')
				&& get_field('page_content')
			);
			?>
			<?php if ($has_flexible_content) : ?>
				<?php
				get_template_part(
					'components/flexible-content'
				);
				?>
			<?php else : ?>
				<div class="grid-container full">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<div class="cell">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>