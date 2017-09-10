<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header(); ?>
<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout error-page">											
			
			<div class="col-md-12">		
		
                <div class="section-title">
				
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php esc_attr_e('404', 'bionick');?></span></div>
                    <h3><?php esc_attr_e('Error', 'bionick');?>  </h3>  
                    <h2><?php esc_attr_e('404', 'bionick');?></h2>									
					
                    <div class="st-separator"></div>
                </div>	
			
                <div class="wrapper-content">
      				
	                <div class="text-title ">
			             <h4><?php esc_attr_e('Oops it looks you tried to read a page that is no longer here.', 'bionick'); ?></h2>
			        </div>
			
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


<?php get_footer(); ?>	