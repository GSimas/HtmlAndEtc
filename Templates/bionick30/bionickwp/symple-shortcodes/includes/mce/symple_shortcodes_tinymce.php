<?php
/**
 */
class SYMPLE_TinyMCE_Buttons {
	// Hooks your functions into the correct filters
function __construct() {
add_action('admin_head', array(&$this,'my_add_mce_button'));
}
function my_add_mce_button() {

    // check user permissions

    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {

        return;

    }

    // check if WYSIWYG is enabled

    if ( 'true' == get_user_option( 'rich_editing' ) ) {

        add_filter( 'mce_external_plugins',  array(&$this,'my_add_tinymce_plugin') );

        add_filter( 'mce_buttons',  array(&$this,'my_register_mce_button') );

    }

}


 

// Declare script for new button

function my_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['my_mce_button'] = get_template_directory_uri() .'/symple-shortcodes/includes/mce/js/symple_shortcodes_tinymceq.js';

    return $plugin_array;

}

 

// Register new button in the editor

function my_register_mce_button( $buttons ) {

    array_push( $buttons, 'my_mce_button' );

    return $buttons;

}

}
$sympleshortcode = new SYMPLE_TinyMCE_Buttons;

