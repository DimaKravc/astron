<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nobrand
 * @version 1.1.0
 */

get_header();
?>
    <div class="site-spacer__primary site-spacer__primary_no_indents">
        <?php if (have_posts()):
            while (have_posts()) {
                the_post();
                get_template_part('templates/content');
            }
        endif; ?>
    </div>
<?php
get_footer();
