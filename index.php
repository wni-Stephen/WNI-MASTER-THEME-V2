<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/


// Hello world
get_header();
?>
				<main id="content" class="content">
					hello
					<section class="grid-container full internal-banner wow fadeIn" style="background-image:url('<?php the_field('image', get_option('page_for_posts')); ?>');" data-wow-delay=".2s">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="cell">
									<a class="internal-breadcrumb text-link" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
									<span>&nbsp;&gt;&nbsp;</span>
									<a class="internal-breadcrumb text-link" href="<?php echo esc_url(home_url('/news/')); ?>">News</a>
								</div>
								<div class="cell">
									<h1><?php the_field('title', get_option('page_for_posts')); ?></h1>
								</div>
								<div class="small-12 medium-9 large-5 cell">
									<p><?php // the_field('internal_banner_blurb', get_option('page_for_posts')); ?></p>
								</div>
							</div>
						</div>
					</section>
					<section class="grid-container full internal-content padding-top padding-bottom wow fadeIn" data-wow-delay=".4s">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="small-12 medium-9 large-6 cell">
									<?php if (have_posts()) : ?>
										<div class="grid-x grid-margin-x grid-margin-y">
											<?php while (have_posts()) : the_post(); ?>
												<a class="cell post" href="<?php the_permalink(); ?>">
													<h4><?php the_title(); ?></h4>
													<p><strong>Posted On:</strong> <?php echo get_the_date(); ?></p>
													<hr>
													<p><?php echo websiteni_joints_excerpt(25); ?>&hellip;</p>
													<div class="materialize-button">read more&nbsp;&nbsp;&nbsp;&gt;</div>
												</a>
											<?php endwhile; ?>
										</div>
										<div class="grid-x pagination padding-top">
											<div class="auto cell websiteni-flex-sm websiteni-flex-hs-sm">
												<?php previous_posts_link('
													&lt;&nbsp;&nbsp;&nbsp;Previous
												'); ?>
											</div>
											<div class="auto cell websiteni-flex-sm websiteni-flex-he-sm">
												<?php next_posts_link('
													Next&nbsp;&nbsp;&nbsp;&gt;
												'); ?>
											</div>
										</div>
									<?php endif; ?>
								</div>
								<aside class="small-12 medium-3 large-offset-1 cell categories-archives">
									<div class="categories">
										<h4>Categories</h4>
										<hr>
										<?php
											$args = array(
												'title_li'	=>	'',
												'exclude'	=>	'1'
											);
										?>
										<ul>
											<?php wp_list_categories($args); ?>
										</ul>
									</div>
									<div class="archives">
										<h4>Archives</h4>
										<hr>
										<ul>
											<?php wp_get_archives('type=monthly'); ?>
										</ul>
									</div>
								</aside>
							</div>
						</div>
					</section>
				</main>
<?php get_footer(); ?>

<?php /*
	// index.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()

	// demos

	<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	12,
			'order'				=>	'ASC',
			'paged'				=>	$paged
		);

		$custom_query = new WP_Query($args);
	?>
	<?php if ($custom_query->have_posts()) : ?>
		<?php while ($custom_query->have_posts()) : $custom_query->the_post();
			$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
			$image_url = $image_data[0];
		?>

		<?php endwhile; ?>
		<?php websiteni_joints_numbered_page_navigation($custom_query); ?>
	<?php endif; wp_reset_postdata(); ?>

	<?php previous_posts_link('
		<span class="arrow left">
			<span class="shaft">

			</span>
		</span>
		<span class="main">
			<span class="text">
				Previous
			</span>
			<span class="arrow right">
				<span class="shaft">

				</span>
			</span>
		</span>
	'); ?>

	<?php next_posts_link('
		<span class="arrow left">
			<span class="shaft">

			</span>
		</span>
		<span class="main">
			<span class="text">
				Next
			</span>
			<span class="arrow right">
				<span class="shaft">

				</span>
			</span>
		</span>
	'); ?>
*/ ?>
