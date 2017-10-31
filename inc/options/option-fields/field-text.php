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
class MS_Breadcrumb_Field_Text {

	/**
	 * Constructor Define.
	 *
	 * @param string $fieldname Field id and name.
	 * @param string $value     Field value.
	 */
	public function __construct( $fieldname, $value ) {
		$this->set_field( $fieldname, $value );
		$this->field_markup();
	}

	/**
	 * Sets the field's callback.
	 *
	 * @param string $fieldname Field id and name.
	 * @param string $value     Field value.
	 */
	public function set_field( $fieldname, $value ) {
		if ( empty( $fieldname ) && empty( $value ) ) {
			return;
		}

		$this->fieldname = $fieldname;
		$this->value     = $value;
	}

	/**
	 * Sets the field's callback.
	 */
	private function field_markup() {
		?>
		<input type="text" id="<?php echo esc_attr( $this->fieldname ); ?>" name="<?php echo esc_attr( $this->fieldname ); ?>" value="<?php echo esc_attr( $this->value ); ?>" />
		<?php
	}
}
