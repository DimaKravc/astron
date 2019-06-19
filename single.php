<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nobrand
 * @version 1.1.0
 */

get_header();
?>
<?php if (have_posts()):
    while (have_posts()) {
        the_post();
        get_template_part('templates/content');
    }
endif; ?>
<?php
get_footer();
