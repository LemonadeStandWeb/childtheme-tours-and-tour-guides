<?php
/*
Template name: Tour Guides Single
*/ ?>

<!-- Bring in the transparent header with light text -->
<?php get_template_part('templates/parts/ls-cpt-header'); ?>

<main id="main" class="<?php flatsome_main_classes(); ?>">

    <?php do_action('flatsome_before_page'); ?>

    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php
            /**
             * Display Tour Guide info and tours. 
             * 
             * Uses ACF fields from Tour Guides field group. Loops through the tour guide's
             * assigned tours and displays them.
             */

            // Grab ACF fields from Tour Guides field group
            $ls_tour_guides_first_name                = get_field( 'ls_tour_guides_first_name' );
            $ls_tour_guides_last_name                 = get_field( 'ls_tour_guides_last_name' );
            $ls_tour_guides_profile_picture           = get_field( 'ls_tour_guides_profile_picture' );
            $ls_tour_guides_bio                       = get_field( 'ls_tour_guides_bio' );
            $ls_tour_guides_primary_cta_button_text   = get_field( 'ls_tour_guides_primary_cta_button_text' );
            $ls_tour_guides_primary_cta_button_url    = get_field( 'ls_tour_guides_primary_cta_button_url' );
            $ls_tour_guides_secondary_cta_button_text = get_field( 'ls_tour_guides_secondary_cta_button_text' );
            $ls_tour_guides_secondary_cta_button_url  = get_field( 'ls_tour_guides_secondary_cta_button_url' );
            $ls_tour_guides_video_button_url          = get_field( 'ls_tour_guides_video_button_url' );
            $ls_tour_guides_read_more_button_url      = get_field( 'ls_tour_guides_read_more_button_url' );
            $ls_tour_guides_assigned_tours            = get_field( 'ls_tour_guides_assigned_tours' );

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

            // Add the primary CTA button if the text and link are both present
            if ( ! empty( $ls_tour_guides_primary_cta_button_text && $ls_tour_guides_primary_cta_button_url ) ) {
                $shortcodes .= '[button text="' . $ls_tour_guides_primary_cta_button_text . '" padding="7px 30px 7px 30px" link="' . $ls_tour_guides_primary_cta_button_url . '" target="_blank"]';
            }

            // Add the secondary CTA button if the text and link are both present
            if ( ! empty( $ls_tour_guides_secondary_cta_button_text && $ls_tour_guides_secondary_cta_button_url ) ) {
                $shortcodes .= '[button text="' . $ls_tour_guides_secondary_cta_button_text . '" color="white" style="outline" padding="7px 30px 7px 30px" link="' . $ls_tour_guides_secondary_cta_button_url . '" target="_blank"]';
            }
        
            // Display Assigned Tours if any
            if( $ls_tour_guides_assigned_tours ) {
                
                $shortcodes .= '<h4 class="mb-half">Scheduled Trips</h4>';
                $shortcodes .= '[divider width="100%" height="1px" margin="0.4em"]';

                // Loop through each assigned tour and display them
                foreach( $ls_tour_guides_assigned_tours as $tour ) {
                    $ls_tours_name                   = get_field( 'ls_tours_name', $tour->ID );
                    $ls_tours_post_link              = get_permalink( $tour->ID );
                    $ls_tours_wetravel_button_script = get_field('ls_tours_wetravel_button_script', $tour->ID);
                    $ls_tours_start_date             = new DateTime(get_field('ls_tours_start_date', $tour->ID));
                    $ls_tours_end_date               = new DateTime(get_field('ls_tours_end_date', $tour->ID));

                    // Format the date to match the original design ( M d - M d, Y )
                    $ls_tours_formatted_start_date = $ls_tours_start_date->format('M d');
                    $ls_tours_formatted_end_date = $ls_tours_end_date->format('M d, Y');

                    $shortcodes .= '[row_inner label="TOUR ROW - GUIDE PAGE" h_align="center"]';
                    $shortcodes .= '[col_inner span="6" span__sm="12" class="pb-0"]';
                    $shortcodes .= '[ux_text font_size="1.5"]';
                    $shortcodes .= '<h6 class="mb-0">' . $ls_tours_formatted_start_date . ' - ' . $ls_tours_formatted_end_date . '</h6>';
                    $shortcodes .= '[/ux_text]';
                    $shortcodes .= '[gap height="20px"]';
                    $shortcodes .= '[ux_text font_size="0.75" visibility="hidden"]';
                    $shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding:4px"><b>New Tour</b></span></p>';
                    $shortcodes .= '[/ux_text]';
                    $shortcodes .= '[/col_inner]';
                    $shortcodes .= '[col_inner span="6" span__sm="12" class="pb-0"]';
                    $shortcodes .= '<h2 class="mb-0"><a href="' . $ls_tours_post_link . '">' . $ls_tours_name . '</a></h2>';
                    $shortcodes .= '[button text="View Itinerary" color="white" style="link" size="small" link="' . $ls_tours_post_link . '"]';
                    $shortcodes .= '[ux_html]';
                    $shortcodes .= $ls_tours_wetravel_button_script;
                    $shortcodes .= '[/ux_html]';
                    $shortcodes .= '[/col_inner]';
                    $shortcodes .= '[/row_inner]';
                    
                }
            }

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