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
		$post_type = get_query_var( 'post_type' );

		if ( is_array( $post_type ) ) {
			$post_type = array_shift( $post_types );
		}

		if ( $post_type && 'post' !== $post_type ) {
			$label = $this->get_post_type_archive_label( $post_type );
			$this->set( $label );
		}
	}
}
