<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/

get_header();
?>
				<main id="content" class="content">
					<section class="grid-container full internal-banner wow fadeIn" data-wow-delay=".2s">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="cell">
									<a class="internal-breadcrumb text-link" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
									<span>&nbsp;&gt;&nbsp;</span>
									<a class="internal-breadcrumb text-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
								<div class="cell">
									<h1><?php the_title(); ?></h1>
								</div>
								<div class="small-12 medium-9 large-5 cell">
									<p>Posted On: <?php echo get_the_date(); ?></p>
								</div>
							</div>
						</div>
					</section>
					<section class="grid-container full internal-content padding-top padding-bottom wow fadeIn" data-wow-delay=".4s">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="small-12 medium-10 large-8 cell">
									<?php the_content(); ?>
								</div>
							</div>
							<div class="grid-x pagination padding-top-half">
								<div class="small-6 medium-5 large-4 cell websiteni-flex-sm websiteni-flex-hs-sm">
									<?php previous_post_link(); ?>
								</div>
								<div class="small-6 medium-5 large-4 cell websiteni-flex-sm websiteni-flex-he-sm">
									<?php next_post_link(); ?>
								</div>
							</div>
						</div>
					</section>
				</main>
<?php get_footer(); ?>

<?php /*
	// single.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()

	<?php $previousPost = get_previous_post(); ?>
	<?php if (!empty($previousPost)) : ?>
		<a class="arrow-button" href="<?php echo $previousPost->guid; ?>">
			<span class="arrow left">
				<span class="shaft">

				</span>
			</span>
			<span class="main">
				<span class="text">
					Next Article
				</span>
				<span class="arrow right">
					<span class="shaft">

					</span>
				</span>
			</span>
		</a>
	<?php endif; ?>
*/ ?>