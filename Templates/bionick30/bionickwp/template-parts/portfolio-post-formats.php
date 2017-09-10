<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='image'):?>

<?php get_template_part('post-formats/portfolio-image'); ?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='slider'):?>

<?php get_template_part('post-formats/portfolio-slider'); ?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='gallery'):?>

<?php get_template_part('post-formats/portfolio-gallery'); ?>

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'):?>

<?php get_template_part('post-formats/portfolio-video'); ?>

<?php else:?>	

<?php get_template_part('post-formats/portfolio-image'); ?>

<?php endif ;?>			