<?php


// add_action('admin_menu', 'bss_banner_settings_menu');

// function bss_banner_settings_menu()
// {
//     add_options_page(
//         'Banner Settings',
//         'Banner Settings',
//         'manage_options',
//         'bss-banner-settings',
//         'bss_banner_settings_page'
//     );
// }

add_action('admin_init', 'bss_banner_settings_init');

function bss_banner_settings_init()
{
    register_setting('bss_banner_settings_group', 'bss_hero_text');
    register_setting('bss_banner_settings_group', 'bss_banner_1');
    register_setting('bss_banner_settings_group', 'bss_banner_1_caption');
    register_setting('bss_banner_settings_group', 'bss_banner_2');
    register_setting('bss_banner_settings_group', 'bss_banner_2_caption');
    register_setting('bss_banner_settings_group', 'bss_banner_3');
    register_setting('bss_banner_settings_group', 'bss_banner_3_caption');

    register_setting('bss_banner_settings_group', 'bss_count_info_1');
    register_setting('bss_banner_settings_group', 'bss_count_info_1_value');

    register_setting('bss_banner_settings_group', 'bss_count_info_2');
    register_setting('bss_banner_settings_group', 'bss_count_info_2_value');

    register_setting('bss_banner_settings_group', 'bss_count_info_3');
    register_setting('bss_banner_settings_group', 'bss_count_info_3_value');
}


function bss_banner_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Banner Settings</h1>

        <form method="post" action="options.php">

            <?php
            settings_fields('bss_banner_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th>Hero Text</th>
                    <td>
                        <textarea name="bss_hero_text" rows="4"
                            cols="60"><?php echo esc_textarea(get_option('bss_hero_text')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th>Count Info 1</th>
                    <td>
                        <input type="text" name="bss_count_info_1"
                            value="<?php echo esc_attr(get_option('bss_count_info_1')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th>Count Info 1 Value</th>
                    <td>
                        <input type="number" name="bss_count_info_1_value"
                            value="<?php echo esc_attr(get_option('bss_count_info_1_value')); ?>">
                    </td>
                </tr>

                <tr>
                    <th>Count Info 2</th>
                    <td>
                        <input type="text" name="bss_count_info_2"
                            value="<?php echo esc_attr(get_option('bss_count_info_2')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th>Count Info 2 Value</th>
                    <td>
                        <input type="number" name="bss_count_info_2_value"
                            value="<?php echo esc_attr(get_option('bss_count_info_2_value')); ?>">
                    </td>
                </tr>

                <tr>
                    <th>Count Info 3</th>
                    <td>
                        <input type="text" name="bss_count_info_3"
                            value="<?php echo esc_attr(get_option('bss_count_info_3')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th>Count Info 3 Value</th>
                    <td>
                        <input type="number" name="bss_count_info_3_value"
                            value="<?php echo esc_attr(get_option('bss_count_info_3_value')); ?>">
                    </td>
                </tr>

            </table>

            <h1>Banner Images</h1>

            <table class="form-table">
                <tr>
                    <th>Banner 1</th>
                    <td>
                        <input type="hidden" class="regular-text bss-image-url" name="bss_banner_1"
                            value="<?php echo esc_attr(get_option('bss_banner_1')); ?>">

                        <button type="button" class="button bss-upload-image">
                            Upload Image
                        </button>



                        <img class="bss-image-preview" src="<?php echo esc_url(get_option('bss_banner_1')); ?>"
                            style="max-width:100px;<?php echo empty(get_option('bss_banner_1')) ? 'display:none;' : ''; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th>Banner 1 Caption</th>
                    <td>
                        <input type="text"
                            name="bss_banner_1_caption"
                            class="regular-text"
                            value="<?php echo esc_attr(get_option('bss_banner_1_caption')); ?>">
                    </td>
                </tr> -->
                <tr>
                    <th>Banner 2</th>
                    <td>
                        <input type="hidden" class="regular-text bss-image-url" name="bss_banner_2"
                            value="<?php echo esc_attr(get_option('bss_banner_2')); ?>">

                        <button type="button" class="button bss-upload-image">
                            Upload Image
                        </button>


                        <img class="bss-image-preview" src="<?php echo esc_url(get_option('bss_banner_2')); ?>"
                            style="max-width:100px;<?php echo empty(get_option('bss_banner_2')) ? 'display:none;' : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Banner 2 Caption</th>
                    <td>
                        <input type="text" name="bss_banner_2_caption" class="regular-text"
                            value="<?php echo esc_attr(get_option('bss_banner_2_caption')); ?>">
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
