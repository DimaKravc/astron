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
<html <?php language_attributes(); ?>>
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
<button class="button scroll-to-top" data-js="scroll-to-top"><i class="icon-arrow-up"></i></button>
<header class="site-header angle--bottom-left">
    <div class="container">
        <div class="site-header__inner">
            <div class="site-brand">
                <?php if (!is_home() || is_paged()) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php endif; ?>
                    <img src="<?php echo get_template_directory_uri() . '/images/astron-logo.svg' ?>"
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

            <div class="site-header__utils hidden-sm hidden-xs">
                <a href="<?php echo get_permalink('11') ?>" class="button">Submit an application</a>
                <?php astron_language_select() ?>
            </div>

            <button class="mob-nav-toggle hidden-lg hidden-md" data-js="mob-nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>
<div class="mob-nav-overlay angle--bottom-left hidden-lg hidden-md" data-js="mob-nav-overlay">
    <div class="container">
        <div class="mob-nav-overlay__inner">
            <?php astron_language_select() ?>
            <div class="site-brand">
                <?php if (!is_home() || is_paged()) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php endif; ?>
                    <img src="<?php echo get_template_directory_uri() . '/images/astron-logo.svg' ?>"
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
