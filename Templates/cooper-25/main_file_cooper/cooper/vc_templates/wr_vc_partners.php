<?php
$args = array(
    	'class'=>'',
);
$html = "";
extract(shortcode_atts($args, $atts));
$html .= '<div class="'.$class.' clients-list fl-wrap">';
	$html .= '<ul>';
		$html .= do_shortcode($content);
	$html .= '</ul>';
$html .= '</div>';
echo $html;