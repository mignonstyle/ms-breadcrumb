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
			'/option-fields',
		);

		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				require_once( $file );
			}

			require_once( plugin_dir_path( __FILE__ ) . 'fields-abstract.php' );
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
						'title' => __( 'url', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'url',
							'label'  => __( 'URL: ', 'ms-breadcrumb' ),
							'desc'   => __( 'ふぃーるど1だよ', 'ms-breadcrumb' ),
							'legend' => true,
							'class'  => '',
						),
					),
					'field_2' => array(
						'title' => __( '', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'email',
							'label'  => __( 'E-mail: ', 'ms-breadcrumb' ),
							'desc'   => __( 'ふぃーるど2だよ', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => '',
						),
					),
					'field_3' => array(
						'title' => __( 'number', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'number',
							'label'  => __( 'ナンバー', 'ms-breadcrumb' ),
							'desc'   => __( 'ふぃーるど3だよ', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => 'small-text',
						),
					),
					'field_4' => array(
						'title' => __( 'hidden', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'hidden',
							'label'  => __( '', 'ms-breadcrumb' ),
							'desc'   => __( 'ふぃーるど4だよ', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => '',
						),
					),
					'field_5' => array(
						'title' => __( 'text', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'text',
							'label'  => __( '', 'ms-breadcrumb' ),
							'desc'   => __( 'ふぃーるど5だよ', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => '',
						),
					),
				),
			),
			'section_2' => array(
				'title' => __( 'セクション 2', 'ms-breadcrumb' ),
				'desc'  => __( '', 'ms-breadcrumb' ),
				'fields' => array(
					'textarea_1' => array(
						'title' => __( 'textarea', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'textarea',
							'label'  => __( '', 'ms-breadcrumb' ),
							'desc'   => __( 'テキストを入力してください。', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => '',
						),
					),
					'checkbox_1' => array(
						'title' => __( 'checkbox1', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'checkbox',
							'label'  => __( 'チェックボックス1のラベルです', 'ms-breadcrumb' ),
							'desc'   => __( '', 'ms-breadcrumb' ),
							'legend' => true,
							'class'  => '',
						),
					),
					'checkbox_2' => array(
						'title' => __( '', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'checkbox',
							'label'  => __( 'チェックボックス2のラベルです', 'ms-breadcrumb' ),
							'desc'   => __( '', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => '',
						),
					),
					'checkbox_3' => array(
						'title' => __( 'checkbox3', 'ms-breadcrumb' ),
						'args'  => array(
							'type'   => 'checkbox',
							'label'  => __( 'チェックボックス3のラベルです', 'ms-breadcrumb' ),
							'desc'   => __( 'チェックボックス3の説明です。', 'ms-breadcrumb' ),
							'legend' => false,
							'class'  => '',
						),
					),
				),
			),
			'section_3' => array(
				'title' => __( 'セクション 3', 'ms-breadcrumb' ),
				'desc'  => __( 'セクション 3の説明です', 'ms-breadcrumb' ),
			),
		);
	}
}
