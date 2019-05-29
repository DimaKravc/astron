<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nobrand
 * @version 1.1.0
 */

get_header();
?>
    <div>
        <div class="container">
            <div class="breadcrumbs">
                <?php astron_breadcrumbs(true); ?>
            </div>
        </div>
    </div>
    <div class="site-spacer">
        <div class="container">
            <?php if (have_posts()):
                while (have_posts()) {
                    the_post();
                    get_template_part('templates/content');
                }
            endif; ?>
        </div>
    </div>
<?php
get_footer();
