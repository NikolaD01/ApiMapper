<?php
    $cpts = $args['cpts'] ?? [];
?>
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

