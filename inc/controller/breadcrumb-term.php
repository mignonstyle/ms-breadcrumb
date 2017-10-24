<?php
/**
 * Category, tag and taxonomy item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Term.
 */
class MS_Breadcrumb_Term extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		$term     = get_queried_object();
		$taxonomy = $term->taxonomy;

		if ( is_tax() ) {
			$taxonomy_objects = get_taxonomy( $taxonomy );
			$post_types       = $taxonomy_objects->object_type;
			$post_type        = array_shift( $post_types );

			if ( $post_type ) {
				$label = $this->get_post_type_archive_label( $post_type );
				$url   = $this->get_post_type_archive_link( $post_type );

				$this->set( $label, $url );
			}
		}

		if ( is_taxonomy_hierarchical( $taxonomy ) && $term->parent ) {
			$this->set_ancestors( $term->term_id, $taxonomy );
		}

		$this->set( $term->name );
	}
}
