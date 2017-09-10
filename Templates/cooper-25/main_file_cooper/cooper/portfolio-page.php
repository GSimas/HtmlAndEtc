<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();
/*Template Name:Portfolio Page Template*/
?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>

<!--=============== portfolio-wrapper ===============-->

<?php if (( get_post_meta($post->ID,'rnr_portfolio-page-layout',true))=='full'):?>

<?php get_template_part('template-parts/portfolio-full');?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-page-layout',true))=='default2'):?>

<?php get_template_part('template-parts/portfolio-default2');?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-page-layout',true))=='inner'):?>

<?php get_template_part('template-parts/portfolio-inner');?>

<?php else:?>

<?php get_template_part('template-parts/portfolio-default');?>

<?php endif ;?>	
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>		
<?php get_footer(); ?>	