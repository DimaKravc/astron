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
    the_post_navigation(array(
        'prev_text' => sprintf(esc_html__('%s Prev Post', 'astron'), '<span class="icon-arrow-left"></span>'),
        'next_text' => sprintf(esc_html__('Next Post %s', 'astron'), '<span class="icon-arrow-right"></span>'),
    ));
endif; ?>
<?php
get_footer();
