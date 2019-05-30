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
    <div class="container">
        <div class="entry-slider owl-carousel" data-js="entry-slider">
            <div class="entry-slider-item">
                <div class="entry-slider-item__row row">
                    <div class="col-12 col-xl-6">
                        <div class="entry-slider-item__caption">VENTURE CAPITAL FUND</div>
                        <h2 class="entry-slider-item__title">In search of disruptive</h2>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="entry-slider-item__figure">
                            <img src="<?php echo get_template_directory_uri() . '/images/entry-slide.png' ?>"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="entry-slider-item">
                <div class="entry-slider-item__row row">
                    <div class="col-12 col-xl-6">
                        <div class="entry-slider-item__caption">VENTURE CAPITAL FUND</div>
                        <h2 class="entry-slider-item__title">What are Venture Capital Fund?</h2>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="entry-slider-item__figure">
                            <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-2.png' ?>"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="entry-slider-item">
                <div class="entry-slider-item__row row">
                    <div class="col-12 col-xl-6">
                        <div class="entry-slider-item__caption">VENTURE CAPITAL FUND</div>
                        <h2 class="entry-slider-item__title">Announcement of results and actions</h2>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="entry-slider-item__figure">
                            <img src="<?php echo get_template_directory_uri() . '/images/entry-slide-3.png' ?>"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-spacer no-indents">
        <section class="section-interview angle--top-right">
            <div class="container">
                <h2 class="section-interview__title slashed">
                    <div class="slashed__top" title="About us"></div>
                    <div class="slashed__bottom" title="About us"></div>
                </h2>
                <div class="section-interview__row row">
                    <div class="col-12 col-xl-6 section-interview__col">
                        <h3 class="section-interview__caption">What are Venture<br>Capital Fund?</h3>
                        <p class="section-interview__text">Venture capital funds are investment funds that manage the
                            money of investors who seek private equity stakes in startup and small- to medium-sized
                            enterprises with strong growth potential. These investments are generally characterized as
                            high-risk/high-return opportunities.</p>
                    </div>
                    <div class="col-12 col-xl-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/demo.jpg' ?>" alt="">
                    </div>
                </div>
                <div class="section-interview__row row">
                    <div class="col-12 col-xl-6">
                        <img src="<?php echo get_template_directory_uri() . '/images/demo3.jpg' ?>" alt="">
                    </div>
                    <div class="col-12 col-xl-6 section-interview__col">
                        <h3 class="section-interview__caption">What makes<br>a startup competitive?</h3>
                        <p class="section-interview__text">The sharp growth of the audience, the constant introduction
                            of know-how, forcing competitors catch up with you. Forever tighten the laces will not, and
                            once a startup begins to hunt for investors (often unaware that he became the object of
                            interest).</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-worksteps angle--top-right">
            <div class="container">
                <h2 class="section-worksteps__title slashed">
                    <div class="slashed__top" title="Worksteps"></div>
                    <div class="slashed__bottom" title="Worksteps"></div>
                </h2>
                <ol class="section-worksteps__list">
                    <li class="section-worksteps__item workstep-item">
                        <h3 class="workstep-item__title">You submit a completed resume</h3>
                        <p class="workstep-item__text">You send your completed resume to our e-mail or fill it out on
                            this page.</p>
                    </li>
                    <li class="section-worksteps__item workstep-item">
                        <h3 class="workstep-item__title">Analysis and internal interviews</h3>
                        <p class="workstep-item__text">We receive your resume, analyze it and pass it to the focus group
                            for further processing. Then pass the data to the chief Manager</p>
                    </li>
                    <li class="section-worksteps__item workstep-item">
                        <h3 class="workstep-item__title">Announcement of results and actions</h3>
                        <p class="workstep-item__text">Depending on the decision of the General Manager. We give you
                            dividends or send you a refusal letter</p>
                    </li>
                </ol>
            </div>
        </section>
        <section class="section-overviews">
            <div class="container">
                <h2 class="section-worksteps__title slashed">
                    <div class="slashed__top" title="Overviews"></div>
                    <div class="slashed__bottom" title="Overviews"></div>
                </h2>
                <p class="section-overviews__text">We do not have fake reviews, call and see for yourself the quality of
                    work.</p>
            </div>
        </section>
        <section class="section-request-promo angle--top-right">
            <div class="container">
                <p class="section-request-promo__promo-text">We are eager to help you and that you are not lost among
                    the crowd stand out!</p>
                <p class="section-request-promo__request-text">Leave a request for dividends</p>
                <a href="<?php echo get_permalink('89') ?>" class="button">Fill</a>
            </div>
        </section>
    </div>
<?php
get_footer();