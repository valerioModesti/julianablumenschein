(function ($) {
    'use strict';

    $(function () {
        var $body = $('body');
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