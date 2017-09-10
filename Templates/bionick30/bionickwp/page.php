<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();?>
<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>
		
<?php get_template_part('template-parts/intro-section');?>	

<!-- Full Width Layout -->
<?php if (( get_post_meta($post->ID,'rnr_page-layout',true))=='full'):?>
				
<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">											
			
			<div class="col-md-12">
			
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
			
			<?php while ( have_posts() ) : the_post(); ?> 
			
            <div class="wrapper-content th-check">
      				
	        <?php the_content();?>
			
	        </div>	
			
		    <?php endwhile; wp_reset_postdata(); ?>				
			
            </div>
			
            </div>
			
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->	
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>	
		

<!-- Right Sidebar Layout -->
<?php elseif (( get_post_meta($post->ID,'rnr_page-layout',true))=='right'):?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">											
			
			<div class="col-md-8">
			
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
			
			<?php while ( have_posts() ) : the_post(); ?> 
			
            <div class="wrapper-content th-check">
      				
	        <?php the_content();?>
			
	        </div>	
			
		    <?php endwhile; wp_reset_postdata(); ?>				
			
            </div>
			
				<div class="col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'page-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>				
			
            </div>
			
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->				
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>	


<!-- Left Sidebar Layout -->
<?php elseif (( get_post_meta($post->ID,'rnr_page-layout',true))=='left'):?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">					
			
				<div class="col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'page-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>				
			
			<div class="col-md-8">
			
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
			
			<?php while ( have_posts() ) : the_post(); ?> 
			
            <div class="wrapper-content th-check">
      				
	        <?php the_content();?>
			
	        </div>	
			
		    <?php endwhile; wp_reset_postdata(); ?>				
			
            </div>
            </div>
			
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->	
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>	


<!-- Default Page Layout -->
<?php elseif (( get_post_meta($post->ID,'rnr_page-layout',true))=='default'):?>		

<?php get_template_part('template-parts/default-feature-area');?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
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
			
			<?php while ( have_posts() ) : the_post(); ?> 
			
            <div class="wrapper-content th-check">
      				
	        <?php the_content();?>
			
	        </div>	
			
		    <?php endwhile; wp_reset_postdata(); ?>				
			
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->				
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style');?>	

	
<?php else:?> 

<?php get_template_part('template-parts/default-feature-area');?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
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
			
			<?php while ( have_posts() ) : the_post(); ?> 
			
            <div class="wrapper-content th-check">
      				
	        <?php the_content();?>
			
	        </div>	
			
		    <?php endwhile; wp_reset_postdata(); ?>				
			
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->	
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style');?>	


<?php endif ;?>	

<?php get_footer(); ?>	