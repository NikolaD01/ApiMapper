<?php

namespace AM\App\Http\Controllers\DashboardController;

use AM\App\Http\Utility\Constants\Constants;

class MetafieldMappingDashboardController extends AbstractSubmenuController
{

    public function __construct()
    {
        $this->parentSlug = 'edit.php?post_type=' . Constants::getPostType();
        $this->pageTitle = "Meta Field Mapping";
        $this->menuTitle = "Meta Field Mapping";
        $this->capability = 'manage_options';
        $this->menuSlug = 'meta-field-mapping';

        parent::__construct();
    }

    public function processForm(): void
    {
        // TODO: Implement processForm() method.
    }

    public function view(): void
    {
        // TODO: Implement view() method.
    }
}