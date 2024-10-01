<?php
    $apis = $args['apis'] ?? [];
?>
<form id="am_api_get" method="post" action="">
    <p>
        <label>
            <select name="api-selector">
                <?php foreach ($apis as $api) :  ?>
                    <option value="<?=$api->ID?>"><?=$api->post_title?></option>

                <?php endforeach; ?>
            </select>
        </label>

    </p>
    <p>
        <?php submit_button(__('Load data', 'primary')); ?>
    </p>
</form>
