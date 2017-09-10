<?php

if( !function_exists ('cooper_enqueue_scripts') ) :
	function cooper_scripts() {
		global $map_array, $map2_array, $mapmarker, $userdata, $opt_theme_style;
		$cooper_options = get_option('cooper_wp');	
		$protocol = is_ssl() ? 'https' : 'http';	
		if(!empty($cooper_options['maploc'])){
		wp_enqueue_script('googlemap', "$protocol://maps.googleapis.com/maps/api/js?key=AIzaSyCN8bSGZHdbSOXu0HbhXf8j0SnswTmbCNw&callback=", array('jquery'), '1.0',true);
		wp_enqueue_script('map-script', get_template_directory_uri() . '/includes/js/map-script.js', array('jquery'), '1.0',true);
		}	if(!empty($cooper_options['maploc'])){
		if(isset($cooper_options['maploc'])){ $map_array = array( 'some_string1' => ( $cooper_options['maploc'] ), 'a_value' => '30' ); }
		if(isset($cooper_options['maploc2'])){ $map2_array = array( 'some_string2' => ( $cooper_options['maploc2'] ), 'a_value' => '30' ); }
		if(isset($cooper_options['mapmarker'])){ $mapmarker = array( 'some_string3' => ( $cooper_options['mapmarker'] ), 'a_value' => '30' ); }
		if(isset($cooper_options['userdata'])){ $userdata = array( 'some_string4' => ( $cooper_options['userdata'] ), 'a_value' => '30' ); }		
		wp_enqueue_script('dg-map', get_template_directory_uri() . '/includes/js/map.js', array('jquery'), '1.0',true);
		wp_localize_script( 'dg-map', 'object_name1', $map_array );
		wp_localize_script( 'dg-map', 'object_name2', $map2_array );
		wp_localize_script( 'dg-map', 'object_name3', $mapmarker );
		wp_localize_script( 'dg-map', 'object_name4', $userdata );		
		}		
		wp_enqueue_script('plugins', get_template_directory_uri() . '/includes/js/plugins.js', array('jquery'), '1.0',true);		
		wp_enqueue_script('scripts', get_template_directory_uri() . '/includes/js/scripts.js', array('jquery'), '1.0',true);
		if(!empty($cooper_options['opt-theme-style'])){
		if(isset($cooper_options['opt-theme-style'])){ $opt_theme_style = array( 'some_string5' => ( $cooper_options['opt-theme-style'] ), 'a_value' => '30' ); }
		wp_enqueue_script('cooper-counter', get_template_directory_uri() . '/includes/js/counter-opt.js', array('jquery'), '1.0',true);
		wp_localize_script( 'cooper-counter', 'object_name5', $opt_theme_style );
		}
		else {
		wp_enqueue_script('cooper-counter', get_template_directory_uri() . '/includes/js/counter.js', array('jquery'), '1.0',true);
		}
		wp_enqueue_script('custom', get_template_directory_uri() . '/includes/js/custom.js', array('jquery'), '1.0',true);
		
		if ( is_singular() && comments_open() && get_option('thread_comments') )
		  wp_enqueue_script( 'comment-reply' );			
		
		
}
	add_action('wp_enqueue_scripts', 'cooper_scripts');
endif;