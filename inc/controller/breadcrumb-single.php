<?php
/**
 * Single item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Single.
 */
class MS_Breadcrumb_Single extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$post_id  = get_the_ID();
		$taxonomy = $this->get_post_taxonomy( $post_id );

		if ( $taxonomy ) {
			$this->set_terms( $post_id, $taxonomy );
		}

		$this->set( get_the_title() );
	}
}
