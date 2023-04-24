(function ($) {
    "use strict"; //data background

    $('[data-background]').each(function () {
        var $data_bg = $(this).attr('data-background');
        $(this).css({
            "background-image": 'url(' + $data_bg + ')'
        });
    }); //offcanvas function

    function offCanvus() {
        $(".ofcanvus-toggle").on("click", function () {
            $(".at_offcanvus_menu").addClass("active");
        });
        $(".at-offcanvus-close").on("click", function () {
            $(".at_offcanvus_menu").removeClass("active");
        });
        $(document).on("mouseup", function (e) {
            var offCanvusMenu = $(".at_offcanvus_menu");

            if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
                $(".at_offcanvus_menu").removeClass("active");
            }
        });
    }

    offCanvus(); //mobile menu

    $(".mobile-menu-toggle").on("click", function () {
        $(".mobile-menu").addClass("active");
    });
    $(".mobile-menu .close-menu").on("click", function () {
        $(".mobile-menu").removeClass("active");
    });
    $(".mobile-menu ul li.has-submenu a").each(function () {
        $(this).on("click", function () {
            $(this).siblings('ul').slideToggle();
            $(this).toggleClass("icon-rotate");
        });
    });
    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".mobile-menu");

        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
            $(".mobile-menu").removeClass("active");
        }
    }); //section scrolldown

    $(".btn-scroll-down").on("click", function () {
        $("html,body").animate({
            scrollTop: 600
        });
        return false;
    }); //scroll top animation

    $(".theme-scrolltop-btn").on("click", function () {
        $("body,html").animate({
            scrollTop: 0
        }, 1500, 'easeOutCubic');
    }); //counterup

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    }); //video popup

    $('.video-popup-btn').magnificPopup({
        type: 'iframe'
    }); //theme slider

    const at_hero_slider = new Swiper('.at-hero-slider-wrapper', {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 0,
        autoplay: {
            delay: 5000
        },
        speed: 900,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    }); //add banner slider

    const ad_banner_slider = new Swiper(".banner-slider", {
        slidesPerView: 2,
        loop: false,
        spaceBetween: 24,
        autoplay: {
            delay: 4000
        },
        speed: 900,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            }
        }
    });
    const feedback_slider = new Swiper(".at_feedback_slider", {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 24,
        autoplay: {
            delay: 5000
        },
        speed: 1500,
        navigation: {
            nextEl: '.slide-btn-next',
            prevEl: '.slide-btn-prev'
        }
    });
    const h2FeedbackSlider = new Swiper(".h2-feedback-slider", {
        slidesPerView: 2,
        loop: true,
        spaceBetween: 24,
        autoplay: {
            delay: 5000
        },
        speed: 1500,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            992: {
                slidesPerView: 2
            }
        }
    });
    const carThumbSlider = new Swiper(".car-thumb-slider", {
        loop: true,
        spaceBetween: 24,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".slider-button-next",
            prevEl: ".slider-button-prev"
        },
        breakpoints: {
            0: {
                slidesPerView: 2
            },
            576: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 2
            },
            1400: {
                slidesPerView: 3
            }
        }
    });
    const carSlider = new Swiper(".car-slider", {
        loop: true,
        spaceBetween: 10,
        thumbs: {
            swiper: carThumbSlider
        }
    });
    $(".hero3-slider").slick({
        slidesToShow: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        fade: true,
        autoplaySpeed: 5000,
        speed: 1000
    });
    const h3FeedbackControl = new Swiper(".h3-feedback-client-slider", {
        spaceBetween: 24,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        }
    });
    const h3FeedbackSlider = new Swiper(".h3-feedback-slider", {
        loop: true,
        spaceBetween: 24,
        thumbs: {
            swiper: h3FeedbackControl
        }
    }); //Category Menu

    $(".category-toggle").on("click", function () {
        $(".product_category_nav").slideToggle();
    }); //custom scrollbar

    $(".at_scrollbar").mCustomScrollbar({
        axis: "y"
    });
    const h4_hero_slider = new Swiper(".h4-hero-slider", {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 10,
        autoplay: true,
        speed: 1500,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    }); //Countdown

    $(".countdown-timer").each(function () {
        var $data_date = $(this).data('date');
        $(this).countdown({
            date: $data_date
        });
    });
    const flashSalesSlider = new Swiper(".flash-sales-slider", {
        slidesPerView: 4,
        spaceBetween: 24,
        loop: true,
        autoplay: true,
        speed: 1500,
        navigation: {
            nextEl: '.flash-button-next',
            prevEl: '.flash-button-prev'
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        }
    });
    const h4_ct_slider_1 = new Swiper(".h4_ct_slider_1", {
        slidesPerView: 3,
        spaceBetween: 10,
        loop: true,
        autoplay: true,
        speed: 1500,
        navigation: {
            nextEl: '.flash-button-next',
            prevEl: '.flash-button-prev'
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            400: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            992: {
                slidesPerView: 4
            },
            1200: {
                slidesPerView: 3
            }
        }
    });
    const s4_ct_slider_2 = new Swiper(".s4_ct_slider_2", {
        slidesPerView: 4,
        spaceBetween: 0,
        loop: false,
        autoplay: true,
        speed: 1500,
        navigation: {
            nextEl: '.sflash-button-next',
            prevEl: '.sflash-button-prev'
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            550: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        }
    });
    const h4_ct_slider_2 = new Swiper(".h4_ct_slider_2", {
        slidesPerView: 4,
        spaceBetween: 40,
        loop: false,
        autoplay: true,
        speed: 1500,
        navigation: {
            nextEl: '.flash-button-next',
            prevEl: '.flash-button-prev'
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            550: {
                slidesPerView: 3
            },
            992: {
                slidesPerView: 5
            },
            1200: {
                slidesPerView: 6
            }
        }
    });
    const megaMenuSlider = new Swiper(".megamenu-slider", {
        slidesPerView: 1,
        spaceBetween: 16,
        autoplay: true,
        speed: 1500
    });
    const productThumbSlider = new Swiper(".product_thumb_slider", {
        loop: true,
        spaceBetween: 16,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".slider-button-next",
            prevEl: ".slider-button-prev"
        },
        breakpoints: {
            0: {
                slidesPerView: 3
            },
            576: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 2
            },
            1400: {
                slidesPerView: 4
            }
        }
    });
    const productViewSlider = new Swiper(".product_feature_img_slider", {
        loop: true,
        spaceBetween: 10,
        thumbs: {
            swiper: productThumbSlider
        }
    });
    const blogGridSlider = new Swiper(".blog-grid-slider", {
        slidesPerView: 1,
        autoplay: true,
        loop: true,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });
    const inventorySlider = new Swiper(".inventroy-slider", {
        slidesPerView: 4,
        autoplay: true,
        loop: true,
        spaceBetween: 24,
        navigation: {
            nextEl: ".slider-btn-next",
            prevEl: ".slider-btn-prev"
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1400: {
                slidesPerView: 4
            }
        }
    });
    const ivThumbControlSlider = new Swiper(".iv_thumb_control_slider", {
        slidesPerView: 4,
        loop: true,
        spaceBetween: 24,
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 16
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 24
            }
        }
    });
    const ivThumbSlider = new Swiper(".iv_thumb_slider", {
        slidesPerView: 1,
        autoplay: true,
        loop: true,
        spaceBetween: 16,
        thumbs: {
            swiper: ivThumbControlSlider
        }
    });
    const shopProductslider = new Swiper(".shop-products-slider", {
        slidesPerView: 1,
        autoplay: true,
        loop: true,
        spaceBetween: 16,
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 1
            }
        }
    });
    const productThumbSlider2 = new Swiper(".product_thumb_slider_2", {
        loop: true,
        spaceBetween: 16,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".slider-button-next",
            prevEl: ".slider-button-prev"
        },
        breakpoints: {
            0: {
                slidesPerView: 3
            },
            576: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 2
            },
            1400: {
                slidesPerView: 4
            }
        }
    });
    const productViewSlider2 = new Swiper(".product_feature_img_slider_2", {
        loop: true,
        spaceBetween: 10,
        thumbs: {
            swiper: productThumbSlider2
        }
    }); //dealer sidebar slider

    $(".dl_slider_wrapper").slick({
        slidesToShow: 1,
        arrows: false,
        dots: true,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1
            }
        }]
    }); //Related Products Slider

    const rlProductSlider = new Swiper(".rl-products-slider", {
        slidesPerView: 4,
        spaceBetween: 24,
        loop: true,
        autoplay: true,
        navigation: {
            nextEl: '.slider-button-next',
            prevEl: '.slider-button-prev'
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 16
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 24
            },
            1400: {
                slidesPerView: 4
            }
        }
    });
    const dealerSlider = new Swiper(".dealership-slider", {
        loop: true,
        spaceBetween: 24,
        autoplay: true,
        slidesPerView: 3,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
            1400: {
                slidesPerView: 4
            }
        }
    }); //sr feedback slider

    const srFeedbackSlider = new Swiper(".sr-feedback-slider", {
        loop: true,
        spaceBetween: 24,
        autoplay: true,
        slidesPerView: 3,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            768: {
                slidesPerView: 2
            },
            1200: {
                slidesPerView: 3
            }
        }
    }); //dealership 2 brand slider

    const bannerSlider2 = new Swiper(".dl2-banner-slider", {
        loop: true,
        spaceBetween: 24,
        slidesPerView: 1,
        autoplay: true,
        speed: 1000,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });
    const dl2FeedbackSlider = new Swiper(".dl2-feedback-slider", {
        loop: true,
        spaceBetween: 24,
        autoplay: true,
        speed: 1000,
        breakpoints: {
            992: {
                slidesPerView: 2
            },
            1200: {
                slidesPerView: 1
            }
        }
    }); //content expand

    $(".iv-expand-btn").on("click", function (e) {
        e.preventDefault();
        $(".expanded-content").slideDown();
    });
    var today;
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + 1);
    $('.theme-date-input').datetimepicker({
        // minDate: today,
        icons: {
            time: 'fa-solid fa-clock'
        }
    });

    if ($(".date_p1")[0] && $('.date_p2')[0]) {
        $('.date_p1').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            minDate: today,
            format: 'YYYY-MM-DD  HH:mm',
            ignoreReadonly: true,
            showClose:true,
            icons: {
                time: 'fa-solid fa-clock'
            }
        }).on('dp.change', function(e) {
            $('.date_p2').data("DateTimePicker").minDate(e.date);
            var sideBySide = $('.date_p1').data("DateTimePicker").options().sideBySide;
            if (sideBySide == false) {
                $('.date_p1').data("DateTimePicker").sideBySide(true);
            }
        }).on('click', function(e) {
            $('.date_p1').data("DateTimePicker").sideBySide(false);
        });
        $('.date_p2').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY-MM-DD  HH:mm',
            ignoreReadonly: true,
            showClose:true,
            icons: {
                time: 'fa-solid fa-clock'
            }
        }).on('dp.change', function(e) {
            $('.date_p1').data("DateTimePicker").maxDate(e.date);
            var sideBySide = $('.date_p2').data("DateTimePicker").options().sideBySide;
            if (sideBySide == false) {
                $('.date_p2').data("DateTimePicker").sideBySide(true);
            }
        }).on('click', function(e) {
            $('.date_p2').data("DateTimePicker").sideBySide(false);
        });

        if($('.date_p1').val() != null && $('.date_p2').val() != null && $('.date_p1').val() != '' && $('.date_p2').val() != '' ) {
            $(document).ready(function () {
                $('.date_p1').data("DateTimePicker").maxDate($('.date_p2').val());
                $('.date_p2').data("DateTimePicker").minDate($('.date_p1').val());
            })
        }
    }
    $('.only-date-input').datepicker({
        minDate: today
    });
    //theme file upload

    var file_upload = $(".file_upload");
    file_upload.children(".btn").on("click", function () {
        $(this).siblings('input').click();
    });
    file_upload.children('input').on("change", function () {
        var file_name = this.files[0].name;
        $(this).siblings(".file_name").text(file_name);
    }); //Progressbar

    $(".progress-bar-line").ProgressBar(); //listing scroll nav

    $(".car_listing_nav ul li a").each(function () {
        $(this).on("click", function (e) {
            e.preventDefault();
            var hashOffset = $(this.hash).offset().top - 100;
            $("body,html").animate({
                scrollTop: hashOffset
            }, 1000, 'easeOutCubic');
        });
    }); //shipping form slideToggle

    $(".alternate-shipping label").on("click", function () {
        if ($(this).children("input").is(":checked")) {
            $(".alternate-shipping-form").slideDown();
        } else {
            $(".alternate-shipping-form").slideUp();
        }
    });
    $(window).on('scroll', function () {
        //header sticky
        var scrollBar = $(this).scrollTop();

        if (scrollBar > 100) {
            $(".header-sticky").addClass("sticky-on");
        } else {
            $(".header-sticky").removeClass("sticky-on");
        } //theme scrolltop button


        if (scrollBar > 300) {
            $(".theme-scrolltop-btn").fadeIn();
        } else {
            $(".theme-scrolltop-btn").fadeOut();
        } //vertical listing menu


        var scrollBarPosition = $(window).scrollTop();
        $(".car_listing_nav ul li a").each(function () {
            var navOffset = $(this.hash).offset().top - 120;

            if (scrollBarPosition > navOffset) {
                $(this).parents("ul").find("a.active").removeClass("active");
                $(this).addClass("active");
            }
        });
    });
    $(window).on('load', function () {
        //preloader
        $(".ring-preloader").fadeOut();
        var $grid = $('.filter-grid').isotope({});
        $('.collection-filter-controls').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        }); //active btn switch

        $(".collection-filter-controls button").each(function () {
            $(this).on("click", function () {
                $(this).parent().find("button.active").removeClass("active");
                $(this).addClass("active");
            });
        }); // filter grid 2

        var $filter_grid_2 = $('.filter_grid_2').isotope({});
        $('.h4-filter-btn-group').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $filter_grid_2.isotope({
                filter: filterValue
            });
            $(this).parent(".h4-filter-btn-group").find("button.active").removeClass("active");
            $(this).addClass("active");
        }); // filter grid 3

        var $filter_grid_3 = $('.filter_grid_3').isotope({});
        $('.bs-filter-btn-group').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $filter_grid_3.isotope({
                filter: filterValue
            });
            $(this).parent(".bs-filter-btn-group").find("button.active").removeClass("active");
            $(this).addClass("active");
        }); //masonry grid

        $('.masonry_grid').isotope({
            itemSelector: '.grid_item',
            percentPosition: true,
            masonry: {
                columnWidth: 1
            }
        });
        var filter_grid_4 = $(".featured_masonry");
        $('.listing-ft-controls').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            filter_grid_4.isotope({
                filter: filterValue
            });
            $(this).parent(".listing-ft-controls").find("button.active").removeClass("active");
            $(this).addClass("active");
        });
    });

    var option_pp=0;
    $('.add_option').click(function () {
        var type = $(this).attr('data-type')
        var id = $(this).attr('data-id')
        var toman = parseInt($(this).attr('data-price-ir'))
        var o_price = parseInt($(this).attr('data-price'))
        var a_price = parseInt($(this).attr('data-all-price'))
        var a_price_ir = parseInt($(this).attr('data-all-price-ir'))
        var all_option = parseInt($(this).attr('data-all-option'));
        var prepayment = parseInt($(this).attr('data-prepayment'));
        var all_price = 0;
        var all_price_ir = 0;
        var pre_price = 0;
        var pre_price_ir = 0;
        if (type == 'one') {
            if ($('#option_val_' + id).is(':checked')) {
                $('#option_val_' + id).prop('checked', false)
                $(this).text('Add')
                $(this).removeClass('bg-danger')
                all_option -= o_price
            } else {
                $(this).text('Remove')
                $('#option_val_' + id).prop('checked', true)
                $(this).addClass('bg-danger')
                all_option += o_price
            }
        } else {
            var input_val = parseInt($('.option_input_' + id).val())
            if (type == 'plus') {
                $('.option_input_' + id).val(input_val + 1)
                if (!$('#option_val_' + id).is(':checked')) {
                    $('#option_val_' + id).prop('checked', true)
                }
                all_option += o_price;
            } else {
                if (parseInt(input_val) > 1) {
                    $('.option_input_' + id).val(input_val - 1)
                    all_option -= o_price;
                } else {
                    if (parseInt(input_val) > 0) {
                        $('.option_input_' + id).val(input_val - 1)
                        all_option -= o_price;
                    }
                    if ($('#option_val_' + id).is(':checked')) {
                        $('#option_val_' + id).prop('checked', false)
                    }
                }
            }
        }
        option_pp=all_option
        all_price = a_price + all_option
        all_price_ir = a_price_ir + (all_option * toman)
        if(prepayment > 0)
        {
            pre_price = Math.round((a_price + all_option) * prepayment / 100)
            pre_price_ir = pre_price * toman

            $('#pre_price').text(parseInt(pre_price))
            $('#pre_price_ir').text(parseInt(pre_price_ir))

            $('#pre_price').text(
                function (index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                })
            $('#pre_price_ir').text(
                function (index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                })
        }
        $('.add_option').attr('data-all-option', parseInt(all_option))
        $('#option_price').text(parseInt(all_option))
        $('#all_price').text(parseInt(all_price))
        $('#all_price_ir').text(parseInt(all_price_ir))


        $('#option_price').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })
        $('#all_price').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })
        $('#all_price_ir').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })

    })

    $('.pay_check_level').click(function () {
        var type = $(this).attr('data-id')
        $('.radio_pay').attr('checked', false)
        $('.pay_check_level').removeClass('checked')
        $('.pay_' + type).addClass('checked')
        $('#radio_' + type).attr('checked', true)
    })

    $('.en_input').on('keyup', function (event) {
        var arregex = /^[a-zA-Z0-9_ ]*$/;
        if (!arregex.test(event.key)) {
            $('.en_input').val("");
        }
    });
    $('.number_input').on('keyup', function (event) {
        var arregex = /^[0-9]*$/;
        if (!arregex.test(event.key)) {
            $('.number_input').val("");
        }
    });
    $('.modal_btn_click').click( function (event) {
        var title = $(this).attr('data-title');
        var url = $(this).attr('data-url');

        $('#CarMessageModalLabel').text(title)
        $('#CarMessageModalForm').attr('action',url)
    });
    $('#bimeh_checked_label').click(function () {
        var all_price=parseInt($(this).attr('data-all-price'))
        var all_price_not_bimeh=parseInt($(this).attr('data-all-price-bimeh'))
        var pre_price=$(this).attr('data-pre-price')
        var pre_price_not_bimeh_t=$(this).attr('data-pre-price-not-bimeh')
        var toman=parseInt($(this).attr('data-toman'))
        var prepayment=parseInt($(this).attr('data-prepayment'))
        if ($('#bimeh_checked').is(':checked'))
        {
            $('#all_price').text(all_price + option_pp)
            $('#pre_price').text(Math.round((all_price + option_pp) * prepayment / 100))
            // $('#pre_price').text(parseInt(pre_price))
            $('#all_price_ir').text((all_price + option_pp) * toman)
            // $('#pre_price_ir').text(parseInt(pre_price) * parseInt(toman))
            $('#pre_price_ir').text(Math.round(((all_price + option_pp) * prepayment / 100) * toman))

            $('.add_option').attr('data-all-price',all_price)
            $('.add_option').attr('data-all-price-ir',parseInt(all_price) * parseInt(toman))
        }
        else
        {
            $('#all_price').text(all_price_not_bimeh + option_pp)
            // $('#pre_price').text(parseInt(pre_price_not_bimeh_t))
            $('#pre_price').text(Math.round(((all_price_not_bimeh + option_pp) * prepayment / 100)))
            $('#all_price_ir').text((all_price_not_bimeh + option_pp) * toman)
            // $('#pre_price_ir').text(parseInt(pre_price_not_bimeh_t) * parseInt(toman))
            $('#pre_price_ir').text(Math.round(((all_price_not_bimeh + option_pp) * prepayment / 100) * toman))

            $('.add_option').attr('data-all-price',all_price_not_bimeh)
            $('.add_option').attr('data-all-price-ir',parseInt(all_price_not_bimeh) * parseInt(toman))
        }

        $('#all_price').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })
        $('#pre_price').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })
        $('#all_price_ir').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })
        $('#pre_price_ir').text(
            function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            })
    })

    $('#admin_pay_label').click(function (){
        if ($('#admin_pay_input').is(':checked'))
        {
            $('#admin_pay_type_tr').removeClass('d-none')
            if ($('#admin_pay_type2_input').is(':checked'))
            {
                $('#admin_pay_file_tr').removeClass('d-none')
            }
        }
        else
        {
            $('#admin_pay_type_tr').addClass('d-none')
            $('#admin_pay_file_tr').addClass('d-none')
        }
    })
    $('#admin_pay_type1_label').click(function (){
        if ($('#admin_pay_type1_input').is(':checked'))
        {
            $('#admin_pay_file_tr').addClass('d-none')
        }
    })
    $('#admin_pay_type2_label').click(function (){
        if ($('#admin_pay_type2_input').is(':checked'))
        {
            $('#admin_pay_file_tr').removeClass('d-none')
        }
    })
})(window.jQuery);


jQuery(document).ready(function ($) {

    if (window.history && window.history.pushState) {

        window.history.pushState('forward', null, null);

        $(window).on('popstate', function () {
            $('.ring-preloader').css('display', 'flex')
            window.location.replace(document.referrer);
        });
    }
});

function myFunctionPrint() {


    window.print();

    window.open('', '_parent', '');

    window.close();

}

