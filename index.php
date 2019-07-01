<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astron
 * @version 1.0.0
 */

get_header();
?>
    <div class="site-spacer__primary site-spacer__primary_no_indents">
        <div class="section-entry angle angle_bottom_left angle_no_indent">
            <div class="container">
                <div class="entry-slider owl-carousel" data-js="entry-slider">
                    <div class="entry-slider-item">
                        <div class="entry-slider-item__row row">
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__caption">VENTURE CAPITAL FUND</div>
                                <h2 class="entry-slider-item__title">We provide the resources to match your ideas</h2>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__figure">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-4--top.png' ?>">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-4--bottom.png' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-slider-item">
                        <div class="entry-slider-item__row row">
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__caption">Steve Jobs</div>
                                <h2 class="entry-slider-item__title">Innovation distinguishes between a leader and a follower</h2>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__figure">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-5--top.png' ?>">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-5--bottom.png' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-slider-item">
                        <div class="entry-slider-item__row row">
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__caption">John F. Kennedy</div>
                                <h2 class="entry-slider-item__title">The best road to progress is freedom's road</h2>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__figure">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-6--top.png' ?>">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-6--bottom.png' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-slider-item">
                        <div class="entry-slider-item__row row">
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__caption">Want to expand your business?</div>
                                <h2 class="entry-slider-item__title">Get funding <br> at Astron</h2>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="entry-slider-item__figure">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-7--top.png' ?>">
                                    <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-7--bottom.png' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6"></div>
                    <div class="col-12 col-lg-6">
                        <div class="entry-slider-dots">
                            <div class="entry-slider-dots__inner">
                                <div class="entry-slider-dots__list" data-es-dots></div>
                                <div class="entry-slider-dots__marker" data-es-marker></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-interview angle angle_bottom_left angle_no_indent angle_bg_white">
            <div class="container">
                <div class="animation-on-scroll">
                    <h2 class="section-interview__title slashed">
                        <span class="slashed__top" title="About us"></span>
                        <span class="slashed__bottom" title="About us"></span>
                    </h2>
                </div>
                <?php
                $content = get_post_field('post_content', get_post(127));
                $content_parts = get_extended($content);
                echo $content_parts['main'];
                ?>
            </div>
        </section>
        <section class="section-focus-area angle angle_bottom_left angle_no_indent">
            <div class="section-focus-area__inner">
                <div class="container">
                    <h2 class="section-focus-area__title slashed">
                        <span class="slashed__top" title="Focus Area"></span>
                        <span class="slashed__bottom" title="Focus Area"></span>
                    </h2>
                    <div class="focus-area-slider owl-carousel" data-js="focus-area-slider">
                        <div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">Fintech</h2>
                                    <p class="focus-area-slider-item__text">In 2018 global investments in fintech reached $112bn led by several +$10bn megadeals and corporate VC investment in fintech
                                        totaled to $23bn. Majority of banks, insurers and investment managers are expected to partner with fintech over the next 3-5 years. Digital payments are the
                                        largest
                                        part of the market with expected transaction value totaling to $6,700,000 by 2023 at 13% annual growth rate. Other growing segments are personal finance,
                                        alternative lending and alternative finance.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-2--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-2--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">E-commerce</h2>
                                    <p class="focus-area-slider-item__text">Worldwide ecommerce sales are expected to make up to 18% of all sales in 2021 with sales volume totaling to almost $5
                                        trillion.
                                        Further development of infrastructure, increasing spending power, faster Internet and different Internet plans and cheaper smartphones are going to boost
                                        ecommerce
                                        sales all around the world. By 2040 the share of ecommerce of total sales is expected to reach 95%.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-9--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-9--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">Edtech</h2>
                                    <p class="focus-area-slider-item__text">Education technology is becoming a global phenomenon, and as distribution and platforms scale internationally, the market is
                                        projected to grow at 17% per annum, to $252bn by 2020. There are expected to be 2.7bn students worldwide by 2035. Learning should be as easy and enjoyable as
                                        spending time on social networks.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-10--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-10--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">Agritech</h2>
                                    <p class="focus-area-slider-item__text">Food and agriculture value chain is full of inefficiencies and bottlenecks. Farm management is in need to adopt a
                                        data-driven
                                        agronomy, sensors, automation and AI platforms to shift from precision to prediction to combat the issues related to soil health, food spoilage, labor shortage,
                                        trade wars and lack of access to data on commodity forecasting, seed pricing and yield information.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-11--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-11--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">Medtech</h2>
                                    <p class="focus-area-slider-item__text">The global medtech industry is expected to grow at 5.6% per year until 2024, culminating in 2024 global sales of $595bn. The
                                        growth of the market is likely to be driven by increasing adoption of telemedicine, rising incidences of chronic diseases, growing geriatric population,
                                        government
                                        initiatives, and shortage of physicians amongst others.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-12--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-12--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">E-gov</h2>
                                    <p class="focus-area-slider-item__text">E-gov solutions increase efficiency of government agencies, add to safety and transparency and activate more inclusive
                                        communication between citizens and the government.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-8--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-8--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="focus-area-slider-item">
                            <div class="focus-area-slider-item__row row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="focus-area-slider-item__title">Logistics</h2>
                                    <p class="focus-area-slider-item__text">The global logistics market will be worth $15.5tn with 92.1bn tonnes of goods being handled by 2023. Expected that more than
                                        30%
                                        of people employed in warehouse operations will do their work with help from mobile robots that move about the floor independently. Also by 2023, at least half
                                        of
                                        large global companies will use artificial intelligence, advanced analytics, and the Internet of Things in supply chain activities.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="focus-area-slider-item__figure">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-3--top.png' ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-3--bottom.png' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6"></div>
                        <div class="col-12 col-lg-6">
                            <div class="focus-area-slider-dots">
                                <div class="focus-area-slider-dots__inner">
                                    <div class="focus-area-slider-dots__list" data-fas-dots></div>
                                    <div class="focus-area-slider-dots__marker" data-fas-marker></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-worksteps angle angle_bottom_left angle_no_indent angle_bg_white">
            <div class="container">
                <div class="animation-on-scroll">
                    <h2 class="section-worksteps__title slashed">
                        <span class="slashed__top" title="Selection process"></span>
                        <span class="slashed__bottom" title="Selection process"></span>
                    </h2>
                </div>
                <div class="worksteps-list row">
                    <div class="col-xs-12 col-md-6 col-lg-4 animation-on-scroll">
                        <div class="worksteps-list__item worksteps-item">
                            <h3 class="worksteps-item__title">Application</h3>
                            <p class="worksteps-item__text">Fill out and submit the project application form</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 animation-on-scroll">
                        <div class="worksteps-list__item worksteps-item">
                            <h3 class="worksteps-item__title">Screening</h3>
                            <p class="worksteps-item__text">Once we receive your application, our team will examine your project and consider its compatibility with our investment focus</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 animation-on-scroll">
                        <div class="worksteps-list__item worksteps-item">
                            <h3 class="worksteps-item__title">First meeting</h3>
                            <p class="worksteps-item__text">If the project passes the screening stage, you will be invited to a meeting where you’ll have the chance to tell us about your venture in
                                more detail</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 animation-on-scroll">
                        <div class="worksteps-list__item worksteps-item">
                            <h3 class="worksteps-item__title">Investment analysis</h3>
                            <p class="worksteps-item__text">Our investment team will work closely with you to analyze the project’s potential</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 animation-on-scroll">
                        <div class="worksteps-list__item worksteps-item">
                            <h3 class="worksteps-item__title">Investment committee</h3>
                            <p class="worksteps-item__text">The investment committee will make the final decision regarding the project</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 animation-on-scroll">
                        <div class="worksteps-list__item worksteps-item">
                            <h3 class="worksteps-item__title">Investment offer</h3>
                            <p class="worksteps-item__text">If the project is approved, Astron VC will make an offer to fund your venture</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-request-promo angle--top-right">
            <div class="container">
                <div class="animation-on-scroll">
                    <p class="section-request-promo__promo-text">We invest in founders to bring innovation to life</p>
                </div>
                <div class="animation-on-scroll">
                    <p class="section-request-promo__request-text">Start disrupting<br>markets today</p>
                    <a href="<?php echo get_permalink('89') ?>" class="button">Apply now</a>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();