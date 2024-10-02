<?php

namespace AM\App\Http\Controllers\DashboardController;

abstract class AbstractSubmenuController extends AbstractDashboardController
{
    protected string $parentSlug;

    public function addMenu(): void
    {
        add_submenu_page(
            $this->parentSlug,
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->menuSlug,
            [$this, 'render'],
        );

    }
}