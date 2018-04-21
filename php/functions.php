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
function enqueue_hover_css() {
    wp_enqueue_style( 'hover-min',
        get_stylesheet_directory_uri() . '/css/hover-min.css',
        $ver = wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_hover_css' );

/**
 * enqueue custom font stylesheets
 */
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
    wp_enqueue_style( "font-FontAwesome",
        get_stylesheet_directory_uri() . "/fonts/FontAwesome/css/fontawesome.min.css",
        $ver = wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_css' );

/**
 * add shortcode for portfolio list (on home page)
 */
function get_portfolio_list( $atts ) {
    $a = shortcode_atts(
        array(
            // default attributes
        ),
        $atts
    );

    $posts = get_posts(
        array(
            'posts_per_page' => -1
        )
    );

    return '';
}
add_shortcode( 'portfoliolist', 'get_portfolio_list' );
