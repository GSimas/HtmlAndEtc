(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        var display;
        var no_display;
        $('body').on('click', function (e) {
            var target = $(e.target);
            if (target.parents('.shopping_cart_dropdown').length == 0 && !target.hasClass('shopping_cart_dropdown')) {
                $('.widget_searchform_content,.shopping_cart_dropdown, .widget_cart_search_wrap [data-display]').removeClass('active');
            }
        });
        $('.widget_searchform_content,.shopping_cart_dropdown').on('click', function (e) {
            e.stopPropagation();
        });
        $('.widget_cart_search_wrap [data-display]').on('click', function (e) {
            var container = $(this).parents('.widget_cart_search_wrap');
            e.stopPropagation();
            var _this = $(this);
            display = _this.attr('data-display');
            no_display = _this.attr('data-no_display');
            _this.toggleClass('active');
            if ($(display, container).hasClass('active')) {
                $(display, container).removeClass('active');
            } else {
                $(display, container).addClass('active');
                $(no_display, container).removeClass('active');
            }
        });
    });
})(jQuery);
