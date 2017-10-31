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
		$fields = $this->get();
		$class  = empty( $fields['class'] ) ? 'large-text' : $fields['class'];

		printf(
			'<textarea id="%1$s" name="%1$s" rows="10" cols="50" class="%3$s">%2$s</textarea>',
			esc_attr( $fields['fieldname'] ),
			esc_attr( $fields['value'] ),
			esc_attr( $class )
		);
	}
}
