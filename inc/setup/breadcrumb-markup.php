<?php
/**
 * Structured markup of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Markup.
 */
class MS_Breadcrumb_Markup {

	/**
	 * Store each item of breadcrumbs in ascending order.
	 *
	 * @var array
	 */
	protected $breadcrumbs = array();

	/**
	 * Constructor Define.
	 */
	public function __construct() {
	}

	/**
	 * Mark up breadcrumbs.
	 *
	 * @return void
	 */
	public function breadcrumb_html() {
		$breadcrumb = new MS_Breadcrumb_Settings();
		$items = apply_filters( 'ms_breadcrumb_items', $breadcrumb->get() );

		if ( ! $items ) {
			return;
		}
		?>
		<div class="c-breadcrumbs-ms">
			<ol class="c-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				<?php foreach ( $items as $key => $item ) : ?>
					<li class="c-breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<?php if ( empty( $item['link'] ) ) : ?>
							<span itemscope itemtype="http://schema.org/Thing" itemprop="item">
								<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
							</span>
						<?php else : ?>
							<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo esc_url( $item['link'] ); ?>">
								<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
							</a>
						<?php endif; ?>
						<meta itemprop="position" content="<?php echo esc_attr( $key + 1 ); ?>" />
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
		<?php
	}
}
