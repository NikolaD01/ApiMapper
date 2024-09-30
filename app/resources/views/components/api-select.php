<?php

$posts = get_posts([
        'post_type' => 'api_mapper',
        'posts_per_page' => -1,
    ]);
?>
<form id="am_api_get" method="post" action="">
    <p>
        <label>
            <select name="api-selector">
                <?php foreach ($posts as $post) :  ?>
                    <option value="<?=$post->ID?>"><?=$post->post_title?></option>

                <?php endforeach; ?>
            </select>
        </label>

    </p>
    <p>
        <?php submit_button(__('Load data', 'primary')); ?>
    </p>
</form>
