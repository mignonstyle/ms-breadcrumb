<?php
/**
 * Plugin Name: MS Breadcrumb
 * Plugin URI: https://github.com/mignonstyle/ms-breadcrumb
 * Description: MS Breadcrumb, display the breadcrumbs marked up structured at schema.org on the site. MS Breadcrumbは、Webサイトにschema.orgで構造化マークアップされたパンくずリストを表示します。
 * Text Domain: ms-breadcrumb
 * Domain Path: /languages
 * Author: Mignon Style
 * Author URI: http://mignonstyle.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 0.1
 *
 * @package ms-breadcrumb
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new MS_Breadcrumb();

/**
 * MS Breadcrumb Basic class
 */
class MS_Breadcrumb {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Register our text domain.
	 */
	function load_textdomain() {
		load_plugin_textdomain( 'ms-breadcrumb', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}
}
