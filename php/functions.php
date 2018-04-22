<?php
/**
 * functions.php for child theme of The7
 *
 * @version:    1.0.0
 * @author:     Nuullll
 */

/**
 * css files of parent theme (The7) are saved in /wp-content/uploads/the7-css/ folder
 * The style.css of parent theme is empty, so there's no need to enqueue it
 */

/**
 * enqueue hover-min.css to support several hover effects
 */
add_action('wp_enqueue_scripts', 'enqueue_hover_css');
function enqueue_hover_css() {
    wp_enqueue_style(
        'hover-min',
        get_stylesheet_directory_uri() . '/css/hover-min.css',
        $ver = wp_get_theme()->get('Version')
    );
}

/**
 * enqueue custom font stylesheets
 */
add_action('wp_enqueue_scripts', 'enqueue_font_css');
function enqueue_font_css() {
    $enqueue_font = function($font_name) {
		$font_dir = get_stylesheet_directory_uri() . '/fonts/';
        wp_enqueue_style( "font-{$font_name}",
            "{$font_dir}{$font_name}/stylesheet.css",
            $ver = wp_get_theme()->get('Version')
        );
    };

    $enqueue_font('Brusher');
    $enqueue_font('levibrush');
    $enqueue_font('wc-mano-negra-bta');
    $enqueue_font('day-billabong');
    $enqueue_font('lucky-turns');

    // fix FontAwesome import bug caused by The7 update
    wp_enqueue_style(
        "font-FontAwesome",
        get_stylesheet_directory_uri() . "/fonts/FontAwesome/css/font-awesome.min.css",
        $ver = wp_get_theme()->get('Version')
    );
}

/**
 * add shortcode for portfolio list (on home page)
 *
 * @example [all_portfolio_list image_width_ratio=65][/all_portfolio_list]
 */
add_shortcode('all_portfolio_list', 'get_portfolio_list');
function get_portfolio_list($atts) {
    // handle shortcode attributes
    $a = shortcode_atts(
        array(
            // default attributes
            'image_width_ratio' => 65       // unit: percent
        ),
        $atts
    );

    // populate article-list <div>
    ob_start();

    require('templates/portfolio_list.php');

    return ob_get_clean();
}

// Utility functions
/**
 * Convert $array to html class string, echo to output
 * @param  [array] $array [contains class strings]
 * @return [null]       [echo the string to output]
 */
function echo_html_classes($array) {
    echo esc_attr(implode(' ', array_unique($array)));
}
