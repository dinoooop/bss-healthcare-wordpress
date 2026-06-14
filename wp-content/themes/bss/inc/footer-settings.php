<?php

// Register settings
add_action('admin_init', 'bss_footer_register_settings');

function bss_footer_register_settings()
{
    register_setting('bss_footer_settings_group', 'bss_footer_link_set_1');
    register_setting('bss_footer_settings_group', 'bss_footer_link_set_1_title');
    register_setting('bss_footer_settings_group', 'bss_footer_link_set_2');
    register_setting('bss_footer_settings_group', 'bss_footer_link_set_2_title');
}

// Settings page
function bss_footer_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Footer Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_footer_settings_group');
            do_settings_sections('bss_footer_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">Footer Link Set 1 Title</th>
                    <td>
                        <input type="text" name="bss_footer_link_set_1_title"
                            value="<?php echo esc_attr(get_option('bss_footer_link_set_1_title')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Footer Link Set 1</th>
                    <td>
                        <table border="1" id="footer-link-set-table-1">
                            <tr>
                                <th>Label</th>
                                <th>URL</th>
                                <th>Action</th>
                            </tr>
                        </table>

                        <input type="hidden" name="bss_footer_link_set_1" id="bss_footer_link_set_1"
                            value="<?php echo esc_attr(get_option('bss_footer_link_set_1')); ?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Footer Link Set 2 Title</th>
                    <td>
                        <input type="text" name="bss_footer_link_set_2_title"
                            value="<?php echo esc_attr(get_option('bss_footer_link_set_2_title')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Footer Link Set 2</th>
                    <td>
                        <table border="1" id="footer-link-set-table-2">
                            <tr>
                                <th>Label</th>
                                <th>URL</th>
                                <th>Action</th>
                            </tr>
                        </table>

                        <input type="hidden" name="bss_footer_link_set_2" id="bss_footer_link_set_2"
                            value="<?php echo esc_attr(get_option('bss_footer_link_set_2')); ?>">
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


add_action('admin_enqueue_scripts', 'bss_footer_link_set_assets');

function bss_footer_link_set_assets($hook)
{
    if ($hook !== 'home-settings_page_bss-footer-settings') {
        return;
    }

    wp_enqueue_script(
        'footer-links-crud-table',
        get_template_directory_uri() . '/assets/js/footer-links-crud-table.js',
        array('jquery'),
        null,
        true
    );
}