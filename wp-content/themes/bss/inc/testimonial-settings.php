<?php

add_action('init', 'bss_register_testimonial_cpt');

function bss_register_testimonial_cpt()
{
    register_post_type('testimonial', array(
        'labels' => array(
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
            'featured_image'     => 'Patient Image',
            'set_featured_image' => 'Set Patient Image',
            'add_new_item'  => 'Add New Testimonial',
            'edit_item'     => 'Edit Testimonial',
        ),
        'public'       => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}

// Meta fields
add_action('add_meta_boxes', 'bss_testimonial_meta_box');

function bss_testimonial_meta_box()
{
    add_meta_box(
        'bss_testimonial_details',
        'Testimonial Details',
        'bss_testimonial_meta_box_callback',
        'testimonial',
        'side',
        'default'
    );
}

function bss_testimonial_meta_box_callback($post)
{
    wp_nonce_field('bss_testimonial_nonce', 'bss_testimonial_nonce');

    $designation = get_post_meta($post->ID, '_bss_testimonial_designation', true);
?>
    <p>
        <label for="bss_testimonial_designation">
            <strong>Patient Designation</strong>
        </label>
    </p>

    <input
        type="text"
        id="bss_testimonial_designation"
        name="bss_testimonial_designation"
        value="<?php echo esc_attr($designation); ?>"
        style="width:50%;">

<?php
}

add_action('save_post_testimonial', 'bss_save_testimonial_meta');

function bss_save_testimonial_meta($post_id)
{
    if (
        !isset($_POST['bss_testimonial_nonce']) ||
        !wp_verify_nonce($_POST['bss_testimonial_nonce'], 'bss_testimonial_nonce')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    update_post_meta(
        $post_id,
        '_bss_testimonial_designation',
        sanitize_text_field($_POST['bss_testimonial_designation'] ?? '')
    );
}



add_filter('enter_title_here', 'bss_testimonial_title_placeholder', 10, 2);
function bss_testimonial_title_placeholder($title, $post)
{
    if ($post->post_type === 'testimonial') {
        $title = 'Patient Name';
    }

    return $title;
}


// Use old editor
add_filter('use_block_editor_for_post_type', function ($use_block_editor, $post_type) {
    if ($post_type === 'testimonial' || $post_type === 'service') {
        return false;
    }
    return $use_block_editor;
}, 10, 2);



// Register settings
add_action('admin_init', 'bss_testimonial_register_settings');
function bss_testimonial_register_settings()
{
    register_setting('bss_testimonial_settings_group', 'bss_testimonial_label');
    register_setting('bss_testimonial_settings_group', 'bss_testimonial_title');
}

// Settings page for title
function bss_testimonial_settings_page()
{
?>
    <div class="wrap">
        <h1>Testimonial Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_testimonial_settings_group');
            do_settings_sections('bss_testimonial_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">Section Label</th>
                    <td>
                        <input type="text"
                               name="bss_testimonial_label"
                               value="<?php echo esc_attr(get_option('bss_testimonial_label')); ?>"
                               class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Section Title</th>
                    <td>
                        <input type="text"
                               name="bss_testimonial_title"
                               value="<?php echo esc_attr(get_option('bss_testimonial_title')); ?>"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <?php submit_button(); ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php
}