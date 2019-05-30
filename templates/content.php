<?php
/**
 * Template part for displaying posts.
 *
 * @package Nobrand
 */

?>

<article id="post-<?php the_ID(); ?>" class="post-single">
    <header class="post-single__header">
        <h1 class="post-single__title"><?php the_title(); ?></h1>
        <div class="post-single__date">
            <?php
            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            $time_string = sprintf($time_string,
                esc_attr(get_the_date('c')),
                get_the_date()
            );
            echo sprintf(wp_kses($time_string, array('time' => array('class' => array(), 'datetime' => array()))), esc_attr(get_the_date('c')), get_the_date());
            ?>
        </div>
    </header>
    <?php the_content(); ?>
</article>
