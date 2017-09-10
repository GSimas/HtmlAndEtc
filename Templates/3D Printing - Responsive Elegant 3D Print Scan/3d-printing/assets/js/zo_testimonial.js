(function($) {
    "use strict";

    $(document).ready(function () {
        $('.zo-slick-wrap').find('.zo-testimonial-default').each(function() {
            $('.zo-testimonial-wrap', $(this)).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: true,
                asNavFor: $('.zo-testimonial-nav', $(this))
            });
            $('.zo-testimonial-nav', $(this)).slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: $('.zo-testimonial-wrap', $(this)),
                dots: false,
                arrows: false,
                centerMode: true,
                focusOnSelect: true
            });
        });
    });
}(jQuery));