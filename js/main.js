jQuery(document).ready(function ($) {

    'use strict';

    /**
     *  Application Init
     *  Init Application widgets and components.
     */

    Application.init({
        sitePreloader: function () {
            let $preloaderNode = $('[data-sp]');
            let $preloaderBarNode = $('[data-spb]');
            let current_progress = 0;
            let step = Number(Math.random().toFixed(1));
            let interval = setInterval(function () {
                current_progress += step;

                let progress = Math.round(Math.atan(current_progress) / (Math.PI / 2) * 100 * 1000) / 1000;

                $preloaderBarNode.css("width", progress + "%");

                if (progress >= 100) {
                    clearInterval(interval);
                } else if (progress >= 70) {
                    step = 0.1
                }
            }, 100);

            $(window).load(function () {
                $preloaderBarNode.css("width", "100%");

                clearInterval(interval);

                setTimeout(function () {
                    $preloaderNode.fadeOut(500, function () {
                        $(this).remove();
                    });
                });
            });
        },

        smoothScroll: function () {
            let scrollbar = window.Scrollbar.init(document.querySelector('#smoothScroll'), {
                thumbMinSize: 170,
                alwaysShowTracks: true
            });
            let customThumbNode = document.createElement('span');
            let animationElNode = document.querySelectorAll('.animation-on-scroll');
            let coloredElNode = document.querySelectorAll('.colored-on-scroll');
            let scrollbarRoutine = function (position) {
                if (scrollbar.size.container.width >= 1240) {
                    if (position.offset.y >= (scrollbar.size.content.height - scrollbar.size.container.height) / 2) {
                        $('[data-ss-show="first-half-of-page"]').fadeOut(500);
                        $('[data-ss-show="second-half-of-page"]').fadeIn(700);
                    } else {
                        $('[data-ss-show="second-half-of-page"]').fadeOut(500);
                        $('[data-ss-show="first-half-of-page"]').fadeIn(700);
                    }

                    $('[data-ss="sticky-sidebar"]').css({
                        '-webkit-transform': 'translateY(' + position.offset.y + 'px)',
                        '-moz-transform': 'translateY(' + position.offset.y + 'px)',
                        '-ms-transform': 'translateY(' + position.offset.y + 'px)',
                        '-o-transform': 'translateY(' + position.offset.y + 'px)',
                        'transform': 'translateY(' + position.offset.y + 'px)'
                    });
                }

                [].forEach.call(animationElNode, function (el) {
                    if (scrollbar.isVisible(el)) {
                        let animationStartPoint = position.offset.y + (scrollbar.size.container.height / 7 * 6);
                        let animationElTopPosition = position.offset.y + el.getBoundingClientRect().top;

                        if (animationStartPoint >= animationElTopPosition) {
                            $(el).addClass('is-animated')
                        }
                    }
                });

                let customThumbNodeHeight = customThumbNode.offsetHeight;
                let customThumbNodeTopPosition = customThumbNode.getBoundingClientRect().top;

                [].forEach.call(coloredElNode, function (el) {
                    el.gradientPercent = el.gradientPercent || 0;
                    el.gradientDirection = 'to right';

                    if (scrollbar.isVisible(el)) {
                        let coloredElNodeHeight = el.offsetHeight;
                        let coloredElNodeTopPosition = el.getBoundingClientRect().top;

                        if (coloredElNodeHeight + coloredElNodeTopPosition < customThumbNodeHeight + customThumbNodeTopPosition) {
                            el.gradientDirection = 'to left';
                            el.gradientPercent = ((customThumbNodeHeight + customThumbNodeTopPosition) - (coloredElNodeHeight + coloredElNodeTopPosition)) / customThumbNodeHeight * 100;
                        } else {
                            el.gradientDirection = 'to right';
                            el.gradientPercent = (customThumbNodeHeight + customThumbNodeTopPosition - coloredElNodeTopPosition) / customThumbNodeHeight * 100;
                        }

                        if (el.gradientPercent < 0) el.gradientPercent = 0;
                        if (el.gradientPercent > 100) el.gradientPercent = 100;

                        if (el.gradientDirection === 'to left') {
                            el.gradientPercent = 100 - el.gradientPercent
                        }

                        $('.scrollbar-custom-thumb')
                            .css({
                                'background-image': '-webkit-linear-gradient(' + el.gradientDirection + ', ' + el.dataset.bg + ' 0, ' + el.dataset.bg + ' ' + el.gradientPercent + '%, black 0, black 100%)'
                            })
                            .css({
                                'background-image': '-moz-linear-gradient(' + el.gradientDirection + ', ' + el.dataset.bg + ' 0, ' + el.dataset.bg + ' ' + el.gradientPercent + '%, black 0, black 100%)'
                            })
                            .css({
                                'background-image': '-ms-linear-gradient(' + el.gradientDirection + ', ' + el.dataset.bg + ' 0, ' + el.dataset.bg + ' ' + el.gradientPercent + '%, black 0, black 100%)'
                            })
                            .css({
                                'background-image': '-o-linear-gradient(' + el.gradientDirection + ', ' + el.dataset.bg + ' 0, ' + el.dataset.bg + ' ' + el.gradientPercent + '%, black 0, black 100%)'
                            })
                            .css({
                                'background-image': 'linear-gradient(' + el.gradientDirection + ', ' + el.dataset.bg + ' 0, ' + el.dataset.bg + ' ' + el.gradientPercent + '%, black 0, black 100%)'
                            });
                    }
                });
            };

            customThumbNode.className = 'scrollbar-custom-thumb';
            customThumbNode.innerText = 'In search of disruptive';
            scrollbar.track.yAxis.thumb.element.appendChild(customThumbNode);

            $(scrollbar.containerEl).on('update', function () {
                scrollbar.setPosition(0, 0);
            });

            scrollbar.setPosition(1, 0);

            scrollbar.addListener(scrollbarRoutine);

            return scrollbar
        },

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
            let owlSlider = $('[data-js="entry-slider"]');

            owlSlider.owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                loop: true,
                items: 1,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                smartSpeed: 600,
                mouseDrag: false,
                touchDrag: false,
                responsive: {
                    0: {
                        nav: false
                    },
                    992: {
                        nav: true
                    }
                },
                dotsContainer: '[data-es-dots]',
                onInitialized: function () {
                    $('[data-es-marker]').parent().mouseenter(function () {
                        owlSlider.trigger('stop.owl.autoplay')
                    }).mouseleave(function () {
                        owlSlider.trigger('play.owl.autoplay')
                    });
                },
                onTranslate: function (e) {
                    $('[data-es-marker]').css({
                        '-webkit-transform': 'translateX(' + e.page.index * 100 + '%)',
                        '-moz-transform': 'translateX(' + e.page.index * 100 + '%)',
                        '-ms-transform': 'translateX(' + e.page.index * 100 + '%)',
                        '-o-transform': 'translateX(' + e.page.index * 100 + '%)',
                        'transform': 'translateX(' + e.page.index * 100 + '%)'
                    });
                }
            });
        },

        focusAreaSlider: function () {
            let owlSlider = $('[data-js="focus-area-slider"]');
            let updateNav = function (e) {
                let count = e.item.count;
                let offset = Math.floor((count + 1) / 2);
                let currentIndex = e.item.index;
                if (currentIndex > 0) {
                    currentIndex -= offset;
                }
                if (currentIndex >= count) {
                    currentIndex -= count;
                }
                let prevIndex = currentIndex - 1 >= 0 ? currentIndex - 1 : count - 1;
                let nextIndex = currentIndex + 1 <= count - 1 ? currentIndex + 1 : 0;
                let itemsCollection = e.relatedTarget._items;
                let $prevButtonNode = $(e.currentTarget).find('[aria-label="Previous"]');
                let $nextButtonNode = $(e.currentTarget).find('[aria-label="Next"]');

                if ($prevButtonNode.find('.owl-nav-preview').length) {
                    $prevButtonNode.find('.owl-nav-preview').fadeOut(200, function () {
                        $prevButtonNode.find('.owl-nav-preview')
                            .html($(itemsCollection[prevIndex]).find('.focus-area-slider-item__title').text())
                            .fadeIn(200);
                    });
                } else {
                    $prevButtonNode.html('<div class="owl-nav-preview" style="display: none;">' + $(itemsCollection[prevIndex]).find('.focus-area-slider-item__title').text() + '</div>');
                    $prevButtonNode.find('.owl-nav-preview').fadeIn(500);
                }

                if ($nextButtonNode.find('.owl-nav-preview').length) {
                    $nextButtonNode.find('.owl-nav-preview').fadeOut(200, function () {
                        $nextButtonNode.find('.owl-nav-preview')
                            .html($(itemsCollection[nextIndex]).find('.focus-area-slider-item__title').text())
                            .fadeIn(200);
                    });
                } else {
                    $nextButtonNode.html('<div class="owl-nav-preview" style="display: none;">' + $(itemsCollection[nextIndex]).find('.focus-area-slider-item__title').text() + '</div>');
                    $nextButtonNode.find('.owl-nav-preview').fadeIn(500);
                }
            };

            owlSlider.owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                loop: true,
                items: 1,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                smartSpeed: 600,
                mouseDrag: false,
                touchDrag: false,
                responsive: {
                    0: {
                        nav: false,
                        dots: true
                    },
                    992: {
                        nav: true,
                        dots: false
                    }
                },
                dotsContainer: '[data-fas-dots]',
                onInitialized: function (e) {
                    updateNav(e, this);

                    $('[data-fas-marker]').parent().mouseenter(function () {
                        owlSlider.trigger('stop.owl.autoplay')
                    }).mouseleave(function () {
                        owlSlider.trigger('play.owl.autoplay')
                    });
                },
                onTranslate: function (e) {
                    updateNav(e);

                    $('[data-fas-marker]').css({
                        '-webkit-transform': 'translateX(' + e.page.index * 100 + '%)',
                        '-moz-transform': 'translateX(' + e.page.index * 100 + '%)',
                        '-ms-transform': 'translateX(' + e.page.index * 100 + '%)',
                        '-o-transform': 'translateX(' + e.page.index * 100 + '%)',
                        'transform': 'translateX(' + e.page.index * 100 + '%)'
                    });
                }
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

        popup: function () {
            $(document).ready(function () {
                $('[data-action="popup"]').magnificPopup({
                    removalDelay: 500,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = this.st.el.attr('data-effect');
                        },
                        open: function () {
                            $('[data-action="close-popup"]').on('click', function () {
                                let magnificPopup = $.magnificPopup.instance;

                                magnificPopup.close();
                            });
                        }
                    }
                });
            });
        },

        formGroup: function () {
            const groupNode = $('[data-js="form-group"]');

            groupNode
                .find('input, textarea')
                .focus(function () {
                    $(this).closest(groupNode).addClass('transform-label')
                })
                .blur(function () {
                    $(this).closest(groupNode).removeClass($(this).val() === '' ? 'transform-label' : '')
                })
                .bind('update', function (e) {
                    if ($(e.currentTarget).val()) {
                        $(this).closest(groupNode).addClass('transform-label')
                    } else {
                        $(this).closest(groupNode).removeClass('transform-label')
                    }
                })
        },

        validation() {
            let $form = $('.form');
            let errorClass = 'error';
            let validClass = 'valid';

            $form.each(function (index, form) {
                $(form).validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            number: true
                        },
                        age: {
                            maxlength: 2,
                            number: true
                        }
                    },
                    errorElement: 'span',
                    unhighlight: function (element) {
                        if (element.type === 'file') {
                            let uploadFile = $(element).closest('[data-js="upload-file"]');

                            uploadFile
                                .removeClass('error')
                                .find('span.error')
                                .remove();
                        } else {
                            $(element).removeClass(errorClass).addClass(validClass);
                            $(element.form).find("label[for=" + element.id + "]")
                                .removeClass(errorClass);
                        }
                    },
                    highlight: function (element) {
                        if (element.type === 'file') {
                            let uploadFile = $(element).closest('[data-js="upload-file"]');

                            uploadFile
                                .addClass('error')
                                .append('<span class="error">' + this.submitted[element.id] + '</span>');
                        } else {
                            $(element)
                                .addClass(errorClass)
                                .removeClass(validClass);
                            $(element.form)
                                .find("label[for=" + element.id + "]")
                                .addClass(errorClass);
                        }
                    }
                });

                $(form).find('button[type="submit"], input[type="submit"]').on('click', function () {
                    if (!$(this).closest('.form').valid()) return false
                });
            });
        },

        appFormTabs: function () {
            let $toggleNode = $('[data-aft-toggle]');
            let toggleNodeText = $toggleNode.html();
            let $formNode = $('[data-aft-form]');
            let mode = ['online', 'offline'];

            $formNode.hide();
            $('[data-aft-form="' + mode[0] + '"]').show();

            $toggleNode.on('click', function (e) {
                e.preventDefault();

                $toggleNode.html($(this).attr('data-aft-toggle-text'));
                $toggleNode.attr('data-aft-toggle-text', toggleNodeText);

                toggleNodeText = $toggleNode.html();

                $formNode.hide();

                mode = mode.reverse();

                $('[data-aft-form="' + mode[0] + '"]').fadeIn();

                $(window.smoothScroll).trigger('update');
            })
        },

        appFormPartners: function () {
            let partnerInfoFormSlug = 'partner-info-form';

            let $partnerInfoForm = $('[data-node="' + partnerInfoFormSlug + '"]');
            let $showPartnerInfoForm = $('[data-action-show="' + partnerInfoFormSlug + '"]');
            let $partnerItemsBox = $('[data-node="partner-items-box"]');

            let resetForm = function (form) {
                form.validate().resetForm();
                form
                    .find('input, textarea')
                    .val('')
                    .trigger('update');
            };

            let fillForm = function (form, data) {
                form.find('input, textarea').each(function (index, element) {
                    $(element)
                        .val(data[element.getAttribute('name')] || '')
                        .trigger('update');
                });
            };

            let popup = {
                open: function (beforeOpenCallback, openCallback, beforeCloseCallback, closeCallback) {
                    $.magnificPopup.open({
                        items: {
                            src: '#' + partnerInfoFormSlug
                        },
                        type: 'inline',
                        focus: '#full_name',
                        removalDelay: 500,
                        callbacks: {
                            beforeOpen: function () {
                                this.st.mainClass = 'mfp-zoom-in';

                                if (beforeOpenCallback) beforeOpenCallback();
                            },
                            open: function () {
                                $('[data-action="close-popup"]').on('click', popup.close);

                                if (openCallback) openCallback();
                            },
                            beforeClose: function () {
                                if (beforeCloseCallback) beforeCloseCallback();
                            },
                            close: function () {
                                if (closeCallback) closeCallback();
                            }
                        }
                    });
                },
                close: function () {
                    $.magnificPopup.instance.close();
                }
            };

            let module = {
                action: '', // add, edit, remove, duplicate

                data: {},

                template: '',

                array: [],

                index: 0,

                limit: 4,

                getLength: function () {
                    return this.array.filter(function (item) {
                        return !!item
                    }).length
                },

                getData: function ($form) {
                    this.data = {};

                    $form.find('input, textarea').each(function (index, element) {
                        this.data[element.name] = $(element).val();
                    }.bind(this));
                },

                setData: function () {
                    this.array = this.array || [];

                    switch (this.action) {
                        case 'add':
                            this.array.push(this.data);
                            this.index = this.array.length - 1;
                            break;
                        case 'edit':
                            this.array[this.index] = this.data;
                            break;
                        case 'duplicate':
                            this.array.push(this.data);
                            this.index = this.array.length - 1;
                            break;
                        case 'remove':
                            delete this.array[this.index];
                            break;
                    }
                },

                generateTemplate: function () {
                    let localIndex = this.index;
                    let localData = this.data;

                    let generateHiddenFields = function (data, index) {
                        let template = '';

                        for (let key in data) {
                            template += '<input type="hidden" name="' + key + (index ? '_' + index : '') + '" value="' + data[key] + '">';
                        }

                        return template;
                    };

                    this.template = $('<div id="partner-id-' + this.index + '" class="form__group">' +
                        '        <label>' + this.data['full_name'] + ' | ' + this.data['age'] + ' y.o. | ' + this.data['role'] + '</label><input readonly/>' +
                        '        <div class="team-form-group__item-control team-item-control">' +
                        '            <button type="button" class="team-item-control__button"></button>' +
                        '            <ul class="team-item-control__list">' +
                        '                <li class="team-item-control__item">' +
                        '                    <button class="team-item-control__item__button" type="button" data-action="edit-partner-info">Edit</button>' +
                        '                </li>' +
                        '                <li class="team-item-control__item">' +
                        '                    <button class="team-item-control__item__button" type="button" data-action="duplicate-partner-info">Duplicate</button>' +
                        '                </li>' +
                        '                <li class="team-item-control__item">' +
                        '                    <button class="team-item-control__item__button" type="button" data-action="remove-partner-info">Remove</button>' +
                        '                </li>' +
                        '            </ul>' +
                        '        </div>' +
                        generateHiddenFields(this.data, this.index + 1) +
                        '</div>');

                    $('[data-action="edit-partner-info"]', this.template).on('click', function () {
                        this.action = 'edit';
                        this.index = localIndex;
                        this.data = localData;
                        popup.open(null, fillForm.bind(null, $partnerInfoForm, this.data), resetForm.bind(null, $partnerInfoForm), null);
                    }.bind(this));

                    $('[data-action="duplicate-partner-info"]', this.template).on('click', function () {
                        if (this.getLength() >= this.limit) return;
                        this.action = 'duplicate';
                        this.data = localData;
                        this.setData();
                        this.generateTemplate();
                        this.setTemplate();
                    }.bind(this));

                    $('[data-action="remove-partner-info"]', this.template).on('click', function () {
                        this.action = 'remove';
                        this.index = localIndex;
                        this.setData();
                        this.setTemplate();
                    }.bind(this));
                },

                setTemplate() {
                    switch (this.action) {
                        case 'edit':
                            $partnerItemsBox.find('#partner-id-' + this.index + '').replaceWith(this.template);
                            break;
                        case 'duplicate':
                            $partnerItemsBox.append(this.template);
                            break;
                        case 'add':
                            $partnerItemsBox.append(this.template);
                            break;
                        case 'remove':
                            $partnerItemsBox.find('#partner-id-' + this.index + '').replaceWith('');
                            break;
                    }

                    $showPartnerInfoForm.attr('disabled', this.getLength() >= this.limit);
                    $('[data-action="duplicate-partner-info"]').attr('disabled', this.getLength() >= this.limit);
                    $('#partner-amount').val(this.getLength());
                },

                init: function () {
                    $showPartnerInfoForm.on('click', function (e) {
                        e.preventDefault();

                        if (this.getLength() >= this.limit) return;

                        this.action = 'add';

                        popup.open(null, null, resetForm.bind(null, $partnerInfoForm), null);
                    }.bind(this));

                    $partnerInfoForm.on('submit', function (e) {
                        e.preventDefault();

                        if (!$partnerInfoForm.valid()) return;

                        this.getData($partnerInfoForm);

                        this.setData();

                        this.generateTemplate();

                        this.setTemplate();

                        popup.close();
                    }.bind(this));
                }
            };

            module.init();
        },

        wpcf7: function () {
            let $wpcf7 = $('.wpcf7');
            let $formNode = $wpcf7.find('form');

            // $wpcf7.on('wpcf7:mailsent', function () {
            //     let $this = $(this);
            //     let $groupNode = $this.find('[data-js="form-group"]');
            //     let $fileUploadAreaNode = $this.find('[data-js="upload-file"]');
            //
            //     setTimeout(function () {
            //         $groupNode
            //             .find('input, textarea')
            //             .each(function (index, element) {
            //                 $(element).closest($groupNode).removeClass($(element).val() === '' ? 'transform-label' : '')
            //             });
            //
            //         $fileUploadAreaNode
            //             .find('input')
            //             .each(function (index, element) {
            //                 if ($(element).val() === '') $fileUploadAreaNode.data('reset')();
            //             });
            //     }, 1000);
            // });
            //
            // $wpcf7.on('wpcf7:submit wpcf7:invalid', function (e) {
            //     let $this = $(this);
            //     let $inputNode = $this.find('input');
            //
            //     $inputNode.trigger('classChange');
            // });

            $wpcf7.on('wpcf7:spam wpcf7:mailfailed', function () {
                $formNode.hide();
                $formNode.siblings('[data-form-status="error"]').fadeIn();
                if (!$.magnificPopup.instance.isOpen) {

                }
            });

            $wpcf7.on('wpcf7:mailsent', function () {
                $formNode.hide();
                $wpcf7.siblings('[data-form-status="success"]').fadeIn();
                if (!$.magnificPopup.instance.isOpen) {
                    $(window.smoothScroll).trigger('update');
                }
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

                        $label.html(files.length > 1 ? ($label.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
                    };

                $input.on('change', function (e) {
                    showFiles(e.target.files);
                    $(this).blur();
                });

                $input.bind('classChange', function (e) {
                    if ($(e.target).hasClass('wpcf7-not-valid')) {
                        $form.addClass('wpcf7-not-valid');
                    } else {
                        $form.removeClass('wpcf7-not-valid');
                    }
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
                        console.log(e.dataTransfer)
                        let files = [].slice.call(e.dataTransfer.files).filter(function (file) {
                            return file.type === 'application/pdf' ||
                                file.type === 'application/msword' ||
                                file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

                        });
                        showFiles(files);
                    });
                }

                $form.data('reset', function () {
                    $label.html($label.attr('data-default-caption'));
                    $icons.removeClass('is-active');
                });
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
