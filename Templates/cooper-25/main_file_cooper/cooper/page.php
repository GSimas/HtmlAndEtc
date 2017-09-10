<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>
		
<?php get_template_part('template-parts/intro-section');?>	

<!-- Right Sidebar Layout -->
<?php if (( get_post_meta($post->ID,'rnr_page-layout',true))=='right'):?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
	<!--=============== content ===============-->	
	<!-- content   -->               
	<div  class="content">
	    <section  data-scrollax-parent="true" class="dec-sec">			
            <div class="containerr sec-custom-layout">		
		        <!-- column-wrap  -->
		        <div class="column-wrap-blog-content col-md-8">
				
					<?php if (( get_post_meta($post->ID,'rnr_section-parallax-title-on-off',true))=='no'){?>	
						<!-- Empty -->
					<?php } else {?>		
					<?php if (( get_post_meta($post->ID,'rnr_sec-parallax-title',true))):?>
					<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_sec-parallax-title',true)) ?></div>
					<?php else:?>			
					<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
					<?php endif;?> 
					<?php };?>						

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
				
					<?php while ( have_posts() ) : the_post(); ?> 
				
					<div class="wrapper-content">
				
						<div class="fl-wrap">
								
						<?php the_content();?>
						
						</div>	
				
					</div>	
					
					<?php endwhile; wp_reset_postdata(); ?>	
					
					<!--Comment section-->
					<?php if (( get_post_meta($post->ID,'rnr_page-comment',true))=='no'):?>			
						<!-- Empty -->			
					<?php else:?>  			
					<div class="post-comments th-check">			
						<?php if ( comments_open() ) : ?>	 							
							<?php comments_template( '', true ); ?>	
						<?php endif;?>
					</div>	
					<?php endif ;?>						
			
			    </div>
            
				<div class="column-wrap-blog-sidebar col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'page-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>
		    </div>
		</section>
		<!-- section end -->
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
			<!-- to top end--> 		
	<!-- content end -->
	</div>		
	<!-- column-wrap end -->
</div>	
		
<!-- Default Page Layout -->
<?php elseif (( get_post_meta($post->ID,'rnr_page-layout',true))=='default'):?>		

<?php get_template_part('template-parts/default-feature-area');?>

<div class="column-wrap scroll-content">
	<!--=============== content ===============-->	
	<!-- content   -->               
	<div  class="content">
		<!-- section-->
		<section  data-scrollax-parent="true" class="dec-sec">
			<?php if (( get_post_meta($post->ID,'rnr_section-parallax-title-on-off',true))=='no'){?>	
				<!-- Empty -->
			<?php } else {?>		
			<?php if (( get_post_meta($post->ID,'rnr_sec-parallax-title',true))):?>
			<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_sec-parallax-title',true)) ?></div>
			<?php else:?>			
			<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
			<?php endif;?> 
			<?php };?>		
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
			
			    <?php while ( have_posts() ) : the_post(); ?> 
			
                <div class="wrapper-content th-check">
			
					<div class="fl-wrap">
							
					<?php the_content();?>
					
					</div>	
			
				</div>	
				
				<?php endwhile; wp_reset_postdata(); ?>
				
				<!--Comment section-->
				<?php if (( get_post_meta($post->ID,'rnr_page-comment',true))=='no'):?>			
					<!-- Empty -->			
				<?php else:?>  			
				<div class="post-comments th-check">			
					<?php if ( comments_open() ) : ?>	 							
						<?php comments_template( '', true ); ?>	
					<?php endif;?>
				</div>	
				<?php endif ;?>	
				
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
		<!-- to top end--> 		
		
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->				

	
<?php else:?> 

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
	<!--=============== content ===============-->	
	<!-- content   -->               
	<div  class="content">
	    <section  data-scrollax-parent="true" class="dec-sec">			
            <div class="container sec-custom-layout">		
				
					<?php if (( get_post_meta($post->ID,'rnr_section-parallax-title-on-off',true))=='no'){?>	
						<!-- Empty -->
					<?php } else {?>		
					<?php if (( get_post_meta($post->ID,'rnr_sec-parallax-title',true))):?>
					<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_sec-parallax-title',true)) ?></div>
					<?php else:?>			
					<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
					<?php endif;?> 
					<?php };?>						

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
				
					<?php while ( have_posts() ) : the_post(); ?> 
				
					<div class="wrapper-content th-check">
				
						<div class="fl-wrap">
								
						<?php the_content();?>
						
						</div>	
				
					</div>	
					
					<?php endwhile; wp_reset_postdata(); ?>	
					
					<!--Comment section-->
					<?php if (( get_post_meta($post->ID,'rnr_page-comment',true))=='no'):?>			
						<!-- Empty -->			
					<?php else:?>  			
					<div class="post-comments th-check">			
						<?php if ( comments_open() ) : ?>	 							
							<?php comments_template( '', true ); ?>	
						<?php endif;?>
					</div>	
					<?php endif ;?>						
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
		<!-- to top end--> 			
	<!-- content end -->
	</div>		
	<!-- column-wrap end -->
</div>	

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