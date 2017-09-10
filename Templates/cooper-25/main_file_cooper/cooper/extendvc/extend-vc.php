<?php
/*** Removing shortcodes ***/
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_gallery");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	vc_remove_param('vc_column_text', 'css_animation');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
}

/*** Row ***/
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(		
        "Row" => "row",	
		"webRedox Row" => "main-section",
		
	)
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width" => "full_width",
		"In Grid" => "grid"		
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Anchor ID",
	"param_name" => "anchor",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

// webRedox Row Main Section Start //

// webRedox Row Main Section End //
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Row in content menu",
	"value" => array(
		"No" => "",
		"Yes" => "in_content_menu"
	),
	"param_name" => "in_content_menu",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Content menu title",
	"value" => "",
	"param_name" => "content_menu_title",
	"description" => "",
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Content menu icon",
	"param_name" => "content_menu_icon",
	"value" => '',
	"description" => "",
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video background",
	"value" => array(
		"No" => "",
		"Yes" => "show_video"
	),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video overlay",
	"value" => array(
		"No" => "",
		"Yes" => "show_video_overlay"
	),
	"param_name" => "video_overlay",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video overlay image (pattern)",
	"value" => "",
	"param_name" => "video_overlay_image",
	"description" => "",
	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm) file url",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4) file url",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (ogv) file url",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video preview image",
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax', 'row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section height",
	"param_name" => "section_height",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Parallax speed",
    "param_name" => "parallax_speed",
    "value" => "",
    "dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable','content_menu'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border bottom color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding",
	"value" => "",
	"param_name" => "side_padding",
	"description" => "Padding (left/right in % - full width only)",
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Label Color",
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Label Hover Color",
	"param_name" => "hover_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "More Label",
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Less Label",
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Label Position",
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row",  array(
  "type" => "dropdown",
  "heading" => "CSS Animation",
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => '',
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row",  array(
  "type" => "textfield",
  "heading" => "Transition delay (ms)",
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));


/*** Row Inner ***/

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
	)
	
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Use as box",
	"value" => array("Use row as box" => "use_row_as_box" ),
	"param_name" => "use_as_box",
	"description" => '',
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width" => "full_width",
		"In Grid" => "grid"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Anchor ID",
	"param_name" => "anchor",
	"value" => ""
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
	
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding",
	"value" => "",
	"param_name" => "padding",
	"description" => "Padding (left/right in % - full width only)",
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));


/////********** By cooper **********/////

// Title Block
vc_map( array(
		"name" => "Cooper Title",
		"base" => "wr_vc_section_title",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),		
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Heading Title",
				"param_name" => "title",
				"value" => ""
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Heading Subtitle",
				"param_name" => "subtitle",
				"value" => ""
			),						
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Color",
				"param_name" => "color",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Size",
				"param_name" => "font_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" => "bold",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Line Height",
				"param_name" => "line_height",
				"value" => ""
			),	
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Align",
				"param_name" => "text_align",
				"value" => array(
					"Left" => "left",
					"Right" => "right",
					"Center" => "center",
					"Justify" => "justify",
					
				),
				"description" => ""
			),
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Transform",
				"param_name" => "text_transform",
				"value" => array(
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase",
					"Capitalize" => "capitalize",
					"None" => "none",
					
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'cooper')
			),			
			
		)
) );

// Text Block
vc_map( array(
		"name" => "Cooper Text",
		"base" => "wr_vc_section_text",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),		
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Content",
				"param_name" => "content",
				"value" => "I am text block."
			),	
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background",
				"value" => ""
			),			
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Color",
				"param_name" => "color",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Size",
				"param_name" => "font_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" => "normal",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Line Height",
				"param_name" => "line_height",
				"value" => ""
			),	
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Align",
				"param_name" => "text_align",
				"value" => array(
					"Left" => "left",
					"Right" => "right",
					"Center" => "center",
					"Justify" => "justify",
					
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Transform",
				"param_name" => "text_transform",
				"value" => array(
				    "None" => "none",
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase",
					"Capitalize" => "capitalize",
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'cooper')
			),			
			
		)
) );


// Image Block
vc_map( array(
		"name" => "Cooper Image",
		"base" => "wr_vc_section_image",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),		
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Upload Image",
				"param_name" => "img_url",
				"value" => ""
			),	
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Style Type",
				"param_name" => "featyretype",
				"value" => array(
					"Default" => "",
					"Pop-Up" => "st2",					
					"Link URL" => "st3",													
				),
				"description" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link URL",
				"param_name" => "link_url",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "link_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(
					"None" => "none",
					"Left" => "left",
					"Right" => "right",
				)

			),	
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Default" => "inherit",
					"Absolute" => "absolute",
					"Relative" => "relative",
					"Static" => "static",
					
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Top",
				"param_name" => "top",
				"value" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Bottom",
				"param_name" => "Bottom",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Left",
				"param_name" => "left",
				"value" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Right",
				"param_name" => "right",
				"value" => ""
			),						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'cooper')
			),

		)
) );

