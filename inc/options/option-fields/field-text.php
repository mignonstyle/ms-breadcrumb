<?php
/**
 * Option page text field.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Field_Text.
 */
class MS_Breadcrumb_Field_Text extends MS_Breadcrumb_fields_Abstract {

	/**
	 * Sets option field items.
	 */
	protected function set_field() {
		$field  = $this->get();
		$legend = $this->get_legend();
		$label  = $this->get_label();

		$class  = empty( $field['class'] ) ? 'regular-text' : $field['class'];
		$class .= empty( $this->get_class_field_group() ) ? '' : ' ' . $this->get_class_field_group();

		printf(
			'<fieldset>%5$s%6$s<input id="%1$s" name="%1$s" value="%2$s" class="%3$s" type="%4$s" /></fieldset>',
			esc_attr( $field['fieldname'] ),
			esc_attr( $field['value'] ),
			esc_attr( $class ),
			esc_attr( $field['type'] ),
			$legend,
			$label
		);
	}
}
