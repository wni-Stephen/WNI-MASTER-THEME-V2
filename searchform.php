<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/
?>
<div class="search">
	<div class="grid-container full">

		<div class="grid-x grid-padding-x">
			<div class="cell small-12 searchformcontainer">
				<?php $unique_id = esc_attr(uniqid('search-form-')); ?>
				<form id="search-form" class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
					<!-- <label for="search" class="visuallyhidden">Search: </label> -->
					<input aria-label="Search" id="<?php echo $unique_id; ?>" class="search-input" name="s" placeholder="Enter Type..." type="search" value="<?php echo get_search_query(); ?>" autocomplete="off"/>
				</form>
				<button id="search-close" class="search-close">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/close.svg" alt="Close Icon" class="close-icon"/>
				</button>
			</div>
		</div>

	</div>
</div>

	