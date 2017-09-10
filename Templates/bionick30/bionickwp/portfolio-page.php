<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();
/*Template Name:Portfolio Page Template*/
?>
<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>

<!--=============== portfolio-wrapper ===============-->

<?php if (( get_post_meta($post->ID,'rnr_portfolio-page-layout',true))=='full'):?>

<?php get_template_part('template-parts/portfolio-full');?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-page-layout',true))=='default'):?>

<?php get_template_part('template-parts/portfolio-default');?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-page-layout',true))=='inner'):?>

<?php get_template_part('template-parts/portfolio-inner');?>

<?php else:?>

<?php get_template_part('template-parts/portfolio-default');?>

<?php endif ;?>	
		
<?php get_footer(); ?>	