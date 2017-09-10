jQuery(document).ready(function ($) {
	"use strict";
	/* Body layout */
	var body_layout = $.cookie("body_layout");
	if (body_layout == '1') {
		$('body').addClass('zo-boxed').removeClass('zo-wide');
	}
	$('.layout').change(function (e) {
		var layout = $(this).val();
		if (layout == '1') {
			$('body').addClass('zo-boxed').removeClass('zo-wide');
		} else {
			$('body').addClass('zo-wide').removeClass('zo-boxed');
		}
		$.cookie('body_layout', layout, {
			expires: 1,
			path: '/'
		});
        $(window).trigger('resize');
	});
	/* Body layout */

	/* Pattern */
	var pattern_cookie = $.cookie("bg_body_layout_boxed");
	if (pattern_cookie != null) {
		$('body.zo-boxed').addClass('pattern' + pattern_cookie);
	}
	$('.pattern a').click(function (e) {
		if (pattern_cookie != null) {
			$('body.zo-boxed').removeClass('pattern' + pattern_cookie);
		}
		var pattern = $(this).attr('id');
		$(this).addClass('active').siblings().removeClass('active');
		$('body.zo-boxed').addClass('pattern' + pattern);
		$.cookie('bg_body_layout_boxed', pattern, {
			expires: 1,
			path: '/'
		});
		pattern_cookie = pattern;
	});

	$('.style-toggle').click(function () {
		if ($('#style_selector').hasClass('active')) {
			$('#style_selector').removeClass('active');
		} else {
			$('#style_selector').addClass('active');
		}
	});

    var id_tag_link = null;

    $('.predefined a').click(function(e) {

        if(id_tag_link != null){
            $('#'+id_tag_link).remove();
        }
        var preset = $(this).attr('id');
        var color = $(this).attr('data-color');
        var link = null;
		$('.style-toggle').css('background',color);
		
		/* Change Css */
        if(preset=='0'){
            link =  ZOPreset.theme_url + '/assets/css/static.css?ver=1.0.0';
        }else{
            link =  ZOPreset.theme_url + '/assets/css/presets-'+preset+'.css?ver=1.0.0';
            id_tag_link = 'presets-' + preset;
        }
        var $head = $("head");
        var $headlinklast = $head.find("link[rel='stylesheet']:last");
        var linkElement = "<link id='" +id_tag_link+ "' rel='stylesheet' href='" +link+ "' type='text/css' media='all'>";	
        if ($headlinklast.length){
            $headlinklast.after(linkElement);
        } else {
            $head.append(linkElement);
            $('link[title=mystyle]')[0].disabled=true;
        }
		
		/* Set Image logo */
		$('#zo-header-logo img').attr('src', ZOPreset.theme_url + '/inc/selector/images/logo/logo-' +preset+ '.png');
		
		/* Set img hover vehicle type */
		$('.filter-vehicle-type img[alt="cabrio"]').attr('data-hover', ZOPreset.theme_url + '/assets/images/presets/preset' +preset+ '/cabrio_hover.png');
		$('.filter-vehicle-type img[alt="coupe"]').attr('data-hover', ZOPreset.theme_url + '/assets/images/presets/preset' +preset+ '/coupe_hover.png');
		$('.filter-vehicle-type img[alt="others"]').attr('data-hover', ZOPreset.theme_url + '/assets/images/presets/preset' +preset+ '/others_hover.png');
		$('.filter-vehicle-type img[alt="sedan"]').attr('data-hover', ZOPreset.theme_url + '/assets/images/presets/preset' +preset+ '/sedan_hover.png');
		$('.filter-vehicle-type img[alt="targa"]').attr('data-hover', ZOPreset.theme_url + '/assets/images/presets/preset' +preset+ '/targa_hover.png');
		$('.filter-vehicle-type img[alt="wagon"]').attr('data-hover', ZOPreset.theme_url + '/assets/images/presets/preset' +preset+ '/wagon_hover.png');
		
        $(this).addClass('active').siblings().removeClass('active');
    });

});
