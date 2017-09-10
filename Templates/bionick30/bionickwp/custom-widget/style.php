<?php
if (! function_exists('morpheus_widget_style')) :
	function morpheus_widget_style(){

				wp_enqueue_style('bootstrap', get_template_directory_uri() . '/includes/morpheus-widget/widget/css/bootstrap.css');
								
				wp_enqueue_style('aboutus', get_template_directory_uri() . '/includes/morpheus-widget/widget/css/about_us.css');
				wp_enqueue_style('accordion', get_template_directory_uri() . '/includes/morpheus-widget/widget/css/accordion-widget.css');

	// Footer Sectopm
	//wp_enqueue_style('contact', get_template_directory_uri() . '/includes/morpheus-widget/widget/css/contact.css');

}
	add_action('wp_enqueue_style', 'morpheus_widget_scripts');

endif;