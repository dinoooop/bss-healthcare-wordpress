<?php
/*
Template Name: Front Page
*/

get_header();
?>
<!-- Header Start -->
<div class="container-fluid header bg-primary p-0 mb-5">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
            <h1 class="display-4 text-white mb-5"><?php echo esc_html(get_option('bss_hero_text')); ?></h1>
            <div class="row g-4">
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">
                            <?php echo esc_html(get_option('bss_count_info_1_value')); ?>
                        </h2>
                        <p class="text-light mb-0"><?php echo esc_html(get_option('bss_count_info_1')); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">
                            <?php echo esc_html(get_option('bss_count_info_2_value')); ?>
                        </h2>
                        <p class="text-light mb-0"><?php echo esc_html(get_option('bss_count_info_2')); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">
                            <?php echo esc_html(get_option('bss_count_info_3_value')); ?>
                        </h2>
                        <p class="text-light mb-0"><?php echo esc_html(get_option('bss_count_info_3')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="owl-carousel header-carousel">
                <?php if (get_option('bss_banner_1')): ?>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="<?php echo esc_url(get_option('bss_banner_1')); ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php if (get_option('bss_banner_2')): ?>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="<?php echo esc_url(get_option('bss_banner_2')); ?>" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Neurology</h1>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_option('bss_banner_3')): ?>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="<?php echo esc_url(get_option('bss_banner_3')); ?>" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Pulmonary</h1>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<?php get_template_part('templates/about'); ?>
<?php get_template_part('templates/service'); ?>
<?php get_template_part('templates/testimonial'); ?>
<?php get_template_part('templates/feature'); ?>
<?php get_template_part('templates/team'); ?>
<?php get_template_part('templates/appointment'); ?>
<?php get_template_part('templates/faq'); ?>
<?php get_footer(); ?>