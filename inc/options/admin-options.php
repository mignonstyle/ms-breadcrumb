<?php
/**
 * Add plugin option page.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Admin_Options.
 */
class MS_Breadcrumb_Admin_Options {

	/**
	 * Constructor Define.
	 */
	const OPTIONS_PAGE_SLUG = 'ms-breadcrumb';

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_option_menu' ), 12 );
	}

	/**
	 * Create custom plugin settings menu.
	 */
	public function add_option_menu() {
		// This page will be under "Settings".
		$page_hook = add_options_page(
			__( 'MS Breadcrumb', 'ms-breadcrumb' ),
			__( 'MS Breadcrumb', 'ms-breadcrumb' ),
			'manage_options',
			self::OPTIONS_PAGE_SLUG,
			array( $this, 'create_option_page' )
		);

		// Read option page style and script.
		add_action( 'admin_print_scripts-' . $page_hook, array( $this, 'add_admin_print_scripts' ) );
	}

	/**
	 * Read option page style and script.
	 */
	public function add_admin_print_scripts() {

	}

	/**
	 * Options page callback. option page markup.
	 */
	public function create_option_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'ms-breadcrumb' ) );
		}
		?>
		<div class="wrap">
			<h2><?php _e( 'MS Breadcrumb', 'ms-breadcrumb' ); ?></h2>
			<form method="post" action="options.php">
				<p>ここにフォームを記述</p>
			</form>
		</div>
		<?php
	}
}
new MS_Breadcrumb_Admin_Options();
