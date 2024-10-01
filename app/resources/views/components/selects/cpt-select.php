<?php
    $cpts = $args['cpts'] ?? [];
?>
<form id="am_cpt_get" method="post" action="">
    <p>
        <label>
            <select name="cpt-selector">
                <?php foreach ($cpts as $cpt) :
                    ?>
                    <option value="<?=$cpt?>"><?=$cpt?></option>

                <?php endforeach; ?>
            </select>
        </label>

    </p>
    <p>
        <?php submit_button(__('Load data', 'primary')); ?>
    </p>
</form>