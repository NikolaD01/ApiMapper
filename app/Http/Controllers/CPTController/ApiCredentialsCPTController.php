<?php

namespace AM\App\Http\Controllers\CPTController;
use AM\App\Http\Services\Metabox\ApiCredentialsService;
use AM\App\Http\Utility\Constants\Constants;

class ApiCredentialsCPTController extends AbstractCPTController {

    protected ApiCredentialsService $apiCredentialsService;
    protected string $view;
    public function __construct() {
        $args = array(
            'label' => "Api Mapper",
            'supports' => array('title'),
            'menu_position' => 5,
        );
        $this->apiCredentialsService = new ApiCredentialsService();
        $this->view = "metabox/api-register";

        parent::__construct(Constants::getPostType(), $args);
    }

    public function add_meta_boxes(): void
    {
        add_meta_box(
            'api_credentials_meta_box',
            'API Registration',
            array($this, 'display_meta_box'),
            $this->post_type,
            'normal',
            'high'
        );
    }
    public function display_meta_box($post): void
    {
        $this->apiCredentialsService->displayApiCredentialsMetaBox($post, $this->view);
    }

    public function save_meta_box_data($post_id): void
    {
        $this->apiCredentialsService->saveApiCredentialsMetaBox($post_id);
    }
}


