<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();?>
<?php $cooper_options = get_option('cooper_wp'); ?> 

<?php get_template_part('template-parts/portfolio-single-feature-area'); ?>

            <!-- column-wrap  -->
            <div class="column-wrap scroll-content">
                <!--=============== content ===============-->	
                <!-- content   -->               
                <div  class="content  ">
                    <!-- section-->
                    <section id="sec-scroll" data-scrollax-parent="true" class="dec-sec">
						<?php if (( get_post_meta($post->ID,'rnr_port-sec-parallax-title-on-off',true))=='no'){?>	
							<!-- Empty -->
						<?php } else {?>		
						<?php if (( get_post_meta($post->ID,'rnr_port-sec-parallax-title',true))):?>
						<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php echo balanceTags(get_post_meta($post->ID,'rnr_port-sec-parallax-title',true)) ?></div>
						<?php else:?>			
						<div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }"><?php the_title();?></div>	
						<?php endif;?> 
						<?php };?>						
                        <div class="container">
						
						    <?php if(have_posts()): while ( have_posts() ) : the_post();?>
							
							<?php if (( get_post_meta($post->ID,'port-sec-title-on-off',true))=='no'){?>	
								 <!-- Empty -->
							<?php } else {?>	
						
							<div class="section-title">
								<?php if (( get_post_meta($post->ID,'rnr_port-sec-title',true))):?>
								<h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_port-sec-title',true)) ?></h2>
								<?php else:?>			
								<h2><?php the_title();?></h2>
								<?php endif;?>
								<?php if (( get_post_meta($post->ID,'rnr_port-sec-sub-title',true))):?>
								<p><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-sec-sub-title',true)); ?> </p>
								<?php endif;?> 
								<div class="clearfix"></div>
								<span class="bold-separator"></span>				
							</div>				
							
							<?php };?>							
							
                            <div class="fl-wrap">
								
								<?php get_template_part('template-parts/portfolio-post-formats'); ?>	
								
                            </div>
                            <div class="fl-wrap abt-wrap mr-top">
                                <div class="row">
                                    <div class="col-md-8">
										<?php if (( get_post_meta($post->ID,'rnr_prf_details_title',true))):?>
										<h3 class="text-title"><?php echo balanceTags(get_post_meta($post->ID,'rnr_prf_details_title',true)) ?></h3>
										<?php endif;?>									
                                        <?php the_content();?>
                                    </div>
                                    <div class="col-md-4">
									    <?php if (( get_post_meta($post->ID,'rnr_prf_details_info-on-off',true))=='no'){?>
										    <!-- Empty  -->
										<?php } else { ?>
                                        <ul class="dec-list">
										    <?php if (( get_post_meta($post->ID,'rnr_prf-project-cat-on-off',true))=='yes'){?>
                                            <li>
											<?php if(!empty($cooper_options['prf-project-cat-title'])):?>	
											<span><?php echo esc_attr(($cooper_options['prf-project-cat-title']));?> </span>
											<?php else: ?>
											<span><?php esc_attr_e('Category','cooper');?> </span>
                                            <?php endif; ?>
											<?php esc_attr_e(':','cooper');?> <?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ' / '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></li>
											<?php }?>
											
										    <?php if (( get_post_meta($post->ID,'rnr_prf-project-date-on-off',true))=='yes'){?>
                                            <li>
											<?php if(!empty($cooper_options['prf-project-date-title'])):?>	
											<span><?php echo esc_attr(($cooper_options['prf-project-date-title']));?> </span>
											<?php else: ?>
											<span><?php esc_attr_e('Date','cooper');?> </span>
                                            <?php endif; ?>
											<?php esc_attr_e(':','cooper');?> <?php the_time( get_option( 'date_format' ) ); ?> </li>
											<?php }?>
											
											<?php if (( get_post_meta($post->ID,'rnr_prf_details_custom-on-off',true))=='yes'){?>
                                            	<?php $values =  rwmb_meta(
                                                     'rnr_prf_info_details', 
                                                        $args = array(
                                                        'type'=>'text',
                                                        // other options for meta field
                                                        ),
                                                        $post_id = $post->ID
                                                    ); 
                                                      if($values){
                                                      foreach ($values as $key => $value) {
                                                      echo "<li>".$value."</li>";
                                                          }
                                                    }; 
												?>												
                                            <?php }?>
											
                                        </ul>
										<?php };?>	
										<?php if (( get_post_meta($post->ID,'rnr_prf_link_title',true))):?>
										<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_prf_link_url',true)); ?>" class="btn hide-icon mr-top" target="_blank"><i class="fa fa-file-pdf-o"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_prf_link_title',true)); ?></span></a><?php endif;?>
                                    </div>
                                </div>
                            </div>								
                            <!-- page anv end   -->
                            <div class="page-nav bl-nav">							
								<?php $previous_post = get_previous_post();
									$url = is_object( $previous_post ) ? get_permalink( $previous_post->ID ) : '';
									$title = is_object( $previous_post ) ? get_the_title( $previous_post->ID ) : '';
									if ($previous_post) { 
									 $cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), '' );
									}
								?>
								<?php  if ($previous_post) { ?>
								<a href="<?php echo esc_url( $url ) ?>" class="ajax ppn">
									<span class="nav-text"><?php esc_attr_e('Prev','cooper');?></span> 
									<div class="tooltip">									
									   <img src="<?php echo esc_url($cooper_image[0]);?>" alt="" class="respimg"/>
									   <h5><?php echo esc_attr( $title ); ?></h5>									   
									</div>												  
								</a>
								<?php }?>							

								<?php $next_post = get_next_post();
									  $url = is_object( $next_post ) ? get_permalink( $next_post->ID ) : '';
									  $title = is_object( $next_post ) ? get_the_title( $next_post->ID ) : ''; 
									  if ($next_post) {
									  $cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), '' );
									  }
									?>
								<?php if ($next_post) {?>
								<a href="<?php echo esc_url( $url ) ?>" class="ajax npn">
									<span class="nav-text"><?php esc_attr_e('Next','cooper');?></span> 
									<div class="tooltip">									
									   <img src="<?php echo esc_url($cooper_image[0]);?>" alt="" class="respimg"/>
									   <h5><?php echo esc_attr( $title ); ?></h5>									   
									</div>												  
								</a>	
								<?php }?>
                            </div>
                            <!-- page anv end  -->
							<?php endwhile; endif; wp_reset_postdata(); ?>	
                        </div>
                    </section>
                    <!-- section end -->
					<!--  to top  -->  
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
                <!-- content end -->
            </div>
            <!-- column-wrap end -->							
<footer class="main-footer">
<?php if (class_exists('WooCommerce')) { ?>
<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="mail-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
<?php }  else { ?>
<?php if(!empty($cooper_options['email'])):?> 
<a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>" class="mail-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
<?php endif;?>
<?php } ?>
<?php get_footer(); ?> 