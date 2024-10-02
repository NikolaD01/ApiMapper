<?php

namespace AM\App;

use  AM\App\Http\Utility\Registrar\ControllerRegistrar;
use AM\App\Http\Utility\Registrar\ScriptRegister;

class Init {
    public static function load(): void {

        (new ControllerRegistrar())->register();
        (new ScriptRegister())->enqueue('api-mapper-script','public/main.js');
    }
}