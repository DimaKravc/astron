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

if (!function_exists('astron_register_shortcode')) :
    /**
     * Create custom shortcode
     */
    function astron_register_shortcode()
    {
        $args = array(
            'post_type' => 'employee',
            'post_status' => 'publish',
            'posts_per_page' => 10
        );

        $string = '';
        $posts = new WP_Query($args);

        if ($posts->have_posts()) {

            $string .= '<div class="row">';
            while ($posts->have_posts()) {
                $posts->the_post();
                $string .= '<div class="col-12 col-md-6 col-lg-4">';
                $string .= sprintf('<article id="post-employee-%s" class="%s">', get_the_ID(), implode(' ', get_post_class('post post-employee')));
                $string .= '<div class="post-employee__thumbnail">';
                $string .= sprintf('%s', get_the_post_thumbnail(get_the_ID(), 'astron_middle_thumb', array('alt' => get_the_title())));
                $string .= '</div>';
                $string .= sprintf('<div class="post-employee__position">%s</div>', get_post_meta(get_the_ID(), 'position')[0]);
                $string .= sprintf('<div class="post-employee__name">%s</div>', get_the_title());
                $string .= '</article>';
                $string .= '</div>';
            }
            $string .= '</div>';
        }

        wp_reset_postdata();
        return $string;
    }
endif;
add_shortcode('employee', 'astron_register_shortcode');

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
        add_image_size('astron_middle_thumb', 370, 365, true);

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
        global $wp_query;

        /**
         * Load styles
         */
        wp_enqueue_style('nice-select', get_template_directory_uri() . '/styles/nice-select.css', array(), ASTRON_VERSION);
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/styles/owl.carousel.min.css', array(), ASTRON_VERSION);
        wp_enqueue_style('owl-theme', get_template_directory_uri() . '/styles/owl.theme.default.min.css', array(), ASTRON_VERSION);
        wp_enqueue_style('animate', get_template_directory_uri() . '/styles/animate.css', array(), ASTRON_VERSION);
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/styles/magnific-popup.css', array(), ASTRON_VERSION);
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), ASTRON_VERSION);

        /**
         * Load scripts
         */
        wp_enqueue_script('nice-select', get_template_directory_uri() . '/js/nice-select.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/js/smooth-scrollbar.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('application', get_template_directory_uri() . '/js/application.js', array('jquery'), ASTRON_VERSION, true);
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('application'), ASTRON_VERSION, true);

        wp_localize_script('main', 'localize_array', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'posts' => json_encode($wp_query->query_vars),
            'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages
        ));

        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;
add_action('wp_enqueue_scripts', 'astron_load_scripts');

if (!function_exists('astron_register_post_types')) :
    /**
     * Create custom post types
     */
    function astron_register_post_types()
    {
        $labels = array(
            'name' => 'Вакансии',
            'singular_name' => 'Вакансию',
            'add_new' => 'Добавить вакансию',
            'add_new_item' => 'Добавить новую вакансию',
            'edit_item' => 'Редактировать вакансию',
            'new_item' => 'Новая вакансия',
            'all_items' => 'Все вакансии',
            'view_item' => 'Просмотр вакансий на сайте',
            'search_items' => 'Искать вакансии',
            'not_found' => 'Вакансий не найдено.',
            'not_found_in_trash' => 'В корзине нет вакансий.',
            'menu_name' => 'Вакансии'
        );
        $args = array(
            'label' => 'vacancies',
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-groups',
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'custom-fields'),
            'show_in_rest' => true,
        );
        register_post_type('vacancies', $args);

        $labels = array(
            'name' => 'Сотрудники',
            'singular_name' => 'Сотрудника',
            'add_new' => 'Добавить сотрудника',
            'add_new_item' => 'Добавить нового сотрудника',
            'edit_item' => 'Редактировать сотрудника',
            'new_item' => 'Новый сотрудник',
            'all_items' => 'Все сотрудники',
            'view_item' => 'Просмотр сотрудников на сайте',
            'search_items' => 'Искать сотрудников',
            'not_found' => 'Сотрудников не найдено.',
            'not_found_in_trash' => 'В корзине нет сотрудников.',
            'menu_name' => 'Сотрудники'
        );
        $args = array(
            'label' => 'employee',
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-businessperson',
            'menu_position' => 20,
            'supports' => array('title', 'custom-fields', 'thumbnail'),
            'show_in_rest' => true,
        );
        register_post_type('employee', $args);
    }
endif;
add_action('init', 'astron_register_post_types');

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
    }
endif;
add_action('widgets_init', 'astron_register_sidebars');

if (!function_exists('astron_excerpt_length')) :
    /**
     * Limit excerpt 50 words
     */
    function astron_excerpt_length()
    {
        global $post;
        if ($post->post_type == 'post')
            return 50;
        else if ($post->post_type == 'vacancies')
            return 27;
    }
endif;
add_filter('excerpt_length', 'astron_excerpt_length');

if (!function_exists('astron_excerpt_more')) :
    /**
     * Update excerpt
     */
    function astron_excerpt_more($more)
    {
        return '...';
    }
endif;
add_filter('excerpt_more', 'astron_excerpt_more');

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

if (!function_exists('astron_breadcrumbs')) :
    /**
     * Add breadcrumbs support
     */
    function astron_breadcrumbs($is_vacancies_page = false)
    {
        global $post;
        if (!is_home()) {
            echo '<a href="' . site_url() . '">Home</a> / ';
            if (is_single()) {
                if (!$is_vacancies_page) {
                    $category_id = get_cat_ID('All');
                    $category_link = get_category_link($category_id);
                    echo '<a href="' . $category_link . '">Blog</a>';
                } else {
                    $vacancies_page_link = get_post_type_archive_link('vacancies');
                    echo '<a href="' . $vacancies_page_link . '">Vacancies</a>';
                }
                echo " / ";
                the_title();
            } elseif (is_page()) {
                if ($post->post_parent) {
                    $parent_id = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    foreach ($breadcrumbs as $crumb) echo $crumb . ' / ';
                }
                echo the_title();
            }
        }
    }
endif;

if (!function_exists('astron_posts_link_prev_class')) :
    function astron_posts_link_prev_class($format)
    {
        $format = str_replace('href=', 'class="button" href=', $format);
        return $format;
    }

    add_filter('previous_post_link', 'astron_posts_link_prev_class');
endif;

if (!function_exists('astron_posts_link_next_class')) :
    function astron_posts_link_next_class($format)
    {
        $format = str_replace('href=', 'class="button" href=', $format);
        return $format;
    }
endif;
add_filter('next_post_link', 'astron_posts_link_next_class');

if (!function_exists('astron_loadmore_ajax_handler')) :
    function astron_loadmore_ajax_handler()
    {
        $args = json_decode(stripslashes($_POST['query']), true);
        $args['paged'] = $_POST['page'] + 1;
        $args['post_status'] = 'publish';

        query_posts($args);

        echo '<div class="col-12"><h2>Page #' . $args['paged'] . '</h2></div>';

        if (have_posts()) :

            while (have_posts()): the_post();

                get_template_part('templates/content', $args['post_type'] === 'vacancy' ? 'grid' : 'list');

            endwhile;

        endif;
        die;
    }
endif;
add_action('wp_ajax_loadmore', 'astron_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'astron_loadmore_ajax_handler');

require get_template_directory() . '/inc/contacts-page-settings.php';