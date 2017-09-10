<?php
// Custom CSS 
   require (get_template_directory() . '/includes/custom.php');
// Enqueue Style
   require (get_template_directory() . '/includes/style.php');
// Enqueue JS
   require (get_template_directory() . '/includes/js.php');	
// Redux Options	
   require (get_template_directory() . '/includes/cooper-options.php');
   require (get_template_directory() . '/includes/AfterSetupTheme.php');
// Functionality
   require (get_template_directory() . '/includes/functions.php');     
// Pagination 
   require (get_template_directory() . '/pagination.php');  

if ( ! isset( $content_width ) ) $content_width = 900;	
$cooper_options = get_option('cooper_wp');
// register nav menu
	function cooper_register_menus() {
		register_nav_menus( array( 
      'top-menu' => __( 'Primary menu','cooper' ),
      'home-menu' => __('Home Page Menu ','cooper'),
                              
                        )
							);
	}
	add_action('init', 'cooper_register_menus');
	add_action( 'after_setup_theme', 'cooper_setup' );
function cooper_setup() {
// Theme Support  
	function cooper_editor_styles() {
    add_editor_style( 'style.css' );
    }
	add_action( 'after_setup_theme', 'cooper_add_editor_styles' );
	add_action( 'after_setup_theme', 'cooper_lang_setup' );
	function cooper_lang_setup(){
    load_theme_textdomain('cooper', get_template_directory() . '/languages');
    }		
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( "title-tag" );	
	add_theme_support( 'post-formats', array( 'image','video','audio','gallery' ) );
	add_post_type_support( 'portgallery', 'post-formats' );

}
// Word Limit 
	function cooper_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}

// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails

 
// How comments are displayed

function cooper_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'children';
    }
?>
    <<?php echo balanceTags($tag) ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment">

    <?php endif; ?>
		
		    <div class="comment-body">
			
			    <div class="comment-author">
                    <?php echo get_avatar( $comment, 50 ); ?>
				</div>
				
				<cite class="fn"><a href="#"><?php printf(esc_attr__('%s','cooper'), get_comment_author_link()) ?></a></cite>
				
				<div class="comment-meta">
				
				    <h6><span class='comment-link'><?php printf( esc_attr__(' %1$s  ','cooper'), comment_time('M j, Y \a\t g:i A')) ?></span> <?php esc_attr_e('/', 'cooper');?> <span class='comment-reply-link'><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span></h6>
					
				</div>	
				
				<p><?php comment_text() ?></p>
            </div>	

<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-cooperderation"><?php esc_attr_e('Your comment is awaiting cooperderation.','cooper') ?></em>
    <br />
<?php endif; ?>

    
    <?php if ( 'div' != $args['style'] ) : ?>
	
    </div>
    <?php endif; ?>
<?php
        }		
		

// create sidebar & widget area

