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
                <a href="<?php echo esc_url($atts['button_link']);?>">
					<?php if($image_url):?>
						<div class="fancybox-icon fancybox-image">
							<img src="<?php echo esc_attr($image_url);?>" alt="<?php echo esc_attr($atts['title_item']);?>" />
						</div>
					<?php else:?>
						<div class="fancybox-icon fancybox-font">
                            <?php
                            if ($atts['link_icon']=='yes'){
                                echo '<a href="' . $atts['link_url'] . '" title="' . $atts['title_item'] . '" target= "' .$atts['link_target'] . '">';
                            }
                            ?>
							<i class="<?php echo esc_attr($iconClass);?>"></i>
                            <?php  if ($atts['link_icon']=='yes'){
                                echo '</a>';
                            } ?>
						</div>
					<?php endif;?>
				</a>
            </div>
            <?php if( isset($atts['content_item']) && $atts['content_item']): ?>
            <div class="fancybox-content">
                <?php if($atts['title_item']):?>
					<a href="<?php echo esc_url($atts['link_url']);?>">
						<h3 class="fancybox-title"><?php echo apply_filters('the_title',$atts['title_item']);?></h3>
					</a>
			    <?php endif;?>

                <?php
                if(!empty($atts['link_text'])) {
                    $str = $atts['content_item'].'<a  class="readmore" href="'.esc_url($atts['link_url']).'">'.esc_html($atts['link_text']).'</a>';

                }
                else {
                    $str =  $atts['content_item'] ;
                }
                echo  apply_filters('the_content',$str);
                ?>

            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
