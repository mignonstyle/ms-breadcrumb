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
		$post_id   = get_the_ID();
		$post_type = $this->get_post_type( $post_id );
		$taxonomy  = $this->get_post_taxonomy( $post_id );

		if ( ! ( 'post' == $post_type ) ) {
			$label = $this->get_post_type_archive_label( $post_type );
			$url   = $this->get_post_type_archive_link( $post_type );

			$this->set( $label, $url );
		}

		if ( $taxonomy ) {
			$this->set_terms( $post_id, $taxonomy );
		}

		$this->set( get_the_title() );
	}
}
