<?php

/**
 * Leadership Custom Post Type
 */

add_action('init', 'bss_register_leadership_cpt');

function bss_register_leadership_cpt()
{
    register_post_type('leadership', array(
        'labels' => array(
            'name'               => 'Leadership',
            'singular_name'      => 'Leadership',
            'add_new'            => 'Add Leadership Member',
            'add_new_item'       => 'Add Leadership Member',
            'edit_item'          => 'Edit Leadership Member',
            'new_item'           => 'New Leadership Member',
            'view_item'          => 'View Leadership Member',
            'search_items'       => 'Search Leadership Members',
            'not_found'          => 'No Leadership Members found',
            'featured_image'     => 'Leadership Member Image',
            'set_featured_image' => 'Set Leadership Member Image',
            'menu_name'          => 'Leadership',
        ),
        'public'       => true,
        'menu_icon'    => 'dashicons-businessperson',
        'supports'     => array('title', 'thumbnail', 'editor'),
        'show_in_rest' => false,
        'has_archive'  => false,
        'rewrite'      => array('slug' => 'leadership'),
    ));
}


/**
 * Leadership Details Meta Box
 */
add_action('add_meta_boxes', 'bss_leadership_meta_boxes');

function bss_leadership_meta_boxes()
{
    add_meta_box(
        'bss_leadership_details',
        'Leadership Details',
        'bss_leadership_meta_box_callback',
        'leadership',
        'side',
        'default'
    );
}

function bss_leadership_meta_box_callback($post)
{
    wp_nonce_field('bss_leadership_save_meta', 'bss_leadership_nonce');

    $designation = get_post_meta($post->ID, '_leadership_designation', true);
?>

    <p>
        <label><strong>Designation</strong></label><br>
        <input type="text"
            name="leadership_designation"
            value="<?php echo esc_attr($designation); ?>"
            style="width:100%;">
    </p>

<?php
}

add_action('save_post_leadership', 'bss_save_leadership_meta');

function bss_save_leadership_meta($post_id)
{
    if (
        !isset($_POST['bss_leadership_nonce']) ||
        !wp_verify_nonce($_POST['bss_leadership_nonce'], 'bss_leadership_save_meta')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    update_post_meta(
        $post_id,
        '_leadership_designation',
        sanitize_text_field($_POST['leadership_designation'] ?? '')
    );
}



add_action('wp_ajax_bss_get_leadership_member', 'bss_get_leadership_member');
add_action('wp_ajax_nopriv_bss_get_leadership_member', 'bss_get_leadership_member');

function bss_get_leadership_member()
{
    $leadership_id = intval($_POST['leadership_id']);

    $leadership = get_post($leadership_id);

    if (!$leadership || $leadership->post_type !== 'leadership') {
        wp_send_json_error();
    }

    ob_start();
    ?>

    <div class="row">

        <div class="col-md-4 text-center">

            <?php echo get_the_post_thumbnail(
                $leadership_id,
                'large',
                array(
                    'class' => 'img-fluid rounded'
                )
            ); ?>

        </div>

        <div class="col-md-8">

            <h2><?php echo esc_html($leadership->post_title); ?></h2>

            <?php
            $designation = get_post_meta(
                $leadership_id,
                '_leadership_designation',
                true
            );

            if ($designation):
            ?>
                <p class="text-primary fw-bold">
                    <?php echo esc_html($designation); ?>
                </p>
            <?php endif; ?>

            <div class="team-description">
                <?php echo wpautop($leadership->post_content); ?>
            </div>

        </div>

    </div>

    <?php

    wp_send_json_success(ob_get_clean());
}



/**
 * Display the leadership section.
 *
 * Usage: [leadership] or [leadership limit="4"]
 */
function bss_leadership_shortcode($attributes)
{
    $attributes = shortcode_atts(
        array(
            'limit' => -1,
        ),
        $attributes,
        'leadership'
    );

    $limit = (int) $attributes['limit'];

    if ($limit === 0 || $limit < -1) {
        $limit = -1;
    }

    ob_start();

    get_template_part(
        'templates/home/leadership',
        null,
        array(
            'limit' => $limit,
        )
    );

    return (string) ob_get_clean();
}

add_shortcode('leadership', 'bss_leadership_shortcode');
