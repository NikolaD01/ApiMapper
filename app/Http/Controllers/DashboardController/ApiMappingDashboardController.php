<?php

namespace AM\App\Http\Controllers\DashboardController;

use AM\App\Http\Utility\Constants\Constants;
use AM\App\Http\Utility\Helpers\GetData;
use AM\App\Http\Utility\Helpers\View;

class ApiMappingDashboardController extends AbstractSubmenuController
{
    public function __construct()
    {
        $this->parentSlug = 'edit.php?post_type=' . Constants::getPostType();
        $this->pageTitle = 'API Mapping';
        $this->menuTitle = 'API Mapping';
        $this->capability = 'manage_options';
        $this->menuSlug = 'api-mapper-dashboard';

        parent::__construct();
    }

    public function view() : void {

        View::load('dashboard', [
            'apis' => GetData::getPosts(Constants::getPostType()),
            'cpts' => GetData::getPostTypes()
        ]);
    }
    public function processForm(): void
    {
        // TODO: Implement processForm() method.
    }
}