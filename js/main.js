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
                animateOut: 'fadeOut',
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

                let button = $(this),
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
        //     let $toggle = $('[data-js="scroll-to-top"]');
        //     let $toggleDefaultBottom = $toggle.css('bottom');
        //     let $footer = $('[data-js="bottom-panel"]');
        //     $(window).on('scroll load resize', function () {
        //         let $this = $(this);
        //         if ($this.scrollTop() > 800) {
        //             $toggle.addClass('scroll-to-top_is_visible')
        //         } else {
        //             $toggle.removeClass('scroll-to-top_is_visible')
        //         }
        //
        //         if ($this.scrollTop() + $this.height() >= $footer.offset().top) {
        //             let $offset = $this.scrollTop() + $this.height() - $footer.offset().top + 30;
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
        },

        popup: function () {
            $(document).ready(function () {
                $('.popup-with-zoom-anim').magnificPopup({
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = this.st.el.attr('data-effect');
                        }
                    }
                });
            });
        },

        uploadFileArea: function () {
            let isAdvancedUpload = function () {
                let div = document.createElement('div');
                return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
            }();

            $('[data-js="upload-file"]').each(function (index, form) {
                let $form = $(form),
                    $input = $form.find('input[type="file"]'),
                    $label = $form.find('label'),
                    $icons = $form.find('i[class*="icon-"]'),
                    showFiles = function (files) {
                        $icons.removeClass('is-active');
                        if (!files.map) {
                            files.map = [].map
                        }

                        files.map(function (currentValue, index, arr) {
                           if (currentValue.type === 'application/pdf') {
                               $icons.each(function () {
                                   if ($(this).hasClass('icon-pdf')) {
                                       $(this).addClass('is-active');
                                   }
                               })
                           } else if (currentValue.type === 'application/msword' || 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                               $icons.each(function () {
                                   if ($(this).hasClass('icon-doc')) {
                                       $(this).addClass('is-active');
                                   }
                               })
                           }
                        });
                        $label.html(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
                    };
                $input.on('change', function (e) {
                    showFiles(e.target.files);
                });

                if (isAdvancedUpload) {
                    ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(function (event) {
                        form.addEventListener(event, function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                        });
                    });
                    ['dragover', 'dragenter'].forEach(function (event) {
                        form.addEventListener(event, function () {
                            form.classList.add('is-dragover');
                        });
                    });
                    ['dragleave', 'dragend', 'drop'].forEach(function (event) {
                        form.addEventListener(event, function () {
                            form.classList.remove('is-dragover');
                        });
                    });
                    form.addEventListener('drop', function (e) {
                        let files = [].slice.call(e.dataTransfer.files).filter(function (file) {
                            return file.type === 'application/pdf' ||
                                file.type === 'application/msword' ||
                                file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

                        });
                        showFiles(files);
                    });
                }
            })
        },

        embedContent: function () {
            $.fn.fitVids = function (options) {
                let settings = {
                    customSelector: null,
                    ignore: null
                };

                if (!document.getElementById('fit-vids-style')) {
                    // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
                    let head = document.head || document.getElementsByTagName('head')[0];
                    let css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
                    let div = document.createElement("div");
                    div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
                    head.appendChild(div.childNodes[1]);
                }

                if (options) {
                    $.extend(settings, options);
                }

                return this.each(function () {
                    let selectors = [
                        'iframe[src*="player.vimeo.com"]',
                        'iframe[src*="youtube.com"]',
                        'iframe[src*="youtube-nocookie.com"]',
                        'iframe[src*="kickstarter.com"][src*="video.html"]',
                        'object',
                        'embed'
                    ];

                    if (settings.customSelector) {
                        selectors.push(settings.customSelector);
                    }

                    let ignoreList = '.fitvidsignore';

                    if (settings.ignore) {
                        ignoreList = ignoreList + ', ' + settings.ignore;
                    }

                    let $allVideos = $(this).find(selectors.join(','));
                    $allVideos = $allVideos.not('object object'); // SwfObj conflict patch
                    $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

                    $allVideos.each(function (count) {
                        let $this = $(this);
                        if ($this.parents(ignoreList).length > 0) {
                            return; // Disable FitVids on this video.
                        }
                        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) {
                            return;
                        }
                        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width')))) {
                            $this.attr('height', 9);
                            $this.attr('width', 16);
                        }
                        let height = (this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10)))) ? parseInt($this.attr('height'), 10) : $this.height(),
                            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
                            aspectRatio = height / width;
                        if (!$this.attr('id')) {
                            let videoID = 'fitvid' + count;
                            $this.attr('id', videoID);
                        }
                        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100) + '%');
                        $this.removeAttr('height').removeAttr('width');
                    });
                });
            };
            $("body").fitVids({
                customSelector: [
                    "iframe[src*='youtu.be']",
                    "iframe[src*='blip.tv']",
                    "iframe[src*='dailymotion.com']",
                    "iframe[src*='spotify.com']",
                    "iframe[src*='slideshare.net']",
                    "iframe[src*='vimeo.com']"
                ],
                ignore: ["iframe[src*='soundcloud.com']"]
            });
        }
    });
});
