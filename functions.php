<?php

// Custom Post Types
include( 'inc/ls-custom-post-types/ls-cpt-tours.php' );
include( 'inc/ls-custom-post-types/ls-cpt-tour-guides.php' );

// Shortcodes
include( 'inc/ls-shortcodes/ls-shortcodes-category-cards.php');

// Disable WordPress Administration email verification prompt 
add_filter( 'admin_email_check_interval', '__return_false' );

//Remove Gravity Forms Label "* Indicates Required"
add_filter( 'gform_required_legend', '__return_empty_string' );
