<?php
/**
 * Post type archive item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Post_Type_Archive.
 */
class MS_Breadcrumb_Post_Type_Archive extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$post_id   = get_the_ID();
		$post_type = $this->get_post_type( $post_id );

		if ( $post_type && 'post' !== $post_type ) {
			$label = $this->get_post_type_archive_label( $post_type );

			$this->set( $label );
		}
	}
}
