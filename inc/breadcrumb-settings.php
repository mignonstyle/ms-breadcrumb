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
			'/functions',
		);

		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				require_once( $file );
			}
		}

		new MS_Breadcrumb_Enqueue_Scripts();

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

		if ( is_admin() ) {
			return;
		}

		$breadcrumb = new MS_Breadcrumb_Home();
		$this->_set_items( $breadcrumb->get() );

		$breadcrumb = new MS_Breadcrumb_Post_Type();
		$this->_set_items( $breadcrumb->get() );

		$breadcrumb = new MS_Breadcrumb_Blog();
		$this->_set_items( $breadcrumb->get() );

		if ( is_404() ) {
			$breadcrumb = new MS_Breadcrumb_Not_Found();
		} elseif ( is_search() ) {
			$breadcrumb = new MS_Breadcrumb_Search();
		} elseif ( is_attachment() ) {
			$breadcrumb = new MS_Breadcrumb_Attachment();
		} elseif ( is_category() || is_tag() || is_tax() ) {
			$breadcrumb = new MS_Breadcrumb_Term();
		} elseif ( is_page() && ! is_front_page() ) {
			$breadcrumb = new MS_Breadcrumb_Page();
		} elseif ( is_single() ) {
			$breadcrumb = new MS_Breadcrumb_Single();
		} elseif ( is_author() ) {
			$breadcrumb = new MS_Breadcrumb_Author();
		} elseif ( is_date() ) {
			$breadcrumb = new MS_Breadcrumb_Date();
		} elseif ( is_post_type_archive() ) {
			$breadcrumb = new MS_Breadcrumb_Post_Type_Archive();
		}

		if ( ! ( is_front_page() || is_home() ) ) {
			$this->_set_items( $breadcrumb->get() );
		}
	}
}
