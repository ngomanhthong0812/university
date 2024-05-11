<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re
            interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
            <?php
            $homepageEvents = new WP_Query(
                array(
                    'posts_per_page' => 2,
                    'post_type' => 'event'
                )
            );
            while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post();
            ?>

                <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month"><?php the_time('M'); ?></span>
                        <span class="event-summary__day"><?php the_time('d'); ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_trim_words(get_the_content(), 18); ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                    </div>
                </div>
            <?php
            }
            ?>



            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>

        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php
            $homepagePosts = new WP_Query(
                array(
                    'posts_per_page' => 2
                )
            );

            while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post(); ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month"><?php echo the_time('M'); ?></span>
                        <span class="event-summary__day"><?php echo the_time('d'); ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                    </div>
                </div>
            <?php }
            ?>




            <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All
                    Blog Posts</a></p>
        </div>
    </div>
</div>

<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <?php
            // Tạo truy vấn để lấy các bài post trong danh mục 'slider'
            $slider_posts = new WP_Query(array(
                'post_type' => 'post', // Lấy các bài viết
                'category_name' => 'slider', // Lọc theo danh mục 'slider'
                'posts_per_page' => 3 // Giới hạn số lượng bài viết lấy ra
            ));

            // Lặp qua các bài viết và tạo các slide
            while ($slider_posts->have_posts()) {
                $slider_posts->the_post();

                // Lấy URL của ảnh đại diện của bài viết
                $background_image_url = get_the_post_thumbnail_url();

                // Nếu bài viết không có ảnh đại diện, sử dụng ảnh mặc định
                if (!$background_image_url) {
                    $background_image_url = get_theme_file_uri('/images/apples.jpg'); // Đường dẫn đến ảnh mặc định nếu không có ảnh đại diện
                }

                // Tạo slide
            ?>
                <div class="hero-slider__slide" style="background-image: url(<?php echo esc_url($background_image_url); ?>);">
                    <div class="hero-slider__interior container">
                        <div class="hero-slider__overlay">
                            <h2 class="headline headline--medium t-center"><?php the_title(); ?></h2>
                            <p class="t-center"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                            <p class="t-center no-margin"><a href="<?php the_permalink(); ?>" class="btn btn--blue">Learn more</a></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>

        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
        </div>
    </div>
</div>



<?php get_footer();

?>