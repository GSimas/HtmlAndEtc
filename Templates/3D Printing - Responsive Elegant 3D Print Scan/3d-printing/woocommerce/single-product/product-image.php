<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

if ($product->get_gallery_attachment_ids()) {
	$has_thumb = " has-thumb";
}else {
	$has_thumb = "";
}

?>

<div class="slider zo-slide-image images<?php echo esc_attr($has_thumb);?>">
	<div id="slider" class="flexslider product-image">
		<div class="carousel carousel-stage">
			<ul class="slides zo_images_products">
				<?php
				if ( has_post_thumbnail() ) {
					$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
					$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
					$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single_image_size' ), array(
						'title' => $image_title
					) );

					/*$attachment_count = count( $product->get_gallery_attachment_ids() );

					if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					} else {
						$gallery = '';
					}*/

					// Zoom out product image
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a data-rel="prettyPhoto" class="prettyPhoto product-zoom" href="'.$image_link.'">%s</a></li>', $image ), $post->ID );
				}// else {

				// 	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li>%s</li>', wc_placeholder_img_src(), __( 'Placeholder', '3dprinting' ) ), $post->ID );

				// }
				?>
				<?php
				$attachment_ids = $product->get_gallery_attachment_ids();

				if ( $attachment_ids ) {
					wp_enqueue_script( 'aks-owl-carousel' );
					?>
					<?php

					$loop = 0;
					$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

					foreach ( $attachment_ids as $attachment_id ) {

						$classes = array( 'zoom' );

						if ( $loop == 0 || $loop % $columns == 0 )
							$classes[] = 'first';

						if ( ( $loop + 1 ) % $columns == 0 )
							$classes[] = 'last';

						$image_link = wp_get_attachment_url( $attachment_id );

						if ( ! $image_link )
							continue;

						$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
						$image_class = esc_attr( implode( ' ', $classes ) );
						$image_title = esc_attr( get_the_title( $attachment_id ) );

						// Zoom out product image
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li>%s</li>', $image ), $attachment_id, $post->ID, $image_class );

						$loop++;
					}

					?>
					<?php
				}

				?>
			</ul>
		</div>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>
