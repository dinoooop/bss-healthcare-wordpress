<?php

add_action('wp_enqueue_scripts', 'bss_enqueue_assets');
function bss_enqueue_assets() {

    /* =====================
     * STYLES
     * ===================== */

    wp_enqueue_style(
        'bss-google-fonts',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',
        array(),
        '5.10.0'
    );

    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css',
        array(),
        '1.13.1'
    );

    wp_enqueue_style(
        'animate',
        get_template_directory_uri() . '/assets/lib/animate/animate.min.css'
    );

    wp_enqueue_style(
        'owl-carousel',
        get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css'
    );

    wp_enqueue_style(
        'tempusdominus',
        get_template_directory_uri() . '/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'
    );

    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css'
    );

    wp_enqueue_style(
        'bss-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('bootstrap')
    );

    /* =====================
     * SCRIPTS
     * ===================== */

    

    // jQuery (WordPress bundled version)
    wp_enqueue_script('jquery');

    

    

    // Bootstrap
    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        '5.0.0',
        true
    );

    // Theme Library Scripts
    wp_enqueue_script(
        'wow',
        get_template_directory_uri() . '/assets/lib/wow/wow.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'easing',
        get_template_directory_uri() . '/assets/lib/easing/easing.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'waypoints',
        get_template_directory_uri() . '/assets/lib/waypoints/waypoints.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'counterup',
        get_template_directory_uri() . '/assets/lib/counterup/counterup.min.js',
        array('jquery', 'waypoints'),
        null,
        true
    );

    wp_enqueue_script(
        'owl-carousel',
        get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'moment',
        get_template_directory_uri() . '/assets/lib/tempusdominus/js/moment.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'moment-timezone',
        get_template_directory_uri() . '/assets/lib/tempusdominus/js/moment-timezone.min.js',
        array('moment'),
        null,
        true
    );

    wp_enqueue_script(
        'tempusdominus',
        get_template_directory_uri() . '/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js',
        array('jquery', 'moment'),
        null,
        true
    );

    wp_enqueue_script(
        'bss-fontawesome',
        'https://kit.fontawesome.com/0d743a28c2.js',
        array('jquery'),
        '1.0',
        true
    );

    

    wp_enqueue_script(
        'bss-faq',
        get_template_directory_uri() . '/assets/js/faq.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        null,
        true
    );
}

add_theme_support('title-tag');

register_nav_menus(array(
    'primary' => 'Primary Menu',
));



function bss_admin_assets($hook) {

    wp_enqueue_style(
        'bss-admin-css',
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        '1.0'
    );

    wp_enqueue_media();

    wp_enqueue_script(
        'bss-admin-script',
        get_template_directory_uri() . '/assets/js/admin-script.js',
        array('jquery'),
        '1.0',
        true
    );
    
   

    wp_enqueue_script(
        'bss-admin-icon-selector',
        get_template_directory_uri() . '/assets/js/icon-selector.js',
        array('jquery'),
        '1.0',
        true
    );
    wp_enqueue_script(
        'bss-admin-fontawesome',
        'https://kit.fontawesome.com/0d743a28c2.js',
        array('jquery'),
        '1.0',
        true
    );

    // wp_enqueue_style(
    //     'font-awesome',
    //     'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',
    //     array(),
    //     '5.10.0'
    // );
    wp_enqueue_style(
        'icon-selector',
        get_template_directory_uri() . '/assets/css/icon-selector.css',
        array(),
        '5.10.0'
    );
}
add_action('admin_enqueue_scripts', 'bss_admin_assets');


add_filter('nav_menu_link_attributes', 'bss_nav_link_class', 10, 4);

function bss_nav_link_class($atts, $item, $args, $depth)
{
    if ($args->theme_location === 'primary') {
        $atts['class'] = 'nav-item nav-link';
    }

    return $atts;
}


function bss_theme_setup()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'bss_theme_setup');