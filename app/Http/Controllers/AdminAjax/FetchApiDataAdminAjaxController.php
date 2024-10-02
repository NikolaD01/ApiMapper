<?php

namespace AM\App\Http\Controllers\AdminAjax;

use AM\App\Http\Services\API\ApiService;
use AM\App\Http\Services\Preparations\ApiPreparationService;
use AM\App\Http\Utility\Helpers\ApiAuthHelper;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class FetchApiDataAdminAjaxController extends AbstractAdminAjaxController
{
    protected ApiService $apiService;
    protected ApiPreparationService $apiPreparationService;
    public function __construct() {

        parent::__construct();
    }

    public function handle() : void
    {

        $id = sanitize_text_field($_POST['post_ID']);
        if(!$id) {
            wp_send_json_error([
                'error' => 'Id is not provided'
            ]);
        }
        $this->apiPreparationService = new ApiPreparationService();
        $data = null;
        try {
            $data = $this->apiPreparationService->prepare([
                'id' => $id
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            wp_send_json_error([
                'error' => $e->getMessage()
            ]);
        } catch (GuzzleException $e) {
            error_log($e->getMessage());
            wp_send_json_error([
                'error' => $e->getMessage()
            ]);
        }

        wp_send_json_success($data);
    }

}