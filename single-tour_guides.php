<?php
/*
Template name: Tour Guides Single
*/ ?>

<!-- Bring in the transparent header with light text -->
<?php get_template_part('templates/parts/ls-cpt-header'); ?>

<?php do_action('flatsome_after_header'); ?>

<main id="main" class="<?php flatsome_main_classes(); ?>">

    <?php do_action('flatsome_before_page'); ?>

    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php

            /**
             * Display Tour Guide info and tours. 
             * Uses ACF fields from both Tour Guides & Tours ACF Field Groups.
             */

            // Grab ACF fields from Tour Guides field group
            $ls_tour_guides_first_name = get_field( 'ls_tour_guides_first_name' );
            $ls_tour_guides_last_name = get_field( 'ls_tour_guides_last_name' );
            $ls_tour_guides_profile_picture = get_field ( 'ls_tour_guides_profile_picture' );
            $ls_tour_guides_bio = get_field( 'ls_tour_guides_bio' );
            $ls_tour_guides_video_button_url = get_field( 'ls_tour_guides_video_button_url' );
            $ls_tour_guides_read_more_button_url = get_field( 'ls_tour_guides_read_more_button_url' );
            $ls_tour_guides_assigned_tours = get_field( 'ls_tour_guides_assigned_tours' );

            // Begin Shortcodes
            $shortcodes = '';
            $shortcodes .= '[gap height="30px"]';
            $shortcodes .= '[row style="collapse"]';

            // Tour Guide Profile Picture
            $shortcodes .= '[col span="3" span__sm="12"]';
            $shortcodes .= '[ux_image id="' . $ls_tour_guides_profile_picture . '"]';
            $shortcodes .= '[/col]';
        
            // Tour Guide Name and Bio
            $shortcodes .= '[col span="9" span__sm="12" padding="0px 0px 0px 50px" padding__sm="0px 20px 0px 20px" color="light"]';
            $shortcodes .= '[ux_text font_size="1.15"]';
            $shortcodes .= '<h2>' . $ls_tour_guides_first_name . ' ' . $ls_tour_guides_last_name . '</h2>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[divider width="100%" height="1px"]';
            $shortcodes .= $ls_tour_guides_bio;

            // Add a video button if the URL is not empty
            if (!empty($ls_tour_guides_video_button_url)) {
                $shortcodes .= '[button text="Video of ' . $ls_tour_guides_first_name . '" padding="7px 30px 7px 30px" link="' . $ls_tour_guides_video_button_url . '" target="_blank"]';
            }

            // Add a read more button if the URL is not empty
            if (!empty($ls_tour_guides_read_more_button_url)) {
                $shortcodes .= '[button text="Read More About ' . $ls_tour_guides_first_name . '" color="white" style="outline" padding="7px 30px 7px 30px" link="' . $ls_tour_guides_read_more_button_url . '" target="_blank"]';
            }
        
            // Display Assigned Tours
            $shortcodes .= '<h4 class="mb-half">Scheduled Trips</h4>';
            $shortcodes .= '[divider width="100%" height="1px" margin="0.4em"]';
        
            $shortcodes .= '[row_inner label="TOUR ROW - GUIDE PAGE" h_align="center"]';
            $shortcodes .= '[col_inner span="6" span__sm="12" class="pb-0"]';
            $shortcodes .= '[ux_text font_size="1.5"]';
            $shortcodes .= '<h6 class="mb-0">NOV 22- DEC 1, 2024</h6>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[gap height="20px"]';
            $shortcodes .= '[ux_text font_size="0.75" visibility="hidden"]';
            $shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding:4px"><b>New Tour</b></span></p>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[/col_inner]';
            $shortcodes .= '[col_inner span="6" span__sm="12" class="pb-0"]';
            $shortcodes .= '<h2 class="mb-0"><a href="/tours/israel-itinerary-taylor-halverson-nov-22-dec-1-24">Israel Tour</a></h2>';
            $shortcodes .= '[button text="View Itinerary" color="white" style="link" size="small" link="/tours/israel-itinerary-taylor-halverson-nov-22-dec-1-24"]';
            $shortcodes .= '[ux_html]';
            $shortcodes .= '<button class="wtrvl-checkout_button" id="wetravel_button_widget" data-env=https://www.wetravel.com data-version="v0.3" data-uid="746955" data-uuid="89148139" href=https://www.wetravel.com/checkout_embed?uuid=89148139 style="display: inline-block; color:#daa425;border: 0px;border-radius: 0px;font-weight: 1000;font-size: 15px;-webkit-font-smoothing: antialiased;text-transform: uppercase;padding: 20px 30px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Book This Tour&emsp;<i class="icon-angle-right" aria-hidden="true"></i></button> <link href=https://fonts.googleapis.com/css?family=Poppins rel="stylesheet"> <script src=https://cdn.wetravel.com/widgets/embed_checkout.js></script>';
            $shortcodes .= '[/ux_html]';
            $shortcodes .= '[/col_inner]';
            $shortcodes .= '[/row_inner]';

            $shortcodes .= '[row_inner label="TOUR ROW - GUIDE PAGE" h_align="center"]';
            $shortcodes .= '[col_inner span="6" span__sm="12" class="pb-0"]';
            $shortcodes .= '[ux_text font_size="1.5"]';
            $shortcodes .= '<h6 class="mb-0">DEC 12- DEC 21, 2024</h6>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[gap height="20px"]';
            $shortcodes .= '[ux_text font_size="0.75" visibility="hidden"]';
            $shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding:4px"><b>New Tour</b></span></p>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[/col_inner]';
            $shortcodes .= '[col_inner span="6" span__sm="12" class="pb-0"]';
            $shortcodes .= '<h2 class="mb-0"><a href="/tours/israel-itinerary-taylor-halverson-dec-12-dec-21-24">Israel Tour</a></h2>';
            $shortcodes .= '[button text="View Itinerary" color="white" style="link" size="small" link="/tours/israel-itinerary-taylor-halverson-dec-12-dec-21-24"]';
            $shortcodes .= '[ux_html]';
            $shortcodes .= '<button class="wtrvl-checkout_button" id="wetravel_button_widget" data-env=https://www.wetravel.com data-version="v0.3" data-uid="746955" data-uuid="87928021" href=https://www.wetravel.com/checkout_embed?uuid=87928021 style="display: inline-block; color:#daa425;border: 0px;border-radius: 0px;font-weight: 1000;font-size: 15px;-webkit-font-smoothing: antialiased;text-transform: uppercase;padding: 20px 30px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Book This Tour&emsp;<i class="icon-angle-right" aria-hidden="true"></i></button> <link href=https://fonts.googleapis.com/css?family=Poppins rel="stylesheet"> <script src=https://cdn.wetravel.com/widgets/embed_checkout.js></script>';
            $shortcodes .= '[/ux_html]';
            $shortcodes .= '[/col_inner]';
            $shortcodes .= '[/row_inner]';


            $shortcodes .= '[/col]';
            $shortcodes .= '[/row]'; 
            $shortcodes .= '[gap height="40px"]';
            ?>

            <?php
            echo do_shortcode($shortcodes);
            wp_reset_postdata();
            ?>

        <?php endwhile;?>
    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>