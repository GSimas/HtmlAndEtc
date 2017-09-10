<?php $cooper_options = get_option('cooper_wp'); ?> 

<?php get_template_part('template-parts/default-feature-area');?>

	<!-- column-wrap  -->
	<div class="column-wrap scroll-content">
		<!--=============== content ===============-->	
		<!-- content   -->               
		<div  class="content">
			<!-- section-->
			<section  data-scrollax-parent="true" class="dec-sec">
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

					<!-- PORTFOLIO CATEGORIES FILTERS -->
					<?php if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
							$portfolio_category = get_terms('portfolio_category');?>
						<?php if($portfolio_category):?>
					<div class="filter-wrap fl-wrap inline-filter">
						<div class="filter-button" style="display:none"><?php esc_attr_e('Filter','cooper');?></div>
						<div class="gallery-filters">
							<?php if(!empty($cooper_options['prf-project-filter-all'])): ?>
							<a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"><?php echo esc_attr(($cooper_options['prf-project-filter-all']));?></a>
							<?php else:?>
							<a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"><?php esc_attr_e('All','cooper');?></a>
							<?php endif; ?>	
							<?php  foreach($portfolio_category as $portfolio_cat):?>
							<a href="#" class="gallery-filter" data-filter=".<?php echo esc_attr($portfolio_cat->slug);?>"><?php echo esc_attr($portfolio_cat->name);?></a>
							<?php endforeach; ?>
						</div>
						<div class="folio-counter">
							<div class="num-album"></div>
							<div class="all-album"></div>
						</div>
					</div>
					<?php endif; endif;?>
					<!-- portfolio start -->		
                            
					<div class="gallery-items spad ">
					
						<?php global $post, $post_id;?>
						<?php query_posts(array('post_type' => 'portfolio','showposts' =>'-1'));
							while ( have_posts() ) : the_post();?>
						<?php $portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
						<?php 
							$cooper_class = ""; 
							foreach ($portfolio_category as $cooper_item) {
								$cooper_class.=esc_attr($cooper_item->slug . ' ');
						} ?>				
                        <div id="portfolio-<?php the_ID(); ?>">								
						<?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='full'):?>
						<div class="gallery-item gallery-item-second <?php echo esc_attr($cooper_class);?>">
						<?php elseif (( get_post_meta($post->ID,'rnr_port-img-size',true))=='inner'):?>
						<div class="gallery-item uides <?php echo esc_attr($cooper_class);?>">
						<?php else:?>
						<div class="gallery-item <?php echo esc_attr($cooper_class);?>">	
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
						<?php endwhile; wp_reset_postdata(); ?>	
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

