(function ($) {
    $(document).ready(function () {
        $('.zo-grid-masonry').each(function () {
            var $this = $(this),
                $filter = $this.parent().find('.zo-grid-filter'),
                $sizer = $this.find('.shuffle__sizer');
            $this.imagesLoaded(function () {
                $this.shuffle({
                    itemSelector: '.zo-grid-item',
                    sizer: $sizer
                });
            });
            if ($filter) {
                /*Select Change*/
                if ($filter) {
                    /*Sort By Categories*/
                    $filter.find('.zo-filter-category').on('change', function (e) {
                        e.preventDefault();
                        var  groupName =   $(this).find(':selected').data('group');
                        // reshuffle grid
                        $('#zo-grid').find('.zo-grid-masonry').shuffle('shuffle', groupName);
                    });
                    /*Sort By Order */
                    $filter.find('.zo-filter-order').on('change', function () {
                        var sort = this.value, opts = {};

                        // We're given the element wrapped in jQuery
                        if ( sort === 'order-newest' ) {
                            opts = {
                                reverse: true,
                                by: function($el) {
                                    return $el.data('order-newest');
                                }
                            };
                        } else if ( sort === 'order-title' ) {
                            opts = {
                                by: function($el) {
                                    return $el.data('order-title').toLowerCase();
                                }
                            };
                        }

                        // reshuffle grid
                        $('.zo-grid-masonry').shuffle('sort', opts);
                    });
                }
                $filter.find('a').click(function (e) {
                    e.preventDefault();
                    // set active class
                    $filter.find('a').removeClass('active');
                    $(this).addClass('active');

                    // get group name from clicked item
                    var groupName = $(this).attr('data-group');
                    // reshuffle grid
                    $(this).parent().parent().parent().parent().find('.zo-grid-masonry').shuffle('shuffle', groupName);
                });
            }
        });
    });
})(jQuery);