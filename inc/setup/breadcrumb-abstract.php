<?php
/**
 * Abstract breadcrumbs item class.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Abstract class MS_Breadcrumb_Abstract.
 */
abstract class MS_Breadcrumb_Abstract {

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
		$this->set_items();
	}

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	abstract protected function set_items();

	/**
	 * Adds a item.
	 *
	 * @param string $title breadcrumb title.
	 * @param string $link  breadcrumb url.
	 */
	protected function set( $title, $link = '' ) {
		$this->breadcrumbs[] = array(
			'title' => $title,
			'link'  => $link,
		);
	}

	/**
	 * Return breadcrumbs items.
	 *
	 * @return array
	 */
	public function get() {
		return $this->breadcrumbs;
	}

	/**
	 * Set the ancestors of the specified page or taxonomy.
	 *
	 * @param int    $object_id Post ID or Term ID.
	 * @param string $object_type taxonomy slug.
	 */
	protected function set_ancestors( $object_id, $object_type ) {
		$ancestors = get_ancestors( $object_id, $object_type );
		krsort( $ancestors );

		if ( 'page' === $object_type ) {
			foreach ( $ancestors as $ancestor_id ) {
				$this->set( get_the_title( $ancestor_id ), get_permalink( $ancestor_id ) );
			}
		} else {
			foreach ( $ancestors as $ancestor_id ) {
				$ancestor = get_term( $ancestor_id, $object_type );
				$this->set( $ancestor->name, get_term_link( $ancestor ) );
			}
		}
	}

	/**
	 * Return custom post type archive label.
	 *
	 * @param string $post_type post type name.
	 * @return null|string
	 */
	protected function get_post_type_archive_label( $post_type ) {
		$post_type_object = get_post_type_object( $post_type );
		$label            = $post_type_object->label;

		if ( $label ) {
			return $label;
		}
	}

	/**
	 * Return custom post type archive page url.
	 *
	 * @param string $post_type post type name.
	 * @return null|string
	 */
	protected function get_post_type_archive_link( $post_type ) {
		$archive_link = get_post_type_archive_link( $post_type );

		if ( $archive_link ) {
			return $archive_link;
		}
	}

	/**
	 * Return the post type.
	 *
	 * @param string $post_id post id.
	 * @return string
	 */
	protected function get_post_type( $post_id ) {
		global $wp_query;

		$post_type = get_post_type( $post_id );

		if ( $post_type ) {
			return $post_type;
		}

		if ( isset( $wp_query->query['post_type'] ) ) {
			return $wp_query->query['post_type'];
		}

		return $post_type;
	}

	/**
	 * Return the post taxonomy.
	 *
	 * @param string $post_id post id.
	 * @return string
	 */
	protected function get_post_taxonomy( $post_id ) {
		$taxonomies = get_post_taxonomies( $post_id );

		if ( ! $taxonomies ) {
			return;
		}

		$taxonomy = array_shift( $taxonomies );

		return $taxonomy;
	}

	/**
	 * Sets Breadcrumbs items of terms or categories.
	 *
	 * @param string $post_id post id.
	 * @param string $taxonomy taxonomy slug.
	 * @return void
	 */
	protected function set_terms( $post_id, $taxonomy ) {
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( ! is_array( $terms ) ) {
			return;
		}

		$term_key  = key( $terms );
		$parent_id = 0;

		foreach ( $terms as $key => $object ) {

			if ( 0 < $object->parent && ( 0 === $parent_id || $object->parent === $parent_id ) ) {
				$term_key  = $key;
				$parent_id = $object->term_id;
			}
		}
		$term = $terms[ $term_key ];

		$this->set_ancestors( $parent_id, $taxonomy );
		$this->set( $term->name, get_term_link( $term ) );
	}

	/**
	 * Return attachment parent id.
	 *
	 * @return null|string
	 */
	protected function get_attachment_parent_id() {
		global $post;

		$attachment_parent = $post->post_parent;

		if ( $attachment_parent ) {
			$parent_post = get_post( $attachment_parent );

			if ( $parent_post ) {
				$parent_id = $parent_post->ID;

				return $parent_id;
			}
		}
	}
}
