<?php
/**
 * Template part for displaying posts.
 *
 * @package Nobrand
 */

$post_class = array(
    'post'
);
?>

<div class="col-12 col-lg-6 col-xl-3">
    <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
        <div>
            <header class="post__header">
                <h3 class="post__title"><a href="<?php echo esc_url(get_permalink()) ?>"
                                           rel="bookmark"><?php the_title() ?></a></h3>
                <div class="post__company"><?php echo get_post_meta(get_the_ID(), 'company')[0] ?></div>
            </header>
            <div class="post__content">
                <?php echo get_the_excerpt(); ?>
            </div>
        </div>
        <footer class="post__footer">
            <a href="<?php echo esc_url(get_permalink()) ?>">Respond</a>
        </footer>
    </article>
</div>
