<?php

/**
 * Appointment Settings Page
 */

add_action('admin_init', 'bss_appointment_settings_register');

function bss_appointment_settings_register()
{
    register_setting('bss_appointment_settings_group', 'bss_appointment_label');
    register_setting('bss_appointment_settings_group', 'bss_appointment_title');
    register_setting('bss_appointment_settings_group', 'bss_appointment_description_1');
    register_setting('bss_appointment_settings_group', 'bss_appointment_description_2');
}

function bss_appointment_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Appointment Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('bss_appointment_settings_group');
            do_settings_sections('bss_appointment_settings_group');
            ?>

            <table class="form-table">

                <tr>
                    <th scope="row">
                        <label for="bss_appointment_label">Section Label</label>
                    </th>
                    <td>
                        <input type="text" id="bss_appointment_label" name="bss_appointment_label"
                            value="<?php echo esc_attr(get_option('bss_appointment_label')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="bss_appointment_title">Section Title</label>
                    </th>
                    <td>
                        <input type="text" id="bss_appointment_title" name="bss_appointment_title"
                            value="<?php echo esc_attr(get_option('bss_appointment_title')); ?>" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="bss_appointment_description_1">Description 1</label>
                    </th>
                    <td>
                        <textarea id="bss_appointment_description_1" name="bss_appointment_description_1" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_appointment_description_1')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="bss_appointment_description_2">Description 2</label>
                    </th>
                    <td>
                        <textarea id="bss_appointment_description_2" name="bss_appointment_description_2" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('bss_appointment_description_2')); ?></textarea>
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