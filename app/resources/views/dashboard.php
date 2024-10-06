<?php
use AM\App\Http\Utility\Helpers\View;
?>
<div class="wrap">
    <h1>
        <?php esc_html_e('API Mapper Dashboard', 'api-mapper'); ?>
    </h1>
    <div style="display: flex;">
        <div style="width: 50%">
            <label for=""><?php esc_html_e('Choose CPT', 'api-mapper'); ?></label>
            <form id="am_cpt_get" method="post" action="">
                <?php
                    View::load('components/selects/cpt-select', $args ?? []);
                    View::load('components/buttons/submit', [
                            'text' => 'Load data'
                    ]);
                    View::load('components/data-output', [
                        'id' => 'cpt-data-output'
                    ]);
                ?>
            </form>
        </div>
        <div style="width: 50%">
            <label for=""><?php esc_html_e('Choose API', 'api-mapper'); ?></label>
            <form id="am_api_get" method="post" action="">
                <?php
                    View::load('components/selects/api-select', $args ?? []);
                    View::load('components/buttons/submit', [
                            'text' => 'Load data'
                    ]);
                    View::load('components/data-output', [
                            'id' => 'api-data-output'
                    ]);
                ?>
            </form>
        </div>
    </div>

<!--    --><?php //submit_button(__('Save Settings', 'api-mapper')); ?>
</div>
