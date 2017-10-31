<?php
/**
 * Sanitize callback.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Option_Sanitize.
 */
class MS_Breadcrumb_Option_Sanitize {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
	}

	/**
	 * Sanitize each setting field as needed.
	 *
	 * @param array $input Contains all settings fields as array keys.
	 */
	public function sanitize_callback( $input ) {
		$sections = MS_Breadcrumb_Options_Default::default_options();

		$output = MS_Breadcrumb_Admin_Options::get_option();

		// 作業途中. デフォルトのtypeによって検証させる.
		foreach ( $sections as $section_key => $section ) {

			if ( isset( $section['fields'] ) ) {
				foreach ( $section['fields'] as $field_key => $field ) {

					if ( isset( $input[ $field_key ] ) ) {
						$input[ $field_key ] = sanitize_text_field( $input[ $field_key ] );
					}
				}
			}
		}

		return $input;
	}
}
