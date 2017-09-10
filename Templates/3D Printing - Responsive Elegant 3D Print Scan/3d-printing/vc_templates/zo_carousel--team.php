<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            $team_meta = zo_post_meta_data();
            ?>
            <div class="zo-carousel-item">
                <div class="zo-carousel-team-image">
                    <?php
                    if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        if($atts['image_size']=='custom'){
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            $attachment_full_image = $attachment_image[0];
                            $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                            echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';
                        }else{
                            the_post_thumbnail($atts['image_size']);
                        }
                    else:
                        echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                    endif;
                ?>
                    <div class="zo-carousel-team-overlay-inner">
                        <?php echo '<' . $atts['title_element'] . ' class = "zo-carousel-title" >';
                            if($atts['title_link']){
                        ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                        <?php } else{
                                the_title();
                            }
                        echo '</' . $atts['title_element'] . '>';?>
                        <div class="zo-carousel-team-position">
                            <span><?php echo esc_attr($team_meta->_zo_team_position); ?></span>
                        </div>
                    </div>
                    <?php
                        $fb = isset( $team_meta->_zo_team_facebook ) ? $team_meta->_zo_team_facebook : '';
                        $tw = isset( $team_meta->_zo_team_twitter ) ? $team_meta->_zo_team_twitter : '';
                        $gg = isset( $team_meta->_zo_team_google ) ? $team_meta->_zo_team_google : '';
                        $in = isset( $team_meta->_zo_team_in ) ? $team_meta->_zo_team_in : '';
                        if( !empty($fb) || !empty($tw) || !empty($gg) || !empty($in) ): ?>
                            <ul class="zo-carousel-team-socials">
                                <?php if( $fb ) : ?>
                                    <li><a href="<?php echo $fb; ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php endif; ?>

                                <?php if( $tw ) : ?>
                                    <li><a href="<?php echo $tw; ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php endif; ?>

                                 <?php if( $gg ) : ?>
                                    <li><a href="<?php echo $gg; ?>"><i class="fa fa-google-plus"></i></a></li>
                                <?php endif; ?>

                                 <?php if( $in ) : ?>
                                    <li><a href="<?php echo $in; ?>"><i class="fa fa-linkedin"></i></a></li>
                                <?php endif; ?>
                            </ul>
                    <?php endif;?>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
