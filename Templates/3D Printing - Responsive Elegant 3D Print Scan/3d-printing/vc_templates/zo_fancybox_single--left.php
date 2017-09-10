<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $custom_css = '';
    /* Custom style Icon */
    $custom_css .= '#' . esc_attr($atts['html_id']) . ' .zo-fancybox-icon{';
    $custom_css .= 'text-align: ' . $atts['icon_align'] . ';';
    if(!empty($atts['icon_font_size']) && is_numeric($atts['icon_font_size'])){
        $custom_css .= 'font-size:' . $atts['icon_font_size'] . 'px;';
    }
    $custom_css .= '}';
    /* Custom style title */
    $custom_css .= '#' . esc_attr($atts['html_id']) . ' .zo-fancybox-title{';
    $custom_css .= 'text-align: ' . $atts['title_align'] . ';';
    $custom_css .= '}';
    /* Custom style link */
    if($atts['link_content']=='yes'){
        $custom_css .= '#' . esc_attr($atts['html_id']) . ' .zo-fancybox-link{';
        $custom_css .= 'text-align: ' . $atts['title_align'] . ';';
        $custom_css .= '}';
    }
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
	wp_add_inline_style( 'custom-style', $custom_css );
?>
<div class="zo-fancyboxes-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-fancybox-item">
        <?php if($atts['icon_type']=='upload' && !empty($atts['image'])){
            echo '<div class="zo-fancybox-icon">';
            if ($atts['link_icon']=='yes'){
                echo '<a href="' . $atts['link_url'] . '" title="' . $atts['title_item'] . '" target= "' .$atts['link_target'] . '">';
            }
            if($atts['image_size']=='custom'){
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full', false);
                $attachment_full_image = $attachment_image[0];
                $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                echo '<img src="'. esc_attr($image_resize) .'" title="' . $atts['title_item'] . '" alt="' . $atts['title_item'] . '">';
            }else{
                $attachment_image = wp_get_attachment_image_src($atts['image'], $atts['image_size']);
                $image_url = $attachment_image[0];
                echo '<img src="'. esc_attr($image_url) .'" title="' . $atts['title_item'] . '" alt="' . $atts['title_item'] . '">';
            }
            if ($atts['link_icon']=='yes'){
                echo '</a>';
            }
            echo '</div>';
        ?>
        <?php } elseif(!empty($iconClass)){ ?>
            <div class="zo-fancybox-icon">
                <?php
                    if ($atts['link_icon']=='yes'){
                        echo '<a href="' . $atts['link_url'] . '" title="' . $atts['title_item'] . '" target= "' .$atts['link_target'] . '">';
                    }
                ?>
                <i class="<?php echo esc_attr($iconClass);?>"></i>
                <?php
                    if ($atts['link_icon']=='yes'){
                        echo '</a>';
                    }
                ?>
            </div>
        <?php }?>
        <div class="zo-fancybox-body">
            <?php if($atts['title_item']):
                echo '<' . $atts['title_element'] . ' class = "zo-fancybox-title">';
                    if($atts['link_title']=='yes'){
                ?>
                    <a href="<?php echo $atts['link_url'] ?>" target="<?php echo $atts['link_target']?>" title="<?php echo $atts['title_item'];?>"><?php echo $atts['title_item'];?></a>
                <?php
                    echo '</' . $atts['title_element'] .'>';
                }else{
                    echo $atts['title_item'];
                    echo '</' . $atts['title_element'] .'>';
                }?>
            <?php endif;?>
            <?php if($atts['content_item']):?>
                <div class="zo-fancybox-content">
                    <?php
                        echo $atts['content_item'];
                    ?>
                    <?php
                        if($atts['link_content']=='yes'){
                            echo '<div class="zo-fancybox-link">';
                            echo '<a href="' . $atts['link_url'] .'" title="'. $atts['title_item'] .'" class="' . $atts['link_class'] .'" target= "' .$atts['link_target'] . '">'. $atts['link_text'] .'</a>';
                            echo '</div>';
                        }
                    ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
