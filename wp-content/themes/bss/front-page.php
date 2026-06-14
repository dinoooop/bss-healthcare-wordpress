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

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <?php if (get_option('bss_velora_image_1')): ?>
                        <img class="img-fluid rounded w-75 align-self-end"
                            src="<?php echo esc_url(get_option('bss_velora_image_1')); ?>">
                    <?php endif; ?>

                    <?php if (get_option('bss_velora_image_2')): ?>
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3"
                            src="<?php echo esc_url(get_option('bss_velora_image_2')); ?>" style="margin-top: -25%;">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block border rounded-pill py-1 px-4">
                    <?php echo esc_html(get_option('bss_velora_label')); ?>
                </p>
                <h1 class="mb-4"><?php echo esc_html(get_option('bss_velora_title')); ?></h1>
                <p><?php echo esc_html(get_option('bss_velora_description_1')); ?></p>
                <p class="mb-4"><?php echo esc_html(get_option('bss_velora_description_2')); ?></p>
                <?php
                $list_items = explode(',', get_option('bss_velora_list'));
                foreach ($list_items as $item) {
                    echo '<p><i class="far fa-check-circle text-primary me-3"></i>' . esc_html(trim($item)) . '</p>';
                }
                ?>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3"
                    href="<?php echo esc_url(get_option('bss_velora_button_url')); ?>"><?php echo esc_html(get_option('bss_velora_button_label')); ?></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">

        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">
                <?php echo esc_html(get_option('bss_service_label')); ?>
            </p>
            <h1><?php echo esc_html(get_option('bss_service_title')); ?></h1>
        </div>

        <div class="row g-4">

            <?php
            $services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 6,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if ($services->have_posts()):
                while ($services->have_posts()):
                    $services->the_post();

                    $icon = get_post_meta(get_the_ID(), 'service_icon', true);
                    ?>

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="service-item bg-light rounded h-100 p-5">

                            <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                                style="width:65px;height:65px;">

                                <?php if (strpos($icon, 'bi-') === 0): ?>
                                    <i class="bi <?php echo esc_attr($icon); ?> text-primary fs-4"></i>
                                <?php else: ?>
                                    <i class="fa <?php echo esc_attr($icon); ?> text-primary fs-4"></i>
                                <?php endif; ?>

                            </div>

                            <h4 class="mb-3">
                                <?php the_title(); ?>
                            </h4>

                            <p class="mb-4">
                                <?php echo get_the_excerpt(); ?>
                            </p>

                            <a class="btn" href="<?php the_permalink(); ?>">
                                <i class="fa fa-plus text-primary me-3"></i>
                                Read More
                            </a>

                        </div>
                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>

    </div>
</div>
<!-- Service End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">
                <?php echo esc_html(get_option('bss_testimonial_label', 'Testimonial')); ?>
            </p>
            <h1><?php echo esc_html(get_option('bss_testimonial_title')); ?></h1>
        </div>

        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php
            $testimonials = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));

            if ($testimonials->have_posts()):
                while ($testimonials->have_posts()):
                    $testimonials->the_post();

                    $designation = get_post_meta(
                        get_the_ID(),
                        '_bss_testimonial_designation',
                        true
                    );
                    ?>

                    <div class="testimonial-item text-center">

                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(
                                'thumbnail',
                                array(
                                    'class' => 'img-fluid bg-light rounded-circle p-2 mx-auto mb-4',
                                    'style' => 'width:100px;height:100px;object-fit:cover;'
                                )
                            ); ?>
                        <?php endif; ?>

                        <div class="testimonial-text rounded text-center p-4">
                            <p><?php echo wp_trim_words(get_the_content(), 50); ?></p>

                            <h5 class="mb-1">
                                <?php the_title(); ?>
                            </h5>

                            <span class="fst-italic">
                                <?php echo esc_html($designation); ?>
                            </span>
                        </div>

                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Feature Start -->
