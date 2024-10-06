<?php

namespace AM\App\Http\Utility\Helpers;

use AM\App\Http\Utility\Constants\Constants;

class GetData
{
    public static function getPostTypes() : array {
        return get_post_types();
    }

    public static function getPosts(string $postType) : array
    {
        return get_posts([
            'post_type' => $postType,
            'posts_per_page' => -1,
        ]);
    }
}