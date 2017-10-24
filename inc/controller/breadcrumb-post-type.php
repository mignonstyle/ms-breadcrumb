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
		if ( ! ( is_category() || is_tag() || is_date() || is_author() || is_single() || is_404() ) ) {
			return;
		}

		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( 'page' === $show_on_front && $page_for_posts ) {
			$post_type = $this->get_post_type();

			if ( $post_type && 'post' == $post_type || 'attachment' == $post_type ) {
				$label = get_the_title( $page_for_posts );
				$url   = get_permalink( $page_for_posts );
			} else {
				$label = $this->get_post_type_archive_label( $post_type );
				$url   = $this->get_post_type_archive_link( $post_type );
			}

			$this->set( $label, $url );
		}
	}
}
