<?php
/**
 * Meta Options Core
 *
 * @author ZoTheme
 * @version 1.0.1
 */
global $core_options;

$core_options = new ZoCoreControl();

function zo_options($params = array())
{
    global $pagenow, $core_options;

    wp_enqueue_style('core-options');

    $tem_div = array('div','span','div');
    $tem_table = array('tr','th','td');
    /* Find Type */
    if (is_admin() && !empty($params['id']) && isset($core_options)) {
        /* Taxonomys */
        if($pagenow == 'edit-tags.php'){
            global $tag;

            $t_id = $tag->term_id;
            $cat_meta = get_option("category_$t_id");
            // get value
            if(!empty($cat_meta[$params['id']])){
                $params['value'] = $cat_meta[$params['id']];
            }
            // render id
            $params['id'] = "Cat_meta[".$params['id']."]";

            $core_options->taxonomy($params);
        }
        /* Post or Page */
        elseif ($pagenow=='post-new.php' || $pagenow=='post.php'){
            global $post;
            /* Get zo meta data opject */
            $zo_meta = json_decode(get_post_meta($post->ID, '_zo_meta_data', true));
            /*
            if(!empty($zo_meta)){
                foreach ($zo_meta as $key => $meta){
                    $zo_meta->$key = rawurldecode($meta);
                }
            }
            */
            // Render params id
            $params['id'] = "_zo_".$params['id'];
            // Get value
            if(isset($zo_meta->$params['id'])){
                $params['value'] = $zo_meta->$params['id'];
            } else {
                $params['value'] = null;
            }
            $core_options->metabox($params);
        }
    } else {
        _e('Error', '3dprinting');
    }
    wp_enqueue_script('core-options');
}

class ZoCoreControl
{

