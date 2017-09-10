<?php
$args = array(
		'class'=>'',
		'img_url'=>'',
		'prt_url'=>'',
);
extract(shortcode_atts($args, $atts));
$html = '';
		$cooper_back_image ="";
            if($img_url != '' || $img_url != ' ') { 
	            $cooper_back_image = wp_get_attachment_image_src( $img_url, 'full');
            }
    $html .= '<li class="'.$class.'">';
		$html .= '<a href="'.$prt_url.'" target="_blank"><span><img class="respimg" src="'.$cooper_back_image[0].'" alt=""></span></a>';
	$html .= '</li>';
echo $html;