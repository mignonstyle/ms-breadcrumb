<?php
/**
 * Callback of field of option page.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Callback_Fields.
 */
class MS_Breadcrumb_Callback_Fields {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
	}

	/**
	 * Sets the field's callback.
	 *
	 * @param array $field Option field content.
	 */
	public function callback_field_content( $field ) {
		if ( empty( $field ) && isset( $field['name'] ) ) {
			return;
		}

		$label = isset( $field['label_for'] ) ? $field['label_for'] : '';
		$desc  = isset( $field['desc'] ) ? $field['desc'] : '';
		$type  = isset( $field['type'] ) ? $field['type'] : '';

		$options   = MS_Breadcrumb_Admin_Options::get_option();
		$fieldname = MS_Breadcrumb_Options_Default::OPTION_KEY . '[' . $field['name'] . ']';
		$value     = isset( $options[ $field['name'] ] ) ? $options[ $field['name'] ] : '';

		$fields = array(
			'type'      => $type,
			'fieldname' => $fieldname,
			'value'     => $value,
		);

		switch ( $type ) {
			case 'url':
			case 'email':
			case 'number':
			case 'hidden':
			case 'text':
				new MS_Breadcrumb_Field_Text( $fields );
				break;

			case 'textarea':
				break;
			case 'checkbox':
				break;
			case 'radio':
				break;
			case 'select':
				break;
			case 'colorpicker':
				break;
			case 'datepicker':
				break;
			case 'upload':
				break;
			default:
				break;
		}
	}
}
