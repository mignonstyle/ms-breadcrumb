<?php
/**
 * Create display shortcodes.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Shortcodes.
 */
class MS_Breadcrumb_Shortcodes {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_shortcode( 'ms-breadcrumb', array( $this, 'display_markup' ) );
	}

	/**
	 * Display breadcrumbs.
	 *
	 * @return string
	 */
	public function display_markup() {
		$breadcrumb_markup = new MS_Breadcrumb_Markup();

		return $breadcrumb_markup->breadcrumb_html();
	}
}
new MS_Breadcrumb_Shortcodes();
