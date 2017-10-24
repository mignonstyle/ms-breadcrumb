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

}
