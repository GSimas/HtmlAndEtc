function initCooper() {
    "use strict";
	/*
	  =======================================================================
		  		Window Load 
	  =======================================================================
	*/	
    jQuery(".loader-holder").fadeOut(500, function() {
        jQuery("#main").animate({
            opacity: "1"
        }, 500);
    });
    var bgImage = jQuery(".bg");
    bgImage.each(function(a) {
        if (jQuery(this).attr("data-bg")) jQuery(this).css("background-image", "url(" + jQuery(this).data("bg") + ")");
    });
	/*
	  =======================================================================
		  		Tabs 
	  =======================================================================
	*/
    jQuery("ul.tabs li").on("click", function() {
        var a = jQuery(this).attr("data-tab"), b = jQuery("ul.tabs li");
        b.removeClass("current");
        jQuery(".tab-content").removeClass("current");
        jQuery(this).addClass("current");
        jQuery("#" + a).addClass("current");
        return false;
    });
	/*
	  =======================================================================
		  		Page nav 
	  =======================================================================
	*/
    var bgi2 = jQuery(".fbgs").data("bgscr");
    var bgt2 = jQuery(".fbgs").data("bgtex");
    jQuery(".bg-scroll").css("background-image", "url(" + bgi2 + ")");
    jQuery(".bg-title span").html(bgt2);
    jQuery(".scroll-nav  ul").singlePageNav({
        filter: ":not(.external)",
        updateHash: false,
        offset: 70,
        threshold: 120,
        speed: 1200,
        currentClass: "act-link"
    });
    jQuery(".scroll-nav-holder").scrollToFixed({
        minWidth: 540,
        zIndex: 12,
        preUnfixed: function() {
            jQuery(this).css("margin-top", "0");
        },
        preFixed: function() {
            if (jQuery(window).width() < 1064) jQuery(this).css("margin-top", "70px");
        }
    });
    function a() {
        jQuery(".alt").each(function() {
            jQuery(this).css({
                "margin-top": -jQuery(this).height() / 2 + "px"
            });
        });
        var a = jQuery(".scroll-nav li").length;
        var b = jQuery(".scroll-nav").width();
        jQuery(".scroll-nav li").css({
            width: b / a
        });
        jQuery(".hero-slider .item").css({
            height: jQuery(".hero-slider").outerHeight(true)
        });
        jQuery(".single-carousel-holder .item").css({
            height: jQuery(".single-carousel-holder").outerHeight(true)
        });
    }
    a();
    var jQuerywindow = jQuery(window);
    jQuerywindow.resize(function() {
        a();
    });
	/*
	  =======================================================================
		  		Owl carousel
	  =======================================================================
	*/
    var sync2 = jQuery(".fscs");
    sync2.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        onInitialized: function() {
            jQuery(".num-holder3").text("1" + " / " + this.items().length);
        }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        jQuery(".num-holder3").text((1 > b ? b + a : b > a ? b - a : b) + " / " + a);
    });
    jQuery(".hero-slider-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".hero-slider-holder").find(sync2).trigger("next.owl.carousel");
        return false;
    });
    jQuery(".hero-slider-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".hero-slider-holder").find(sync2).trigger("prev.owl.carousel");
        return false;
    });
    var testiSlider = jQuery(".testimonials-slider");
    testiSlider.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: false,
        thumbs: false,
        onInitialized: function() {
            jQuery(".teti-counter").text("1" + " / " + this.items().length);
        }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        jQuery(".teti-counter").text((1 > b ? b + a : b > a ? b - a : b) + " / " + a);
    });
    jQuery(".testimonials-slider-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".testimonials-slider-holder").find(testiSlider).trigger("next.owl.carousel");
    });
    jQuery(".testimonials-slider-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".testimonials-slider-holder").find(testiSlider).trigger("prev.owl.carousel");
    });
    var ss = jQuery(".single-slider"), dlt2 = ss.data("loppsli");
    ss.owlCarousel({
        margin: 0,
        items: 1,
        smartSpeed: 1300,
        loop: dlt2,
        nav: false,
        autoHeight: true,
        thumbs: false
    });
    jQuery(".single-slider-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".single-slider-holder").find(ss).trigger("next.owl.carousel");
        return false;
    });
    jQuery(".single-slider-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".single-slider-holder").find(ss).trigger("prev.owl.carousel");
        return false;
    });
    var sync4 = jQuery(".slideshow-slider");
    sync4.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        mouseDrag: false,
        touchDrag: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        autoplaySpeed: 3600,
        items: 1,
        dots: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        autoHeight: false,
        onInitialized: function() {
            jQuery(".num-holder3").text("1" + " / " + this.items().length);
        }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
        jQuery(".num-holder3").text((1 > b ? b + a : b > a ? b - a : b) + " / " + a);
    });
    var e = jQuery(".single-carousel");
    e.owlCarousel({
        margin: 0,
        items: 3,
        smartSpeed: 1300,
        loop: true,
        dots: false,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1e3: {
                items: 3
            }
        }
    });
    jQuery(".single-carousel-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".single-carousel-holder").find(e).trigger("next.owl.carousel");
        return false;
    });
    jQuery(".single-carousel-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".single-carousel-holder").find(e).trigger("prev.owl.carousel");
        return false;
    });
	/*
	  =======================================================================
		  		Isotope
	  =======================================================================
	*/
    function n() {
        if (jQuery(".gallery-items").length) {
            var a = jQuery(".gallery-items").isotope({
                singleMode: true,
                columnWidth: ".grid-sizer, .grid-sizer-second, .grid-sizer-three",
                itemSelector: ".gallery-item, .gallery-item-second, .gallery-item-three"
            });
            a.imagesLoaded(function() {
                a.isotope("layout");
            });
            jQuery(".gallery-filters").on("click", "a.gallery-filter", function(b) {
                b.preventDefault();
                var c = jQuery(this).attr("data-filter"), d = jQuery(this).text();
                a.isotope({
                    filter: c
                });
                jQuery(".gallery-filters a").removeClass("gallery-filter-active");
                jQuery(this).addClass("gallery-filter-active");
                var e = window.navigator.userAgent;
                var f = e.indexOf("MSIE ");
                if (f > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) jQuery(".filt-text").text(d); else jQuery(".filt-text").text(d).shuffleLetters({});
                return false;
            });
        }
        jQuery(".gallery-items").isotope("on", "layoutComplete", function(a, b) {
            var b = a.length;
            jQuery(".num-album").html(b);
        });
        var b = jQuery(".gallery-item").length;
        jQuery(".all-album , .num-album").html(b);
    }
    n();
    var gat = jQuery(".gallery-filter-active").text();
    jQuery(".filt-text").text(gat);
	/*
	  =======================================================================
		  		LightGallery
	  =======================================================================
	*/
    jQuery(".image-popup").lightGallery({
        selector: "this",
        cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
        download: false,
        counter: false
    });
    var jQuerylg = jQuery(".lightgallery"), dlt = jQuerylg.data("looped");
    jQuerylg.lightGallery({
        selector: ".lightgallery a.popup-image , .lightgallery  a.popgal",
        cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
        download: false,
        loop: false
    });
    jQuerylg.on("onBeforeNextSlide.lg", function(a) {
        ss.trigger("next.owl.carousel");
    });
    jQuerylg.on("onBeforePrevSlide.lg", function(a) {
        ss.trigger("prev.owl.carousel");
    });
    jQuery(".hde  .portfolio_item , .hde .gallery-item").each(function() {
        jQuery(this).hoverdir();
    });
    jQuery(".filter-button").on("click", function() {
        jQuery(".gallery-filters").slideToggle(500);
    });
    var count = jQuery(".bg-title").text().length;
    if (count > 10) jQuery(".bg-title").css({
        "font-size": "64px"
    }); else jQuery(".bg-title").css({
        "font-size": "94px"
    });
	/*
	  =======================================================================
		  		Scroll animation
	  =======================================================================
	*/	
    jQuery(".stats").appear(function() {
        jQuery(".num").countTo();
    });
   
    jQuery(".skillbar-box").appear(function() {
        jQuery(this).find("div.skillbar-bg").each(function() {
            jQuery(this).find(".custom-skillbar").delay(600).animate({
                width: jQuery(this).attr("data-percent")
            }, 1500);
        });
    });
	/*
	  =======================================================================
		  		Share
	  =======================================================================
	*/
    var shcm = jQuery(".share-container"), shs = eval(shcm.attr("data-share")), ssr = jQuery(".show-share");
    shcm.share({
        networks: shs
    });
    function hideShare() {
        ssr.addClass("isShare");
        jQuery(".share-container a").each(function(a) {
            var b = jQuery(this);
            setTimeout(function() {
                b.animate({
                    opacity: 0
                }, 300);
            }, 50 * a);
        });
        setTimeout(function() {
            shcm.removeClass("visshare");
        }, 300);
    }
    function showShare() {
        ssr.removeClass("isShare");
        shcm.addClass("visshare");
        setTimeout(function() {
            jQuery(".share-container a").each(function(a) {
                var b = jQuery(this);
                setTimeout(function() {
                    b.animate({
                        opacity: 1
                    }, 300);
                }, 50 * a);
            });
        }, 300);
    }
    ssr.on("click", function(a) {
        a.preventDefault();
        if (ssr.hasClass("isShare")) showShare(); else hideShare();
        return false;
    });
	/*
	  =======================================================================
		  		Progress
	  =======================================================================
	*/
    jQuerywindow.on("scroll", function(a) {
        var a = jQuery(document).height();
        var b = jQuery(window).height();
        var c = jQuery(window).scrollTop();
        var d = c / (a - b) * 100;
        jQuery(".progress-bar").css({
            width: d + "%"
        });
    });
    jQuery(".scroll-con-sec").ctscroll();
    jQuery(".arrowpagenav a").on("click", function(a) {
        a.preventDefault();
    });
	/*
	  =======================================================================
		  		Scroll To Object 
	  =======================================================================
	*/
    jQuery(".custom-scroll-link").on("click", function() {
        var a = 20;
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") || location.hostname == this.hostname) {
            var b = jQuery(this.hash);
            b = b.length ? b : jQuery("[name=" + this.hash.slice(1) + "]");
            if (b.length) {
                jQuery("html,body").animate({
                    scrollTop: b.offset().top - a
                }, {
                    queue: false,
                    duration: 1200,
                    easing: "easeInOutExpo"
                });
                return false;
            }
        }
    });
    jQuery(".to-top").on("click", function(a) {
        a.preventDefault();
        jQuery("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    jQuery(".carousel-item h3").on({
        mouseenter: function() {
            jQuery(this).parents(".single-carousel .item").find(".bg").addClass("hov-rot");
        },
        mouseleave: function() {
            jQuery(this).parents(".single-carousel .item").find(".bg").removeClass("hov-rot");
        }
    });
	/*
	  =======================================================================
		  		Menu
	  =======================================================================
	*/
    var Menu = {
        el: {
            ham: jQuery(".nav-button"),
            menuTop: jQuery(".menu-top"),
            menuMiddle: jQuery(".menu-middle"),
            menuBottom: jQuery(".menu-bottom")
        },
        init: function() {
            Menu.bindUIactions();
        },
        bindUIactions: function() {
            Menu.el.ham.on("click", function(a) {
                Menu.activateMenu(a);
                a.preventDefault();
            });
        },
        activateMenu: function() {
            Menu.el.menuTop.toggleClass("menu-top-click");
            Menu.el.menuMiddle.toggleClass("menu-middle-click");
            Menu.el.menuBottom.toggleClass("menu-bottom-click");
        }
    };
    Menu.init();
    jQuery("#hid-men").menu();
	/*
	  =======================================================================
		  		Contact form
	  =======================================================================
	*/	
    jQuery("#contactform").submit(function() {
        var a = jQuery(this).attr("action");
        jQuery("#message").slideUp(750, function() {
            jQuery("#message").hide();
            jQuery("#submit").attr("disabled", "disabled");
            jQuery.post(a, {
                name: jQuery("#name").val(),
                email: jQuery("#email").val(),
                comments: jQuery("#comments").val()
            }, function(a) {
                document.getElementById("message").innerHTML = a;
                jQuery("#message").slideDown("slow");
                jQuery("#submit").removeAttr("disabled");
                if (null != a.match("success")) jQuery("#contactform").slideDown("slow");
            });
        });
        return false;
    });
    jQuery("#contactform input, #contactform textarea").keyup(function() {
        jQuery("#message").slideUp(1500);
    });
	/*
	  =======================================================================
		  		Video 
	  =======================================================================
	*/
    var l = jQuery(".background-video").data("vid");
    var m = jQuery(".background-video").data("mv");
    jQuery(".background-video").YTPlayer({
        fitToBackground: true,
        videoId: l,
        pauseOnScroll: false,
        mute: m,
        callback: function() {
            var a = jQuery(".background-video").data("ytPlayer").player;
        }
    });
    var jQueryone = jQuery(".mm-parallax"), browserPrefix = "", usrAg = navigator.userAgent;
    if (usrAg.indexOf("Chrome") > -1 || usrAg.indexOf("Safari") > -1) browserPrefix = "-webkit-"; else if (usrAg.indexOf("Opera") > -1) browserPrefix = "-o"; else if (usrAg.indexOf("Firefox") > -1) browserPrefix = "-moz-"; else if (usrAg.indexOf("MSIE") > -1) browserPrefix = "-ms-";
    jQuery("body").mousemove(function(a) {
        var b = Math.ceil(window.innerWidth / 1.5), c = Math.ceil(window.innerHeight / 1.5), d = a.pageX - b, e = a.pageY - c, f = e / c, g = -(d / b), h = Math.sqrt(Math.pow(f, 2) + Math.pow(g, 2)), i = 10 * h;
        jQueryone.css(browserPrefix + "transform", "rotate3d(" + f + ", " + g + ", 0, " + i + "deg)");
    });
}
/*
=======================================================================
		  		Parallax
=======================================================================
*/
function initparallax() {
	"use strict";
    var a = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return a.Android() || a.BlackBerry() || a.iOS() || a.Opera() || a.Windows();
        }
    };
   var trueMobile = a.any();
    if (null == trueMobile) {
        var b = new Scrollax();
        b.reload();
        b.init();
    }
    if (trueMobile) jQuery(".background-video").remove();
}
/*
=======================================================================
		  Init all
=======================================================================
*/
jQuery(function() {
    initparallax();
    initCooper();
});