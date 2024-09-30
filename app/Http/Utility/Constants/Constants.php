<?php

namespace AM\App\Http\Utility\Constants;

class Constants
{
    const POST_TYPE = "api_mapper";

    public static function getPostType() : string
    {
        return self::POST_TYPE;
    }
}