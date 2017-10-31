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

		?>
		<input type="<?php echo esc_attr( $fields['type'] ); ?>" id="<?php echo esc_attr( $fields['fieldname'] ); ?>" name="<?php echo esc_attr( $fields['fieldname'] ); ?>" value="<?php echo esc_attr( $fields['value'] ); ?>" />
		<?php
	}
}
