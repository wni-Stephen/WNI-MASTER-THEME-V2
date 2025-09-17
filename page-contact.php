<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*
* Template Name: Contact
*
*/

get_header();
?>
	<main id="content">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="grid-container full">
					<div class="grid-container">
						<div class="grid-x grid-padding-x ptopxlrg pbottomxlrg">
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
	// page-contact.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()

	// demos

	
*/ ?>