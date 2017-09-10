<?php get_header(); ?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>

	<!--=============== fixed-column ===============-->
	<div class="fixed-column">
		<div class="column-image fl-wrap full-height">			
			<div class="bg" data-bg="<?php echo esc_url(Cooper_AfterSetupTheme::return_thme_option('portfolio-single-image','url'));?>"></div>
			<div class="overlay"></div>
		</div>
		<?php if(!empty($cooper_options['portfolio-section-title'])): ?>
		<div class="bg-title alt"><span><?php echo esc_attr(($cooper_options['portfolio-section-title']));?></span></div>
		<?php else:?>
		<div class="bg-title alt"><span><?php esc_attr_e('Work', 'cooper');?></span></div>
		<?php endif; ?>	
		<div class="progress-bar-wrap">
			<div class="progress-bar"></div>
		</div>
	</div>					
	<!-- fixed-column end -->
	
	<!-- column-wrap  -->
	<div class="column-wrap scroll-content">
		<!--=============== content ===============-->	
		<!-- content   -->               
		<div  class="content">
			<!-- section-->
			<section  data-scrollax-parent="true" class="dec-sec">
				<div class="container">
					<?php if($cooper_options['blog-page-title-on-off'] == 'no') {?>
						 <!-- Empty -->
					<?php } else {?>	
				
					<div class="section-title">		
						<h2> <em><?php single_cat_title( '', true ); ?></em></h2>

						<p><?php echo category_description(); ?>  </p>

						<div class="clearfix"></div>
						<span class="bold-separator"></span>				
					</div>				
					
					<?php };?>						
	
                            
					<div class="gallery-items spad ">
					
						<?php global $loop; 
							$args = array_merge( $wp_query->query, array( 'post_type' => 'portfolio' ) );
							query_posts( $args );
						?>						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
                        <div id="portfolio-<?php the_ID(); ?>">								
						<?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='full'):?>
						<div class="gallery-item gallery-item-second">
						<?php elseif (( get_post_meta($post->ID,'rnr_port-img-size',true))=='inner'):?>
						<div class="gallery-item uides">
						<?php else:?>
						<div class="gallery-item">	
						<?php endif ;?>	
						
							<div class="grid-item-holder">
								<div class="box-item vis-det folio-img fl-wrap">
									<?php if (has_post_thumbnail( $post->ID ) ):?>
									<?php $cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
									<img  src="<?php echo esc_url($cooper_image[0]);?>"    alt="">
									
									<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){?>
									
									<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
									<a href="https://www.youtube.com/watch?v=<?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-video',true)); ?>" class="image-popup"><i class="fa fa-play-circle"></i></a>
									<?php else:?>
									<a href="https://vimeo.com/<?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-video',true)); ?>" class="image-popup"><i class="fa fa-play-circle"></i></a>			
									<?php endif ;?>	
									
									<?php } else {?>                    
									<a data-src="<?php echo esc_url($cooper_image[0]);?>" class="image-popup"><i class="fa fa-search"></i></a>					
									<?php };?>					

									<?php endif;?>
								</div>
								<div class="grid-det fl-wrap">
									<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<span><?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ' / '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></span>
									<?php if (( get_post_meta($post->ID,'rnr_port_icon',true))):?>
									<i class="fa <?php echo esc_attr(get_post_meta($post->ID,'rnr_port_icon',true)); ?>"></i>
									<?php else:?>
									<i class="fa fa-camera-retro"></i>
									<?php endif;?>
								</div>					
							</div>

						<?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='full'):?>
						</div>
						<?php elseif (( get_post_meta($post->ID,'rnr_port-img-size',true))=='inner'):?>
						</div>
						<?php else:?>
						</div>	
						<?php endif ;?>											
				        </div>					
						<?php  endwhile; endif; wp_reset_postdata(); ?>	
					</div>
                </div>
				<div class="clearfix"></div>
				<div class="parallax-title right-pos filt-text" data-scrollax="properties: { translateY: '-350px' }"> </div>
            </section>
			<!-- section end -->	                    
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
    </div>			
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>
<?php get_footer(); ?>					