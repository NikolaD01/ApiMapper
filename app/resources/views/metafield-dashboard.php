<?php
    use AM\App\Http\Utility\Helpers\View;
?>
<div class="wrap">
    <form>
        <?php
            View::load('components/selects/cpt-select', $args ?? []);
        ?>
        <div id="metafields-inputs">
        <?php
            View::load('components/inputs/add-metafields');
        ?>
        </div>
        <?php
            View::load('components/buttons/add-metafield');
            View::load('components/buttons/submit', ['text' => "Save Mapping"]);
        ?>
    </form>
</div>