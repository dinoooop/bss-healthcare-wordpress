<?php

/**
 * Services CPT
 */
function bss_register_service_cpt()
{
    $labels = array(
        'name' => 'Services',
        'singular_name' => 'Service',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Service',
        'edit_item' => 'Edit Service',
        'new_item' => 'New Service',
        'view_item' => 'View Service',
        'search_items' => 'Search Services',
        'not_found' => 'No services found',
        'menu_name' => 'Services',
    );

    register_post_type('service', array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'services'),
        'menu_icon' => 'dashicons-heart',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes'
        ),
        'show_in_rest' => true,
    ));
}
add_action('init', 'bss_register_service_cpt');


/**
 * Service Icon Meta Box
 */
function bss_service_icon_metabox()
{
    add_meta_box(
        'bss_service_icon',
        'Service Icon',
        'bss_service_icon_callback',
        'service',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'bss_service_icon_metabox');

function bss_service_icon_callback($post)
{
    wp_nonce_field('bss_service_icon_nonce', 'bss_service_icon_nonce');

    $icon = get_post_meta($post->ID, 'service_icon', true);

    $icons = [
        'fa-heartbeat' => 'Heart Beat',
        'fa-x-ray' => 'X-Ray',
        'fa-brain' => 'Brain',
        'fa-user-md' => 'Doctor',
        'fa-stethoscope' => 'Stethoscope',
        'fa-ambulance' => 'Ambulance',
        'fa-hospital' => 'Hospital',
    ];
?>

    <p>
        <select name="service_icon" id="service_icon" style="width:80%;">
            <?php foreach ($icons as $value => $label): ?>
                <option value="<?php echo esc_attr($value); ?>" <?php selected($icon, $value); ?>>
                    <?php echo esc_html($label); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <div id="icon-preview" style="margin-top:15px;font-size:32px;">
        <?php if (strpos($icon, 'bi-') === 0): ?>
            <i class="bi <?php echo esc_attr($icon); ?>"></i>
        <?php else: ?>
            <i class="fa <?php echo esc_attr($icon ?: 'fa-heartbeat'); ?>"></i>
        <?php endif; ?>
    </div>

    <script>
        jQuery(document).ready(function($) {

            $('#service_icon').on('change', function() {

                let icon = $(this).val();

                if (icon.startsWith('bi-')) {
                    $('#icon-preview').html(
                        '<i class="bi ' + icon + '"></i>'
                    );
                } else {
                    $('#icon-preview').html(
                        '<i class="fa ' + icon + '"></i>'
                    );
                }

            });

        });
    </script>

<?php
}



/**
 * Save Icon Field
 */
function bss_save_service_icon($post_id)
{
    if (!isset($_POST['bss_service_icon_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['bss_service_icon_nonce'], 'bss_service_icon_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['service_icon'])) {
        update_post_meta(
            $post_id,
            'service_icon',
            sanitize_text_field($_POST['service_icon'])
        );
    }
}
add_action('save_post_service', 'bss_save_service_icon');

// Register settings
add_action('admin_init', 'bss_service_register_settings');
function bss_service_register_settings()
{
    register_setting('bss_service_settings_group', 'bss_service_label');
    register_setting('bss_service_settings_group', 'bss_service_title');
}

// Settings page for title
function bss_service_settings_page()
{
?>
    <div class="wrap">
        <h1>Service Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_service_settings_group');
            do_settings_sections('bss_service_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">Section Label</th>
                    <td>
                        <input type="text" name="bss_service_label"
                            value="<?php echo esc_attr(get_option('bss_service_label')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Section Title</th>
                    <td>
                        <input type="text" name="bss_service_title"
                            value="<?php echo esc_attr(get_option('bss_service_title')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Services</th>
                    <td>
                        <a href="<?php echo esc_url(admin_url('edit.php?post_type=service')); ?>"
                            class="button button-secondary">
                            Manage Service
                        </a>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><?php submit_button(); ?></td>
                </tr>
            </table>
        </form>
    </div>
<?php
}
