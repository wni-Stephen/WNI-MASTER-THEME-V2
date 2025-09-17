<?php
/**
* websiteni Joints
* websiteni Starter Theme built on JointsWP; http://jointswp.com/.
* Created by websiteni.
*/

get_header();
?>
<main id="content">
    <div class="grid-container full">
        <div class="grid-container">
            <div class="grid-x grid-padding-x ptopxlrg pbottomxlrg">
                <div class="cell text-center">
                    <h1>Oops! Page not found.</h2>
                    <p>
                        Sorry, the page you are looking for doesn’t exist or has been moved.
                    </p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="button">Return Home</a>
                </div>

            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>