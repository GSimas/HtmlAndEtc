<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header(); ?>
<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>


<!-- Default Layout -->		
		
<?php if($wr_options['layout-blog-page'] == 'default') {?>

<!--=============== fixed-column ===============-->	
<div class="fixed-column">
    <div class="bg-wrapper">
        <div class="bg" style="background-image:url(<?php echo esc_url(AfterSetupTheme::return_thme_option('blog-single-image','url'));?>)"></div>
        <div class="overlay"></div>
		<?php if(!empty($wr_options['blog-section-title'])): ?>
        <div class="bg-title"><span><?php echo esc_attr(($wr_options['blog-section-title']));?> </span></div>
		<?php else:?>
        <div class="bg-title"><span><?php esc_attr_e('My Journal', 'bionick');?> </span></div>
		<?php endif; ?>	
    </div>
</div>
<!-- fixed-column end -->

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container">
			
                <?php if($wr_options['blog-page-title-on-off'] == 'no') {?>
				<!-- Empty -->
		        <?php } else { ?> 
		
                <div class="section-title">
				
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php esc_attr_e('Search Result', 'bionick');?></span></div>
                    <h3><?php printf( __( 'Results for: "%s"', 'bionick' ), '<span>' . get_search_query() . '</span>' ); ?> </h3>  
                    <h2><?php esc_attr_e('Search', 'bionick');?></h2>									
					
                    <div class="st-separator"></div>
                </div>
				
				<?php } ;?>
							
                <?php get_template_part('template-parts/search-box');?>
								
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
				
				<!-- post-->
                <article class="post">
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					
                    <ul class="post-meta">
                        <li><i class="fa fa-clock-o"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                        <li><i class="fa fa-comments-o"></i> <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>
                        <li><i class="fa fa-files-o"></i> <?php the_category(', ') ?></li>
						<?php if(!empty($wr_options['blog-posted-by'])): ?>	
                        <li><i class="fa fa-user"></i> <?php echo esc_attr(($wr_options['blog-posted-by']));?> <span><?php the_author();?></span></li>
						<?php else:?>
                        <li><i class="fa fa-user"></i> <?php esc_attr_e('Posted by','bionick');?> <span><?php the_author();?></span></li>
						<?php endif; ?>
                    </ul>
                    
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
                    
					<p>
					    <?php
				            $excerpt= substr(strip_tags($post->post_content), 0, 300);
				            update_post_meta(get_the_ID(), 'excerpt', $excerpt);
				            echo esc_html($excerpt);
			            ?><?php esc_attr_e('...','bionick');?>
					</p>
                    
					<?php if(!empty($wr_options['blog-read-more'])): ?>	
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php echo esc_attr(($wr_options['blog-read-more']));?></a>
					<?php else:?>
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php esc_attr_e('Continue reading ...','bionick');?></a>
					<?php endif; ?>
                    
                    <ul class="post-tags">
                        <li><?php the_tags( ' ', ', ', '' ); ?></li>
                    </ul>
					
				</div>
				
                </article>
				
                <?php endwhile;?>
				
				<?php else : ?>	

				
                <div class="wrapper-content nothing-found">
      				
	                <div class="text-title ">
			        <h3><?php esc_attr_e('Nothing Found', 'bionick'); ?></h3>
			        </div>
                    <br>
	                <div class="sec-text ">
			        <p><?php esc_attr_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bionick'); ?></p>
			        </div>					
			
	            </div>					

								
				<?php endif; wp_reset_postdata(); ?>										
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($wp_query->max_num_pages);} ?> 
				</div>
				
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style');?>	


