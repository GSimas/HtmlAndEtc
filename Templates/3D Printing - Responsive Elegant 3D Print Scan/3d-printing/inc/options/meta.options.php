<?php
/**
 * Meta options
 *
 * @author ZoTheme
 * @since 1.0.0
 */
class ZOMetaOptions
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	/* add script */
	function admin_script_loader()
	{
		global $pagenow;
		if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
			wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');

			wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
			wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
		}
	}
	/* add meta boxs */
	public function add_meta_boxes()
	{
		$this->add_meta_box('template_page_options', esc_html__('Page Options', '3dprinting'), 'page');
		$this->add_meta_box('testimonial_options', esc_html__('Testimonial about', '3dprinting'), 'testimonial');
		$this->add_meta_box('product_options', esc_html__('Product Settings', '3dprinting'), 'product');
		$this->add_meta_box('team_options', esc_html__('Team About', '3dprinting'), 'team');
		$this->add_meta_box('portfolio_options', esc_html__('Portfolio Settings', '3dprinting'), 'portfolio');
	}

	public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
	{
		add_meta_box('_zo_' . $id, $label, array($this, $id), $post_type, $context, $priority);
	}
	/* --------------------- PAGE ---------------------- */
	function template_page_options() {
		?>
        <div id="tab-container"  class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('Layout', '3dprinting'); ?></a></li>
				<li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php _e('Header', '3dprinting'); ?></a></li>
				<li class="tab"><a href="#tabs-menu"><i class="fa fa-bars"></i><?php _e('Menu', '3dprinting'); ?></a></li>
				<li class="tab"><a href="#tabs-page-title"><i class="fa fa-table"></i><?php _e('Page Title', '3dprinting'); ?></a></li>
				<li class="tab"><a href="#tabs-footer"><i class="fa fa-minus"></i><?php _e('Footer', '3dprinting'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-general">
					<?php
					zo_options(array(
						'id' => 'page_layout',
						'label' => esc_html__('Layout','3dprinting'),
						'type' => 'select',
						'options' => array('0'=>'Default','wide'=>'Wide', 'boxed'=>'Boxed'),
                        'desc' => esc_html__('Select boxed or wide layout (Default by theme option).','3dprinting'),
					));
                    zo_options(array(
                        'id' => 'page_body_bg_color',
                        'label' => esc_html__('Body Background Color','3dprinting'),
                        'type' => 'color',
                        'default' => '',
                        'desc' => esc_html__('Controls the background color for the body background. Hex code, ex: #000','3dprinting'),
                    ));
                    zo_options(array(
                        'id' => 'page_body_bg_image',
                        'label' => esc_html__('Body Background Image','3dprinting'),
                        'type' => 'image',
                        'desc' => esc_html__('Select an image to use for the background.','3dprinting'),
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Position", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image position','3dprinting'),
                        "id" => "page_body_bg_position",
                        "options" => array(
                            "" => "Theme Default",
                            "left top" => "Left Top",
                            "left center" => "Left Center",
                            "left bottom" => "Left Bottom",
                            "right top" => "Right Top",
                            "right center" => "Right Center",
                            "right bottom" => "Right Bottom",
                            "center top" => "Center Top",
                            "center center" => "Center Center",
                            "center bottom" => "Center Bottom"
                        )
                    ));
                    zo_options(array(
                    "type" => "select",
                    "label" => esc_html__("Background Attachment", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image attachment.','3dprinting'),
                    "id" => "page_body_bg_attachment",
                    "options" => array(
                        "" => "Theme Default",
                        "scroll" => "Scroll",
                        "fixed" => "Fixed",
                        "local" => "Local"
                    )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Size", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image size.','3dprinting'),
                        "id" => "page_body_bg_size",
                        "options" => array(
                            "" => "Theme Default",
                            "cover" => "Cover",
                            "contain" => "Contain"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Repeat", '3dprinting'),
                            'desc' => esc_html__('Select how the background image repeats.','3dprinting'),
                        "id" => "page_body_bg_repeat",
                        "options" => array(
                            "" => "Tile",
                            "repeat-x" => "Tile Horizontally",
                            "repeat-y" => "Tile Vertically",
                            "no-repeat" => "No Repeat"
                        )
                    ));
                    ?>
                    <div id="page_layout_boxed">
                        <div class="zo_metabox_note"><?php echo esc_html__('Following options only work in Boxed mode','3dprinting');?> </div>
                        <?php
                        zo_options(array(
                            'id' => 'page_boxed_bg_color',
                            'label' => esc_html__('Boxed Background Color','3dprinting'),
                            'type' => 'color',
                            'default' => '',
                            'desc' => esc_html__('Controls the background color for the body background. Hex code, ex: #000','3dprinting'),
                        ));
                        zo_options(array(
                            'id' => 'page_boxed_image',
                            'label' => esc_html__('Boxed Background Image','3dprinting'),
                            'type' => 'image',
                            'desc' => esc_html__('Select an image to use for the background.','3dprinting'),
                        ));
                        ?>
                    </div>
				</div>
				<div id="tabs-header">
                <?php
                /* header. */
                    zo_options(array(
                        'id' => 'header_layout',
                        'label' => esc_html__('Header Layout','3dprinting'),
                        'desc' => esc_html__('Choose header layout.','3dprinting'),
                        'type' => 'imegesselect',
                        'options' => array(
                            'default' => get_template_directory_uri().'/assets/images/h-default.jpg',
                            '' => get_template_directory_uri().'/assets/images/header-0.png',
                            '1' => get_template_directory_uri().'/assets/images/header-1.png',
                            '2' => get_template_directory_uri().'/assets/images/header-2.png',
                        )
                    ));
                    zo_options(array(
                        'id' => 'header_width',
                        'label' => esc_html__('100% Header Width','3dprinting'),
                        'desc' => esc_html__('Choose to set header width to 100% of the browser width. Select "No" for site width.','3dprinting'),
                        'type' => 'select',
                        'options' => array('' => 'Default' , 'on'=>'Yes','off'=>'No'),
                    ));
                    zo_options(array(
                        'id' => 'header_transparent',
                        'label' => esc_html__('Header Transparent','3dprinting'),
                        'desc' => esc_html__('Choose Yes to have the header transparent','3dprinting'),
                        'type' => 'select',
                        'options' => array('' => 'Default' , 'on'=>'Yes','off'=>'No'),
                    ));
                    zo_options(array(
                        'id' => 'header_bg_color',
                        'label' => esc_html__('Header Background Color','3dprinting'),
                        'type' => 'color',
                        'rgba' => true,
                        'default' => '',
                        'desc' => esc_html__('Controls the background color for the header.','3dprinting'),
                    ));
                    zo_options(array(
                        'id' => 'header_bg_image',
                        'label' => esc_html__('Header Background Image','3dprinting'),
                        'type' => 'image',
                        'desc' => esc_html__('Select an image to use for the background.','3dprinting'),
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Position", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image position','3dprinting'),
                        "id" => "header_bg_position",
                        "options" => array(
                            "" => "Theme Default",
                            "left top" => "Left Top",
                            "left center" => "Left Center",
                            "left bottom" => "Left Bottom",
                            "right top" => "Right Top",
                            "right center" => "Right Center",
                            "right bottom" => "Right Bottom",
                            "center top" => "Center Top",
                            "center center" => "Center Center",
                            "center bottom" => "Center Bottom"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Attachment", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image attachment.','3dprinting'),
                        "id" => "header_bg_attachment",
                        "options" => array(
                            "" => "Theme Default",
                            "scroll" => "Scroll",
                            "fixed" => "Fixed",
                            "local" => "Local"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Size", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image size.','3dprinting'),
                        "id" => "header_bg_size",
                        "options" => array(
                            "" => "Theme Default",
                            "cover" => "Cover",
                            "contain" => "Contain"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Repeat", '3dprinting'),
                        'desc' => esc_html__('Select how the background image repeats.','3dprinting'),
                        "id" => "header_bg_attachment",
                        "options" => array(
                            "" => "Tile",
                            "repeat-x" => "Tile Horizontally",
                            "repeat-y" => "Tile Vertically",
                            "no-repeat" => "No Repeat"
                        )
                    ));
                    zo_options(array(
                        'id' => 'header_logo',
                        'label' => esc_html__('Custom Logo','3dprinting'),
                        'desc' => esc_html__('Select a logo for this page. If empty, it will show logo from theme option','3dprinting'),
                        'type' => 'image'
                    ));
                    ?>
				</div>
                <div id="tabs-menu">
                <?php
                    $menus = array();
                    $menus[''] = 'Default';
                    $obj_menus = wp_get_nav_menus();
                    foreach ($obj_menus as $obj_menu){
                        $menus[$obj_menu->term_id] = $obj_menu->name;
                    }
                    zo_options(array(
                        'id' => 'primary',
                        'label' => esc_html__('Main Navigation Menu','3dprinting'),
                        'desc' => esc_html__('Select which menu displays on this page.','3dprinting'),
                        'type' => 'select',
                        'options' => $menus
                    ));
                ?>
                    <div class="zo_metabox_note"><?php echo esc_html__('Following options are setting color for the Main Navigation on this page. Default is get color from theme option','3dprinting');?> </div>
                <?php
                    zo_options(array(
                        'id' => 'header_menu_color',
                        'label' => esc_html__('Menu Color - First Level','3dprinting'),
                        'type' => 'color',
                        'default' => ''
                    ));
                    zo_options(array(
                        'id' => 'header_menu_color_hover',
                        'label' => esc_html__('Menu Hover - First Level','3dprinting'),
                        'type' => 'color',
                        'default' => ''
                    ));
                    zo_options(array(
                        'id' => 'header_menu_color_active',
                        'label' => esc_html__('Menu Active - First Level','3dprinting'),
                        'type' => 'color',
                        'default' => ''
                    ));
                    zo_options(array(
                        'id' => 'header_sub_menu_color',
                        'label' => esc_html__('Menu Color - Sub Level','3dprinting'),
                        'type' => 'color',
                        'default' => ''
                    ));
                    zo_options(array(
                        'id' => 'header_sub_menu_color_hover',
                        'label' => esc_html__('Menu Hover/Active - Sub Level','3dprinting'),
                        'type' => 'color',
                        'default' => ''
                    ));
                ?>
                </div>
				<div id="tabs-page-title">
                    <?php
					zo_options(array(
						'id' => 'page_title',
						'label' => esc_html__('Page Title','3dprinting'),
						'desc' => esc_html__('Choose to show or hide the page title bar.','3dprinting'),
						'type' => 'select',
						'options' => array('on'=>'Show','off'=>'Hide'),
                    ));
					zo_options(array(
						'id' => 'page_title_width',
						'label' => esc_html__('100% Page Title Width','3dprinting'),
						'desc' => esc_html__('Choose to set the page title content to 100% of the browser width. Select "No" for site width. Only works with wide layout mode.','3dprinting'),
						'type' => 'select',
						'options' => array('default'=>'Default','true'=>'Yes','false'=>'No'),
					));
                    zo_options(array(
                        'id' => 'page_title_height',
                        'label' => esc_html__('Page Title Height','3dprinting'),
                        'desc' => esc_html__('Set the height of the page title bar. In pixels ex: 100px.','3dprinting'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_mobile_height',
                        'label' => esc_html__('Page Title Mobile Height','3dprinting'),
                        'desc' => esc_html__('Set the height of the page title bar on mobile. In pixels ex: 100px.','3dprinting'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_bg_color',
                        'label' => esc_html__('Page Title Background Color','3dprinting'),
                        'type' => 'color',
                        'default' => '',
                        'desc' => esc_html__('Controls the background color for the page title. Hex code, ex: #000','3dprinting'),
                    ));
                    zo_options(array(
                        'id' => 'page_title_bg_image',
                        'label' => esc_html__('Page Title Background Image','3dprinting'),
                        'type' => 'image',
                        'desc' => esc_html__('Select an image to use for the background.','3dprinting'),
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Position", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image position','3dprinting'),
                        "id" => "page_title_bg_position",
                        "options" => array(
                            "" => "Theme Default",
                            "left top" => "Left Top",
                            "left center" => "Left Center",
                            "left bottom" => "Left Bottom",
                            "right top" => "Right Top",
                            "right center" => "Right Center",
                            "right bottom" => "Right Bottom",
                            "center top" => "Center Top",
                            "center center" => "Center Center",
                            "center bottom" => "Center Bottom"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Attachment", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image attachment.','3dprinting'),
                        "id" => "page_title_bg_attachment",
                        "options" => array(
                            "" => "Theme Default",
                            "scroll" => "Scroll",
                            "fixed" => "Fixed",
                            "local" => "Local"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Size", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image size.','3dprinting'),
                        "id" => "page_title_bg_size",
                        "options" => array(
                            "" => "Theme Default",
                            "cover" => "Cover",
                            "contain" => "Contain"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Repeat", '3dprinting'),
                        'desc' => esc_html__('Select how the background image repeats.','3dprinting'),
                        "id" => "page_title_bg_attachment",
                        "options" => array(
                            "" => "Tile",
                            "repeat-x" => "Tile Horizontally",
                            "repeat-y" => "Tile Vertically",
                            "no-repeat" => "No Repeat"
                        )
                    ));

                    /* Page Title Text */
                    zo_options(array(
                        'id' => 'page_title_text_bar',
                        'label' => esc_html__('Page Title Text','3dprinting'),
                        'desc' => esc_html__('Choose to show or hide the page title bar text.','3dprinting'),
                        'type' => 'select',
                        'options' => array('on'=>'Show','off'=>'Hide'),
                    ));
                    zo_options(array(
                        'id' => 'page_title_text_alignment',
                        'label' => esc_html__('Text Alignment','3dprinting'),
                        'desc' => esc_html__('Choose the title and subhead text alignment.','3dprinting'),
                        'type' => 'select',
                        'options' => array(
                            'default'    => esc_html__( 'Default', '3dprinting' ),
                            'left'    => esc_html__( 'Left', '3dprinting' ),
                            'center'  => esc_html__( 'Center', '3dprinting' ),
                            'right'   => esc_html__( 'Right', '3dprinting' ),
                        )
                    ));
                    zo_options(array(
                        'id' => 'page_title_text_horizontal_alignment',
                        'label' => esc_html__('Text Horizotal Alignment','3dprinting'),
                        'desc' => esc_html__('Choose the title and subhead text horizotal alignment.','3dprinting'),
                        'type' => 'select',
                        'options' => array(
                            'default'  => esc_html__( 'Default', '3dprinting' ),
                            'middle'  => esc_html__( 'Middle', '3dprinting' ),
                            'custom'   => esc_html__( 'Custom Padding', '3dprinting' ),
                        )
                    ));
                    ?>
                        <div class="zo_metabox_note"><?php echo esc_html__('The Padding Top and Bottom are custom Page Title Padding when "Text Horizotal Alignment" is Custom Padding','3dprinting');?> </div>
                    <?php
                    zo_options(array(
                        'id' => 'page_title_text_padding_top',
                        'label' => esc_html__('Padding Top','3dprinting'),
                        'desc' => esc_html__('Set the padding top of the page title text. In pixels ex: 100.','3dprinting'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_text_padding_bottom',
                        'label' => esc_html__('Padding Bottom','3dprinting'),
                        'desc' => esc_html__('Set the padding bottom of the page title text. In pixels ex: 100.','3dprinting'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_text',
                        'label' => esc_html__('Page Title Custom Text','3dprinting'),
                        'desc' => esc_html__('Insert custom text for the page title bar.','3dprinting'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_sub_text',
                        'label' => esc_html__('Page Title Custom Sub Text','3dprinting'),
                        'desc' => esc_html__('Insert custom subhead text for the page title bar.','3dprinting'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_breadcrumb_display',
                        'label' => esc_html__('Breadcrumbs','3dprinting'),
                        'desc' => esc_html__('Choose to display the breadcrumbs, sidebar or none.','3dprinting'),
                        'type' => 'select',
                        'options' => array(
                            'default'    => esc_html__( 'Default', '3dprinting' ),
                            'none'    => esc_html__( 'None', '3dprinting' ),
                            'breadcrumb'  => esc_html__( 'Breadcrumbs', '3dprinting' ),
                            'sidebar'  => esc_html__( 'Page Title Sidebar', '3dprinting' ),
                        )
                    ));
                    zo_options(array(
                        'id' => 'page_title_breadcrumb_position',
                        'label' => esc_html__('Breadcrumbs Position','3dprinting'),
                        'desc' => esc_html__('Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Text Alignment center)','3dprinting'),
                        'type' => 'select',
                        'options' => array(
                            'default'    => esc_html__( 'Default', '3dprinting' ),
                            'bellow'    => esc_html__( 'Bellow', '3dprinting' ),
                            'above'  => esc_html__( 'Above', '3dprinting' ),
                            'symmetric'   => esc_html__( 'Symmetric', '3dprinting' ),
                        )
                    ));
                ?>
				</div>
                <div id="tabs-footer">
                    <?php
                    zo_options(array(
                        'id' => 'footer_layout',
                        'label' => esc_html__('Footer Layout','3dprinting'),
                        'desc' => esc_html__('Choose footer layout.','3dprinting'),
                        'type' => 'imegesselect',
                        'options' => array(
                            '' => get_template_directory_uri().'/assets/images/3dprinting-header.jpg',
                            '1' => get_template_directory_uri().'/assets/images/3dprinting-header1.jpg',
                        )
                    ));
                    zo_options(array(
                        'id' => 'footer_width',
                        'label' => esc_html__('100% Footer Width','3dprinting'),
                        'desc' => esc_html__('Choose to set footer width to 100% of the browser width. Select "No" for site width.','3dprinting'),
                        'type' => 'select',
                        'options' => array('' => 'Default' , 'on'=>'Yes','off'=>'No'),
                    ));
                    zo_options(array(
                        'id' => 'footer_widget',
                        'label' => esc_html__('Display Footer Widget Area','3dprinting'),
                        'desc' => esc_html__('Choose to show or hide the footer widget area.','3dprinting'),
                        'type' => 'select',
                        'options' => array('' => 'Default' , 'on'=>'Yes','off'=>'No'),
                    ));
                    zo_options(array(
                        'id' => 'footer_bg_color',
                        'label' => esc_html__('Footer Background Color','3dprinting'),
                        'type' => 'color',
                        'default' => '',
                        'desc' => esc_html__('Controls the background color for the footer. Hex code, ex: #000','3dprinting'),
                    ));
                    zo_options(array(
                        'id' => 'footer_bg_image',
                        'label' => esc_html__('Footer Background Image','3dprinting'),
                        'type' => 'image',
                        'desc' => esc_html__('Select an image to use for the background.','3dprinting'),
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Position", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image position','3dprinting'),
                        "id" => "footer_bg_position",
                        "options" => array(
                            "" => "Theme Default",
                            "left top" => "Left Top",
                            "left center" => "Left Center",
                            "left bottom" => "Left Bottom",
                            "right top" => "Right Top",
                            "right center" => "Right Center",
                            "right bottom" => "Right Bottom",
                            "center top" => "Center Top",
                            "center center" => "Center Center",
                            "center bottom" => "Center Bottom"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Attachment", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image attachment.','3dprinting'),
                        "id" => "footer_bg_attachment",
                        "options" => array(
                            "" => "Theme Default",
                            "scroll" => "Scroll",
                            "fixed" => "Fixed",
                            "local" => "Local"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Size", '3dprinting'),
                        'desc' => esc_html__('Choose to have the background image size.','3dprinting'),
                        "id" => "footer_bg_size",
                        "options" => array(
                            "" => "Theme Default",
                            "cover" => "Cover",
                            "contain" => "Contain"
                        )
                    ));
                    zo_options(array(
                        "type" => "select",
                        "label" => esc_html__("Background Repeat", '3dprinting'),
                        'desc' => esc_html__('Select how the background image repeats.','3dprinting'),
                        "id" => "footer_bg_attachment",
                        "options" => array(
                            "" => "Tile",
                            "repeat-x" => "Tile Horizontally",
                            "repeat-y" => "Tile Vertically",
                            "no-repeat" => "No Repeat"
                        )
                    ));
                    zo_options(array(
                        'id' => 'footer_copyright',
                        'label' => esc_html__('Display Copyright','3dprinting'),
                        'desc' => esc_html__('Choose to show or hide the copyright area.','3dprinting'),
                        'type' => 'select',
                        'options' => array('' => 'Default' , 'on'=>'Yes','off'=>'No'),
                    ));
                    zo_options(array(
                        'id' => 'footer_copyright_bg_color',
                        'label' => esc_html__('Copyright Background Color','3dprinting'),
                        'type' => 'color',
                        'default' => '',
                        'desc' => esc_html__('Controls the background color for the copyright. Hex code, ex: #000','3dprinting'),
                    ));
                    ?>
                </div>
			</div>
		</div>
	<?php
	}
	/* --------------------- RATING TESTIMONIAL ---------------------- */
	function testimonial_options(){
		?>
		<div class="testimonial-rating">
			<?php
			zo_options(array(
				'id' => 'testimonial_position',
				'label' => esc_html__('Client Position','3dprinting'),
				'type' => 'text',
			));
			?>
		</div>
        <div class="testimonial-country">
			<?php
			zo_options(array(
				'id' => 'testimonial_country',
				'label' => esc_html__('Client Country','3dprinting'),
				'type' => 'text',
			));
			?>
		</div>
	<?php
	}


	/*-----------------------TEAM-------------------------*/
	function team_options() {
		?>

		<div id="tab-container"  class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php _e('Position', '3dprinting'); ?></a></li>
				<li class="tab"><a href="#tabs-social"><i class="fa fa-server"></i><?php _e('Social', '3dprinting'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-position">
					<?php
					zo_options(array(
						'id' => 'team_position',
						'label' => esc_html__('Position', '3dprinting'),
						'type' => 'text',
						'placeholder' => '',
					));
					?>
				</div>

				<div id="tabs-social">
					<?php
					zo_options(array(
						'id' 			=> 'team_facebook',
						'label' 		=> esc_html__('Facebook', '3dprinting'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input link Facebok',
					));

					zo_options(array(
						'id' 			=> 'team_twitter',
						'label' 		=> esc_html__('Twitter', '3dprinting'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input link Twitter',
					));

					zo_options(array(
						'id' 			=> 'team_google',
						'label' 		=> esc_html__('Google', '3dprinting'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input link Google',
					));

					zo_options(array(
						'id' 			=> 'team_in',
						'label' 		=> esc_html__('Linked in', '3dprinting'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input Linked In',
					));
					?>
				</div>
			</div>
		</div>
	<?php
	}
	/*-----------------------Portfolio-------------------------*/
	function portfolio_options() {
		?>
		<div id="tab-container"  class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-about"><i class="fa fa-server"></i><?php _e('Infomation', '3dprinting'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-about">
					<?php
					zo_options(array(
						'id' => 'portfolio_author',
						'label' => esc_html__('Author', '3dprinting'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_client',
						'label' => esc_html__('Client', '3dprinting'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_date',
						'label' => esc_html__('Date', '3dprinting'),
						'type' => 'date',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_skills',
						'label' => esc_html__('Skills', '3dprinting'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_images',
						'label' => esc_html__('Gallery', '3dprinting'),
						'type' => 'images',
					));
					?>
				</div>
			</div>
		</div>


	<?php
	}
	/*-----------------------PRODUCT-------------------------*/
	function product_options() {
		?>
		<div id="tab-container"  class="tab-container clearfix">
		<ul class='etabs clearfix'>
			<li class="tab"><a href="#tabs-feature"><i class="fa fa-server"></i><?php _e(' Features', '3dprinting'); ?></a></li>
			<li class="tab"><a href="#tabs-app"><i class="fa fa-server"></i><?php _e(' App Store', '3dprinting'); ?></a></li>
		</ul>
		<div class='panel-container'>
			<div id="tabs-feature">
				<?php
				zo_options(array(
					'id' 	=> 'overall_dimensions',
					'label' => esc_html__('Overall Dimensions', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'build_volume',
					'label' => esc_html__('Build Volume', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'print_speed',
					'label' => esc_html__('Print Speed', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'maximum_resolution',
					'label' => esc_html__('Maximum Resolution', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'print_from_sd_card',
					'label' => esc_html__('Print from SD Card', '3dprinting'),
					'type' 	=> 'select',
					'options' => array(
						'' 			=> '',
						'yes' 			=> 'Yes',
						'no' 			=> 'No'
					)
				));
				zo_options(array(
					'id' 	=> 'print_material',
					'label' => esc_html__('Print Material', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'noise_level',
					'label' => esc_html__('Noise Level', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'recommended_software',
					'label' => esc_html__('Recommended Software', '3dprinting'),
					'type' 	=> 'text'
				));
				?>
			</div>
			<div id="tabs-app">
				<?php
				zo_options(array(
					'id' 	=> 'app_store',
					'label' => esc_html__('Link App Store', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'google_play',
					'label' => esc_html__('Link Google Play', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'windows_phone_store',
					'label' => esc_html__('Link Window Phone Store', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'windows_store',
					'label' => esc_html__('Link Windows Store', '3dprinting'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'documents_links',
					'label' => esc_html__('Link User Manual', '3dprinting'),
					'type' 	=> 'text'
				));
				?>
			</div>
		</div>
		<div>
<?php
	}
}

new ZOMetaOptions();
