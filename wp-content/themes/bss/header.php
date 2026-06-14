<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <a href="https://wa.me/919876543210" class="whatsapp-button btn-primary" target="_blank"
        aria-label="Chat with us on WhatsApp">
        <img src="https://img.icons8.com/ios-filled/30/ffffff/whatsapp.png" alt="WhatsApp Icon" />
    </a>

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <i class="bi bi-telephone-fill text-primary me-2"></i>
                    <small><?php echo esc_html(get_option('bss_phone_1')); ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <i class="bi bi-phone-fill text-primary me-2"></i>
                    <small><?php echo esc_html(get_option('bss_phone_2')); ?></small>
                </div>
            </div>

            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <i class="bi bi-envelope-fill text-primary me-2"></i>
                    <small>
                        <a href="mailto:<?php echo esc_html(get_option('bss_email')); ?>" class="text-primary">
                            <?php echo esc_html(get_option('bss_email')); ?>
                        </a>
                    </small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" target="_blank"
                        href="<?php echo esc_url(get_option('bss_facebook')); ?>"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" target="_blank"
                        href="<?php echo esc_url(get_option('bss_twitter')); ?>"><i class="bi bi-twitter-x"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" target="_blank"
                        href="<?php echo esc_url(get_option('bss_youtube')); ?>"><i class="bi bi-youtube"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" target="_blank"
                        href="<?php echo esc_url(get_option('bss_linkedin')); ?>"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" target="_blank"
                        href="<?php echo esc_url(get_option('bss_instagram')); ?>"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">

        <a href="<?php echo esc_url(home_url('/')); ?>"
            class="navbar-brand d-flex align-items-center px-4 px-lg-5">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                alt="<?php bloginfo('name'); ?>"
                style="height: 70px;">
        </a>

        <button type="button" class="navbar-toggler me-4"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'navbar-nav ms-auto p-4 p-lg-0',
                'fallback_cb'    => false,
                'menu_item_class' => 'nav-item nav-link',
            ));
            ?>

            <a href="https://wa.me/919876543210"
                target="_blank"
                class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">
                Appointment
                <i class="fa fa-arrow-right ms-3"></i>
            </a>

        </div>

    </nav>
    <!-- Navbar End -->