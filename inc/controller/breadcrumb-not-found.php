<?php
/**
 * Not found item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Not_Found.
 */
class MS_Breadcrumb_Not_Found extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set( __( '404 Not Found', 'ms-breadcrumb' ) );
	}
}
