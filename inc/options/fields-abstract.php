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
abstract class MS_Breadcrumb_Fields_Abstract {

	/**
	 * Option fields name and value.
	 *
	 * @var array
	 */
	protected $fields = array();

	/**
	 * Constructor Define.
	 *
	 * @param string $fields Field items.
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
	 * @param string $fields Field items.
	 */
	protected function set( $fields ) {

		if ( empty( $fields['fieldname'] ) ) {
			return;
		}

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

	/**
	 *
	 */
	public function get_legend() {
		$field  = $this->get();
		$legend = '';

		if ( true === $field['legend'] ) {
			$legend = sprintf(
				'<legend class="screen-reader-text"><span>%1$s</span></legend>',
				$field['fieldtitle']
			);
		}

		return $legend;
	}

	/**
	 *
	 */
	public function get_label() {
		$field = $this->get();
		$label = '';

		if ( isset( $field['label'] ) ) {
			$label = sprintf(
				'<label for="%1$s">%2$s</label>',
				esc_attr( $field['fieldname'] ),
				esc_attr( $field['label'] )
			);
		}

		return $label;
	}

	/**
	 *
	 */
	public function get_class_field_group() {
		$field       = $this->get();
		$field_group = ( ! $field['fieldtitle'] ) ? 'field-group' : '';

		return $field_group;
	}
}
