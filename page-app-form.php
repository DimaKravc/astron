<?php
/**
 * The template for displaying submit app page.
 * Template Name: Submit App Page Layout
 *
 * @package Astron
 * @version 1.0.0
 */
?>

<?php get_header(); ?>
    <div class="site-spacer no-indents">
        <div class="container app-form">
            <div class="row">
                <div class="col-12 col-xl-5">
                    <h2 class="app-form__title">DO NOT FORGET TO FILL IN ALL FIELDS.</h2>
                    <p class="app-form__desc">Venture capital funds are investment funds that manage the money of
                        investors
                        who seek private equity
                        stakes in startup and small- to medium-sized enterprises with strong growth potential. These
                        investments are generally characterized as high-risk/high-return opportunities.</small></p>
                    <p>
                        <button class="button app-form__offline-toggle" data-target="offline-form">fill out the form
                            offline
                        </button>
                    </p>
                    <p class="app-form__desc">Venture capital funds are investment funds that manage the money of
                        investors
                        who seek private equity stakes in startup and.</p>
                </div>
                <div class="hidden-xs col-1"></div>
                <div class="col-12 col-xl-6">
                    <div data-entry="online-form">
                        <?php if (have_posts()) :
                            while (have_posts()) {
                                the_post();
                                the_content('');
                            }
                        endif; ?>
                    </div>
                    <div data-entry="offline-form" style="display: none;">
                        <div class="app-form-off">
                            <header class="app-form-off__header">
                                <button class="app-form-off__back-link" data-target="online-form">Back to online mode
                                </button>
                            </header>
                            <section class="app-form-off__section">
                                <h2>Offline form</h2>
                                <p>You have a unique opportunity to fill out our form by discussing with
                                    your team.</p>
                            </section>
                            <section class="app-form-off__section">
                                <h3>Instructions</h3>
                                <ol>
                                    <li>You download the offline form in a convenient format</li>
                                    <li>After discussing with the team, fill out the form in the file</li>
                                    <li>Completed document send us e-mail <b><a href="mailto:response@astron.uk.com">response@astron.uk.com</a></b>
                                    </li>
                                </ol>
                            </section>
                            <section class="app-form-off__section">
                                <h3>Files for download</h3>
                                <ul class="docs-list">
                                    <li class="docs-list__item">
                                        <a href="#" download>
                                            <i class="icon-xls"></i>
                                            Astron.xls
                                        </a>
                                    </li>
                                    <li class="docs-list__item">
                                        <a href="#" download>
                                            <i class="icon-pdf"></i>
                                            Astron.pdf
                                        </a>
                                    </li>
                                    <li class="docs-list__item">
                                        <a href="#" download>
                                            <i class="icon-doc"></i>
                                            Astron.docx
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>