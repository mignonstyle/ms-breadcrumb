<?php
/**
 * Create array for breadcrumbs file.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Settings.
 */
class MS_Breadcrumb_Settings {

	/**
	 * Store each item of breadcrumbs in ascending order.
	 *
	 * @var array
	 */
	protected $breadcrumbs = array();

	/**
	 * Constructor Define.
	 */
	public function __construct() {

		$includes = array(
			'/setup',
			'/controller',
		);

		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				require_once( $file );
			}
		}

		$this->display_breadcrumb_items();

		add_shortcode( 'ms-breadcrumb', array( $this, 'display_markup' ) );
	}

	/**
	 * Sets breadcrumbs items.
	 *
	 * @param array $items breadcrumb item.
	 * @return void
	 */
	protected function _set_items( $items ) {
		foreach ( $items as $item ) {
			$this->_set( $item['title'], $item['link'] );
		}
	}

	/**
	 * Adds a item.
	 *
	 * @param string $title breadcrumb title.
	 * @param string $link  breadcrumb url.
	 */
	protected function _set( $title, $link = '' ) {
		$this->breadcrumbs[] = array(
			'title' => $title,
			'link'  => $link,
		);
	}

	/**
	 * Gets breadcrumbs items.
	 *
	 * @return array
	 */
	public function get() {
		return apply_filters( 'ms_breadcrumb_items', $this->breadcrumbs );
	}

	/**
	 * Display breadcrumbs.
	 *
	 * @return string
	 */
	public function display_markup() {
		$breadcrumb_markup = new MS_Breadcrumb_Markup();

		return $breadcrumb_markup->breadcrumb_html();
	}

	/**
	 * Display breadcrumb item functions.
	 *
	 * @return void
	 */
	public function display_breadcrumb_items() {

		$breadcrumb = new MS_Breadcrumb_Home();
		$this->_set_items( $breadcrumb->get() );

		$breadcrumb = new MS_Breadcrumb_Blog();
		$this->_set_items( $breadcrumb->get() );

		if ( is_404() ) {
			$breadcrumb = new MS_Breadcrumb_Not_Found();
		} elseif ( is_search() ) {
			$breadcrumb = new MS_Breadcrumb_Search();
		} elseif ( is_attachment() ) {
		} elseif ( is_category() || is_tag() || is_tax() ) {
		} elseif ( is_page() && ! is_front_page() ) {
		} elseif ( is_single() ) {
		} elseif ( is_author() ) {
		} elseif ( is_date() ) {
		} elseif ( is_post_type_archive() ) {
		}

		if ( ! ( is_front_page() || is_home() ) ) {
		}
	}
}
