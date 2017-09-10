// all functions ------------------
function initBionick() {	
    "use strict";
	// window load  ------------------
	jQuery(window).load(function() {
		var a = [],
		b = window.location.href.split("#")[1],
		c = jQuery("header").outerHeight(true),
		hb = jQuery("html, body");
		jQuery(".scroll-nav a").each(function() {
			var b = new Image();
			b.src = jQuery(this).data("bgscr");
			a.push(b);
		});
		jQuery(".loader").fadeOut(500, function() {
			jQuery("#main").animate({
				opacity: "1"
			}, 500);
			contanimshow();
		});
		if (b && jQuery("#" + b).length) {
			hb.animate({
				scrollTop: 0
			}, 1);
			setTimeout(function() {
				hb.animate({
					scrollTop: jQuery("#" + b).offset().top - c
				}, {
					queue: false,
					duration: 800,
					easing: "easeInOutExpo"
				});
			}, 1550);
		}
	});
    function ahc() {
        jQuery(" .fwslider .item").css({
            height: jQuery(".fwslider").outerHeight(true)
        });
        jQuery(" .slideshow-wrap .item").css({
            height: jQuery(".slideshow-wrap").outerHeight(true)
        });
        jQuery(".fw-title").css({
            "margin-top": -1 * jQuery(".fw-title").height() / 2 + "px"
        });
        jQuery(".height-emulator").css({
            height: jQuery("footer").outerHeight(true)
        });
        jQuery(".nav-inner nav ").css({
            "margin-top": -1 * jQuery(".nav-inner nav ").height() / 2 + "px"
        });
    }
    ahc();
    jQuery(window).resize(function() {
        ahc();
    });
	jQuery(".project-pagination , .fixed-filter , .searh-holder").addClass("in-anim");
    jQuery(".wrapper-inner , .fixed-column , footer , .hero-wrapper").addClass("viselem");
    jQuery("nav li.subnav a").append('<i class="fa fa-angle-double-down subnavicon"></i>');
	// magnificPopup ------------------
    jQuery(".image-popup").magnificPopup({
        type: "image",
        closeOnContentClick: false,
        removalDelay: 600,
        mainClass: "my-mfp-slide-bottom",
        image: {
            verticalFit: false
        }
    });
    jQuery(".popup-youtube, .popup-vimeo , .show-map").magnificPopup({
        disableOn: 700,
        type: "iframe",
        removalDelay: 600,
        mainClass: "my-mfp-slide-bottom"
    });
    jQuery(".popup-gallery").magnificPopup({
        delegate: "a",
        type: "image",
        fixedContentPos: true,
        fixedBgPos: true,
        tLoading: "Loading image #%curr%...",
        removalDelay: 600,
        closeBtnInside: true,
        zoom: {
            enabled: true,
            duration: 700
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [ 0, 1 ]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });
	// owlCarousel ------------------
    var h = jQuery(".single-slider");
    h.owlCarousel({
        items: 1,
        nav: false,
        autoHeight: true
    });
    jQuery(".single-slider-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".single-slider-holder").find(h).trigger("next.owl.carousel");
    });
    jQuery(".single-slider-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".single-slider-holder").find(h).trigger("prev.owl.carousel");
    });
    var sc = jQuery(".services-carusel");
    sc.owlCarousel({
        items: 3,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            756: {
                items: 2,
                nav: false
            },
            1036: {
                items: 2,
                nav: false
            },
            1236: {
                items: 3,
                nav: false
            }
        }
    });
    jQuery(".ser-carous-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".ser-carous-holder").find(sc).trigger("next.owl.carousel");
    });
    jQuery(".ser-carous-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".ser-carous-holder").find(sc).trigger("prev.owl.carousel");
    });
    var fw = jQuery(".fwslider");
    fw.owlCarousel({
        items: 1,
        nav: false
    });
    jQuery(".fwslider-holder a.next-slide").on("click", function() {
        jQuery(this).closest(".fwslider-holder").find(fw).trigger("next.owl.carousel");
    });
    jQuery(".fwslider-holder a.prev-slide").on("click", function() {
        jQuery(this).closest(".fwslider-holder").find(fw).trigger("prev.owl.carousel");
    });
    var sw = jQuery(".slideshow-wrap");
    sw.owlCarousel({
        items: 1,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
		 loop:true,
    });

	// other functions ------------------
    jQuery(".fixed-wrap , .scroll-nav-holder").scrollToFixed({
        minWidth: 1036
    });
	// scroll animation ------------------
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 300) jQuery("footer").addClass("visfooter"); else jQuery("footer").removeClass("visfooter");
    });
    jQuery(".nav-inner nav li").on("mouseenter", function() {
        jQuery(this).find("ul").stop().slideDown();
        jQuery(".nav-inner").addClass("menhov");
    });
    jQuery(".nav-inner nav li").on("mouseleave", function() {
        jQuery(this).find("ul").stop().slideUp();
        jQuery(".nav-inner").removeClass("menhov");
    });
    jQuery(".subnav a.custom-scroll-link").on("click", function() {
        var a = jQuery(window).width();
        if (a < 1036) setTimeout(function() {
            hidemenu();
        }, 450);
    });
    var i = 1;
    jQuery(document.body).on("appear", ".stats", function(a) {
        if (1 === i) k(2600);
        i++;
    });
    function j(a, b, c, d) {
        if (d) {
            var e = 0;
            var f = parseInt(d / a);
            var g = setInterval(function() {
                if (e - 1 < a) c.html(e); else {
                    c.html(b);
                    clearInterval(g);
                }
                e++;
            }, f);
        } else c.html(b);
    }
    function k(a) {
        jQuery(".stats .num").each(function() {
            var b = jQuery(this);
            var c = b.attr("data-num");
            var d = b.attr("data-content");
            j(c, d, b, a);
        });
    }
    jQuery(".animaper").appear();
    jQuery(document.body).on("appear", ".piechart-holder", function() {
        jQuery(this).find(".chart").each(function() {
            var a = jQuery(".piechart-holder").data("skcolor");
            jQuery(".chart").easyPieChart({
                barColor: a,
                trackColor: "#eee",
                scaleColor: "#9ACFB7",
                size: "150",
                lineWidth: "5",
                onStep: function(a, b, c) {
                    jQuery(this.el).find(".percent").text(Math.round(c));
                }
            });
        });
    });
    jQuery(document.body).on("appear", ".skillbar-box", function() {
        jQuery(this).find("div.skillbar-bg").each(function() {
            jQuery(this).find(".custom-skillbar").delay(600).animate({
                width: jQuery(this).attr("data-percent")
            }, 1500);
        });
    });
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
        currentClass: "act-link",
        onComplete: function() {
            if (jQuery(".scroll-nav  a").hasClass("act-link")) jQuery(".scroll-nav  a.act-link").each(function() {
                var a = jQuery(this).data("bgscr"),
                b = jQuery(this).data("bgtex");
                jQuery(".bg-scroll").css("background-image", "url(" + a + ")");
                jQuery(".bg-title span").html(b);
            });
        }
    });
	// isotope ------------------
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
                var c = jQuery(this).attr("data-filter");
                a.isotope({
                    filter: c
                });
                jQuery(".gallery-filters a.gallery-filter").removeClass("gallery-filter-active");
                jQuery(this).addClass("gallery-filter-active");
                return false;
            });
        }
    }
    n();
    jQuery(".to-top").on("click", function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, "slow");
    });
    jQuery(".custom-scroll-link").on("click", function() {
        var a = 70;
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
	// accordion ------------------
    jQuery(".accordion").each(function() {
        var a = 2 * jQuery(this).attr("data-name");
        jQuery(this).find(".accordion-inner:nth-child(" + a + ")").show();
        jQuery(this).find(".accordion-inner:nth-child(" + a + ")").prev().addClass("activeac");
    });
    jQuery(".accordion .accordion-title").click(function() {
        if (jQuery(this).next().is(":hidden")) {
            jQuery(this).parent().find(".accordion-title").removeClass("activeac").next().slideUp(500);
            jQuery(this).toggleClass("activeac").next().slideDown(500);
        }
        return false;
    });
    var shs = eval(jQuery(".share-container").attr("data-share"));
    jQuery(".share-container").share({
        networks: shs
    });

    var cm = jQuery(".nav-button");
    var nh = jQuery(".nav-inner");
    function showmenu() {
        setTimeout(function() {
            nh.addClass("vismen");
        }, 120);
        cm.addClass("cmenu");
        nh.removeClass("isDown");
    }
    function hidemenu() {
        nh.addClass("isDown");
        cm.removeClass("cmenu");
        nh.removeClass("vismen");
    }
    cm.on("click", function() {
        if (nh.hasClass("isDown")) showmenu(); else hidemenu();
    });
    jQuery(".sect-subtitle span").fitText(3.2, {
        minFontSize: "120px",
        maxFontSize: "140px"
    });
	// content show ------------------
function contanimshow() {
    jQuery(".content-holder").removeClass("scale-bg2");
	jQuery(".in-anim").animate({opacity: 1},900);
    setTimeout(function() {
        jQuery(".grid-item-holder").each(function(a) {
            var b = jQuery(this);
            setTimeout(function() {
                b.animate({
                    opacity: 1
                }, 500);
            }, 180 * a);
        });
    }, 450);
    setTimeout(function() {
        jQuery(".viselem").each(function(a) {
            var b = jQuery(this);
            setTimeout(function() {
                b.animate({
                    opacity: 1
                }, 900);
            }, 480 * a);
        });
    }, 250);
}	
	
}
	// if mobile - remove  parallax  and video background ------------------
function initparallax() {
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
    trueMobile = a.any();
    if (null == trueMobile) {
        var b = jQuery(".content");
        b.find("[data-top-bottom]").length > 0 && b.waitForImages(function() {
            s = skrollr.init();
            s.destroy();
            skrollr.init({
                forceHeight: !1,
                easing: "outCubic",
                mobileCheck: function() {
                    return !1;
                }
            });
        });
    }
    if (trueMobile) {
		jQuery(".background-video").remove();
		jQuery('.grid-item-holder').attr("onclick","return true");		
	}	 
}
jQuery(document).ready(function() {
    initBionick();
    initparallax();
});