<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<?php $cooper_options = get_option('cooper_wp'); ?>
<?php if($cooper_options['product-st'] == 'st2') {?>
<div class="content no-bg fscon shopst-1">
<section   class="no-padding">

				
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		

		

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
</section>
<div class="wr-shop-pagination">
<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
</div>
</div>
<?php } else if($cooper_options['product-st'] == 'st3') {?>
<?php $cooper_shop_back = Cooper_AfterSetupTheme::return_thme_option('shopheaderimg','url')?>

<!-- fixed column  -->
            <div class="fixed-column">
                <div class="column-image fl-wrap full-height">
				    <?php if ( is_product_category() ){
					global $wp_query;
					$cooper_cat = $wp_query->get_queried_object();
					$cooper_thumbnail_id = get_woocommerce_term_meta( $cooper_cat->term_id, 'thumbnail_id', true );
					$cooper_image = wp_get_attachment_url( $cooper_thumbnail_id );
					if ( $cooper_image ) {
					echo '<div class="bg" data-bg="'.$cooper_image.'"></div>';
					}
					else {
					echo '<div class="bg" data-bg="'.$cooper_shop_back.'"></div>';
					}
                    
					} else { ?>
					<div class="bg" data-bg="<?php echo esc_url($cooper_shop_back);?>"></div>
					<?php } ;?>
                    <div class="overlay"></div>
                </div>
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <div class="bg-title alt"><span><?php woocommerce_page_title(); ?></span></div>
				<?php endif; ?>
                <div class="progress-bar-wrap">
                    <div class="progress-bar"></div>
                </div>
            </div>
            <!-- fixed column  end -->
			

	<!-- column-wrap  -->
    <div class="column-wrap no-pad-wrap shopst-1">
	<section   class="no-padding">
	
								
				
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		

		

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>


			<div class="wr-shop-pagination">
			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
</div>


</section>
</div>
<?php } else if($cooper_options['product-st'] == 'st4') {?>
<div class="wrapper-inner sec-full-inner full-width-wrap">
<div class="content">
<section  data-scrollax-parent="true" class="dec-sec">
<div class="containerr sec-custom-layout" id="shop-st-1">
	<div class="column-wrap-blog-content col-md-8">
	
		<div class="section-title">
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                <h2><?php woocommerce_page_title(); ?> </h2>
								<?php endif; ?>
                                <p><?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?> </p>
                                <div class="clearfix"></div>
                                <span class="bold-separator"></span>
                               </div>
		<div class="wrapper-content th-check">
		<div class="fl-wrap">
			<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		

		

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>


			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
		</div>
		</div>
	</div>
	<div class="column-wrap-blog-sidebar col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				        <?php dynamic_sidebar( 'sidebar-2' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>
</div>
</section>
<?php if($cooper_options['back-to-top'] == 'no') {?>
                <!-- Empty -->	
			<?php } else { ?> 
			<div class="small-sec fl-wrap">
				<?php if(!empty($cooper_options['back-to-top-title'])): ?>
				<div class="to-top-wrap"><a class="to-top" href="#"> <i class="fa fa-angle-double-up"></i> <?php echo esc_attr(($cooper_options['back-to-top-title']));?></a></div>
				<?php else:?>
				<div class="to-top-wrap"><a class="to-top" href="#"> <i class="fa fa-angle-double-up"></i> <?php esc_attr_e('Back to Top', 'cooper');?></a></div>
				<?php endif; ?>	
			</div>											 
			<?php } ;?> 
</div>
</div>

<?php } else { ?>
<?php $cooper_shop_back = Cooper_AfterSetupTheme::return_thme_option('shopheaderimg','url')?>

<!-- fixed column  -->
            <div class="fixed-column">
                <div class="column-image fl-wrap full-height">
				    <?php if ( is_product_category() ){
					global $wp_query;
					$cooper_cat = $wp_query->get_queried_object();
					$cooper_thumbnail_id = get_woocommerce_term_meta( $cooper_cat->term_id, 'thumbnail_id', true );
					$cooper_image = wp_get_attachment_url( $cooper_thumbnail_id );
					if ( $cooper_image ) {
					echo '<div class="bg" data-bg="'.$cooper_image.'"></div>';
					}
					else {
					echo '<div class="bg" data-bg="'.$cooper_shop_back.'"></div>';
					}
                    
					} else { ?>
					<div class="bg" data-bg="<?php echo esc_url($cooper_shop_back);?>"></div>
					<?php } ;?>
                    <div class="overlay"></div>
                </div>
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <div class="bg-title alt"><span><?php woocommerce_page_title(); ?></span></div>
				<?php endif; ?>
                <div class="progress-bar-wrap">
                    <div class="progress-bar"></div>
                </div>
            </div>
            <!-- fixed column  end -->
			

	<!-- column-wrap  -->
    <div class="column-wrap scroll-content">
    <div class="content">
	<section  data-scrollax-parent="true" class="dec-sec">
	<div class="container" id="shop-st-1">
								<div class="section-title">
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                <h2><?php woocommerce_page_title(); ?> </h2>
								<?php endif; ?>
                                <p><?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?> </p>
                                <div class="clearfix"></div>
                                <span class="bold-separator"></span>
                               </div>
				
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		

		

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>


			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

</div>
</section>
</div>
</div>

<?php } ;?>
<?php get_footer( 'shop' ); ?>
