<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $zo_fancybox_style = isset($atts['zo_fancybox_style']) ? $atts['zo_fancybox_style'] : '';
?>
<div class="zo-fancyboxes-wraper <?php echo esc_attr($zo_fancybox_style); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-fancyboxes-body">
        <div class="zo-fancybox-item">
            <?php
            $image_url = '';
            if (!empty($atts['image'])) {
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
                $image_url = $attachment_image[0];
            }
            ?>
            <div class="fancybox-header">
                <?php if($image_url){?>
                    <div class="fancybox-icon fancybox-image">
                        <img src="<?php echo esc_attr($image_url);?>" alt="<?php echo esc_attr($atts['title_item']); ?>"/>
                        <div class="fancybox-image-overlay">
                            <?php if(!empty($atts['button_link'])){?>
                                <a href="<?php echo esc_url($atts['button_link']);?>" title="<?php echo apply_filters('the_title',$atts['title_item']);?>">
                                    <i class="fa fa-circle-o"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } elseif(!empty($iconClass)){?>
                    <div class="fancybox-icon fancybox-font">
                        <i class="<?php echo esc_attr($iconClass);?>"></i>
                    </div>
                <?php }?>
            </div>
            <?php if( isset($atts['content_item']) && $atts['content_item']): ?>
            <div class="fancybox-content">
                <?php if($atts['title_item']):?>
				    <h3 class="fancybox-title"><?php echo apply_filters('the_title',$atts['title_item']);?></h3>
			    <?php endif;?>
                <?php if($atts['content_item']):?>
				    <p class="fancybox-description"><?php echo apply_filters('the_description',$atts['content_item']);?></p>
			    <?php endif;?>
                <?php if(!empty($atts['button_link']) && !empty($atts['button_text'])){?>
                    <a href="<?php echo esc_url($atts['button_link']);?>" class="btn-link"><?php echo esc_attr($atts['button_text']);?></a>
                <?php } ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
