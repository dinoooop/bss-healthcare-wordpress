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