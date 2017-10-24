<?php
/**
 * Blog item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Blog.
 */
class MS_Breadcrumb_Blog extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		if ( is_page() || is_search() || is_post_type_archive() || is_tax() || is_404() ) {
			return;
		}

		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( 'page' === $show_on_front && $page_for_posts ) {
			$this->set( get_the_title( $page_for_posts ), get_permalink( $page_for_posts ) );
		}
	}
}
