<?php

namespace AM\App\Http\Utility\Constants;

class Constants
{
    const POST_TYPE = "api_mapper";
    const PREFIX_LOWER = "am_";

    const JSON_OPTION_PREFIX = "am_map_json_";
    public static function getPostType() : string
    {
        return self::POST_TYPE;
    }

    public static function getPrefixLower() : string
    {
        return self::PREFIX_LOWER;
    }

    public static function getJsonOptionPrefix() : string
    {
        return self::JSON_OPTION_PREFIX;
    }


}