<?php

/**
 * FAQ Custom Post Type
 */

add_action('init', 'bss_register_faq_cpt');

function bss_register_faq_cpt()
{
    register_post_type('faq', array(
        'labels' => array(
            'name' => 'FAQ',
            'singular_name' => 'FAQ',
            'add_new' => 'Add FAQ',
            'add_new_item' => 'Add FAQ',
            'edit_item' => 'Edit FAQ',
            'new_item' => 'New FAQ',
            'view_item' => 'View FAQ',
            'search_items' => 'Search FAQ',
            'not_found' => 'No FAQs found',
            'menu_name' => 'FAQ',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => array('title'),
        'show_in_rest' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'faq'),
    ));
}

/**
 * FAQ Meta Box
 */
add_action('add_meta_boxes', 'bss_faq_meta_boxes');

function bss_faq_meta_boxes()
{
    add_meta_box(
        'bss_faq_details',
        'FAQ Answer',
        'bss_faq_meta_box_callback',
        'faq',
        'normal',
        'default'
    );
}

function bss_faq_meta_box_callback($post)
{
    wp_nonce_field('bss_faq_save_meta', 'bss_faq_nonce');

    $answer = get_post_meta($post->ID, '_faq_answer', true);
    ?>

    <p>
        <strong>Question</strong><br>
        <small>Use the post title as the question.</small>
    </p>

    <p>
        <label><strong>Answer</strong></label>
        <textarea name="faq_answer" rows="8" style="width:100%;"><?php echo esc_textarea($answer); ?></textarea>
    </p>

    <?php
}

add_action('save_post_faq', 'bss_save_faq_meta');

function bss_save_faq_meta($post_id)
{
    if (
        !isset($_POST['bss_faq_nonce']) ||
        !wp_verify_nonce($_POST['bss_faq_nonce'], 'bss_faq_save_meta')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    update_post_meta(
        $post_id,
        '_faq_answer',
        wp_kses_post($_POST['faq_answer'] ?? '')
    );
}


// Settings page for FAQ
// Register settings
add_action('admin_init', 'bss_faq_register_settings');
function bss_faq_register_settings()
{
    register_setting('bss_faq_settings_group', 'bss_faq_label');
    register_setting('bss_faq_settings_group', 'bss_faq_title');
}

// Settings page for title
function bss_faq_settings_page()
{
    ?>
    <div class="wrap">
        <h1>FAQ Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_faq_settings_group');
            do_settings_sections('bss_faq_settings_group');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Section Label</th>
                    <td>
                        <input type="text" name="bss_faq_label" value="<?php echo esc_attr(get_option('bss_faq_label')); ?>"
                            class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Section Title</th>
                    <td>
                        <input type="text" name="bss_faq_title" value="<?php echo esc_attr(get_option('bss_faq_title')); ?>"
                            class="regular-text">
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