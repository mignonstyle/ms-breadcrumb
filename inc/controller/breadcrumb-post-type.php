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
		if ( ! ( is_category() || is_tag() || is_date() || is_author() || is_single() ) ) {
			return;
		}

		$post_id   = get_the_ID();
		$post_type = $this->get_post_type( $post_id );
		$label     = '';
		$url       = '';

		if ( ! $post_type ) {
			return;
		}

		if ( 'attachment' == $post_type ) {
			$parent_id = $this->get_attachment_parent_id();

			if ( $parent_id ) {
				$post_type = get_post_type( $parent_id );
			}
		}

		if ( 'post' === $post_type ) {
			$show_on_front  = get_option( 'show_on_front' );
			$page_for_posts = get_option( 'page_for_posts' );

			if ( 'page' === $show_on_front && $page_for_posts ) {
				$label = get_the_title( $page_for_posts );
				$url   = get_permalink( $page_for_posts );
			}
		} elseif ( 'attachment' != $post_type ) {
			$label = $this->get_post_type_archive_label( $post_type );
			$url   = $this->get_post_type_archive_link( $post_type );
		}

		if ( $label && $url ) {
			$this->set( $label, $url );
		}
	}
}
