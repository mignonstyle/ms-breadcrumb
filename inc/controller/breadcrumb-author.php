<?php
/**
 * Author item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Author.
 */
class MS_Breadcrumb_Author extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$author_id = get_query_var( 'author' );
		$author    = get_the_author_meta( 'display_name', $author_id );

		$this->set(
			sprintf(
				/* translators: %s: author name */
				__( 'Articles by: %s', 'fleur' ),
				$author
			)
		);
	}
}
