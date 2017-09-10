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

/////********** By Bionick **********/////

// Title Block
vc_map( array(
		"name" => "Bionick Title",
		"base" => "wr_vc_section_title",
		"category" => 'by Bionick',
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
				"heading" => "Heading Title",
				"param_name" => "title",
				"value" => ""
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
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'Bionick')
			),			
			
		)
) );

// Text Block
vc_map( array(
		"name" => "Bionick Text",
		"base" => "wr_vc_section_text",
		"category" => 'by Bionick',
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
				"heading" => "Text Content",
				"param_name" => "content",
				"value" => "I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."
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
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'Bionick')
			),			
			
		)
) );


// Image Block
vc_map( array(
		"name" => "Bionick Image",
		"base" => "wr_vc_section_image",
		"category" => 'by Bionick',
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
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'Bionick')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Image Pop-Up",
				"param_name" => "img_popup",
				"value" => array(
					"Disable" => "none",
					"Enable" => "image-popup",
				)

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
			
		)
) );

// Button Block
vc_map( array(
		"name" => "Bionick Button",
		"base" => "wr_vc_section_button",
		"category" => 'by Bionick',
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
				"description" => __("Please insert border in format: 2px solid #7b7c80", 'Bionick')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Radius",
				"param_name" => "border_radius",
				"value" => "",
				"description" => __("Please insert border radius in format: 0px 0px 0px 0px", 'Bionick')
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
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'Bionick')
			),			
			
		)
) );

// Divider Block
vc_map( array(
		"name" => "Bionick Divider",
		"base" => "wr_vc_bar",
		"category" => 'by Bionick',
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
				"description" => __("Please insert width in format: 970px or 100%", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"value" => "",
				"description" => __("Please insert height in format: 300px", 'Bionick')
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
				"description" => __("Please insert border in format: 1px solid #7b7c80", 'Bionick')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Radius",
				"param_name" => "border_radius",
				"value" => "",
				"description" => __("Please insert border radius in format: 0px 0px 0px 0px", 'Bionick')
			),									
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'Bionick')
			),			
			
		)
) );

// Blog Block
vc_map( array(
		"name" => "Bionick Blog",
		"base" => "wr_vc_blog",
		"category" => 'by Bionick',
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
				"description" => __("(Optional) Insert category name in format: Graphic", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 8", 'Bionick')
			),		
            
		)
) );


