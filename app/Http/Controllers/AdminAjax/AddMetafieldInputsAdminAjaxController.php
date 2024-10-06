<?php

namespace AM\App\Http\Controllers\AdminAjax;

use AM\App\Http\Utility\Helpers\View;

class AddMetafieldInputsAdminAjaxController extends AbstractAdminAjaxController
{

    public function handle(): void
    {
        if(!isset($_POST['count'])) {
            wp_send_json_error([
                "message" => "request is faulty",
            ]);
        }

        ob_start();
        View::load('components/inputs/add-metafields',[
            "count" => $_POST['count'],
        ]);
        $view = ob_get_clean();

        wp_send_json_success([
            "view" => $view,
        ]);
    }
}