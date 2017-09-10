<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();
/*Template Name:Home Page Template*/
?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>

<?php get_template_part('template-parts/intro-section');?>
<?php get_template_part('template-parts/home-feature-area');?>

<div class="column-wrap scroll-content">

<?php get_template_part('template-parts/home-page-menu');?>

<div class="content" id="sec1">
<?php if(has_nav_menu('home-menu')) {?>
<?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['home-menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['home-menu'] );
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

<?php $cooper_content= get_the_content();?>
   <?php if($cooper_content != '') { ?>
    <!-- section start -->
    <section id="<?php echo balanceTags($post->post_name);?>" data-scrollax-parent="true" class="scroll-con-sec dec-sec">
	
		<?php if (( get_post_meta($post->ID,'rnr_section-parallax-title-on-off',true))=='no'){?>	
			<!-- Empty -->
		<?php } else {?>		
		<?php if (( get_post_meta($post->ID,'rnr_sec-parallax-title',true))):?>
		<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_sec-parallax-title',true)) ?></div>
		<?php else:?>			
        <div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
		<?php endif;?> 
		<?php };?>
		
         <!-- container -->
        <div class="container">
		
            <?php if (( get_post_meta($post->ID,'rnr_section-title-on-off',true))=='no'){?>	
                 <!-- Empty -->
            <?php } else {?>	
		
            <div class="section-title">
                <?php if (( get_post_meta($post->ID,'rnr_sec-title',true))):?>
                <h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_sec-title',true)) ?></h2>
				<?php else:?>			
			    <h2><?php the_title();?></h2>
				<?php endif;?>
				<?php if (( get_post_meta($post->ID,'rnr_sec-sub-title',true))):?>
				<p><?php echo esc_attr(get_post_meta($post->ID,'rnr_sec-sub-title',true)); ?> </p>
				<?php endif;?> 
				<div class="clearfix"></div>
				<span class="bold-separator"></span>				
			</div>				
			
			<?php };?>
			
            <div class="wrapper-content">
      				
	        <?php global $more; $more = 0; the_content('');?>
			
	        </div>	
	    </div>	
		
    </section> <!-- end bg -->	
	
   <?php };?>  
        
    <?php $i++;}  endwhile; wp_reset_postdata(); ?>
<?php }
else{?>

<section>
<div class="container">
<div class="wrapper-content">
<div class="section-title">
<h2><?php esc_attr_e('Required to add This Page To "Home Page Menu" Location.','cooper');?></h2>
<div class="clearfix"></div>
<span class="bold-separator"></span>				
</div>
<br>
<a href="<?php echo esc_url(home_url('/')); ?>wp-admin/nav-menus.php" class="btn hide-icon" target="_blank"><i class="fa fa-angle-right"></i><span><?php esc_attr_e('Click Here','cooper');?></span></a>	

</div>
</div>
</section>
<?php }?>
 <!--  to top  -->  
					<?php if($cooper_options['back-to-top'] == 'yes') {?>
                    <div class="small-sec fl-wrap">
					    <?php if(!empty($cooper_options['back-to-top-title'])): ?>
                        <div class="to-top-wrap"><a class="to-top" href="#"> <i class="fa fa-angle-double-up"></i> <?php echo esc_attr(($cooper_options['back-to-top-title']));?></a></div>
						<?php else:?>
                        <div class="to-top-wrap"><a class="to-top" href="#"> <i class="fa fa-angle-double-up"></i> <?php esc_attr_e('Back to Top', 'cooper');?></a></div>
						<?php endif; ?>	
                    </div>
					<?php } else { ?> 
						<!-- Empty -->					 
					<?php } ;?> 					
                    <!-- to top end--> 
                </div>
                <!-- content end -->
            </div>
            <!-- column-wrap end -->
            <!-- arrow nav -->
            <div class="arrowpagenav"></div>
            <!-- arrow nav end-->
            <!-- footer-->
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>
<?php get_template_part('footer-home');?>