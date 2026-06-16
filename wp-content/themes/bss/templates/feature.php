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