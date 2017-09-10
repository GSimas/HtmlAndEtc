<!-- scroll page navigation -->
<?php if(has_nav_menu('main-menu')) {?>
<?php  if(has_nav_menu('home-menu')) {?>
                        <div class="scroll-nav-holder">
                            <nav class="scroll-nav">
                                <ul>
								<?php 
								if ( ( $locations = get_nav_menu_locations() ) && $locations['home-menu'] ) {
									$menu = wp_get_nav_menu_object( $locations['home-menu'] );
									$menu_items = wp_get_nav_menu_items($menu->term_id);
									$include = array();
									foreach($menu_items as $item) {
										if($item->object == 'page')
											$include[] = $item->object_id;
									}
									$main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
								}
								
								$i = 1;
								while ($main_query->have_posts()) : $main_query->the_post();
								 global $post, $separatepages;

								$post_name = $post->post_name;
								
								$post_id = get_the_ID();
								 ?>
								 <?php $separatepages = get_post_meta($post->ID,'rnr_open_page',true);
								 update_post_meta(get_the_ID(), 'separatepages', $separatepages);
								if (($separatepages != true ))
								{ ?>
    
                                   <?php if (has_post_thumbnail( $post->ID ) ):
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'qu-blog' );?>
                                    <li>
									<?php if (( get_post_meta($post->ID,'rnr_sec-menu-title',true))){?>
									<a class="scroll-link fbgs" href="#<?php echo balanceTags($post->post_name);?>" data-bgscr="<?php echo esc_url($image[0]);?>" data-bgtex="<?php echo (get_post_meta($post->ID,'rnr_sec-menu-title',true)); ?>">
									<?php } else {?>
									<a class="scroll-link fbgs" href="#<?php echo balanceTags($post->post_name);?>" data-bgscr="<?php echo esc_url($image[0]);?>" data-bgtex="<?php the_title();?>"><?php };?>
									<span><?php the_title();?></span></a></li>									
								<?php else:?>
								 <li>
								 <?php if (( get_post_meta($post->ID,'rnr_sec-menu-title',true))){?>
								 <a class="scroll-link fbgs" href="#<?php echo balanceTags($post->post_name);?>"  data-bgtex="<?php echo (get_post_meta($post->ID,'rnr_sec-menu-title',true)); ?>">
								<?php } else {?>	
								 <a class="scroll-link fbgs" href="#<?php echo balanceTags($post->post_name);?>"  data-bgtex="<?php the_title();?>"><?php };?>
									<span><?php the_title();?></span> </a></li>									
								<?php endif;?>
                                  <?php $i++;}  endwhile; wp_reset_postdata(); ?>	 
                                </ul>
                            </nav>
                        </div>
                        <!-- scroll page navigation end -->
<?php };?>
<?php };?>