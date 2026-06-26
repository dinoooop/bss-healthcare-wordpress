<!-- Team Start -->
<?php
$limit = $args['limit'] ?? -1;

?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">
                <?php echo esc_html(get_option('bss_team_label')); ?></p>
            <h1><?php echo esc_html(get_option('bss_team_title')); ?></h1>
            <?php if ($limit == -1): ?>
                <p><?php echo esc_html(get_option('bss_team_description_1')); ?></p>
            <?php endif; ?>
        </div>
        <div class="row g-4">
            <?php

            $team_query = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => $limit,
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

                    <div class="col-lg-3 col-md-6 wow fadeInUp team-member" data-wow-delay="0.1s" data-team-id="<?php echo get_the_ID(); ?>">
                        <div class="team-item position-relative rounded overflow-hidden team-clickable">
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
        <!-- Modal Start -->
        <div class="modal fade" id="teamModal" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Team Member</h5>
                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div id="team-modal-loading" class="text-center py-5">
                            Loading...
                        </div>

                        <div id="team-modal-content"></div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Modal End -->
        <?php if ($limit != -1): ?>
            <div class="row">
                <div class="col-lg-12 text-center ">
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="/teams">View More</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Team End -->