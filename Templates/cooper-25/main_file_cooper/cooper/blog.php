<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php
/*Template Name:Blog Page Template */
get_header();
?>
<?php $cooper_options = get_option('cooper_wp'); ?> 
<?php global $post; ?>

<?php get_template_part('template-parts/intro-section');?>	

<!-- Blog Section Start -->
		
<!-- Default Layout -->		
<?php if (( get_post_meta($post->ID,'rnr_blog-page-layout',true))=='default'):?>

<?php get_template_part('template-parts/default-feature-area');?>

	<!-- column-wrap  -->
	<div class="column-wrap scroll-content">
		<!--=============== content ===============-->	
		<!-- content   -->               
		<div  class="content">
			<?php if (( get_post_meta($post->ID,'rnr_section-parallax-title-on-off',true))=='no'){?>	
				<!-- Empty -->
			<?php } else {?>		
			<?php if (( get_post_meta($post->ID,'rnr_sec-parallax-title',true))):?>
			<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_sec-parallax-title',true)) ?></div>
			<?php else:?>			
			<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
			<?php endif;?> 
			<?php };?>			
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

					<?php if($cooper_options['header-search-box'] == 'yes') {?>
                        <?php get_template_part('template-parts/search-box');?>	
					<?php } else { ?> 
						<!-- Empty -->					 
					<?php } ;?> 					
					<!-- to top end--> 						
								
					<?php 
						$showpost= get_post_meta($post->ID, 'rnr_blog-post-show', true);						
						$categoryname= get_post_meta($post->ID, 'rnr_blog-post-cat', true);						
						$paged=(get_query_var('paged'))?get_query_var('paged'):1;
						$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=>$showpost, 'category_name'=> $categoryname, 'paged'=>$paged ) ); 						
					?>	

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>					
				
					<!-- post-->
					<article class="post">				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Post Formats Start -->
								
						<!-- Image Post -->
									
						<?php if( has_post_format( 'image' ) !='') :?>							        
									
							<?php get_template_part('post-formats/image-index'); ?>  								
									
						<!-- Video Post -->
									
						<?php elseif( has_post_format( 'video' ) !='') :?>	

							<?php get_template_part('post-formats/video-index'); ?>   
									
						<!-- Audio Post -->
									
						<?php elseif( has_post_format( 'audio' ) !='') :?>

							<?php get_template_part('post-formats/audio-index'); ?>
										
						<!-- Gallery Post -->
									
						<?php elseif( has_post_format( 'gallery' ) !='') :?>
									
							<?php get_template_part('post-formats/gallery-index'); ?>
										
						<!-- Standard Post -->
									
						<?php else:?>	

							<?php get_template_part('post-formats/standard-index'); ?>

						<?php endif; ?>	

						<!-- Post Formats End -->	
						<div class="post-item fl-wrap">
						    <?php $cooper_post_title= get_the_title(); ?>
							<?php if($cooper_post_title != '') { ?>
							<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							<?php } ?>
							<ul class="post-meta">
								<li class="author"><i class="fa fa-user"></i> <?php the_author();?> </li>
								<?php if($cooper_post_title != '') { ?>		
								<li><i class="fa fa-calendar-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li><?php } else {?>								
								<li><i class="fa fa-calendar-o"></i><a href="<?php the_permalink();?>"><?php the_time( get_option( 'date_format' ) ); ?></a></li>
								<?php } ?>
								<li><i class="fa fa-comments"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>	
								<li><i class="fa fa-folder-open-o"></i><?php the_category(', ') ?></li>
							</ul>
                                <p> 
								    <?php
										$cooper_excerpt= substr(strip_tags($post->post_content), 0, 280);
										update_post_meta(get_the_ID(), 'cooper_excerpt', $cooper_excerpt);
										echo esc_html($cooper_excerpt);
								    ?><?php esc_attr_e('...','cooper');?>
								</p>
							
							<?php if(!empty($cooper_options['blog-read-more'])): ?>	
							<a href="<?php the_permalink();?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php echo esc_attr(($cooper_options['blog-read-more']));?></span></a>
							<?php else:?>
							<a href="<?php the_permalink();?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php esc_attr_e('Continue reading','cooper');?></span></a>
							<?php endif; ?>							
							
							<?php $cooper_tags= get_the_tags();?>
							<?php if($cooper_tags != '') { ?>
							<ul class="post-tags">
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
				
				    <?php endwhile; wp_reset_postdata(); ?>																	
				
					<!-- pagination-->
					
						<?php if (function_exists("cooper_pagination")) {cooper_pagination($loop->max_num_pages);} ?> 
					
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
	
<!-- Right Sidebar Layout -->

<?php else:?> 

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
					<!-- section-->

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
								
					<?php 
						$showpost= get_post_meta($post->ID, 'rnr_blog-post-show', true);						
						$categoryname= get_post_meta($post->ID, 'rnr_blog-post-cat', true);						
						$paged=(get_query_var('paged'))?get_query_var('paged'):1;
						$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=>$showpost, 'category_name'=> $categoryname, 'paged'=>$paged ) ); 						
					?>	

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>					
				
					<!-- post-->
					<article class="post">				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Post Formats Start -->
								
						<!-- Image Post -->
									
						<?php if( has_post_format( 'image' ) !='') :?>							        
									
							<?php get_template_part('post-formats/image-index'); ?>  								
									
						<!-- Video Post -->
									
						<?php elseif( has_post_format( 'video' ) !='') :?>	

							<?php get_template_part('post-formats/video-index'); ?>   
									
						<!-- Audio Post -->
									
						<?php elseif( has_post_format( 'audio' ) !='') :?>

							<?php get_template_part('post-formats/audio-index'); ?>
										
						<!-- Gallery Post -->
									
						<?php elseif( has_post_format( 'gallery' ) !='') :?>
									
							<?php get_template_part('post-formats/gallery-index'); ?>
										
						<!-- Standard Post -->
									
						<?php else:?>	

							<?php get_template_part('post-formats/standard-index'); ?>

						<?php endif; ?>	

						<!-- Post Formats End -->	
						<div class="post-item fl-wrap">
							<?php $cooper_post_title= get_the_title(); ?>
							<?php if($cooper_post_title != '') { ?>
							<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							<?php } ?>
							<ul class="post-meta">
								<li class="author"><i class="fa fa-user"></i> <?php the_author();?> </li>
								<?php if($cooper_post_title != '') { ?>		
								<li><i class="fa fa-calendar-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li><?php } else {?>								
								<li><i class="fa fa-calendar-o"></i><a href="<?php the_permalink();?>"><?php the_time( get_option( 'date_format' ) ); ?></a></li>
								<?php } ?>
								<li><i class="fa fa-comments"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>	
                               	<li><i class="fa fa-folder-open-o"></i><?php the_category(', ') ?></li>	
							</ul>
								<p> 
									<?php
										$cooper_excerpt= substr(strip_tags($post->post_content), 0, 280);
										update_post_meta(get_the_ID(), 'cooper_excerpt', $cooper_excerpt);
										echo esc_html($cooper_excerpt);
									?><?php esc_attr_e('...','cooper');?>
								</p>
							
							<?php if(!empty($cooper_options['blog-read-more'])): ?>	
							<a href="<?php the_permalink();?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php echo esc_attr(($cooper_options['blog-read-more']));?></span></a>
							<?php else:?>
							<a href="<?php the_permalink();?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php esc_attr_e('Continue reading','cooper');?></span></a>
							<?php endif; ?>							
							
							<?php $cooper_tags= get_the_tags();?>
							<?php if($cooper_tags != '') { ?>
							<ul class="post-tags">
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
				
					<?php endwhile; wp_reset_postdata(); ?>																	
				
					<!-- pagination-->
					
						<?php if (function_exists("cooper_pagination")) {cooper_pagination($loop->max_num_pages);} ?> 
					
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

<?php endif; ?>	
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>
<?php get_footer(); ?>	
