<?php
    use AM\App\Http\Utility\Helpers\View;
?>
<div class="wrap">
    <table class="form-table">
        <tr></tr>
        <tr>
            <?php


            View::load('components/selects/cpt-select', $args ?? []);
            ?>
        </tr>
    </table>
</div>