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