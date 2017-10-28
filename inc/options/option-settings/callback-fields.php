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
	 */
	public function callback_field_content( $field ) {
		if ( empty( $field ) && isset( $field['name'] ) ) {
			return;
		}

		$label = isset( $field['label_for'] ) ? $field['label_for'] : '';
		$desc  = isset( $field['desc'] ) ? $field['desc'] : '';
		$type  = isset( $field['type'] ) ? $field['type'] : '';

		// 既にデータが入力されていたら表示する
		$options   = MS_Breadcrumb_Admin_Options::get_option();
		$value     = isset( $options[$field['name']]) ? $options[$field['name']] : '';
		$fieldname = MS_Breadcrumb_Options_Default::OPTION_KEY . '[' . $field['name'] . ']';

		switch( $type ) {
			case 'url':
				break;
			case 'email':
				break;
			case 'number':
				break;
			case 'hidden':
				break;
			case 'text':
				new MS_Breadcrumb_Field_Text( $fieldname, $value );
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
