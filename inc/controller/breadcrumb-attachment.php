<?php
/**
 * Attachment item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Attachment.
 */
class MS_Breadcrumb_Attachment extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$parent_id = $this->get_attachment_parent_id();

		if ( $parent_id ) {
			$taxonomy  = $this->get_post_taxonomy( $parent_id );

			if ( $taxonomy ) {
				$this->set_terms( $parent_id, $taxonomy );
			}

			$this->set( get_the_title( $parent_id ), get_permalink( $parent_id ) );
		}

		$this->set( get_the_title() );
	}
}
