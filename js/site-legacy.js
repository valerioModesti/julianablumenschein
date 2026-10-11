(function ($) {
    'use strict';

    $(function () {
        var $body = $('body');
        var $menuToggle = $('.menu-toggle');
        var $siteNavigation = $('#site-navigation');
        var $mobileMenus = $('.menu-hauptmenu-container, header .menu-social-menu-container, header .menu-woocommerce-container');

        if ($(window).width() < 1250) {
            if (!$body.hasClass('home')) {
                $('.menu-hauptmenu-container').addClass('lower').css({ display: 'none' });
            }

            function setMobileMenuOpen(isOpen) {
                $menuToggle.toggleClass('open', isOpen).attr('aria-expanded', isOpen);
                $siteNavigation.toggleClass('open', isOpen);
                $body.css('overflow', isOpen ? 'hidden' : '');

                if (isOpen) {
                    $mobileMenus.stop(true, true).fadeIn(600).addClass('open');
                } else {
                    $mobileMenus.stop(true, true).fadeOut(600).removeClass('open');
                }
            }

            $menuToggle.on('click', function () {
                setMobileMenuOpen(!$siteNavigation.hasClass('open'));
            });

            $('.menu-item, .logotop.home a').on('click', function () {
                setMobileMenuOpen(false);
            });
        }

        $('.logotop.home').css({ display: 'none' });
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 0) {
                $('.title-cont .site-title.site-title-home').fadeOut(600);
                $('.logotop.home, .logotop.home a, .logotop.home a h1.site-title-home').fadeIn(600);

                if ($(window).width() < 1280) {
                    $('.menu-hauptmenu-container').addClass('lower');
                    $('#site-navigation').addClass('dark-bg');
                }
            } else {
                $('.title-cont .site-title.site-title-home').fadeIn(600);
                $('.logotop.home').fadeOut(600);

                if ($body.hasClass('home')) {
                    $('.menu-hauptmenu-container').removeClass('lower');
                }
                $('#site-navigation').removeClass('dark-bg');
            }
        });

        if ($('.single-post').length) {
            $('.single-post #primary-menu-footer a').each(function () {
                var footerMenuLink = $(this).attr('href').split('#').pop();
                $(this).attr('href', 'https://julianablumenschein.de/#' + footerMenuLink);
            });
        }
    });

    if (document.body.id === 'no-start' && window.julianaTheme) {
        document.querySelectorAll('#primary-menu .menu-item a').forEach(function (link) {
            var href = link.getAttribute('href');
            if (href && href.charAt(0) === '#') {
                link.href = new URL(href, window.julianaTheme.homeUrl).href;
            }
        });
    }
})(jQuery);