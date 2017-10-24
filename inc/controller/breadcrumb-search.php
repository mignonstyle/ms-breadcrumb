<?php
/**
 * Search item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Search.
 */
class MS_Breadcrumb_Search extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$this->set(
			sprintf(
				/* translators: %s: search string */
				__( 'Search results of "%s"', 'ms-breadcrumb' ),
				get_search_query()
			)
		);
	}
}
