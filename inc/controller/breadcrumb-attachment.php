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
		global $post;

		$attachment_parent = $post->post_parent;

		if ( $attachment_parent ) {
			$parent_post = get_post( $attachment_parent );

			if ( $parent_post ) {
				$parent_id = $parent_post->ID;
				$taxonomy  = $this->get_post_taxonomy( $parent_id );

				$this->set_post_type_links( $parent_id );

				if ( $taxonomy ) {
					$this->set_terms( $parent_id, $taxonomy );
				}

				$this->set( get_the_title( $parent_id ), get_permalink( $parent_id ) );
			}
		}

		$this->set( get_the_title() );
	}
}
