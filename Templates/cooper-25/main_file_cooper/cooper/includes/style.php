<?php

	function cooper_style() {
            wp_enqueue_style('cooper-style', get_template_directory_uri() . '/style.css');
		    wp_enqueue_style('reset', get_template_directory_uri() . '/includes/css/reset.css');
			wp_enqueue_style('plugins', get_template_directory_uri() . '/includes/css/plugins.css');
			wp_enqueue_style('yourstyle', get_template_directory_uri() . '/includes/css/yourstyle.css');			
			wp_enqueue_style('cooper-main-style', get_template_directory_uri() . '/includes/css/style.css');
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/color.css');
									
}
	add_action('wp_enqueue_scripts', 'cooper_style');
	
function cooper_fonts_url() {
    $cooper_font_url = '';
    
    if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'cooper' ) ) {
        $cooper_font_url = add_query_arg( 'family','Montserrat:400,700|Raleway:300,400,500,600,700,700i,800,900&subset=latin-ext' , "//fonts.googleapis.com/css" );
    }
    return $cooper_font_url;
}
function cooper_wp_scripts() {
    wp_enqueue_style( 'cooper_fonts', cooper_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'cooper_wp_scripts' );	
	
function cooper_enqueue_custom_admin_style() {
wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/includes/css/admin-style.css', false, '1.0.0' );
wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'cooper_enqueue_custom_admin_style' );		
