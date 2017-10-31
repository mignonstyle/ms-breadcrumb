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
/*
		?>
		<p><textarea id="ms_custom_login_options[<?php echo esc_attr( $option_name ); ?>]" cols="<?php echo absint( $option_cols ); ?>" rows="<?php echo absint( $option_rows ); ?>" name="ms_custom_login_options[<?php echo esc_attr( $option_name ); ?>]"><?php echo esc_textarea( $content ); ?></textarea></p>



		<input type="<?php echo esc_attr( $fields['type'] ); ?>" id="<?php echo esc_attr( $fields['fieldname'] ); ?>" name="<?php echo esc_attr( $fields['fieldname'] ); ?>" value="<?php echo esc_attr( $fields['value'] ); ?>" />
		<?php
		*/
	}
}
