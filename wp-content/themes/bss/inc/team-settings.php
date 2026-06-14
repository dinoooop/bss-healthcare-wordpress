<?php

/**
 * Team Custom Post Type
 */

add_action('init', 'bss_register_team_cpt');

function bss_register_team_cpt()
{
    register_post_type('team', array(
        'labels' => array(
            'name'               => 'Teams',
            'singular_name'      => 'Team',
            'add_new'            => 'Add Team Member',
            'add_new_item'       => 'Add Team Member',
            'edit_item'          => 'Edit Team Member',
            'new_item'           => 'New Team Member',
            'view_item'          => 'View Team Member',
            'search_items'       => 'Search Team Members',
            'not_found'          => 'No Team Members found',
            'featured_image'     => 'Team Member Image',
            'set_featured_image' => 'Set Team Member Image',
            'menu_name'          => 'Team',
        ),
        'public'        => true,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => array('title', 'thumbnail'),
        'show_in_rest'  => true,
        'has_archive'   => false,
        'rewrite'       => array('slug' => 'team'),
    ));
}


/**
 * Team Details Meta Box
 */
add_action('add_meta_boxes', 'bss_team_meta_boxes');

function bss_team_meta_boxes()
{
    add_meta_box(
        'bss_team_details',
        'Team Details',
        'bss_team_meta_box_callback',
        'team',
        'side',
        'default'
    );
}

function bss_team_meta_box_callback($post)
{
    wp_nonce_field('bss_team_save_meta', 'bss_team_nonce');

    $designation = get_post_meta($post->ID, '_team_designation', true);
    $facebook    = get_post_meta($post->ID, '_team_facebook', true);
    $twitter     = get_post_meta($post->ID, '_team_twitter', true);
    $instagram   = get_post_meta($post->ID, '_team_instagram', true);
?>

    <p>
        <label><strong>Designation</strong></label><br>
        <input type="text"
            name="team_designation"
            value="<?php echo esc_attr($designation); ?>"
            style="width:100%;">
    </p>

    <p>
        <label><strong>Facebook URL</strong></label><br>
        <input type="url"
            name="team_facebook"
            value="<?php echo esc_attr($facebook); ?>"
            style="width:100%;">
    </p>

    <p>
        <label><strong>Twitter URL</strong></label><br>
        <input type="url"
            name="team_twitter"
            value="<?php echo esc_attr($twitter); ?>"
            style="width:100%;">
    </p>

    <p>
        <label><strong>Instagram URL</strong></label><br>
        <input type="url"
            name="team_instagram"
            value="<?php echo esc_attr($instagram); ?>"
            style="width:100%;">
    </p>

<?php
}

add_action('save_post_team', 'bss_save_team_meta');

function bss_save_team_meta($post_id)
{
    if (
        !isset($_POST['bss_team_nonce']) ||
        !wp_verify_nonce($_POST['bss_team_nonce'], 'bss_team_save_meta')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    update_post_meta(
        $post_id,
        '_team_designation',
        sanitize_text_field($_POST['team_designation'] ?? '')
    );

    update_post_meta(
        $post_id,
        '_team_facebook',
        esc_url_raw($_POST['team_facebook'] ?? '')
    );

    update_post_meta(
        $post_id,
        '_team_twitter',
        esc_url_raw($_POST['team_twitter'] ?? '')
    );

    update_post_meta(
        $post_id,
        '_team_instagram',
        esc_url_raw($_POST['team_instagram'] ?? '')
    );
}



// Register settings
add_action('admin_init', 'bss_team_register_settings');
function bss_team_register_settings()
{
    register_setting('bss_team_settings_group', 'bss_team_label');
    register_setting('bss_team_settings_group', 'bss_team_title');
}

// Settings page for title
function bss_team_settings_page()
{
?>
    <div class="wrap">
        <h1>Team Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_team_settings_group');
            do_settings_sections('bss_team_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">Section Label</th>
                    <td>
                        <input type="text"
                               name="bss_team_label"
                               value="<?php echo esc_attr(get_option('bss_team_label')); ?>"
                               class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Section Title</th>
                    <td>
                        <input type="text"
                               name="bss_team_title"
                               value="<?php echo esc_attr(get_option('bss_team_title')); ?>"
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