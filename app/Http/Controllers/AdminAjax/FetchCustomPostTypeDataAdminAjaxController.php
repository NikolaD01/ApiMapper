<?php

namespace AM\App\Http\Controllers\AdminAjax;

class FetchCustomPostTypeDataAdminAjaxController extends AbstractAdminAjaxController
{
    public function handle() : void
    {
        $postType = sanitize_text_field($_POST['post_type']);
        // TODO: Create Meta field, list builder dashboard.
        // TODO: Functionality will provide user solution to manually enter fields which will be listed for mapping with api fields.
    }
}