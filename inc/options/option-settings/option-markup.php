<?php
/**
 * Option page markup.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Option_Markup.
 */
class MS_Breadcrumb_Option_Markup {

	/**
	 * Constructor Define.
	 */
	public function __construct() {
	}

	/**
	 * Options page callback. option page markup.
	 */
	public function create_option_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'ms-breadcrumb' ) );
		}
		?>
		<div id="c-ms-breadcrumb" class="wrap">
			<h2><?php echo esc_html( MS_Breadcrumb_Options_Default::option_title() ); ?></h2>

			<form method="post" action="options.php">
				<?php
					settings_fields( MS_Breadcrumb_Options_Default::OPTION_GROUP );
					do_settings_sections( MS_Breadcrumb_Options_Default::OPTIONS_PAGE_SLUG );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}
}
