<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            ?>
            <div class="zo-carousel-item">
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
                    echo '<' . $atts['title_element'] . ' class = "zo-carousel-title">';
                    if($atts['title_link']){
                ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                <?php
                        echo '</' . $atts['title_element'] .'>';
                    }else{
                        the_title();
                        echo '</' . $atts['title_element'] .'>';
                    }?>
                <div class="zo-carousel-content">
                    <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                </div>
                <div class="zo-carousel-categories">
                    <?php echo get_the_term_list(get_the_ID(), 'category', 'Category: ', ', ', ''); ?>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
