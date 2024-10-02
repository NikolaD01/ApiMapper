<?php

namespace AM\App\Http\Controllers\AdminAjax;

use AM\App\Http\Services\API\ApiService;
use AM\App\Http\Utility\Helpers\ApiAuthHelper;
use GuzzleHttp\Exception\GuzzleException;

class AMFetchDataAdminAjaxController extends AbstractAdminAjaxController
{
    protected ApiService $apiService;
    public function __construct() {

        parent::__construct();
    }

    /**
     * @throws GuzzleException
     */
    public function handle() : void
    {


        $id = sanitize_text_field($_POST['post_ID']);
        $post_login_method = get_post_meta($id, '_login_method', true);
        $credentials = ApiAuthHelper::getCredentials($id, $post_login_method);

        $url = ApiAuthHelper::getApiUrl($id);
        $this->apiService = new ApiService($url);


        $this->apiService->setBaseUri($url);
        $data = $this->apiService->fetchData('');
        $data = [

            'name' => 'test',
            'depth' => [
                'second_name' => 'test',
                'second_depth' => [
                    'third_name' => 'test',
                ]
            ]
        ];
        wp_send_json_success($data);
    }

}