<?php

	function bionick_wp_style() {
            wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
		    wp_enqueue_style('reset', get_template_directory_uri() . '/includes/css/reset.css');
			wp_enqueue_style('plugins', get_template_directory_uri() . '/includes/css/plugins.css');
			wp_enqueue_style('main-style', get_template_directory_uri() . '/includes/css/style.css');
			wp_enqueue_style('color', get_template_directory_uri() . '/includes/css/color.css');									
}
	add_action('wp_enqueue_scripts', 'bionick_wp_style');
	
