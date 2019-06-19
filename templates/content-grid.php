<?php
/**
 * Template part for displaying posts.
 *
 * @package Nobrand
 */

$post_class = array(
    'post-grid'
);
?>

<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    <article id="post-grid-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
        <div class="post-grid__top">
            <header class="post-grid__header">
                <h3 class="post-grid__title"><a href="<?php echo esc_url(get_permalink()) ?>"
                                                rel="bookmark"><?php the_title() ?></a></h3>
                <div class="post-grid__company"><?php echo get_post_meta(get_the_ID(), 'company')[0] ?></div>
            </header>
            <div class="post-grid__content">
                <?php echo get_the_excerpt(); ?>
            </div>
        </div>
        <footer class="post-grid__footer">
            <a href="<?php echo esc_url(get_permalink()) ?>">Respond</a>
        </footer>
    </article>
</div>
