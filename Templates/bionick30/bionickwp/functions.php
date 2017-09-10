<?php

// Theme Custom CSS Options
   include('includes/custom.php');

// Enqueue Style
   include('includes/style.php');

// Enqueue JS
   include('includes/js.php');
	
// Redux Options	
   include_once 'includes/sample-config.php';
   include_once 'includes/AfterSetupTheme.php';

// Sidebar's functionality
   include('includes/functions.php');

// Custom Widget
   include('custom-widget/custom-widget.php');	

// Shortcode's functionality
   include('pagination.php');

if ( ! isset( $content_width ) ) $content_width = 900;	

// register nav menu
	function mo_register_menus() {
		register_nav_menus( array( 
      'top-menu' => __( 'Primary menu','bionick_wp' ),
      'main-menu' => __('One Page Menu ','bionick_wp'),
      'home-menu' => __('Home Page Menu ','bionick_wp'),
                              
                        )
							);
	}
	add_action('init', 'mo_register_menus');


function mo_setup() {
// Theme Support  
	function wr_editor_styles() {
    add_editor_style( 'style.css' );
    }
	add_action( 'after_setup_theme', 'wr_add_editor_styles' );
	add_action( 'after_setup_theme', 'bionick_lang_setup' );
	function bionick_lang_setup(){
    load_theme_textdomain('bionick', get_template_directory() . '/languages');
    }		
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( "title-tag" );
	add_theme_support( 'post-formats', array( 'image','video','audio','gallery' ) );
	add_post_type_support( 'portgallery', 'post-formats' );

}
// Word Limit 
	function mo_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}

// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
	add_image_size( 'menu-feature-img', 800, 1200, true ); // Menu Section Thumbnail
	//add_image_size( 'services-img', 226, 151, true ); // Services Section Thumbnail	
	add_image_size( 'testimonial-img', 129, 129, true ); // Testimonials Section Thumbnail		
	add_image_size( 'portfolio-img', 535, 357, true ); // Portfolio Large Thumbnail
	add_image_size( 'portfolio-slider', 745, 497, true ); // Portfolio Slider Thumbnail


include(get_template_directory().'/symple-shortcodes/symple-shortcodes.php');

 
// How comments are displayed

function ck_comment($comment, $args, $depth) {
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
	<ul class="commentlist clearafix">
	    <li class="comment">

    <?php endif; ?>
		
		    <div class="comment-body">
			
			    <div class="comment-author">
                    <?php echo get_avatar( $comment, 50 ); ?>
				</div>
				
				<cite class="fn"><a href="#"><?php printf(__('%s','bionick'), get_comment_author_link()) ?></a></cite>
				
				<div class="comment-meta">
				
				    <h6><span class='comment-link'><?php printf( __(' %1$s  ','bionick'), comment_time('M j, Y \a\t g:i A')) ?></span> <?php esc_attr_e('/', 'bionick');?> <span class='comment-reply-link'><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span></h6>
					
				</div>	
				
				<p><?php comment_text() ?></p>
            </div>	

<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','bionick') ?></em>
    <br />
<?php endif; ?>

    
    <?php if ( 'div' != $args['style'] ) : ?>
	
	    </li>
    
    </ul>
    </div>
    <?php endif; ?>
<?php
        }		
		

// create sidebar & widget area

if(function_exists('register_sidebar')) {
  
  
  
  function nd_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'bionick' ),
        'id' => 'blog-sidebar',
        'description' => __( 'This area for blog widgets.', 'bionick' ),
        'before_widget' => '<div id="%1$s" class="widget spo-sidebar-widget text-left clear animation %2$s"  data-animation="animation-fade-in-right">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="spo-sidebar-widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'nd_theme_slug_widgets_init' );

function nd_theme_slug_widgets__init() {
    register_sidebar( array(
        'name' => __( 'Page Sidebar', 'bionick' ),
        'id' => 'page-sidebar',
        'description' => __( 'This area for page widgets.', 'bionick' ),
        'before_widget' => '<div id="%1$s" class="widget spo-sidebar-widget text-left clear animation %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="spo-sidebar-widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'nd_theme_slug_widgets__init' );


function nd_theme_slug_widgets____init() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar', 'bionick' ),
        'id' => 'footer-sidebar',
        'description' => __( 'This area for footer widgets.', 'bionick' ),
        'before_widget' => '<div class="col-md-4"><div id="%1$s" class="widget footer-info spo-footer-widget text-left %2$s">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<h4 class="spo-footer-widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'nd_theme_slug_widgets____init' );


}

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



/* Include Meta Box Framework */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/metaboxes' ) );

require_once RWMB_DIR . 'meta-box.php';
include(get_template_directory().'/includes/metaboxes.php');

