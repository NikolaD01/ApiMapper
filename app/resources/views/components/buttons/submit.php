<?php
    $class = $args['class'] ?? '';
    $text = $args['text'] ?? 'Save';
?>

<div>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary <?= $class?>" value="<?= $text ?>">
    </p>
</div>
