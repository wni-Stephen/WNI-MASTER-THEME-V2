<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/

get_header();
$current_cat = get_queried_object();
?>
<main id="content" class="">
	<section class="grid-container full wow fadeIn internalbanner" data-wow-delay=".2s">
		<div class="grid-container paddingtopmed">
			<div class="grid-x grid-padding-x paddingtopmed paddingbottommed">
				<div class="cell fontwhite plastof">
					<h1 class="wow fadeInUp" data-wow-delay="0.2s"><?php printf(__('%s', 'websiteni-foundation'), single_cat_title('', false)); ?></h1>
					<p class="wow fadeInLeft" data-wow-delay="0.6s"><?php echo $current_cat->description; ?></p>
				</div>
			</div>
		</div>

		<div class="grid-container wow fadeInUp" data-wow-delay="1s">
			<div class="grid-x grid-margin-x paddingbtmlrgsscreens">
				<?php ////getting current category
				$args = array(
					'post_type' => 'post',// your post type,
					'posts_per_page' => get_option('posts_per_page'), 
					'orderby' => 'post_date',
					'order' => 'DESC',
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
					'cat' => $current_cat->cat_ID // current category ID
				);
				$the_query = new WP_Query($args);

				if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
					<div class="cell small-12 medium-6 large-4 wow fadeInUp" style="margin-bottom: 20px;">
						<a href="<?php the_permalink(); ?>" class="singleblog" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/src/activity.jpg');">
						</a>
						<div class="aboutsingleblog fontwhite">
							<h4><?php the_title(); ?></h4>
							<span><?php echo get_the_date('d/m/y');?></span>
							<p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
						</div>
					</div>							
				<?php endwhile;	endif; ?>
				<div class="cell small-12">
					<?php
					global $wp_query;
					$big = 999999999; // need an unlikely integer
					echo '<div class="paginate-links">';
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'prev_text' => __('previous'),
							'next_text' => __('next'),
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages
						) );
					echo '</div>';
					?>
				</div>	
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>

<?php /*
	// category.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()
*/ ?>