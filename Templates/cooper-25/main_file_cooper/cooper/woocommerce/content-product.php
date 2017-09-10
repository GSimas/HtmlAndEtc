<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php $cooper_options = get_option('cooper_wp'); ?>

<?php if($cooper_options['product-st'] == 'st2') {?>
<?php if (( get_post_meta($post->ID,'rnr_port-pro-img-size',true))=='full'):?>
<div class="gallery-item gallery-item-second">
<?php else:?>
<div class="gallery-item">
<?php endif;?>
<div class="grid-item-holder">
    <?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>
	<div class="box-item hd-box">
		<div class=" fl-wrap full-height">
		 <div class="hd-box-wrap">
		 
	<a href="<?php the_permalink();?>">
   <h2>
	
         <?php the_title();?>   
	
	
	</h2>
	</a>
	<?php
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	
	?>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
     ?>		
	 <?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
                
				
				
         </div>
		 <?php if (has_post_thumbnail( $post->ID ) ):
		$cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
		<?php endif;?>
		<a data-src="<?php echo esc_url($cooper_image[0]);?>" class="image-popup"><i class="fa fa-search"></i></a>
	
	
	
	  </div>
	</div>
</div>
</div>
<?php } else if($cooper_options['product-st'] == 'st3') {?>
<?php if (( get_post_meta($post->ID,'rnr_port-pro-img-size',true))=='full'):?>
<div class="gallery-item gallery-item-second">
<?php else:?>
<div class="gallery-item">
<?php endif;?>
<div class="grid-item-holder">
    <?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>
	<div class="box-item hd-box">
		<div class=" fl-wrap full-height">
		 <div class="hd-box-wrap">
		 
	<a href="<?php the_permalink();?>">
   <h2>
	
         <?php the_title();?>   
	
	
	</h2>
	</a>
	<?php
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	
	?>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
     ?>		
	 <?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
                
				
				
         </div>
		 <?php if (has_post_thumbnail( $post->ID ) ):
		$cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
		<?php endif;?>
		<a data-src="<?php echo esc_url($cooper_image[0]);?>" class="image-popup"><i class="fa fa-search"></i></a>
	
	
	
	  </div>
	</div>
</div>
</div>
<?php } else { ?>
<?php if (( get_post_meta($post->ID,'rnr_port-pro-img-size',true))=='full'):?>
<div class="gallery-item gallery-item-second shop-st-def">
<?php else:?>
<div class="gallery-item shop-st-def">
<?php endif;?>

<div class="grid-item-holder">
    <div class="box-item vis-det folio-img fl-wrap">
        <?php
		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<?php if (has_post_thumbnail( $post->ID ) ):
		$cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
		<?php endif;?>
            <a data-src="<?php echo esc_url($cooper_image[0]);?>" class="image-popup"><i class="fa fa-search"></i></a>
    </div>
    <div class="fl-wrap">
    <div class="grid-det fl-wrap">
        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <?php
		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		
		?>
		</div>
		<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
     ?>		
	 <?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
    
    </div>
</div>
</div>
<?php } ;?>
