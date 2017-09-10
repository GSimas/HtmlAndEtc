<?php
if( !function_exists('zo_woo_share') ) {

    /**
     * WooCommerce Share Hook
     */
    function zo_woo_share() {
        global $post;
?>
        <ul class="social-list">
            <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
            <li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
            <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
            <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
            <li class="box"><a href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-pinterest"></i></a></li>
        </ul>
<?php
    }
}
add_action('woocommerce_share', 'zo_woo_share');


/*
** Remove tabs from product details page
*/
function zo_woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); // Remove the additional information tab
    unset( $tabs['tags'] );//Remove tags
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'zo_woo_remove_product_tabs', 98 );
/*Order By Tab*/
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {
    $tabs['description']['priority'] = 5;
    $tabs['feature']['priority'] = 10;
    $tabs['user_manual']['priority'] = 15;
    $tabs['reviews']['priority'] = 25;
    return $tabs;
}
/*Add Tab*/
add_filter('woocommerce_product_tabs','feature_woocommerce_product_tabs',10,1);
add_filter('woocommerce_product_tabs','users_woocommerce_product_tabs',10,2);
add_filter('woocommerce_product_tabs','description_woocommerce_product_tabs',10,3);

/*Custom tab descripton*/
// description tab
function description_woocommerce_product_tabs($tabs){
    $newtab = array('description' => array('title'=>'Description','priority' => 100 , 'callback'=>'description_woocommerce_product_tab_html'));
    $tabs = array_merge($tabs,$newtab);
    return $tabs;
}
/*Callback Description Tab*/
function description_woocommerce_product_tab_html($key, $tab){
    global $post, $product;
    $is_terms = get_the_terms( $post->ID, 'pa_brand');
    if(!empty($is_terms)):
        ?>
        <div class="attribute">
            <h2><?php echo esc_html__('Specification for this item','3dprinting') ?></h2>
            <ul class="product-attribute">
                <?php if(!empty($product->get_attribute("brand"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Brand Name:','3dprinting'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("brand")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("part-number"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Part Number:','3dprinting'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("part-number")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("ean"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('EAN:','3dprinting'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("ean")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("import-designation"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Import Designation:','3dprinting'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("import-designation")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("item-weight"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Item Weight:','3dprinting'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("item-weight")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("unspsc"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('UNSPSC:','3dprinting'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("unspsc")); ?></span>
                    </li>
                <?php endif; ?>
            </ul>
            <?php
            $pro_attr = $product->get_attribute(" printed-product-color ");
            if(!empty($pro_attr)) {
                foreach ( $pro_attr as $value ) {
                    echo '<a class="color" href="#">'. $value->term_name .'</a>';
                }
            }
            ?>
        </div><!--End Attribule Product-->
        <?php
    endif;
    echo apply_filters( 'woocommerce_short_description', $post->post_content );
}
/*End Caback Tab Description*/

// feature tab
function feature_woocommerce_product_tabs($tabs){
    $newtab = array('feature' => array('title'=>'features','priority' => 100 , 'callback'=>'feature_woocommerce_product_tab_html'));
    $tabs = array_merge($tabs,$newtab);
    return $tabs;
}
function feature_woocommerce_product_tab_html(){
    global $zo_meta;
	if(!empty($zo_meta->_zo_overall_dimensions) || !empty($zo_meta->_zo_build_volume) || !empty($zo_meta->_zo_print_speed) || !empty($zo_meta->_zo_maximum_resolution)){
		echo '<ul class="product-features">';
			if(!empty($zo_meta->_zo_overall_dimensions)){
				echo '<li><span>'.esc_html__('Overall Dimensions - ','3dprinting'). $zo_meta->_zo_overall_dimensions .'</span></li>';
			}

			if(!empty($zo_meta->_zo_build_volume)){
				echo '<li><span>'.esc_html__('Build Volume - ','3dprinting'). $zo_meta->_zo_build_volume .'</span></li>';
			}

			if(!empty($zo_meta->_zo_print_speed)){
				echo '<li><span>'.esc_html__('Print Speed - ','3dprinting'). $zo_meta->_zo_print_speed .'</span></li>';
			}

			if(!empty($zo_meta->_zo_maximum_resolution)){
				echo '<li><span>'. esc_html__('Maximum Resolution - ','3dprinting').$zo_meta->_zo_maximum_resolution .'</span></li>';
			}
		echo '</ul>';
	}
	if(!empty($zo_meta->_zo_print_from_sd_card) || !empty($zo_meta->_zo_print_material) || !empty($zo_meta->_zo_noise_level) || !empty($zo_meta->_zo_recommended_software)){
        echo '<ul class="product-features-right">';
			if(!empty($zo_meta->_zo_print_from_sd_card)){
				$print_card = isset( $zo_meta->_zo_print_from_sd_card ) ? $zo_meta->_zo_print_from_sd_card : 'no';
				echo '<li><span>'.esc_html__('Print from SD Card - ','3dprinting'). $print_card .'</span></li>';
			}

			if(!empty($zo_meta->_zo_print_material)){
				echo '<li><span>'.esc_html__('Print Material - ','3dprinting'). $zo_meta->_zo_print_material .'</span></li>';
			}

			if(!empty($zo_meta->_zo_noise_level)){
				echo '<li><span>'.esc_html__('Noise Level - ','3dprinting'). $zo_meta->_zo_noise_level .'</span></li>';
			}

			if(!empty($zo_meta->_zo_recommended_software)){
				echo '<li><span>'. esc_html__('Recommended Software - ','3dprinting').$zo_meta->_zo_recommended_software .'</span></li>';
			}
        echo '</ul>';
	}
}

// user manual tab
function users_woocommerce_product_tabs($tabs){
	$newtab = array('user_manual' => array('title'=>'User Manual','priority' => 100 , 'callback'=>'users_woocommerce_product_tab_html'));
	$tabs = array_merge($tabs,$newtab);
	return $tabs;
}

function users_woocommerce_product_tab_html(){
    global $zo_meta;
    if(!empty($zo_meta->_zo_documents_links)){
        echo '<div class="user-menual">'. get_the_title(). '<a href="'.esc_url($zo_meta->_zo_documents_links).'" ><i class="fa fa-download"></i></a></div>';
    }

}
/*End manual tab*/
/**
 * Add Cart Clear Cart Function
 */
add_action('init', 'zo_woo_clear_cart_url');
function zo_woo_clear_cart_url() {
    global $woocommerce;
    if( isset($_REQUEST['clear_cart']) ) {
        $woocommerce->cart->empty_cart();
    }
}

//add wrap for '(Free)' or '(FREE!)' label text on cart page for Shipping and Handling
function zo_custom_shipping_free_label( $label ) {
    $label =  str_replace( "(Free)", '<span class="amount">Free</span>', $label );
    $label =  str_replace( "(FREE!)", '<span class="amount">FREE!</span>', $label );
    return $label;
}
add_filter( 'woocommerce_cart_shipping_method_full_label' , 'zo_custom_shipping_free_label' );

//Change add to cart
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
    return __( 'Buy now', '3dprinting' );
}

/*Sort By Category*/
add_action( 'woocommerce_before_shop_loop', 'zo_archive_product_sort_by_categories', 20 );
add_action( 'woocommerce_before_shop_loop', 'zo_archive_product_start_form', 19 );
add_action( 'woocommerce_before_shop_loop', 'zo_archive_product_end_form', 34);
function zo_archive_product_start_form(){
    ?>
    <div class="product-filter">
  <?php
}
function zo_archive_product_end_form(){
    ?>
    </div><!--End filter-->
  <?php
}
function zo_archive_product_sort_by_categories($column = 3){
    $column  = $column ? $column : 3;
    ?>

    <div class="filter col-lg-<?php echo esc_attr($column);?> col-md-<?php echo esc_attr($column);?> col-sm-<?php echo esc_attr($column);?> col-xs-12">
        <?php
        $product_cat = get_terms( 'pa_brand', array( 'hide_empty' => 0, 'orderby' => 'ASC' ) );
        if(!empty($product_cat)) :
        /*Get Cart ID*/
        ?>
       <form action="?post_type=product" method='get' class='zo-filter-product'>
                <div class="select-filter select-cat">
                    <?php $cart_slug = isset($_GET["pa_brand"]) ? $_GET["pa_brand"] : ''; ?>
                    <select name="pa_brand" onchange="form.submit()" >
                        <option value='all'><?php echo esc_html__('All Brand','3dprinting')?></option>
                        <?php
                        foreach ( $product_cat as $t_cat ) { ?>
                            <option value="<?php echo $t_cat->term_id; ?>" <?php if(isset($_GET['pa_brand']) && ($t_cat->term_id == $_GET['pa_brand'])) echo "selected"; ?>><?php echo $t_cat->name; ?></option>
                        <?php   } ?>
                    </select>
                    <?php
                    // Keep query string vars intact
                    foreach ( $_GET as $key => $val ) {
                        if ( 'pa_brand' === $key || 'submit' === $key ) {
                            continue;
                        }
                        if ( is_array( $val ) ) {
                            foreach( $val as $innerVal ) {
                                echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                            }
                        } else {
                            echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
                        }
                    }
                    ?>
                </div>
        </form>
        <?php endif; ?>
    </div>
    <?php
}
/*Show Paging*/
add_action( 'woocommerce_before_shop_loop', 'zo_archive_product_show_paging', 22 );
function zo_archive_product_show_paging($column = 3){
    $column  = $column ? $column :3;
    $show = '';
    if(isset($_COOKIE['zo_items_show'])) {
        if(isset($_GET['show']) && (($_COOKIE['zo_items_show'] <> $_GET['show']))) {
            $show = $_GET['show'];

        } else {
            $show = (!empty($_COOKIE['zo_items_show'])) ? $_COOKIE['zo_items_show'] : 10;
        }
    }
    else {
        $show = (!empty($_GET['show'])) ? $_GET['show'] : 10;
    }

    ?>
    <div class="filter show_item col-lg-<?php echo esc_attr($column);?> col-md-<?php echo esc_attr($column);?> col-sm-<?php echo esc_attr($column);?> col-xs-12">
    <form action=""  method="get" class='zo-filter-show-item'>
        <label><?php echo esc_html__('Show','3dprinting')?></label>
        <div class="select-filter select-show">
            <select name="show" onchange="form.submit()" >
                <option value='10' <?php echo ($show=='10' || !empty($show)) ? "selected" : ""  ?>><?php echo esc_html__('10','3dprinting')?></option>
                <option value='20' <?php echo $show=='20' ? "selected" : ""  ?>><?php echo esc_html__('20','3dprinting')?></option>
                <option value='50' <?php echo $show == '50' ? "selected" : ""  ?>><?php echo esc_html__('50','3dprinting')?></option>
                <option value='-1' <?php echo $show=='-1' ? "selected" : ""  ?>><?php echo esc_html__('All','3dprinting')?></option>
            </select>
            <?php
            // Keep query string vars intact
            foreach ( $_GET as $key => $val ) {
                if ( 'show' === $key || 'submit' === $key ) {
                    continue;
                }
                if ( is_array( $val ) ) {
                    foreach( $val as $innerVal ) {
                        echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                    }
                } else {
                    echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
                }
            }
            ?>
        </div>
    </form>
    </div>
<?php
}

/*Ally query*/
add_filter('loop_shop_per_page','zo_loop_shop_per_page');
function zo_loop_shop_per_page(){
    if (isset($_COOKIE['zo_items_show'])) { // if normal page load with cookie
        $count = $_COOKIE['zo_items_show'];
    }
    if (isset($_GET['show'])) { //if form submitted
        setcookie('zo_items_show', $_GET['show'], time() * 20, '/');
        $count = $_GET['show'];
    }
    $value = !empty($_GET['show']) ? $count : get_option('posts_per_page');
    return $value;
}
