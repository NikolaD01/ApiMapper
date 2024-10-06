<?php
    $apis = $args['apis'] ?? [];
?>
    <p>
        <label>
            <select name="api-selector">
                <?php foreach ($apis as $api) :  ?>
                    <option value="<?=$api->ID?>"><?=$api->post_title?></option>

                <?php endforeach; ?>
            </select>
        </label>
    </p>

