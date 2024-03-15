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
            $shortcodes = '';
            $shortcodes .= '[gap height="30px"]';
            $shortcodes .= '[row style="collapse"]';

            $shortcodes .= '[col span="3" span__sm="12"]';
            $shortcodes .= '[ux_image id="959"]';
            $shortcodes .= '[/col]';
        
            $shortcodes .= '[col span="9" span__sm="12" padding="0px 0px 0px 50px" padding__sm="0px 20px 0px 20px" color="light"]';
            $shortcodes .= '[ux_text font_size="1.15"]';
            $shortcodes .= '<h2>Taylor Halverson</h2>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[divider width="100%" height="1px"]';
            $shortcodes .= '<p>Taylor Halverson is a world class tour leader. He’s led tour groups to countries around the world (including the Middle East, Central America, India, China, and Europe).&nbsp;He is an expert in world history, world civilization, world cultures, and world religions, having taught these subject at the university for years. He loves designing and delivering experiences that unfold the beauties of this incredible world to enthusiastic learners.</p>';
            $shortcodes .= '<p>He has PhDs in Biblical Studies (emphasis in Judaism and Christianity in Antiquity) and Instructional Technology (emphasis in learning design). He’s been traveling to and studying the Holy Land and the Bible for three decades. Taylor loves people and loves learning and teaching on site.</p>';
            $shortcodes .= '[button text="Video of Taylor Teaching" padding="7px 30px 7px 30px" link="https://youtu.be/RWUASBxV27w?si=0WoS4vMzRympntaw" target="_blank"]';
            $shortcodes .= '[button text="Read More About Taylor" color="white" style="outline" padding="7px 30px 7px 30px" link="https://taylorhalverson.com/bio-summary/" target="_blank"]';
        
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