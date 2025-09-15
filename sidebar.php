<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/
?>

<?php /*
	// sidebar.php frequently used methods

	<aside>
		<?php the_author_meta('description'); ?> // this will display the author's "Biographical Info"

		<nav>
			<ol>
				<?php
					$recent_posts = wp_get_recent_posts();
					foreach ($recent_posts as $recent) {
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a></li>';
					}
					wp_reset_query();
				?>
			</ol> // this will display recent posts
		</nav>

		<nav>
			<ul>
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</nav>

		<?php
			$args = array(
				'title_li'	=>	'',
				'exclude'	=>	'1, 16'
			);
		?>
		<nav>
			<ul>
				<?php wp_list_categories($args); ?>
			</ul> // this will display post categories
		</nav>

		<?php wp_get_archives('type=monthly'); ?> // this will display post archives

		<?php
			$args = array (
				'status' => 'approve',
				'number' => '10'
			);
			$comments = get_comments($args);
			if (!empty ($comments)) :
				echo '<nav>';
					echo '<ol>';
					foreach ($comments as $comment) :
						echo '<li><a href="' . get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . $comment->comment_author . ' on ' . get_the_title($comment->comment_post_ID) . '</a></li>';
					endforeach;
					echo '</ol>';
				echo '</nav>';
			endif;
		?> // this will display recent comments
	</aside>
*/ ?>