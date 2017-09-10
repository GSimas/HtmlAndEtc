<?php
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


add_action( 'after_setup_theme', 'cooper_setup' );

/* ==========================================
   Add featured image column to admin panel post list page
========================================== */
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
	$columns['img'] = 'Thumbnail';
	return $columns;
}

function manage_img_column($column_name, $post_id) {
	if( $column_name == 'img' ) {
		echo get_the_post_thumbnail( $post_id, array( 80, 60) ); return true; // 80, 60 is for image size.
	}
}

// Change columns order
add_filter('manage_posts_columns', 'column_order');
function column_order($columns) {
  $n_columns = array();
  $move = 'img'; // what to move
  $before = 'title'; // move before this
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}

// Set columns width
function set_column_width() { ?>
	<style type="text/css">
		/*	Class ".column-img" is for image column */
		.edit-php .fixed .column-img { 
			width: 100px;
		}
	</style>
<?php }
add_action( 'admin_enqueue_scripts', 'set_column_width' );
 


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once (get_template_directory().'/framework/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'cooper_my_theme_register_required_plugins' );
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
 * TGM_Plugin_Activation class cooperor.
 */
function cooper_my_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
	if (class_exists('WooCommerce')) { 
    $plugins = array(     
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_attr__( 'Redux Framework', 'cooper' ),
            'slug'      => 'redux-framework',
            'required'  => true,
        ), 
        array(
            'name'      => esc_attr__( 'Visual Composer', 'cooper' ),
            'slug'      => 'js_composer',
			'source'    => esc_url('http://webredox.net/plugins/js_composer.zip','cooper' ),
            'required'  => true,
        ),	
		array(
            'name'               => esc_attr__( 'Revolution Slider', 'cooper' ),
            'slug'               => 'revslider',
            'source'             => esc_url('http://webredox.net/plugins/revslider.zip','cooper' ),
            'required'           => true,  
        ),

		
		array(
            'name'               => esc_attr__( 'WooSwatches - Woocommerce Color or Image Variation Swatches', 'cooper' ),
            'slug'               => 'woocommerce-colororimage-variation-select',
            'source'             => esc_url('http://webredox.net/plugins/wooswatches.zip','cooper' ),
            'required'           => false,  
        ),	
		
		
		array(
            'name'               => esc_attr__( 'Cooper Custom Plugin', 'cooper' ),
            'slug'               => 'cooper-plugins',
            'source'             => esc_url('http://webredox.net/demo/wp/plugins/cooper-plugins.zip','cooper' ),
            'required'           => true, 
        ),			
        array(
            'name'      => esc_attr__( 'Meta Box', 'cooper' ),
            'slug'      => 'meta-box',
            'required'  => true,
        ),  				
		array(
            'name'      => esc_attr__( 'Contact Form 7', 'cooper' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),					
				
    );
	}
	else {
	
	$plugins = array(     
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_attr__( 'Redux Framework', 'cooper' ),
            'slug'      => 'redux-framework',
            'required'  => true,
        ), 
        array(
            'name'      => esc_attr__( 'Visual Composer', 'cooper' ),
            'slug'      => 'js_composer',
			'source'    => esc_url('http://webredox.net/plugins/js_composer.zip','cooper' ),
            'required'  => true,
        ),	
		array(
            'name'               => esc_attr__( 'Revolution Slider', 'cooper' ),
            'slug'               => 'revslider',
            'source'             => esc_url('http://webredox.net/plugins/revslider.zip','cooper' ),
            'required'           => true,  
        ),

		array(
            'name'               => esc_attr__( 'Cooper Custom Plugin', 'cooper' ),
            'slug'               => 'cooper-plugins',
            'source'             => esc_url('http://webredox.net/demo/wp/plugins/cooper-plugins.zip','cooper' ),
            'required'           => true, 
        ),			
        array(
            'name'      => esc_attr__( 'Meta Box', 'cooper' ),
            'slug'      => 'meta-box',
            'required'  => true,
        ),  				
		array(
            'name'      => esc_attr__( 'Contact Form 7', 'cooper' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),					
				
    );
	
	}
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

   