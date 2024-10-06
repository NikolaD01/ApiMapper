<?php

namespace AM\App\Http\Controllers\DashboardController;

use AM\App\Http\Utility\Constants\Constants;
use AM\App\Http\Utility\Helpers\GetData;
use AM\App\Http\Utility\Helpers\View;

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
        if (isset($_POST['cpt-selector'], $_POST['metafields']) && !empty($_POST['metafields'])) {
            $cpt = sanitize_text_field($_POST['cpt-selector']);
            $metafields = array_map('sanitize_text_field', $_POST['metafields']);
            json_encode($metafields);
            $option_name = 'am_map_json_' . $cpt;

            update_option($option_name, $metafields);

        }
    }

    public function view(): void
    {
        View::load('metafield-dashboard', [
            'cpts' => GetData::getPostTypes(),
        ]);
    }
}