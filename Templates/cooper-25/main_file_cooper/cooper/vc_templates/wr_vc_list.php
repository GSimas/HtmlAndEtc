<?php
$args = array(
		'class'=>'',
		'title'=>'',					
		'counter_num'=>'',						
);
extract(shortcode_atts($args, $atts));
$html = '';    
    $html .= '<div class="piechart col-md-4 '.$class.'" >';
        $html .= '<span class="chart" data-percent="'.$counter_num.'">';
            $html .= '<span class="percent"></span>';
        $html .= '</span>';
        $html .= '<div class="clearfix"></div>';
        $html .= '<div class="skills-description">';
	        $html .= '<h4>'.$title.'</h4>';	    
	    $html .= '</div>';
	$html .= '</div>';
echo $html;