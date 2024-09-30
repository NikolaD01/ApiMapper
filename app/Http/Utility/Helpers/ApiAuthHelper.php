<?php

namespace AM\App\Http\Utility\Helpers;

use InvalidArgumentException;

class ApiAuthHelper
{
    public static function getCredentials(int $id, string $loginMethod)
    {
        return match($loginMethod) {
            'empty' => '',
            'key' => self::getApiKey($id),
            'bearer' => self::getBearerToken($id),
            'basic' => self::getBasicAuth($id),
            default => throw new InvalidArgumentException("Unsupported login method: $loginMethod"),
        };
    }

    public static  function getApiUrl(int $id): string {
        return get_post_meta($id, '_api_url', true);
    }
    public static function getApiKey(int $id): string
    {
        return get_post_meta($id, "_api_key", true);
    }

    public static function getBearerToken(int $id): string
    {
        return get_post_meta($id, "_bearer", true);
    }

    public static function getBasicAuth(int $id): array
    {
        return [
            'username' => get_post_meta($id, "_username", true),
            'password' => get_post_meta($id, "_password", true),
        ];
    }
}