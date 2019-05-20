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

//if (!function_exists('astron_register_post_types')) :
//    /**
//     * Create custom post types
//     */
//    function astron_register_post_types()
//    {
//        $labels = array(
//            'name' => 'Вакансии',
//            'singular_name' => 'Вакансию',
//            'add_new' => 'Добавить вакансию',
//            'add_new_item' => 'Добавить новую вакансию',
//            'edit_item' => 'Редактировать вакансию',
//            'new_item' => 'Новая вакансия',
//            'all_items' => 'Все вакансии',
//            'view_item' => 'Просмотр вакансий на сайте',
//            'search_items' => 'Искать вакансии',
//            'not_found' => 'Вакансий не найдено.',
//            'not_found_in_trash' => 'В корзине нет вакансий.',
//            'menu_name' => 'Вакансии'
//        );
//        $args = array(
//            'label' => 'vacancy',
//            'labels' => $labels,
//            'public' => true,
//            'show_ui' => true,
//            'has_archive' => true,
//            'menu_icon' => 'dashicons-groups',
//            'menu_position' => 20,
//            'supports' => array('title', 'editor'),
//            'show_in_rest' => true,
//        );
//        register_post_type('vacancy-p', $args);
//    }
//endif;
//add_action('init', 'astron_register_post_types');
//
//if (!function_exists('astron_register_taxonomies')) :
//    /**
//     * Create custom taxonomies
//     */
//    function astron_register_taxonomies()
//    {
//        $labels = array(
//            'name' => 'Рубрики',
//            'singular_name' => 'Рубрика',
//            'search_items' => 'Найти рубрику',
//            'popular_items' => 'Популярные рубрики',
//            'all_items' => 'Все рубрики',
//            'parent_item' => null,
//            'parent_item_colon' => null,
//            'edit_item' => 'Редактировать рубрику',
//            'update_item' => 'Обновить рубрику',
//            'add_new_item' => 'Добавить новую рубрику',
//            'new_item_name' => 'Название новой рубрики',
//            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
//            'add_or_remove_items' => 'Добавить или удалить рубрику',
//            'choose_from_most_used' => 'Выбрать из наиболее часто используемых рубрик',
//            'menu_name' => 'Рубрики'
//        );
//        $args = array(
//            'hierarchical' => true,
//            'labels' => $labels,
//            'public' => true,
//            'show_in_nav_menus' => true,
//            'show_ui' => true,
//            'show_tagcloud' => true,
//            'update_count_callback' => '_update_post_term_count',
//            'query_var' => true,
//            'show_in_rest' => true,
//        );
//        register_taxonomy('vacancy', array('vacancy-p'), $args);
//    }
//endif;
//add_action('init', 'astron_register_taxonomies');

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

        register_nav_menu('site-nav', esc_html__('Site navigation', 'astron'));

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
        wp_enqueue_style('nice-select', get_template_directory_uri() . '/styles/nice-select.css', array(), ASTRON_VERSION);
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), ASTRON_VERSION);

        /**
         * Load scripts
         */
        wp_enqueue_script('nice-select', get_template_directory_uri() . '/js/nice-select.js', array('jquery'), ASTRON_VERSION, true);
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

if (!function_exists('astron_register_sidebars')) :
    /**
     * Register sidebars
     */
    function astron_register_sidebars()
    {
        register_sidebar(
            array(
                'id' => 'language_switcher',
                'name' => esc_html__('Site language switcher', 'astron'),
                'description' => esc_html__('Drag widget', 'astron'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<h3 class="widget__title">',
                'after_title' => '</h3>',
            )
        );

        register_sidebar(
            array(
                'id' => 'sidebar',
                'name' => esc_html__('Sidebar', 'astron'),
                'description' => esc_html__('Drag widget', 'astron'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<span style="display: none;">',
                'after_title' => '</span>',
            )
        );

//        register_sidebar(
//            array(
//                'id' => 'vacancy_sidebar',
//                'name' => esc_html__('Vacancy sidebar', 'astron'),
//                'description' => esc_html__('Drag widget', 'astron'),
//                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//                'after_widget' => '</aside>',
//                'before_title' => '<span style="display: none;">',
//                'after_title' => '</span>',
//            )
//        );
    }
endif;
add_action('widgets_init', 'astron_register_sidebars');

if (!function_exists('astron_language_list')) :
    /**
     * Register language select
     */
    function astron_language_select()
    {
        if (function_exists('icl_get_languages')) {
            $languages = icl_get_languages('skip_missing=0&orderby=id');
            if (!empty($languages)) {
                echo '<select data-js="language-select" class="language-select">';
                foreach ($languages as $l) {

                    if ($l['active']) {
                        echo '<option selected value="' . $l['url'] . '">';
                    } else {
                        echo '<option value="' . $l['url'] . '">';
                    }
                    echo icl_disp_language($l['native_name']);
                    echo '</option>';
                }
                echo '</select>';
            }
        }
    }
endif;
