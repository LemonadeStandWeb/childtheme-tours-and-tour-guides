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
             * Display Tour information.
             * 
             * Uses ACF fields from the Tour field group. 
             * 
             * @var string $ls_tours_name                                 ACF Text          The name of the tour.
             * @var string $ls_tours_hero_image                           ACF Image         The hero image of the tour.
             * @var string $ls_tours_do_we_have_the_tour_dates_available  ACF Radio Button  Indicates if the tour dates are available.
             * @var string $ls_tours_start_date                           ACF Date Picker   The start date of the tour.
             * @var string $ls_tours_end_date                             ACF Date Picker   The end date of the tour.
             * @var string $ls_tours_date_placeholder                     ACF Text          The placeholder for the tour date.
             * @var string $ls_tours_do_we_have_images_for_each_tour_day  ACF Radio Button  Indicates if there are images for each tour day.
             * @var string $ls_tours_itinerary                            ACF Repeater      The itinerary of the tour.
             * @var string $ls_tours_whats_included                       ACF Repeater      The list of what's included in the tour.
             * @var string $ls_tours_whats_not_included                   ACF Repeater      The list of what's not included in the tour.
             * @var string $ls_tours_price_per_person                     ACF Number        The price per person for the tour.
             * @var string $ls_tours_book_now_button_url                  ACF URL           The URL for the "Book Now" button.
             * @var string $ls_tours_single_supplement_price              ACF Number        The price for single supplement.
             * @var string $ls_tours_extensions                           ACF Repeater      The extensions available for the tour.
             * @var string $ls_tours_shortcodes                                             The shortcodes for the tour.
             */
            $ls_tours_name                                = get_field('ls_tours_name');
            $ls_tours_hero_image                          = get_field('ls_tours_hero_image');
            $ls_tours_do_we_have_the_tour_dates_available = get_field('ls_tours_do_we_have_the_tour_dates_available');
            $ls_tours_start_date                          = get_field('ls_tours_start_date');
            $ls_tours_end_date                            = get_field('ls_tours_end_date');
            $ls_tours_date_placeholder                    = get_field('ls_tours_date_placeholder');
            $ls_tours_do_we_have_images_for_each_tour_day = get_field('ls_tours_do_we_have_images_for_each_tour_day');
            $ls_tours_itinerary                           = get_field('ls_tours_itinerary');
            $ls_tours_whats_included                      = get_field('ls_tours_whats_included');
            $ls_tours_whats_not_included                  = get_field('ls_tours_whats_not_included');
            $ls_tours_price_per_person                    = get_field('ls_tours_price_per_person');
            $ls_tours_book_now_button_url                 = get_field('ls_tours_book_now_button_url');
            $ls_tours_single_supplement_price             = get_field('ls_tours_single_supplement_price');
            $ls_tours_extensions                          = get_field('ls_tours_extensions');
            $ls_tours_shortcodes                          = '';

            // Begin Shortcodes
            $ls_tours_shortcodes .= '[section bg="305" bg_overlay="rgba(0,0,0,.5)" bg_pos="4% 28%" dark="true" height="70vh"]';
            $ls_tours_shortcodes .= '[gap height="92px"]';

            $ls_tours_shortcodes .= '[row]';

            $ls_tours_shortcodes .= '[col span="6" span__sm="12"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.7"]';

            $ls_tours_shortcodes .= '<h1 class="mb-half">Israel Tour With Taylor Halverson</h1>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px" color="rgba(255, 255, 255, 0.5)"]';

            $ls_tours_shortcodes .= '<h4>November 22 - December 1, 2024</h4>';

            $ls_tours_shortcodes .= '[/col]';

            $ls_tours_shortcodes .= '[/row]';

            $ls_tours_shortcodes .= '[/section]';
            $ls_tours_shortcodes .= '[scroll_to title="overview" bullet="false"]';

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
            $ls_tours_shortcodes .= '</h3>;';
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
            $ls_tours_shortcodes .= '[col span="8" span__sm="12" padding="0px 0px 0px 50px"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';

            $ls_tours_shortcodes .= '<h2>Overview</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '<p>This Israel Tour is designed and led by Dr. Taylor Halverson, a world class tour leader with experience leading tours to Israel for three decades.</p>
            <p>Immerse yourself in the world of Jesus Christ and the New Testament together with the vibrant sites and sounds of the living cultures of the Holy Land today.</p>
            <p><em>[Note: This is a very active tour. You\'ll need to be comfortable and capable of walking 3-5 miles in a day, climbing up and down stairs and hills unassisted, and walking on uneven surfaces.]</em></p>';
            $ls_tours_shortcodes .= '[gap height="15px"]';

            $ls_tours_shortcodes .= '[row_inner v_align="middle"]';

            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '[ux_image id="328" height="120%"]';


            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[col_inner span="8" span__sm="12"]';

            $ls_tours_shortcodes .= '<h3 class="mb-half">Tour Guide</h3>';
            $ls_tours_shortcodes .= '[divider width="100%" height="1px" margin="0.4em"]';

            $ls_tours_shortcodes .= '<h5 class="uppercase">Taylor Halverson</h5>';
            $ls_tours_shortcodes .= '<p>Taylor Halverson is a world class tour leader. He\'s led tour groups to countries around the world (including the Middle East, Central America, India, China, and Europe). He’s been traveling to and studying the Holy Land and the Bible for three decades.</p>
            [button text="View Profile" style="link" size="small" icon="icon-angle-right" link="/our-guides/taylor-halverson"]';


            $ls_tours_shortcodes .= '[/col_inner]';

            $ls_tours_shortcodes .= '[/row_inner]';
            $ls_tours_shortcodes .= '[gap height="100px"]';

            $ls_tours_shortcodes .= '[scroll_to title="itinerary" bullet="false"]';

            $ls_tours_shortcodes .= '[gap height="40px"]';

            $ls_tours_shortcodes .= '[gap height="40px"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';

            $ls_tours_shortcodes .= '<h2>Itinerary</h2>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '[ux_image id="331" height="40%"]';

            $ls_tours_shortcodes .= '<h3><span data-text-color="primary"><strong>November 22</strong></span> - Fly to Israel</h3>';
            $ls_tours_shortcodes .= '<h6>Highlights:</h6>';
            $ls_tours_shortcodes .= '<p>Tel Aviv, Ben Gurion Airport (No meals included)</p>';
            $ls_tours_shortcodes .= '[gap height="80px"]';

            $ls_tours_shortcodes .= '[ux_slider hide_nav="true" nav_style="reveal" nav_color="dark" bullets="false" timer="3000"]';

            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="333"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1025"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1026"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1027"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1028"]';


            $ls_tours_shortcodes .= '[/ux_banner]';

            $ls_tours_shortcodes .= '[/ux_slider]';
            $ls_tours_shortcodes .= '<h3><span data-text-color="primary"><strong>November 23</strong></span> - Flights Arrive in Tel Aviv, Israel</h3>';
            $ls_tours_shortcodes .= '<p>Schedule your flights to arrive in Tel Aviv the afternoon or evening of November 23.</p>';
            $ls_tours_shortcodes .= '<p>Transfers to hotel (Crown Plaza or similar). Relax at the beach or otherwise unwind. (Dinner included)</p>';
            $ls_tours_shortcodes .= '[ux_text font_size="0.8"]';

            $ls_tours_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding: 6px;"><b>Breakfast, LUNCH &amp; dinner included!</b></span></p>';
            $ls_tours_shortcodes .= '<p> </p>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '[gap height="19px"]';

            $ls_tours_shortcodes .= '[row_inner col_style="divided"]';

            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Note on clothing: </h6>';
            $ls_tours_shortcodes .= '<p>Shorts ok today</p>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Estimated drive time:</h6>';
            $ls_tours_shortcodes .= ' <p>45 minutes</p>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Estimated walking length:</h6>';
            $ls_tours_shortcodes .= '<p>1 mile</p>';

            $ls_tours_shortcodes .= '[/col_inner]';

            $ls_tours_shortcodes .= '[/row_inner]';
            $ls_tours_shortcodes .= '[gap height="80px"]';

            $ls_tours_shortcodes .= '[ux_slider hide_nav="true" nav_style="reveal" nav_color="dark" bullets="false" timer="3000"]';

            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="335"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1031"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1032"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1033"]';


            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Estimated drive time:</h6>';
            $ls_tours_shortcodes .= ' <p>45 minutes</p>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Estimated walking length:</h6>';
            $ls_tours_shortcodes .= '<p>1 mile</p>';

            $ls_tours_shortcodes .= '[/col_inner]';

            $ls_tours_shortcodes .= '[/row_inner]';
            $ls_tours_shortcodes .= '[gap height="80px"]';

            $ls_tours_shortcodes .= '[ux_slider hide_nav="true" nav_style="reveal" nav_color="dark" bullets="false" timer="3000"]';

            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="335"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1031"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1032"]';


            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1033"]';



            $ls_tours_shortcodes .= '[/ux_banner]';
            $ls_tours_shortcodes .= '[ux_banner height="40%" height__sm="80%" bg="1034"]';


            $ls_tours_shortcodes .= '[/ux_banner]';

            $ls_tours_shortcodes .= '[/ux_slider]';
            $ls_tours_shortcodes .= '<h5 class="uppercase">November 24</h5>';
            $ls_tours_shortcodes .= '<h3>Caesarea Philippi; Megiddo; Nazareth<br />';
            $ls_tours_shortcodes .= '</h3>';
            $ls_tours_shortcodes .= '<p>We drive north along the coast to visit the port city built by Herod the Great, Caesarea Maritima. Here Paul was imprisoned for two years (Acts 24) and from here Cornelius the Centurion left on his journey to meet Peter (Acts 10). Later as we drive north to the Jezreel valley, we’ll talk about Mt. Carmel where Elijah’s had his contest with the priests of Baal (1 Kings 18:20-40). Then we’ll visit Megiddo, or Har Megiddo (the mount of the fortress) also known as Armageddon (Revelation 16:16). This spot was one of the most crucial and strategic for the empires of the ancient world and several Israelite kings died defending this location (2 Kings 9) notably king Josiah (2 Kings 23). We’ll cross north through the valley of Jezreel for the city of Nazareth, the boyhood home of Jesus (Matthew 2:23). Our afternoon will be spent in a recreated ancient Nazarene village that will help us more fully experience what life was like in the time of Jesus. Hotel Sea of Galilee at Migdal (or similar).</p>';
            $ls_tours_shortcodes .= '[ux_text font_size="0.8"]';

            $ls_tours_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #b98919; padding: 6px;"><b>Breakfast, LUNCH &amp; dinner included!</b></span></p>';
            $ls_tours_shortcodes .= '<p> </p>';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '[gap height="19px"]';

            $ls_tours_shortcodes .= '[row_inner col_style="divided"]';

            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Note on clothing: </h6>';
            $ls_tours_shortcodes .= '<p>No shorts or bare shoulders at Church of the Annunciation</p>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Estimated drive time:</h6>';
            $ls_tours_shortcodes .= '<p>3 hours 15 minutes</p>';

            $ls_tours_shortcodes .= '[/col_inner]';
            $ls_tours_shortcodes .= '[col_inner span="4" span__sm="12"]';

            $ls_tours_shortcodes .= '<h6>Estimated walking length:</h6>';
            $ls_tours_shortcodes .= '<p> 2.5 miles</p>';

            $ls_tours_shortcodes .= '[/col_inner]';

            $ls_tours_shortcodes .= '[/row_inner]';
            $ls_tours_shortcodes .= '[gap height="100px"]';

            $ls_tours_shortcodes .= '[scroll_to title="whatsincluded" bullet="false"]';

            $ls_tours_shortcodes .= '[gap height="40px"]';

            $ls_tours_shortcodes .= '[row_inner style="collapse"]';

            $ls_tours_shortcodes .= '[col_inner span__sm="12"]';

            $ls_tours_shortcodes .= '[ux_text font_size="1.4"]';

            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<h2>What\'s Included</h2>\';';
            $ls_tours_shortcodes .= '[/ux_text]';
            $ls_tours_shortcodes .= '[row_inner_1 col_style="divided"]';

            $ls_tours_shortcodes .= '[col_inner_1 span="9" span__sm="12"]';

            $ls_tours_shortcodes .= '<h4><span data-text-color="primary">Included</span></h4>';
            $ls_tours_shortcodes .= '<ul>';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">World class tour guides</span></li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">4 or 5 star hotels</span></li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Transfers to and from the airport (If arriving and departing with the group)</span></li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Entrance fees</span></li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Whisper headsets</span></li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Luxury tour coach bus</span></li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li aria-level="1">Tips for local guides</li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li aria-level="1">Tips for local drivers</li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li aria-level="1">Water on the bus</li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li aria-level="1">Meals as indicated on the itinerary</li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'</ul>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<h4><span data-text-color="primary">What\'s Not Included</span></h4>\';';
            $ls_tours_shortcodes .= '<ul>';
            $ls_tours_shortcodes .= '<li>Incidentals</li>';
            $ls_tours_shortcodes .= '<li>Personal items</li>';
            $ls_tours_shortcodes .= '<li>International flights</li>';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<li>Traveler\'s Insurance</li>\';';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'</ul>\';';

            $ls_tours_shortcodes .= '[/col_inner_1]';

            $ls_tours_shortcodes .= '[/row_inner_1]';
            $ls_tours_shortcodes .= '<blockquote>';
            $ls_tours_shortcodes .= '$ls_tours_shortcodes .=\'<p>“Pack your bags, get your air tickets, and we\'ll take care of everything else!”</p>\';';
            $ls_tours_shortcodes .= '</blockquote>';

            $ls_tours_shortcodes .= '[/col_inner]';

            $ls_tours_shortcodes .= '[/row_inner]';
            $ls_tours_shortcodes .= '[gap height="100px"]';

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

            $ls_tours_shortcodes .= '<button class="wtrvl-checkout_button" id="wetravel_button_widget" data-env="https://www.wetravel.com" data-version="v0.3" data-uid="746955" data-uuid="89148139" href="https://www.wetravel.com/checkout_embed?uuid=89148139" style="background-color:#daa425;color:#ffffff;border: 0px;border-radius: 5px;font-family: \'Poppins\', sans-serif;font-weight: 400;font-size: 14px;-webkit-font-smoothing: antialiased;text-transform: capitalize;padding: 13px 24px;text-decoration: none;text-align: center;line-height: 14px;display: inline-block; cursor: pointer;">Book Now</button> <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> <script src="https://cdn.wetravel.com/widgets/embed_checkout.js"></script>';
            $ls_tours_shortcodes .= '[/ux_html]';
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

            $ls_tours_shortcodes .= '[/col]';

            $ls_tours_shortcodes .= '[/row]';

            $ls_tours_shortcodes .= '[/section]';
            $ls_tours_shortcodes .= '[scroll_to title="booktour" bullet="false"]';

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
            $ls_tours_shortcodes .= '[button text="Tours" padding="7px 30px 7px 30px" link="/tours/"]';

            $ls_tours_shortcodes .= '[button text="Contact" color="white" style="outline" padding="7px 30px 7px 30px" link="/contact/"]';


            $ls_tours_shortcodes .= '[/col]';

            $ls_tours_shortcodes .= '[/row]';

            $ls_tours_shortcodes .= '[/section]';

            ?>

            <?php
            echo do_shortcode($ls_tours_shortcodes);
            wp_reset_postdata();
            ?>

        <?php endwhile; ?>
    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>