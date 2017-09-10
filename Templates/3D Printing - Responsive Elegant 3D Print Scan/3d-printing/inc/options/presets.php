<?php

/**
 * Array presets.
 * 
 * @return multitype:multitype:string
 * @author Fox
 */
function zo_presets()
{
    return array(
        'primary_color',
        'link_color',
		'btn_primary',
		'menu_color_first_level',
		'menu_color_sub_level',
		'bg_header_top_color',
		'main_logo',
    );
}

/**
 * Load presets script.
 */
add_action('admin_enqueue_scripts', 'zo_presets_scripts');

function zo_presets_scripts()
{
    if (isset($_REQUEST['page']) && $_REQUEST['page'] == '_options') {
        wp_register_script('zosuperheroes-presets', get_template_directory_uri() . '/inc/options/js/presets.js', 'jquery', '1.0.0', TRUE);
        wp_localize_script('zosuperheroes-presets', 'data_presets', zo_presets());
        wp_enqueue_script('zosuperheroes-presets');
    }
}

/**
 * Redux saved.
 * Save options generate presets.
 *
 * @author Fox
 */

add_action("redux/options/smof_data/saved", 'zo_preset_save_options');

function zo_preset_save_options()
{
    global $smof_data;
    
    $theme_info = wp_get_theme();
    
    if (isset($smof_data['presets_color'])) {
        
        $preset_name = "_" . do_shortcode($theme_info->get("TextDomain")) . "_preset_" . do_shortcode($smof_data['presets_color']);
        
        $preset_data = array();
        
        $preset_items = zo_presets();
        foreach ($preset_items as $value) {
            $preset_data[$value] = $smof_data[$value];
        }
        
        $preset_data = json_encode($preset_data);

        /* update options. */
        update_option($preset_name, $preset_data);
    }
}

/**
 * Ajax get preset options.
 *
 * @author Fox
 */

add_action('wp_ajax_zo_get_preset_options', 'zo_get_preset_options_callback');

function zo_get_preset_options_callback()
{
    header('Content-Type: application/json');
    
    $preset = ! empty($_REQUEST['preset']) ? $_REQUEST['preset'] : '0';
    
    $theme_info = wp_get_theme();
    
    $preset = get_option("_" . do_shortcode($theme_info->get("TextDomain")) . "_preset_" . do_shortcode($preset), null);
    
    die($preset);
}
