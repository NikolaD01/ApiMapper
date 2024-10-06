<?php
    $cpts = $args['cpts'] ?? [];
    $class = $args['class'] ?? '';
?>
    <p>
        <label>
            <select class="<?= $class ?>" name="cpt-selector">
                <?php foreach ($cpts as $cpt) :
                    ?>
                    <option value="<?=$cpt?>"><?=$cpt?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </p>

