<?php
/**
* Plugin Name: WP Plugin Boilerplate
* Version: 1.0.0
* Author: Estudio Ayllón
* Author URI: https://estudioayllon.com
* Description: WordPress Plugin Boilerplate
*/

namespace WP_Plugin_Boilerplate;

defined( 'ABSPATH' ) || exit;

define( 'WPPB_PLUGIN_SLUG', 'wp-plugin-boilerplate' );
define( 'WPPB_PLUGIN', plugins_url( '', __FILE__ ) );
define( 'WPPB_PLUGIN_PATH', __DIR__ );
define( 'WPPB_PLUGIN_FILE', __FILE__ );

require_once 'includes/class-plugin.php';
$plugin = Plugin::get_instance();
$plugin->load_deps();
$plugin->hooks();
