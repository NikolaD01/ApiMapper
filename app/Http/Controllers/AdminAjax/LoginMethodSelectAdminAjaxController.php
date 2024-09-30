<?php

namespace AM\App\Http\Controllers\AdminAjax;

use AM\App\Http\Services\Metabox\ApiCredentialsService;
use AM\App\Http\Utility\Helpers\View;

class LoginMethodSelectAdminAjaxController extends AbstractAdminAjaxController
{
    public function handle() : void
    {
        $loginMethod = sanitize_text_field($_POST["login-method"] ?? "");

        $allowedMethods = ['key', 'bearer', 'basic','empty'];
        if (!in_array($loginMethod, $allowedMethods, true)) {
            wp_send_json_error([
                "message" => "Invalid login method",
            ]);
        }

        $postId = sanitize_text_field($_POST["post_ID"] ?? "");

        if(!$postId) {
            wp_send_json_error([
               "message" => "post_ID required",
            ]);
        }

        $apiCredentialsService = new ApiCredentialsService();
        $post = get_post($postId);
        ob_start();
        $apiCredentialsService->displayApiCredentialsMetaBox($post, "metabox/inputs/${loginMethod}");
        $view = ob_get_clean();

        wp_send_json_success([
            "view" => $view
        ]);
    }

}