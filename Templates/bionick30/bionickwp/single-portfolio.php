<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php get_header();?>
<?php $wr_options = get_option('bionick_wp'); ?> 

<?php get_template_part('template-parts/portfolio-single-feature-area'); ?>

                    <div class="wrapper-inner">
                        <!--=============== content ===============-->
                        <div class="content">
                            <!--section-->
                            <section id="sec1">
                                <!--container-->
                                <div class="container">
								
								<?php if(have_posts()): while ( have_posts() ) : the_post();?>
								
                                    <!--section-title-->
                                    <div class="section-title">
                                    <div class="sect-subtitle" data-top-bottom="transform: translateY(-300px);" data-bottom-top="transform: translateY(300px);"><span><?php the_title();?></span></div>
                                    <h3><?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ', '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?> </h3>
                                    <h2><?php the_title();?></h2>
                                    <div class="st-separator"></div>
                                    </div>	
                                    <!--section-title end-->
									
								    <?php get_template_part('template-parts/portfolio-post-formats'); ?>	

                                    <!-- project description  -->
                                    <div class="project-decr">
									    <?php if (( get_post_meta($post->ID,'rnr_prf_details_title',true))):?>
                                        <h3 class="text-title"><?php echo (get_post_meta($post->ID,'rnr_prf_details_title',true)) ?></h3>
										<?php endif;?>
                                        <div class="row">
										
											<?php if (( get_post_meta($post->ID,'rnr_prf_details_info-on-off',true))=='yes'){?>
											
                                            <div class="col-md-8">
											
                                                <?php the_content();?>
												
												<?php if (( get_post_meta($post->ID,'rnr_prf_link_title',true))):?>
                                                <a href="<?php echo (get_post_meta($post->ID,'rnr_prf_link_url',true)) ?>" class="btn hide-icon" target="_blank"><i class="fa fa-angle-right"></i><span><?php echo (get_post_meta($post->ID,'rnr_prf_link_title',true)) ?></span></a><?php endif;?>
												
                                            </div>											
											
                                            <div class="col-md-4">
											
											    <ul class="pr-list">
												
												<li><span><?php esc_attr_e('Category : ','bionick');?></span> 

												<h4> <?php $portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category'); $separator = ', '; $output = ''; if($portfolio_category){foreach($portfolio_category as $category) {$output .= $category->name.$separator;} echo trim($output, $separator); } ?></h4>
												</li>
												<li><span><?php esc_attr_e('Date : ','bionick');?></span> <h4><?php the_time('M . d . Y'); ?></h4></li>
												
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
												
												</ul>
												
                                            </div>
											
											<?php } else { ?>
											
                                            <div class="col-md-12">
											
                                                <?php the_content();?>
												
												<?php if (( get_post_meta($post->ID,'rnr_prf_link_title',true))):?>
                                                <a href="<?php echo (get_post_meta($post->ID,'rnr_prf_link_url',true)) ?>" class="btn hide-icon" target="_blank"><i class="fa fa-angle-right"></i><span><?php echo (get_post_meta($post->ID,'rnr_prf_link_title',true)) ?></span></a><?php endif;?>
												
                                            </div>

                                            <?php };?>											
											
                                        </div>
                                    </div>
                                    <!-- project description end -->									
                                    <!-- share  -->
									<?php if (( get_post_meta($post->ID,'rnr_prf-social-on-off',true))=='yes'){?>
                                    <div class="share-holder">
									    <?php if (( get_post_meta($post->ID,'rnr_prf_social_title',true))):?>
                                        <h4><?php echo (get_post_meta($post->ID,'rnr_prf_social_title',true)) ?> </h4>
										<?php endif;?>
                                        <div class="share-container no-align-share"  data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>
                                    </div>
									<?php }?>
                                    <!-- project  pagination -->
                                    <div class="project-pagination">
                                        <ul>
											<?php $previous_post = get_previous_post();
                                                $url = is_object( $previous_post ) ? get_permalink( $previous_post->ID ) : '';
                                                $title = is_object( $previous_post ) ? get_the_title( $previous_post->ID ) : '';
												if ($previous_post) { 
												 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), '' );
												}
											?>
											<?php  if ($previous_post) { ?>
                                            <li>
												<a href="<?php echo esc_url( $url ) ?>"><i class="fa fa-angle-left"></i></a>
												  
                                                <div class="tooltip">
												
												   <img src="<?php echo esc_url($image[0]);?>" alt="" class="respimg"/>
                                                   <h5><?php echo esc_attr( $title ); ?></h5>
												   
                                                </div>												  
                                            </li>
											<?php }?>
											
                                            <li><a href="<?php echo esc_attr(($wr_options['port-page-link']));?>"><i class="fa fa-th-large"></i></a></li>
											
											<?php $next_post = get_next_post();
                                                  $url = is_object( $next_post ) ? get_permalink( $next_post->ID ) : '';
                                                  $title = is_object( $next_post ) ? get_the_title( $next_post->ID ) : ''; 
												  if ($next_post) {
												  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), '' );
												  }
												?>
											<?php if ($next_post) {?>
                                            <li>
												<a href="<?php echo esc_url( $url ) ?>"><i class="fa fa-angle-right"></i></a>
												  
                                                <div class="tooltip">
                                                    <img src="<?php echo esc_url($image[0]);?>" alt="" class="respimg"/>
                                                    <h5><?php echo esc_attr( $title ); ?></h5>
                                                </div>												  
                                            </li>
											<?php };?>
											
                                        </ul>
                                    </div>
                                    <!-- project  pagination end-->
									
								<?php endwhile; endif; wp_reset_postdata(); ?>		
									
                                </div>
                                <!-- container end  -->
                            </section>
                            <!-- section end end  -->
                        </div>
                        <!-- content end  -->
                    </div>
                    <!-- wrapper-inner end  -->	

	
<div class="height-emulator"></div>	

<?php get_template_part('template-parts/footer-style');?>					

<?php get_footer(); ?> 