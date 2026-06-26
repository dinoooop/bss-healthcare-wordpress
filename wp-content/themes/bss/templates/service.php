<!-- Service Start -->
<?php $limit = $args['limit'] ?? -1; ?>
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
                'posts_per_page' => $limit,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if ($services->have_posts()):
                while ($services->have_posts()):
                    $services->the_post();

                    $icon = get_post_meta(get_the_ID(), 'service_icon', true);
                    ?>

                    <div class="col-md-4 wow fadeInUp">
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
        <?php if ($limit != -1): ?>
            <div class="row">
                <div class="col-lg-12 text-center ">
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="/services">View More</a>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
<!-- Service End -->