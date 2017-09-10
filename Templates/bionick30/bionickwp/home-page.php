<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();
/*Template Name:Home Page Template*/
?>
<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>

<?php get_template_part('template-parts/intro-section');?>
<?php get_template_part('template-parts/home-feature-area');?>

<div class="wrapper-inner home-wrap">

<?php get_template_part('template-parts/home-page-menu');?>

<div class="content" id="sec1">
<?php if(has_nav_menu('main-menu')) {?>
<?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['main-menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['main-menu'] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $include = array();
        foreach($menu_items as $item) {
            if($item->object == 'page')
                $include[] = $item->object_id;
        }
        $main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
    }
    
    $i = 1;
    while ($main_query->have_posts()) : $main_query->the_post();
     global $post, $separatepages;

    $post_name = $post->post_name;
    
    $post_id = get_the_ID();
     ?>
	 <?php $separatepages = get_post_meta($post->ID,'rnr_open_page',true);
	 update_post_meta(get_the_ID(), 'separatepages', $separatepages);
    if (($separatepages != true ))

    { ?>

<?php $wr_content= get_the_content();?>
   <?php if($wr_content != '') { ?>
    <!-- section start -->
    <section id="<?php echo balanceTags($post->post_name);?>">
         <!-- container -->
        <div class="container">
		
            <?php if (( get_post_meta($post->ID,'rnr_section-title-on-off',true))=='no'){?>	

            <!-- Empty -->

            <?php } else {?>	
		
            <div class="section-title">
            <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php the_title();?></span></div>
			<?php if (( get_post_meta($post->ID,'rnr_sec-sub-title',true))):?>
            <h3><?php echo (get_post_meta($post->ID,'rnr_sec-sub-title',true)) ?> </h3>
			<?php endif;?>  
            <h2><?php the_title();?></h2>
            <div class="st-separator"></div>
            </div>
			
			<?php };?>
			
            <div class="wrapper-content">
      				
	        <?php global $more; $more = 0; the_content('');?>
			
	        </div>	
	    </div>	
    </section> <!-- end bg -->
	
	<div class="section-separator2"></div>
	
   <?php };?>  
        
    <?php $i++;}  endwhile; wp_reset_postdata(); ?>
<?php }
else{?>

<section>
<div class="container">
<div class="wrapper-content">
<div class="section-title">
<h3><?php esc_attr_e('Required','bionick');?></h3>
<h2><?php esc_attr_e('Add This Page To "One Page Menu &amp; Home Page Menu" Location.','bionick');?></h2>
<div class="st-separator"></div>
</div>
<br>
<a href="<?php echo esc_url(home_url('/')); ?>wp-admin/nav-menus.php" class="btn hide-icon" target="_blank"><i class="fa fa-angle-right"></i><span><?php esc_attr_e('Click Here','bionick');?></span></a>	

</div>
</div>
</section>
<?php }?>
</div>

</div>

<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style');?>	

<?php get_footer(); ?>	