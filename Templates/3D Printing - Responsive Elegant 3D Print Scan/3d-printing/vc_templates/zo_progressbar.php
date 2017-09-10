
<?php
$item_title     = $atts['item_title'];
$icon           = $atts['icon'];
$show_value     = $atts['show_value'];
$value          = $atts['value'];
$value_suffix   = $atts['value_suffix'];
$bg_color       = $atts['bg_color'];
$color          = $atts['color'];
$width          = $atts['width'];
$height         = $atts['height'];
$border_radius  = $atts['border_radius'];
$vertical       = ($atts['mode']=='vertical')?true:false;
$striped        = ($atts['striped']=='yes')?true:false;
echo '<style type="text/css" data-type="zo-progress-custom-css">';
echo '#' . esc_attr($atts['html_id']) . '{';
	if(!empty($width)){echo 'width:' . esc_attr($width) . ';';}
echo '}';
echo '#' . esc_attr($atts['html_id']) . ' .zo-progress{';
if(!empty($bg_color)){ echo 'background-color:' . esc_attr($bg_color) . ';';}
if(!empty($width)){echo 'width:' . esc_attr($width) . ';';}
if(!empty($height)){echo 'height:' . esc_attr($height) . ';';}
if(!empty($border_radius)){echo 'border-radius:' . esc_attr($border_radius) . ';';}
echo '}';
echo '#' . esc_attr($atts['html_id']) . ' .progress-bar{';
if(!empty($color)){echo 'background-color:' . esc_attr($color) . ';';}
echo "}";
echo '#' . esc_attr($atts['html_id']) . ' .zo-progress-icon{';
    echo 'text-align:' . $atts['icon_align'] . ';';
    if(!empty($atts['icon_font_size'])){echo 'font-size:' . $atts['icon_font_size'] . 'px;';}
    if(!empty($atts['icon_color'])){ echo 'color:' . $atts['icon_color'] . ';';}
echo "}";
echo '#' . esc_attr($atts['html_id']) . ' .zo-progress-title{';
    echo 'text-align:' . $atts['align'] . ';';
echo "}";
echo '#' . esc_attr($atts['html_id']) . ' .progress-bar{';
if(!empty($color)){echo 'background-color:' . esc_attr($color) . ';';}
echo "}";
echo '</style>';
?>
<div class="zo-progress-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($icon):?>
        <div class="zo-progress-icon">
            <i class="<?php echo esc_attr($icon);?>"></i>
        </div>
    <?php endif;?>
    <?php if($item_title):?>
		<?php
			echo '<' . $atts['element'] . ' class="zo-progress-title">';
			echo apply_filters('the_title',$item_title);
			echo '</' . $atts['element'] . '>';
		?>
    <?php endif;?>
    <?php if($show_value): ?>
        <div class="progress-bar-value" style="left: calc( <?php echo esc_attr($value); ?>% - 20px );"><?php echo esc_attr($value);?><span><?php echo $value_suffix;?></span></div>
    <?php endif; ?>
    <div class="zo-progress progress<?php if($vertical){ echo ' vertical bottom'; } ?> <?php if($striped){echo ' progress-striped';}?>">
        <div id="item-<?php echo esc_attr($atts['html_id']); ?>"
            class="progress-bar" role="progressbar"
            data-valuetransitiongoal="<?php echo esc_attr($value); ?>">
        </div>
    </div>
</div>
