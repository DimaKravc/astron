<?php
/**
 * The template for displaying submit app page.
 * Template Name: Submit App Page Layout
 *
 * @package Astron
 * @version 1.0.0
 */
?>

<?php get_header();

$options = get_option('contacts_options');
?>
<div class="site-spacer">
    <div class="container app-form">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-6 col-xl-5">
                <h2 class="app-form__title"><?php single_post_title() ?></h2>
                <p class="app-form__desc">Venture capital funds are investment funds that manage the money of investors
                    who seek private equity
                    stakes in startup and small- to medium-sized enterprises with strong growth potential. These
                    investments are generally characterized as high-risk/high-return opportunities.</small></p>
                <p>
                    <button class="button app-form__offline-toggle">fill out the form offline</button>
                </p>
                <p class="app-form__desc">Venture capital funds are investment funds that manage the money of investors
                    who seek private equity stakes in startup and.</p>
            </div>
            <div class="hidden-xs col-1"></div>
            <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                <form action="#" class="form">
                    <fieldset>
                        <legend>Company information</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="form__group" data-js="form-group">
                                    <label for="1">Company name</label>
                                    <input type="text" id="1">
                                    <span class="amount-allowed">140 sym</span>
                                </div>
                                <div class="form__group" data-js="form-group">
                                    <label for="#">what do you need to get your product in the market?</label>
                                    <textarea rows="5"></textarea>
                                    <span class="amount-allowed">140 sym</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>stage of development</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="form__group form__group_no_indents">
                                    <input type="radio" id="2">
                                    <label for="2">idea</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form__group form__group_no_indents">
                                    <input type="radio" id="3">
                                    <label for="3">prototype</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form__group">
                                    <input type="radio" id="5">
                                    <label for="5">idea business plan</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form__group">
                                    <input type="radio" id="6">
                                    <label for="6">beta version</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form__group" data-js="form-group">
                                    <label for="#">tower</label>
                                    <input type="text" id="1">
                                    <span class="amount-allowed">140 sym</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form__group" data-js="form-group">
                                    <label for="#">city</label>
                                    <input type="text" id="1">
                                    <span class="amount-allowed">140 sym</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
