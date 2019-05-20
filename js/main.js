jQuery(document).ready(function ($) {

    'use strict';

    /**
     *  Application Init
     *  Init Application widgets and components.
     */

    Application.init({
        languageSelect: function () {
            const selectNode = $('[data-js="language-select"]');
            let prevSelectVal = selectNode.val();

            selectNode.niceSelect().on('change', function (e) {
                if (prevSelectVal !== e.target.value) window.open(e.target.value, '_self')
                prevSelectVal = e.target.value
            });

            return selectNode
        },

        mobNavOverlay: function () {
            const toggleNode = $('[data-js="mob-nav-toggle"]');
            const overlayNode = $('[data-js="mob-nav-overlay"]');
            const navListNode = $('.site-nav__list');
            let autoHeight = overlayNode.css('height', 'auto').outerHeight();

            toggleNode.on('click', function (e) {
                e.preventDefault();

                if (toggleNode.hasClass('is-active')) {
                    toggleNode.removeClass('is-active');
                    navListNode.removeClass('is-animated');
                    overlayNode
                        .removeClass('is-shown')
                        .animate({height: 0}, 350);
                } else {
                    toggleNode.addClass('is-active');
                    navListNode.addClass('is-animated');
                    overlayNode
                        .addClass('is-shown')
                        .height(0)
                        .animate({height: autoHeight}, 350);
                }

            });

            $(window).resize(function () {
                autoHeight = overlayNode.css('height', 'auto').outerHeight();
            });
        }
    });
});
