<?php
/**
 * Option page textarea.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Field_Textarea.
 */
class MS_Breadcrumb_Field_Textarea extends MS_Breadcrumb_fields_Abstract {

	/**
	 * Sets option field items.
	 */
	protected function set_field() {
		$field = $this->get();
		$class = empty( $field['class'] ) ? 'large-text' : $field['class'];

		printf(
			'<textarea id="%1$s" name="%1$s" rows="10" cols="50" class="%3$s">%2$s</textarea>',
			esc_attr( $field['fieldname'] ),
			esc_attr( $field['value'] ),
			esc_attr( $class )
		);
	}
}
