<!-- Leadership Start -->
<?php
$limit = $args['limit'] ?? -1;
?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Leadership</p>
            <h1>Our Leadership</h1>
        </div>
        <div class="row g-4">
            <?php

            $leadership_query = new WP_Query(array(
                'post_type' => 'leadership',
                'posts_per_page' => $limit,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ));

            if ($leadership_query->have_posts()):
                while ($leadership_query->have_posts()):
                    $leadership_query->the_post();

                    $designation = get_post_meta(get_the_ID(), '_leadership_designation', true);
            ?>

                    <div class="col-lg-4 col-md-6 wow fadeInUp leadership-member" data-wow-delay="0.1s" data-leadership-id="<?php echo esc_attr(get_the_ID()); ?>">
                        <div class="team-item position-relative rounded overflow-hidden team-clickable">
                            <div class="overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('small', array('class' => 'img-fluid')); ?>
                                <?php endif; ?>
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5><?php the_title(); ?></h5>
                                <?php if ($designation): ?>
                                    <p class="text-primary"><?php echo esc_html($designation); ?></p>
                                <?php endif; ?>
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
        <div class="modal fade" id="leadershipModal" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Leadership Member</h5>
                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div id="leadership-modal-loading" class="text-center py-5">
                            Loading...
                        </div>

                        <div id="leadership-modal-content"></div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Modal End -->
    </div>
</div>
<!-- Leadership End -->
