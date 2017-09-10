<?php
/**
 * WooCommerce Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * woocommerce_after_single_product_summary hook
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * woocommerce_after_single_product hook
 */
add_action('woocommerce_after_single_product', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * woocommerce_single_product_summary hook
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 7 );

/**
* woocommerce_before_main_content hook
*
* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
* @hooked woocommerce_breadcrumb - 20
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Override WooCommerce Widgets
add_action('widgets_init', 'override_woocommerce_widgets', 15);
function override_woocommerce_widgets() {
    if (class_exists('WC_Widget_Products')) {
        unregister_widget('WC_Widget_Products');
        include_once( 'widgets/class-wc-widget-products.php' );
        register_widget('Custom_WC_Widget_Products');
    }
}

/*--- Fix Crop Image size -----*/
/*
 * Hook in on activation
 *
 */
add_action( 'init', 'zo_woocommerce_image_dimensions', 1 );

/**
 * Define image sizes
 */
function zo_woocommerce_image_dimensions() {
    $catalog = array(
        'width' 	=> '400',	// px
        'height'	=> '400',	// px
        'crop'		=> 1 		// true
    );

    $single = array(
        'width' 	=> '870',	// px
        'height'	=> '500',	// px
        'crop'		=> 1 		// true
    );

    $thumbnail = array(
        'width' 	=> '180',	// px
        'height'	=> '180',	// px
        'crop'		=> 0 		// false
    );

    // Image sizes
    update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
    update_option( 'shop_single_image_size', $single ); 		// Single product image
    update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
//Remove Count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 21 );

add_action( 'woocommerce_product_query', 'zo_hook_query_woo' );

function zo_hook_query_woo( $q ){
    $meta_query = $q->get( 'tax_query' );
        $brand = !empty($_GET['pa_brand']) ? $_GET['pa_brand']: 'all';
        if($brand == 'all'){
            return false;
        }
            $meta_query[] =  array(
                'taxonomy' => 'pa_brand',
                'field' => 'term_id',
                'terms'    => $brand,
            );

            $q->set( 'tax_query', $meta_query );


}
// LOAD PRETTY PHOTO for the whole site

add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );

function frontend_scripts_include_lightbox() {
    global $woocommerce;
    $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
    $lightbox_en = get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;

    if ( $lightbox_en ) {
        wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
        wp_enqueue_script( 'prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
        wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
    }
}
add_filter('woocommerce_shipping_package_name','zo_shipping_title');
function zo_shipping_title() {
    return '<h2 class="title-shipping">'.esc_html__("Calculate shipping","woocommerce").'</h2>';
}
//Remove coupon
remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form',10);
remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form',10);

// filter column
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}