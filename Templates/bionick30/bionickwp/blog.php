<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php
/*Template Name:Blog Page Template */
get_header();
?>
<?php $wr_options = get_option('bionick_wp'); ?> 
<?php global $post; ?>

<?php get_template_part('template-parts/intro-section');?>	

<!-- Blog Section Start -->
		
<!-- Default Layout -->		
		
<?php if (( get_post_meta($post->ID,'rnr_blog-page-layout',true))=='default'):?>


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
			
                <div class="searh-holder">
                    <div class="searh-inner">
                        <form action="#">
                            <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search..." />
                            <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                        </form>
                    </div>
                </div>
								
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
				
				<?php endwhile; wp_reset_postdata(); ?>							
							
					<div style="display:none;"><?php the_tags(); next_posts_link(); previous_posts_link();wp_link_pages();comment_form();paginate_comments_links();previous_comments_link(); wp_enqueue_script('comment-reply');?></div>				
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($loop->max_num_pages);} ?>
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

<?php elseif (( get_post_meta($post->ID,'rnr_blog-page-layout',true))=='right'):?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">		
			
            <?php if (( get_post_meta($post->ID,'rnr_section-title-on-off',true))=='no'){?>	

            <!-- Empty -->

            <?php } else {?>	
		        <div class="col-md-12">
                <div class="section-title">
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php the_title();?></span></div>
			        <?php if (( get_post_meta($post->ID,'rnr_sec-sub-title',true))):?>
                    <h3><?php echo (get_post_meta($post->ID,'rnr_sec-sub-title',true)) ?> </h3>
			        <?php endif;?>  
                    <h2><?php the_title();?></h2>
                    <div class="st-separator"></div>
                </div>
                </div>
			
			<?php };?>
			
                <div class="searh-holder">
                    <div class="searh-inner">
                        <form action="#">
                            <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search..." />
                            <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                        </form>
                    </div>
                </div>
								
				<?php 
					$showpost= get_post_meta($post->ID, 'rnr_blog-post-show', true);						
					$categoryname= get_post_meta($post->ID, 'rnr_blog-post-cat', true);						
					$paged=(get_query_var('paged'))?get_query_var('paged'):1;
			        $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=>$showpost, 'category_name'=> $categoryname, 'paged'=>$paged ) ); 						
				?>	
				
				<div class="col-md-8">

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>					
				
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
				
				<?php endwhile; wp_reset_postdata(); ?>	
							
					<div style="display:none;"><?php the_tags(); next_posts_link(); previous_posts_link();wp_link_pages();comment_form();paginate_comments_links();previous_comments_link(); wp_enqueue_script('comment-reply');?></div>				
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($loop->max_num_pages);} ?>
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
<?php elseif (( get_post_meta($post->ID,'rnr_blog-page-layout',true))=='left'):?>

<!--=============== wrapper-inner  ===============-->
<div class="wrapper-inner sec-full-inner full-width-wrap">
    <!--=============== content ===============-->	
    <div class="content">
        <section id="sec1">
            <div class="container sec-custom-layout">		
			
            <?php if (( get_post_meta($post->ID,'rnr_section-title-on-off',true))=='no'){?>	

            <!-- Empty -->

            <?php } else {?>	
		        <div class="col-md-12">
                <div class="section-title">
                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php the_title();?></span></div>
			        <?php if (( get_post_meta($post->ID,'rnr_sec-sub-title',true))):?>
                    <h3><?php echo (get_post_meta($post->ID,'rnr_sec-sub-title',true)) ?> </h3>
			        <?php endif;?>  
                    <h2><?php the_title();?></h2>
                    <div class="st-separator"></div>
                </div>
                </div>
			
			<?php };?>
			
                <div class="searh-holder">
                    <div class="searh-inner">
                        <form action="#">
                            <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search..." />
                            <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                        </form>
                    </div>
                </div>
				
				<div class="col-md-4">
				
					<div class="section-sidebar">

				        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
							
					</div>				
				
				</div>				
								
				<?php 
					$showpost= get_post_meta($post->ID, 'rnr_blog-post-show', true);						
					$categoryname= get_post_meta($post->ID, 'rnr_blog-post-cat', true);						
					$paged=(get_query_var('paged'))?get_query_var('paged'):1;
			        $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=>$showpost, 'category_name'=> $categoryname, 'paged'=>$paged ) ); 						
				?>	
				
				<div class="col-md-8">

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>					
				
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
				
				<?php endwhile; wp_reset_postdata(); ?>	
							
					<div style="display:none;"><?php the_tags(); next_posts_link(); previous_posts_link();wp_link_pages();comment_form();paginate_comments_links();previous_comments_link(); wp_enqueue_script('comment-reply');?></div>				
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($loop->max_num_pages);} ?>
				</div>
				
                </div>
				
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>	

<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>

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
			
                <div class="searh-holder">
                    <div class="searh-inner">
                        <form action="#">
                            <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search..." />
                            <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                        </form>
                    </div>
                </div>
								
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
				
				<?php endwhile; wp_reset_postdata(); ?>							
							
					<div style="display:none;"><?php the_tags(); next_posts_link(); previous_posts_link();wp_link_pages();comment_form();paginate_comments_links();previous_comments_link(); wp_enqueue_script('comment-reply');?></div>				
				
                <!-- pagination-->
                <div class="pagination">
                    <?php if (function_exists("pagination")) {pagination($loop->max_num_pages);} ?>
				</div>
				
            </div>
        </section>
    </div>
    <!-- content end  -->
</div>
<!-- wrapper-inner end  -->	

<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style2');?>									

<?php endif ;?>	

<?php get_footer(); ?>	
