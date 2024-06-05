<?php

/**
 * Display Attractions in a card format
 */
function ls_shortcode_category_cards(): bool|string
{
    ob_start();

    $args = array(
        'taxonomy' => 'tour-category',
        'hide_empty' => true,
        'post_type' => 'tours',
    );

    $categories = get_terms($args);

    $shortcodes = '[row_inner_1 v_align="equal"]';

    if (is_array($categories) && !empty($categories)) {
        foreach ($categories as $category) {
            $image_id = get_field('ls_tours_category_card_image', $category);
            $image_id = !empty($image_id) ? $image_id : 2524;
            $category_link = esc_url('/tours/' . $category->slug);
            $shortcodes .= '[col_inner_1 span="4" span__sm="12" span__md="12" padding="100% 0px 0px 0px" class="clickable-card tour-card"]';
            $shortcodes .= '[ux_html]';
            $shortcodes .= "<a href=\"{$category_link}\" class=\"clickable-card-link\"></a>";
            $shortcodes .= '[/ux_html]';
            $shortcodes .= '[ux_image id="' . $image_id . '" image_overlay="rgba(0, 0, 0, 0.55)" class="fill"]';
            $shortcodes .= '[row_inner_2]';
            $shortcodes .= '[col_inner_2 span__sm="12" padding="0px 0px 0px 30px" margin="-65% 0px 0px 0px"]';
            $shortcodes .= '[ux_text font_size="1.5" line_height="1.1"]';
            $shortcodes .= '<h3 class="mb-0">' . esc_html($category->name) . '</h3>';
            $shortcodes .= '[/ux_text]';
            $shortcodes .= '[/col_inner_2]';
            $shortcodes .= '[col_inner_2 span__sm="12" padding="30px 30px 0px 30px"]';
            $shortcodes .= '[button text="Learn More" icon="icon-angle-right"]';
            $shortcodes .= '[/col_inner_2]';
            $shortcodes .= '[/row_inner_2]';
            $shortcodes .= '[/col_inner_1]';
        }
    } else {
        $shortcodes .= '<h1>Nothing Found</h1>';
    }

    $shortcodes .= '[/row_inner_1]';

    echo do_shortcode($shortcodes);

    return ob_get_clean();
}

add_shortcode('ls_category_cards', 'ls_shortcode_category_cards');
