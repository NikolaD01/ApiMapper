<?php

namespace AM\App\Http\Controllers\AdminAjax;

use AM\App\Http\Utility\Constants\Constants;

class FetchCustomPostTypeDataAdminAjaxController extends AbstractAdminAjaxController
{
    public function handle() : void
    {

        $postType = sanitize_text_field($_POST['post_type']);
        if(!$postType) {
            wp_send_json_error();
        }

        $data = [];
        try {
            $data = get_option(Constants::getJsonOptionPrefix(). $postType);
        }
        catch(\Exception $e) {
            error_log($e->getMessage());
            wp_send_json_error($e->getMessage());
        }

        wp_send_json_success($data);
    }
}