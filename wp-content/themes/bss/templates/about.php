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
                <p class="mb-4"><?php echo esc_html(get_option('bss_velora_description_3')); ?></p>
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