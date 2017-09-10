<?php
    vc_remove_param("zo_fancybox_single", 'title');
    vc_remove_param("zo_fancybox_single", 'description');
	$params = array(
		array(
			"type" => "dropdown",
			"heading" => __("Title Size",'3dprinting'),
			"param_name" => "zo_title_size",
			"value" => array(
					"H2" => "h2",
					"H3" => "h3",
					"H4" => "h4",
					"H5" => "h5",
					"H6" => "h6"
			)
		),
        array(
            "type" => "dropdown",
            "heading" => __("Style",'3dprinting'),
            "param_name" => "zo_fancybox_style",
            "value" => array(
                "Default" => "",
                "Large" => "large",
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align",'3dprinting'),
            "param_name" => "zo_fancybox_align",
            "value" => array(
                "Left" => "",
                "Right" => "right",
            ),
            "template" => array(
                'zo_fancybox_single--style-2.php'
            )
        ),
	);
