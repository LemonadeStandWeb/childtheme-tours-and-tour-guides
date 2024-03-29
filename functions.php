<?php

// Custom Post Types
include( 'inc/ls-custom-post-types/ls-cpt-tours.php' );
include( 'inc/ls-custom-post-types/ls-cpt-tour-guides.php' );

// Disable WordPress Administration email verification prompt 
add_filter( 'admin_email_check_interval', '__return_false' );

//Remove Gravity Forms Label "* Indicates Required"
add_filter( 'gform_required_legend', '__return_empty_string' );

// Adjust permalink structure for the custom post types
function ls_tours_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'tours' ){
        $terms = wp_get_object_terms( $post->ID, 'tour-category' );
        // If terms are assigned to the post, search and replace the category with the correct slug followed by post link
        if( $terms ){
            return str_replace( '%tour-category%' , $terms[0]->slug , $post_link );
        // If no terms are assigned to the post, replace the category with the default slug followed by post link
        } else{
            return str_replace( '/tours/%tour-category%' , '/tours' , $post_link );
        }
    }
    return $post_link;
}

add_filter( 'post_type_link', 'ls_tours_permalinks', 1, 2 );
