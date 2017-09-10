<?php
$output = $title = $tab_id = '';
extract(shortcode_atts($this->predefined_atts, $atts));

wp_enqueue_script('jquery_ui_tabs_rotate');

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tab-content', $this->settings['base']);
$output .= "\n\t\t\t" . '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="'.$css_class.'">';
$output .= ($content=='' || $content==' ') ? esc_attr__("Empty section. Edit page to add content here.", "cooper") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment('.wpb_tab');

echo $output;