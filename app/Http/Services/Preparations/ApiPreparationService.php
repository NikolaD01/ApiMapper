<?php

namespace AM\App\Http\Services\Preparations;

use AM\App\Http\Interfaces\PreparationInterface;
use AM\App\Http\Services\API\ApiService;
use AM\App\Http\Utility\Helpers\ApiAuthHelper;
use GuzzleHttp\Exception\GuzzleException;

class ApiPreparationService implements PreparationInterface
{
    protected ApiService $apiService;

    /**
     * @throws GuzzleException
     */
    public function prepare($args): ?array
    {
        if(isset($args['id'])) {
            $id = $args['id'];
        } else {
            return null;
        }

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
                'just',
                'second_depth' => [
                    'third_name' => 'test',
                    'third_depth' => [
                        'fourth_name' => 'test',
                        'fourth_depth' => [
                            'fifth_name' => 'test',
                            'test',
                            'testTwo'
                        ]
                    ]
                ]
            ]
        ];
        return $data;
    }
}