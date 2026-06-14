<?php

/**
 * Feature Settings Page
 */
// add_action('admin_menu', 'bss_feature_settings_menu');

// function bss_feature_settings_menu()
// {
//     add_menu_page(
//         'Feature Settings',
//         'Feature',
//         'manage_options',
//         'bss-feature-settings',
//         'bss_feature_settings_page',
//         'dashicons-star-filled',
//         30
//     );
// }


add_action('admin_init', 'bss_feature_settings_register');
function bss_feature_settings_register()
{
    register_setting('bss_feature_settings_group', 'bss_feature_label');
    register_setting('bss_feature_settings_group', 'bss_feature_title');
    register_setting('bss_feature_settings_group', 'bss_feature_description_1');
    register_setting('bss_feature_settings_group', 'bss_feature_description_2');
    register_setting('bss_feature_settings_group', 'bss_feature_image');
    register_setting('bss_feature_settings_group', 'bss_feature_items');
}

function bss_feature_settings_page()
{
?>
    <div class="wrap">
        <h1>Feature Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_feature_settings_group');
            do_settings_sections('bss_feature_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">
                        <label for="bss_feature_label">Section Label</label>
                    </th>
                    <td>
                        <input type="text"
                            id="bss_feature_label"
                            name="bss_feature_label"
                            value="<?php echo esc_attr(get_option('bss_feature_label')); ?>"
                            class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="bss_feature_title">Section Title</label>
                    </th>
                    <td>
                        <input type="text"
                            id="bss_feature_title"
                            name="bss_feature_title"
                            value="<?php echo esc_attr(get_option('bss_feature_title')); ?>"
                            class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="bss_feature_description_1">Feature Description 1</label>
                    </th>
                    <td>
                        <textarea
                            id="bss_feature_description_1"
                            name="bss_feature_description_1"
                            rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_feature_description_1')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="bss_feature_description_2">Feature Description 2</label>
                    </th>
                    <td>
                        <textarea
                            id="bss_feature_description_2"
                            name="bss_feature_description_2"
                            rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_feature_description_2')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="bss_feature_image">Section Main Image</label>
                    </th>
                    <td>
                        <!-- Upload Button -->
                        <input
                            type="hidden"
                            class="regular-text bss-image-url"
                            name="bss_feature_image"
                            value="<?php echo esc_attr(get_option('bss_feature_image')); ?>">

                        <button type="button" class="button bss-upload-image">
                            Upload Image
                        </button>
                        <img
                            class="bss-image-preview"
                            src="<?php echo esc_url(get_option('bss_feature_image')); ?>"
                            style="max-width:100px;<?php echo empty(get_option('bss_feature_image')) ? 'display:none;' : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="bss_feature_image">Highlight Features</label>
                    </th>
                    <td>
                        <table border="1" id="feature-table" class="crud-table">
                            <tr>
                                <th>Feature Name</th>
                                <th>Icon</th>
                                <th></th>
                            </tr>
                        </table>
                        <input type="hidden" name="bss_feature_items" id="bss_feature_items"
                                value="<?php echo esc_attr(get_option('bss_feature_items')); ?>">
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
    include get_template_directory() . '/inc/icon-selector-modal.php';
}



function bss_split_last_word(string $input): array
{
    $input = trim($input);
    $parts = preg_split('/\s+/', $input);

    $second = array_pop($parts);
    $first = implode(' ', $parts);

    return [$first, $second];
}


add_action('admin_enqueue_scripts', 'bss_feature_assets');

function bss_feature_assets($hook)
{
    if ($hook !== 'home-settings_page_bss-feature-settings') {
        return;
    }

    wp_enqueue_script(
        'bss-feature-crud-table',
        get_template_directory_uri() . '/assets/js/feature-crud-table.js',
        array('jquery'),
        null,
        true
    );
}