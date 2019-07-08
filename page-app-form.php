<?php
/**
 * The template for displaying submit app page.
 * Template Name: Submit App Page Layout
 *
 * @package Astron
 * @version 1.0.0
 */

get_header();
?>
    <div class="site-spacer__primary site-spacer__primary_no_indents">
        <div class="container app-form">
            <div class="row">
                <div class="col-12 col-xl-5 app-form__leveler" data-ss="sticky-sidebar">
                    <div data-ss-show="first-half-of-page">
                        <h2 class="app-form__title">DO NOT FORGET TO FILL IN ALL FIELDS.</h2>
                        <p class="app-form__desc">Venture capital funds are investment funds that manage the money of
                            investors
                            who seek private equity
                            stakes in startup and small- to medium-sized enterprises with strong growth potential. These
                            investments are generally characterized as high-risk/high-return opportunities.</small></p>
                        <button class="button app-form__offline-toggle" data-aft-toggle data-aft-toggle-text="fill out the form online">fill out the form offline</button>
                    </div>
                    <div data-ss-show="second-half-of-page" style="display: none;">
                        <h2 class="app-form__title">DON'T FORGET, CLOTHES MAKE THE MAN</h2>
                        <p class="app-form__desc">Venture capital funds are investment funds that manage the money of
                            investors
                            who seek private equity
                            stakes in startup and small- to medium-sized enterprises with strong growth potential. These
                            investments are generally characterized as high-risk/high-return opportunities.</small></p>
                        <button class="button app-form__offline-toggle" data-aft-toggle data-aft-toggle-text="fill out the form online">fill out the form offline</button>
                    </div>
                </div>
                <div class="hidden-xs col-1"></div>
                <div class="col-12 col-xl-6" data-aft-form="online">
                    <div>
                        <?php echo do_shortcode('[contact-form-7 id="91" title="APPLY FOR A PROJECT" html_class="form"]'); ?>
                        <div id="partner-info-form" class="partner-info-form--wrap mfp-with-anim mfp-hide">
                            <form class="partner-info-form form" data-node="partner-info-form">
                                <fieldset>
                                    <legend>Add a new person to the team</legend>
                                    <div class="form__group" data-js="form-group">
                                        <label for="full_name">Full name</label>
                                        <input class="required" type="text" name="full_name" id="full_name" autocomplete="off">
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="form__group" data-js="form-group">
                                                <label for="current_city">Current city</label>
                                                <input class="required" type="text" name="current_city" id="current_city" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form__group" data-js="form-group">
                                                <label for="age">Age</label>
                                                <input class="required" type="tel" name="age" id="age" minlength="2" maxlength="2" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__group" data-js="form-group">
                                        <label for="role">Role within team</label>
                                        <input class="required" type="text" name="role" id="role" autocomplete="off">
                                    </div>
                                    <div class="form__group" data-js="form-group">
                                        <label for="education_background">Educational background</label>
                                        <input class="required" type="text" name="education_background" id="education_background" autocomplete="off">
                                    </div>
                                    <div class="form__group form__group_indent_no" data-js="form-group">
                                        <label for="experience">Work experience</label>
                                        <input class="required" type="text" name="experience" id="experience" autocomplete="off">
                                    </div>
                                </fieldset>
                                <footer class="partner-info-form__footer">
                                    <button type="button" class="partner-info-form__cancel" data-action="close-popup">cancel</button>
                                    <button type="submit" class="button button_size_lg button_color_accent">Add a new person</button>
                                </footer>
                            </form>
                        </div>
                        <div class="form-status" data-form-status="success">
                            <div class="form-status__inner">
                                <h2 class="form-status__title slashed">
                                    <span class="slashed__top" title="SUCCESS"></span>
                                    <span class="slashed__bottom" title="SUCCESS"></span>
                                </h2>
                                <p class="form-status__msg">Your application have been sent successfully</p>
                            </div>
                        </div>
                        <div class="form-status" data-form-status="error">
                            <div class="form-status__inner">
                                <h2 class="form-status__title slashed">
                                    <span class="slashed__top" title="ERROR"></span>
                                    <span class="slashed__bottom" title="ERROR"></span>
                                </h2>
                                <p class="form-status__msg">there was a mistake, we are already working and will soon fix everything</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6 app-form__leveler" data-aft-form="offline">
                    <div class="app-form-off">
                        <section class="app-form-off__section">
                            <h1>Offline form</h1>
                            <p>You have a unique opportunity to fill out our form by discussing with
                                your team.</p>
                        </section>
                        <section class="app-form-off__section">
                            <h3>Instructions</h3>
                            <ol class="numeric-list">
                                <li>You download the offline form in a convenient format</li>
                                <li>After discussing with the team, fill out the form in the file</li>
                                <li>Completed document send us e-mail <b><a href="mailto:response@astron.uk.com">response@astron.uk.com</a></b>
                                </li>
                            </ol>
                        </section>
                        <section class="app-form-off__section">
                            <h3>Files for download</h3>
                            <ul class="docs-list">
                                <!--                                <li class="docs-list__item">-->
                                <!--                                    <a href="#" download>-->
                                <!--                                        <i class="icon-xls"></i>-->
                                <!--                                        Astron.xls-->
                                <!--                                    </a>-->
                                <!--                                </li>-->
                                <li class="docs-list__item">
                                    <a href="<?php echo get_template_directory_uri() . '/files/astron-application-form.pdf' ?>" download>
                                        <i class="icon-pdf"></i>
                                        Astron.pdf
                                    </a>
                                </li>
                                <li class="docs-list__item">
                                    <a href="<?php echo get_template_directory_uri() . '/files/astron-application-form.docx' ?>" download>
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
<?php
get_footer();