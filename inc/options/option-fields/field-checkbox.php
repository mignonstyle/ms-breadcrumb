<?php
/**
 * Option page checkbox.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Field_Checkbox.
 */
class MS_Breadcrumb_Field_Checkbox extends MS_Breadcrumb_fields_Abstract {

	/**
	 * Sets option field items.
	 */
	protected function set_field() {
		$field   = $this->get();
		$legend  = $this->get_legend();
		$label   = $this->get_label();

		$checked = isset( $field['value'] ) ? checked( $field['value'], 1, false ) : '';
		$class   = empty( $this->get_class_field_group() ) ? '' : ' class="' . $this->get_class_field_group() . '"';

		printf(
			'<fieldset>%5$s%6$s<input id="%1$s" name="%1$s" value="1"%3$s type="checkbox"%4$s>
			%2$s</fieldset>',
			esc_attr( $field['fieldname'] ),
			esc_html( $field['label'] ),
			$checked,
			$class,
			$legend,
			$label
		);
	}
}