// Button Block
vc_map( array(
		"name" => "Cooper Button",
		"base" => "wr_vc_section_button",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Name",
				"param_name" => "title",
				"value" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Icon Name",
				"param_name" => "icon_name",
				"value" => "fa-angle-right",
				"description" => __("Please insert <strong><a href='http://fontawesome.io/icons/' target='_blank'>Font Awesome</a></strong> icon class name. Ex: fa-eye")
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link URL",
				"param_name" => "link_url",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "link_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => ""
			),			
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Color",
				"param_name" => "color",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Size",
				"param_name" => "font_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" => "normal",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Transform",
				"param_name" => "text_transform",
				"value" => array(
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase",
					"Capitalize" => "capitalize",
					"None" => "none",
					
					
				),
				"description" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border",
				"param_name" => "border",
				"value" => "",
				"description" => __("Please insert border in format: 2px solid #7b7c80", 'cooper')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Radius",
				"param_name" => "border_radius",
				"value" => "",
				"description" => __("Please insert border radius in format: 0px 0px 0px 0px", 'cooper')
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(					
					"Left" => "left",
					"Right" => "right",
					"None" => "none",
					
				),
				"description" => ""
			),			
						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'cooper')
			),			
			
		)
) );

// Divider Block
vc_map( array(
		"name" => "Cooper Divider",
		"base" => "wr_vc_bar",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"value" => "",
				"description" => __("Please insert width in format: 970px or 100%", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"value" => "",
				"description" => __("Please insert height in format: 300px", 'cooper')
			),						
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Color",
				"param_name" => "color",
				"value" => ""
			),				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(
					"None" => "none",
					"Left" => "left",
					"Right" => "right",
					
				),
				"description" => ""
			),				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Default" => "inherit",
					"Absolute" => "absolute",
					"Relative" => "relative",
					"Static" => "static",
					
				),
				"description" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border",
				"param_name" => "border",
				"value" => "",
				"description" => __("Please insert border in format: 1px solid #7b7c80", 'cooper')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Radius",
				"param_name" => "border_radius",
				"value" => "",
				"description" => __("Please insert border radius in format: 0px 0px 0px 0px", 'cooper')
			),									
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'cooper')
			),			
			
		)
) );

// Blog Block
vc_map( array(
		"name" => "Cooper Blog",
		"base" => "wr_vc_blog",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => __("(Optional) Insert category name in format: Graphic", 'cooper')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 8", 'cooper')
			),		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Search Box",
				"param_name" => "featyretype",
				"value" => array(
					"Disable" => "",
					"Enable" => "st2",																	
				),
				"description" => ""
			),	            
		)
) );

// Portfolio Block
vc_map( array(
		"name" => "Cooper Portfolio",
		"base" => "wr_vc_portfolio_header",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			

            
		)
) );


// Resume Block
vc_map( array(
		"name" => "Cooper Resume",
		"base" => "wr_vc_resume",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => __("(Optional) Insert category name in format: Directer", 'cooper')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 8", 'cooper')
			),		
            
		)
) );

// Services Block
vc_map( array(
		"name" => "Cooper Services",
		"base" => "wr_vc_services",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => __("(Optional) Insert category name in format: Design", 'cooper')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 5", 'cooper')
			),
			
			
            
		)
) );

// Testimonials Block
vc_map( array(
		"name" => "Cooper Testimonials",
		"base" => "wr_vc_testimonial",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => __("(Optional) Insert category name in format: Design", 'cooper')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 5", 'cooper')
			),							
            
		)
) );

// Progress Bar Block
vc_map( array(
		"name" => "Cooper Progress Bar",
		"base" => "wr_vc_progress_bar",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Progress Bar Name",
				"param_name" => "title",
				"value" => "",
				"description" => esc_attr__("Please insert counter name in format: Design", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Progress Bar Number",
				"param_name" => "counter_num",
				"value" => "",
				"description" => esc_attr__("Please insert counter number in format: 60", 'cooper')
			),						
			
		)
) );

