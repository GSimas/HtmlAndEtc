<?php if (( get_post_meta($post->ID,'rnr_section-intro-on-off',true))=='no'){?>	

    <!-- Empty -->

<?php } else {?>

<?php if (( get_post_meta($post->ID,'rnr_sec-intro-style',true))=='image'):?>

<?php get_template_part('template-parts/intro-section-image');?>

<?php elseif (( get_post_meta($post->ID,'rnr_sec-intro-style',true))=='slider'):?>

<?php get_template_part('template-parts/intro-section-slider');?>

<?php elseif (( get_post_meta($post->ID,'rnr_sec-intro-style',true))=='slideshow'):?>

<?php get_template_part('template-parts/intro-section-slideshow');?>

<?php elseif (( get_post_meta($post->ID,'rnr_sec-intro-style',true))=='video'):?>

<?php get_template_part('template-parts/intro-section-video');?>

<?php elseif (( get_post_meta($post->ID,'rnr_sec-intro-style',true))=='revolution'):?>

<?php get_template_part('template-parts/intro-section-revolution');?>

<?php else:?> 

    <!-- Empty -->

<?php endif ;?>	

<?php };?>
