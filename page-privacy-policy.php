<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*
* Template Name: Privacy Policy
*
*/

get_header();
?>
<main id="content" class="wow fadeIn">
    <div class="grid-container full">
        <div class="grid-container">
            <div class="grid-x grid-padding-x ptopxlrg pbottomxlrg">
                <div class="cell">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>

<?php /*
	// page-privacy-policy.php frequently used methods

	<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()
*/ ?>