<?php

// includes/register-taxonomy

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'init', 'ddw_btc_register_templates_taxonomy', 20 );
/**
 * Register Taxonomy for categorizing Templates for use in Page Builder contexts.
 *
 * @since 1.0.0
 * @since 1.1.0 Make the default label string "Template" filterable.
 *
 * @see   ddw_btc_string_default_content_type()
 *
 * @uses  register_taxonomy()
 */
function ddw_btc_register_templates_taxonomy() {

	/** Set taxonomy labels, filterable */
	$tax_labels = apply_filters(
		'btc/filter/taxonomy/labels',
		array(
			'name'                       => sprintf(
				_x( '%s Categories', 'Taxonomy General Name', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'singular_name'              => sprintf(
				_x( '%s Category', 'Taxonomy Singular Name', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'menu_name'                  => __( 'Taxonomy', 'builder-template-categories' ),
			'all_items'                  => sprintf(
				__( 'All %s Categories', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'parent_item'                => sprintf(
				__( 'Parent %s Category', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'parent_item_colon'          => sprintf(
				__( 'Parent %s Category:', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'new_item_name'              => sprintf(
				__( 'New %s Category Name', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'add_new_item'               => sprintf(
				__( 'Add New %s Category', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'edit_item'                  => sprintf(
				__( 'Edit %s Category', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'update_item'                => sprintf(
				__( 'Update %s Category', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'view_item'                  => sprintf(
				__( 'View %s Category', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'separate_items_with_commas' => sprintf(
				__( 'Separate %s Categories with commas', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'add_or_remove_items'        => __( 'Add or remove categories', 'builder-template-categories' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'builder-template-categories' ),
			'popular_items'              => __( 'Popular Categories', 'builder-template-categories' ),
			'search_items'               => sprintf(
				__( 'Search %s Categories', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'not_found'                  => sprintf(
				__( 'No %s Categories found.', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			'no_terms'                   => sprintf(
				__( 'No %s Categories', 'builder-template-categories' ),
				ddw_btc_string_default_content_type()
			),
			//'items_list'                 => __( 'Items list', 'builder-template-categories' ),
			//'items_list_navigation'      => __( 'Items list navigation', 'builder-template-categories' ),
		)
	);

	/** Set taxonomy args, filterable */
	$args = apply_filters(
		'btc/filter/taxonomy/args',
		array(
			'labels'            => $tax_labels,	//ddw_btc_get_taxonomy_labels(),
			'hierarchical'      => TRUE,
			'public'            => FALSE,
			'show_ui'           => TRUE,
			'show_admin_column' => TRUE,
			'show_in_nav_menus' => FALSE,
			'show_tagcloud'     => FALSE,
			'show_in_rest'      => FALSE,
			'description'       => __( 'Template Categories for templates of Page Builders or similar libraries', 'builder-template-categories' )
		)
	);

	/** Finally, register the taxonomy */
	register_taxonomy(
		'builder-template-category',
		array(),	//'btc-custom-post-type',
		$args
	);

}  // end function


//add_action( 'init', 'ddw_btc_add_predefined_terms', 25 );
/**
 * Add predefined taxonomy terms for our taxonomy.
 *   Terms: General, Frontpage, Pages, Landing Pages, Sections, Hooks, Testing
 *
 * @since 1.0.0
 * @since 1.1.0 Added optional terms for products, as well as popups.
 *
 * @uses  wp_insert_term()
 */
function ddw_btc_add_predefined_terms() {

	/** Set taxonomy */
	$taxonomy = 'builder-template-category';

	/** Set predefined terms, filterable */
	$terms = array(

		'0' => array(
			'name'        => esc_attr_x( 'General', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'general', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'General templates', 'Taxonomy term description', 'builder-template-categories' ),
		),
		'1' => array(
			'name'        => esc_attr_x( 'Frontpage', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'frontpage', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for the Frontpage/ Homepage', 'Taxonomy term description', 'builder-template-categories' ),
		),
		'2' => array(
			'name'        => esc_attr_x( 'Pages', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'pages', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for Pages', 'Taxonomy term description', 'builder-template-categories' ),
		),
		'3' => array(
			'name'        => esc_attr_x( 'Landing Pages', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'landing-pages', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for Landing Pages', 'Taxonomy term description', 'builder-template-categories' ),
		),
		'4' => array(
			'name'        => esc_attr_x( 'Sections', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'sections', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for Sections/ Content Blocks', 'Taxonomy term description', 'builder-template-categories' ),
		),
		'5' => array(
			'name'        => esc_attr_x( 'Hooks', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'hooks', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for Action Hooks', 'Taxonomy term description', 'builder-template-categories' ),
		),
		'6' => array(
			'name'        => esc_attr_x( 'Testing', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'testing', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates just for testing purposes', 'Taxonomy term description', 'builder-template-categories' ),
		),

	);  // end array

	/** Optional: WooCommerce product type templates */
	if ( class_exists( 'WooCommerce' ) && has_filter( 'btc/filter/is_type/woo' ) ) {

		$terms[ 'terms_woo' ] = array(
			'name'        => esc_attr_x( 'Products', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'products', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for WooCommerce products', 'Taxonomy term description', 'builder-template-categories' ),
		);

	}  // end if

	/** Optional: Popup type templates */
	if ( has_filter( 'btc/filter/is_type/popup' ) ) {

		$terms[ 'terms_popup' ] = array(
			'name'        => esc_attr_x( 'Popups', 'Taxonomy term title', 'builder-template-categories' ),
			'slug'        => sanitize_key( _x( 'popups', 'Taxonomy term slug - only lowercase, a-z, 0-9, hyphens!', 'builder-template-categories' ) ),
			'description' => _x( 'Templates for Popups/ Modal Windows', 'Taxonomy term description', 'builder-template-categories' ),
		);

	}  // end if

	/** Make terms array filterable */
	$terms = apply_filters(
		'btc/filter/taxonomy/predefined_terms',
		$terms
	);

	/** Insert all predefined terms */
	foreach ( $terms as $term_key => $term ) {

		if ( ! term_exists( $term[ 'slug' ], 'builder-template-category' ) ) {

			wp_insert_term(
				$term[ 'name' ],
				$taxonomy,
				array(
					'description' => $term[ 'description' ],
					'slug'        => $term[ 'slug' ],
				)
			);

			unset( $term );

		}  // end if

	}  // end foreach

}  // end function