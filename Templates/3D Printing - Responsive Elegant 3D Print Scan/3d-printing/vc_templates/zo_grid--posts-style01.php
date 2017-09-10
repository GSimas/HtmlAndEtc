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
    $extra_css = '';
    if(!empty($atts['cat_number'])){
        $extra_css = 'zo-grid-cat-number';
        echo '<style type="text/css" data-type="zo-heading-custom-css">';
        /* Custom style Icon */
        echo '#' . esc_attr($atts['html_id']) . ' .zo-grid-cat::before{';
        echo 'content: "' . $atts['cat_number'] . '";';
        echo '}';
    echo '</style>';
    }
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']) . ' ' . $extra_css;?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php if(!empty($atts['cat_show']) && $atts['cat_show']=='true'){ ?>
            <div class="zo-grid-cat col-lg-3 col-md-12 col-sm-6 col-xs-12">
                <?php if(!empty($atts['cat_title'])){?>
                <h2><?php echo esc_attr($atts['cat_title']);?></h2>
                <?php }?>
                <?php if(!empty($atts['cat_description'])){?>
                <p><?php echo esc_attr($atts['cat_description']);?></p>
                <?php }?>
                <?php if(!empty($atts['cat_url'])){?>
                <h3>
                   <a href="<?php echo esc_attr($atts['cat_url']);?>" title="<?php echo esc_attr($atts['cat_title']);?>">
                        <?php echo _e("Read More","artista");?>
                    </a>
                </h3>
                <?php }?>
            </div>
        <?php }?>
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            ?>
            <?php if(!empty($atts['cat_show']) && $atts['cat_show']=='true'){ ?>
                <div class="zo-grid-item-custom col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?php }else{?>
                <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>">
            <?php }?>
                    <div class="zo-grid-item-container">
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
<?php
// Note: create custom-style.css in folder assets/css/
wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
$gap = (int) $atts['item_gap'];
$gap_left_right = $gap / 2;
$custom_css = '
	#'. esc_attr($atts['html_id']) .' .zo-grid .zo-grid-item {
		padding-left: '. esc_attr($gap_left_right) .'px;
		padding-right: '. esc_attr($gap_left_right) .'px;
		margin-bottom: '. esc_attr($gap) .'px;
	}
';
if($gap == 0) {
	$custom_css .= '
		#'. esc_attr($atts['html_id']) . '.container {
			padding-left: 15px;
			padding-right: 15px;
		}
	';
};
wp_add_inline_style( 'custom-style', $custom_css );
?>
