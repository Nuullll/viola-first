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
    $font_dir = get_stylesheet_directory_uri() . '/fonts/';

    wp_enqueue_style( 'font-brusher',
        $font_dir . 'Brusher/stylesheet.css',
        $ver = wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'font-levibrush',
        $font_dir . 'levibrush/stylesheet.css',
        $ver = wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'font-wc-mano-negra-bta',
        $font_dir . 'wc-mano-negra-bta/stylesheet.css',
        $ver = wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'font-day-billabong',
        $font_dir . 'day-billabong/stylesheet.css',
        $ver = wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'font-lucky-turns',
        $font_dir . 'lucky-turns/stylesheet.css',
        $ver = wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_css' );