<!-- Right Sidebar Layout -->
<?php } elseif($wr_options['layout-blog-page'] == 'right') {?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">		
			
                <?php if($wr_options['blog-page-title-on-off'] == 'no') {?>
				<!-- Empty -->
		        <?php } else { ?> 

				<div class="col-md-12">
				
                <div class="section-title">
				
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php esc_attr_e('Search Result', 'bionick');?></span></div>
                    <h3><?php printf( __( 'Results for: "%s"', 'bionick' ), '<span>' . get_search_query() . '</span>' ); ?> </h3>  
                    <h2><?php esc_attr_e('Search', 'bionick');?></h2>									
					
                    <div class="st-separator"></div>
                </div>
				
                </div>
				
				<?php } ;?>
							
                <?php get_template_part('template-parts/search-box');?>
				
				<div class="col-md-8">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
				
				<!-- post-->
                <article class="post">
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					
                    <ul class="post-meta">
                        <li><i class="fa fa-clock-o"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                        <li><i class="fa fa-comments-o"></i> <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>
                        <li><i class="fa fa-files-o"></i> <?php the_category(', ') ?></li>
						<?php if(!empty($wr_options['blog-posted-by'])): ?>	
                        <li><i class="fa fa-user"></i> <?php echo esc_attr(($wr_options['blog-posted-by']));?> <span><?php the_author();?></span></li>
						<?php else:?>
                        <li><i class="fa fa-user"></i> <?php esc_attr_e('Posted by','bionick');?> <span><?php the_author();?></span></li>
						<?php endif; ?>
                    </ul>
                    
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
                    
					<p>
					    <?php
				            $excerpt= substr(strip_tags($post->post_content), 0, 300);
				            update_post_meta(get_the_ID(), 'excerpt', $excerpt);
				            echo esc_html($excerpt);
			            ?><?php esc_attr_e('...','bionick');?>
					</p>
                    
					<?php if(!empty($wr_options['blog-read-more'])): ?>	
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php echo esc_attr(($wr_options['blog-read-more']));?></a>
					<?php else:?>
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php esc_attr_e('Continue reading ...','bionick');?></a>
					<?php endif; ?>
                    
                    <ul class="post-tags">
                        <li><?php the_tags( ' ', ', ', '' ); ?></li>
                    </ul>

                </div>				
				
                </article>
				
                <?php endwhile;?>
				
				<?php else : ?>	

				
                <div class="wrapper-content nothing-found">
      				
	                <div class="text-title ">
			        <h3><?php esc_attr_e('Nothing Found', 'bionick'); ?></h3>
			        </div>
                    <br>
	                <div class="sec-text ">
			        <p><?php esc_attr_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bionick'); ?></p>
			        </div>					
			
	            </div>					

								
				<?php endif; wp_reset_postdata(); ?>												
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($wp_query->max_num_pages);} ?> 
				</div>
				
                </div>

				<div class="col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>								
				
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>		
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>	

<!-- Left Sidebar Layout -->
<?php } elseif($wr_options['layout-blog-page'] == 'left') {?>								

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">		
			
                <?php if($wr_options['blog-page-title-on-off'] == 'no') {?>
				<!-- Empty -->
		        <?php } else { ?> 

				<div class="col-md-12">
				
                <div class="section-title">
				
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php esc_attr_e('Search Result', 'bionick');?></span></div>
                    <h3><?php printf( __( 'Results for: "%s"', 'bionick' ), '<span>' . get_search_query() . '</span>' ); ?> </h3>  
                    <h2><?php esc_attr_e('Search', 'bionick');?></h2>									
					
                    <div class="st-separator"></div>
                </div>
				
                </div>
				
				<?php } ;?>
							
                <?php get_template_part('template-parts/search-box');?>
				
				<div class="col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>					
				
				<div class="col-md-8">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
				
				<!-- post-->
                <article class="post">
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					
                    <ul class="post-meta">
                        <li><i class="fa fa-clock-o"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                        <li><i class="fa fa-comments-o"></i> <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>
                        <li><i class="fa fa-files-o"></i> <?php the_category(', ') ?></li>
						<?php if(!empty($wr_options['blog-posted-by'])): ?>	
                        <li><i class="fa fa-user"></i> <?php echo esc_attr(($wr_options['blog-posted-by']));?> <span><?php the_author();?></span></li>
						<?php else:?>
                        <li><i class="fa fa-user"></i> <?php esc_attr_e('Posted by','bionick');?> <span><?php the_author();?></span></li>
						<?php endif; ?>
                    </ul>
                    
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
                    
					<p>
					    <?php
				            $excerpt= substr(strip_tags($post->post_content), 0, 300);
				            update_post_meta(get_the_ID(), 'excerpt', $excerpt);
				            echo esc_html($excerpt);
			            ?><?php esc_attr_e('...','bionick');?>
					</p>
                    
					<?php if(!empty($wr_options['blog-read-more'])): ?>	
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php echo esc_attr(($wr_options['blog-read-more']));?></a>
					<?php else:?>
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php esc_attr_e('Continue reading ...','bionick');?></a>
					<?php endif; ?>
                    
                    <ul class="post-tags">
                        <li><?php the_tags( ' ', ', ', '' ); ?></li>
                    </ul>

                </div>				
				
                </article>
				
                <?php endwhile;?>
				
				<?php else : ?>	

				
                <div class="wrapper-content nothing-found">
      				
	                <div class="text-title ">
			        <h3><?php esc_attr_e('Nothing Found', 'bionick'); ?></h3>
			        </div>
                    <br>
	                <div class="sec-text ">
			        <p><?php esc_attr_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bionick'); ?></p>
			        </div>					
			
	            </div>					

								
				<?php endif; wp_reset_postdata(); ?>												
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($wp_query->max_num_pages);} ?> 
				</div>
				
                </div>

            </div>
        </section>
    </div>
    <!-- content end  -->
