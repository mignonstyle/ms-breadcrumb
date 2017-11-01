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
		$sections = MS_Breadcrumb_Options_Default::default_options();

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

					if ( ( '' == $field_key && '0' != $field_key ) ||
					     ( ! array_key_exists( 'type', $field['args'] ) ) ||
						 ( '' == $field['args']['type'] && '0' != $field['args']['type'] ) ) {
						continue;
					}

					$type        = isset( $field['args']['type'] ) ? $field['args']['type'] : '';
					$fieldtitle  = isset( $field['title'] ) ? $field['title'] : '';
					$label       = isset( $field['args']['label'] ) ? $field['args']['label'] : '';
					$desc        = isset( $field['args']['desc'] ) ? $field['args']['desc'] : '';
					$legend      = isset( $field['args']['legend'] ) ? $field['args']['legend'] : '';
					$class       = isset( $field['args']['class'] ) ? $field['args']['class'] : '';

					add_settings_field(
						$field_key,
						$fieldtitle,
						array( $callback_field, 'callback_field_content' ),
						MS_Breadcrumb_Options_Default::OPTIONS_PAGE_SLUG,
						$section_key,
						array(
							'fieldname'   => $field_key,
							'type'        => $type,
							'fieldtitle'  => $fieldtitle,
							'label'       => $label,
							'desc'        => $desc,
							'legend'      => $legend,
							'class'       => $class,
						)
					);
				}
			}
		}
	}
}
new MS_Breadcrumb_Register_Settings();
