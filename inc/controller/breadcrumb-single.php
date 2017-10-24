<?php
/**
 * Single item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Single.
 */
class MS_Breadcrumb_Single extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$taxonomies = get_post_taxonomies();

		if ( $taxonomies ) {
			$taxonomy = array_shift( $taxonomies );
			$this->set_terms( $taxonomy );
		}

		$this->set( get_the_title() );
	}

	/**
	 * Sets Breadcrumbs items of terms or categories.
	 *
	 * @param string $taxonomy taxonomy slug.
	 * @return void
	 */
	protected function set_terms( $taxonomy ) {
		$terms = get_the_terms( get_the_ID(), $taxonomy );

		if ( ! is_array( $terms ) ) {
			return;
		}

		$term_key  = key( $terms );
		$parent_id = 0;

		foreach( $terms as $key => $object ) {
			if ( $object->parent > 0 && ( $parent_id === 0 || $object->parent === $parent_id ) ) {
				$term_key  = $key;
				$parent_id = $object->term_id;
			}
		}
		$term = $terms[$term_key];

		$this->set_ancestors( $parent_id, $taxonomy );
		$this->set( $term->name, get_term_link( $term ) );
	}
}
