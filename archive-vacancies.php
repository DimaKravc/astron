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
            <h1 class="page-title">Partner vacancies</h1>
            <div class="row">
                <div class="col-12">
                    <?php if (have_posts()) {
                        global $wp_query;

                        echo '<div class="row">';

                        while (have_posts()) {
                            the_post();

                            get_template_part('templates/content', 'grid');
                        }

                        echo '<div data-js="posts-area"></div>';

                        echo '</div>';

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