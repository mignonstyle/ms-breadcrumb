<?php
/**
 * Front page and home item of breadcrumbs
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Home.
 */
class MS_Breadcrumb_Home extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$label = get_bloginfo( 'name' );
		$url   = get_home_url();

		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( ( is_home() && is_front_page() ) || ( 'page' === $show_on_front && $page_for_posts ) && is_front_page() ) {
			$url = '';
		}

		$this->set( $label, $url );
	}
}
