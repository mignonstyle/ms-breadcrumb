<?php
/**
 * Post type of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Post_type.
 */
class MS_Breadcrumb_Post_Type extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$post_id   = get_the_ID();
		$post_type = $this->get_post_type( $post_id );

		if ( is_post_type_archive() || is_home() || is_search() || is_404() || 'page' == $post_type ) {
			return;
		}

		// If the contribution type is an attachment.
		if ( 'attachment' == $post_type ) {
			// Acquire post id of attachment's parent.
			$parent_id = $this->get_attachment_parent_id();

			if ( $parent_id ) {
				// Acquire post type of attachment's parent.
				$post_type = get_post_type( $parent_id );
			} else {
				return;
			}
		}

		// If the post type is post.
		if ( 'post' == $post_type ) {
			$show_on_front  = get_option( 'show_on_front' );
			$page_for_posts = get_option( 'page_for_posts' );

			// When front page display is set.
			if ( 'page' === $show_on_front && $page_for_posts ) {
				$label = get_the_title( $page_for_posts );
				$url   = get_permalink( $page_for_posts );

				$this->set( $label, $url );
			}
		} else {
			// Display post type if post type is custom post type.
			$label = $this->get_post_type_archive_label( $post_type );
			$url   = $this->get_post_type_archive_link( $post_type );

			$this->set( $label, $url );
		}
	}
}
