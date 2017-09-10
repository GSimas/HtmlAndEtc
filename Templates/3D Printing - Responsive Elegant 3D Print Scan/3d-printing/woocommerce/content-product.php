<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

?>

<li <?php post_class(); ?>>
    <div class="zo-product-teaser">
        <div class="zo-product-header">
            <div class="zo-product-image">
                <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                <a href="<?php the_permalink(); ?>" title="<?php _e('View detail', '3dprinting'); ?>">
                    <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                    ?>
                </a>
            </div>
            <div class="zo-product-overlay">
                <a data-rel="prettyPhoto" class="prettyPhoto product-zoom" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($product->id) ); ?>" ><span><?php _e('View', '3d-printing'); ?></span></a>
                <?php
                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item' );
                ?>
                <a href="<?php the_permalink(); ?>" class="product-view"><span><?php _e('Links', '3dprinting'); ?></span></a>
            </div>
        </div>
        <div class="zo-product-meta">
            <h3 class="zo-product-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
        </div>
    </div>
</li>
