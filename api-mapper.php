<?php
/**
 * Plugin Name: API Mapper
 * Description: API Mapper plugin for WordPress
 * Version: 1.0.0
 * Author: Nikola Devic.
 * Author URI:
 * Text Domain: api-mapper
 * Domain Path: /languages
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	add_action( 'admin_notices', function () {
		echo '<div class="error"><p>Api Mapper requires Composer autoloader. Please run "composer install" in the plugin directory.</p></div>';
	} );

	return;
}

require __DIR__ . '/vendor/autoload.php';
add_action( 'plugins_loaded', [ AM\App\Init::class, 'load']);



define( 'AM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


