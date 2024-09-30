<?php

namespace AM\App\Http\Utility\Helpers;

class View
{
    public static function load(string $view, array $args = []): void
    {
        $viewFile = plugin_dir_path(dirname(__DIR__, 2)) . 'resources/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            extract($args);
            include $viewFile;
        } else {
            echo '<div class="error"><p>View not found!</p></div>';
        }
    }
}