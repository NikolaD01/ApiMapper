<?php
use AM\App\Http\Utility\Helpers\View;
?>
<div class="wrap">
    <h1><?php

        esc_html_e('API Mapper Dashboard', 'api-mapper'); ?></h1>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="api_url"><?php esc_html_e('API URL', 'api-mapper'); ?></label>
                </th>
                <th scope="row">
                    <label for="api_key"><?php esc_html_e('API Key', 'api-mapper'); ?></label>
                </th>
            </tr>
            <tr>
                <td> TEST</td>
                <td>
                    <?php
                     View::load('components/api-select');
                     View::load('components/data-output');
                    ?>
                </td>

            </tr>
        </table>
        <?php submit_button(__('Save Settings', 'api-mapper')); ?>
</div>
