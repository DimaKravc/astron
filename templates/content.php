<?php
/**
 * Template part for displaying posts.
 *
 * @package Astron
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="post">
    <header class="post__header">
        <?php if (has_post_thumbnail()): ?>
            <div class="post__thumbnail"
                 style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
        <?php elseif (get_post_type() === 'vacancies'): ?>
            <div class="post__thumbnail"
                 style="background-image: url('<?php echo get_template_directory_uri() . '/images/vacancy-placeholder.jpg'; ?>')"></div>
        <?php endif; ?>
        <div class="container">
            <h1 class="post__title post__inner-box">
                <?php the_title(); ?>
            </h1>
        </div>
    </header>
    <div class="container">
        <div class="post__content post__inner-box">
            <?php the_content(); ?>
        </div>
        <footer class="post__footer post__inner-box">
            <?php if (get_post_type() === 'vacancies'): ?>
                <div class="post__response">
                    <button class="button button_margin_auto" href="#apply-form" data-action="popup" data-effect="mfp-zoom-in">Respond</button>
                </div>
                <div class="apply-form--wrap mfp-with-anim mfp-hide" id="apply-form">
                    <?php echo do_shortcode('[contact-form-7 id="210" title="APPLYING FOR A POSITION" html_class="apply-form form"]'); ?>
                    <div class="form-status" data-form-status="success">
                        <div class="form-status__inner">
                            <h2 class="form-status__title slashed">
                                <span class="slashed__top" title="SUCCESS"></span>
                                <span class="slashed__bottom" title="SUCCESS"></span>
                            </h2>
                            <p class="form-status__msg">Your application have been sent successfully</p>
                            <button class="form-status__control button button_width_fluid button_color_accent button_size_xl" data-action="close-popup">Thank’s!</button>
                        </div>
                    </div>
                    <div class="form-status" data-form-status="error">
                        <div class="form-status__inner">
                            <h2 class="form-status__title slashed">
                                <span class="slashed__top" title="ERROR"></span>
                                <span class="slashed__bottom" title="ERROR"></span>
                            </h2>
                            <p class="form-status__msg">there was a mistake, we are already working and will soon fix everything</p>
                            <button class="form-status__control button button_width_fluid button_color_accent button_size_xl" data-action="close-popup">Thank’s!</button>
                        </div>
                    </div>
                </div>
            <?php elseif (get_post_type() === 'post'): ?>
                <div class="post__share">
                    <dl class="social-list social-list_indent_lg">
                        <dt><strong>SHARE:</strong></dt>
                        <dd>
                            <div class="social-list__item">
                                <a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink()) ?>"
                                   target="_blank"><i class="icon-fb icon-fb_color_dark icon-fb_size_lg"></i></a>
                            </div>
                            <div class="social-list__item">
                                <a href="<?php echo esc_url('https://vk.com/share.php?url=' . get_the_permalink()) ?>"
                                   target="_blank"><i class="icon-vk icon-vk_color_black icon-vk_size_lg"></i></a>
                            </div>
                            <div class="social-list__item">
                                <a href="<?php echo esc_url('https://telegram.me/share/url?url=' . get_permalink() . '&text=' . get_the_title() . '') ?>"
                                   target="_blank"><i class="icon-tg icon-tg_color_black icon-tg_size_lg"></i></a>
                            </div>
                        </dd>
                    </dl>
                </div>
            <?php endif; ?>
        </footer>
        <?php if (get_post_type() === 'post'): ?>
            <div class="post__inner-box">
                <?php
                the_post_navigation(array(
                    'prev_text' => sprintf(esc_html__(get_post_type() === 'vacancies' ? '%s Prev Vacancy' : '%s Prev Post', 'astron'), '<span class="icon-arrow-left"></span>'),
                    'next_text' => sprintf(esc_html__(get_post_type() === 'vacancies' ? 'Next Vacancy %s' : 'Next Post %s', 'astron'), '<span class="icon-arrow-right"></span>'),
                ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</article>
