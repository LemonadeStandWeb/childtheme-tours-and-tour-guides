<?php

// Include custom post types
include( 'inc/ls-custom-post-types/ls-cpt-tours.php');
include( 'inc/ls-custom-post-types/ls-cpt-tour-guides.php');

// Shortcodes
include( 'inc/ls-shortcodes/ls-shortcodes-category-cards.php');

// Disable WordPress Administration email verification prompt
add_filter( 'admin_email_check_interval', '__return_false' );

//Remove Gravity Forms Label "* Indicates Required"
add_filter( 'gform_required_legend', '__return_empty_string' );

/*
 * Custom permalink structure for tour posts
 *
 * This function modifies the permalink structure for tour posts to include
 * the category slug before the post name. For example, a tour post with the
 * slug "my-tour" in the category "israel-tours" will then be israel-tours/my-tour/.
 */
function ls_tour_permalink_structure( $post_link, $post ) {
    // Check if the post is a tour post
    if ( is_object( $post ) && $post->post_type == 'tours' ) {
        // Get the first term from the "tour-category" taxonomy
        $terms = wp_get_object_terms( $post->ID, 'tour-category' );
        // If the term exists, construct the new permalink structure
        if ( $terms && ! is_wp_error( $terms ) && ! empty( $terms ) ) {
            // Return the new permalink structure with the category slug
            return home_url( '/' . $terms[0]->slug . '/' . $post->post_name . '/' );
        }
    }
    // Return the default permalink structure for other post types
    return $post_link;
}
add_filter( 'post_type_link', 'ls_tour_permalink_structure', 10, 2 );

/*
 * Add rewrite rules for tour posts
 *
 * This function adds a rewrite rule that captures URLs with the structure
 * "category-slug/post-name/" and maps them to the "tours" custom post type.
 * A URL like "israel-tours/my-tour/" will be internally rewritten to query
 * the "tours" post with the slug "my-tour".
 */
function ls_add_tour_rewrite_rules() {
    add_rewrite_rule(
        // Regular expression to capture URLs with two segments
        '^([^/]+)/([^/]+)/?$',
        // Internal query to fetch the "tours" post type with the second segment as post name
        'index.php?tours=$matches[2]',
        // Priority of the rule (add at the top of the list)
        'top'
    );
}
add_action( 'init', 'ls_add_tour_rewrite_rules' );

/*
 * Add rewrite rules for tour category archives
 *
 * This function adds rewrite rules for each term in the "tour-category" taxonomy.
 * It ensures that URLs with the structure "category-slug/" will correctly query
 * the taxonomy and display the corresponding archive page.
 */
function ls_tour_category_rewrite_rules() {
    // Get all terms from the "tour-category" taxonomy
    $taxonomies = array('tour-category');
    // Loop through each taxonomy and get all terms
    foreach ($taxonomies as $taxonomy) {
        $terms = get_terms(array(
            // Specify the taxonomy to get terms from
            'taxonomy' => $taxonomy,
            // Get all terms, including those without posts
            'hide_empty' => false,
        ));

        // Loop through each term and add a rewrite rule for it
        foreach ($terms as $term) {
            add_rewrite_rule(
                // Regular expression to capture URLs with the term slug
                '^' . $term->slug . '/?$',
                // Internal query to fetch the taxonomy term
                'index.php?taxonomy=' . $taxonomy . '&term=' . $term->slug,
                // Priority of the rule (add at the top of the list)
                'top'
            );
        }
    }
}
add_action( 'init', 'ls_tour_category_rewrite_rules' );
