<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astron
 * @version 1.0.0
 */

get_header();
?>

    <div class="site-spacer__primary">
        <div class="container">
            <h1 class="page-title">Blog</h1>
            <div class="row">
                <div class="col-12 col-lg-3 col-xl-3"><?php if (is_active_sidebar('sidebar')) {
                        dynamic_sidebar('sidebar');
                    } ?>
                </div>
                <div class="col-12 col-lg-8 col-xl-8">
                    <?php if (have_posts()) {
                        global $wp_query;

                        while (have_posts()) {
                            the_post();

                            get_template_part('templates/content', 'list');
                        }

                        echo '<div data-js="posts-area"></div>';

                        if ($wp_query->max_num_pages > 1):?>
                            <nav class="load-more">
                                <button class="button" data-js="load-more-btn">Load more</button>
                            </nav>
                        <?php endif;
                    } ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
