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
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		if ( ! $this->is_blog() ) {
			return;
		}

		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( 'page' === $show_on_front && $page_for_posts && is_home() ) {
			$label = get_the_title( $page_for_posts );
			$url   = get_permalink( $page_for_posts );

			$this->set( $label );
		}
	}
}
