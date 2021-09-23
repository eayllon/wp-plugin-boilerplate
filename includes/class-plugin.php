<?php

namespace WP_Plugin_Boilerplate;

defined( 'ABSPATH' ) || exit;

final class Plugin {

	private static $instance = null;

	function __construct() {}

	function __clone() {}

	function __wakeup() {}

	public function hooks() {

    add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ], 90 );

	}

	public function load_deps() {

    // load dependencies

	}

  public function register_scripts() {

		$assets_v = get_file_data( WPPB_PLUGIN_FILE, [ 'Version' ], 'plugin' )[0];

		wp_register_style(
			WPPB_PLUGIN_SLUG,
			WPPB_PLUGIN . '/assets/css/styles.min.css',
			[],
		  $assets_v,
		);
    wp_enqueue_style( WPPB_PLUGIN_SLUG );

    wp_register_script(
		  WPPB_PLUGIN_SLUG,
			WPPB_PLUGIN . '/assets/js/functions.min.js',
			[ 'jquery' ],
			$assets_v,
			true
		);
    wp_localize_script( WPPB_PLUGIN_SLUG, 'l10n', [ 'plugin_url' => WPPB_PLUGIN, ] );
    wp_enqueue_script( WPPB_PLUGIN_SLUG );

  }

	public static function get_instance() {

		if ( ! self::$instance instanceof self ) self::$instance = new self();
		return self::$instance;

	}

}
