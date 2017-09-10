<?php
$args = array(
    	'class'=>'',
    	'title'=>'',
    	'subtitle'=>'',
    	'featyretype'=>'',
    	'scheme'=>'',
);
$html = "";
extract(shortcode_atts($args, $atts));
$html .= '<div class="'.$class.' row">';
	$html .= '<div class="col-md-2">';
		if($title != '') { 
		$html .= '<h4 class="bold-title">'.$title.'</h4>';
		}
	$html .= '</div>';	
	$html .= '<div class="col-md-10">';
	    $html .= '<div class="piechart-holder animaper">';
	        $html .= '<div class="row">';
				$html .= do_shortcode($content);
			$html .= '</div>';
		$html .= '</div>';	
    $html .= '</div>';	
$html .= '</div>';
echo $html;