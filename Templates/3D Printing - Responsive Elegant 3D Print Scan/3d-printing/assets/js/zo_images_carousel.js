/**
 * Created by John Nguyen on 04-08-2015.
 */
(function($) {
    "use strict";

    $(document).ready(function () {
        $('.zo_images_carousel').each(function() {
            var $this = $(this);
            $this.slick();
        });
    });
}(jQuery));