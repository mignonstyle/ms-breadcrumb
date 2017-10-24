<?php
/**
 * Abstract breadcrumbs item class.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Abstract class MS_Breadcrumb_Abstract
 */
abstract class MS_Breadcrumb_Abstract {

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
		$this->set_items();
	}

	/**
	 * Adds a item.
	 *
	 * @param string $title breadcrumb title.
	 * @param string $link  breadcrumb url.
	 */
	protected function set( $title, $link = '' ) {
		$this->breadcrumbs[] = array(
			'title' => $title,
			'link'  => $link,
		);
	}

	/**
	 * Return breadcrumbs items.
	 *
	 * @return array
	 */
	public function get() {
		return $this->breadcrumbs;
	}
}
