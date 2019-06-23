<?php
/**
 * The template for displaying about us page.
 * Template Name: About Us Page Layout
 *
 * @package Astron
 * @version 1.0.0
 */
?>

<?php get_header(); ?>
    <div class="site-spacer__primary">
        <div class="container">
            <?php if (have_posts()):
                while (have_posts()) {
                    echo sprintf('<h1 class="page-title">%s</h1>', get_the_title());
                    the_post();
                    the_content();
                }
            endif; ?>
        </div>
    </div>
<?php get_footer(); ?>