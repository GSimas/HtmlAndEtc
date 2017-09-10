<?php

if( !function_exists ('bionick_wp_enqueue_scripts') ) :
	function bionick_wp_scripts() {
				
		wp_enqueue_script('plugins', get_template_directory_uri() . '/includes/js/plugins.js', array('jquery'), '1.0',true);		
		wp_enqueue_script('scripts', get_template_directory_uri() . '/includes/js/scripts.js', array('jquery'), '1.0',true);
		
		wp_enqueue_script('custom', get_template_directory_uri() . '/includes/js/custom.js', array('jquery'), '1.0',true);
		
}
	add_action('wp_enqueue_scripts', 'bionick_wp_scripts');
endif;