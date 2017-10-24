<?php
/**
 * Front page and home item of breadcrumbs
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Home
 */
class MS_Breadcrumb_Home extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$label = get_bloginfo( 'name' );
		$url   = get_home_url();

		if ( is_front_page() || is_home() ) {
			$this->set( $label );
		} else {
			$this->set( $label, $url );
		}
	}
}
