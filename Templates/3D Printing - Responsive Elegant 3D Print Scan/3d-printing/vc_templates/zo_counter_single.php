<?php
    $button = '';
    echo '<style type="text/css" data-type="zo-heading-custom-css">';
    /* Custom style Icon */
    echo '#' . esc_attr($atts['html_id']) . ' .zo-counter-title{';
    echo 'text-align: ' . $atts['align'] . ';';
    if(!empty($atts['font_size']) && is_numeric($atts['font_size'])){
        echo 'font-size:' . $atts['font_size'] . 'px;';
    }
    if(!empty($atts['line_height']) && is_numeric($atts['line_height'])){
        echo 'line-height:' . $atts['line_height'] . 'px;';
    }
    echo '}';

    if(!empty($atts['counter_content'])){
        echo '#' . esc_attr($atts['html_id']) . ' .zo-counter-content{';
        echo 'text-align: ' . $atts['align'] . ';';
        echo '}';
    }
    echo '</style>';
?>
<div class="zo-counter-wraper <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php
    $title = isset($atts['title']) ? $atts['title'] : '';
    $icon = isset($atts["icon_" . $atts['icon_type']]) ? $atts["icon_" . $atts['icon_type']] : '';
    $type = isset($atts['type']) ? $atts['type'] : '';
    $suffix = isset($atts['suffix']) ? $atts['suffix'] : '';
    $prefix = isset($atts['prefix']) ? $atts['prefix'] : '';
    $digit = isset($atts['digit']) ? $atts['digit'] : '69';
    $grouping = isset($atts['grouping']) ? $atts['grouping'] : 'false';
    $separator = isset($atts['separator']) ? $atts['separator'] : ',';
    $counter_content = isset($atts['counter_content']) ? $atts['counter_content'] : '';
    ?>
    <div class="zo-counter-item">
        <?php if ($icon): ?>
            <span class="zo-counter-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span>
        <?php endif; ?>
        <?php if ($title):
            echo '<' . $atts['element'] . ' class="zo-counter-title">' . apply_filters("the_title", $title) . '</' . $atts['element'] . '>';
        endif; ?>
        <div id="counter_<?php echo esc_attr($atts['html_id'] . '_item_'); ?>"
             class="zo-counter <?php echo esc_attr(strtolower($type)); ?>"
             data-prefix="<?php echo esc_attr($prefix); ?>" data-suffix="<?php echo esc_attr($suffix); ?>"
             data-type="<?php echo esc_attr(strtolower($type)); ?>" data-digit="<?php echo esc_attr($digit); ?>"
             data-grouping="<?php echo esc_attr($grouping); ?>"
             data-separator="<?php echo esc_attr($separator); ?>">
        </div>
        <?php if ($counter_content): ?>
            <div class="zo-counter-content"><?php echo apply_filters('the_content', $counter_content); ?></div>
        <?php endif; ?>
    </div>
</div>
