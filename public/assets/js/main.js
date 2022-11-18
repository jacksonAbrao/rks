$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var topMenuHeight = $(".navbar").height();
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - topMenuHeight
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });
});

// jQuery(function($){
jQuery(document).ready(function ($) {
    if ($('.formValidate').length) {
        $.each($('.formValidate'), function () {
            $(this).validator();
        });
    }

    if ($('input[data-mask]').length) {
        $.each($("input[data-mask]"), function (i, o) {
            var $o = $(o),
                reverse = (($o.attr("data-mask-reverse") == "true") ? true : false);
            $o.mask($o.attr("data-mask"), {
                reverse: reverse
            });
            delete $o;
        });
    }

    if ($('input[data-mask-money]').length) {
        $.each($("input[data-mask-money]"), function (i, o) {
            var prefix = '';
            var suffix = '';
            var precision = '';
            if ($(this).attr("data-mask-money-prefix") != '') {
                prefix = $(this).attr("data-mask-money-prefix");
            }

            if ($(this).attr("data-mask-money-suffix") != '') {
                suffix = $(this).attr("data-mask-money-suffix");
            }

            $(this).maskMoney({ prefix: prefix, suffix: suffix, decimal: ",", thousands: ".", allowNegative: false });
        });
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    function updateScroll() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $(".navbar-update-scroll").addClass("navbar-shrink");
        } else {
            $(".navbar-update-scroll").removeClass("navbar-shrink");
        }
    }

    updateScroll();

    $(window).scroll(function () {
        updateScroll();
    });
});
