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

		if ( ( '0' != $field['type'] && ! $field['type'] ) || ( '0' != $field['fieldname'] && ! $field['fieldname'] ) ) {
			return;
		}

		$options   = MS_Breadcrumb_Admin_Options::get_option();

		$fieldname   = MS_Breadcrumb_Options_Default::OPTION_KEY . '[' . $field['fieldname'] . ']';
		$type        = isset( $field['type'] ) ? $field['type'] : '';
		$value       = isset( $options[ $field['fieldname'] ] ) ? $options[ $field['fieldname'] ] : '';
		$fieldtitle  = isset( $field['fieldtitle'] ) ? $field['fieldtitle'] : '';
		$label       = isset( $field['label'] ) ? $field['label'] : '';
		$desc        = isset( $field['desc'] ) ? $field['desc'] : '';
		$legend      = isset( $field['legend'] ) ? $field['legend'] : '';
		$class       = isset( $field['class'] ) ? $field['class'] : '';

		$fields = array(
			'fieldname'   => $fieldname,
			'type'        => $type,
			'value'       => $value,
			'fieldtitle'  => $fieldtitle,
			'label'       => $label,
			'desc'        => $desc,
			'legend'      => $legend,
			'class'       => $class,
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
				new MS_Breadcrumb_Field_Textarea( $fields );
				break;

			case 'checkbox':
				new MS_Breadcrumb_Field_Checkbox( $fields );
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

		if ( isset( $fields['desc'] ) && $fields['desc'] ) {
			printf(
				'<p>%s</p>',
				esc_html( $fields['desc'] )
			);
		}
	}
}