// Counter Block
vc_map( array(
		"name" => "Cooper Counter",
		"base" => "wr_vc_counter",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Counter Name",
				"param_name" => "counter_name1",
				"value" => "",
				"description" => __("Please insert counter name in format: Finished projects", 'cooper')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Counter Number",
				"param_name" => "counter_num1",
				"value" => "",
				"description" => __("Please insert counter number in format: 461", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Counter Icon Name",
				"param_name" => "icon1",
				"value" => "",
				"description" => __("Please insert <strong><a href='http://fontawesome.io/icons/' target='_blank'>Font Awesome</a></strong> icon class name. Ex: fa-puzzle-piece")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Counter Name",
				"param_name" => "counter_name2",
				"value" => "",
				"description" => __("Please insert counter name in format: Working projects", 'cooper')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Counter Number",
				"param_name" => "counter_num2",
				"value" => "",
				"description" => __("Please insert counter number in format: 354", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Counter Icon Name",
				"param_name" => "icon2",
				"value" => "",
				"description" => __("Please insert <strong><a href='http://fontawesome.io/icons/' target='_blank'>Font Awesome</a></strong> icon class name. Ex: fa-trophy")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rd Counter Name",
				"param_name" => "counter_name3",
				"value" => "",
				"description" => __("Please insert counter name in format: Happy customers", 'cooper')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rd Counter Number",
				"param_name" => "counter_num3",
				"value" => "",
				"description" => __("Please insert counter number in format: 168", 'cooper')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rd Counter Icon Name",
				"param_name" => "icon3",
				"value" => "",
				"description" => __("Please insert <strong><a href='http://fontawesome.io/icons/' target='_blank'>Font Awesome</a></strong> icon class name. Ex: fa-child")
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "4th Counter Name",
				"param_name" => "counter_name4",
				"value" => "",
				"description" => __("Please insert counter name in format: Working hours", 'cooper')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "4th Counter Number",
				"param_name" => "counter_num4",
				"value" => "",
				"description" => __("Please insert counter number in format: 222", 'cooper')
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "4th Counter Icon Name",
				"param_name" => "icon4",
				"value" => "",
				"description" => __("Please insert <strong><a href='http://fontawesome.io/icons/' target='_blank'>Font Awesome</a></strong> icon class name. Ex: fa-clock-o")
			),
            
		)
) );
// Pie Chart Block
class WPBakeryShortCode_WR_VC_Lists  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Cooper Pie Chart Lists", "Cooper",
        "base" => "wr_vc_lists",
        "as_parent" => array('only' => 'wr_vc_list'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by Cooper',
		"icon" => "icon-wpb-qode_clients",
        "show_settings_on_create" => true,
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),				
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Section Title",
				"param_name" => "title",
				"value" => ""
			),			
        ),
        "js_view" => 'VcColumnView'
) );
class WPBakeryShortCode_WR_VC_List extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Cooper Pie Chart Item", "Cooper",
        "base" => "wr_vc_list",
        "content_element" => true,
		"icon" => "icon-wpb-qode_client",
        "as_child" => array('only' => 'wr_vc_lists'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),					
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Pie Chart Name",
				"param_name" => "title",
				"value" => "",
				"description" => esc_attr__("Please insert counter name in format: Design", 'cooper')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Pie Chart Number",
				"param_name" => "counter_num",
				"value" => "",
				"description" => esc_attr__("Please insert counter number in format: 60", 'cooper')
			),		
        )
) );
// Partner Block
class WPBakeryShortCode_WR_VC_Partners  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Cooper Partner", "Cooper",
        "base" => "wr_vc_partners",
        "as_parent" => array('only' => 'wr_vc_partner'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by Cooper',
		"icon" => "icon-wpb-qode_clients",
        "show_settings_on_create" => true,
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),						
            
        ),
        "js_view" => 'VcColumnView'
) );
class WPBakeryShortCode_WR_VC_Partner extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Cooper Partner Logo", "Cooper",
        "base" => "wr_vc_partner",
        "content_element" => true,
		"icon" => "icon-wpb-qode_client",
        "as_child" => array('only' => 'wr_vc_partners'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Partner Image",
				"param_name" => "img_url",
				"value" => "",
				"description" => esc_attr__("Upload Image", 'cooper')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Partner URL",
				"param_name" => "prt_url",
				"value" => ""
			),				
        )
) );
// Action Button Block
vc_map( array(
		"name" => "Cooper Action Button",
		"base" => "wr_vc_action",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),										
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => esc_attr__("Please insert title text here. Ex: Ready to order your project ?", 'cooper')				
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"value" => ""
			),						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Text",
				"param_name" => "link_text",
				"value" => "",
				"description" => esc_attr__("Please insert button text here. Ex: Get In Touch", 'cooper')				
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Link URL",
				"param_name" => "link_url",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Link Target",
				"param_name" => "link_target",
				"value" => array(
				    "" => "",
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => ""
			),	
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Text Color",
				"param_name" => "button_color",
				"value" => ""
			),	 
		)
) );
// Social Icon Block
vc_map( array(
		"name" => "Cooper Social Icon",
		"base" => "wr_vc_social_icon",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			

		)
) );
// Contact Info Block
vc_map( array(
		"name" => "Cooper Contact Info",
		"base" => "wr_vc_contact_info",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Contact Info",
				"param_name" => "content",
				"value" => ""
			),			
	
			
            
		)
) );

// Contact Form Block
vc_map( array(
		"name" => "Cooper Contact Form",
		"base" => "wr_vc_contact_form",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => esc_attr__("Please insert title text here. Ex: Get in Touch", 'cooper')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Contact Form ID",
				"param_name" => "contactfromid",
				"value" => "",
				"description" => __("Please insert contact form id number in format: 27", 'cooper')
			),				
  
		)
) );
// Google Map Block
vc_map( array(
		"name" => "Cooper Google Map",
		"base" => "wr_vc_map",
		"category" => 'by Cooper',
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),					  
		)
) );

?>