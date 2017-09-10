<?php
    /* get categories */
    $taxo = 'category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxo);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php if($atts['cat']==true){ ?>
            <div class="zo-grid-cat col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h2><?php echo esc_attr($atts['cat_title']);?></h2>
                <p><?php echo esc_attr($atts['cat_description']);?></p>
                <h3>
                   <a href="<?php echo esc_attr($atts['cat_url']);?>" title="<?php echo esc_attr($atts['cat_title']);?>">
                        <?php echo _e("Read More","artista");?>
                    </a>
                </h3>
            </div>
        <?php }?>
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            ?>
            <?php if($atts['cat']==true){ ?>
                <div class="zo-grid-item-custom col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <?php }else{?>
                <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>">
            <?php }?>
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
                <div class="zo-grid-content">
                    <?php
                    echo '<' . $atts['title_element'] . ' class = "zo-grid-title">';?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                    <?php echo '</' . $atts['title_element'] .'>';?>
                    <div class="zo-grid-date"><?php the_time('F d, Y');?></div>
                    <div class="zo-grid-category">
                        <span><?php esc_html_e('In', '3dprinting'); ?></span><?php the_terms( get_the_ID(), 'category', '', ' , ' ); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>
