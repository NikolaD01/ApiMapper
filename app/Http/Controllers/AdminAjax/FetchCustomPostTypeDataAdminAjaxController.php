<?php

namespace AM\App\Http\Controllers\AdminAjax;

class FetchCustomPostTypeDataAdminAjaxController extends AbstractAdminAjaxController
{
    public function handle() : void
    {
        $postType = sanitize_text_field($_POST['post_type']);

        $args = [
            'post_type' => $postType,
            'posts_per_page' => 1,
            'post_status' => 'publish',
        ];

        $posts = get_posts($args);

        $metaKeys = [];
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $postId = $post->ID;

                $metaFields = get_post_meta($postId);

                foreach ($metaFields as $key => $value) {
                    if (!in_array($key, $metaKeys)) {
                        $metaKeys[] = $key;
                    }
                }
            }
        }

    }
}