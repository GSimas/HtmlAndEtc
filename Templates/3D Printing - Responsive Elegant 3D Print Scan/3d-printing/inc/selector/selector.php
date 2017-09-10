<?php 
function zo_presets_selector_scripts(){

	wp_enqueue_script('zo-jquery-cookie', get_template_directory_uri()  . '/inc/selector/js/jquery_cookie.min.js', array( 'jquery' ), '1.4.0', true);
	wp_localize_script('zo-jquery-cookie', 'ZOPreset', array('theme_url' => get_template_directory_uri()) );
	wp_enqueue_script('zo-selector-script', get_template_directory_uri() . '/inc/selector/js/presets.js', array( 'jquery' ), '1.4.0', true);
	wp_enqueue_style('zo-selector-style', get_template_directory_uri() . '/inc/selector/css/presets.css');
}
add_action( 'wp_enqueue_scripts', 'zo_presets_selector_scripts' );

function zo_presets_selector() {
	global $smof_data, $zo_meta;
	
	$presets_color = !empty($smof_data['presets_color']) ? $smof_data['presets_color'] : 0;
	if(isset($zo_meta->_zo_presets_color) && $zo_meta->_zo_presets_color){
		$presets_color = $zo_meta->_zo_presets_color;
	}
	$body_layout = $smof_data['body_layout'];
	if (isset($_COOKIE['body_layout'])) {
		$body_layout = $_COOKIE['body_layout'];
	}
	$arr_color = array(
		'0' => '#0d6cbe', '1' => '#FF4421', '2' => '#0DACA8', '3' => '#DAAE19', '4' => '#947EC7', '5' => '#FD6804'
	);//#ff4421 ; #3f56b4 ; #0daca8 ; #daae19 ; #947ec7 ; #fd6804
?>
<div id="style_selector">
	<div class="style-toggle close" style="background: <?php echo esc_attr($arr_color[$presets_color]);?>;"><i class="fa fa-2x fa-spin fa-cog"></i></div>
	<div id="style_selector_container">
        <div class="box-title"><?php esc_html_e('Predefined Color Schemes', 'cardealer'); ?></div>
        <div class="predefined">
            <a href="javascript:void(0);" class="preset0 <?php echo ($presets_color=='0')?'active':'';?>" id="0" data-color="#0d6cbe"></a>								
            <a href="javascript:void(0);" class="preset1 <?php echo ($presets_color=='1')?'active':'';?>" id="1" data-color="#FF4421"></a>
            <a href="javascript:void(0);" class="preset2 <?php echo ($presets_color=='2')?'active':'';?>" id="2" data-color="#0DACA8"></a>
            <a href="javascript:void(0);" class="preset3 <?php echo ($presets_color=='3')?'active':'';?>" id="3" data-color="#DAAE19"></a>
            <a href="javascript:void(0);" class="preset4 <?php echo ($presets_color=='4')?'active':'';?>" id="4" data-color="#947EC7"></a>
            <a href="javascript:void(0);" class="preset5 <?php echo ($presets_color=='5')?'active':'';?>" id="5" data-color="#FD6804"></a>
        </div>
	    <div class="box-title"><?php esc_html_e('Choose Your Layout Style', 'cardealer'); ?></div>
	    <div class="input-box">
		    <div class="input">
			    <select name="layout" class="layout">
				    <option value="0" <?php if( $body_layout == 0 ) echo "selected"; ?>><?php esc_html_e('Wide', 'cardealer'); ?></option>
				    <option  value="1" <?php if( $body_layout == 1 ) echo "selected"; ?>><?php esc_html_e('Boxed', 'cardealer'); ?></option>
			    </select>
		    </div>
	    </div>
    </div>
</div>
<?php 
}