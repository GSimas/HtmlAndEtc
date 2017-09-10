<?php

if( ! function_exists( 'portfolio_post_types' ) ) {
    function portfolio_post_types() {

        register_post_type(
            'portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolio', 'portfolio' ),
                    'singular_name' => __( 'Portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio Item', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio' ),
                    'view'          => __( 'View Portfolio', 'portfolio' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
				'menu_icon' => 'dashicons-grid-view',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));         

    }	
	flush_rewrite_rules();
}

add_action( 'init', 'portfolio_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

if( ! function_exists( 'portfolio2_post_types' ) ) {
    function portfolio2_post_types() {

        register_post_type(
            'portfolio2',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolio 2', 'portfolio2' ),
                    'singular_name' => __( 'Portfolio 2', 'portfolio2' ),
                    'add_new'       => __( 'Add New', 'portfolio2' ),
                    'add_new_item'  => __( 'Add New Portfolio Item', 'portfolio2' ),
                    'edit'          => __( 'Edit', 'portfolio2' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio2' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio2' ),
                    'view'          => __( 'View Portfolio', 'portfolio2' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio2' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio2' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio2' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio2' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio2' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio2' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 7,
                'hierarchical'      => true,
                'query_var'         => true,
				'menu_icon' => 'dashicons-screenoptions',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio2_category', 'portfolio2', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));         

    }
	flush_rewrite_rules();
}

add_action( 'init', 'portfolio2_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

if( ! function_exists( 'portfolio3_post_types' ) ) {
    function portfolio3_post_types() {

        register_post_type(
            'portfolio3',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolio 3', 'portfolio3' ),
                    'singular_name' => __( 'Portfolio 3', 'portfolio3' ),
                    'add_new'       => __( 'Add New', 'portfolio3' ),
                    'add_new_item'  => __( 'Add New Portfolio Item', 'portfolio3' ),
                    'edit'          => __( 'Edit', 'portfolio3' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio3' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio3' ),
                    'view'          => __( 'View Portfolio', 'portfolio3' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio3' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio3' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio3' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio3' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio3' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio3' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 8,
                'hierarchical'      => true,
                'query_var'         => true,
                'menu_icon' => 'dashicons-forms',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio3_category', 'portfolio3', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));         

    }
	flush_rewrite_rules();
}

add_action( 'init', 'portfolio3_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

if( ! function_exists( 'services_post_types' ) ) {
    function services_post_types() {

        register_post_type(
            'services',
            array(
                'labels' => array(
                    'name'          => __( 'Services', 'services' ),
                    'singular_name' => __( 'Services', 'services' ),
                    'add_new'       => __( 'Add New', 'services' ),
                    'add_new_item'  => __( 'Add New Services', 'services' ),
                    'edit'          => __( 'Edit', 'services' ),
                    'edit_item'     => __( 'Edit Services', 'services' ),
                    'new_item'      => __( 'New Services', 'services' ),
                    'view'          => __( 'View Services', 'services' ),
                    'view_item'     => __( 'View Services', 'services' ),
                    'search_items'  => __( 'Search Services', 'services' ),
                    'not_found'     => __( 'No Services Item found', 'services' ),
                    'not_found_in_trash' => __( 'No Services item found in Trash', 'services' ),
                    'parent'        => __( 'Parent Services', 'services' ),
                ),
                
                'description'       => __( 'Create a Services.', 'services' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 8,
                'hierarchical'      => true,
                'query_var'         => true,
				'menu_icon' => 'dashicons-megaphone',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('services_category', 'services', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));

    }
}

add_action( 'init', 'services_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

if( ! function_exists( 'resume_post_types' ) ) {
    function resume_post_types() {

        register_post_type(
            'resume',
            array(
                'labels' => array(
                    'name'          => __( 'Resume', 'resume' ),
                    'singular_name' => __( 'Resume', 'resume' ),
                    'add_new'       => __( 'Add New', 'resume' ),
                    'add_new_item'  => __( 'Add New Resume', 'resume' ),
                    'edit'          => __( 'Edit', 'resume' ),
                    'edit_item'     => __( 'Edit Resume', 'resume' ),
                    'new_item'      => __( 'New Resume', 'resume' ),
                    'view'          => __( 'View Resume', 'resume' ),
                    'view_item'     => __( 'View Resume', 'resume' ),
                    'search_items'  => __( 'Search Resume', 'resume' ),
                    'not_found'     => __( 'No Resume Item found', 'resume' ),
                    'not_found_in_trash' => __( 'No Resume item found in Trash', 'resume' ),
                    'parent'        => __( 'Parent Resume', 'resume' ),
                ),
                
                'description'       => __( 'Create a Resume.', 'resume' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 7,
                'hierarchical'      => true,
                'query_var'         => true,
				'menu_icon' => 'dashicons-welcome-learn-more',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('resume_category', 'resume', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));

    }
}

add_action( 'init', 'resume_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

if( ! function_exists( 'testimonial_post_types' ) ) {
    function testimonial_post_types() {

        register_post_type(
            'testimonial',
            array(
                'labels' => array(
                    'name'          => __( 'Testimonials', 'testimonial' ),
                    'singular_name' => __( 'Testimonials', 'testimonial' ),
                    'add_new'       => __( 'Add New', 'testimonial' ),
                    'add_new_item'  => __( 'Add New Testimonial', 'testimonial' ),
                    'edit'          => __( 'Edit', 'testimonial' ),
                    'edit_item'     => __( 'Edit Testimonial', 'testimonial' ),
                    'new_item'      => __( 'New Testimonial', 'testimonial' ),
                    'view'          => __( 'View Testimonial', 'testimonial' ),
                    'view_item'     => __( 'View Testimonial', 'testimonial' ),
                    'search_items'  => __( 'Search Testimonial', 'testimonial' ),
                    'not_found'     => __( 'No Testimonial Item found', 'testimonial' ),
                    'not_found_in_trash' => __( 'No Testimonial item found in Trash', 'testimonial' ),
                    'parent'        => __( 'Parent Testimonial', 'testimonial' ),
                ),
                
                'description'       => __( 'Create a Testimonial.', 'testimonial' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 9,
                'hierarchical'      => true,
                'query_var'         => true,
				'menu_icon' => 'dashicons-format-quote',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('testimonial_category', 'testimonial', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));

    }
}

add_action( 'init', 'testimonial_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

if( ! function_exists( 'slider_post_types' ) ) {
    function slider_post_types() {

        register_post_type(
            'slider',
            array(
                'labels' => array(
                    'name'          => __( 'Slider', 'slider' ),
                    'singular_name' => __( 'Slider', 'slider' ),
                    'add_new'       => __( 'Add New', 'slider' ),
                    'add_new_item'  => __( 'Add New Slide', 'slider' ),
                    'edit'          => __( 'Edit', 'slider' ),
                    'edit_item'     => __( 'Edit Slide', 'slider' ),
                    'new_item'      => __( 'New Slide', 'slider' ),
                    'view'          => __( 'View Slide', 'slider' ),
                    'view_item'     => __( 'View Slide', 'slider' ),
                    'search_items'  => __( 'Search Slider', 'slider' ),
                    'not_found'     => __( 'No Slider Item found', 'slider' ),
                    'not_found_in_trash' => __( 'No Slider item found in Trash', 'slider' ),
                    'parent'        => __( 'Parent Slide', 'slider' ),
                ),
                
                'description'       => __( 'Create a Slide.', 'slider' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 10,
                'hierarchical'      => true,
                'query_var'         => true,
				'menu_icon' => 'dashicons-images-alt2',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('slider_category', 'slider', array('hierarchical' => true, 'label' => 'Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));

    }
}

add_action( 'init', 'slider_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

// Add class to <li> 

function add_menu_parent_class($items)
{

    $parents=array();
    foreach($items as $item){

        if($item->menu_item_parent && $item->menu_item_parent>0){
            $parents[]=$item->menu_item_parent;
        }
    }
    foreach($items as $item){
        if(in_array($item->ID,$parents)){
            $item->classes[]='current';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects','add_menu_parent_class');


class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
       $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';


           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            
           

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separatepages = get_post_meta($object->object_id, "rnr_open_page", true);
                $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
				$current_page_id = get_option('page_on_front');
		

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                  $output .= $indent . '<li id="menu-item-'. $object->ID . '" ' . $value . $class_names .' > ' ;

                  if ( $separatepages == true )
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'" ' : '';
                  else{
                    if (is_front_page()) 
                      $attributes .= ' href="#' . $varpost->post_name . '"'; 
				  
                    else 
                      $attributes .= ' href=" '. home_url().'/#'. $varpost->post_name .'"';
                  } 

                  $object_output = $args->before;
                $object_output .= '<a class="custom-scroll-link"'. $attributes .' data-toggle="my-scrollspy-2">';
                $object_output .= $args->link_before . '' . apply_filters( 'the_title', $object->title, $object->ID ) . '';
                $object_output .= $args->link_after;
                $object_output .= '</a>';
                $object_output .= $args->after;    

                 $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );                              
                }
                                         
           }
          
           
      }
}


add_action( 'after_setup_theme', 'mo_setup' );


 

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once (get_template_directory().'/framework/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

       

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Redux Framework',
            'slug'      => 'redux-framework',
            'required'  => true,
			'force_activation'   => false, 
            'force_deactivation' => false, 
        ),
        array(
            'name'      => 'Visual Composer',
            'slug'      => 'js_composer',
			'source'    => 'http://webredox.net/plugins/js_composer.zip',
            'required'  => true,
        ),		
		
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
		array(
            'name'               => 'Revolution Slider', 
            'slug'               => 'revslider',
            'source'             => 'http://webredox.net/plugins/revslider.zip',
            'required'           => false,  
        ),	
		array(
            'name'      => 'Redux Developer Mode Disabler',
            'slug'      => 'redux-developer-mode-disabler',
            'required'  => true,
        ),		
       		

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
       
    );

    tgmpa( $plugins, $config );

}

   