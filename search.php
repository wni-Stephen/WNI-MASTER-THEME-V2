<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/

get_header();
?>
				<main id="content" class="wow fadeIn">
					<div class="grid-container full internalbanner">
						<div class="grid-container">
							<div class="grid-x grid-padding-x paddingtopmed paddingbottomxlrg">
								<div class="cell breadcrumbs wow fadeIn" data-wow-delay="0.1s">
									<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?>
								</div>
								<div class="cell medium-10 large-7 xlarge-5 pfirstof wow fadeIn" data-wow-delay="0.3s">							
									<h1 class="nomarginbottom"><strong><?php printf(__('Search results for: %s', 'websiteni_foundation'), get_search_query()); ?></strong></h1>
								</div>
							</div>
						</div>
					</div>

					<div class="grid-container full">
						<div class="grid-container">
							<div class="grid-x grid-padding-x" data-equalizer-by row="true" data-equalizer>
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
											<a href="<?php the_permalink(); ?>" class="cell medium-6 large-4">	
												<div class="image">
													<?php if ( has_post_thumbnail() ) { ?>
														<img src="<?php echo the_post_thumbnail_url(); ?>">											    
													<?php } else { ?>
														<img class="wow zoomOut" data-wow-offset="370" data-wow-delay="<?php echo $k;?>s" src="<?php echo get_template_directory_uri(); ?>/assets/images/main/placeholder.jpg">
													<?php } ?>						
												</div>
												<div class="content plastof">
													<?php the_title(); ?>
												</div>
											</a>
									<?php $i++; endwhile; ?>				
								<?php endif; ?>
								<?php if (count($terms) == 0 && (!have_posts())) { ?> 	
									<div class="cell pfirstof">
										<p>Sorry, we couldnt find anything that matched your Search Criteria. <br>Please refine your search and try again.</p>
										<a class="button" style="margin-top: 25px;" href="<?php echo esc_url(home_url()); ?>">Back home</a>
									</div>
								<?php } ?>
							</div>							
						</div>
					</div>
				</main>
<?php get_footer(); ?>

<?php /*
	// search.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()

	<div class="search-terms">
		<?php printf(__('%s', 'websiteni_joints'), get_search_query()); ?>
	</div>
*/ ?>