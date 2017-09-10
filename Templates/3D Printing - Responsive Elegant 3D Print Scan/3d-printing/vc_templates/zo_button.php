<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $button = '';
    echo '<style type="text/css" data-type="zo-button-custom-css">';
    echo '#' . esc_attr($atts['html_id']) . '{';
    echo 'text-align: ' . $atts['align'] . ';';
    echo '}';
    echo '#' . esc_attr($atts['html_id']) . ' .zo-button {';
    if(!empty($atts['padding_top']) && is_numeric($atts['padding_top'])){
        echo 'padding-top: ' . esc_attr($atts['padding_top']) . 'px;';
    }
    if(!empty($atts['padding_right']) && is_numeric($atts['padding_right'])){
        echo 'padding-right: ' . esc_attr($atts['padding_right']) . 'px;';
    }
    if(!empty($atts['padding_bottom']) && is_numeric($atts['padding_bottom'])){
        echo 'padding-bottom: ' . esc_attr($atts['padding_bottom']) . 'px;';
    }
    if(!empty($atts['padding_left']) && is_numeric($atts['padding_left'])){
        echo 'padding-left: ' . esc_attr($atts['padding_left']) . 'px;';
    }
    echo '}';
    echo '</style>';
?>
<div class="zo-button-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    if($atts['is_icon']=='yes'){
        if($atts['icon_align']=='left'){
            $atts['text'] = '<i class="' . esc_attr($iconClass) . '"></i>' . $atts['text'];
        }else{
            $atts['text'] .= '<i class="' . esc_attr($iconClass) . '"></i>';
        }
    }
    if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
        $link = zo_build_link( $atts['link'] );
        $button = '<a href="' . esc_attr( $link['url'] ) . '"'
            . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
            . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
            . ' class="zo-button ' . $atts['class'] . ' ' . $atts['button_style'] . '"'
            . '>' . $atts['text'] . '</a>';
    }else{
        $button = '<button'
            . ' class="zo-button ' . $atts['class'] . ' ' . $atts['button_style'] . '"'
            . '>' . $atts['text'] . '</button>';
    }
    echo $button;
    ?>
</div>
