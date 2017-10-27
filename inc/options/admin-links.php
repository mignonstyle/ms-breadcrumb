<?php
/**
 * Add in the nice "settings" link to the plugins page.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Action_Links.
 */
class MS_Breadcrumb_Action_Links {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_filter( 'plugin_action_links_' . MS_BREADCRUMB_PLUGIN_DOMAIN, array( $this, 'add_plugin_action_links' ), 10, 2 );
	}

	/**
	 * Return the URL of the settings page for the plugin.
	 */
	function admin_url() {
		return admin_url( 'options-general.php?page=ms-breadcrumb' );
	}

	/**
	 * Add in the nice "settings" link to the plugins page.
	 *
	 * @param array  $links String.
	 * @param string $file File.
	 * @return array
	 */
	function add_plugin_action_links( $links, $file ) {

		if ( MS_BREADCRUMB_PLUGIN_DOMAIN == $file ) {
			$settings_link = sprintf(
				'<a href="%1$s">%2$s</a>',
				$this->admin_url(),
				__( 'Settings' , 'ms-breadcrumb' )
			);
			array_unshift( $links, $settings_link );
		}

		return $links;
	}
}
new MS_Breadcrumb_Action_Links();