if(function_exists('register_sidebar')) {
	
function cooper_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_attr__( 'Blog Sidebar', 'cooper' ),
        'id' => 'blog-sidebar',
        'description' => esc_attr__( 'This area for blog widgets.', 'cooper' ),
        'before_widget' => '<div id="%1$s" class="widget spo-sidebar-widget text-left clear animation %2$s"  data-animation="animation-fade-in-right">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="spo-sidebar-widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'cooper_theme_slug_widgets_init' );

function cooper_theme_slug_widgets__init() {
    register_sidebar( array(
        'name' => esc_attr__( 'Page Sidebar', 'cooper' ),
        'id' => 'page-sidebar',
        'description' => esc_attr__( 'This area for page widgets.', 'cooper' ),
        'before_widget' => '<div id="%1$s" class="widget spo-sidebar-widget text-left clear animation %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="spo-sidebar-widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'cooper_theme_slug_widgets__init' );

if (class_exists('WooCommerce')) {
if($cooper_options['product-st'] == 'st4') {
function cooper_theme_slug_widgets___init() {
    register_sidebar( array(
        'name' => esc_attr__( 'WOOCOMMERCE Sidebar','cooper' ),
        'id' => 'sidebar-2',
        'description' => esc_attr__( 'This area for All WOOCOMMERCE Widget.','cooper' ),
        'before_widget' => '<div id="%1$s" class="widget spo-sidebar-widget text-left clear animation %2$s"  data-animation="animation-fade-in-right">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="spo-sidebar-widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'cooper_theme_slug_widgets___init' );
}
}

}
function cooper_removeDemoModeLink() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'cooper_removeDemoModeLink');
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) vc_set_as_theme();

// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function requireVcExtend(){
		require_once locate_template('/extendvc/extend-vc.php');
	}
	add_action('init', 'requireVcExtend',2);
}

/* CHECK WOOCOMMERCE IS ACTIVE
  ================================================== */ 
  if ( ! function_exists( 'cooper_woocommerce_activated' ) ) {
    function cooper_woocommerce_activated() {
      if ( class_exists( 'woocommerce' ) ) {
        return true;
      } else {
        return false;
      }
    }
  }
add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
function woocommerce_pagination() {
		cooper_pagination(); 		
	}
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);
if (class_exists('WooCommerce')) {
if($cooper_options['product-st'] == 'st2') {
/**
     * Get current users preference
     * @return int
     */
    function cooper_get_products_per_page(){
 
        global $woocommerce;
 
        $cooper_default = 9;
        $cooper_count = $cooper_default;
        $cooper_options = cooper_get_products_per_page_options();
 
        // capture form data and store in session
        if(isset($_POST['jc-woocommerce-products-per-page'])){
 
            // set products per page from dropdown
            $cooper_products_max = intval($_POST['jc-woocommerce-products-per-page']);
            if($cooper_products_max != 0 && $cooper_products_max >= -1){
 
            	if(is_user_logged_in()){
 
            		$cooper_user_id = get_current_user_id();
    		    	$cooper_limit = get_user_meta( $cooper_user_id, '_product_per_page', true );
 
    		    	if(!$cooper_limit){
    		    		add_user_meta( $cooper_user_id, '_product_per_page', $cooper_products_max);
    		    	}else{
    		    		update_user_meta( $cooper_user_id, '_product_per_page', $cooper_products_max, $cooper_limit);
    		    	}
            	}
 
                $woocommerce->session->cooper_product_per_page = $cooper_products_max;
                return $cooper_products_max;
            }
        }
 
        // load product limit from user meta
        if(is_user_logged_in() && !isset($woocommerce->session->cooper_product_per_page)){
 
            $cooper_user_id = get_current_user_id();
            $cooper_limit = get_user_meta( $cooper_user_id, '_product_per_page', true );
 
            if(array_key_exists($cooper_limit, $cooper_options)){
                $woocommerce->session->cooper_product_per_page = $cooper_limit;
                return $cooper_limit;
            }
        }
 
        // load product limit from session
        if(isset($woocommerce->session->cooper_product_per_page)){
 
            // set products per page from woo session
            $cooper_products_max = intval($woocommerce->session->cooper_product_per_page);
            if($cooper_products_max != 0 && $cooper_products_max >= -1){
                return $cooper_products_max;
            }
        }
 
        return $cooper_count;
    }
    add_filter('loop_shop_per_page','cooper_get_products_per_page');
 
    /**
     * Fetch list of avaliable options
     * @return array
     */
    function cooper_get_products_per_page_options(){
    	$cooper_options = apply_filters( 'cooper_products_per_page', array(
    		9 => esc_attr__('9', 'cooper'),
    		18 => esc_attr__('18', 'cooper'),
    		36 => esc_attr__('36', 'cooper'),
    		72 => esc_attr__('72', 'cooper'),
    		144 => esc_attr__('144', 'cooper'),
    		-1 => esc_attr__('All', 'cooper'),
        ));
 
    	return $cooper_options;
    }
 
    /**
     * Display dropdown form to change amount of products displayed
     * @return void
     */
    function cooper_woocommerce_products_per_page(){
 
        $cooper_options = cooper_get_products_per_page_options();
 
        $cooper_current_value = cooper_get_products_per_page();
        ?>
		
		<div class="fixed-filter">
                        <div class="filter-button"><?php esc_attr_e('Showing','cooper');?></div>
                        <div class="folio-counter">
                            <div class="num-album"></div>
                            <div class="all-album"></div>
                        </div>
                        <div class="gallery-filters wr-shop-filter">
                            <form action="" method="POST" class="woocommerce-products-per-page">
                <select name="jc-woocommerce-products-per-page" class="jc-woocommerce-products-select" onchange="this.form.submit()">
                <?php foreach($cooper_options as $cooper_value => $cooper_name): ?>
                    <option value="<?php echo esc_attr($cooper_value); ?>" <?php selected($cooper_value, $cooper_current_value); ?>><?php esc_attr_e('Show on page: ','cooper');?><?php echo esc_attr($cooper_name); ?></option>
                <?php endforeach; ?>
                </select>
            </form>
                        </div>
                    </div>
       
            
        
        <?php
    }
 
add_action('woocommerce_before_shop_loop', 'cooper_woocommerce_products_per_page', 25);
} else if($cooper_options['product-st'] == 'st3') {
/**
     * Get current users preference
     * @return int
     */
    function cooper_get_products_per_page(){
 
        global $woocommerce;
 
        $cooper_default = 9;
        $cooper_count = $cooper_default;
        $cooper_options = cooper_get_products_per_page_options();
 
        // capture form data and store in session
        if(isset($_POST['jc-woocommerce-products-per-page'])){
 
            // set products per page from dropdown
            $cooper_products_max = intval($_POST['jc-woocommerce-products-per-page']);
            if($cooper_products_max != 0 && $cooper_products_max >= -1){
 
            	if(is_user_logged_in()){
 
            		$cooper_user_id = get_current_user_id();
    		    	$cooper_limit = get_user_meta( $cooper_user_id, '_product_per_page', true );
 
    		    	if(!$cooper_limit){
    		    		add_user_meta( $cooper_user_id, '_product_per_page', $cooper_products_max);
    		    	}else{
    		    		update_user_meta( $cooper_user_id, '_product_per_page', $cooper_products_max, $cooper_limit);
    		    	}
            	}
 
                $woocommerce->session->cooper_product_per_page = $cooper_products_max;
                return $cooper_products_max;
            }
        }
 
        // load product limit from user meta
        if(is_user_logged_in() && !isset($woocommerce->session->cooper_product_per_page)){
 
            $cooper_user_id = get_current_user_id();
            $cooper_limit = get_user_meta( $cooper_user_id, '_product_per_page', true );
 
            if(array_key_exists($cooper_limit, $cooper_options)){
                $woocommerce->session->cooper_product_per_page = $cooper_limit;
                return $cooper_limit;
            }
        }
 
        // load product limit from session
        if(isset($woocommerce->session->cooper_product_per_page)){
 
            // set products per page from woo session
            $cooper_products_max = intval($woocommerce->session->cooper_product_per_page);
            if($cooper_products_max != 0 && $cooper_products_max >= -1){
                return $cooper_products_max;
            }
        }
 
        return $cooper_count;
    }
    add_filter('loop_shop_per_page','cooper_get_products_per_page');
 
    /**
     * Fetch list of avaliable options
     * @return array
     */
    function cooper_get_products_per_page_options(){
    	$cooper_options = apply_filters( 'cooper_products_per_page', array(
    		9 => esc_attr__('9', 'cooper'),
    		18 => esc_attr__('18', 'cooper'),
    		36 => esc_attr__('36', 'cooper'),
    		72 => esc_attr__('72', 'cooper'),
    		144 => esc_attr__('144', 'cooper'),
    		-1 => esc_attr__('All', 'cooper'),
        ));
 
    	return $cooper_options;
    }
 
    /**
     * Display dropdown form to change amount of products displayed
     * @return void
     */
    function cooper_woocommerce_products_per_page(){
 
        $cooper_options = cooper_get_products_per_page_options();
 
        $cooper_current_value = cooper_get_products_per_page();
        ?>
		
		<div class="fixed-filter">
                        <div class="filter-button"><?php esc_attr_e('Showing','cooper');?></div>
                        <div class="folio-counter">
                            <div class="num-album"></div>
                            <div class="all-album"></div>
                        </div>
                        <div class="gallery-filters wr-shop-filter">
                            <form action="" method="POST" class="woocommerce-products-per-page">
                <select name="jc-woocommerce-products-per-page" class="jc-woocommerce-products-select" onchange="this.form.submit()">
                <?php foreach($cooper_options as $cooper_value => $cooper_name): ?>
                    <option value="<?php echo esc_attr($cooper_value); ?>" <?php selected($cooper_value, $cooper_current_value); ?>><?php esc_attr_e('Show on page: ','cooper');?><?php echo esc_attr($cooper_name); ?></option>
                <?php endforeach; ?>
                </select>
            </form>
                        </div>
                    </div>
       
            
        
        <?php
    }
 
add_action('woocommerce_before_shop_loop', 'cooper_woocommerce_products_per_page', 25);
} else {
}
}

add_filter( 'woocommerce_output_related_products_args', 'cooper_related_products_args' );
  function cooper_related_products_args( $args ) {

	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}
