<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/

get_header();
?>
<main id="content" class="">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="grid-container full">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="cell">

						</div>
					</div>
					
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>

<?php /*
	// front-page.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()

	// demos

	<?php get_sidebar(); ?>

	<?php get_sidebar('example'); ?>

	<?php dynamic_sidebar('example-widget'); ?>

	<?php // include(locate_template("inc/bx-slider.php")); ?>

	https://foundation.zurb.com/sites/docs/smooth-scroll.html

	https://foundation.zurb.com/sites/docs/equalizer.html

	<div data-interchange="[<?php // echo get_template_directory_uri(); ?>/partials/small.php, small], [<?php // echo get_template_directory_uri(); ?>/partials/medium.php, medium], [<?php // echo get_template_directory_uri(); ?>/partials/large.php, large]">

	</div>
*/ ?>