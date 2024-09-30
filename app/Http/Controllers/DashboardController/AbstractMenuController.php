<?php

namespace AM\App\Http\Controllers\DashboardController;

abstract class AbstractMenuController extends  AbstractDashboardController
{

    public function addMenu(): void
    {
        add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->menuSlug,
            [$this, 'render'],
            'dashicons-admin-generic',
            20
        );
    }
}