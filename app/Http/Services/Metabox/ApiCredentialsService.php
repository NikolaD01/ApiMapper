<?php

namespace AM\App\Http\Services\Metabox;
use AM\App\Http\Utility\Helpers\View;

class ApiCredentialsService
{
    public function displayApiCredentialsMetaBox($post, $view) : void {
        wp_nonce_field('api_credentials_meta_box', 'api_credentials_meta_box_nonce');

        $api_url = get_post_meta($post->ID, '_api_url', true);
        $login_method = get_post_meta($post->ID, '_login_method', true);
        $api_key = get_post_meta($post->ID, '_api_key', true);
        $bearer = get_post_meta($post->ID, '_bearer', true);
        $username = get_post_meta($post->ID, '_username', true);
        $password = get_post_meta($post->ID, '_password', true);

        $args = [
            'api_url' => $api_url,
            'login_method' => $login_method,
            'api_key' => $api_key,
            'bearer' => $bearer,
            'username' => $username,
            'password' => $password,
        ];

        View::load($view, $args);
    }
    public function saveApiCredentialsMetaBox($post_id): void {
        if (!isset($_POST['api_credentials_meta_box_nonce']) || !wp_verify_nonce($_POST['api_credentials_meta_box_nonce'], 'api_credentials_meta_box')) {
            return;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        $fields = [
            '_api_url' => 'api_url',
            '_login_method' => 'login_method',
            '_api_key' => 'api_key',
            '_bearer' => 'bearer_token',
            '_username' => 'username',
            '_password' => 'password'
        ];
        foreach ($fields as $meta_key => $field_name) {
            if (isset($_POST[$field_name])) {
                update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$field_name]));
            }
        }
    }
}