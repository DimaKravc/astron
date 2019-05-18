<?php
/**
 * Astron functions and definitions
 *
 * @package Astron
 * @since 1.0.0
 */

define('ASTRON_VERSION', 1.0);

if (!isset($content_width)) {
    $content_width = 750;
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Remove recent comments style
 */
function astron_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style',
    ));
}

add_action('widgets_init', 'astron_recent_comments_style');

if (!function_exists('astron_setup')) :
    /**
     * astron setup
     */
    function astron_setup()
    {
        load_theme_textdomain('astron', get_template_directory() . '/languages');
        load_theme_textdomain('tgm', get_template_directory() . '/inc/tgm/languages');

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        register_nav_menu('site-menu', esc_html__('Site menu', 'astron'));

        /**
         * Add post thumbnail support
         */
        add_theme_support('post-thumbnails');

        /**
         * Add image size
         */
        add_image_size('astron_small_thumb', 180, 205, true);

        /**
         * Add feed links
         */
        add_theme_support('automatic-feed-links');

        /**
         * Add title tag
         */
        add_theme_support('title-tag');
    }
endif;
add_action('after_setup_theme', 'astron_setup');

if (!function_exists('astron_load_scripts')) :
    /**
     * Register and enqueue styles/scripts
     */
    function astron_load_scripts()
    {
        /**
         * Load styles
         */
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), ASTRON_VERSION);

        /**
         * Load scripts
         */
        wp_enqueue_script('application', get_template_directory_uri() . '/js/application.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('application'), ASTRON_VERSION, true);

        wp_localize_script('main', 'localize_array', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));

        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;
add_action('wp_enqueue_scripts', 'astron_load_scripts');

if ( ! function_exists( 'astron_register_sidebars' ) ) :
    /**
     * Register sidebars
     */
    function astron_register_sidebars() {
        register_sidebar(
            array(
                'id'            => 'language_switcher',
                'name'          => esc_html__( 'Site language switcher', 'astron' ),
                'description'   => esc_html__( 'Drag widget', 'astron' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget__title">',
                'after_title'   => '</h3>',
            )
        );
    }
endif;
add_action( 'widgets_init', 'astron_register_sidebars' );

if ( ! function_exists( 'astron_language_list' ) ) :
    /**
     * Register language select
     */
    function astron_language_select(){
        $languages = icl_get_languages('skip_missing=0&orderby=id');
        if(!empty($languages)){
            echo '<select data-js="select">';
            foreach($languages as $l){

                if($l['active']) {
                    echo '<option selected>';
                } else {
                    echo '<option>';
                }
                echo icl_disp_language($l['native_name']);
                echo '</option>';
            }
            echo '</select>';
        }
    }
endif;

