<?php

add_action('admin_menu', 'bss_home_settings_menu');

function bss_home_settings_menu()
{
    add_menu_page(
        'Home Settings',
        'Home Settings',
        'manage_options',
        'bss-home-settings',
        'bss_contact_settings_page',
        'dashicons-admin-home',
        2
    );
    add_submenu_page(
        'bss-home-settings',
        'Banner Settings',
        'Banner Settings',
        'manage_options',
        'bss-banner-settings',
        'bss_banner_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'About Settings',
        'About Settings',
        'manage_options',
        'bss-velora-settings',
        'bss_velora_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Service Settings',
        'Service Settings',
        'manage_options',
        'bss-service-settings',
        'bss_service_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Testimonial Settings',
        'Testimonial Settings',
        'manage_options',
        'bss-testimonial-settings',
        'bss_testimonial_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Feature Settings',
        'Feature Settings',
        'manage_options',
        'bss-feature-settings',
        'bss_feature_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Team Members',
        'Team Members',
        'manage_options',
        'bss-team-settings',
        'bss_team_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Appointment Settings',
        'Appointment Settings',
        'manage_options',
        'bss-appointment-settings',
        'bss_appointment_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'FAQ Settings',
        'FAQ Settings',
        'manage_options',
        'bss-faq-settings',
        'bss_faq_settings_page'
    );
    add_submenu_page(
        'bss-home-settings',
        'Footer Settings',
        'Footer Settings',
        'manage_options',
        'bss-footer-settings',
        'bss_footer_settings_page'
    );
}
