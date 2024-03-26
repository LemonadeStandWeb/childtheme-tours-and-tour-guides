<?php
/*
Template name: Tour Single
*/
?>

<!-- Bring in the transparent header with light text -->
<?php get_template_part('templates/parts/ls-cpt-header'); ?>

<main id="main" class="<?php flatsome_main_classes(); ?>">

    <?php do_action('flatsome_before_page'); ?>

    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php
            /**
             * Trims the given tour guide bio to a specified limit and adds ellipsis if necessary.
             *
             * @param string $text The text to be trimmed.
             * @param int $limit The maximum number of characters to keep.
             * @param string $more_text The text to be appended if the original text is trimmed.
             * @return string The trimmed text.
             */
            function ls_tours_trim_bio($text, $limit = 100, $more_text = '...')
            {
                if (mb_strlen($text) > $limit) {
                    $text = mb_substr($text, 0, $limit);
                    $text = mb_substr($text, 0, mb_strrpos($text, ' '));
                    $text = $text . $more_text;
                }

                return $text;
            }

            /**
             * Displays the tour guides and their information.
             *
             * @param array $tour_guides An array of tour guide objects.
             * @return string The shortcode output of the tour guides' information.
             */
            function ls_tours_display_tour_guides($tour_guides)
            {
                $output = '';

                $output .= '[row_inner v_align="middle"]';

                if ($tour_guides) {
                    foreach ($tour_guides as $tour_guide) {
                        // Get the Tour Guide ACF fields
                        $ls_tour_guides_profile_picture = get_field('ls_tour_guides_profile_picture', $tour_guide->ID);
                        $ls_tour_guides_first_name      = get_field('ls_tour_guides_first_name', $tour_guide->ID);
                        $ls_tour_guides_last_name       = get_field('ls_tour_guides_last_name', $tour_guide->ID);
                        $ls_tour_guides_bio             = get_field('ls_tour_guides_bio', $tour_guide->ID);
                        $ls_tour_guides_trimmed_bio     = ls_tours_trim_bio($ls_tour_guides_bio, 200);

                        // 4 column that holds the tour guide profile picture
                        $output .= '[col_inner span="4" span__sm="12"]';
                        $output .= '[ux_image id="' . $ls_tour_guides_profile_picture . '" height="120%"]';
                        $output .= '[/col_inner]';

                        // 8 column that holds the tour guide information and link to profile
                        $output .= '[col_inner span="8" span__sm="12"]';
                        $output .= '<h3 class="mb-half">Tour Guide</h3>';
                        $output .= '[divider width="100%" height="1px" margin="0.4em"]';
                        $output .= '<h5 class="uppercase">' . $ls_tour_guides_first_name . ' ' . $ls_tour_guides_last_name . '</h5>';
                        $output .= '<p>' . $ls_tour_guides_trimmed_bio . '</p>';
                        $output .= '[button text="View Profile" style="link" size="small" icon="icon-angle-right" link="' . get_permalink($tour_guide->ID) . '"]';
                        $output .= '[/col_inner]';
                    }
                }

                $output .= '[/row_inner]';

                return $output;
            }

            /**
             * Displays a day by day itinerary for the tour.
             *
             * @return string The shortcode output of the itinerary.
             */
            function ls_tours_display_itinerary()
            {
                // Check ACF field that determines if all images are available for each tour day
                $images_available = get_field('ls_tours_do_we_have_images_for_each_tour_day');
                $output = '';

                // Check if the repeater field has been populated with any info
                if (have_rows('ls_tours_itinerary')) {

                    // Loop through each row of the repeater if info was found
                    while (have_rows('ls_tours_itinerary')) {
                        the_row();

                        // Fetch the ACF fields for this day that are common to both conditions (images available or not)
                        $day_date    = get_sub_field('ls_tours_repeater_date') ?: get_sub_field('ls_tours_itinerary_date'); // Fallback if repeater_date is not set
                        $day_date    = date('F j', strtotime($day_date));
                        $day_title   = get_sub_field('ls_tours_repeater_title');
                        $day_content = get_sub_field('ls_tours_repeater_content');

                        // Handle images based on availability
                        if ($images_available == 'yes') {
                            // Fetch the images from the subfield
                            $day_images = get_sub_field('ls_tours_repeater_images');
                            // If there are multiple images, display a slider
                            if (is_array($day_images) && count($day_images) > 1) {
                                $output .= '[ux_slider hide_nav="true" nav_style="reveal" nav_color="dark" bullets="false" timer="3000"]';
                                // Loop through each image and add it to the slider
                                foreach ($day_images as $day_image) {
                                    $output .= '[ux_banner height="40%" height__sm="80%" bg="' . $day_image['ID'] . '"][/ux_banner]';
                                }
                                // Close the slider
                                $output .= '[/ux_slider]';
                            } elseif (!empty($day_images)) {
                                // If there's only one image, display it without a slider
                                $output .= '[ux_banner height="40%" height__sm="80%" bg="' . $day_images[0]['ID'] . '"][/ux_banner]';
                            }
                        }

                        // Display date, title, and content
                        $output .= '<h3><span data-text-color="primary"><strong>' . $day_date . '</strong></span> - ' . $day_title . '</h3>';
                        $output .= '<p>' . $day_content . '</p>';

                        // Display additional information if available
                        $output .= ls_tours_display_additional_information(
                            get_sub_field('ls_tours_repeater_breakfast_lunch_and_dinner_included'),
                            get_sub_field('ls_tours_repeater_note_on_clothing'),
                            get_sub_field('ls_tours_repeater_estimated_drive_time'),
                            get_sub_field('ls_tours_repeater_estimated_walking_length')
                        );

                        $output .= '[gap height="80px"]';
                    }
                }

                return $output;
            }

            /**
             * Displays additional information for a tour day.
             *
             * @param string $meals The value of the "Breakfast, Lunch & Dinner Included" field.
             * @param string $clothing The note on clothing for the day.
             * @param string $drive_time The estimated drive time for the day.
             * @param string $walking_length The estimated walking length for the day.
             * @return string The HTML output of the additional information.
             */
            function ls_tours_display_additional_information($meals, $clothing, $drive_time, $walking_length)
            {
                $output = '';

                // Display the "Breakfast, Lunch & Dinner Included!" badge if all meals are included
                if ($meals == 'yes') {
                    $output .= '[ux_text font_size="0.8"]';
                    $output .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding: 6px;"><b>Breakfast, LUNCH &amp; dinner included!</b></span></p>';
                    $output .= '<p> </p>';
                    $output .= '[/ux_text]';
                }

                // Display additional information if available
                if ($clothing || $drive_time || $walking_length) {
                    $output .= '[gap height="19px"]';
                    $output .= '[row_inner col_style="divided"]';

                    // Display "Note on Clothing" if available
                    if (!empty($clothing)) {
                        $output .= '[col_inner span="4" span__sm="12"]';
                        $output .= '<h6>Note on clothing: </h6>';
                        $output .= '<p>' . $clothing . '</p>';
                        $output .= '[/col_inner]';
                    };

                    // Display "Estimated Drive Time" if available
                    if (!empty($drive_time)) {
                        $output .= '[col_inner span="4" span__sm="12"]';
                        $output .= '<h6>Estimated drive time:</h6>';
                        $output .= ' <p>' . $drive_time . '</p>';
                        $output .= '[/col_inner]';
                    };

                    // Display "Estimated Walking Length" if available
                    if (!empty($walking_length)) {
                        $output .= '[col_inner span="4" span__sm="12"]';
                        $output .= '<h6>Estimated walking length:</h6>';
                        $output .= '<p>' . $walking_length . '</p>';
                        $output .= '[/col_inner]';
                    };

                    $output .= '[/row_inner]';
                }

                return $output;
            }

            /**
             * Displays the content for "What's Included" and "What's Not Included" sections.
             *
             * @return string The shortcode output.
             */
            function ls_tours_display_whats_included()
            {
                // Fetch ACF fields for the included and not included items
                $included_items = get_field('ls_tours_whats_included');
                $not_included_items = get_field('ls_tours_whats_not_included');
                $output = '';

                $output .= '[row_inner style="collapse"]';
                $output .= '[col_inner span="12"]';

                // Display title
                $output .= '[ux_text font_size="1.4"]';
                $output .= '<h2>What\'s Included</h2>';
                $output .= '[/ux_text]';

                $output .= '[row_inner_1 col_style="divided"]';
                $output .= '[col_inner_1 span="9" span__sm="12"]';

                if (!empty($included_items)) {
                    // Display the title
                    $output .= '<h4><span data-text-color="primary">Included</span></h4>';

                    $output .= '<ul>';

                    // Loop through the ACF subfield within the repeater and display each item
                    foreach ($included_items as $included_item) {
                        $output .= '<li>' . $included_item['ls_tours_repeater_included_item'] . '</li>';
                    }

                    $output .= '</ul>';
                }

                if (!empty($not_included_items)) {
                    // Display the title
                    $output .= '<h4><span data-text-color="primary">What\'s Not Included</span></h4>';

                    $output .= '<ul>';

                    // Loop through the ACF subfield within the repeater and display each item
                    foreach ($not_included_items as $not_included_item) {
                        $output .= '<li>' . $not_included_item['ls_tours_repeater_item_not_included'] . '</li>';
                    }

                    $output .= '</ul>';
                }

                $output .= '[/col_inner_1]';
                $output .= '[/row_inner_1]';

                $output .= '<blockquote>';
                $output .= '<p>“Pack your bags, get your air tickets, and we\'ll take care of everything else!”</p>';
                $output .= '</blockquote>';

                $output .= '[/col_inner]';
                $output .= '[/row_inner]';

                return $output;
            }

            /**
             * Retrieves tour guides assigned to the current tour guide.
             *
             * @return array An array of tour guide posts.
             */
            $ls_tour_guides = get_posts(array(
                'post_type' => 'tour_guides',
                'meta_query' => array(
                    array(
                        'key' => 'ls_tour_guides_assigned_tours',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE'
                    )
                )
            ));

            /**
             * Display Tour information using ACF Fields.
             * 
             * 
             * @var string $ls_tours_name                                 ACF Text          The name of the tour guide.
             * @var string $ls_tours_hero_image                           ACF Image         The hero image of the tour guide.
             * @var string $ls_tours_do_we_have_the_tour_dates_available  ACF Radio Button  Indicates if the tour guide dates are available.
             * @var string $ls_tours_start_date                           ACF Date Picker   The start date of the tour guide.
             * @var string $ls_tours_end_date                             ACF Date Picker   The end date of the tour guide.
             * @var string $ls_tours_date_placeholder                     ACF Text          The placeholder for the tour guide date.
             * @var string $ls_tours_do_we_have_images_for_each_tour_day  ACF Radio Button  Indicates if there are images for each tour guide day.
             * @var string $ls_tours_itinerary                            ACF Repeater      The itinerary of the tour guide.
             * @var string $ls_tours_whats_included                       ACF Repeater      The list of what's included in the tour guide.
             * @var string $ls_tours_whats_not_included                   ACF Repeater      The list of what's not included in the tour guide.
             * @var string $ls_tours_price_per_person                     ACF Number        The price per person for the tour guide.
             * @var string $ls_tours_book_now_button_url                  ACF URL           The URL for the "Book Now" button.
             * @var string $ls_tours_single_supplement_price              ACF Number        The price for single supplement.
             * @var string $ls_tours_extensions                           ACF Repeater      The extensions available for the tour guide.
             * @var string $ls_tours_shortcodes                                             The shortcodes for the tour guide.
             */
            $ls_tours_name                                = get_field('ls_tours_name');
            $ls_tours_hero_image                          = get_field('ls_tours_hero_image');
            $ls_tours_do_we_have_the_tour_dates_available = get_field('ls_tours_do_we_have_the_tour_dates_available');
            $ls_tours_start_date                          = get_field('ls_tours_start_date');
            $ls_tours_start_date_modified                 = date('F j', strtotime($ls_tours_start_date));
            $ls_tours_end_date                            = get_field('ls_tours_end_date');
            $ls_tours_date_placeholder                    = get_field('ls_tours_date_placeholder');
            $ls_tours_do_we_have_images_for_each_tour_day = get_field('ls_tours_do_we_have_images_for_each_tour_day');
            $ls_tours_overview_content                    = get_field('ls_tours_overview_content');
            $ls_tours_itinerary                           = get_field('ls_tours_itinerary');
            $ls_tours_whats_included                      = get_field('ls_tours_whats_included');
            $ls_tours_whats_not_included                  = get_field('ls_tours_whats_not_included');
            $ls_tours_price_per_person                    = get_field('ls_tours_price_per_person');
            $ls_tours_book_now_button_url                 = get_field('ls_tours_book_now_button_url');
            $ls_tours_single_supplement_price             = get_field('ls_tours_single_supplement_price');
            $ls_tours_extensions                          = get_field('ls_tours_extensions');
            $ls_tours_current_tour_id                     = get_the_ID();
            $ls_tours_assigned_tour_guide                 = get_field('ls_tour_guides_assigned_tours', $ls_tours_current_tour_id);
            $ls_tours_shortcodes                          = '';

            // Build the Hero Section
            $ls_tours_shortcodes .= '[section bg="' . $ls_tours_hero_image . '" bg_overlay="rgba(0,0,0,.5)" bg_pos="4% 28%" dark="true" height="70vh"]';
            $ls_tours_shortcodes .= '[gap height="92px"]';
            $ls_tours_shortcodes .= '[row]';
            $ls_tours_shortcodes .= '[col span="6" span__sm="12"]';
            $ls_tours_shortcodes .= '[ux_text font_size="1.7"]';
            $ls_tours_shortcodes .= '<h1 class="mb-half">' . $ls_tours_name . '</h1>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px" color="rgba(255, 255, 255, 0.5)"]';
            $ls_tours_shortcodes .= '<h4>' . $ls_tours_start_date_modified . ' - ' . $ls_tours_end_date . '</h4>';
            $ls_tours_shortcodes .= '[/col]';
            $ls_tours_shortcodes .= '[/row]';
            $ls_tours_shortcodes .= '[/section]';

            // Overview Scroll-To
            $ls_tours_shortcodes .= '[scroll_to title="overview" bullet="false"]';

            // 4 Column Sticky Navigation
            $ls_tours_shortcodes .= '[section bg_color="rgb(24, 24, 24)" dark="true" padding="80px"]';
            $ls_tours_shortcodes .= '[gap height="33px"]';
            $ls_tours_shortcodes .= '[row]';
            $ls_tours_shortcodes .= '[col span="4" span__sm="12" span__md="10" class="sticky-column"]';
            $ls_tours_shortcodes .= '[row_inner class="sticky"]';
            $ls_tours_shortcodes .= '[col_inner span__sm="12"]';
            $ls_tours_shortcodes .= '<h3><a href="#overview">Overview</a></h3>';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px"]';
            $ls_tours_shortcodes .= '<h3><a href="#itinerary">Itinerary</a></h3>';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px"]';
            $ls_tours_shortcodes .= '<h3><a href="#whatsincluded">What\'s Included</a></p>';
            $ls_tours_shortcodes .= '</h3>';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px"]';
            $ls_tours_shortcodes .= '<h3><a href="#pricing">Pricing</a><br />';
            $ls_tours_shortcodes .= '</h3>';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px"]';
            $ls_tours_shortcodes .= '<h3><a href="#extensions">Extensions</a></p>';
            $ls_tours_shortcodes .= '</h3>';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px"]';
            $ls_tours_shortcodes .= '[ux_html]';
            $ls_tours_shortcodes .= '
            <button 
            class="wtrvl-checkout_button" 
            id="wetravel_button_widget" 
            data-env="https://www.wetravel.com 
            data-version="v0.3" 
            data-uid="746955" 
            data-uuid="89148139" 
            href=https://www.wetravel.com/checkout_embed?uuid=89148139 
            style="display:block; 
            color:#daa425;
            border: 0px;
            border-radius: 0px;    
            font-family: \'Playfair Display\', sans-serif;
            text-transform:capitalize;
            font-weight: 500;
            font-size: 25px;
            padding: 0;
            text-decoration: none;
            text-align: left; 
            cursor: pointer;">
            Book Now&emsp;
            </button> 
            <link href=https://fonts.googleapis.com/css?family=Poppins rel="stylesheet"> 
            <script src=https://cdn.wetravel.com/widgets/embed_checkout.js></script>';
            $ls_tours_shortcodes .= '[/ux_html]';
            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[/row_inner]';
            $ls_tours_shortcodes .= '[/col]';

            // 8 column Content
            $ls_tours_shortcodes .= '[col span="8" span__sm="12" padding="0px 0px 0px 50px"]';
            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';
            $ls_tours_shortcodes .= '<h2>Overview</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '<p>' . $ls_tours_overview_content . '</p>';
            $ls_tours_shortcodes .= '[gap height="15px"]';

            $ls_tours_shortcodes .= ls_tours_display_tour_guides($ls_tour_guides);

            $ls_tours_shortcodes .= '[gap height="100px"]';

            $ls_tours_shortcodes .= '[scroll_to title="itinerary" bullet="false"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';
            $ls_tours_shortcodes .= '<h2>Itinerary</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= ls_tours_display_itinerary();

            $ls_tours_shortcodes .= '[scroll_to title="whatsincluded" bullet="false"]';

            $ls_tours_shortcodes .= '[gap height="40px"]';

            $ls_tours_shortcodes .= ls_tours_display_whats_included();

            $ls_tours_shortcodes .= '[gap height="100px"]';

            // Pricing & Booking section
            $ls_tours_shortcodes .= '[scroll_to title="pricing" bullet="false"]';
            $ls_tours_shortcodes .= '[gap height="40px"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';
            $ls_tours_shortcodes .= '<h2>Pricing & Booking</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= '[row_inner col_style="divided"]';
            $ls_tours_shortcodes .= '[col_inner span="6" span__sm="12"]';

            $ls_tours_shortcodes .= '[ux_text font_size="2"]';
            $ls_tours_shortcodes .= '<h3 class="mb-0">$3,920</h3>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= '<h6>Per Person Plus Add-ons</h6>';

            $ls_tours_shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)"]';
            $ls_tours_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:6px"><b>Based on Double Occupancy</b></span></p>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= '<h6>$950 Single Supplement</h6>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[/row_inner]';

            $ls_tours_shortcodes .= '[ux_html]';
            $ls_tours_shortcodes .= '<button 
            class="wtrvl-checkout_button" 
            id="wetravel_button_widget" 
            data-env="https://www.wetravel.com" 
            data-version="v0.3" 
            data-uid="746955" 
            data-uuid="89148139" 
            href="https://www.wetravel.com/checkout_embed?uuid=89148139" 
            style="background-color:#daa425;
            color:#ffffff;
            border: 0px;
            border-radius: 5px;
            font-family: \'Poppins\', sans-serif;
            font-weight: 400;
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
            text-transform: capitalize;
            padding: 13px 24px;
            text-decoration: none;
            text-align: center;
            line-height: 14px;
            display: inline-block; 
            cursor: pointer;">Book Now
            </button> 
            <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
            <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>';
            $ls_tours_shortcodes .= '[/ux_html]';
            // End Pricing & Booking section

            // Extensions section
            $ls_tours_shortcodes .= '[row_inner style="collapse"]';
            $ls_tours_shortcodes .= '[col_inner span__sm="12"]';

            $ls_tours_shortcodes .= '[gap height="100px"]';

            $ls_tours_shortcodes .= '[scroll_to title="extensions" bullet="false"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';
            $ls_tours_shortcodes .= '<h2>Extensions</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= '<h4><em>You Can Add Any of These Extensions to Your Israel Tour Via the Book Now Link</em></h4>';
            $ls_tours_shortcodes .= '<h4><a href="https://travefy.com/trip/6yw9rqec4hasqz2aunu352vjewuuamq"><strong>3 Day Egypt Splendors</strong></a></h4>';
            $ls_tours_shortcodes .= '<p>Great Pyramids; Grand Egyptian Museum; Islamic Cairo</p>';
            $ls_tours_shortcodes .= '<p><em>$1,795 pp dbl occp</em></p>';
            $ls_tours_shortcodes .= '<h4><a href="https://travefy.com/trip/6yw9rqectxywqz2a7k9f5a4zs4g5laa"><strong>7 Day Egypt Ultimate Egypt</strong></a></h4>';
            $ls_tours_shortcodes .= '<p>Great Pyramids; Grand Egyptian Museum; Islamic Cairo; Luxury Nile Cruise; Aswan; Karnak; Luxor; Valley of the Kings.</p>';
            $ls_tours_shortcodes .= '<p><em>$3,695 pp dbl occp</em></p>';
            $ls_tours_shortcodes .= '<h4><a href="https://travefy.com/trip/6yw9rqectlbwqz2ayj3f63v2g2khyva"><strong>3 Day Jordan</strong></a></h4>';
            $ls_tours_shortcodes .= '<p>Jordan: Aqaba; Petra; Wadi Rum</p>';
            $ls_tours_shortcodes .= '<p><em>$1,795 pp dbl occp</em></p>';
            $ls_tours_shortcodes .= '<h4><a href="https://travefy.com/trip/6yw9rquea84wqz2am7f7vgl2wkffqcq"><strong>3 Day Jordan + 3 Day Egypt</strong></a></h4>';
            $ls_tours_shortcodes .= '<p>Jordan: Aqaba; Petra; Wadi Rum</p>';
            $ls_tours_shortcodes .= '<p>Egypt: Great Pyramids; Grand Egyptian Museum; Islamic or Christian Cairo.</p>';
            $ls_tours_shortcodes .= '<p><em>$3,590 pp dbl occp</em></p>';
            $ls_tours_shortcodes .= '<h4><a href="https://travefy.com/trip/6yw9rqkel9hsqz2ab6h56drdfsuflba"><strong>3 Day Jordan + 7 Day Egypt</strong></a></h4>';
            $ls_tours_shortcodes .= '<p>Jordan: Petra; Wadi Rum; Aqaba</p>';
            $ls_tours_shortcodes .= '<p>Egypt: Great Pyramids; Luxury Nile Cruise; Aswan; Karnak; Luxor; Valley of the Kings.</p>';
            $ls_tours_shortcodes .= '<p><em>$5,290 pp dbl occp</em></p>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[/row_inner]';
            // End Extensions section

            // Close 8 column content
            $ls_tours_shortcodes .= '[/col]';

            // Close the row that hold the 4 column sticky navigation and 8 column content
            $ls_tours_shortcodes .= '[/row]';

            // End of section with dynamic functionality
            $ls_tours_shortcodes .= '[/section]';

            $ls_tours_shortcodes .= '[scroll_to title="booktour" bullet="false"]';

            // CTA section
            $ls_tours_shortcodes .= '[section bg="211" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.58)" bg_pos="39% 23%" dark="true" padding="120px"]';

            $ls_tours_shortcodes .= '[gap height="33px"]';

            $ls_tours_shortcodes .= '[row v_align="middle"]';
            $ls_tours_shortcodes .= '[col span="6" span__sm="12"]';

            $ls_tours_shortcodes .= '[ux_text font_size="2.2"]';
            $ls_tours_shortcodes .= '<h2 class="mb-0">Book a Tour</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= '[gap height="10px"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.1"]';
            $ls_tours_shortcodes .= '<p>Find the perfect trip and book today - our expert guides are ready to give you a trip to remember full of engaging history and excitement.</p>';
            $ls_tours_shortcodes .= '[/ux_text]';

            $ls_tours_shortcodes .= '[button text="Tours" padding="7px 30px 7px 30px" link="/ls_tour_guides/"]';
            $ls_tours_shortcodes .= '[button text="Contact" color="white" style="outline" padding="7px 30px 7px 30px" link="/contact/"]';

            $ls_tours_shortcodes .= '[/col]';
            $ls_tours_shortcodes .= '[/row]';
            $ls_tours_shortcodes .= '[/section]';
            // End CTA section
            ?>

            <?php
            echo do_shortcode($ls_tours_shortcodes);
            wp_reset_postdata();
            ?>

        <?php endwhile; ?>
    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>