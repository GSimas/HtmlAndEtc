/**
 * Created by Cms-Themes on 22/04/2016.
 */
jQuery(document).ready(function($) {
    "use strict";
    var pageNum = parseInt(zo_more_obj.startPage) + 1;
    var total = parseInt(zo_more_obj.total);
    var max = parseInt(zo_more_obj.maxPages);
    var perpage = parseInt(zo_more_obj.perpage);
    var nextLink = zo_more_obj.nextLink;
    setInterval(function(){
        jQuery('#main').find('audio,video').mediaelementplayer();
    },3000);
    $.countPost = function(total,perpage,pageNum){
        var cposts = total-perpage*pageNum;
        if(cposts>perpage){
            return 'Load More';
        }
        else{
            return 'Load More';
        }
    }

    $.loadData = function(){
        "use strict";
        // Masonry
        if(zo_more_obj.masonry=='masonry'){
            $('.zo_items_loadmore').hide();
            var data = {
                action: 'zo_masonry_loadmore',
                startPage: pageNum ,
                zo_data: zo_more_obj.zo_masonry
            };
            $.post(zo_more_obj.ajaxurl , data, function(response) {
                if(response != 0) {
                    $('#zo-load-posts').find('a').removeClass('loading');
                    $('.zo_items_loadmore').html('') ;
                    $('.zo_items_loadmore').append(response);
                    var  $items = {} ;
                    $('.zo_items_loadmore').each(function(index){
                        $(this).children().each(function(index){
                            $items[index] = $($(this));
                        })
                    });
                    $.each($items,function(idx, obj){
                        $('.zo-grid-masonry').append($($(this)));
                        $('.zo-grid-masonry').shuffle('appended', $($(this)));
                    });
                    setTimeout(function(){
                        $('.zo-grid-masonry').shuffle('update');
                    }, 1000);
                    //Add paging
                    pageNum++;
                    // Add a new placeholder, for when user clicks again.
                    $('#zo-load-posts').before('<div class="zo-placeholder-'+ pageNum +'"></div>')
                    if(zo_more_obj.ajaxType=='Button'){
                        // Update the button message.
                        if(pageNum <= max) {
                            $('#zo-load-posts a').text($.countPost(total,perpage,pageNum-1));
                        }
                        else {
                            $('#zo-load-posts a').text('No more');
                        }
                    }
                    else{
                        $('#zo-load-posts').find('a').text('');
                    }
                    $('#zo-load-posts').find('a').data('loading',0);
                } else {
                    // $('.op-add-to-cart').removeClass('active');
                }
            });
        }
        else {
            $.get(nextLink,function(data){
                var html='';
                $(data).find('.zo-grid > .zo-grid-item').each(function(){
                    html += $('<div>').append($(this).clone()).html();
                });
                $('.zo-grid').append(html);
                pageNum++;

                if(nextLink.indexOf('/page/')>-1){
                    nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
                }
                else{
                    nextLink = nextLink.replace(/paged=[0-9]?/, 'paged='+ pageNum);
                }
                // Add a new placeholder, for when user clicks again.
                $('#zo-load-posts').
                before('<div class="zo-placeholder-'+ pageNum +'"></div>')
                if(zo_more_obj.ajaxType=='Button'){
                    // Update the button message.
                    if(pageNum <= max) {
                        $('#zo-load-posts a').text($.countPost(total,perpage,pageNum-1));
                    } else {
                        $('#zo-load-posts a').text('No more');
                    }
                }else{
                    $('#zo-load-posts').find('a').text('');

                }
                $('#zo-load-posts').find('a').data('loading',0);
            });
        }
    }
    if(pageNum <= max) {
        var text=$.countPost(total,perpage,1);
        if(zo_more_obj.ajaxType=='Scroll'){
            text = '';
        }
        $('.zo_pagination').append('<div class="zo-placeholder-'+ pageNum +'"></div><p id="zo-load-posts"><a data-loading="0" href="#">'+text+'</a></p>');

    }
    if(zo_more_obj.ajaxType=='Button'){
        $('#zo-load-posts a').click(function(){
            if(pageNum <= max){
                $(this).text('Loading ...');
                $(this).addClass('loading');
                $.loadData();
            }
            else {
                //$('#zo-load-posts a').append('.');
            }
            return false;
        });
    }

})