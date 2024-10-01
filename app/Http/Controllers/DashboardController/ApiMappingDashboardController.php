<?php

namespace AM\App\Http\Controllers\DashboardController;

use AM\App\Http\Utility\Constants\Constants;
use AM\App\Http\Utility\Helpers\View;

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

    public function view() : void {

        $cpts = get_post_types();
        $apis = get_posts([
            'post_type' => Constants::getPostType(),
            'posts_per_page' => -1,
        ]);

        View::load('dashboard', [
            'apis' => $apis,
            'cpts' => $cpts
        ]);
    }
    public function processForm(): void
    {
        // TODO: Implement processForm() method.
    }
}