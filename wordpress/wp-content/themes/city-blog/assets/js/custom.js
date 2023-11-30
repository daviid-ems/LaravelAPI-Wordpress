jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });
    
    /* -----------------------------------------
    Search
    ----------------------------------------- */
    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchWrap = $('.header-search-wrap');
    $(".header-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".header-search-wrap").removeClass("show");
        }
    });

    /* -----------------------------------------
    Rtl Check
    ----------------------------------------- */
    $.RtlCheck = function () {
        if ($('body').hasClass("rtl")) {
            return true;
        } else {
            return false;
        }
    }
    
    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.banner-style-3 .banner-slider').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        slidesToShow: 3,
        nextArrow: '<span class="fas fa-angle-right slick-next"></span>',
        prevArrow: '<span class="fas fa-angle-left slick-prev"></span>',
        rtl: $.RtlCheck(),
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                }
            }
        ]
    });
    
    /* -----------------------------------------
    post Slider
    ----------------------------------------- */
    $('.post-slider ').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        rtl: $.RtlCheck(),
        nextArrow: '<span class="fas fa-angle-right slick-next"></span>',
        prevArrow: '<span class="fas fa-angle-left slick-prev"></span>',
    });
    
    /* -----------------------------------------
    trending carousel
    ----------------------------------------- */
    $('.trending-carousel ').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        loop: true,
        vertical: true,
        verticalSwiping: true,
        dots: false,
        prevArrow: false,
        nextArrow: false,
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.city-blog-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

});