<?php
/*------------------------------------------------------------*\
    Register Tour Guides Custom Post Type
\*------------------------------------------------------------*/
function ls_create_tour_guides() {
    $labels = array(
        'name'                => 'Tour Guides',
        'singular_name'       => 'Tour Guide',
        'add_new'             => 'Add Tour Guide',
        'all_items'           => 'All Tour Guides',
        'add_new_item'        => 'Add New Tour Guide',
        'edit_item'           => 'Edit Tour Guide',
        'new_item'            => 'New Tour Guide',
        'view_item'           => 'View Tour Guide',
        'search_items'        => 'Search Tour Guides',
        'not_found'           => 'No Tour Guides found',
        'not_found_in_trash'  => 'No Tour Guides found in Trash',
        'parent_item_colon'   => 'Parent Tour Guide:',
        'menu_name'           => 'Tour Guides',
        'update_item'         => 'Update Tour Guide',
    );

    $args = array(
        'label'               => 'Tour Guides',
        'description'         => 'Tour Guides post type',
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => '/', 'with_front' => false ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor' ),
        'taxonomies'          => array( 'tour-guide-category' ),
        'menu_position'       => 6,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-clipboard',
    );

    register_post_type( 'tour_guides', $args );
}
add_action( 'init', 'ls_create_tour_guides', 0 );

/*------------------------------------------------------------*\
    Register Tour Guide Categories Taxonomy
\*------------------------------------------------------------*/
function ls_create_tour_guide_taxonomies() {
    $labels = array(
        'name'              => _x( 'Tour Guide Categories', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Tour Guide Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Tour Guide Categories', 'textdomain' ),
        'all_items'         => __( 'All Tour Guide Categories', 'textdomain' ),
        'parent_item'       => __( 'Parent Tour Guide Category', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Tour Guide Category:', 'textdomain' ),
        'edit_item'         => __( 'Edit Tour Guide Category', 'textdomain' ),
        'update_item'       => __( 'Update Tour Guide Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New Tour Guide Category', 'textdomain' ),
        'new_item_name'     => __( 'New Tour Guide Category Name', 'textdomain' ),
        'menu_name'         => __( 'Tour Guide Category', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => '/', 'with_front' => false ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'tour-guide-category', array( 'tour_guides' ), $args );
}
add_action( 'init', 'ls_create_tour_guide_taxonomies', 0 );
