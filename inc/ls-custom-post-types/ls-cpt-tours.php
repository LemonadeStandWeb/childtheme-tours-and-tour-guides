<?php 
function ls_create_tours() {
	$labels = array(
		'name'                => 'Tours',
		'singular_name'       => 'Tour',
		'add_new'             => 'Add Tour',
		'all_items'           => 'All Tours',
		'add_new_item'        => 'Add New Tour',
		'edit_item'           => 'Edit Tour',
		'new_item'	          => 'New Tour',
		'view_item'           => 'View Tour',
		'search_items'        => 'Search Tours',
		'not_found'           => 'No Tours found',
		'not_found_in_trash'  => 'No Tours found in Trash',
		'parent_item_colon'   => 'Parent Tour:',
		'menu_name'           => 'Tours',
		'update_item'         => 'Update Tour',	
	);

	$args = array(
		'label'               => 'Tours',
		'description'         => 'Tours post type',
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => false,
		'publicly_queryable'  => true,
		'query_var' 	      => true,
		//TODO: Update rewrite to tours/%tour-category%
		'rewrite'			  => array( 'slug' => 'tours/%tour-category%' ),
		'capability_type'	  => 'post',	
		'hierarchical'        => false,	
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor' ),
		'taxonomies'		  => array( 'tour-category' ),
		'menu_position'       => 6,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'show_in_rest'		  => true,	
		'menu_icon' => 'dashicons-clipboard',
	);

	register_post_type( 'tours', $args );
}
add_action( 'init', 'ls_create_tours', 0 );


//Tour Type
function ls_create_tour_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Tour Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Tour Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Tour Categories', 'textdomain' ),
		'all_items'         => __( 'All Tour Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Tour Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Tour Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Tour Category', 'textdomain' ),
		'update_item'       => __( 'Update Tour Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Tour Category', 'textdomain' ),
		'new_item_name'     => __( 'New Tour Category Name', 'textdomain' ),
		'menu_name'         => __( 'Tour Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tour-category' ), 
		'show_in_rest' => true,
	);

	register_taxonomy( 'tour-category', array( 'tours' ), $args ); 
}
add_action( 'init', 'ls_create_tour_taxonomies', 0 );