<div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="p-lg-5 ps-lg-0">
                    <p class="d-inline-block border rounded-pill text-light py-1 px-4">
                        <?php echo esc_html(get_option('bss_feature_label')); ?>
                    </p>
                    <h1 class="text-white mb-4"><?php echo esc_html(get_option('bss_feature_title')); ?></h1>
                    <p class="text-white mb-4 pb-2"><?php echo esc_html(get_option('bss_feature_description_1')); ?></p>
                    <?php if (!empty(get_option('bss_feature_description_2'))): ?>
                        <p class="text-white mb-4 pb-2"><?php echo esc_html(get_option('bss_feature_description_2')); ?></p>
                    <?php endif; ?>

                    <?php
                    $features = get_option('bss_feature_items', array());
                    $features = is_array($features) ? $features : json_decode($features, true);


                    ?>
                    <div class="row g-4">
                        <?php foreach ($features as $feature): ?>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light"
                                        style="width: 55px; height: 55px;">
                                        <i class="<?php echo esc_attr($feature['icon']); ?> text-primary"></i>
                                    </div>
                                    <?php $split = bss_split_last_word($feature['feature_name']); ?>
                                    <div class="ms-4">
                                        <p class="text-white mb-2"><?php echo esc_html($split[0]); ?></p>
                                        <h5 class="text-white mb-0"><?php echo esc_html($split[1]); ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100"
                        src="<?php echo esc_url(get_option('bss_feature_image')); ?>" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">
                <?php echo esc_html(get_option('bss_team_label')); ?></p>
            <h1><?php echo esc_html(get_option('bss_team_title')); ?></h1>
        </div>
        <div class="row g-4">
            <?php
            $team_query = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ));

            if ($team_query->have_posts()):
                while ($team_query->have_posts()):
                    $team_query->the_post();

                    $designation = get_post_meta(get_the_ID(), '_team_designation', true);
                    $facebook = get_post_meta(get_the_ID(), '_team_facebook', true);
                    $twitter = get_post_meta(get_the_ID(), '_team_twitter', true);
                    $instagram = get_post_meta(get_the_ID(), '_team_instagram', true);
                    ?>

                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('small', array('class' => 'img-fluid')); ?>
                                <?php endif; ?>
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5><?php the_title(); ?></h5>
                                <p class="text-primary"><?php echo esc_html($designation); ?></p>
                                <div class="team-social text-center">
                                    <?php if ($facebook): ?>
                                        <a class="btn btn-square" href="<?php echo esc_url($facebook); ?>"><i
                                                class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>
                                    <?php if ($twitter): ?>
                                        <a class="btn btn-square" href="<?php echo esc_url($twitter); ?>"><i
                                                class="fab fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if ($instagram): ?>
                                        <a class="btn btn-square" href="<?php echo esc_url($instagram); ?>"><i
                                                class="fab fa-instagram"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Appointment Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="d-inline-block border rounded-pill py-1 px-4">
                    <?php echo esc_html(get_option('bss_appointment_label')); ?>
                </p>

                <h1 class="mb-4">
                    <?php echo esc_html(get_option('bss_appointment_title')); ?>
                </h1>

                <p class="mb-4">
                    <?php echo esc_html(get_option('bss_appointment_description_1')); ?>
                </p>

                <?php if (get_option('bss_appointment_description_2')): ?>
                    <p class="mb-4">
                        <?php echo esc_html(get_option('bss_appointment_description_2')); ?>
                    </p>
                <?php endif; ?>

            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white"
                        style="width: 55px; height: 55px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-4">
                        <p class="mb-2">Call Us Now</p>
                        <h5 class="mb-0"><?php echo esc_html(get_option('bss_phone_2')); ?></h5>
                    </div>
                </div>
                <div class="bg-light rounded d-flex align-items-center p-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white"
                        style="width: 55px; height: 55px;">
                        <i class="fa fa-envelope-open text-primary"></i>
                    </div>
                    <div class="ms-4">
                        <p class="mb-2">Mail Us Now</p>
                        <h5 class="mb-0"><?php echo esc_html(get_option('bss_email')); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- FAQ Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4"><?php echo esc_html(get_option('bss_faq_label', 'FAQ')); ?></p>
            <h1><?php echo esc_html(get_option('bss_faq_title')); ?></h1>
        </div>

        <?php
        $faq_query = new WP_Query(array(
            'post_type' => 'faq',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ));

        $i = 1;

        if ($faq_query->have_posts()):
            while ($faq_query->have_posts()):
                $faq_query->the_post();

                $answer = get_post_meta(get_the_ID(), '_faq_answer', true);
                ?>

                <div class="container-faq">
                    <div class="question">
                        <?php echo 'Q' . $i++ . '. '; ?><?php the_title(); ?>
                    </div>
                    <div class="answercont">
                        <div class="answer">
                            <?php echo wpautop($answer); ?>
                        </div>
                    </div>
                </div>

                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>
<!-- FAQ End -->

<?php get_footer(); ?>