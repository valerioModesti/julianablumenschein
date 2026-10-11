(function ($) {
    'use strict';

    $(function () {
        var mobileBreakpoint = window.matchMedia('(max-width: 767px)');
        var $body = $('body');
        var $menuToggle = $('.menu-toggle');
        var $siteNavigation = $('#site-navigation');
        var $primaryMenu = $('.menu-hauptmenu-container');

        function setPrimaryMenuOpen(isOpen) {
            $menuToggle.toggleClass('open', isOpen).attr('aria-expanded', isOpen);
            $siteNavigation.toggleClass('open', isOpen);
            $body.css('overflow', isOpen ? 'hidden' : '');

            if (isOpen) {
                $primaryMenu.stop(true, true).fadeIn(600).addClass('open');
            } else {
                $primaryMenu.stop(true, true).fadeOut(600).removeClass('open');
            }
        }

        function togglePrimaryMenu() {
            setPrimaryMenuOpen(!$siteNavigation.hasClass('open'));
        }

        function resetDesktopMenu() {
            $menuToggle.removeClass('open').attr('aria-expanded', 'false');
            $siteNavigation.removeClass('open');
            $body.css('overflow', '');
            $primaryMenu.stop(true, true).removeClass('open').removeAttr('style');
        }

        function syncMenuForBreakpoint(event) {
            if (event.matches) {
                $menuToggle.off('.siteMenu').on('click.siteMenu', togglePrimaryMenu);
                $primaryMenu.find('.menu-item a').off('.siteMenu').on('click.siteMenu', function () {
                    setPrimaryMenuOpen(false);
                });
            } else {
                $menuToggle.off('.siteMenu');
                $primaryMenu.find('.menu-item a').off('.siteMenu');
                resetDesktopMenu();
            }
        }

        syncMenuForBreakpoint(mobileBreakpoint);
        if (mobileBreakpoint.addEventListener) {
            mobileBreakpoint.addEventListener('change', syncMenuForBreakpoint);
        } else {
            mobileBreakpoint.addListener(syncMenuForBreakpoint);
        }
    });
})(jQuery);