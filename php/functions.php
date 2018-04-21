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
    wp_enqueue_style(
        'hover-min',
        get_stylesheet_directory_uri() . '/css/hover-min.css',
        $ver = wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_hover_css');

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
    wp_enqueue_style(
        "font-FontAwesome",
        get_stylesheet_directory_uri() . "/fonts/FontAwesome/css/font-awesome.min.css",
        $ver = wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_font_css');

/**
 * add shortcode for portfolio list (on home page)
 */
function get_portfolio_list($atts) {
    // handle shortcode attributes
    $a = shortcode_atts(
        array(
            // default attributes
            'image_width_ratio' => 65
        ),
        $atts
    );

    // temporary workaround
    // define html classes
    $article_list_classes = array(
        "articles-list",
        "hover-color-static",
        "loading-effect-fade-in",
        "with-ajax"
    );
    $single_portfolio_classes = array(
        "post",
        "project-odd",
        "dt_portfolio",
        "type-dt_portfolio",
        "status-publish",
        "has-post_thumbnail",
        "hentry",
        "bg-on"
        // to be added in the loop:
        // post-{id}
        // dt_portfolio_category-{category_slug}
        // dt_portfolio_category-{category_id}
    );
    $figure_classes = array(
        "buttons-on-img",
        "rollover-active"
    );
    $figure_anchor_classes = array(
        "rollover",
        "alignleft",
        "rollover-buttons-on"
    );
    $figure_img_classes = array(
        "lazy-load",
        "preload-me",
        "is-loaded"
    );
    $figure_caption_classes = array(
        "rollover-content"
    );


    // populate article-list <div>
    ob_start(); ?>

    <div class="<?php echo_html_classes($article_list_classes) ?>" data-cur-page="1">
        <?php
        $portfolios = get_posts(
            array(
                'posts_per_page' => -1,         // retrieve all portfolios
                'post_type' => 'dt_portfolio'
            )
        );
        foreach($portfolios as $portfolio) {
            $portfolio_id = $portfolio->ID;
            $portfolio_category = get_the_terms($portfolio_id, 'dt_portfolio_category')[0];
            $category_name = $portfolio_category->name;
            $category_slug = $portfolio_category->slug;
            $category_id = $portfolio_category->term_id;
            $feature_img_id = get_post_thumbnail_id($portfolio);
            $feature_img = wp_get_attachment_image_src($feature_img_id, 'full');
            $feature_img_src = $feature_img[0];
            $feature_img_width = $feature_img[1];
            $feature_img_height = $feature_img[2];

            // add html classes
            $single_portfolio_classes[] = "post-{$portfolio_id}";
            $single_portfolio_classes[] = "dt_portfolio_category-{$category_slug}";
            $single_portfolio_classes[] = "dt_portfolio_category-{$category_id}";
            ?>

            <article class="<?php echo_html_classes($single_portfolio_classes) ?>">
                <div class="project-list-media" style="width: <?php echo $a['image_width_ratio'] ?>%;">
                    <figure class="<?php echo_html_classes($figure_classes) ?>">
                        <a href="<?php echo esc_url(get_post_permalink($portfolio_id)); ?>" class="<?php echo_html_classes($figure_anchor_classes) ?>" title="<?php echo $portfolio->post_title ?>">
                            <img class="<?php echo_html_classes($figure_img_classes) ?>" src="<?php echo esc_url($feature_img_src) ?>" width="<?php echo $feature_img_width ?>" height="<?php echo $feature_img_height ?>" scale="0" style="will-change: auto;">
                            <i></i>
                        </a>
                        <figcaption class="<?php echo_html_classes($figure_caption_classes) ?>">
                            <div class="link-container"></div>
                        </figcaption>
                    </figure>
                </div>
                <div class="project-list-content" style="width: <?php echo 100-$a['image_width_ratio'] ?>%;">
                    <h3 class="entry-title">
                        <a href="<?php echo esc_url(get_post_permalink($portfolio_id)); ?>" title="<?php echo $portfolio->post_title ?>" rel="bookmark">
                            <?php echo $portfolio->post_title ?>
                        </a>
                    </h3>
                    <div class="entry-meta portfolio-categories">
                        <span class="category-link">
                            <a href="">
                                <?php echo $category_name ?>
                            </a>
                        </span>
                    </div>
                </div>
            </article><!-- #post-<?php echo $portfolio_id ?> -->

            <?php
        }
        ?>
    </div>
    <?php

    return ob_get_clean();
}
add_shortcode('all_portfolio_list', 'get_portfolio_list');

function echo_html_classes($array) {
    echo implode(' ', array_unique($array));
}
