<?php
/**
 * Add column params
 *
 * @author ZoTheme
 * @since 1.0.0
 */

vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Animation", '3dprinting'),
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"bounce" => "bounce",
		"flash" => "flash",
		"pulse" => "pulse",
		"rubberBand" => "rubberBand",
		"shake" => "shake",
		"swing" => "swing",
		"tada" => "tada",
		"wobble" => "wobble",
		"jello" => "jello",
		"bounceIn" => "bounceIn",
		"bounceInDown" => "bounceInDown",
		"bounceInLeft" => "bounceInLeft",
		"bounceInRight" => "bounceInRight",
		"bounceInUp" => "bounceInUp",
		"fadeIn" => "fadeIn",
		"fadeInDown" => "fadeInDown",
		"fadeInDownBig" => "fadeInDownBig",
		"fadeInLeft" => "fadeInLeft",
		"fadeInLeftBig" => "fadeInLeftBig",
		"fadeInRight" => "fadeInRight",
		"fadeInRightBig" => "fadeInRightBig",
		"fadeInUp" => "fadeInUp",
		"fadeInUpBig" => "fadeInUpBig",
		"flip" => "flip",
		"flipInX" => "flipInX",
		"flipInY" => "flipInY",
		"lightSpeedIn" => "lightSpeedIn",
		"lightSpeedOut" => "lightSpeedOut",
		"rotateIn" => "rotateIn",
		"rotateInDownLeft" => "rotateInDownLeft",
		"rotateInDownRight" => "rotateInDownRight",
		"rotateInUpLeft" => "rotateInUpLeft",
		"rotateInUpRight" => "rotateInUpRight",
		"slideInUp" => "slideInUp",
		"slideInDown" => "slideInDown",
		"slideInLeft" => "slideInLeft",
		"slideInRight" => "slideInRight",
		"zoomIn" => "zoomIn",
		"zoomInDown" => "zoomInDown",
		"zoomInLeft" => "zoomInLeft",
		"zoomInRight" => "zoomInRight",
		"zoomInUp" => "zoomInUp",
		"rollIn" => "rollIn",
	),
	'description' => esc_html__('View animation effect at https://daneden.github.io/animate.css/', '3dprinting')
));
vc_add_param("vc_column", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__('Animation Delay', '3dprinting'),
	"param_name" => "animation_delay",
	"value" => "0",
	"dependency" => array(
		"element" => "animation",
		"not_empty" => true,
	),
	"description" => esc_html__('Delay before the animation starts. Ex: 200ms, 0.5s, 1s...', '3dprinting')
));

vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Background Position", '3dprinting'),
	"param_name" => "background_position",
	"value" => array(
		"Theme Default" => "",
		"Left Top" => "left top",
		"Left Center" => "left center",
		"Left Bottom" => "left bottom",
		"Right Top" => "right top",
		"Right Center" => "right center",
		"Right Bottom" => "right bottom",
		"Center Top" => "center top",
		"Center Center" => "center center",
		"Center Bottom" => "center bottom"
	),
	"group" => 'Design Options',
));

