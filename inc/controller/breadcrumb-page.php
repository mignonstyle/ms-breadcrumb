<?php
/**
 * Page item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Page.
 */
class MS_Breadcrumb_Page extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set_ancestors( get_the_ID(), 'page' );
		$this->set( get_the_title() );
	}
}