    function __construct()
    {
        add_action('admin_enqueue_scripts', array(
            $this,
            'Scripts'
        ));
        add_action('save_post', array($this, 'save_meta_boxes'));
    }
    /* script */
    function Scripts()
    {
        wp_enqueue_style('thickbox');
        wp_enqueue_media();
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');

        wp_register_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.1.0');
        wp_register_style('font-ionicons', get_template_directory_uri().'/assets/css/ionicons.min.css', array(), '1.5.2');
        wp_register_style('jquery-datetimepicker', get_template_directory_uri().'/inc/metacore/assets/css/jquery.datetimepicker.css');
        wp_register_style('jquery-minicolors', get_template_directory_uri() . '/inc/metacore/assets/css/jquery.minicolors.css');
        wp_register_style('core-options', get_template_directory_uri() . '/inc/metacore/assets/css/core.options.css');
        wp_register_style('jquery.nouislider', get_template_directory_uri() . '/inc/metacore/assets/css/jquery.nouislider.css');
        wp_register_style('jquery.nouislider.pips', get_template_directory_uri() . '/inc/metacore/assets/css/jquery.nouislider.pips.css');

        wp_register_script('jquery-datetimepicker', get_template_directory_uri() . '/inc/metacore/assets/js/jquery.datetimepicker.js');
        wp_register_script('jquery-minicolors', get_template_directory_uri() . '/inc/metacore/assets/js/jquery.minicolors.js');
        wp_register_script('media-selector', get_template_directory_uri() . '/inc/metacore/assets/js/media.selector.js');
        wp_register_script('jquery.nouislider', get_template_directory_uri() . '/inc/metacore/assets/js/jquery.nouislider.all.js');
        wp_register_script('icons-class', get_template_directory_uri() . '/inc/metacore/assets/js/icons.class.js');
        wp_register_script('upload', get_template_directory_uri().'/inc/metacore/assets/js/upload.js');
		/* LN edit */
		wp_register_style( 'css.ui',  get_template_directory_uri().'/assets/css/jquery-ui.css');
		wp_register_script( 'jquery.ui.min',  get_template_directory_uri().'/assets/js/jquery-ui.min.js', array('jquery') );
        wp_register_script('jquery-base64', get_template_directory_uri() . '/assets/js/jquery.base64.min.js', array('jquery'));
        wp_register_script('core-options', get_template_directory_uri() . '/inc/metacore/assets/js/core.options.js');
    }
    private function renderType($params){
        if(isset($params['type'])){
            switch ($params['type']){
                case 'text':
                    return $this->text($params);
                    break;
                case 'color':
                    return $this->color($params);
                    break;
                case 'switch':
                    return $this->xswitch($params);
                    break;
                case 'icon':
                    return $this->icon($params);
                    break;
                case 'image':
                    $params['field'] = 'single';
                    return $this->images($params);
                    break;
                case 'images':
                    $params['field'] = 'multiple';
                    return $this->images($params);
                    break;
                case 'file':
                    return $this->file($params);
                case 'textarea':
                    return $this->textarea($params);
                    break;
                case 'select':
                    return $this->select($params);
                    break;
                case 'imegesselect':
                    return $this->imegesselect($params);
                    break;
                case 'multiple':
                    return $this->multiple($params);
                    break;
                case 'slider':
                    return $this->slider($params);
                    break;
                case 'date':
                    $params['field'] = 'date';
                    return $this->datetime($params);
                    break;
                case 'time':
                    $params['field'] = 'time';
                    return $this->datetime($params);
                    break;
                case 'datetime':
                    $params['field'] = '';
                    return $this->datetime($params);
                    break;
                case 'number':
                    return $this->number($params);
                    break;
                case 'editor':
                    return $this->editor($params);
                    break;
				/* LN edit Social */
                case 'social':
                    return $this->social($params);
                    break;
            }
        }
    }
    private function text($params)
    {
        ob_start();
        ?>
        <div class="text-field csfield">
        <?php
        $indent = '';
        if(!empty($params['icon'])){
            $indent = 'text-indent';
            echo '<i class="'.$params['icon'].'"></i>';
        }
        ?>
	    <input type="text"
	    name="<?php echo esc_attr($params['id']); ?>"
		id="<?php echo esc_attr($params['id']); ?>"
		class="xvalue <?php echo esc_attr($indent); ?>"
		value="<?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?>"
		placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>" />
        </div>
        <?php
        return ob_get_clean();
    }
    private function textarea($params)
    {
        ob_start();
        ?>
        <div class="area-field csfield">
	    <textarea<?php if(isset($params['rows'])){ echo 'rows="', $params['rows'] ,'"'; }if(isset($params['cols'])){ echo ' cols="', $params['cols'] ,'"'; } ?>
	    name="<?php echo esc_attr($params['id']); ?>"
		id="<?php echo esc_attr($params['id']); ?>"
		placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>"><?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?></textarea>
        </div>
        <?php
        return ob_get_clean();
    }
    private function select($params)
    {
        ob_start();
        ?>
        <div class="select-field csfield">
        <select name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>">
        	<?php foreach ($params['options'] as $key => $option): ?>
        		<option value="<?php echo esc_attr($key); ?>" <?php if(isset($params['value']) && ($params['value'] == $key)){ echo "selected"; } ?>><?php echo esc_attr($option); ?></option>
        	<?php endforeach; ?>
        </select>
        </div>
	    <?php
        return ob_get_clean();
    }
    private function imegesselect($params){
        ob_start();
        ?>
        <div class="image-field csfield clearfix">
            <ul>
                <?php foreach ($params['options'] as $key => $image): ?>
                <li data-value="<?php echo esc_attr($key); ?>" class="<?php if($params['value'] == $key) { echo 'active'; } ?>"><img alt="" src="<?php echo esc_url($image) ?>"></li>
                <?php endforeach; ?>
            </ul>
            <input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="xvalue" value="<?php echo esc_attr($params['value']); ?>"/>
        </div>
	    <?php
        return ob_get_clean();
    }
    private function multiple($params){
        ob_start();
        $selected = array();
        if(!empty($params['value'])){
            $selected = explode(',', $params['value']);
        }
        ?>
        <div class="multiple-field">
        <select multiple="multiple">
        	<?php foreach ($params['options'] as $key => $option): ?>
        		<option value="<?php echo esc_attr($key); ?>" <?php if(in_array($key, $selected)){ echo 'selected="selected"'; } ?>><?php echo esc_attr($option); ?></option>
        	<?php endforeach; ?>
        </select>
    	<input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" value="<?php echo implode(",", $selected); ?>"/>
	    </div>
        <?php
        return ob_get_clean();
    }
    private function slider($params){
        wp_enqueue_style('jquery.nouislider.pips');
        wp_enqueue_style('jquery.nouislider');
        wp_enqueue_script('jquery.nouislider');
        $value = '';
        if(isset($params['value'])){
            $value = $params['value'];
        }
        if(!isset($params['max'])){
            $params['max'] = 0;
        }
        if(!isset($params['min'])){
            $params['min'] = 100;
        }
        ob_start();
        ?>
            <div class="slider-field xfield">
                <div class="slider-main">
                    <div class="slider-item" data-start="<?php echo esc_attr($value); ?>" data-max="<?php echo esc_attr($params['max']); ?>" data-min="<?php echo esc_attr($params['min']); ?>"></div>
                    <div class="slider-max">
                        <span class="curent"></span>
                        <span class="unit"><?php if(isset($params['unit'])){ echo esc_attr($params['unit']); } ?></span>
                    </div>
                </div>
                <input type="hidden"
        	    name="<?php echo esc_attr($params['id']); ?>"
        		id="<?php echo esc_attr($params['id']); ?>"
        		class="xvalue"
        		value="<?php echo esc_attr($value); ?>"/>
            </div>
            <?php
            return ob_get_clean();
    }
    private function color($params){
        wp_enqueue_style('jquery-minicolors');
        wp_enqueue_script('jquery-minicolors');
        $data = '';
        if(isset($params['rgba']) && $params['rgba']){
            if(!empty($params['value'])){
                $params['value'] = $this->hex2rgb($params['value']);
                $data .= 'data-hex="'.$this->rgb2hex($params['value']).'"';
            }
            $data .= ' data-rgba="true"';
        }
        ob_start();
        ?>
        <div class="color-field csfield" <?php echo ''.$data; ?>>
            <input type="text"
            name="<?php echo esc_attr($params['id']); ?>"
            id="<?php echo esc_attr($params['id']); ?>"
            class="xvalue"
            value="<?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?>"
            placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>" />
        </div>
        <?php
        return ob_get_clean();
    }
    private function xswitch($params){
        $options = array('on' => 'on', 'off' => 'off');
        /** custom values */
        if(!empty($params['options'])){
            $options = $params['options'];
        }
        /** data follow */
        $data = array(' ');
        if(!empty($params['follow'])){
            $data[] = 'data-follow="'.rawurlencode(json_encode($params['follow'])).'"';
        }
        $data[] = 'data-on="'.$options['on'].'"';
        $data[] = 'data-off="'.$options['off'].'"';
        ob_start();
        ?>
        <div class="switch-field csfield<?php if($params['value'] == $options['on']){ echo ' on'; } else { echo ' off'; } ?>"<?php echo implode(' ', $data); ?>>
            <span></span>
            <input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="xvalue" value="<?php echo esc_attr($params['value']); ?>"/>
        </div>
        <?php
        return ob_get_clean();
    }
    private function icon($params){
        add_thickbox();
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('font-ionicons');
        wp_enqueue_script('icons-class');
        ob_start();
        ?>
        <div class="icon-field">
            <input type="text" style="width: 170px;" class="thickbox" alt="#TB_inline?amp;inlineId=field_icon" title=""
            name="<?php echo esc_attr($params['id']); ?>"
            id="<?php echo esc_attr($params['id']); ?>"
            value="<?php if(isset($params['value'])){ echo esc_attr($params['value']);} ?>"
            placeholder="<?php if(isset($params['placeholder'])){ echo esc_attr($params['placeholder']);} ?>" />
            <i class="<?php echo esc_attr($params['value']); ?>"></i>
        </div>
        <?php
        return ob_get_clean();
    }
    private function images($params){
        //render type ( single, multiple )
        wp_enqueue_script('media-selector');
        $selected = array();
        if(!empty($params['value'])){
            $selected = explode(',', $params['value']);
        }
        ob_start();
        ?>
        <div class="images-field clearfix">
            <ul data-type="<?php echo esc_attr($params['field']); ?>">
            <?php
            foreach ($selected as $value):
                $attachment_image = wp_get_attachment_image_src($value,'thumbnail');
                if (count($attachment_image) > 0):?>
                <li class="items" data-id="<?php echo esc_attr($value); ?>" style="background-image:url(<?php echo esc_url($attachment_image[0]);?>);background-size:cover;">
                    <i class="edit dashicons dashicons-plus-alt" title="<?php _e('Replace Image', '3dprinting'); ?>"></i>
                    <i class="remove dashicons dashicons-dismiss" title="<?php _e('Remove Image', '3dprinting'); ?>"></i>
                </li>
            <?php endif; endforeach; ?>
            <?php if($params['field'] != 'single'): ?>
                <li class="items" data-id=""><i class="add dashicons dashicons-plus-alt" title="<?php _e('Add Image', '3dprinting'); ?>"></i></li>
            <?php elseif(count($selected) == 0): ?>
                <li class="items" data-id=""><i class="add dashicons dashicons-plus-alt" title="<?php _e('Add Image', '3dprinting'); ?>"></i></li>
            <?php endif; ?>
            </ul>
            <input type="hidden" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" value="<?php echo  implode(",", $selected); ?>"/>
        </div>
        <?php
        return ob_get_clean();
    }
    private function file($params){
        wp_enqueue_script('upload');
        ob_start();
        ?>
        <div class="file-field csfield">
    		<input name="<?php echo esc_attr($params['id']); ?>" class="upload_field" id="<?php echo esc_attr($params['id']); ?>" type="text" value="<?php if(!empty($params['value'])){ echo esc_attr($params['value']);} ?>" placeholder="<?php echo esc_attr($params['placeholder']); ?>"/>
    		<input class="zo_upload_button button button-primary" type="button" value="Browse" />
    		<input data-id="<?php echo esc_attr($params['id']); ?>" class="zo_clear_button button button-danger" type="button" value="Clear" />
        </div>
        <?php
        return ob_get_clean();
    }
    private function datetime($params){
        wp_enqueue_style('jquery-datetimepicker');
        wp_enqueue_script('jquery-datetimepicker');
        if(empty($params['placeholder']) && !empty($params['format'])){
            $params['placeholder'] = $params['format'];
        }
        ob_start();
        ?>
            <div class="date-field" data-type="<?php echo esc_attr($params['field']); ?>" data-format="<?php if(!empty($params['format'])){ echo esc_attr($params['format']); } else { echo 'm/d/Y'; } ?>">
                <?php switch ($params['field']){
                    case 'date':
                        echo '<i class="fa fa-calendar-o"></i>';
                        break;
                    case 'time':
                        echo '<i class="fa fa-clock-o"></i>';
                        break;
                    default:
                        echo '<i class="fa fa-calendar"></i>';
                        break;
                } ?>
                <input type="text" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="text-indent xvalue" value="<?php if(!empty($params['value'])){ echo esc_attr($params['value']);} ?>" placeholder="<?php echo esc_attr($params['placeholder']); ?>"/>
            </div>
            <?php
            return ob_get_clean();
    }
    private function number($params){
        ob_start();
        ?>
        <div class="number-field csfield">
            <div>
                <i class="fa fa-caret-up"></i>
                <i class="fa fa-caret-down"></i>
            </div>
            <input type="text" name="<?php echo esc_attr($params['id']); ?>" id="<?php echo esc_attr($params['id']); ?>" class="text-indent xvalue" value="<?php echo esc_attr($params['value']); ?>"/>
            <?php if(!empty($params['format'])): ?>
            <span class="follow-right"><?php echo esc_attr($params['format']); ?></span>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
    private function editor($params){
        $content = '';
        if(isset($params['value'])){
            $content = $params['value'];
        }
        ob_start();
        ?>
        <div class="editor-field">
           <?php wp_editor(urldecode($content), $params['id'], array()); ?>
        </div>
        <?php
        return ob_get_clean();
    }
	/* LN edit Social*/
    private function social($params){
        $content = '';
        if(isset($params['value'])){
            $content = $params['value'];
        }
		$zo_social_team = json_decode($content);
		wp_enqueue_style('css.ui');
		wp_enqueue_script('jquery.ui.min');
        ob_start();
        ?>
		<table class="wp-list-table widefat fixed pages zo_social_team">
			<thead>
				<tr>
					<th><?php _e('Title', '3dprinting');?></th>
					<th><?php _e('Link', '3dprinting');?></th>
					<th><?php _e('Icon class', '3dprinting');?></th>
					<th><?php _e('Actions', '3dprinting');?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td>
						<input placeholder="Enter title" type="text" name="title"/>
					</td>
					<td>
						<input placeholder="Enter link" type="text" name="link"/>
					</td>
					<td>
						<input placeholder="Enter icon class" type="text" name="icon"/>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">
						<a class="button-primary" id="btn_add_social" href="javascript:void(0);"><?php _e('Add new', '3dprinting');?></a>
					</td>
				</tr>
			</tfoot>
			<tbody  id="the-list">
				<?php
					if(count($zo_social_team)):
						foreach($zo_social_team as $k=>$v): ?>
						<tr>
							<td class="title"><?php echo do_shortcode($v->title); ?></td>
							<td class="link"><?php echo do_shortcode($v->link); ?></td>
							<td class="icon"><?php echo do_shortcode($v->icon); ?></td>
							<td><a title="Click to edit this item" href="javascript:void(0)" class="zo_social"><?php _e('Edit', '3dprinting')?></a>|<a class="zo_social_remove" href="javascript:void(0)"><?php _e('Remove', '3dprinting')?></a></td>
						</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td class="zo_no_item" colspan="3"><?php _e('No item!', '3dprinting');?></td>
						</tr>
					<?php endif;
				?>
			</tbody>
		</table>
		<div class="edit_dialog_wrap" style="display: none;">
			<div id="edit_dialog">
				<table class="widefat fixed pages tb_woo_countries">
					<thead>
						<tr>
							<th><?php _e('Title', '3dprinting');?></th>
							<th><?php _e('Link', '3dprinting');?></th>
							<th><?php _e('Icon', '3dprinting');?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="title_edit" type="text" /></td>
							<td><input class="link_edit" type="text" /></td>
							<td><input class="icon_edit" type="text" /></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
        <div class="social-field csfield">
            <input type="hidden" name="_zo_socials" id="_zo_socials" class="xvalue" value="<?php echo esc_attr($content); ?>"/>
        </div>
        <?php
        return ob_get_clean();
    }
    /** Convert HEX to RGB(A) */
    public function hex2rgb( $hex, $opacity = 1 ) {
        if(strpos('#', $hex)){
            $hex = str_replace("#",null, $hex);
            $color = array();
            if(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
                $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
                $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
                $color['a'] = $opacity;
            }
            else if(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
                $color['a'] = $opacity;
            }
            if(!empty($color)){
                return 'rgba('.implode(',', $color).')';
            } else {
                return  false;
            }
        } else {
            return $hex;
        }
    }
    /** Convert RGB(A) to HEX */
    public function rgb2hex( $rgba ) {
        $rgba = trim(str_replace(' ', '', $rgba));
        if (stripos($rgba, 'rgba') !== false) {
            $res = sscanf($rgba, "rgba(%d, %d, %d, %f)");
        }
        else {
            $res = sscanf($rgba, "rgb(%d, %d, %d)");
            $res[] = 1;
        }
        $res = array_combine(array('r', 'g', 'b', 'a'), $res);
        if($res){
            if($res['r'] != null && $res['g'] != null && $res['b'] != null){
                return '#'.dechex($res['r']).dechex($res['g']).dechex($res['b']);
            } else {
                return $rgba;
            }
        } else {
            return false;
        }

    }
    /* Template */
    public function metabox($params){
        ob_start();
        ?>
		<div id="zo_metabox_field_<?php echo esc_attr($params['id']); ?>" class="zo_metabox_field clearfix vc_row">
		  <?php if(isset($params['label'])): ?>
            <div class="vc_col-sm-4">
		    <label class="field-title" for="<?php echo esc_attr($params['id']); ?>"><?php echo esc_attr($params['label']); ?></label>
              <?php if(isset($params['desc'])): ?>
              <p class="field-desc"><?php echo esc_attr($params['desc']); ?></p>
              <?php endif; ?>
            </div>
	      <?php endif; ?>
	      <div class="vc_col-sm-8 field<?php if(isset($params['class'])){ echo ' class="'.$params['class'].'"'; } ?>">
	          <?php echo ''.$this->renderType($params); ?>
	      </div>
		</div>
        <?php
        echo ob_get_clean();
    }
    public function taxonomy($params){
        ob_start();
        ?>
        <tr class="form-field">
        	<th scope="row" valign="top">
        	   <label class="field-title" for="<?php echo esc_attr($params['id']); ?>"><?php if(isset($params['label'])){ echo esc_attr($params['label']);} ?></label>
        	</th>
        	<td<?php if(isset($params['class'])){ echo ' class="'.$params['class'].'"'; } ?>>
               <?php echo ''.$this->renderType($params); ?>
               <br />
        	   <span class="description"><?php if(isset($params['desc'])){ echo esc_attr($params['desc']);} ?></span>
        	</td>
        </tr>
        <?php
        echo ob_get_clean();
    }
    /**
     * Save post update ZO data.
     *
     * @param int $post_id
     *
     * @return none
     */
    public function save_meta_boxes($post_id)
	{
	    /* doing save. */
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		/* array zo meta */
        $zo_meta = array();
        /* find zo meta key. */
		foreach($_POST as $key => $value) {
			if(strstr($key, '_zo_')) {
			    $zo_meta[$key] = $value;
			}
		}
		/* update _zo_meta_data. */
        if(!empty($zo_meta)){
		    update_post_meta($post_id, '_zo_meta_data', str_replace("\\\'","\\'",json_encode($zo_meta)));
		}
	}
}
