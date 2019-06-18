<?php
/**
 * Template part for displaying posts.
 *
 * @package Nobrand
 */

?>

<article id="post-<?php the_ID(); ?>" class="post">
    <header class="post__header">
        <div class="post__thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
        <h1 class="post__inner-box post__title">
            <?php the_title(); ?>
        </h1>
    </header>
    <div class="post__inner-box post__content">
        <?php the_content(); ?>
    </div>
</article>
