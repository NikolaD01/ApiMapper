<?php

namespace AM\App\Http\Controllers\DashboardController;

use AM\App\Http\Utility\Constants\Constants;

class ApiMappingDashboardController extends AbstractSubmenuController
{
    public function __construct()
    {
        $this->parentSlug = 'edit.php?post_type=' . Constants::getPostType();
        $this->pageTitle = 'API Mapping Dashboard';
        $this->menuTitle = 'API Mapping Dashboard';
        $this->capability = 'manage_options';
        $this->menuSlug = 'api-mapper-dashboard';

        parent::__construct();
    }
    public function processForm(): void
    {
        // TODO: Implement processForm() method.
    }
}