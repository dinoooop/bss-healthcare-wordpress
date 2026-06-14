<?php

// Register settings
add_action('admin_init', 'bss_velora_register_settings');

function bss_velora_register_settings()
{
    register_setting('bss_velora_settings_group', 'bss_velora_label');
    register_setting('bss_velora_settings_group', 'bss_velora_title');
    register_setting('bss_velora_settings_group', 'bss_velora_description_1');
    register_setting('bss_velora_settings_group', 'bss_velora_description_2');
    register_setting('bss_velora_settings_group', 'bss_velora_list');
    register_setting('bss_velora_settings_group', 'bss_velora_button_label');
    register_setting('bss_velora_settings_group', 'bss_velora_button_url');
    register_setting('bss_velora_settings_group', 'bss_velora_image_1');
    register_setting('bss_velora_settings_group', 'bss_velora_image_2');
}

// Settings page
function bss_velora_settings_page()
{
    ?>
    <div class="wrap">
        <h1>About Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_velora_settings_group');
            do_settings_sections('bss_velora_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">Section Label</th>
                    <td>
                        <input type="text" name="bss_velora_label"
                            value="<?php echo esc_attr(get_option('bss_velora_label')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Big Title</th>
                    <td>

                        <textarea name="bss_velora_title" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_velora_title')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Description 1</th>
                    <td>
                        <textarea name="bss_velora_description_1" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_velora_description_1')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Description 2</th>
                    <td>
                        <textarea name="bss_velora_description_2" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_velora_description_2')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">List</th>
                    <td>
                        <input type="text" name="bss_velora_list"
                            value="<?php echo esc_attr(get_option('bss_velora_list')); ?>" class="large-text">
                        <p class="description">
                            Enter comma separated values.<br>
                            Example: Quality Care, Expert Doctors, 24/7 Support
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Button Label</th>
                    <td>
                        <input type="text" name="bss_velora_button_label"
                            value="<?php echo esc_attr(get_option('bss_velora_button_label')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Button URL</th>
                    <td>
                        <input type="url" name="bss_velora_button_url"
                            value="<?php echo esc_attr(get_option('bss_velora_button_url')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Images</th>
                    <td>
                        <!-- IMage 1 -->
                        <input type="hidden" class="regular-text bss-image-url" name="bss_velora_image_1"
                            value="<?php echo esc_attr(get_option('bss_velora_image_1')); ?>">

                        <button type="button" class="button bss-upload-image">
                            Upload Image
                        </button>
                        <img class="bss-image-preview" src="<?php echo esc_url(get_option('bss_velora_image_1')); ?>"
                            style="max-width:100px;<?php echo empty(get_option('bss_velora_image_1')) ? 'display:none;' : ''; ?>">

                        <!-- IMage 2 -->

                        <input type="hidden" class="regular-text bss-image-url" name="bss_velora_image_2"
                            value="<?php echo esc_attr(get_option('bss_velora_image_2')); ?>">

                        <button type="button" class="button bss-upload-image">
                            Upload Image
                        </button>
                        <img class="bss-image-preview" src="<?php echo esc_url(get_option('bss_velora_image_2')); ?>"
                            style="max-width:100px;<?php echo empty(get_option('bss_velora_image_2')) ? 'display:none;' : ''; ?>">
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