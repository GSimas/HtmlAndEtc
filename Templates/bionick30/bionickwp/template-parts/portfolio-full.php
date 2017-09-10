<?php if (( get_post_meta($post->ID,'rnr_portfolio-filter-category',true))=='portfolio-filter-1'):?>

<!--=============== wrapper-inner ===============-->
<div class="wrapper-inner folio-wrap full-width-wrap">

	<div class="content">
    <section class="no-padding">
		
		<!-- PORTFOLIO CATEGORIES FILTERS -->
	    <?php if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
		        $portfolio_category = get_terms('portfolio_category');?>
		    <?php if($portfolio_category):?>

        <div class="filter-holder fixed-filter">
		    <div class="gallery-filters">            
			    <ul>				
				<?php if(!empty($wr_options['prf-project-filter-all'])): ?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php echo esc_attr(($wr_options['prf-project-filter-all']));?></span></a></li>
				<?php else:?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php esc_attr_e('All','bionick');?></span></a></li>
				<?php endif; ?>	
					<?php  foreach($portfolio_category as $portfolio_cat):?>
					<li><a href="#" data-filter=".<?php echo esc_attr($portfolio_cat->slug);?>" class="gallery-filter "><span><?php echo esc_attr($portfolio_cat->name);?></span></a></li>
					<?php endforeach; ?>				
                </ul>				
            </div>
        </div>
					
        <?php endif; endif;?>
		
		<div class="gallery-items spad four-column">
		
			<?php global $post, $post_id;?>
		    <?php query_posts(array('post_type' => 'portfolio','showposts' =>'-1'));
				while ( have_posts() ) : the_post();?>
			<?php $portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
			<?php 
				$firenze_class = ""; 
				foreach ($portfolio_category as $firenze_item) {
					$firenze_class.=esc_attr($firenze_item->slug . ' ');
			} ?>
	
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			<div class="gallery-item gallery-item-second <?php echo esc_attr($firenze_class);?>">
			<?php } else {?>
			<div class="gallery-item <?php echo esc_attr($firenze_class);?>">	
			<?php };?>
			
                <div class="grid-item-holder">
				
				    <?php if (has_post_thumbnail( $post->ID ) ):?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
					<div class="port-popup-youtube">
                    <a class="popup-youtube box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>
					</div>
					<?php else:?>
                    <a class="popup-vimeo box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>				
					<?php endif ;?>	
					
					<?php } else {?>
                    <a class="image-popup box-popup" href="<?php echo esc_url($image[0]);?>"><i class="fa fa-expand"></i></a>
					<?php };?>
					
					<div class="folio-img">
					    <span class="overlay"></span>
                            <img src="<?php echo esc_url($image[0]);?>" alt="" />						
					</div>
					<?php endif;?>
					
					<div class="grid-item">
					    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<span><?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ', '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></span>
						<?php if (( get_post_meta($post->ID,'rnr_port_icon',true))):?>
						<i class="fa <?php echo (get_post_meta($post->ID,'rnr_port_icon',true)) ?>"></i>
						<?php else:?>
						<i class="fa fa-camera-retro"></i>
						<?php endif;?>
					</div>
					
		        </div>
				
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			</div>
			<?php } else {?>
			</div>	
			<?php };?>				
		    
			<?php endwhile; wp_reset_postdata(); ?>	
			
		</div>

    </section>
    </div>		
	
</div>	
	
<div class="height-emulator color-bg"></div>

<?php get_template_part('template-parts/footer-style2');?>	

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-filter-category',true))=='portfolio-filter-2'):?>

