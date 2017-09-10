<?php
	$params = array(
        array(
			"type" => "dropdown",
			"heading" => __ ( 'Show Category', '3dprinting' ),
			"param_name" => "cat_show",
			"value" => array(
                "Yes" => "true",
                "No" => "false"
			),
			"description" => '',
			"group" => __("General Settings", '3dprinting'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title",'3dprinting'),
            "param_name" => "cat_title",
            "value" => "",
            "description" => __("Title for Category",'3dprinting'),
            "group" => __("General Settings", '3dprinting'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL",'3dprinting'),
            "param_name" => "cat_url",
            "value" => "",
            "description" => __("Link to Category",'3dprinting'),
            "group" => __("General Settings", '3dprinting'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "textarea",
            "heading" => __("Description",'3dprinting'),
            "param_name" => "cat_description",
            "value" => "",
            "description" => __("Description for Category",'3dprinting'),
            "group" => __("General Settings", '3dprinting'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),

	);
