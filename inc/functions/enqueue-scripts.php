<?php
/**
 * Enqueue scripts and styles.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class Breadcrumb_Enqueue_Scripts.
 */
class MS_Breadcrumb_Enqueue_Scripts {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_action( 'wp_localize_script', array( $this, 'add_localize_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_enqueue_scripts' ) );
	}

	/**
	 * Setup localize script.
	 *
	 * @return void
	 */
	public function add_localize_script() {

	}

	/**
	 * Setup enqueue script.
	 *
	 * @return void
	 */
	public function add_enqueue_scripts() {
		wp_enqueue_style( 'ms-breadcrumb', MS_BREADCRUMB_PLUGIN_URL . 'assets/css/style.css', array() );
	}
}
