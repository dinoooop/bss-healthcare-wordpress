<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p class="mb-2"><i
                        class="fa fa-map-marker-alt me-3"></i><?php echo esc_html(get_option('bss_address')); ?></p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo esc_html(get_option('bss_phone_1')); ?>
                </p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i><a
                        href="mailto:<?php echo esc_attr(get_option('bss_email')); ?>"><?php echo esc_html(get_option('bss_email')); ?></a>
                </p>
                <div class="d-flex pt-2">
                    <?php if (get_option('bss_facebook')): ?>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="<?php echo esc_url(get_option('bss_facebook')); ?>" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if (get_option('bss_twitter')): ?>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="<?php echo esc_url(get_option('bss_twitter')); ?>" target="_blank"><i
                                class="bi bi-twitter-x"></i></a>
                    <?php endif; ?>

                    <?php if (get_option('bss_instagram')): ?>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="<?php echo esc_url(get_option('bss_instagram')); ?>" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if (get_option('bss_youtube')): ?>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="<?php echo esc_url(get_option('bss_youtube')); ?>" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    <?php endif; ?>
                    <?php if (get_option('bss_linkedin')): ?>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="<?php echo esc_url(get_option('bss_linkedin')); ?>" target="_blank"><i
                                class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $footer_link_set_1 = get_option('bss_footer_link_set_1', array());
            $footer_link_set_1 = is_array($footer_link_set_1) ? $footer_link_set_1 : json_decode($footer_link_set_1, true);
            ?>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4"><?php echo esc_html(get_option('bss_footer_link_set_1_title')); ?></h5>
                <?php if (!empty($footer_link_set_1)): ?>
                    <?php foreach ($footer_link_set_1 as $link): ?>
                        <a class="btn btn-link" href="<?php echo esc_url($link['url']); ?>">
                            <?php echo esc_html($link['label']); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </div>
            <?php
            $footer_link_set_2 = get_option('bss_footer_link_set_2', array());
            $footer_link_set_2 = is_array($footer_link_set_2) ? $footer_link_set_2 : json_decode($footer_link_set_2, true);
            ?>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4"><?php echo esc_html(get_option('bss_footer_link_set_2_title')); ?></h5>
                <?php if (!empty($footer_link_set_2)): ?>
                    <?php foreach ($footer_link_set_2 as $link): ?>
                        <a class="btn btn-link" href="<?php echo esc_url($link['url']); ?>">
                            <?php echo esc_html($link['label']); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Newsletter</h5>
                <p>Stay Updated with the Latest Healthcare Insights.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <?php echo date('Y'); ?> <a class="border-bottom" href="/">BSS Healthcare International</a>, All Rights
                    Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="#">Zoople</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>

<?php wp_footer(); ?>

</body>

</html>