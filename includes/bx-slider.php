<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/
?>
					<div id="slides-name-container">
						<?php if(have_rows('slides_name', 1)) : ?>
							<ul class="bx-slider">
								<?php while(have_rows('slides_name', 1)) : the_row(); ?>
									<li>
										<h1><?php the_sub_field('slides_name_title'); ?></h1>
										<h2><?php the_sub_field('slides_name_sub_title'); ?></h2>
										<img src="<?php the_sub_field('slides_name_img_src'); ?>" alt="<?php the_sub_field('slides_name_img_alt'); ?>"/>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>