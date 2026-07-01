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
        'supports'      => array('title', 'thumbnail', 'editor'),
        'show_in_rest'  => false,
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
    register_setting('bss_team_settings_group', 'bss_team_description_1');
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
                    <th scope="row">Section Description</th>
                    <td>
                        <textarea name="bss_team_description_1" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_team_description_1')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Team Members</th>
                    <td>
                        <a href="<?php echo esc_url(admin_url('edit.php?post_type=team')); ?>"
                            class="button button-secondary">
                            Manage Team Members
                        </a>
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



add_action('wp_ajax_bss_get_team_member', 'bss_get_team_member');
add_action('wp_ajax_nopriv_bss_get_team_member', 'bss_get_team_member');

function bss_get_team_member()
{
    $team_id = intval($_POST['team_id']);

    $team = get_post($team_id);

    if (!$team || $team->post_type !== 'team') {
        wp_send_json_error();
    }

    ob_start();
    ?>

    <div class="row">

        <div class="col-md-4 text-center">

            <?php echo get_the_post_thumbnail(
                $team_id,
                'large',
                array(
                    'class' => 'img-fluid rounded'
                )
            ); ?>

        </div>

        <div class="col-md-8">

            <h2><?php echo esc_html($team->post_title); ?></h2>

            <?php
            $designation = get_post_meta(
                $team_id,
                '_team_designation',
                true
            );

            if ($designation):
            ?>
                <p class="text-primary fw-bold">
                    <?php echo esc_html($designation); ?>
                </p>
            <?php endif; ?>

            <div class="team-description">
                <?php echo wpautop($team->post_content); ?>
            </div>

        </div>

    </div>

    <?php

    wp_send_json_success(ob_get_clean());
}



/**
 * Display the team section.
 *
 * Usage: [team] or [team limit="4"]
 */
function bss_team_shortcode($attributes)
{
    $attributes = shortcode_atts(
        array(
            'limit' => -1,
        ),
        $attributes,
        'team'
    );

    $limit = (int) $attributes['limit'];

    if ($limit === 0 || $limit < -1) {
        $limit = -1;
    }

    ob_start();

    get_template_part(
        'templates/home/team',
        null,
        array(
            'limit' => $limit,
        )
    );

    return (string) ob_get_clean();
}

add_shortcode('team', 'bss_team_shortcode');