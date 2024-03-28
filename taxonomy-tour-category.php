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

        // Opening section
        $shortcodes .= '[section]';
        $shortcodes .= '[gap height="30px"]';

        // Title with a paragraph
        $shortcodes .= '[row]';
        $shortcodes .= '[col span="8" span__sm="12" span__md="12"]';
        $shortcodes .= '[row_inner h_align="center"]';
        $shortcodes .= '[col_inner span__sm="12" span__md="10"]';
        /*
        $shortcodes .= '[ux_text font_size="1.4"]';
        $shortcodes .= '<h1>This is a simple headline</h1>';
        $shortcodes .= '[/ux_text]';
        $shortcodes .= '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>';
        */
        $shortcodes .= '[button text="See All Tours" icon="icon-angle-right" link="/tours"]';
        $shortcodes .= '[/col_inner]';
        $shortcodes .= '[/row_inner]';
        $shortcodes .= '[/col]';
        $shortcodes .= '[/row]';
        // End title with a paragraph 

        // Opening row/col/row for clickable cards and responsiveness
        $shortcodes .= '[row h_align="center"]';
        $shortcodes .= '[col span__sm="12" span__md="10"]';
        $shortcodes .= '[row_inner v_align="equal"]';
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

            $shortcodes .= '[col_inner span="4" span__sm="12" span__md="12" padding="100% 0px 0px 0px" class="clickable-card tour-card"]';
            $shortcodes .= '[ux_html]';
            $shortcodes .= '<a href="' . $ls_tours_link . '" class="clickable-card-link"></a>';
            $shortcodes .= '[/ux_html]';
            $shortcodes .= '[ux_image id="' . $ls_tours_hero_image . '" image_overlay="rgba(0, 0, 0, 0.55)" class="fill"]';
            $shortcodes .= '[row_inner_1]';
            $shortcodes .= '[col_inner_1 span__sm="12" padding="0px 0px 0px 30px" margin="-85% 0px 0px 0px"]';

            if (!empty($ls_tours_start_date_month_day) && !empty($ls_tours_end_date_month_day)) {
                $shortcodes .= '[ux_text font_size="1.1"]';
                $shortcodes .= '<h6 class="mb-0">' . $ls_tours_start_date_month_day . ' - ' . $ls_tours_end_date_month_day . '</h6>';
                $shortcodes .= '[/ux_text]';
            }

            if (!empty($ls_tours_year)) {
                $shortcodes .= '[ux_text font_size="2.2" line_height="0.75"]';
                $shortcodes .= '<h3 class="mb-0">' . $ls_tours_year . '</h3>';
                $shortcodes .= '[/ux_text]';
            }

            $shortcodes .= '[/col_inner_1]';
            $shortcodes .= '[col_inner_1 span__sm="12" padding="0px 30px 0px 30px"]';

            if (!empty($ls_tours_name)) {
                $shortcodes .= '<h3 class="mb-0">' . $ls_tours_name . '</h3>';
                $shortcodes .= '<p>&nbsp;</p>';
                $shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
            }

            $shortcodes .= '[/col_inner_1]';
            $shortcodes .= '[/row_inner_1]';
            $shortcodes .= '[/col_inner]';
            ?>
        <?php endwhile; ?>

        <?php
        // Close out the opening row/col/row for clickable cards and responsiveness
        $shortcodes .= '[/row_inner]';
        $shortcodes .= '[/col]';
        $shortcodes .= '[/row]';

        // Close out the section
        $shortcodes .= '[/section]';
        echo do_shortcode($shortcodes);
        ?>

    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>