// Portfolio Block
vc_map( array(
		"name" => "Bionick Portfolio",
		"base" => "wr_vc_portfolio_header",
		"category" => 'by Bionick',
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

// Portfolio 2 Block
vc_map( array(
		"name" => "Bionick Portfolio 2",
		"base" => "wr_vc_portfolio2_header",
		"category" => 'by Bionick',
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

// Portfolio 2 Block
vc_map( array(
		"name" => "Bionick Portfolio 3",
		"base" => "wr_vc_portfolio3_header",
		"category" => 'by Bionick',
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
		"name" => "Bionick Resume",
		"base" => "wr_vc_resume",
		"category" => 'by Bionick',
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
				"description" => __("(Optional) Insert category name in format: Directer", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 8", 'Bionick')
			),		
            
		)
) );

// Services Block
vc_map( array(
		"name" => "Bionick Services",
		"base" => "wr_vc_services",
		"category" => 'by Bionick',
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
				"description" => __("(Optional) Insert category name in format: Design", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 5", 'Bionick')
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Controls Show",
				"param_name" => "show_hide",
				"value" => array(
				    "Enable" => "",
					"Disable" => "display-none",
					
					
				),
				"description" => ""
			),				
            
		)
) );

// Testimonials Block
vc_map( array(
		"name" => "Bionick Testimonials",
		"base" => "wr_vc_testimonial",
		"category" => 'by Bionick',
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
				"description" => __("(Optional) Insert category name in format: Design", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Set Show Post Number",
				"param_name" => "showpost",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 5", 'Bionick')
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Controls Show",
				"param_name" => "show_hide",
				"value" => array(
				    "Enable" => "",
					"Disable" => "display-none",
					
					
				),
				"description" => ""
			),				
            
		)
) );

// Progress Bar Block
vc_map( array(
		"name" => "Bionick Progress Bar",
		"base" => "wr_vc_progress_bar",
		"category" => 'by Bionick',
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
				"heading" => "Main Counter Name",
				"param_name" => "title",
				"value" => "",
				"description" => __("Please insert counter name in format: Design", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Main Counter Number",
				"param_name" => "counter_num",
				"value" => "",
				"description" => __("Please insert counter number in format: 60", 'Bionick')
			),						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Sub Counter Name",
				"param_name" => "sub_title1",
				"value" => "",
				"description" => __("Please insert counter name in format: Photoshop", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Sub Counter Number",
				"param_name" => "sub_counter_num1",
				"value" => "",
				"description" => __("Please insert counter number in format: 95", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Sub Counter Name",
				"param_name" => "sub_title2",
				"value" => "",
				"description" => __("Please insert counter name in format: Photoshop", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Sub Counter Number",
				"param_name" => "sub_counter_num2",
				"value" => "",
				"description" => __("Please insert counter number in format: 95", 'Bionick')
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rd Sub Counter Name",
				"param_name" => "sub_title3",
				"value" => "",
				"description" => __("Please insert counter name in format: Photoshop", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rd Sub Counter Number",
				"param_name" => "sub_counter_num3",
				"value" => "",
				"description" => __("Please insert counter number in format: 95", 'Bionick')
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "4th Sub Counter Name",
				"param_name" => "sub_title4",
				"value" => "",
				"description" => __("Please insert counter name in format: Photoshop", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "4th Sub Counter Number",
				"param_name" => "sub_counter_num4",
				"value" => "",
				"description" => __("Please insert counter number in format: 95", 'Bionick')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "5th Sub Counter Name",
				"param_name" => "sub_title5",
				"value" => "",
				"description" => __("Please insert counter name in format: Photoshop", 'Bionick')
			),			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "5th Sub Counter Number",
				"param_name" => "sub_counter_num5",
				"value" => "",
				"description" => __("Please insert counter number in format: 95", 'Bionick')
			),
			
		)
) );

// Counter Block
vc_map( array(
		"name" => "Bionick Counter",
		"base" => "wr_vc_counter",
		"category" => 'by Bionick',
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
				"value" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Counter Name",
				"param_name" => "counter_name1",
				"value" => "",
				"description" => __("Please insert counter name in format: Finished Projects", 'Bionick')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "1st Counter Number",
				"param_name" => "counter_num1",
				"value" => "",
				"description" => __("Please insert counter number in format: 461", 'Bionick')
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Counter Name",
				"param_name" => "counter_name2",
				"value" => "",
				"description" => __("Please insert counter name in format: Finished Projects", 'Bionick')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "2nd Counter Number",
				"param_name" => "counter_num2",
				"value" => "",
				"description" => __("Please insert counter number in format: 461", 'Bionick')
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rd Counter Name",
				"param_name" => "counter_name3",
				"value" => "",
				"description" => __("Please insert counter name in format: Finished Projects", 'Bionick')
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "3rdt Counter Number",
				"param_name" => "counter_num3",
				"value" => "",
				"description" => __("Please insert counter number in format: 461", 'Bionick')
			),			
            
		)
) );


// Contact Info Block
vc_map( array(
		"name" => "Bionick Contact Info",
		"base" => "wr_vc_contact_info",
		"category" => 'by Bionick',
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
				"heading" => "Contact Phone",
				"param_name" => "con_phone",
				"value" => "",				
			),			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Contact Address",
				"param_name" => "con_address",
				"value" => "",
			),				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Contact Mail",
				"param_name" => "con_mail",
				"value" => "",
			),	
			
            
		)
) );

// Contact Form Block
vc_map( array(
		"name" => "Bionick Contact Form",
		"base" => "wr_vc_contact_form",
		"category" => 'by Bionick',
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
				"heading" => "Contact Form ID",
				"param_name" => "contactfromid",
				"value" => "",
				"description" => __("Please insert contact form id number in format: 27", 'Bionick')
			),				
  
		)
) );


?>