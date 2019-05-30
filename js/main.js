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

        entrySlider: function () {
            $('[data-js="entry-slider"]').owlCarousel({
                items: 1,
                nav: true,
                animateOut : 'fadeOut',
                animateIn: 'fadeIn',
                mouseDrag: false
            });
        },

        focusSlider: function () {
            $('[data-js="slider-for-1"]').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '[data-js="slider-nav-1"]'
            });
            $('[data-js="slider-nav-1"]').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '[data-js="slider-for-1"]',
                dots: false,
                arrows: false,
                centerMode: false,
                focusOnSelect: true
            });
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
        },

        loadMorePost: function () {
            $('[data-js="load-more-btn"]').on('click', function (e) {
                e.preventDefault();

                var button = $(this),
                    data = {
                        'action': 'loadmore',
                        'query': window.localize_array.posts,
                        'page': window.localize_array.current_page
                    };

                $.ajax({
                    url: window.localize_array.ajax_url,
                    data: data,
                    type: 'POST',
                    beforeSend: function (xhr) {
                        button.text('Loading...');
                    },
                    success: function (data) {
                        if (data) {
                            window.localize_array.current_page++
                            button.text('More posts')
                            $('[data-js="posts-area"]').before(data).slideDown('slow');
                            if (window.localize_array.current_page == window.localize_array.max_page)
                                button.remove();
                        } else {
                            button.remove();
                        }
                    }
                });
            })
        },

        // scrollToTop: function () {
        //     if (Application.isMobile) return;
        //     var $toggle = $('[data-js="scroll-to-top"]');
        //     var $toggleDefaultBottom = $toggle.css('bottom');
        //     var $footer = $('[data-js="bottom-panel"]');
        //     $(window).on('scroll load resize', function () {
        //         var $this = $(this);
        //         if ($this.scrollTop() > 800) {
        //             $toggle.addClass('scroll-to-top_is_visible')
        //         } else {
        //             $toggle.removeClass('scroll-to-top_is_visible')
        //         }
        //
        //         if ($this.scrollTop() + $this.height() >= $footer.offset().top) {
        //             var $offset = $this.scrollTop() + $this.height() - $footer.offset().top + 30;
        //             $toggle.css('bottom', $offset);
        //         } else {
        //             $toggle.css('bottom', $toggleDefaultBottom)
        //         }
        //     });
        //
        //     $toggle.on('click', function () {
        //         $('html, body').animate({scrollTop: 0}, 600);
        //         return false;
        //     });
        // },

        formGroup: function () {
            const groupNode = $('[data-js="form-group"]');

            groupNode
                .find('input, textarea')
                .focus(function () {
                    $(this).closest(groupNode).addClass('transform-label')
                })
                .blur(function () {
                    $(this).closest(groupNode).removeClass($(this).val() === '' ? 'transform-label' : '')
                });

            $(".wpcf7").on('wpcf7:mailsent', function (event) {
                setTimeout(function () {
                    groupNode
                        .find('input, textarea')
                        .each(function (index, value) {
                            $(value).closest(groupNode).removeClass($(value).val() === '' ? 'transform-label' : '')
                        })
                }, 1000)
            });
        },

        tabs: function () {
            const toggleNode = $('[data-target]');
            const entryNode = $('[data-entry]');

            toggleNode.on('click', function (e) {
                e.preventDefault();

                const target = $(this).data('target');

                toggleNode.each(function (index, node) {
                    if ($(node).data('target') !== target) {
                        $(node).show()
                    } else {
                        $(node).fadeOut()
                    }
                });
                entryNode.fadeOut();

                $('[data-entry="' + target + '"]').fadeIn();
            })
        }
    });
});
