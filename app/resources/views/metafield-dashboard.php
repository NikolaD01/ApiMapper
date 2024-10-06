<?php
    use AM\App\Http\Utility\Helpers\View;
?>
<div class="wrap">
    <?php
        View::load('components/selects/cpt-select', $args ?? []);
        View::load('components/inputs/add-metafields');
        View::load('components/buttons/submit', ['text' => "Save Mapping"]);
    ?>
</div>