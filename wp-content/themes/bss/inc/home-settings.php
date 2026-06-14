<?php

add_action('admin_menu', 'bss_home_settings_menu');

function bss_home_settings_menu()
{
    add_menu_page(
        'Home Settings',          // Page title
        'Home Settings',          // Menu title
        'manage_options',           // Capability
        'bss-home-settings',      // Menu slug
        'bss_contact_settings_page', // Callback function
        'dashicons-admin-home',    // Icon
        2                          // Position
    );

    add_submenu_page(
        'bss-home-settings',
        'Banner Settings',             // Page title
        'Banner Settings',             // Menu title
        'manage_options',
        'bss-banner-settings',  // Menu slug
        'bss_banner_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'About Settings',             // Page title
        'About Settings',             // Menu title
        'manage_options',
        'bss-velora-settings',  // Menu slug
        'bss_velora_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Feature Settings',             // Page title
        'Feature Settings',             // Menu title
        'manage_options',
        'bss-feature-settings',  // Menu slug
        'bss_feature_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Appointment Settings',             // Page title
        'Appointment Settings',             // Menu title
        'manage_options',
        'bss-appointment-settings',  // Menu slug
        'bss_appointment_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Service Settings',             // Page title
        'Service Settings',             // Menu title
        'manage_options',
        'bss-service-settings',  // Menu slug
        'bss_service_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Testimonial Settings',             // Page title
        'Testimonial Settings',             // Menu title
        'manage_options',
        'bss-testimonial-settings',  // Menu slug
        'bss_testimonial_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Team Settings',             // Page title
        'Team Settings',             // Menu title
        'manage_options',
        'bss-team-settings',  // Menu slug
        'bss_team_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'FAQ Settings',             // Page title
        'FAQ Settings',             // Menu title
        'manage_options',
        'bss-faq-settings',  // Menu slug
        'bss_faq_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Footer Settings',             // Page title
        'Footer Settings',             // Menu title
        'manage_options',
        'bss-footer-settings',  // Menu slug
        'bss_footer_settings_page'
    );
}


