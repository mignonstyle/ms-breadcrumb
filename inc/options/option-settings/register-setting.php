<?php
/**
 * To register the setting options.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Register_Settings.
 */
class MS_Breadcrumb_Register_Settings {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_init', array( $this, 'register_settings_init' ) );
	}

	/**
	 * Initialization of option setting screen.
	 */
	public function register_settings() {
		$sanitize = new MS_Breadcrumb_Option_Sanitize();

		register_setting(
			MS_Breadcrumb_Options_Default::OPTION_GROUP,
			MS_Breadcrumb_Options_Default::OPTION_KEY,
			array( $sanitize, 'sanitize_callback' )
		);
	}

	/**
	 * Add section and fields of settings.
	 */
	public function register_settings_init() {
		$default  = new MS_Breadcrumb_Options_Default();
		$sections = $default->default_options();

		$callback_section = new MS_Breadcrumb_Callback_Sections();
		$callback_field   = new MS_Breadcrumb_Callback_Fields();

		foreach ( $sections as $section_key => $section ) {
			// Add the sections.
			add_settings_section(
				$section_key,
				$section['title'],
				array( $callback_section, 'callback_section_content' ),
				MS_Breadcrumb_Options_Default::OPTIONS_PAGE_SLUG
			);

			if ( isset( $section['fields'] ) ) {

				// Add the fields.
				foreach ( $section['fields'] as $field_key => $field ) {
					$label_for = isset( $field['args']['label_for'] ) ? $field['args']['label_for'] : '';
					$desc      = isset( $field['args']['desc'] ) ? $field['args']['desc'] : '';
					$type      = isset( $field['args']['type'] ) ? $field['args']['type'] : '';

					add_settings_field(
						$field_key,
						$field['title'],
						array( $callback_field, 'callback_field_content' ),
						MS_Breadcrumb_Options_Default::OPTIONS_PAGE_SLUG,
						$section_key,
						array(
							'label_for' => $label_for,
							'type'      => $type,
							'desc'      => $desc,
							'name'      => $field_key,
						)
					);
				}
			}
		}
	}
}
new MS_Breadcrumb_Register_Settings();
