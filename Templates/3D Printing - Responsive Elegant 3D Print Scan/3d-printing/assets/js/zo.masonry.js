/**
 * Created by John Nguyen on 03-08-2015.
 * @version 1.0
 * @author VnZacky
 */
jQuery(document).ready(function ($) {
    "use strict";
    $('.zo-masonry').each(function(){
        var $grid = $(this),
            $parent = $grid.parent().attr('id'),
            $filter = $grid.parent().find('.zo-masonry-filter'),
            options = zoMasonry[$parent];
        $grid.find('.zo-masonry-item').append('<div class="shuffle__sizer"></div>');
        options.columnWidth = zo_masonry_col_width($grid, options);
        $grid.data({resize: true});
        $grid.imagesLoaded(function(){
            $grid.shuffle({
                itemSelector:'.zo-masonry-item',
                sizer: $grid.find('.shuffle__sizer')
            });
        });
        var resizeHandle = null, window_w = $(window).width();
        $(window).resize(function(){
            if($(window).width() == window_w) return;
            window_w = $(window).width();
            clearTimeout(resizeHandle);
            resizeHandle = setTimeout(function(){
                if($grid.data('resize')){
                    zo_masonry_col_width($grid, options);
                    $grid.shuffle('update');
                }
            },500);
        });

        if ($filter) {
            $filter.find('.zo-filter-category').on('change', function (e) {
                e.preventDefault();
                var  groupName =   $(this).find(':selected').data('group');
                // reshuffle grid
                $('#zo-masonry').find('.zo-masonry').shuffle('shuffle', groupName);
            });

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
                $('.zo-masonry').shuffle('sort', opts);
            });
        }
    });



    function zo_masonry_col_width($container, options){
        //var w = $container.width(),
        var ww = $(window).width(),
            w = $container.width(),
            columnNum = 1,
            columnWidth = 0,
            columnHeight = 0;
        if(ww < 768){
            columnNum = options.grid_cols_xs;
        } else if(ww >= 768 && ww < 992){
            columnNum = options.grid_cols_sm;
        } else if(ww >= 992 && ww < 1200){
            columnNum = options.grid_cols_md;
        } else if(ww >= 1200){
            columnNum = options.grid_cols_lg;
        }
        columnWidth = Math.ceil((w-options.grid_margin*(columnNum-1))/columnNum);
        columnHeight = Math.ceil(columnWidth*options.grid_ratio);
        $container.find('.shuffle__sizer').css({
            width: columnWidth,
            margin: options.grid_margin
        });

        $container.find('.zo-masonry-item').each(function() {
            var $item = $(this),
                multiplier_w = $item.attr('class').match(/item-w(\d)/),
                multiplier_h = $item.attr('class').match(/item-h(\d)/),
                width = columnNum==1?columnWidth:multiplier_w[1]*columnWidth + (multiplier_w[1]-1)*options.grid_margin,
                height = columnNum==1?columnHeight:multiplier_h[1]*columnHeight +(multiplier_h[1]-1)*options.grid_margin;
            $item.css({
                width: width,
                height: height,
                marginBottom: options.grid_margin
            });
        });
        return columnWidth;
    }
});
