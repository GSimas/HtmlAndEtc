<?php 
    /* get categories */
    $taxonomy = 'category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxonomy);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
?>
<div class="zo-grid-wrapper zo-testimonial-default <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
	
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
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
                    echo '<' . $atts['title_element'] . ' class = "zo-grid-title">';
                    if($atts['title_link']){
                ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                <?php
                        echo '</' . $atts['title_element'] .'>';
                    }else{
                        the_title();
                        echo '</' . $atts['title_element'] .'>';
                    }?>
                <div class="zo-grid-time">
                    <?php the_time('l, F jS, Y');?>
                </div>
                <div class="zo-grid-content">
                    <?php
                        if(is_numeric($atts['num_words'])){
                            echo wp_trim_words( get_the_content(), $atts['num_words'], '...' );
                        }else{
                            echo wp_trim_words( get_the_content(), 15, '...' );
                        }
                    ?>
                </div>
                <div class="zo-grid-categories">
                    <?php echo get_the_term_list( get_the_ID(), $taxonomy, 'Category: ', ', ', '' ); ?>
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