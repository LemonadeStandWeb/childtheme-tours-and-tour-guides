<?php
/*
Template name: Tour Category Archive Page
*/
?>

<?php get_template_part('templates/parts/ls-cpt-header'); ?>

<main id="main" class="<?php flatsome_main_classes(); ?>">

    <?php do_action('flatsome_before_page'); ?>

    <div id="content" role="main">

        <?php

        function ls_display_tour_guide_picture($tour_guide): string
        {
            $tour_guide_image = get_field('ls_tour_guides_profile_picture', $tour_guide->ID);
            $tour_guide_link = get_permalink($tour_guide->ID);

            return '[ux_image id="' . $tour_guide_image . '" width="60" link="' . $tour_guide_link . '"]';
        }

        $term_id = get_queried_object_id();

        $ls_tours_category_hero_ux_block = get_field('ls_tours_category_hero_ux_block', 'term_' . $term_id);
        $ls_tours_category_after_tours_ux_block = get_field('ls_tours_category_after_tours_ux_block', 'term_' . $term_id);

        // Display the hero section
        echo do_shortcode($ls_tours_category_hero_ux_block);

        // Opening shortcode tags
        $shortcodes =  '[section padding="50px"]';
        $shortcodes .= '[gap height="40px"]';
        $shortcodes .= '[row h_align="center"]';
        $shortcodes .= '[col span__sm="12" span__md="11"]';

        // Display 'Date', 'Guide', and 'Destination' titles in their respective columns
        $shortcodes .= '[row_inner label="TOURS ROW - TOURS PAGE" style="collapse" h_align="center" visibility="hide-for-small"]';
        $shortcodes .= '[col_inner span="3" span__sm="12" span__md="3" padding="0px 40px 0px 0px"]';
        $shortcodes .= '<h3 class="mb-0">Date</h3>';
        $shortcodes .= '[divider width="100%" height="1px"]';
        $shortcodes .= '[/col_inner]';
        $shortcodes .= '[col_inner span="2" span__sm="12" span__md="3" padding="0px 20px 0px 0px"]';
        $shortcodes .= '<h3 class="mb-0">Guide</h3>';
        $shortcodes .= '[divider width="100%" height="1px"]';
        $shortcodes .= '[/col_inner]';
        $shortcodes .= '[col_inner span="7" span__sm="12" span__md="6" padding="0px 0px 0px 20px"]';
        $shortcodes .= '<h3 class="mb-0"> Destination </h3>';
        $shortcodes .= '[divider width="100%" height="1px"]';
        $shortcodes .= '[/col_inner]';
        $shortcodes .= '[/row_inner]';
        ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php

            /**
             * Fetch 1 tour guide assigned to the tour
             *
             * @return array An array of tour guide posts.
             */
            $ls_tour_guides = get_posts(array(
                'post_type'      => 'tour_guides',
                'posts_per_page' => 1,
                'meta_query'     => array(
                    array(
                        'key'     => 'ls_tour_guides_assigned_tours',
                        'value'   => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE'
                    )
                )
            ));

            if ( ! empty ( $ls_tour_guides ) && is_array( $ls_tour_guides ) ) {
                $first_tour_guide = $ls_tour_guides[0];
            } else {
                $first_tour_guide = null;
            }

            if ( $first_tour_guide ) {
                $tour_guide_shortcodes = ls_display_tour_guide_picture($first_tour_guide);
            } else {
                $tour_guide_shortcodes = '<p>Please assign a tour guide to this tour.</p>';
            }

            // Fetch the post variables
            $ls_tours_name                 = get_field('ls_tours_name');
            $ls_tours_hero_image           = get_field('ls_tours_hero_image');
            $ls_tours_start_date           = get_field('ls_tours_start_date');
            $ls_tours_end_date             = get_field('ls_tours_end_date');
            $ls_tours_start_date_month_day = date('M j', strtotime($ls_tours_start_date));
            $ls_tours_end_date_month_day   = date('M j', strtotime($ls_tours_end_date));
            $ls_tours_year                 = date('Y', strtotime($ls_tours_start_date));
            $ls_tours_link                 = get_permalink(get_the_ID());
            $ls_tours_ID                   = get_the_ID();
            $ls_tours_wetravel_button_script = get_field('ls_tours_wetravel_button_script');

            $shortcodes .= '[row_inner label="TOURS ROW - TOURS PAGE" h_align="center"]';
            $shortcodes .= '[col_inner span="3" span__sm="12" span__md="3"]';

            // Display the tour year
            if ( ! empty ( $ls_tours_year ) ) {
                $shortcodes .= '[ux_text font_size="2"]';
                $shortcodes .= '<h6 class="mb-0"><span data-text-color="primary">' . $ls_tours_year . '</span></h6>';
                $shortcodes .= '[/ux_text]';
            }

            // Display start and end days for the tour
            $shortcodes .= '[ux_text font_size="1.5" font_size__sm="1.2" line_height="0.75"]';
            if ( ! empty ( $ls_tours_start_date_month_day ) && ! empty ( $ls_tours_end_date_month_day) ) {
                $shortcodes .= '<h3 class="mb-0 uppercase">' . $ls_tours_start_date_month_day . ' - ' . $ls_tours_end_date_month_day . '</h3>';
            } else {
                $shortcodes .= '<h3 class="mb-0 uppercase">COMING</br>SOON</h3>';
            }
            $shortcodes .= '[/ux_text]';

            $shortcodes .= '[gap height="20px"]';

            //TODO: Conditional check for future ACF field ("Is this a new tour?")
            $shortcodes .= '[ux_text font_size="0.8" visibility="hidden"]';
            $shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding:6px"><b>New Tour</b></span></p>';
            $shortcodes .= '[/ux_text]';

            $shortcodes .= '[/col_inner]';

            $shortcodes .= '[col_inner span="2" span__sm="12" span__md="3"]';
            //TODO: Conditional check if tour guide is available
            $shortcodes .= $tour_guide_shortcodes;
            $shortcodes .= '[/col_inner]';

            $shortcodes .= '[col_inner span="7" span__sm="12" span__md="6"]';
            $shortcodes .= '[row_inner_1]';
            $shortcodes .= '[col_inner_1 span="8" span__sm="12" span__md="12"]';

            //TODO: See if conditional check here is needed
            $shortcodes .= '<h2 class="mb-0"><a href="' . $ls_tours_link . '">' . $ls_tours_name . '</a></h2>';
            $shortcodes .= '[button text="View Itinerary" color="white" style="link" link="' . $ls_tours_link . '"]';

            //TODO: Pull in WeTravel script
            $shortcodes .= '[ux_html]';
            $shortcodes .= $ls_tours_wetravel_button_script;
            $shortcodes .= '[/ux_html]';

            $shortcodes .= '[/col_inner_1]';

            $shortcodes .= '[col_inner_1 span="4" span__sm="12" span__md="12" force_first="medium"]';
            if( ! empty ( $ls_tours_hero_image) ){
                $shortcodes .= '[ux_image id="' . $ls_tours_hero_image . '"]';
            }
            $shortcodes .= '[/col_inner_1]';

            $shortcodes .= '[/row_inner_1]';
            $shortcodes .= '[/col_inner]';
            $shortcodes .= '[/row_inner]';
            ?>
        <?php endwhile; ?>

        <?php

        // Closing shortcode tags
        $shortcodes .= '[/col]';
        $shortcodes .= '[/row]';
        $shortcodes .= '[/section]';

        // Display the tours
        echo do_shortcode($shortcodes);

        // Display the after tours section
        echo do_shortcode($ls_tours_category_after_tours_ux_block);

        // Display the CTA section
        echo do_shortcode('[block id="35"]');
        ?>

    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>
