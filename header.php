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
                'theme_location' => 'site-menu',
                'container' => 'nav',
                'container_class' => 'site-nav',
                'menu_class' => 'site-nav__list'
            )); ?>

            <div class="site-header__utils">
                <a href="<?php echo get_permalink('11') ?>" class="button">Submit an application</a>
            </div>
        </div>
    </div>
</header>
