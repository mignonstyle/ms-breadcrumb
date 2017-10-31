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
		$fields = $this->get();
		$class  = empty( $fields['class'] ) ? 'regular-text' : $fields['class'];

		if ( isset( $fields['label'] ) && $fields['label'] ) {
			printf(
				'<label for="%1$s">%2$s</label>',
				esc_attr( $fields['fieldname'] ),
				esc_attr( $fields['label'] )
			);
		}

		printf(
			'<input id="%1$s" name="%1$s" value="%2$s" class="%3$s" type="%4$s" />',
			esc_attr( $fields['fieldname'] ),
			esc_attr( $fields['value'] ),
			esc_attr( $class ),
			esc_attr( $fields['type'] )
		);
	}
}
