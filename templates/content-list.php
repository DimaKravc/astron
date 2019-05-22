<?php
/**
 * Template part for displaying posts.
 *
 * @package Nobrand
 */

$post_class = array(
    'post',
    ! has_post_thumbnail() ? 'post_no_thumbnail' : '',
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
    <div class="post__thumbnail">
        <a href="<?php echo esc_url(get_permalink()) ?>">
            <?php the_post_thumbnail('astron_small_thumb', array('alt' => get_the_title())); ?>
        </a>
    </div>
    <div class="post__primary">
        <header class="post__header">
            <h3 class="post__title">
                <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark"><?php the_title() ?></a>
            </h3>
            <div class="post__date">
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
        <div class="post__content">
            <?php echo get_the_excerpt(); ?>
        </div>
        <footer class="post__footer">
            <div class="post__share">
                <ul class="social-list">
                    <li class="social-list__item">
                        <a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink()) ?>"
                           target="_blank"><i class="icon-fb"></i></a>
                    </li>
                    <li class="social-list__item">
                        <a href="<?php echo esc_url('https://vk.com/share.php?url=' . get_the_permalink()) ?>"
                           target="_blank"><i class="icon-vk"></i></a>
                    </li>
                    <li class="social-list__item">
                        <a href="<?php echo esc_url('https://telegram.me/share/url?url=' . get_permalink() . '&text=' . get_the_title() . '') ?>"
                           target="_blank"><i class="icon-tg"></i></a>
                    </li>
                </ul>
            </div>
            <a href="<?php echo esc_url(get_permalink()) ?>" class="button">Read more</a>
        </footer>
    </div>
</article>
