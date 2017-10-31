<?php
/**
 * Default option settings.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Options_Default.
 */
class MS_Breadcrumb_Options_Default {

	/**
	 * Constructor.
	 */
	const OPTIONS_PAGE_SLUG = 'ms-breadcrumb';
	const OPTION_GROUP      = 'greeting_option_group';
	const OPTION_KEY        = 'ms-breadcrumb-option';

	/**
	 * Constructor Define.
	 */
	public function __construct() {
		$includes = array(
			'/option-settings',
			//'/option-fields',
		);

		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				require_once( $file );
			}

			//require_once( plugin_dir_path( __FILE__ ) . 'fields-abstract.php' );
		}
	}

	/**
	 * Set the option page title.
	 */
	public static function option_title() {
		$opton_title = __( 'MS Breadcrumb', 'ms-breadcrumb' );

		return $opton_title;
	}

	/**
	 * Create an array of default options.
	 */
	public static function default_options() {
		return array(
			'section_1'  => array(
				'title'  => __( 'セクション 1', 'ms-breadcrumb' ),
				'desc'   => __( 'セクション 1の説明です', 'ms-breadcrumb' ),
				'fields' => array(
					'field_1' => array(
						'title' => __( 'フィールド 1', 'ms-breadcrumb' ),
						'args'  => array(
							'label' => __( 'URL: ', 'ms-breadcrumb' ),
							'desc'  => __( 'ふぃーるど1だよ', 'ms-breadcrumb' ),
							'type'  => 'url',
							'class' => '',
						),
					),
					'field_2' => array(
						'title' => __( 'フィールド 2', 'ms-breadcrumb' ),
						'args'  => array(
							'label' => __( 'E-mail: ', 'ms-breadcrumb' ),
							'desc'  => __( 'ふぃーるど2だよ', 'ms-breadcrumb' ),
							'type'  => 'email',
							'class' => '',
						),
					),
					'field_3' => array(
						'title' => __( 'フィールド 3', 'ms-breadcrumb' ),
						'args'  => array(
							'label' => __( '', 'ms-breadcrumb' ),
							'desc'  => __( 'ふぃーるど3だよ', 'ms-breadcrumb' ),
							'type'  => 'number',
							'class' => 'small-text',
						),
					),
					'field_4' => array(
						'title' => __( 'フィールド 4', 'ms-breadcrumb' ),
						'args'  => array(
							'label' => __( '', 'ms-breadcrumb' ),
							'desc'  => __( 'ふぃーるど4だよ', 'ms-breadcrumb' ),
							'type'  => 'hidden',
							'class' => '',
						),
					),
					'field_5' => array(
						'title' => __( 'フィールド 5', 'ms-breadcrumb' ),
						'args'  => array(
							'label' => __( '', 'ms-breadcrumb' ),
							'desc'  => __( 'ふぃーるど5だよ', 'ms-breadcrumb' ),
							'type'  => 'text',
							'class' => '',
						),
					),
				),
			),
			'section_2' => array(
				'title' => __( 'セクション 2', 'ms-breadcrumb' ),
				'desc'  => __( '', 'ms-breadcrumb' ),
			),
			'section_3' => array(
				'title' => __( 'セクション 3', 'ms-breadcrumb' ),
				'desc'  => __( 'セクション 3の説明です', 'ms-breadcrumb' ),
			),
		);
	}
}
