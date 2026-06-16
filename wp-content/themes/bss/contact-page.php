<?php
/*
Template Name: Contact Page
*/

get_header();
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>

        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo esc_url(home_url('/')); ?>">
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item text-primary active" aria-current="page">
                    Contact
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">

                <div class="bg-light rounded p-5 mb-4">
                    <div class="h-100 bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white"
                            style="width:55px;height:55px;">
                            <i class="fa fa-map-marker-alt text-primary"></i>
                        </div>

                        <div class="ms-4">
                            <p class="mb-2">Address</p>
                            <h5 class="mb-0">
                                <?php echo nl2br(esc_html(get_option('bss_address'))); ?>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="bg-light rounded p-5 mb-4">
                    <div class="h-100 bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white"
                            style="width:55px;height:55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>

                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">
                                <?php echo esc_html(get_option('bss_phone_2')); ?>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="bg-light rounded p-5 mb-4">
                    <div class="h-100 bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white"
                            style="width:55px;height:55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>

                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0">
                                <?php echo esc_html(get_option('bss_email')); ?>
                            </h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100" style="min-height:400px;">

                    <?php
                    $map_embed = get_option('bss_google_map_embed');
                    if (!empty($map_embed)) :
                    ?>
                        <iframe
                            class="rounded w-100 h-100"
                            src="<?php echo esc_url($map_embed); ?>"
                            frameborder="0"
                            allowfullscreen=""
                            aria-hidden="false"
                            tabindex="0">
                        </iframe>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->

<?php get_footer(); ?>