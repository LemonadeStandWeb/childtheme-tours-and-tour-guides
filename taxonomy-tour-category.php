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
        $shortcodes = '';
        $shortcodes .= '[row h_align="center"]';
        $shortcodes .= '[col span__sm="12" color="light"]';
        $shortcodes .= '[row_inner style="collapse" v_align="equal" h_align="center"]';
        $shortcodes .= '[col_inner span__sm="12" span__md="10"]';

        $shortcodes .= '[gap height="55px"]';

        /*
        $shortcodes .= '[row_inner_1 style="collapse"]';
        $shortcodes .= '[col_inner_1 span="8" span__sm="12" span__md="12"]';
        $shortcodes .= '[ux_text font_size="1.8" font_size__sm="1.5"]';
        $shortcodes .= '<h1 class="mb-0">Lorem Ipsum</h1>';
        $shortcodes .= '[/ux_text]';
        $shortcodes .= '<p>Lorem ipsum dolor sit amet.</p>';
        $shortcodes .= '[button text="See All Tours" style="link" link="/tours/"]';
        $shortcodes .= '[/col_inner_1]';
        $shortcodes .= '[/row_inner_1]';
        */

        $shortcodes .= '[row_inner_1 v_align="equal" h_align="center"]';
        ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            // Fetch the post variables
            $ls_tours_name                 = get_field('ls_tours_name');
            $ls_tours_hero_image           = get_field('ls_tours_hero_image');
            $ls_tours_start_date           = get_field('ls_tours_start_date');
            $ls_tours_end_date             = get_field('ls_tours_end_date');
            $ls_tours_start_date_month_day = date('M j', strtotime($ls_tours_start_date));
            $ls_tours_end_date_month_day   = date('M j', strtotime($ls_tours_end_date));
            $ls_tours_year                 = date('Y', strtotime($ls_tours_start_date));
            $ls_tours_link                 = get_permalink(get_the_ID());

            $shortcodes .= '[col_inner_1 label="HOME TOUR CARD" span="4" span__sm="12" span__md="10"]';
            $shortcodes .= '[section bg="' . $ls_tours_hero_image . '" bg_size="original" bg_overlay="rgba(0, 0, 0, 0.55)" bg_pos="35% 7%" padding="0px"]';

            $shortcodes .= '[ux_html label="Make Card Clickable"]';
            $shortcodes .= '<a href="' . $ls_tours_link . '" class="clickable-card-link"></a>';
            $shortcodes .= '[/ux_html]';

            $shortcodes .= '[row_inner_2 style="collapse" width="full-width" padding="45px 0px 30px 0px"]';
            $shortcodes .= '[col_inner_2 span__sm="12"]';

            $shortcodes .= '[ux_text font_size="1.1"]';
            $shortcodes .= '<h6 class="mb-0">' . $ls_tours_start_date_month_day . ' - ' . $ls_tours_start_date_month_day . '</h6>';
            $shortcodes .= '[/ux_text]';

            $shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
            $shortcodes .= '<h3 class="mb-0">' . $ls_tours_year . '</h3>';
            $shortcodes .= '[/ux_text]';

            $shortcodes .= '[gap height="230px" height__sm="100px"]';

            // If the tour is new, display a "New Tour" badge. Hidden by default.
            $shortcodes .= '[ux_text font_size="0.8" text_color="rgb(0,0,0)" visibility="hidden"]';
            $shortcodes .= '<p class="uppercase mb-half"><span style="background-color: #fff; padding:8px"><b>New Tour</b></span></p>';
            $shortcodes .= '[/ux_text]';
            
            $shortcodes .= '<h3 class="mb-0">' . $ls_tours_name . '</h3>';
            $shortcodes .= '<p>&nbsp;</p>';
            $shortcodes .= '[button text="Learn More" icon="icon-angle-right" link="' . $ls_tours_link . '"]';
            $shortcodes .= '[/col_inner_2]';
            $shortcodes .= '[/row_inner_2]';

            $shortcodes .= '[/section]';
            $shortcodes .= '[/col_inner_1]';
            ?>
        <?php endwhile; ?>

        <?php
        $shortcodes .= '[/row_inner_1]';
        $shortcodes .= '[/col_inner]';
        $shortcodes .= '[/row_inner]';
        $shortcodes .= '[/col]';
        $shortcodes .= '[/row]';
        echo do_shortcode($shortcodes);
        ?>

    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>