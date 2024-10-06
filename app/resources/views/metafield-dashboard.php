<?php
    use AM\App\Http\Utility\Helpers\View;
?>
<div class="wrap">
    <form method="POST" action="<?= get_permalink() ?>">
        <?php
            View::load('components/selects/cpt-select', [
              'cpts' => $args['cpts'] ?? [],
              'class' => 'js-cpt-metafield-select'
            ]);
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