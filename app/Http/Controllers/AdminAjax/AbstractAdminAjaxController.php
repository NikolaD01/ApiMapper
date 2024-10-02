<?php

namespace AM\App\Http\Controllers\AdminAjax;

abstract class AbstractAdminAjaxController
{
    public function __construct() {
        $this->registerAction();
    }

    protected function getActionName() : string {
        $className = static::class;
        $baseName = basename(str_replace('\\', '/', $className));
        $baseName = str_replace('AdminAjaxController', '', $baseName);
        return strtolower(preg_replace('/([a-z0-9])([A-Z])/', '$1_$2', $baseName));
    }
    abstract public function handle(): void;
    protected function registerAction(): void {
        $actionName = $this->getActionName();
        add_action( 'wp_ajax_' . $actionName, [ $this, 'handle' ] );
        add_action( 'wp_ajax_nopriv_' . $actionName, [ $this, 'handle' ] );
    }

    protected function sanitize( array $data ): array {
        $sanitizedData = [];
        foreach ( $data as $key => $value ) {
            $sanitizedData[ $key ] = sanitize_text_field( $value );
        }

        return $sanitizedData;
    }
}