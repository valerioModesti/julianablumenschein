(function ($) {
    'use strict';

    $(function () {
        $('.menu-social-menu-container a').attr('target', '_blank');

        $('#start #primary-menu .menu-item a, .logotop.home a, .home #primary-menu-footer a, .home .footer-col.middle a').on('click', function (event) {
            if (!this.hash) {
                return;
            }

            var $target = $(this.hash);
            if (!$target.length) {
                return;
            }

            event.preventDefault();
            $('html, body').animate({ scrollTop: $target.offset().top }, 1000);
        });

        var $bands = $('.band');
        var $bandThumbnails = $('.band-thumbnail-wrap');
        var $bandsContainer = $('#bands-container');

        $('.band:first-of-type, .band-thumbnail-wrap:first-of-type').addClass('active');
        if ($bandsContainer.length && $('.band.active').length) {
            $bandsContainer.height($('.band.active').outerHeight());
        }

        function setDoubleFigures() {
            $bands.find('.band-text').each(function () {
                var $figures = $(this).find('figure');
                if ($figures.length >= 2 && $(window).width() > 1279) {
                    $figures.addClass('double');
                }
            });
        }

        setDoubleFigures();

        $bandThumbnails.on('click', function () {
            var index = $bandThumbnails.index(this);
            var $selectedBand = $bands.eq(index);

            if (!$selectedBand.length) {
                return;
            }

            $bandThumbnails.removeClass('active');
            $(this).addClass('active');
            $bands.filter('.active').stop(true, true).fadeOut(600).removeClass('active');
            $selectedBand.stop(true, true).fadeIn(600).addClass('active');
            $bandsContainer.height($selectedBand.outerHeight());
            setDoubleFigures();
        });

        if ($(window).width() > 1279) {
            var bandImageWidth = $('.single-band-thumbnail-wrap').width();
            $('.single-band-thumbnail-wrap').css({ height: bandImageWidth * 0.65 });
        }

        if ($bandsContainer.length && $('.band.active').length) {
            if ($(window).width() > 1024) {
                $bandsContainer.height($('.band.active').outerHeight());
            } else {
                $bandsContainer.css({ height: 'auto' });
            }
        }

        if (document.cookie.indexOf('woocommerce_items_in_cart=') !== -1) {
            $('#woocommerce-menu li').addClass('active');
        }
    });
})(jQuery);