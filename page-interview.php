<?php
/**
 * The template for displaying about us page.
 * Template Name: About Us Page Layout
 *
 * @package Astron
 * @version 1.0.0
 */
?>

<?php get_header(); ?>
    <div class="site-spacer">
        <div class="container">
            <h1 style="margin-bottom: 3.21429rem;">Interview</h1>
            <section class="interview">
                <div class="interview__row row">
                    <div class="interview__col col-12 col-lg-6">
                        <div class="interview__text">
                            <h3>What are Venture<br>
                                Capital Fund?</h3>
                            <p>
                                <small>Venture capital funds are investment funds that manage the money of investors who
                                    seek
                                    private equity stakes in startup and small- to medium-sized enterprises with strong
                                    growth
                                    potential. These investments are generally characterized as high-risk/high-return
                                    opportunities.
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="interview__col col-12 col-md-8 col-lg-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/demo.jpg' ?>" alt="">
                    </div>
                </div>
            </section>
            <section class="interview">
                <div class="interview__row row">
                    <div class="interview__col col-12 col-md-8 col-lg-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/demo.jpg' ?>" alt=""
                             style="margin-bottom: 1.875rem">
                        <div class="row">
                            <div class="col-6">
                                <img src="<?php echo get_template_directory_uri() . '/images/demo.jpg' ?>" alt="">
                            </div>
                            <div class="col-6">
                                <img src="<?php echo get_template_directory_uri() . '/images/demo.jpg' ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="interview__col col-12 col-lg-6">
                        <div class="interview__text">
                            <h3>What makes<br>
                                a startup competitive?</h3>
                            <p>
                                <small>
                                    Statistics show that on average 8 out of 10 startup companies are bound to fail.
                                    Meaning that only a few individuals are doing the right things, and most will tend
                                    to
                                    mess up at one point in their journey which will send the entire house of cards
                                    tumbling
                                    down.
                                </small>
                            </p>
                            <p>
                                <small>
                                    It is quite understandable that most will fail, that’s because startups are
                                    literally a
                                    journey into the unknown and entrepreneurs are constantly being tested in ways they
                                    have
                                    never been tested before, experiencing and enduring multiple challenges that can
                                    even
                                    breaking the best of us.
                                    It is no wonder that many fail at it!
                                </small>
                            </p>
                            <p>
                                <small>
                                    But this doesn’t have to be the case for us, by looking at the individuals who have
                                    treaded this path before us and have succeeded, may help us identify the things make
                                    a
                                    successful entrepreneur.
                                </small>
                            </p>
                            <p>
                                <small>
                                    Therefore, having said that, I do believe the followings can help in determining
                                    whether
                                    a startup will be successful or not.
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="interview">
                <div class="interview__row row">
                    <div class="interview__col col-12 col-lg-6">
                        <div class="interview__text">
                            <h3>How to maintain<br>
                                passion and motivation?</h3>
                            <p>
                                <small>
                                    You have probably heard this point so many times that it has begun to seem so
                                    cliché.
                                    Almost everyone who is successful at anything will credit passion and motivation at
                                    one
                                    point in their story. Overused as it may be, it does contribute greatly to the
                                    success
                                    of a startup.
                                </small>
                            </p>
                            <p>
                                <small>
                                    People that are successful believe in what they are doing. And the more passionate
                                    they
                                    are about it, the easier it becomes for them sell their idea to others. The
                                    successful
                                    entrepreneur feels that they can make an impact and a difference in the world and
                                    are
                                    constantly motivated by this. Successful entrepreneurs are competitive. They play to
                                    win, and they hate to lose.
                                </small>
                            </p>
                            <p>
                                <small>
                                    There is so much inertia and negativity around getting a startup off the ground,OW TO MAINTAI
                                    that if
                                    you don’t have this deep-seated passion and motivation, you will surely give up.
                                </small>
                            </p>
                            <p>
                                <small>
                                    (This is the part where I insert one of those well-known ‘passion’ Steve job quotes,
                                    but
                                    I painfully decided to leave Steve out of this one.)
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="interview__col col-12 col-md-8 col-lg-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/demo2.jpg' ?>" alt="">
                    </div>
                </div>
            </section>
            <section class="interview">
                <div class="interview__row row">
                    <div class="interview__col col-12 col-md-8 col-lg-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/demo3.jpg' ?>" alt="">
                    </div>
                    <div class="interview__col col-12 col-lg-6">
                        <div class="interview__text">
                            <h3>And your team. Who are they?</h3>
                            <p>
                                <small>
                                    Astron is a team of dynamic individuals with a passion for change management and
                                    depth
                                    in their respective areas of expertise. Our dedicated employees bring energy, fresh
                                    ideas and pride to their work.
                                </small>
                            </p>
                            <p>
                                <small>
                                    We view Astron’s culture as a competitive advantage and strive to create an
                                    environment
                                    where smart, motivated and creative people succeed. We think big and work hard. We
                                    strive for excellence in everyday interactions. We constantly push to be better. We
                                    shoot each other with Nerf guns.
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            $args = array(
                'post_type' => 'employee',
                'post_status' => 'publish',
                'posts_per_page' => 10
            );

            $posts = new WP_Query($args);
            if ($posts->have_posts()) {

                echo '<div class="row">';

                while ($posts->have_posts()): $posts->the_post(); ?>
                    <div class="col-12 col-md-4 col-xl-3">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                            <header class="post__header">
                                <div class="post__info"><?php echo get_post_meta(get_the_ID(), 'position')[0] ?></div>
                            </header>
                            <div class="post__thumbnail">
                                <?php the_post_thumbnail('astron_middle_thumb', array('alt' => get_the_title())); ?>
                            </div>
                            <footer class="post__footer">
                                <h4 class="post__title"><?php the_title() ?></h4>
                            </footer>
                        </article>
                    </div>
                <?php endwhile;

                echo '</div>';
            }
            wp_reset_query();
            ?>
        </div>
    </div>
<?php get_footer(); ?>