<!--=============== wrapper-inner ===============-->
<div class="wrapper-inner folio-wrap full-width-wrap">

	<div class="content">
    <section class="no-padding">
		
		<!-- PORTFOLIO 2 CATEGORIES FILTERS -->
	    <?php if(!get_post_meta(get_the_ID(), 'portfolio2_category', true)):
		        $portfolio2_category = get_terms('portfolio2_category');?>
		    <?php if($portfolio2_category):?>

        <div class="filter-holder fixed-filter">
		    <div class="gallery-filters">            
			    <ul>				
				<?php if(!empty($wr_options['prf-project-filter-all'])): ?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php echo esc_attr(($wr_options['prf-project-filter-all']));?></span></a></li>
				<?php else:?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php esc_attr_e('All','bionick');?></span></a></li>
				<?php endif; ?>	
					<?php  foreach($portfolio2_category as $portfolio2_cat):?>
					<li><a href="#" data-filter=".<?php echo esc_attr($portfolio2_cat->slug);?>" class="gallery-filter "><span><?php echo esc_attr($portfolio2_cat->name);?></span></a></li>
					<?php endforeach; ?>				
                </ul>				
            </div>
        </div>
					
        <?php endif; endif;?>
		
		<div class="gallery-items spad four-column">
		
			<?php global $post, $post_id;?>
		    <?php query_posts(array('post_type' => 'portfolio2','showposts' =>'-1'));
				while ( have_posts() ) : the_post();?>
			<?php $portfolio2_category = wp_get_post_terms($post->ID,'portfolio2_category');?>
			<?php 
				$firenze_class = ""; 
				foreach ($portfolio2_category as $firenze_item) {
					$firenze_class.=esc_attr($firenze_item->slug . ' ');
			} ?>	
	
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			<div class="gallery-item gallery-item-second <?php echo esc_attr($firenze_class);?>">
			<?php } else {?>
			<div class="gallery-item <?php echo esc_attr($firenze_class);?>">	
			<?php };?>
			
                <div class="grid-item-holder">
				
				    <?php if (has_post_thumbnail( $post->ID ) ):?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
					<div class="port-popup-youtube">
                    <a class="popup-youtube box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>
					</div>
					<?php else:?>
                    <a class="popup-vimeo box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>				
					<?php endif ;?>	
					
					<?php } else {?>
                    <a class="image-popup box-popup" href="<?php echo esc_url($image[0]);?>"><i class="fa fa-expand"></i></a>
					<?php };?>
					
					<div class="folio-img">
					    <span class="overlay"></span>
                            <img src="<?php echo esc_url($image[0]);?>" alt="" />						
					</div>
					<?php endif;?>
					
					<div class="grid-item">
					    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<span><?php $portfolio2_category = wp_get_post_terms($post->ID, 'portfolio2_category'); $separator = ', '; $output = ''; if($portfolio2_category){foreach($portfolio2_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></span>
						<?php if (( get_post_meta($post->ID,'rnr_port_icon',true))):?>
						<i class="fa <?php echo (get_post_meta($post->ID,'rnr_port_icon',true)) ?>"></i>
						<?php else:?>
						<i class="fa fa-camera-retro"></i>
						<?php endif;?>
					</div>
					
		        </div>
				
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			</div>
			<?php } else {?>
			</div>	
			<?php };?>				
		    
			<?php endwhile; wp_reset_postdata(); ?>	
			
		</div>

    </section>
    </div>		
	
</div>	
	
<div class="height-emulator color-bg"></div>

<?php get_template_part('template-parts/footer-style2');?>	

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-filter-category',true))=='portfolio-filter-3'):?>

<!--=============== wrapper-inner ===============-->
<div class="wrapper-inner folio-wrap full-width-wrap">

	<div class="content">
    <section class="no-padding">
		
		<!-- PORTFOLIO 3 CATEGORIES FILTERS -->
	    <?php if(!get_post_meta(get_the_ID(), 'portfolio3_category', true)):
		        $portfolio3_category = get_terms('portfolio3_category');?>
		    <?php if($portfolio3_category):?>

        <div class="filter-holder fixed-filter">
		    <div class="gallery-filters">            
			    <ul>				
				<?php if(!empty($wr_options['prf-project-filter-all'])): ?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php echo esc_attr(($wr_options['prf-project-filter-all']));?></span></a></li>
				<?php else:?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php esc_attr_e('All','bionick');?></span></a></li>
				<?php endif; ?>	
					<?php  foreach($portfolio3_category as $portfolio3_cat):?>
					<li><a href="#" data-filter=".<?php echo esc_attr($portfolio3_cat->slug);?>" class="gallery-filter "><span><?php echo esc_attr($portfolio3_cat->name);?></span></a></li>
					<?php endforeach; ?>				
                </ul>				
            </div>
        </div>
					
        <?php endif; endif;?>
		
		<div class="gallery-items spad four-column">
		
			<?php global $post, $post_id;?>
		    <?php query_posts(array('post_type' => 'portfolio3','showposts' =>'-1'));
				while ( have_posts() ) : the_post();?>
			<?php $portfolio3_category = wp_get_post_terms($post->ID,'portfolio3_category');?>
			<?php 
				$firenze_class = ""; 
				foreach ($portfolio3_category as $firenze_item) {
					$firenze_class.=esc_attr($firenze_item->slug . ' ');
				}?>		
	
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			<div class="gallery-item gallery-item-second <?php echo esc_attr($firenze_class);?>">
			<?php } else {?>
			<div class="gallery-item <?php echo esc_attr($firenze_class);?>">	
			<?php };?>
			
                <div class="grid-item-holder">
				
				    <?php if (has_post_thumbnail( $post->ID ) ):?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
					<div class="port-popup-youtube">
                    <a class="popup-youtube box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>
					</div>
					<?php else:?>
                    <a class="popup-vimeo box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>				
					<?php endif ;?>	
					
					<?php } else {?>
                    <a class="image-popup box-popup" href="<?php echo esc_url($image[0]);?>"><i class="fa fa-expand"></i></a>
					<?php };?>
					
					<div class="folio-img">
					    <span class="overlay"></span>
                            <img src="<?php echo esc_url($image[0]);?>" alt="" />						
					</div>
					<?php endif;?>
					
					<div class="grid-item">
					    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<span><?php $portfolio3_category = wp_get_post_terms($post->ID, 'portfolio3_category'); $separator = ', '; $output = ''; if($portfolio3_category){foreach($portfolio3_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></span>
						<?php if (( get_post_meta($post->ID,'rnr_port_icon',true))):?>
						<i class="fa <?php echo (get_post_meta($post->ID,'rnr_port_icon',true)) ?>"></i>
						<?php else:?>
						<i class="fa fa-camera-retro"></i>
						<?php endif;?>
					</div>
					
		        </div>
				
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			</div>
			<?php } else {?>
			</div>	
			<?php };?>				
		    
			<?php endwhile; wp_reset_postdata(); ?>	
			
		</div>

    </section>
    </div>		
	
</div>	
	
<div class="height-emulator color-bg"></div>

<?php get_template_part('template-parts/footer-style2');?>	

<?php else:?>

<!--=============== wrapper-inner ===============-->
<div class="wrapper-inner folio-wrap full-width-wrap">

	<div class="content">
    <section class="no-padding">
		
		<!-- PORTFOLIO CATEGORIES FILTERS -->
	    <?php if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
		        $portfolio_category = get_terms('portfolio_category');?>
		    <?php if($portfolio_category):?>

        <div class="filter-holder fixed-filter">
		    <div class="gallery-filters">            
			    <ul>				
				<?php if(!empty($wr_options['prf-project-filter-all'])): ?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php echo esc_attr(($wr_options['prf-project-filter-all']));?></span></a></li>
				<?php else:?>
                    <li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span><?php esc_attr_e('All','bionick');?></span></a></li>
				<?php endif; ?>	
					<?php  foreach($portfolio_category as $portfolio_cat):?>
					<li><a href="#" data-filter=".<?php echo esc_attr($portfolio_cat->slug);?>" class="gallery-filter "><span><?php echo esc_attr($portfolio_cat->name);?></span></a></li>
					<?php endforeach; ?>				
                </ul>				
            </div>
        </div>
					
        <?php endif; endif;?>
		
		<div class="gallery-items spad four-column">
		
			<?php global $post, $post_id;?>
		    <?php query_posts(array('post_type' => 'portfolio','showposts' =>'-1'));
				while ( have_posts() ) : the_post();?>
			<?php 
				$firenze_class = ""; 
				foreach ($portfolio_category as $firenze_item) {
					$firenze_class.=esc_attr($firenze_item->slug . ' ');
			} ?>	
	
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			<div class="gallery-item gallery-item-second <?php echo esc_attr($firenze_class);?>">
			<?php } else {?>
			<div class="gallery-item <?php echo esc_attr($firenze_class);?>">	
			<?php };?>
			
                <div class="grid-item-holder">
				
				    <?php if (has_post_thumbnail( $post->ID ) ):?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){?>
					
					<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
					<div class="port-popup-youtube">
                    <a class="popup-youtube box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>
					</div>
					<?php else:?>
                    <a class="popup-vimeo box-popup" href="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>"><i class="fa fa-expand"></i></a>				
					<?php endif ;?>	
					
					<?php } else {?>
                    <a class="image-popup box-popup" href="<?php echo esc_url($image[0]);?>"><i class="fa fa-expand"></i></a>
					<?php };?>
					
					<div class="folio-img">
					    <span class="overlay"></span>
                            <img src="<?php echo esc_url($image[0]);?>" alt="" />						
					</div>
					<?php endif;?>
					
					<div class="grid-item">
					    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<span><?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ', '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></span>
						<?php if (( get_post_meta($post->ID,'rnr_port_icon',true))):?>
						<i class="fa <?php echo (get_post_meta($post->ID,'rnr_port_icon',true)) ?>"></i>
						<?php else:?>
						<i class="fa fa-camera-retro"></i>
						<?php endif;?>
					</div>
					
		        </div>
				
            <?php if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){?>	
			</div>
			<?php } else {?>
			</div>	
			<?php };?>				
		    
			<?php endwhile; wp_reset_postdata(); ?>	
			
		</div>

    </section>
    </div>		
	
</div>	
	
<div class="height-emulator color-bg"></div>

<?php get_template_part('template-parts/footer-style2');?>	

<?php endif ;?>	
