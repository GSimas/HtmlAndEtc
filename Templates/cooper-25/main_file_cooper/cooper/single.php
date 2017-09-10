<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>

<!-- Blog Post Details Section Start -->
		
<!-- Default Layout -->		
		
<?php if($cooper_options['layout-blog-page'] == 'default') {?>

            <!-- fixed column  -->
            <div class="fixed-column">
                <div class="column-image fl-wrap full-height">
                    <?php $cooper_images = rwmb_meta( 'rnr_blog-section-image','type=image&size=menu-feature-img' );
                            foreach ( $cooper_images as $image ){
                                echo "<div class='bg' data-bg='{$image['url']}'></div>";
                        };?>				
                    <div class="overlay"></div>
                </div>
				<?php if (( get_post_meta($post->ID,'rnr_blog-section-title',true))){?>
                <div class="bg-title alt"><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_blog-section-title',true)); ?></span></div>
				<?php } else {?>
                <div class="bg-title alt"><span><?php the_title();?></span></div>
				<?php };?> 
                <div class="progress-bar-wrap">
                    <div class="progress-bar"></div>
                </div>
            </div>
            <!-- fixed column  end -->	

	<!-- column-wrap  -->
	<div class="column-wrap scroll-content">
		<!--=============== content ===============-->	
		<!-- content   -->               
		<div  class="content">
			<?php if (( get_post_meta($post->ID,'rnr_blog-sec-parallax-title-on-off',true))=='no'){?>	
				<!-- Empty -->
			<?php } else {?>		
			<?php if (( get_post_meta($post->ID,'rnr_blog-sec-parallax-title',true))):?>
			<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_blog-sec-parallax-title',true)) ?></div>
			<?php else:?>			
			<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
			<?php endif;?> 
			<?php };?>			
			<!-- section-->
			<section  data-scrollax-parent="true" class="dec-sec">
				<div class="container">
			
					<?php if (( get_post_meta($post->ID,'rnr_blog-sec-title-on-off',true))=='no'){?>	
						 <!-- Empty -->
					<?php } else {?>	
				
					<div class="section-title">
						<?php if (( get_post_meta($post->ID,'rnr_blog-sec-title',true))):?>
						<h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_blog-sec-title',true)) ?></h2>
						<?php else:?>			
						<h2><?php the_title();?></h2>
						<?php endif;?>
						<?php if (( get_post_meta($post->ID,'rnr_blog-sec-sub-title',true))):?>
						<p><?php echo esc_attr(get_post_meta($post->ID,'rnr_blog-sec-sub-title',true)); ?> </p>
						<?php endif;?> 
						<div class="clearfix"></div>
						<span class="bold-separator"></span>				
					</div>				
					
					<?php };?>		
                    
					<?php if($cooper_options['header-search-box'] == 'yes') {?>
                        <?php get_template_part('template-parts/search-box');?>	
					<?php } else { ?> 
						<!-- Empty -->					 
					<?php } ;?> 					
					<!-- to top end--> 						

                    <?php if(have_posts()) : while ( have_posts() ) : the_post();?>				
				
					<!-- post-->
					<article class="post">
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<!-- Post Formats Start -->
								
						<!-- Image Post -->
									
						<?php if( has_post_format( 'image' ) !='') :?>							        
									
							<?php get_template_part('post-formats/image-single'); ?>  								
									
						<!-- Video Post -->
									
						<?php elseif( has_post_format( 'video' ) !='') :?>	

							<?php get_template_part('post-formats/video-single'); ?>   
									
						<!-- Audio Post -->
									
						<?php elseif( has_post_format( 'audio' ) !='') :?>

							<?php get_template_part('post-formats/audio-single'); ?>
										
						<!-- Gallery Post -->
									
						<?php elseif( has_post_format( 'gallery' ) !='') :?>
									
							<?php get_template_part('post-formats/gallery-single'); ?>
										
						<!-- Standard Post -->
									
						<?php else:?>	

							<?php get_template_part('post-formats/standard-single'); ?>

						<?php endif; ?>	

						<!-- Post Formats End -->	

						<div class="post-item fl-wrap">
						
							<?php if (( get_post_meta($post->ID,'rnr_blog_details_title',true))):?>
							<h4><?php echo balanceTags(get_post_meta($post->ID,'rnr_blog_details_title',true)) ?></h4>
							<?php endif;?>							

							<ul class="post-meta">
								<li class="author"><i class="fa fa-user"></i> <?php the_author();?> </li>
								<li><i class="fa fa-calendar-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
								<li><i class="fa fa-comments"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>		
                                <li><i class="fa fa-folder-open-o"></i><?php the_category(', ') ?></li>
							</ul>
							<div class="post-content th-check">
								<?php the_content();
								 wp_link_pages( array(
								'before'      => '<div class="page-links">',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '%',
								'separator'   => '',
								) );													
								?>
							</div>													
							
							<?php $cooper_tags= get_the_tags();?>
							<?php if($cooper_tags != '') { ?>
							<ul class="post-tags  single-tags">
								<li><?php the_tags( ' ', ' ', ''  ); ?></li>
							</ul>
							<?php };?>	
							<?php if (( get_post_meta($post->ID,'rnr_blog_icon',true))):?>
							<div class="artcicle-icon"><i class="fa <?php echo esc_attr(get_post_meta($post->ID,'rnr_port_icon',true)); ?>"></i></div>
							<?php else:?>
							<div class="artcicle-icon"><i class="fa fa-camera-retro"></i></div>
							<?php endif;?>							
						</div>
					</div>
					</article>	

					<!--author -->
					<?php if($cooper_options['blogauthorinfo'] == 'yes') {?>
					<div class="post-author">
						<div class="post-author-wrap">
							<div class="post-author-img">
								<?php echo get_avatar( $comment, 80 ); ?>
							</div>
							<?php if(!empty($cooper_options['blog-posted-by'])): ?>	
							<span><?php echo esc_attr(($cooper_options['blog-posted-by']));?></span>
							<?php else:?>
							<span><?php esc_attr_e('Written By','cooper');?></span>
							<?php endif; ?>														
							<h3><?php echo get_the_author_link(); ?></h3>
							<p><?php echo the_author_meta('description'); ?> </p>
						</div>
					</div>
					<?php }?>
					<!--author end-->					
				
				    <?php endwhile;  endif; wp_reset_postdata(); ?>	
				    <div class="fl-wrap">
						<!--Comment section-->
						<div id="comments" class="post-comments th-check">			
						<?php if ( comments_open() ) : ?>	 							
							<?php comments_template(); ?>	
						<?php endif;?>
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
		</div>
		<!-- content end -->
	</div>
	<!-- column-wrap end -->			
	

				
<?php } else { ?> 


<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
	<!--=============== content ===============-->	
	<!-- content   -->               
	<div  class="content">
	    <section  data-scrollax-parent="true" class="dec-sec">			
            <div class="containerr sec-custom-layout">		
		        <!-- column-wrap  -->
		        <div class="column-wrap-blog-content col-md-8">
				
					<?php if (( get_post_meta($post->ID,'rnr_blog-sec-parallax-title-on-off',true))=='no'){?>	
						<!-- Empty -->
					<?php } else {?>		
					<?php if (( get_post_meta($post->ID,'rnr_blog-sec-parallax-title',true))):?>
					<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_blog-sec-parallax-title',true)) ?></div>
					<?php else:?>			
					<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
					<?php endif;?> 
					<?php };?>						

					<?php if (( get_post_meta($post->ID,'rnr_blog-sec-title-on-off',true))=='no'){?>	
						 <!-- Empty -->
					<?php } else {?>	
				
					<div class="section-title">
						<?php if (( get_post_meta($post->ID,'rnr_blog-sec-title',true))):?>
						<h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_blog-sec-title',true)) ?></h2>
						<?php else:?>			
						<h2><?php the_title();?></h2>
						<?php endif;?>
						<?php if (( get_post_meta($post->ID,'rnr_blog-sec-sub-title',true))):?>
						<p><?php echo esc_attr(get_post_meta($post->ID,'rnr_blog-sec-sub-title',true)); ?> </p>
						<?php endif;?> 
						<div class="clearfix"></div>
						<span class="bold-separator"></span>				
					</div>				
					
					<?php };?>								
								
                    <?php if(have_posts()) : while ( have_posts() ) : the_post();?>				
				
					<!-- post-->
					<article class="post">
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<!-- Post Formats Start -->
								
						<!-- Image Post -->
									
						<?php if( has_post_format( 'image' ) !='') :?>							        
									
							<?php get_template_part('post-formats/image-single'); ?>  								
									
						<!-- Video Post -->
									
						<?php elseif( has_post_format( 'video' ) !='') :?>	

							<?php get_template_part('post-formats/video-single'); ?>   
									
						<!-- Audio Post -->
									
						<?php elseif( has_post_format( 'audio' ) !='') :?>

							<?php get_template_part('post-formats/audio-single'); ?>
										
						<!-- Gallery Post -->
									
						<?php elseif( has_post_format( 'gallery' ) !='') :?>
									
							<?php get_template_part('post-formats/gallery-single'); ?>
										
						<!-- Standard Post -->
									
						<?php else:?>	

							<?php get_template_part('post-formats/standard-single'); ?>

						<?php endif; ?>	

						<!-- Post Formats End -->	

						<div class="post-item fl-wrap">
						
							<?php if (( get_post_meta($post->ID,'rnr_blog_details_title',true))):?>
							<h4><?php echo balanceTags(get_post_meta($post->ID,'rnr_blog_details_title',true)) ?></h4>
							<?php endif;?>							

							<ul class="post-meta">
								<li class="author"><i class="fa fa-user"></i> <?php the_author();?> </li>
								<li><i class="fa fa-calendar-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
								<li><i class="fa fa-comments"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>		
                                <li><i class="fa fa-folder-open-o"></i><?php the_category(', ') ?></li>
							</ul>
							<div class="post-content th-check">
								<?php the_content();
								 wp_link_pages( array(
								'before'      => '<div class="page-links">',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '%',
								'separator'   => '',
								) );													
								?>
							</div>													
							
							<?php $cooper_tags= get_the_tags();?>
							<?php if($cooper_tags != '') { ?>
							<ul class="post-tags  single-tags">
								<li><?php the_tags( ' ', ' ', ''  ); ?></li>
							</ul>
							<?php };?>	
							<?php if (( get_post_meta($post->ID,'rnr_blog_icon',true))):?>
							<div class="artcicle-icon"><i class="fa <?php echo esc_attr(get_post_meta($post->ID,'rnr_port_icon',true)); ?>"></i></div>
							<?php else:?>
							<div class="artcicle-icon"><i class="fa fa-camera-retro"></i></div>
							<?php endif;?>							
						</div>
					</div>
					</article>	

					<!--author -->
					<?php if($cooper_options['blogauthorinfo'] == 'yes') {?>
					<div class="post-author">
						<div class="post-author-wrap">
							<div class="post-author-img">
								<?php echo get_avatar( $comment, 80 ); ?>
							</div>
							<?php if(!empty($cooper_options['blog-posted-by'])): ?>	
							<span><?php echo esc_attr(($cooper_options['blog-posted-by']));?></span>
							<?php else:?>
							<span><?php esc_attr_e('Written By','cooper');?></span>
							<?php endif; ?>														
							<h3><?php echo get_the_author_link(); ?></h3>
							<p><?php echo the_author_meta('description'); ?> </p>
						</div>
					</div>
					<?php }?>
					<!--author end-->					
				
				    <?php endwhile;  endif; wp_reset_postdata(); ?>	
				    <div class="fl-wrap">
						<!--Comment section-->
						<div id="comments" class="post-comments th-check">			
						<?php if ( comments_open() ) : ?>	 							
							<?php comments_template(); ?>	
						<?php endif;?>
						</div>				
					</div>	
                </div>
				<div class="column-wrap-blog-sidebar col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
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

<?php };?>	
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>
<?php get_footer(); ?> 