</div>		
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>	

<?php } else { ?> 

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">		
			
                <?php if($wr_options['blog-page-title-on-off'] == 'no') {?>
				<!-- Empty -->
		        <?php } else { ?> 

				<div class="col-md-12">
				
                <div class="section-title">
				
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php esc_attr_e('Search Result', 'bionick');?></span></div>
                    <h3><?php printf( __( 'Results for: "%s"', 'bionick' ), '<span>' . get_search_query() . '</span>' ); ?> </h3>  
                    <h2><?php esc_attr_e('Search', 'bionick');?></h2>									
					
                    <div class="st-separator"></div>
                </div>
				
                </div>
				
				<?php } ;?>
							
                <?php get_template_part('template-parts/search-box');?>
				
				<div class="col-md-8">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
				
				<!-- post-->
                <article class="post">
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					
                    <ul class="post-meta">
                        <li><i class="fa fa-clock-o"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                        <li><i class="fa fa-comments-o"></i> <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></li>
                        <li><i class="fa fa-files-o"></i> <?php the_category(', ') ?></li>
						<?php if(!empty($wr_options['blog-posted-by'])): ?>	
                        <li><i class="fa fa-user"></i> <?php echo esc_attr(($wr_options['blog-posted-by']));?> <span><?php the_author();?></span></li>
						<?php else:?>
                        <li><i class="fa fa-user"></i> <?php esc_attr_e('Posted by','bionick');?> <span><?php the_author();?></span></li>
						<?php endif; ?>
                    </ul>
                    
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
                    
					<p>
					    <?php
				            $excerpt= substr(strip_tags($post->post_content), 0, 300);
				            update_post_meta(get_the_ID(), 'excerpt', $excerpt);
				            echo esc_html($excerpt);
			            ?><?php esc_attr_e('...','bionick');?>
					</p>
                    
					<?php if(!empty($wr_options['blog-read-more'])): ?>	
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php echo esc_attr(($wr_options['blog-read-more']));?></a>
					<?php else:?>
					<a href="<?php the_permalink();?>" class="ajax post-link"><?php esc_attr_e('Continue reading ...','bionick');?></a>
					<?php endif; ?>
                    
                    <ul class="post-tags">
                        <li><?php the_tags( ' ', ', ', '' ); ?></li>
                    </ul>

                </div>				
				
                </article>
				
                <?php endwhile;?>
				
				<?php else : ?>	

				
                <div class="wrapper-content nothing-found">
      				
	                <div class="text-title ">
			        <h3><?php esc_attr_e('Nothing Found', 'bionick'); ?></h3>
			        </div>
                    <br>
	                <div class="sec-text ">
			        <p><?php esc_attr_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bionick'); ?></p>
			        </div>					
			
	            </div>					

								
				<?php endif; wp_reset_postdata(); ?>												
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($wp_query->max_num_pages);} ?> 
				</div>
				
                </div>

				<div class="col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>								
				
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>		
	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>	

<?php };?>	

<?php get_footer(); ?>			