<?php
/*
Template name: Tour Category Archive Page
*/
?>

<!-- Bring in the transparent header with light text -->
<?php get_template_part('templates/parts/ls-cpt-header'); ?>

<main id="main" class="<?php flatsome_main_classes(); ?>">

    <?php do_action('flatsome_before_page'); ?>

    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php

            $ls_tours_category_shortcodes .= '[row h_align="center"]';

            $ls_tours_category_shortcodes .= '[col span__sm="12" color="light"]';
            $ls_tours_category_shortcodes .= '[row_inner style="collapse" v_align="equal" h_align="center"]';
        
            $ls_tours_category_shortcodes .= '[col_inner span__sm="12" span__md="10"]';
        
            $ls_tours_category_shortcodes .= '[row_inner_1 style="collapse"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_1 span="8" span__sm="12" span__md="12"]';
        
            $ls_tours_category_shortcodes .= '[ux_text font_size="1.8" font_size__sm="1.5"]';
            $ls_tours_category_shortcodes .= '<h2 class="mb-0">Discover Our LDS Guided Tours &amp; Cruises</h2>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '<p>The trip of a lifetime awaits you. There\'s never a better time to embark on something amazing as now.</p>';
            $ls_tours_category_shortcodes .= '[button text="See All Tours" style="link" link="/tours/"]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_1]';
        
            $ls_tours_category_shortcodes .= '[/row_inner_1]';
            $ls_tours_category_shortcodes .= '[row_inner_1 v_align="equal" h_align="center"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_1 label="HOME TOUR CARD" span="4" span__sm="12" span__md="10"]';
        
            $ls_tours_category_shortcodes .= '[section bg="210" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.55)" bg_pos="35% 7%" padding="0px"]';
        
            $ls_tours_category_shortcodes .= '[ux_html label="Make Card Clickable"]';
            $ls_tours_category_shortcodes .= '<a href="/tours/" class="clickable-card-link"></a>';
            $ls_tours_category_shortcodes .= '[/ux_html]';
            $ls_tours_category_shortcodes .= '[row_inner_2 style="collapse" width="full-width" padding="45px 0px 30px 0px"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_2 span__sm="12"]';
        
            $ls_tours_category_shortcodes .= '[ux_text font_size="1.1"]';
            $ls_tours_category_shortcodes .= '<h6 class="mb-0">Various Dates</h6>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">2024-2025</h3>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[gap height="230px" height__sm="100px"]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)" visibility="hidden"]';
            $ls_tours_category_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:8px"><b>New Tour</b></span></p>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">Israel Holy Land Tours</h3>';
            $ls_tours_category_shortcodes .= '<p>&nbsp;</p>';
            $ls_tours_category_shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/row_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/section]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_1]';
            $ls_tours_category_shortcodes .= '[col_inner_1 label="HOME TOUR CARD" span="4" span__sm="12" span__md="10"]';
        
            $ls_tours_category_shortcodes .= '[section bg="1706" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.55)" bg_pos="57% 65%" padding="0px"]';
        
            $ls_tours_category_shortcodes .= '[ux_html label="Make Card Clickable"]';
            $ls_tours_category_shortcodes .= '<a href="/world-tours/book-of-mormon-land-tour-with-blake-allen-june-13-28-2024" class="clickable-card-link"></a>';
            $ls_tours_category_shortcodes .= '[/ux_html]';
            $ls_tours_category_shortcodes .= '[row_inner_2 style="collapse" width="full-width" padding="45px 0px 30px 0px"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_2 span__sm="12"]';
        
            $ls_tours_category_shortcodes .= '[ux_text font_size="1.1"]';
            $ls_tours_category_shortcodes .= '<h6 class="mb-0">Jul 6 - Jul 21</h6>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">2024</h3>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[gap height="230px" height__sm="100px"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">Book of Mormon<br />Land Tour</h3>';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">16-day</h3>';
            $ls_tours_category_shortcodes .= '<p> </p>';
            $ls_tours_category_shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)" visibility="hidden"]';
            $ls_tours_category_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:8px"><b>New Tour</b></span></p>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/row_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/section]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_1]';
            $ls_tours_category_shortcodes .= '[col_inner_1 label="HOME TOUR CARD" span="4" span__sm="12" span__md="10"]';
        
            $ls_tours_category_shortcodes .= '[section bg="1325" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.55)" bg_pos="46% 19%" padding="0px"]';
        
            $ls_tours_category_shortcodes .= '[ux_html label="Make Card Clickable"]';
            $ls_tours_category_shortcodes .= '<a href="/tours/peru-august-2024" class="clickable-card-link"></a>';
            $ls_tours_category_shortcodes .= '[/ux_html]';
            $ls_tours_category_shortcodes .= '[row_inner_2 style="collapse" width="full-width" padding="45px 0px 30px 0px"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_2 span__sm="12"]';
        
            $ls_tours_category_shortcodes .= '[ux_text font_size="1.1"]';
            $ls_tours_category_shortcodes .= '<h6 class="mb-0">Aug 15-Aug 24</h6>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">2024</h3>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[gap height="274px" height__sm="100px"]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)" visibility="hidden"]';
            $ls_tours_category_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:8px"><b>New Tour</b></span></p>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">Peru (with Machu Picchu)</h3>';
            $ls_tours_category_shortcodes .= '<p>&nbsp;</p>';
            $ls_tours_category_shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/row_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/section]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_1]';
            $ls_tours_category_shortcodes .= '[col_inner_1 label="HOME TOUR CARD" span="4" span__sm="12" span__md="10"]';
        
            $ls_tours_category_shortcodes .= '[section bg="1706" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.55)" bg_pos="57% 65%" padding="0px"]';
        
            $ls_tours_category_shortcodes .= '[ux_html label="Make Card Clickable"]';
            $ls_tours_category_shortcodes .= '<a href="/world-tours/book-of-mormon-land-tour-with-blake-allen-15-days-october-5-19-2024" class="clickable-card-link"></a>';
            $ls_tours_category_shortcodes .= '[/ux_html]';
            $ls_tours_category_shortcodes .= '[row_inner_2 style="collapse" width="full-width" padding="45px 0px 30px 0px"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_2 span__sm="12"]';
        
            $ls_tours_category_shortcodes .= '[ux_text font_size="1.1"]';
            $ls_tours_category_shortcodes .= '<h6 class="mb-0">Oct 5-Oct 19</h6>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">2024</h3>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[gap height="230px" height__sm="100px"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">Book of Mormon<br />Land Tour</h3>';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">15-day</h3>';
            $ls_tours_category_shortcodes .= '<p> </p>';
            $ls_tours_category_shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)" visibility="hidden"]';
            $ls_tours_category_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:8px"><b>New Tour</b></span></p>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/row_inner_2]';
        
            $ls_tours_category_shortcodes .= '[/section]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_1]';
            $ls_tours_category_shortcodes .= '[col_inner_1 label="HOME TOUR CARD" span="4" span__sm="12" span__md="10"]';
        
            $ls_tours_category_shortcodes .= '[section bg="1327" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.55)" bg_pos="46% 23%" padding="0px"]';
        
            $ls_tours_category_shortcodes .= '[ux_html label="Make Card Clickable"]';
            $ls_tours_category_shortcodes .= '<a href="/tours/christmas-markets-of-alpine-europe-december-2024/" class="clickable-card-link"></a>';
            $ls_tours_category_shortcodes .= '[/ux_html]';
            $ls_tours_category_shortcodes .= '[row_inner_2 style="collapse" width="full-width" padding="45px 0px 30px 0px"]';
        
            $ls_tours_category_shortcodes .= '[col_inner_2 span__sm="12"]';
        
            $ls_tours_category_shortcodes .= '[ux_text font_size="1.1"]';
            $ls_tours_category_shortcodes .= '<h6 class="mb-0">Dec 9 -Dec 18</h6>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0">2024</h3>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '[gap height="230px" height__sm="100px"]';
            $ls_tours_category_shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)" visibility="hidden"]';
            $ls_tours_category_shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:8px"><b>New Tour</b></span></p>';
            $ls_tours_category_shortcodes .= '[/ux_text]';
            $ls_tours_category_shortcodes .= '<h3 class="mb-0"> Christmas Markets of Alpine Europe </h3>';
            $ls_tours_category_shortcodes .= '<p>&nbsp;</p>';
            $ls_tours_category_shortcodes .= '[gap height="46px" height__sm="0px"]';
            $ls_tours_category_shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
        
            $ls_tours_category_shortcodes .= '[/col_inner_2]';
            $ls_tours_category_shortcodes .= '[/row_inner_2]';
            $ls_tours_category_shortcodes .= '[/section]';
            $ls_tours_category_shortcodes .= '[/col_inner_1]';
            $ls_tours_category_shortcodes .= '[/row_inner_1]';
            $ls_tours_category_shortcodes .= '[/col_inner]';
            $ls_tours_category_shortcodes .= '[/row]';

            ?>

            <?php
            echo do_shortcode($ls_tours_category_shortcodes);
            wp_reset_postdata();
            ?>

        <?php endwhile; ?>
    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>