<?php

require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/home-settings.php';
require_once get_template_directory() . '/inc/contact-settings.php';
require_once get_template_directory() . '/inc/banner-settings.php';
require_once get_template_directory() . '/inc/velora-settings.php';
require_once get_template_directory() . '/inc/service-settings.php';
require_once get_template_directory() . '/inc/testimonial-settings.php';
require_once get_template_directory() . '/inc/feature-settings.php';
require_once get_template_directory() . '/inc/team-settings.php';
require_once get_template_directory() . '/inc/appointment-settings.php';
require_once get_template_directory() . '/inc/faq-settings.php';
require_once get_template_directory() . '/inc/footer-settings.php';

 remove_filter('the_content', 'wpautop');