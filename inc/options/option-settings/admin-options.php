<?php
/**
 * Add plugin option page.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Admin_Options.
 */
class MS_Breadcrumb_Admin_Options {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_menu' ), 12 );
	}

	/**
	 * Create custom plugin settings menu.
	 */
	public function add_settings_menu() {
		$markup  = new MS_Breadcrumb_Option_Markup();
		$scripts = new MS_Breadcrumb_Admin_Scripts();

		// This page will be under "Settings".
		$page_hook = add_options_page(
			MS_Breadcrumb_Options_Default::option_title(),
			MS_Breadcrumb_Options_Default::option_title(),
			'manage_options',
			MS_Breadcrumb_Options_Default::OPTIONS_PAGE_SLUG,
			array( $markup, 'create_option_page' )
		);

		// Read option page style and script.
		add_action( 'admin_print_scripts-' . $page_hook, array( $scripts, 'add_admin_print_scripts' ) );
	}

	/**
	 * Get the value options.
	 */
	public function get_option() {
		return get_option( MS_Breadcrumb_Options_Default::OPTION_KEY );
	}
}
new MS_Breadcrumb_Admin_Options();
