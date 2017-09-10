<?php $cooper_options = get_option('cooper_wp'); ?> 

	<!-- column-wrap  -->
	<div class="content no-bg fscon">
		<!--=============== content ===============-->		
		<!-- section-->
		<section   class="no-padding">
            <?php if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
					$portfolio_category = get_terms('portfolio_category');?>
				<?php if($portfolio_category):?>		
			<div class="fixed-filter">
				<div class="filter-button"><?php esc_attr_e('Filter','cooper');?></div>
				<div class="folio-counter">
					<div class="num-album"></div>
					<div class="all-album"></div>
				</div>
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
			</div>
			<?php endif; endif;?>
			<!-- portfolio start -->			
			<div class="gallery-items min-pad hde four-column">			
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
				<!-- gallery-item-->	
				<?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='full'):?>
				<div class="gallery-item gallery-item-second <?php echo esc_attr($cooper_class);?>">
				<?php elseif (( get_post_meta($post->ID,'rnr_port-img-size',true))=='inner'):?>
				<div class="gallery-item uides <?php echo esc_attr($cooper_class);?>">
				<?php else:?>
				<div class="gallery-item <?php echo esc_attr($cooper_class);?>">	
				<?php endif ;?>		

					<div class="grid-item-holder">								
						<?php if (has_post_thumbnail( $post->ID ) ):?>
						<?php $cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
						<img  src="<?php echo esc_url($cooper_image[0]);?>"    alt="">
						<div class="box-item hd-box">	
							<div class=" fl-wrap full-height">
								<div class="hd-box-wrap">									
									<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<p><span><?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ' / '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></span></p>	
								</div>	
								<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){?>
								<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
								<a href="https://www.youtube.com/watch?v=<?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-video',true)); ?>" class="image-popup"><i class="fa fa-play-circle"></i></a>
								<?php else:?>
								<a href="https://vimeo.com/<?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-video',true)); ?>" class="image-popup"><i class="fa fa-play-circle"></i></a>			
								<?php endif ;?>	
								
								<?php } else {?>                    
								<a data-src="<?php echo esc_url($cooper_image[0]);?>" class="image-popup"><i class="fa fa-search"></i></a>					
								<?php };?>	
							</div>									
						</div>
						<?php endif;?>
					</div>

				<?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='full'):?>
				</div>
				<?php elseif (( get_post_meta($post->ID,'rnr_port-img-size',true))=='inner'):?>
				</div>
				<?php else:?>
				</div>	
				<?php endif ;?>											
				</div><!-- gallery-item end-->
				<?php endwhile; wp_reset_postdata(); ?>	
			</div>
        </section>
    </div>		