<?php

namespace AM\App\Http\Utility\Registrar;

class ControllerRegistrar
{
    protected string $dirname;

    protected array $controllers = [
    ];

    public function __construct() {
        $this->defaultPath();
        $this->readControllers();
    }

    private function defaultPath() : void
    {
        $this->dirname = str_replace('\\', '/', AM_PLUGIN_DIR) . 'app/Http/Controllers';

    }
    public function register(): void {
        foreach ( $this->controllers as $controllerClass ) {
            new $controllerClass();
        }
    }
    public function getControllers(): array {
        return $this->controllers;
    }

    protected function readControllers(): void {
        if (is_dir($this->dirname)) {
            foreach (glob($this->dirname . '/*', GLOB_ONLYDIR) as $subDir) {
                $this->readDir($subDir);
            }
        }
    }
    protected function readDir(string $directory): void {
        if (is_dir($directory)) {
            foreach (glob($directory . '/*.php') as $file) {
                $name = basename($file, '.php');

                if (str_contains($name, "Abstract")) {
                    continue;
                }

                $relativePath = str_replace($this->dirname, '', $directory);
                $relativePath = trim($relativePath, '/');

                $namespace = 'AM\App\Http\Controllers\\' . str_replace('/', '\\', $relativePath) . '\\' . $name;
                $this->controllers[] = $namespace;


            }
        }
    }
}