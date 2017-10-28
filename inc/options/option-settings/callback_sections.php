<?php
/**
 * Callback of section of option page.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Callback_Sections.
 */
class MS_Breadcrumb_Callback_Sections {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
	}

	/**
	 * Sets the section's callback.
	 */
	public function callback_section_content( $arg ) {
		$default  = new MS_Breadcrumb_Options_Default();
		$sections = $default->default_options();

		foreach( $sections as $section_key => $section ) {

			if ( isset( $arg['id'] ) && $section_key == $arg['id'] ) {
				$class_name = MS_Breadcrumb_Options_Default::OPTION_KEY . '-' . $section_key . ' ' . $section_key;

				if ( isset( $section['desc'] ) && $section['desc'] ) {
					echo '<p class="' . $class_name . ' section-description">' . $section['desc'] . '</p>';
				}
			}
		}
	}
}
