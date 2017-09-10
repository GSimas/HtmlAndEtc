<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header(); ?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>

            <!-- Hero section   -->
            <div class="hero-wrap fl-wrap full-height">
			    <?php if(!empty($cooper_options['error-page-bg-img'])):?>  
                <div class="bg"  data-bg="<?php echo esc_url(Cooper_AfterSetupTheme::return_thme_option('error-page-bg-img','url'));?>"></div>
				<?php else:?> 
                <div class="bg"></div>
				<?php endif;?> 
                <div class="overlay"></div>
                <div class="error-wrap alt">
				    <?php if(!empty($cooper_options['error-page-title'])): ?>
                    <h2><?php echo esc_attr(($cooper_options['error-page-title']));?></h2>
					<?php else:?>
                    <h2><?php esc_attr_e('404','cooper');?></h2>
					<?php endif;?>
					<?php if(!empty($cooper_options['error-page-subtitle'])): ?>
                    <p> <?php echo esc_attr(($cooper_options['error-page-subtitle']));?></p>
					<?php else:?>	
                    <p> <?php esc_attr_e('The Page you were looking for, could not be found.','cooper');?></p>
					<?php endif;?>	
					<a href="<?php echo esc_url(home_url('/')); ?>" class="btn hide-icon"><i class="fa fa-home"></i><span><?php esc_attr_e('Back To Home','cooper');?></a>                         
                </div>           
            </div>
            <!-- Hero section   end -->
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>
<?php get_footer(); ?>	