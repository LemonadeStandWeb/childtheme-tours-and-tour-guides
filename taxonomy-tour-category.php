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

            $ls_tours_category_shortcodes = '<h1>Hello World!</h1>';

            ?>

            <?php
            echo do_shortcode($ls_tours_category_shortcodes);
            wp_reset_postdata();
            ?>

        <?php endwhile; ?>
    </div>

    <?php do_action('flatsome_after_page'); ?>

    <?php get_footer(); ?>