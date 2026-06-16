<?php

// function bss_register_theme_settings_page()
// {

//     add_options_page(
//         'Contact Information',
//         'Contact Information',
//         'manage_options',
//         'bss-contact-settings',
//         'bss_contact_settings_page'
//     );
// }

// add_action('admin_menu', 'bss_register_theme_settings_page');

function bss_register_contact_settings()
{

    register_setting('bss_contact_group', 'bss_address');
    register_setting('bss_contact_group', 'bss_pincode');
    register_setting('bss_contact_group', 'bss_phone_1');
    register_setting('bss_contact_group', 'bss_phone_2');
    register_setting('bss_contact_group', 'bss_email');
    register_setting('bss_contact_group', 'bss_google_map_embed');

    register_setting('bss_contact_group', 'bss_facebook');
    register_setting('bss_contact_group', 'bss_twitter');
    register_setting('bss_contact_group', 'bss_instagram');
    register_setting('bss_contact_group', 'bss_linkedin');
    register_setting('bss_contact_group', 'bss_youtube');
}

add_action('admin_init', 'bss_register_contact_settings');

function bss_contact_settings_page()
{
?>

    <div class="wrap">
        <h1>Contact Information</h1>

        <form method="post" action="options.php">

            <?php
            settings_fields('bss_contact_group');
            do_settings_sections('bss_contact_group');
            ?>

            <table class="form-table">

                <tr>
                    <th>Address</th>
                    <td>
                        <textarea name="bss_address" rows="4" cols="50"><?php echo esc_textarea(get_option('bss_address')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th>Pin Code</th>
                    <td>
                        <input type="text" name="bss_pincode"
                            value="<?php echo esc_attr(get_option('bss_pincode')); ?>">
                    </td>
                </tr>

                <tr>
                    <th>Phone 1</th>
                    <td>
                        <input type="text" name="bss_phone_1"
                            value="<?php echo esc_attr(get_option('bss_phone_1')); ?>">
                    </td>
                </tr>

                <tr>
                    <th>Phone 2</th>
                    <td>
                        <input type="text" name="bss_phone_2"
                            value="<?php echo esc_attr(get_option('bss_phone_2')); ?>">
                    </td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>
                        <input type="email" name="bss_email"
                            value="<?php echo esc_attr(get_option('bss_email')); ?>">
                    </td>
                </tr>
                <tr>
                    <th>Google Map Embed</th>
                    <td>
                        <input type="text" name="bss_google_map_embed"
                            value="<?php echo esc_attr(get_option('bss_google_map_embed')); ?>">
                    </td>
                </tr>

                <tr>
                    <th>Twitter URL</th>
                    <td>
                        <input type="url" name="bss_twitter"
                            value="<?php echo esc_attr(get_option('bss_twitter')); ?>"
                            class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th>Facebook URL</th>
                    <td>
                        <input type="url" name="bss_facebook"
                            value="<?php echo esc_attr(get_option('bss_facebook')); ?>"
                            class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th>YouTube URL</th>
                    <td>
                        <input type="url" name="bss_youtube"
                            value="<?php echo esc_attr(get_option('bss_youtube')); ?>"
                            class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th>LinkedIn URL</th>
                    <td>
                        <input type="url" name="bss_linkedin"
                            value="<?php echo esc_attr(get_option('bss_linkedin')); ?>"
                            class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th>Instagram URL</th>
                    <td>
                        <input type="url" name="bss_instagram"
                            value="<?php echo esc_attr(get_option('bss_instagram')); ?>"
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
