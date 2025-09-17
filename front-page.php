<?php
/**
 * WebsiteNI Joints - Front Page Template
 * WebsiteNI Starter Theme built on JointsWP
 * Created by WebsiteNI.
 */

get_header();
?>

<main id="content" class="">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $banner_type = get_field('banner_type');

            // Image Slider Banner
            if ($banner_type === 'image_slider' && have_rows('slider_images')) : ?>
                
                <div class="grid-container full hero-slider-wrapper">
                    <div class="swiper bannerSwiper">
                        <div class="swiper-wrapper">
                            <?php while (have_rows('slider_images')) : the_row();
                                $image = get_sub_field('image');
                                $headline = get_sub_field('hero_headline');
                                $subtext = get_sub_field('hero_subtext');
                                $buttons = get_sub_field('slide_buttons');
                            ?>
                                <div class="swiper-slide" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
                                    <div class="grid-container full hero-content-wrapper">
                                        <div class="grid-x grid-padding-x align-bottom">
                                            <div class="cell small-12 medium-6 hero-content">
                                                <?php if ($headline) : ?>
                                                    <h1><?php echo esc_html($headline); ?></h1>
                                                <?php endif; ?>
                                                
                                                <?php if ($subtext) : ?>
                                                    <p><?php echo esc_html($subtext); ?></p>
                                                <?php endif; ?>
                                                
                                                <?php if ($buttons) : ?>
                                                    <div class="hero-buttons">
                                                        <?php foreach ($buttons as $button) :
                                                            $link = $button['button_link'];
                                                            if ($link && !empty($link['url'])) :
                                                        ?>
                                                            <a href="<?php echo esc_url($link['url']); ?>" 
                                                               <?php echo $link['target'] ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>
                                                               class="button">
                                                                <?php echo esc_html($link['title']); ?>
                                                            </a>
                                                        <?php endif;
                                                        endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <!-- Navigation (uncomment if needed) -->
                        <!-- <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div> -->
                    </div>
                </div>

            <?php 
            // Video Banner
            elseif ($banner_type === 'video_banner') : 
                $video_banner = get_field('video_banner');
                $video_file = $video_banner['video_file'];
                $headline = $video_banner['hero_headline'];
                $subtext = $video_banner['hero_subtext'];
                $buttons = $video_banner['slide_buttons'];
                $fallback_image = get_field('banner_fallback_image');
            ?>
                
                <div class="grid-container full homebanner nopadding imagecover">
                    <?php if (!wp_is_mobile() && $video_file) : ?>
                        <video id="video-banner" autoplay muted loop playsinline preload="auto" 
                               <?php echo $fallback_image ? 'poster="' . esc_url($fallback_image['url']) . '"' : ''; ?>>
                            <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4">
                            <?php if (get_field('banner_video_webm')) : ?>
                                <source src="<?php echo esc_url(get_field('banner_video_webm')); ?>" type="video/webm">
                            <?php endif; ?>
                        </video>
                    <?php else : ?>
                        <img class="exc_lazyload" src="<?php echo esc_url($fallback_image['url']); ?>" alt="Banner image">
                    <?php endif; ?>

                    <div class="grid-container banner-content fadeinup">
                        <div class="grid-x grid-padding-x fontcolourwhite paddingtoplrg paddingbottomlrg fadeinup">
                            <!-- Hero Headline/Subtext -->
                            <div class="cell large-9 xxlarge-8">
                                <?php if ($headline) : ?>
                                    <h1><?php echo esc_html($headline); ?></h1>
                                <?php endif; ?>
                                
                                <?php if ($subtext) : ?>
                                    <p><?php echo esc_html($subtext); ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Buttons -->
                            <div class="cell large-3 xxlarge-4 wni-flex wni-flex-js wni-flex-ae margintopsmlmb wni-flex-je-lg">
                                <?php if ($buttons) : ?>
                                    <?php foreach ($buttons as $button) :
                                        $link = $button['button_link'];
                                        if ($link && !empty($link['url'])) :
                                    ?>
                                        <a href="<?php echo esc_url($link['url']); ?>" 
                                           <?php echo $link['target'] ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>
                                           class="button primary right-lg">
                                            <?php echo esc_html($link['title']); ?>
                                        </a>
                                    <?php endif;
                                    endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>