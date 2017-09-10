jQuery(document).ready(function($) {
	"use strict";



	/* window */
	var window_width, window_height, scroll_top;
	
	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;
	
	/* header menu */
	var header = $('#zo-header');
	var header_top = 0;
	var header_height = 0;
	
	/* scroll status */
	var scroll_status = '';
	
	/**
	 * window load event.
	 * 
	 * Bind an event handler to the "load" JavaScript event.
	 * @author ZoTheme
	 */
	$(window).load(function() {
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/** current window width */
		window_width = $(window).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;
		
		/* get top header menu */
		if(header.length){
			header_top = header.offset().top;
			header_height = header.height();
		}
		
		/* check sticky menu. */
		if(ZOOptions.menu_sticky == '1'){
			zo_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		zo_mobile_menu();
		
		/* check back to top */
		if(ZOOptions.back_to_top == '1'){
			/* add html. */
			$('body').append('<div id="back_to_top" class="back_to_top"><span class="go_up"><i style="" class="fa fa-arrow-up"></i></span></div><!-- #back-to-top -->');
			zo_back_to_top();
		}
		
		/* page loading. */
		zo_page_loading();
		
		/* check video size */
		zo_auto_video_width();
	});
    if($(window).outerWidth() > 992 && $('.sticky-sidebar').length) {
        $('.sticky-sidebar').wrap('<div class="sticky-sidebar-wrap"></div>');
        var stickySidebar = $('.sticky-sidebar'),
            stickySidebarOffset = stickySidebar.offset(),
            stickySidebarHeight = stickySidebar.outerHeight(),
            stickySidebarWidth = stickySidebar.outerWidth(),
            stickyParent = stickySidebar.closest('.row'),
            stickyWrapHeight = stickyParent.outerHeight() - stickySidebarHeight,
            stickyWrapOffset = stickyParent.offset();

        $('.sticky-sidebar-wrap').css({height:stickySidebarHeight});
        $(window).scroll(function(){
            var windowTop = $(window).scrollTop();
            if ( stickySidebarOffset.top < windowTop && windowTop <= (stickyWrapHeight + stickyWrapOffset.top)  ) {
                stickySidebar.css({ position: 'fixed', top: '40px', width:stickySidebarWidth });
            } else if(windowTop > (stickyWrapHeight + stickyWrapOffset.top)) {
                stickySidebar.css({ position: 'absolute', top: stickyWrapHeight, width:stickySidebarWidth });
            } else {
                stickySidebar.css('position','static');
            }
        });
    }
    $('.scroll-menu').find('a').each(function() {
        $(this).click(function(e){
            e.preventDefault();
            var t= this.hash;
            if($(t).length) {
                var n=$(t).offset().top-50;
                var r=Math.round(1e3+n/30);
                $("html, body").animate({scrollTop:n},r);
            }
        });
    });

	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ zo_page_loading(1); }
	
	/**
	 * resize event.
	 * 
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * @author ZoTheme
	 */
	$(window).resize(function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();
		
		/** current window height */
		window_height = $(window).height();
		
		/** current scroll */
		scroll_top = $(window).scrollTop();
		
		/* check sticky menu. */
		if(ZOOptions.menu_sticky == '1'){
			zo_stiky_menu(scroll_top);
		}
		
		/* check mobile menu */
		zo_mobile_menu();
		
		/* check video size */
		zo_auto_video_width();
	});
	
	/**
	 * scroll event.
	 * 
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * @author ZoTheme
	 */
	var lastScrollTop = 0;
	
	$(window).scroll(function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();
		/** check scroll up or down. */
		if(scroll_top < lastScrollTop) {
			/* scroll up. */
			scroll_status = 'up';
		} else {
			/* scroll down. */
			scroll_status = 'down';
		}
		
		lastScrollTop = scroll_top;
		
		/* check sticky menu. */
		if(ZOOptions.menu_sticky == '1'){
			zo_stiky_menu();
		}

		/* check back to top */
		zo_back_to_top();
	});

	/**
	 * Stiky menu
	 * 
	 * Show or hide sticky menu.
	 * @author ZoTheme
	 * @since 1.0.0
	 */
	function zo_stiky_menu() {
		if (header_top < scroll_top) {
			switch (true) {
				case (window_width > 992):
					header.addClass('header-fixed');
					break;
				case ((window_width <= 992 && window_width >= 768) && (ZOOptions.menu_sticky_tablets == '1')):
					header.addClass('header-fixed');
					$('body').css('margin-top', header_height + 'px');
					break;
				case ((window_width <= 768) && (ZOOptions.menu_sticky_mobile == '1')):
					header.addClass('header-fixed');
					$('body').css('margin-top', header_height + 'px');
					break;
			}
		} else {
			header.removeClass('header-fixed');
			$('body').css('margin-top','');
		}
	}

	
	/**
	 * Mobile menu
	 * 
	 * Show or hide mobile menu.
	 * @author ZoTheme
	 * @since 1.0.0
	 */
	$('body').on('click', '#zo-menu-mobile', function(){
		var navigation = $(this).parent().find('.zo-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse');
		} else {
			navigation.removeClass('collapse');
		}
	});
	
	/* check mobile screen. */
	function zo_mobile_menu() {
		var menu = $('.zo-header-navigation');
		
		/* active mobile menu. */
		switch (true) {
            case (window_width <= 992 && window_width >= 768):
                menu.removeClass('phones-nav').addClass('tablets-nav');
                /* */
                zo_mobile_menu_group(menu);
                break;
            case (window_width <= 768):
                menu.removeClass('tablets-nav').addClass('phones-nav');
                break;
            default:
                menu.removeClass('mobile-nav tablets-nav');
                menu.find('li').removeClass('mobile-group');
                break;
		}	
	}
	/* group sub menu. */
	function zo_mobile_menu_group(nav) {
		nav.each(function(){
			$(this).find('li').each(function(){
				if($(this).find('ul:first').length > 0){
					$(this).addClass('mobile-group');
				}
			});
		});
	}

    /**
	 * Auto width video iframe
	 * 
	 * Youtube Vimeo.
	 * @author ZoTheme
	 */
	function zo_auto_video_width() {
		$('.entry-video iframe').each(function(){
			var v_width = $(this).width();

			v_width = v_width / (16/9);
			$(this).attr('height',v_width + 35);
		})
	}
	
	
	/**
	 * Parallax.
	 * 
	 * @author ZoTheme
	 * @since 1.0.0
	 */
	var zo_parallax = $('.zo_parallax');
	if(zo_parallax.length > 0 && ZOOptions.paralax == '1'){
		zo_parallax.each(function() {
			"use strict";
			var speed = $(this).attr('data-speed');
			
			speed = (speed != undefined && speed != '') ? speed : 0.1 ;
			
			$(this).parallax("50%", speed);
		});
	}
	
	/**
	 * Header Title Parallax.
	 *
	 * @author John
	 * @since 1.0.0
	 */
	var zo_header_parallax = $('.zo_header_parallax');
	if(zo_header_parallax.length > 0 && ZOOptions.page_title_parallax == '1' && ZOOptions.paralax == '1'){
        zo_header_parallax.each(function() {
            "use strict";
			$(this).parallax("50%", 0.1);
		});
	}
	
	/**
	 * Nicescroll.
	 *
	 */
	if(ZOOptions.nicescroll){
		$("html").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 38,
			cursorwidth: 6,
			cursorborder: 0,
			cursorcolor: '#171717',
			autohidemode: false,
			zindex: 9999999,
			horizrailenabled: false,
			cursorborderradius: 0,
		});
	}
	
	/**
	 * Page Loading.
	 */
	function zo_page_loading($load) {
		switch ($load) {
		case 1:
			$('#zo-loadding').css('display','block')
			break;
		default:
			$('#zo-loadding').css('display','none')
			break;
		}
	}
	
	/**
	 * Back To Top
	 * 
	 * @author ZoTheme
	 * @since 1.0.0
	 */
	$('body').on('click', '#back_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
    });
    $('body').on('click', '#scroll_to_top', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
	/* Show or hide buttom  */
	function zo_back_to_top(){
		/* back to top */
        if (scroll_top < window_height) {
        	$('#back_to_top').addClass('off').removeClass('on');
        } else {
        	$('#back_to_top').removeClass('off').addClass('on');
        }
	}
	
	/* Remove Link Schedule */
	$('body').on('click', '.tt_timetable .event_container > a',function () {
		return false;
	});

    /**
     * Post Like.
     *
     * @author ZoTheme
     * @since 1.0.0
     */

    $('body').on('click', '.zo-post-like', function () {
        "use strict";
        /* get post id. */
        var bt_like = $(this);

        var post_id = bt_like.attr('data-id');

        if(post_id != undefined && post_id != ''){
            /* add like. */
            $.post(ajaxurl, {
                action : 'zo_post_like',
                id : post_id,
                dataType: "json"
            }, function(response) {
                if(response != ''){
                    bt_like.find('i').attr('class', 'fa fa-heart')
                    bt_like.find('span').html(response);
                }
            });
        }

    });



    $(document).ready(function() {
        /**
         * Fancy Box
         */
        $('.fancybox').each(function() {
            $(this).fancybox({
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });
        });

        /**
         * Slick Slider
         */
        $('.zo-slick').each(function() {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: false,
                dots: false
            });
        });
        /**
         * Custom Carousel
         */
        $('.custom-carousel').each(function(){
            $(this).addClass('owl-carousel owl-theme');
            $(this).owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                dots: false,
                items: 1,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
            });
        });
        /**
         * Add Product Quantity Up Down icon
         */
        $('form.cart .quantity').each(function() {
            $(this).prepend('<span class="qty-minus"><i class="fa fa-minus"></i></span>');
            $(this).append('<span class="qty-plus"><i class="fa fa-plus"></i></span>');
        });
        /* Plus Qty */
        $('.qty-plus').on('click', function() {
            var parent = $(this).parent();
            $('input.qty', parent).val( parseInt($('input.qty', parent).val()) + 1);
        });
        /* Minus Qty */
        $('.qty-minus').on('click', function() {
            var parent = $(this).parent();
            if( parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val( parseInt($('input.qty', parent).val()) - 1);
            }
        });

        /**
         * Logo Custom Parallax
         *
         * @author John
         * @since 1.0.0
         */
        var zo_header_parallax = $('.logo-parallax img');
        if(zo_header_parallax.length > 0 && ZOOptions.paralax == '1'){
            zo_header_parallax.each(function() {
                $(this).parallax("50%", 0.1);
            });
        }
        /**
         * Process Bar Counter
         */
        $('.zo-bar-counter').counterUp({
            time: 900
        });

        /**
         * Zo Process Circle Loading
         */
        if (typeof $.fn.waypoint === 'function') {
            $('.zo-counter-process').each(function() {
                var $char = $(this);
                $char.waypoint(function() {
                    $char.zoProcessCircle();
                    $char.unbind('waypoint');
                }, {
                    offset : '100%',
                    triggerOnce : true
                });
            });
        } else {
            $('.zo-counter-process').zoProcessCircle();
        }
		
		/* Animation */
		if (typeof $.fn.waypoint === 'function') {
            $('.zo-animation:not(.animated)').each(function () {
                var thisEl = $(this);
                thisEl.waypoint(function () {
                    $(this).css('visibility', 'visible');
                    $(this).addClass('animated').addClass($(this).data('zo-animation'));
                }, {
                    triggerOnce: true,
                    offset: '80%'
                });
            });
        } else {
            $('.zo-animation:not(.animated)').addClass('animated').addClass($(this).data('zo-animation'));
        }


    });
	
    /**
     * Counter Up Digit Process Bar
     * @param options
     * @returns {*}
     */
    $.fn.counterUp = function( options ) {
        // Defaults
        var settings = $.extend({
            'time': 400,
            'delay': 10
        }, options);

        return this.each(function(){

            // Store the object
            var $this = $(this);
            var $settings = settings;

            var counterUpper = function() {
                var nums = [];
                var divisions = $settings.time / $settings.delay;
                var num = $this.text();
                var isComma = /[0-9]+,[0-9]+/.test(num);
                num = num.replace(/,/g, '');
                var isInt = /^[0-9]+$/.test(num);
                var isFloat = /^[0-9]+\.[0-9]+$/.test(num);
                var decimalPlaces = isFloat ? (num.split('.')[1] || []).length : 0;

                // Generate list of incremental numbers to display
                for (var i = divisions; i >= 1; i--) {

                    // Preserve as int if input was int
                    var newNum = parseInt(num / divisions * i);

                    // Preserve float if input was float
                    if (isFloat) {
                        newNum = parseFloat(num / divisions * i).toFixed(decimalPlaces);
                    }

                    // Preserve commas if input had commas
                    if (isComma) {
                        while (/(\d+)(\d{3})/.test(newNum.toString())) {
                            newNum = newNum.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
                        }
                    }

                    nums.unshift(newNum);
                }

                $this.data('counterup-nums', nums);
                $this.text('0');

                // Updates the number until we're done
                var f = function() {
                    $this.text($this.data('counterup-nums').shift());
                    if ($this.data('counterup-nums').length) {
                        setTimeout($this.data('counterup-func'), $settings.delay);
                    } else {
                        delete $this.data('counterup-nums');
                        $this.data('counterup-nums', null);
                        $this.data('counterup-func', null);
                    }
                };
                $this.data('counterup-func', f);

                // Start the count up
                setTimeout($this.data('counterup-func'), $settings.delay);
            };

            // Perform counts when the element gets into view
            $this.waypoint(counterUpper, { offset: '100%', triggerOnce: true });
        });

    };

    /**
     * Zo Process Circle Loading
     * @returns {*}
     */
    $.fn.zoProcessCircle = function() {
        return this.each(function() {
            var $this = $(this),
                percent = $this.data('percent'),
                suffix = $this.data('suffix'),
                start = 0;
                var i = setInterval(function () {
                    if (start <= percent) {
                        var deg = parseInt(start) * 3.6;
                        if (start > 50) {
                            $this.addClass('zo-process-start');
                        }
                        $this.find('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
                        $this.find('.ppc-percents .zo-process-counter').html(start + suffix);
                        start++;
                    } else {
                        clearInterval(i);
                    }
                }, 20);
        });
    };
});
