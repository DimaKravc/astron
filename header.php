<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section.
 *
 * @package Astron
 * @version 1.0.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin: 0 !important;">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <?php if (!function_exists('has_site_icon') || !has_site_icon()) : ?>
        <link rel="shortcut icon"
              href="<?php echo esc_url(get_theme_mod('header=>favicon', get_template_directory_uri() . '/images/bg/favicon.png')) ?>">
    <?php else :
        wp_site_icon();
    endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (is_page_template('page-app-form.php')): ?>
    <header class="site-header site-header_sticky angle angle_bottom_left angle_no_indent angle_offset_scroll">
        <div class="container">
            <div class="site-header__inner">
                <div class="site-header__top-row">
                    <div class="site-brand">
                        <?php if (!is_home() || is_paged()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php endif; ?>
                            <img src="<?php echo get_template_directory_uri() . '/images/site-logo.svg' ?>"
                                 alt="<?php bloginfo('name') ?>">
                            <?php if (!is_home() || is_paged()) : ?>
                        </a>
                    <?php endif; ?>
                    </div>

                    <?php wp_nav_menu(array(
                        'theme_location' => 'site-nav',
                        'container' => 'nav',
                        'container_class' => 'site-nav hidden-sm hidden-xs',
                        'menu_class' => 'site-nav__list'
                    )); ?>

                    <div class="hidden-sm hidden-xs">
                        <a href="<?php echo get_permalink('89') ?>" class="button button_min_width">apply now</a>
                    </div>

                    <button class="mob-nav-toggle hidden-lg hidden-md" data-js="mob-nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="site-header__bottom-row">
                    <?php astron_language_select() ?>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
<div id="smoothScroll" class="scroll" data-scrollbar>
    <div class="site-spacer <?php if (is_page_template('page-app-form.php')) echo 'is-header-sticky'; ?>">
        <button class="button scroll-to-top" data-js="scroll-to-top"><i class="icon-arrow-up"></i></button>
        <?php if (!is_page_template('page-app-form.php')): ?>
            <header class="site-header angle angle_bottom_left angle_no_indent">
                <div class="container">
                    <div class="site-header__top-row">
                        <div class="site-brand">
                            <?php if (!is_home() || is_paged()) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php endif; ?>
                                <img src="<?php echo get_template_directory_uri() . '/images/site-logo.svg' ?>"
                                     alt="<?php bloginfo('name') ?>">
                                <?php if (!is_home() || is_paged()) : ?>
                            </a>
                        <?php endif; ?>
                        </div>

                        <?php wp_nav_menu(array(
                            'theme_location' => 'site-nav',
                            'container' => 'nav',
                            'container_class' => 'site-nav hidden-sm hidden-xs',
                            'menu_class' => 'site-nav__list'
                        )); ?>

                        <div class="hidden-sm hidden-xs">
                            <a href="<?php echo get_permalink('89') ?>" class="button button_min_width">apply now</a>
                        </div>

                        <button class="mob-nav-toggle hidden-lg hidden-md" data-js="mob-nav-toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="site-header__bottom-row">
                        <?php astron_language_select() ?>
                    </div>
                </div>
            </header>
        <?php endif; ?>
        <div class="mob-nav-overlay hidden-lg hidden-md" data-js="mob-nav-overlay">
            <div class="container">
                <div class="mob-nav-overlay__inner">
                    <?php astron_language_select() ?>
                    <div class="site-brand">
                        <?php if (!is_home() || is_paged()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php endif; ?>
                            <img src="<?php echo get_template_directory_uri() . '/images/site-logo.svg' ?>"
                                 alt="<?php bloginfo('name') ?>">
                            <?php if (!is_home() || is_paged()) : ?>
                        </a>
                    <?php endif; ?>
                    </div>
                    <button class="mob-nav-toggle hidden-lg hidden-md" data-js="mob-nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <?php wp_nav_menu(array(
                    'theme_location' => 'site-nav',
                    'container' => 'nav',
                    'container_class' => 'site-nav site-nav_loc_mob',
                    'menu_class' => 'site-nav__list'
                )); ?>
            </div>
        </div>
