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
                            <p><?php echo esc_html(get_the_content()); ?></p>

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