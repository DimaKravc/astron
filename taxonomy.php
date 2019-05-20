<?php
/**
 * The template for displaying custom taxonomy pages.
 *
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
            <div class="col-3"><?php if (is_active_sidebar('vacancy_sidebar')) {
                    dynamic_sidebar('vacancy_sidebar');
                } ?>
                Taxonomy
            </div>
            <div class="col-12 col-lg-8 col-xl-8 order-first order-lg-last order-xl-last">Right</div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
