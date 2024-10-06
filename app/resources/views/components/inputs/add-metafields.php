<?php
    $count = $args['count'] ?? 0;
?>

    <p>
        <label for="metafield_<?= $count ?>">Enter Metafield Key:</label>
        <input type="text" name="metafields[]" id="metafield_<?= $count ?>" placeholder="Meta key">
    </p>
