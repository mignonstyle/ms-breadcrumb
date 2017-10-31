<?php
/**
 * Abstract option fields class.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Abstract class MS_Breadcrumb_fields_Abstract.
 */
abstract class MS_Breadcrumb_fields_Abstract {

	/**
	 * Option fields name and value.
	 *
	 * @var array
	 */
	protected $fields = array();

	/**
	 * Constructor Define.
	 *
	 * @param string $fieldname Field id and name.
	 * @param string $value     Field value.
	 */
	public function __construct( $fields ) {
		$this->set( $fields );
		$this->set_field();
	}

	/**
	 * Sets option field items.
	 */
	abstract protected function set_field();

	/**
	 * Add field name and value.
	 *
	 * @param string $fieldname Field id and name.
	 * @param string $value     Field value.
	 */
	protected function set( $fields ) {
		$this->fields = $fields;
	}

	/**
	 * Return option field items.
	 *
	 * @return array
	 */
	public function get() {
		if ( empty( $this->fields ) ) {
			return;
		}

		return $this->fields;
	}
}
