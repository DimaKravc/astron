<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astron
 * @version 1.0.0
 */
?>

<?php get_header(); ?>
<div class="site-spacer">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php if (is_active_sidebar('blog_sidebar')) {
                    dynamic_sidebar('blog_sidebar');
                } ?>
                Home
            </div>
            <div class="col-12 col-lg-9 col-xl-9 order-first order-lg-last order-xl-last">Right</div>
        </div>
    </div>
</div>
<?php get_footer(); ?>