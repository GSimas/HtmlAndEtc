<?php
global $zo_base;
/* get local fonts. */
$local_fonts = is_admin() ? $zo_base->getListLocalFontsName() : array() ;
/**
 * Layout
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Layout', '3dprinting'),
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'subtitle' => __('Controls the site layout.', '3dprinting'),
            'id' => 'body_layout',
            'type' => 'button_set',
            'title' => __('Layout', '3dprinting'),
            'default' => 'wide',
            'options' => array(
                'wide' => esc_html__( 'Wide', '3dprinting' ),
                'boxed' => esc_html__( 'Boxed', '3dprinting' ),
            )
        ),
        array(
            'title'       => esc_html__( 'Site Width', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px. (minimun is standard bootstrap width)', '3dprinting' ),
            'id'          => 'body_width',
            'type'        => 'slider',
            "default"   => 1200,
            "min"       => 1170,
            "step"      => 10,
            "max"       => 1600,
            'display_value' => 'text',
        ),
        array(
            'title'       => esc_html__( 'Wide Left/Right Padding', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the left/right padding for page content when using 100% site width or 100% width page layout. Enter value including any valid CSS unit, ex: 20px.', '3dprinting' ),
            'id'          => 'body_padding',
            'type'        => 'slider',
            "default"   => 0,
            "min"       => 0,
            "step"      => 1,
            "max"       => 200,
            'display_value' => 'text',
            'required' => array(0=>'body_layout',1=>'=',2=>'wide')
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Body Background', '3dprinting' ),
            'subtitle' => __( 'Controls the background of the body. (It is also display in the outer background area in boxed mode.)', '3dprinting' ),
        ),
        array(
            'id'       => 'body_boxed_background',
            'type'     => 'background',
            'title'    => __( 'Boxed Content Background', '3dprinting' ),
            'subtitle' => __( 'Controls the background of the outer background area in boxed mode.', '3dprinting' ),
        ),
        array(
            'title'       => esc_html__( 'Main Sidebar Width', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', '3dprinting' ),
            'id'          => 'body_sidebar_size',
            'type'        => 'slider',
            "default"   => 3,
            "min"       => 3,
            "step"      => 1,
            "max"       => 6,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => __('Enable page loadding.', '3dprinting'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => __('Enable Page Loadding', '3dprinting'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Select Style Page Loadding.', '3dprinting'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => __('Page Loadding Style', '3dprinting'),
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )
    )
);


/**
 * Colors
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Colors', '3dprinting'),
    'icon' => 'el el-brush',
    'fields' => array(
        array(
			'subtitle' => esc_html__('Controls the main color scheme throughout the theme. Select a scheme and all color options will change to the defined selection.', 'brando'),
			'id' => 'presets_color',
			'type' => 'image_select',
			'title' => esc_html__('Presets Color Scheme', 'brando'),
			'default' => '0',
			'options' => array(
				'0' => get_template_directory_uri().'/inc/options/images/presets/pr-c-1.jpg',
				'1' => get_template_directory_uri().'/inc/options/images/presets/pr-c-2.jpg',
				'2' => get_template_directory_uri().'/inc/options/images/presets/pr-c-3.jpg',
				'3' => get_template_directory_uri().'/inc/options/images/presets/pr-c-4.jpg',
				'4' => get_template_directory_uri().'/inc/options/images/presets/pr-c-5.jpg',
				'5' => get_template_directory_uri().'/inc/options/images/presets/pr-c-6.jpg',
			)//#ff4421 ; #0d6cbe ; #0daca8 ; #daae19 ; #947ec7 ; #fd6804
		),
        array(
            'subtitle' => __('Controls the main highlight color throughout the theme.', '3dprinting'),
            'id' => 'primary_color',
            'type' => 'color',
            'transparent' => false,
            'title' => __('Primary Color', '3dprinting'),
            'default' => '#0d6cbe'
        ),
        array(
            'subtitle' => __('Controls the secondary highlight color throughout the theme.', '3dprinting'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => __('Secondary Color', '3dprinting'),
            'default' => '#333333',
            'transparent' => false,
        ),
        array(
            'subtitle' => __('Controls the color of all text links.', '3dprinting'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => __('Link Color', '3dprinting'),
            'output'  => array('a'),
            'default' => array(
				'regular'  => '#333333',
				'hover'    => '#0d6cbe',
				'active'    => '#0d6cbe',
			)
        ),
    )
);

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Header', '3dprinting'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => __('Header Layouts', '3dprinting'),
            'subtitle' => __('Select a layout for header', '3dprinting'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/assets/images/header-0.png',
                '1' => get_template_directory_uri().'/assets/images/header-1.png',
                '2' => get_template_directory_uri().'/assets/images/header-2.png',
            )
        ),
        array(
            'subtitle' => __('Turn on to have the header transparent', '3dprinting'),
            'id' => 'header_transparent',
            'type' => 'switch',
            'title' => __('Header Transparent', '3dprinting'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'wide_boxed_header',
            'type' => 'switch',
            'title' => __('100% Header Width', '3dprinting'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Controls the background color and opacity for the header.', '3dprinting'),
            'id' => 'bg_header_color',
            'type' => 'color_rgba',
            'title' => __('Header Background Color', '3dprinting'),
            'default'   => array(
                'color'     => '#ffffff',
                'alpha'     => 1
            ),
        ),
        array(
            'subtitle' => __('Select an image for the header background. If left empty, the header background color will be used.', '3dprinting'),
            'id' => 'bg_header',
            'type' => 'background',
            'title' => __('Header Background Image', '3dprinting'),
            'background-color' => false,
        ),
        array(
            'id' => 'header_padding',
            'title' => __('Header Padding', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left padding for the header. Enter values including any valid CSS unit, ex: 0px, 0px, 0px, 0px.', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '0px',
                'padding-right'   => '0px',
                'padding-bottom'  => '0px',
                'padding-left'    => '0px',
                'units'          => 'px',
            )
        ),
    )
);
/* Header Top */
$this->sections[] = array(
    'title' => __('Header Top', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'    => 'info_header_top',
            'type'  => 'info',
            'style' => 'success',
            'title' => __('Header Top Settings', '3dprinting'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => __( 'This is a setting for Header Top you have enabled from Header layout or Page Header layout!', '3dprinting'),
        ),
        array(
            'title'       => esc_html__( 'Header Top Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the min height of the header top', '3dprinting' ),
            'id'          => 'header_top_height',
            'type'        => 'slider',
            "default"   => 45,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => __('Set background color header top.', '3dprinting'),
            'id' => 'bg_header_top_color',
            'type' => 'background',
            'title' => __('Header Top Background', '3dprinting'),
            'default' => array(
				'background-color' => '#0d6cbe',
			),
        ),
        array(
            'subtitle' => __('Set color header top.', '3dprinting'),
            'id' => 'header_top_color',
            'type' => 'color',
            'output'  => array('body #zo-header-top'),
            'title' => __('Header Top Color', '3dprinting'),
            'default' => '#fff',
        ),
        array(
            'id'       => 'header_top_left',
            'type'     => 'select',
            'title'    => __('Header Content Left', '3dprinting'),
            'subtitle' => __('Controls the content that displays in the top left section.', '3dprinting'),
            'options'  => array(
                '1' => 'Contact Info',
                '2' => 'Social Links',
                '3' => 'Navigation Top',
                '4' => 'Header Top Sidebar 1',
                '5' => 'Header Top Sidebar 2',
            ),
            'default'  => '1',
        ),
        array(
            'title' => __('Content Left Alignment', '3dprinting'),
            'subtitle' => 'Controls the header content left alignment.',
            'id' => 'content_left_alignment',
            'default'     => 'left',
            'type'        => 'button_set',
            'options'     => array(
                'left'    => esc_html__( 'Left', '3dprinting' ),
                'center'    => esc_html__( 'Center', '3dprinting' ),
                'right'   => esc_html__( 'Right', '3dprinting' ),
            ),
        ),
        array(
            'id'       => 'header_top_right',
            'type'     => 'select',
            'title'    => __('Header Content Right', '3dprinting'),
            'subtitle' => __('Controls the content that displays in the top right section.', '3dprinting'),
            'options'  => array(
                '1' => 'Contact Info',
                '2' => 'Social Links',
                '3' => 'Navigation Top',
                '4' => 'Header Top Sidebar 1',
                '5' => 'Header Top Sidebar 2',
            ),
            'default'  => '2',
        ),
        array(
            'title' => __('Content Right Alignment', '3dprinting'),
            'subtitle' => 'Controls the header content right alignment.',
            'id' => 'content_right_alignment',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'left'    => esc_html__( 'Left', '3dprinting' ),
                'center'    => esc_html__( 'Center', '3dprinting' ),
                'right'   => esc_html__( 'Right', '3dprinting' ),
            ),
        ),
        array(
            'title' => __('Address For Contact Info', '3dprinting'),
            'id' => 'contact_address',
            'type' => 'text',
            'default' => '',
            'subtitle' => __('This content will display if you have "Contact Info" selected for the Header Content Left or Right option above.', '3dprinting'),
        ),
        array(
            'title' => __('Phone Number For Contact Info', '3dprinting'),
            'id' => 'contact_phone',
            'type' => 'text',
            'default' => '+1-202-555-0117',
            'subtitle' => __('This content will display if you have "Contact Info" selected for the Header Content Left or Right option above.', '3dprinting'),
        ),
        array(
            'title' => __('Email Address For Contact Info', '3dprinting'),
            'id' => 'contact_email',
            'type' => 'text',
            'default' => 'info@zotheme.com',
            'subtitle' => __('This content will display if you have "Contact Info" selected for the Header Content Left or Right option above.', '3dprinting'),
        ),
    )
);
/* Logo */
$this->sections[] = array(
    'title' => __('Logo', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'title'       => esc_html__( 'Logo Position', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the logo position. "Center" only works on Header 4', '3dprinting' ),
            'id'          => 'logo_position',
            'default'     => 'left',
            'type'        => 'button_set',
            'options'     => array(
                'left'    => esc_html__( 'Left', '3dprinting' ),
                'right'   => esc_html__( 'Right', '3dprinting' ),
            )
        ),
        array(
            'title' => __('Select Logo', '3dprinting'),
            'subtitle' => __('Select an image file for your logo.', '3dprinting'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'title'       => esc_html__( 'Logo Max Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the max hegith of the logo, width of the logo is auto', '3dprinting' ),
            'id'          => 'logo_height',
            'type'        => 'slider',
            "default"   => 50,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label'
        ),
        array(
            'title' => __('Logo Slogan', '3dprinting'),
            'id' => 'text_logo',
            'type' => 'text',
            'default' => ''
        ),
        array(
            'id' => 'logo_margin',
            'title' => __('Logo Margin', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top'     => '20px',
                'margin-right'   => '50px',
                'margin-bottom'  => '20px',
                'margin-left'    => '15px',
                'units'          => 'px',
            )
        ),
    )
);
/* Menu */
$this->sections[] = array(
    'title' => __('Menu', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => __('Menu Alignment', '3dprinting'),
            'subtitle' => 'Controls the menu alignment.',
            'id' => 'menu_alignment',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'left'    => esc_html__( 'Left', '3dprinting' ),
                'right'   => esc_html__( 'Right', '3dprinting' ),
            ),
        ),
        array(
            'title'       => esc_html__( 'Menu Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the menu height.', '3dprinting' ),
            'id'          => 'nav_height',
            'type'        => 'slider',
            "default"   => 80,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label'
        ),
        array(
            'title'       => esc_html__( 'Menu Item Padding', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the right padding for menu text (left on RTL). In pixels.', '3dprinting' ),
            'id'          => 'nav_padding',
            'type'        => 'slider',
            "default"   => 25,
            "min"       => 10,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => __('Turn on to display arrow indicators next to parent level menu items.', '3dprinting'),
            'id' => 'nav_indicator',
            'type' => 'switch',
            'title' => __('Menu Dropdown Indicator', '3dprinting'),
            'default' => false,
        ),
        array(
            'id' => 'nav_typography_first_level',
            'type' => 'typography',
            'title' => __('Menu Typography - First Level', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header .nav-menu > li > a '),
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '16px',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase',
                'font-family' => 'Roboto Condensed',
                'font-weight' => '400',
            )
        ),
        array(
            'subtitle' => __('Controls the text color of first level menu items.', '3dprinting'),
            'id' => 'menu_color_first_level',
            'type' => 'link_color',
            'title' => __('Menu Color - First Level', '3dprinting'),
            'default' => array(
                'regular'  => '#333333',
                'hover'    => '#0d6cbe',
                'active'    => '#0d6cbe',
            )
        ),
        array(
            'id' => 'nav_typography_sub_level',
            'type' => 'typography',
            'title' => __('Menu Typography - Sub Level', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'text-transform' => true,
            'output'  => array('.nav-menu > li ul a ', '.nav-menu > ul > li ul a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '1px',
                'text-transform' => 'capitalize',
            )
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', '3dprinting'),
            'id' => 'menu_color_sub_level',
            'title' => __('Menu Color - Sub Level', '3dprinting'),
            'type' => 'link_color',
            'default' => array(
                'regular'  => '#212121',
                'hover'    => '#0d6cbe',
                'active'    => '#0d6cbe',
            )
        ),
        array(
            'subtitle' => __('Enable mega menu.', '3dprinting'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', '3dprinting'),
            'default' => true,
        ),
    )
);

/* Header Sticky */
$this->sections[] = array(
    'title' => __('Sticky Header', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Turn on to enable a sticky header.', '3dprinting'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Enable Sticky Header', '3dprinting'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Enable sticky mode for menu Tablets.', '3dprinting'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', '3dprinting'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Enable sticky mode for menu Mobile.', '3dprinting'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', '3dprinting'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the background color and opacity for the sticky header.', '3dprinting'),
            'id' => 'sticky_header_bg_color',
            'type' => 'color_rgba',
            'title' => __('Sticky Header Background Color', '3dprinting'),
            'default'   => array(
                'color'     => '#FFFFFF',
                'alpha'     => 1,
                'rgab' => 'rgba(255,255,255,1)'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Select an image for the sticky header background. If left empty, the sticky header background color will be used.', '3dprinting'),
            'id' => 'sticky_header_bg_image',
            'type' => 'background',
            'title' => __('Sticky Header Background Image', '3dprinting'),
            'background-color' => 'false',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'sticky_header_padding',
            'title' => __('Sticky Header Padding', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body .header-fixed #zo-header-top a'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'title' => __('Select Sticky Logo', '3dprinting'),
            'subtitle' => __('Select an image file for your sticky header logo.', '3dprinting'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'title'       => esc_html__( 'Sticky Logo Max Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the max hegith of the logo, width of the logo is auto', '3dprinting' ),
            'id'          => 'sticky_logo_height',
            'type'        => 'slider',
            "default"   => 50,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'sticky_logo_margin',
            'title' => __('Sticky Logo Margin', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top'     => '20px',
                'margin-right'   => '50px',
                'margin-bottom'  => '20px',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'title'       => esc_html__( 'Sticky Menu Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the menu height.', '3dprinting' ),
            'id'          => 'sticky_nav_height',
            'type'        => 'slider',
            "default"   => 80,
            "min"       => 30,
            "step"      => 1,
            "max"       => 300,
            'display_value' => 'label',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'title'       => esc_html__( 'Sticky Menu Item Padding', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the right padding for menu text (left on RTL). In pixels.', '3dprinting' ),
            'id'          => 'sticky_nav_padding',
            'type'        => 'slider',
            "default"   => 25,
            "min"       => 10,
            "step"      => 1,
            "max"       => 200,
            'display_value' => 'label',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'sticky_nav_typography_first_level',
            'type' => 'typography',
            'title' => __('Sticky Menu Typography - First Level', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.header-fixed .menu-main-menu-container > ul > li > a '),
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '16px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text color of first level menu items.', '3dprinting'),
            'id' => 'sticky_menu_color_first_level',
            'type' => 'color',
            'title' => __('Sticky Menu Color - First Level', '3dprinting'),
            'default' => '#171717',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', '3dprinting'),
            'id' => 'sticky_menu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Sticky Menu Color Hover - First Level', '3dprinting'),
            'default' => '#0d6cbe',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', '3dprinting'),
            'id' => 'sticky_menu_color_active_first_level',
            'type' => 'color',
            'title' => __('Sticky Menu Color Active - First Level', '3dprinting'),
            'default' => '#0d6cbe',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'sticky_nav_typography_sub_level',
            'type' => 'typography',
            'title' => __('Sticky Menu Typography - Sub Level', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'text-transform' => true,
            'output'  => array('.header-fixed .menu-main-menu-container > li ul a ', '.menu-main-menu-container > ul > li ul a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', '3dprinting'),
            'id' => 'sticky_menu_color_sub_level',
            'type' => 'color',
            'title' => __('Sticky Menu Color - Sub Level', '3dprinting'),
            'default' => '#212121',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', '3dprinting'),
            'id' => 'sticky_menu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Sticky Menu Color Hover - Sub Level', '3dprinting'),
            'default' => '#FFFFFF',
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
    )
);


/**
 * Page Title
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', '3dprinting'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'subtitle' => __('Turn on to have the page title area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'pt_width',
            'type' => 'switch',
            'title' => __('100% Page Title Width', '3dprinting'),
            'default' => false,
        ),
        array(
            'title'       => esc_html__( 'Page Title Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the height of the page title bar on desktop. Enter value including any valid CSS unit, ex: 100px.', '3dprinting' ),
            'id'          => 'pt_height',
            'type'        => 'slider',
            "default"   => 310,
            "min"       => 1,
            "step"      => 1,
            "max"       => 800,
            'display_value' => 'label'
        ),
        array(
            'title'       => esc_html__( 'Page Title Mobile Height', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the height of the page title bar on mobile. Enter value including any valid CSS unit, ex: 70px.', '3dprinting' ),
            'id'          => 'pt_mobile_height',
            'type'        => 'slider',
            "default"   => 100,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'label'
        ),
        array(
            'id'       => 'pt_background',
            'type'     => 'background',
            'title'    => __( 'Page Title Background', '3dprinting' ),
            'subtitle' => __( 'Controls the background of the page title.', '3dprinting' ),
            'default'   => array(
                'background-color'=>'#FFF',
                'background-image'=> get_template_directory_uri().'/assets/images/3dprinting-pagetitlle.jpg',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            )
        ),
        array(
            'subtitle' => __('Controls the border colors top/bottom of the page title.', '3dprinting'),
            'id' => 'pt_border_color',
            'type' => 'color',
            'title' => __('Page Title Borders Color', '3dprinting'),
            'default' => '#CDCDCD',
        ),
        array(
            'title'       => esc_html__( 'Page Title Borders Width Top', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the width of the page title border top, ex: 2px.', '3dprinting' ),
            'id'          => 'pt_border_width_top',
            'type'        => 'slider',
            "default"   => 0,
            "min"       => 0,
            "step"      => 1,
            "max"       => 50,
            'display_value' => 'label'
        ),
        array(
            'title'       => esc_html__( 'Page Title Borders Width Bottom', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the width of the page title border bottom, ex: 2px.', '3dprinting' ),
            'id'          => 'pt_border_width_bottom',
            'type'        => 'slider',
            "default"   => 0,
            "min"       => 0,
            "step"      => 1,
            "max"       => 50,
            'display_value' => 'label'
        ),
        array(
            'id' => 'pt_margin',
            'title' => __('Page Title Margin', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left margins for the Page Title. Enter values including any valid CSS unit, ex: 0px, 0px, 80px, 0px.','3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '80px',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'pt_parallax',
            'title' => __('Enable Header Parallax', '3dprinting'),
            'type' => 'switch',
            'default' => false
        ),
    )
);
/* Page Title */
$this->sections[] = array(
    'title' => __('Page Title Text', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'title'       => esc_html__( 'Page Title Text Alignment', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the page title bar text alignment.', '3dprinting' ),
            'id'          => 'pt_alignment',
            'default'     => 'center',
            'type'        => 'button_set',
            'options'     => array(
                'left'    => esc_html__( 'Left', '3dprinting' ),
                'center'  => esc_html__( 'Center', '3dprinting' ),
                'right'   => esc_html__( 'Right', '3dprinting' ),
            )
        ),
        array(
            'title'       => esc_html__( 'Page Title Vertical Alignment', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the page title bar text alignment.', '3dprinting' ),
            'id'          => 'pt_vertical_alignment',
            'default'     => 'custom',
            'type'        => 'button_set',
            'options'     => array(
                'middle'  => esc_html__( 'Middle', '3dprinting' ),
                'custom'   => esc_html__( 'Custom Padding', '3dprinting' ),
            )
        ),
        array(
            'id' => 'pt_text_padding',
            'title' => __('Page Title Text Padding', '3dprinting'),
            'subtitle' => __('Controls the top/bottom padding for the Page Title Text. Enter values including any valid CSS unit, ex: 0px, 80px','3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '120px',
                'padding-right'  => '0px',
                'padding-bottom'  => '150px',
                'padding-left'  => '0px',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'pt_vertical_alignment', 1 => '=', 2 => 'custom' )
        ),
        array(
            'id' => 'pg_typography',
            'type' => 'typography',
            'title' => __('Page Title Typography', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-transform' => true,
            'text-align' => false,
            'output'  => array('#zo-page-element-wrap .zo-page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', '3dprinting'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Oswald',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '30px',
                'line-height' => '30px',
                'text-transform' => 'Uppercase',
                'color' => '#fff'
            )
        ),
		array(
			'id' => 'pt_sub',
			'title' => 'Sub Title',
            'subtitle' => __('Enter the sub title you want displays in the bottom of Page Title.', '3dprinting'),
			'type' => 'text',
			'default' => ''
		),
        array(
            'id' => 'pg_sub_typography',
            'type' => 'typography',
            'title' => __('Sub Title Typography', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-transform' => true,
            'text-align' => false,
            'units' => 'px',
            'subtitle' => __('Typography option with sub title.', '3dprinting'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Oswald',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '22px',
                'line-height' => '24px'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'title' => __('Breadcrumb', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'title'       => esc_html__( 'Breadcrumbs Content Display', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls what displays in the breadcrumbs area.(Page Title Sidebar config from Widget)', '3dprinting' ),
            'id'          => 'pt_breadcrumb',
            'default'     => 'breadcrumb',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'breadcrumb'  => esc_html__( 'Breadcrumbs', '3dprinting' ),
                'sidebar'   => esc_html__( 'Page Title Sidebar', '3dprinting' ),
            )
        ),
        array(
            'title'       => esc_html__( 'Breadcrumbs Position', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Alignment center)', '3dprinting' ),
            'id'          => 'pt_breadcrumb_position',
            'default'     => 'bellow',
            'type'        => 'button_set',
            'options'     => array(
                'bellow'    => esc_html__( 'Bellow', '3dprinting' ),
                //'above'  => esc_html__( 'Above', '3dprinting' ),
                //'symmetric'   => esc_html__( 'Symmetric', '3dprinting' ),
            ),
            'required' => array( 0 => 'pt_breadcrumb', 1 => '!=', 2 => 'none' )
        ),
        array(
            'subtitle' => __('Controls the text before the breadcrumb menu.', '3dprinting'),
            'id' => 'breacrumb_prefix',
            'type' => 'text',
            'title' => __('Breadcrumbs Prefix', '3dprinting'),
            'default' => 'Home',
            'required' => array( 0 => 'pt_breadcrumb', 1 => '=', 2 => 'breadcrumb' )
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Breadcrumb Typography', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'subtitle' => __('Controls the Typography for the breadcrumbs text.', '3dprinting'),
            'default' => array(
				'color' => '#FFF',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '15px',
                'line-height' => '20px',
            ),
            'required' => array( 0 => 'pt_breadcrumb', 1 => '=', 2 => 'breadcrumb' )
        ),
    )
);



/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Footer', '3dprinting'),
    'icon' => 'el el-th',
	'fields' => array(
        array(
            'title' => __('100% Footer Width', '3dprinting'),
            'subtitle' => __('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'footer_width',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'id' => 'footer_padding',
            'title' => __('Footer Padding', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left padding for the footer. Enter values including any valid CSS unit, ex: 43px, 40px, 0px, 0px.', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '70px',
                'padding-right'   => '0px',
                'padding-bottom'  => '40px',
                'padding-left'    => '0px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __( 'Footer Background', '3dprinting' ),
            'subtitle' => __( 'Controls the background of the footer.', '3dprinting' ),
            'output'   => array('footer #zo-footer-top'),
            'default'   => array(
                'background-color'=>'#222222'
            ),
        ),
        array(
            'subtitle' => __('Controls the border colors top of the Footer.', '3dprinting'),
            'id' => 'footer_border_color',
            'type' => 'color',
            'title' => __('Footer Borders Color', '3dprinting'),
            'default' => '#e1e5e7',
        ),
        array(
            'title'       => esc_html__( 'Footer Borders Width Top', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the width of the Footer border top, ex: 2px.', '3dprinting' ),
            'id'          => 'footer_border_width_top',
            'type'        => 'slider',
            "default"   => 0,
            "min"       => 0,
            "step"      => 1,
            "max"       => 50,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => __('Enable back to top button.', '3dprinting'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', '3dprinting'),
            'default' => true,
        )
	)
);

/* Footer content */
$this->sections[] = array(
    'title' => __('Footer Widgets', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Turn on to display footer widgets.', '3dprinting'),
            'id' => 'footer_widgets',
            'type' => 'switch',
            'title' => __('Footer Widgets', '3dprinting'),
            'default' => true,
        ),
        array(
            'title'       => esc_html__( 'Number of Footer Columns', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the number of columns in the footer.', '3dprinting' ),
            'id'          => 'footer_column',
            'type'        => 'slider',
            "default"   => 4,
            "min"       => 1,
            "step"      => 1,
            "max"       => 6,
            'display_value' => 'label',
            'required' => array( 0 => 'footer_widgets', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_heading_typography',
            'type' => 'typography',
            'title' => __('Footer Headings Typography', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'output' => array('#zo-footer-content h3'),
            'subtitle' => __('These settings control the typography for the footer headings.', '3dprinting'),
            'default' => array(
                'text-transform'=>'uppercase',
				'color' => '#fff',
                'font-weight' => '300',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '20px',
                'line-height' => '22px',
            ),
            'required' => array( 0 => 'footer_widgets', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text color of the footer font.', '3dprinting'),
            'id' => 'footer_font_color',
            'type' => 'color',
            'transparent' => false,
            'title' => __('Footer Font Color', '3dprinting'),
            'output' => array('#zo-footer-content .textwidget'),
            'default' => '#fff',
            'required' => array( 0 => 'footer_widgets', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text color of the footer link font.', '3dprinting'),
            'id' => 'footer_link_color',
            'type' => 'color',
            'transparent' => false,
            'title' => __('Footer Link Color', '3dprinting'),
            'output' => array('#zo-footer-content .textwidget a'),
            'default' => '#0d6cbe',
            'required' => array( 0 => 'footer_widgets', 1 => '=', 2 => 1 )
        ),
    )
);

/* Footer Copyright */
$this->sections[] = array(
    'title' => __('Copyright', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Turn on to display the copyright bar.', '3dprinting'),
            'id' => 'footer_copyright',
            'type' => 'switch',
            'title' => __('Copyright Bar', '3dprinting'),
            'default' => true,
        ),
        array(
            'id' => 'footer_copyright_padding',
            'title' => __('Copyright Padding', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'subtitle' => __('Controls the top/bottom padding for the copyright area. Enter values including any valid CSS unit, ex: 20px, 15px.', '3dprinting'),
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '20px',
                'padding-bottom'  => '15px',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'id'       => 'footer_copyright_background',
            'type' => 'color',
            'transparent' => false,
            'title'    => __( 'Copyright Background Color', '3dprinting' ),
            'subtitle' => __( 'Controls the background of the copyright.', '3dprinting' ),
            'default'   => '#171717',
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the border colors top of the Copyright.', '3dprinting'),
            'id' => 'footer_copyright_border_color',
            'type' => 'color',
            'title' => __('Copyright Borders Color', '3dprinting'),
            'default' => '#CDCDCD',
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'title'       => esc_html__( 'Copyright Borders Width Top', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the width of the Copyright border top, ex: 2px.', '3dprinting' ),
            'id'          => 'footer_copyright_border_width_top',
            'type'        => 'slider',
            "default"   => 0,
            "min"       => 0,
            "step"      => 1,
            "max"       => 50,
            'display_value' => 'label',
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'title' => __('Copyright Alignment', '3dprinting'),
            'subtitle' => esc_html__( 'Controls Copyright alignment.','3dprinting'),
            'id' => 'footer_copyright_alignment',
            'default'     => 'left',
            'type'        => 'button_set',
            'options'     => array(
                'left'    => esc_html__( 'Left', '3dprinting' ),
                'center'   => esc_html__( 'Center', '3dprinting' ),
                'right'   => esc_html__( 'Right', '3dprinting' ),
            ),
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'id'=>'footer_copyright_text',
            'type' => 'textarea',
            'title' => __('Copyright Text', '3dprinting'),
            'subtitle' => __('Enter the text that displays in the copyright bar. HTML markup can be used.', '3dprinting'),
            'validate' => 'html_custom',
            'default' => '© Copyright <script>document.write(new Date().getFullYear());</script>   |   3D Printing Theme by <a href="//cms-theme.net”" target="_blank">ZoTheme</a>   |   All Rights Reserved.',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'script' => array()
            ),
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text color of the Copyright font.', '3dprinting'),
            'id' => 'footer_copyright_font_color',
            'type' => 'color',
            'transparent' => false,
            'title' => __('Copyright Font Color', '3dprinting'),
            'default' => '#fff',
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('Controls the text color of the Copyright link font.', '3dprinting'),
            'id' => 'footer_copyright_link_color',
            'type' => 'color',
            'transparent' => false,
            'title' => __('Copyright Link Color', '3dprinting'),
            'default' => '#fff',
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'id'       => 'footer_copyright_extra',
            'type'     => 'select',
            'title'    => __('Copyright Extra Content', '3dprinting'),
            'subtitle' => __('Controls the other info to displays in the copyright bar.', '3dprinting'),
            'options'  => array(
                '0' => 'None',
                '1' => 'Social Links',
                '2' => 'Copyright Extra Sidebar',
            ),
            'default'  => '2',
            'required' => array( 0 => 'footer_copyright', 1 => '=', 2 => 1 )
        ),
        array(
            'title' => __('Copyright Extra Position', '3dprinting'),
            'subtitle' => esc_html__( 'Controls where to displays in the Copyright area. (Symmetric is not avalaible when Copyright Alignment center)','3dprinting'),
            'id' => 'footer_copyright_extra_position',
            'default'     => 'symmetric',
            'type'        => 'button_set',
            'options'     => array(
                'above'    => esc_html__( 'Above', '3dprinting' ),
                'bellow'   => esc_html__( 'Bellow', '3dprinting' ),
                'symmetric'   => esc_html__( 'Symmetric', '3dprinting' ),
            ),
            'required' => array( 0 => 'footer_copyright_extra', 1 => 'is_larger', 2 => 0 )
        ),
    )
);


/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Typography', '3dprinting'),
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#555555',
                'font-weight' => '300',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '16px',
                'line-height' => '25px',
            ),
            'subtitle' => __('Typography option with each property can be called individually.', '3dprinting'),
            'desc' => esc_html__('No units were entered for font-size, falling back to using pixels. Saved value "0" and not "". No units were entered for letter-spacing, falling back to using pixels. Saved value "0" and not "".','3dprinting')
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1 Headers Typography', '3dprinting'),
            'subtitle' => __('These settings control the typography for all H1 Headers.', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#313131',
                'font-weight' => '400',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '32px',
                'line-height' => '35px'
            )
        ),
        array(
            'id' => 'font_h1_margin',
            'title' => __('H1 Headers Margin', '3dprinting'),
            'subtitle' => __('Controls the top/bottom margins for the H1. Enter values including any valid CSS unit, ex: 0px, 15px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '0',
                'margin-bottom'  => '15px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2 Headers Typography', '3dprinting'),
            'subtitle' => __('These settings control the typography for all H2 Headers.', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#313131',
                'font-weight' => '400',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '25px',
                'line-height' => '30px'
            )
        ),
        array(
            'id' => 'font_h2_margin',
            'title' => __('H2 Headers Margin', '3dprinting'),
            'subtitle' => __('Controls the top/bottom margins for the H2. Enter values including any valid CSS unit, ex: 0px, 15px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '0',
                'margin-bottom'  => '15px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3 Headers Typography', '3dprinting'),
            'subtitle' => __('These settings control the typography for all H3 Headers.', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#313131',
                'font-weight' => '400',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '20px',
                'line-height' => '25px'
            )
        ),
        array(
            'id' => 'font_h3_margin',
            'title' => __('H3 Headers Margin', '3dprinting'),
            'subtitle' => __('Controls the top/bottom margins for the H3. Enter values including any valid CSS unit, ex: 0px, 15px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '0',
                'margin-bottom'  => '15px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4 Headers Typography', '3dprinting'),
            'subtitle' => __('These settings control the typography for all H4 Headers.', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#313131',
                'font-weight' => '300',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '19px',
                'line-height' => '24px'
            )
        ),
        array(
            'id' => 'font_h4_margin',
            'title' => __('H4 Headers Margin', '3dprinting'),
            'subtitle' => __('Controls the top/bottom margins for the H4. Enter values including any valid CSS unit, ex: 0px, 15px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '0',
                'margin-bottom'  => '15px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5 Headers Typography', '3dprinting'),
            'subtitle' => __('These settings control the typography for all H5 Headers.', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#313131',
                'font-weight' => '300',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '18px',
                'line-height' => '22px'
            )
        ),
        array(
            'id' => 'font_h5_margin',
            'title' => __('H5 Headers Margin', '3dprinting'),
            'subtitle' => __('Controls the top/bottom margins for the H5. Enter values including any valid CSS unit, ex: 0px, 15px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '0',
                'margin-bottom'  => '15px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6 Headers Typography', '3dprinting'),
            'subtitle' => __('These settings control the typography for all H6 Headers.', '3dprinting'),
            'letter-spacing' => true,
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#313131',
                'font-weight' => '400',
                'font-family' => 'Roboto Condensed',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '16px',
                'line-height' => '20px'
            )
        ),
        array(
            'id' => 'font_h6_margin',
            'title' => __('H6 Headers Margin', '3dprinting'),
            'subtitle' => __('Controls the top/bottom margins for the H6. Enter values including any valid CSS unit, ex: 0px, 15px..', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '0',
                'margin-bottom'  => '15px',
                'units'          => 'px',
            )
        ),
    )
);
/* Responsive headings */
$this->sections[] = array(
    'title' => __('Mobile Headings', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Turn on for headings (H1 to H6) to change font size responsively on Mobile device.', '3dprinting'),
            'id' => 'mobile_heading',
            'type' => 'switch',
            'title' => __('Mobile Headings Typography', '3dprinting'),
            'default' => false,
        ),
        array(
            'title'       => esc_html__( 'Mobile Headings Typography Sensitivity', '3dprinting' ),
            'subtitle' => esc_html__( 'Values below 100% decrease rate of resizing, values above 100% increase rate of resizing. (In percent)', '3dprinting' ),
            'id'          => 'mobile_heading_sensitivity',
            'type'        => 'slider',
            "default"   => 70,
            "min"       => 30,
            "step"      => 5,
            "max"       => 200,
            'display_value' => 'text',
            'required' => array(0 => 'mobile_heading', 1 => '=', 2 => 1)
        ),
    )
);
/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Extra Font 1', '3dprinting'),
            'subtitle' => __('Select a font to use throughout Typography settings', '3dprinting'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
			'font-weight'=> false,
            'subsets'=> false,
            'default' => array(
                'font-family' => 'Fjalla One'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => __('Elements', '3dprinting'),
            'subtitle' => __('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', '3dprinting'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font1',
            'required' => array(
                0 => 'google-font-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Extra Font 2', '3dprinting'),
            'subtitle' => __('Select a font to use throughout Typography settings', '3dprinting'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
			'font-weight'=> false,
            'subsets'=> false,
            'default' => array(
                'font-family' => 'Oswald'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => __('Elements', '3dprinting'),
            'subtitle' => __('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', '3dprinting'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font2',
            'required' => array(
                0 => 'google-font-2',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => __('Extra Font 3', '3dprinting'),
            'subtitle' => __('Select a font to use throughout Typography settings', '3dprinting'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
			'font-weight'=> false,
            'subsets'=> false,
            'default' => array(
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-selector-3',
            'type' => 'textarea',
            'title' => __('Elements', '3dprinting'),
            'subtitle' => __('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', '3dprinting'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font3',
            'required' => array(
                0 => 'google-font-3',
                1 => '!=',
                2 => ''
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => __('Local Fonts', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => __( 'Fonts 1', '3dprinting' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', '3dprinting'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', '3dprinting'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => __( 'Fonts 2', '3dprinting' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', '3dprinting'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', '3dprinting'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

$this->sections[] = array(
    'title' => __('Button', '3dprinting'),
    'icon' => 'el el-minus',
    'fields' => array(
        array(
            'id'    => 'btn_primary_info',
            'type'  => 'info',
            'style' => 'success',
            'title' => __('Setting for Primary Button', '3dprinting'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => __( 'This is a setting for Primary button, output class is <strong style="color: red;">btn-primary</strong> [You can using that class anywhere on the website]', '3dprinting'),
        ),
        array(
            'id' => 'btn_primary',
            'type' => 'link_color',
            'title' => __('Primary Button Background Color', '3dprinting'),
            'subtitle' => __('Controls the background color for the Primary button', '3dprinting'),
            'active' => false,
            'default' => array(
				'regular'  => '#0d6cbe',
				'hover'    => '#000',
			)
        ),
        array(
            'id' => 'btn_primary_color',
            'type' => 'link_color',
            'title' => __('Primary Button Color', '3dprinting'),
            'subtitle' => __('Controls the color for the Primary button', '3dprinting'),
            'active' => false,
            'default' => array(
				'regular'  => '#FFF',
				'hover'    => '#FFF',
			)
        ),
        array(
            'id' => 'btn_primary_padding',
            'title' => __('Primary Button Padding', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '10px',
                'padding-right'   => '20px',
                'padding-bottom'  => '10px',
                'padding-left'    => '20px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'btn_primary_border',
            'title' => __('Primary Button Border', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left border for the button', '3dprinting'),
            'type' => 'border',
            'default'  => array(
                'border-color'  => '#FFFFFF',
                'border-style'  => 'solid',
                'border-width'    => '1px'
            )
        ),
        array(
            'title'       => esc_html__( 'Primary Button Border', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the border radius for the button', '3dprinting' ),
            'id'          => 'btn_primary_border_radius',
            'type'        => 'slider',
            "default"   => 2,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
        ),
        array(
            'id' => 'btn_primary_font',
            'type' => 'typography',
            'title' => __('Primary Button Font', '3dprinting'),
            'subtitle' => __('Controls the font styles for the Primary button', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '16px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '20px',
                'font-family' => 'Roboto Condensed',
            )
        ),
    ),
);
$this->sections[] = array(
    'title' => __('Secondary', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'    => 'btn_secondary_info',
            'type'  => 'info',
            'style' => 'success',
            'title' => __('Setting for Secondary Button', '3dprinting'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => __( 'This is a setting for Secondary button, output class is <strong style="color: red;">btn-secondary</strong> [You can using that class anywhere on the website]', '3dprinting'),
        ),
        array(
            'id' => 'btn_secondary',
            'type' => 'link_color',
            'title' => __('Secondary Button Background Color', '3dprinting'),
            'subtitle' => __('Controls the background color for the secondary button', '3dprinting'),
            'active' => false,
            'default' => array(
				'regular'  => '#414141',
				'hover'    => '#CDCDCD',
			)
        ),
        array(
            'id' => 'btn_secondary_color',
            'type' => 'link_color',
            'title' => __('Secondary Button Color', '3dprinting'),
            'subtitle' => __('Controls the color for the secondary button', '3dprinting'),
            'active' => false,
            'default' => array(
				'regular'  => '#FFF',
				'hover'    => '#1e73be',
			)
        ),
        array(
            'id' => 'btn_secondary_padding',
            'title' => __('Secondary Button Padding', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', '3dprinting'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '10px',
                'padding-right'   => '20px',
                'padding-bottom'  => '10px',
                'padding-left'    => '20px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'btn_secondary_border',
            'title' => __('Secondary Button Border', '3dprinting'),
            'subtitle' => __('Controls the top/right/bottom/left border for the button', '3dprinting'),
            'type' => 'border',
            'default'  => array(
                'border-color'  => '#1e73be',
                'border-style'  => 'solid',
                'border-width'    => '1px'
            )
        ),
        array(
            'title'       => esc_html__( 'Primary Button Border', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the border radius for the button', '3dprinting' ),
            'id'          => 'btn_secondary_border_radius',
            'type'        => 'slider',
            "default"   => 0,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
        ),
        array(
            'id' => 'btn_secondary_font',
            'type' => 'typography',
            'title' => __('Secondary Button Font', '3dprinting'),
            'subtitle' => __('Controls the font styles for the secondary button', '3dprinting'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '16px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '20px',
            )
        ),
    ),
);

/**
 * Blog
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Blog', '3dprinting'),
    'icon' => 'el el-file-edit',
    'fields' => array(
        array(
            'subtitle' => __('Turn on to have the blog content area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'blog_layout_width',
            'type' => 'switch',
            'title' => __('100% Width Blog', '3dprinting'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Turn on to show the page title bar for the assigned blog page or archive pages', '3dprinting'),
            'id' => 'blog_pt_bar',
            'type' => 'switch',
            'title' => __('Page Title Bar', '3dprinting'),
            'default' => true,
        ),
        array(
            'title' => __('Blog Page Title', '3dprinting'),
            'subtitle' => __('Controls the title text that displays in the page title bar of the assigned blog page.', '3dprinting'),
            'id' => 'blog_pt',
            'type' => 'text',
            'default' => 'Blog',
            'required' => array( 0 => 'blog_pt_bar', 1 => '=', 2 => 1)
        ),
		array(
            'title' => __('Blog Sub Title', '3dprinting'),
            'subtitle' => __('Controls the subtitle text that displays in the page title bar of the assigned blog page.', '3dprinting'),
            'id' => 'blog_pt_sub',
            'type' => 'text',
            'default' => '',
            'required' => array( 0 => 'blog_pt_bar', 1 => '=', 2 => 1)
        ),
        array(
            'id'       => 'blog_layout',
            'type'     => 'select',
            'title'    => __('Blog Layout', '3dprinting'),
            'subtitle' => __('Controls the layout for the assigned blog page', '3dprinting'),
            'options'  => array(
                'medium' => 'Medium',
                'large' => 'Large',
                'grid' => 'Grid',
            ),
            'default'  => 'large',
        ),
        array(
            'title'       => esc_html__( 'Grid Layout Columns', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the amount of columns for the grid layout when using it for the assigned blog page.', '3dprinting' ),
            'id'          => 'blog_layout_grid',
            'type'        => 'slider',
            "default"   => 2,
            "min"       => 2,
            "step"      => 1,
            "max"       => 4,
            'display_value' => 'text',
            'required' => array(0 => 'blog_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'subtitle' => __('Turn on to the masonry grid for the assigned blog page.', '3dprinting'),
            'id' => 'blog_layout_grid_masonry',
            'type' => 'switch',
            'title' => __('Masonry Model', '3dprinting'),
            'default' => false,
            'required' => array(0 => 'blog_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'title' => __('Display Sidebar', '3dprinting'),
            'subtitle' => esc_html__( 'Controls the main sidebar for the Blog Layout','3dprinting'),
            'id' => 'blog_layout_sidebar',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'left'   => esc_html__( 'Left Sidebar', '3dprinting' ),
                'right'   => esc_html__( 'Right Sidebar', '3dprinting' ),
            ),
        ),
        array(
            'id'       => 'blog_archive_layout',
            'type'     => 'select',
            'title'    => __('Blog Archive Layout', '3dprinting'),
            'subtitle' => __('Controls the layout for the blog archive, tag and author pages.', '3dprinting'),
            'options'  => array(
                'medium' => 'Medium',
                'large' => 'Large',
                'grid' => 'Grid',
            ),
            'default'  => 'medium',
        ),
        array(
            'title'       => esc_html__( 'Grid Archive Layout Columns', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the amount of columns for the Grid Archive, tag and author layout', '3dprinting' ),
            'id'          => 'blog_archive_layout_grid',
            'type'        => 'slider',
            "default"   => 3,
            "min"       => 2,
            "step"      => 1,
            "max"       => 4,
            'display_value' => 'text',
            'required' => array(0 => 'blog_archive_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'subtitle' => __('Turn on to the masonry grid for the Archive, tag and author page', '3dprinting'),
            'id' => 'blog_archive_layout_grid_masonry',
            'type' => 'switch',
            'title' => __('Masonry Model', '3dprinting'),
            'default' => false,
            'required' => array(0 => 'blog_archive_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'title' => __('Display Sidebar', '3dprinting'),
            'subtitle' => esc_html__( 'Controls the main sidebar for the blog archive, tag and author Layout','3dprinting'),
            'id' => 'blog_archive_layout_sidebar',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'left'   => esc_html__( 'Left Sidebar', '3dprinting' ),
                'right'   => esc_html__( 'Right Sidebar', '3dprinting' ),
            ),
        ),
        array(
            'id'       => 'blog_search_layout',
            'type'     => 'select',
            'title'    => __('Blog Search Layout', '3dprinting'),
            'subtitle' => __('Controls the layout for the blog Search result pages.', '3dprinting'),
            'options'  => array(
                'medium' => 'Medium',
                'large' => 'Large',
                'grid' => 'Grid',
            ),
            'default'  => 'grid',
        ),
        array(
            'title'       => esc_html__( 'Grid Archive Layout Columns', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the amount of columns for the Grid Search layout', '3dprinting' ),
            'id'          => 'blog_search_layout_grid',
            'type'        => 'slider',
            "default"   => 2,
            "min"       => 2,
            "step"      => 1,
            "max"       => 4,
            'display_value' => 'text',
            'required' => array(0 => 'blog_search_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'subtitle' => __('Turn on to the masonry grid for the search page', '3dprinting'),
            'id' => 'blog_search_layout_grid_masonry',
            'type' => 'switch',
            'title' => __('Masonry Model', '3dprinting'),
            'default' => true,
            'required' => array(0 => 'blog_search_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'title' => __('Display Sidebar', '3dprinting'),
            'subtitle' => esc_html__( 'Controls the main sidebar for the blog search Layout','3dprinting'),
            'id' => 'blog_search_layout_sidebar',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'left'   => esc_html__( 'Left Sidebar', '3dprinting' ),
                'right'   => esc_html__( 'Right Sidebar', '3dprinting' ),
            ),
        ),
    )
);


/* Blog Meta */
$this->sections[] = array(
    'title' => __('Blog Meta', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the pagination type for the assigned blog page', '3dprinting'),
            'id' => 'blog_pagination',
            'type' => 'button_set',
            'title' => __('Pagination Type', '3dprinting'),
            'default' => 'pagination',
            'options' => array(
                'pagination' => esc_html__( 'Pagination', '3dprinting' ),
                'button' => esc_html__( 'Load More Button', '3dprinting' ),
            )
        ),
        array(
            'title'       => esc_html__( 'Excerpt Length', '3dprinting' ),
            'subtitle' => esc_html__( 'Controls the number of words in the post excerpts for the assigned blog page', '3dprinting' ),
            'id'          => 'blog_excerpt',
            'type'        => 'slider',
            "default"   => 30,
            "min"       => 0,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text',
        ),
        array(
            'subtitle' => __('Turn on to show the Read More button for the blog page or archive pages', '3dprinting'),
            'id' => 'blog_post_readmore',
            'type' => 'switch',
            'title' => __('Display Read More button', '3dprinting'),
            'default' => true,
        ),
		array(
            'title' => __('Read More Text', '3dprinting'),
            'subtitle' => __('Controls the text to displays in the Read More button', '3dprinting'),
            'id' => 'blog_post_readmore_text',
            'type' => 'text',
            'default' => '[Read more]',
            'required' => array( 0 => 'blog_post_readmore', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => __('Turn on to show the image / video for the blog page or archive pages', '3dprinting'),
            'id' => 'blog_post_feature_media',
            'type' => 'switch',
            'title' => __('Featured Image / Video on Blog Page', '3dprinting'),
            'default' => true,
        ),
        array(
            'title' => __('Post Title', '3dprinting'),
            'subtitle' => __('Turn on to display the post title that goes below the featured image on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Author Info', '3dprinting'),
            'subtitle' => __('Turn on to display the author info on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Blog Date', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta date on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Date Format', '3dprinting'),
            'subtitle' => __('Controls the date format that displays in the post on the blog page or archive pages. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', '3dprinting'),
            'id' => 'blog_post_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'blog_post_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => __('Post Categories', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta categories on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_categories',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Post Tags', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta tags on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_tags',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => __('Post Comments', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta comments on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_comment',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Social Sharing Box', '3dprinting'),
            'subtitle' => __('Turn on to display the social sharing box on the blog page or archive pages.', '3dprinting'),
            'id' => 'blog_post_social',
            'type' => 'switch',
            'default' => false,
        ),
    )
);

/* Single Posts */
$this->sections[] = array(
    'title' => __('Single Posts', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Turn on to have the single post content area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'blog_single_width',
            'type' => 'switch',
            'title' => __('100% Width Single Post', '3dprinting'),
            'default' => false,
        ),
        array(
            'title' => __('Display Sidebar', '3dprinting'),
            'subtitle' => esc_html__( 'Controls the main sidebar for the single blog post','3dprinting'),
            'id' => 'blog_single_sidebar',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'left'   => esc_html__( 'Left Sidebar', '3dprinting' ),
                'right'   => esc_html__( 'Right Sidebar', '3dprinting' ),
            ),
        ),
        array(
            'title' => __('Featured Image / Video on Single Post', '3dprinting'),
            'subtitle' => __('Turn on to display featured images and videos on single blog posts.', '3dprinting'),
            'id' => 'blog_single_media',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Post Title', '3dprinting'),
            'subtitle' => __('Turn on to display the post title that goes below the featured image area.', '3dprinting'),
            'id' => 'blog_single_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Author Info Box', '3dprinting'),
            'subtitle' => __('Turn on to display the author info box below posts.', '3dprinting'),
            'id' => 'blog_single_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Post Date', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta date.', '3dprinting'),
            'id' => 'blog_single_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Date Format', '3dprinting'),
            'subtitle' => __('Controls the date format that displays in the post. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', '3dprinting'),
            'id' => 'blog_single_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'blog_single_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => __('Post Categories', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta categories.', '3dprinting'),
            'id' => 'blog_single_categories',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Post Tags', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta tags.', '3dprinting'),
            'id' => 'blog_single_tags',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Social Sharing Box', '3dprinting'),
            'subtitle' => __('Turn on to display the social sharing box.', '3dprinting'),
            'id' => 'blog_single_social',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Previous/Next Pagination', '3dprinting'),
            'subtitle' => __('Turn on to display the previous/next post pagination for single blog posts.', '3dprinting'),
            'id' => 'blog_single_pagination',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Related Posts', '3dprinting'),
            'subtitle' => __('Turn on to display related posts.', '3dprinting'),
            'id' => 'blog_single_related',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Comments', '3dprinting'),
            'subtitle' => __('Turn on to display comments.', '3dprinting'),
            'id' => 'blog_single_comment',
            'type' => 'switch',
            'default' => true,
        ),
    ),
);

/* Portfolio */
$this->sections[] = array(
    'title' => __('Portfolio', '3dprinting'),
    'icon' => 'el el-tasks',
    'fields' => array(
        array(
            'subtitle' => __('Turn on to have the portfolio content area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'portfolio_width',
            'type' => 'switch',
            'title' => __('100% Width Portfolio', '3dprinting'),
            'default' => false,
        ),
        array(
            'id'       => 'portfolio_background',
            'type'     => 'background',
            'title'    => __( 'Portfolio Background', '3dprinting' ),
            'subtitle' => __( 'Controls the background of the portfolio page title.', '3dprinting' ),
            'default'   => array(
                'background-color'=>'#FFF',
                'background-image'=> get_template_directory_uri().'/assets/images/3dprinting-pagetitlle.jpg',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            )
        ),
        array(
            'title' => __('Display Sidebar', '3dprinting'),
            'subtitle' => esc_html__( 'Controls the main sidebar for the portfolio archive','3dprinting'),
            'id' => 'portfolio_sidebar',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'left'   => esc_html__( 'Left Sidebar', '3dprinting' ),
                'right'   => esc_html__( 'Right Sidebar', '3dprinting' ),
            ),
        ),
        array(
            'title' => __('Featured Image / Video on Portfolio', '3dprinting'),
            'subtitle' => __('Turn on to display featured images and videos on portfolio archive.', '3dprinting'),
            'id' => 'portfolio_media',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Title', '3dprinting'),
            'subtitle' => __('Turn on to display the post title on portfolio archive', '3dprinting'),
            'id' => 'portfolio_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Author', '3dprinting'),
            'subtitle' => __('Turn on to display the author on portfolio archive', '3dprinting'),
            'id' => 'portfolio_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Client', '3dprinting'),
            'subtitle' => __('Turn on to display the client on portfolio archive.', '3dprinting'),
            'id' => 'portfolio_client',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Date', '3dprinting'),
            'subtitle' => __('Turn on to display the portfolio date on portfolio archive.', '3dprinting'),
            'id' => 'portfolio_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Date Format', '3dprinting'),
            'subtitle' => __('Controls the date format that displays on portfolio archive. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', '3dprinting'),
            'id' => 'portfolio_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'portfolio_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => __('Categories', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta categories on portfolio archive.', '3dprinting'),
            'id' => 'portfolio_categories',
            'type' => 'switch',
            'default' => true,
        )
    ),
);
/* Portfolio */
$this->sections[] = array(
    'title' => __('Single Post', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Turn on to have the portfolio content area display at 100% width according to the window size. Turn off to follow site width.', '3dprinting'),
            'id' => 'portfolio_single_width',
            'type' => 'switch',
            'title' => __('100% Width Portfolio', '3dprinting'),
            'default' => false,
        ),
        array(
            'title' => __('Display Sidebar', '3dprinting'),
            'subtitle' => esc_html__( 'Controls the main sidebar for the portfolio post','3dprinting'),
            'id' => 'portfolio_single_sidebar',
            'default'     => 'right',
            'type'        => 'button_set',
            'options'     => array(
                'none'    => esc_html__( 'None', '3dprinting' ),
                'left'   => esc_html__( 'Left Sidebar', '3dprinting' ),
                'right'   => esc_html__( 'Right Sidebar', '3dprinting' ),
            ),
        ),
        array(
            'title' => __('Featured Image / Video on Portfolio', '3dprinting'),
            'subtitle' => __('Turn on to display featured images and videos on portfolio posts.', '3dprinting'),
            'id' => 'portfolio_single_media',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Title', '3dprinting'),
            'subtitle' => __('Turn on to display the post title that goes below the featured image area.', '3dprinting'),
            'id' => 'portfolio_single_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Author', '3dprinting'),
            'subtitle' => __('Turn on to display the author below posts.', '3dprinting'),
            'id' => 'portfolio_single_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Author Label', '3dprinting'),
            'subtitle' => __('Enter the label for Author. (such as: Author, Designer,...)', '3dprinting'),
            'id' => 'portfolio_single_author_label',
            'type' => 'text',
            'default' => 'Author',
            'required' => array( 0 => 'portfolio_single_author', 1 => '=', 2 => 1),
        ),
        array(
            'title' => __('Portfolio Client', '3dprinting'),
            'subtitle' => __('Turn on to display the client below posts.', '3dprinting'),
            'id' => 'portfolio_single_client',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Client Label', '3dprinting'),
            'subtitle' => __('Enter the label for Client. (such as: Client, Partner,...)', '3dprinting'),
            'id' => 'portfolio_single_client_label',
            'type' => 'text',
            'default' => 'Client',
            'required' => array( 0 => 'portfolio_single_client', 1 => '=', 2 => 1),
        ),
        array(
            'title' => __('Portfolio Date', '3dprinting'),
            'subtitle' => __('Turn on to display the portfolio meta date.', '3dprinting'),
            'id' => 'portfolio_single_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Date Label', '3dprinting'),
            'subtitle' => __('Enter the label for Date. (such as: Created Date, Puslished,...)', '3dprinting'),
            'id' => 'portfolio_single_date_label',
            'type' => 'text',
            'default' => 'Created Date',
            'required' => array( 0 => 'portfolio_single_date', 1 => '=', 2 => 1),
        ),
        array(
            'title' => __('Date Format', '3dprinting'),
            'subtitle' => __('Controls the date format that displays in the post. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', '3dprinting'),
            'id' => 'portfolio_single_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'portfolio_single_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => __('Portfolio Skills', '3dprinting'),
            'subtitle' => __('Turn on to display the skill below posts.', '3dprinting'),
            'id' => 'portfolio_single_skill',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Portfolio Skill Label', '3dprinting'),
            'subtitle' => __('Enter the label for Skill. (such as: Skill, Technical,...)', '3dprinting'),
            'id' => 'portfolio_single_skill_label',
            'type' => 'text',
            'default' => 'Skill',
            'required' => array( 0 => 'portfolio_single_skill', 1 => '=', 2 => 1),
        ),
        array(
            'title' => __('Categories', '3dprinting'),
            'subtitle' => __('Turn on to display the post meta categories.', '3dprinting'),
            'id' => 'portfolio_single_categories',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Social Sharing Box', '3dprinting'),
            'subtitle' => __('Turn on to display the social sharing box.', '3dprinting'),
            'id' => 'portfolio_single_social',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => __('Previous/Next Pagination', '3dprinting'),
            'subtitle' => __('Turn on to display the previous/next post pagination for portfolio posts.', '3dprinting'),
            'id' => 'portfolio_single_pagination',
            'type' => 'switch',
            'default' => true,
        ),
    ),
);

/* Social Links */
$this->sections[] = array(
    'title' => __('Social Media', '3dprinting'),
    'icon' => 'el el-share-alt',
    'fields' => array(
        array(
            'id'       => 'social_link_header_top',
            'type'     => 'checkbox',
            'title'    => __('Show in Header Top', '3dprinting'),
            'subtitle' => __('Select Socials to show in header top', '3dprinting'),
            'options'  => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'google' => 'Google Plus',
                'pinterest' => 'Pinterest',
                'vimeo' => 'Vimeo',
                'youtube' => 'Youtube',
                'linkedin' => 'LinkedIn',
                'dribbble' => 'Dribbble',
                'rss' => 'RSS',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'google' => '1',
                'pinterest' => '1',
                'vimeo' => '1',
                'dribbble' => '1',
                'youtube' => '1',
                'linkedin' => '1',
                'dribbble' => '1',
                'rss' => '1',
            )
        ),
        array(
            'id'       => 'social_link_copyright',
            'type'     => 'checkbox',
            'title'    => __('Show in Copyright Bar', '3dprinting'),
            'subtitle' => __('Select Socials to show in Copyright bar', '3dprinting'),
            'options'  => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'google' => 'Google Plus',
                'pinterest' => 'Pinterest',
                'vimeo' => 'Vimeo',
                'youtube' => 'Youtube',
                'linkedin' => 'LinkedIn',
                'dribbble' => 'Dribbble',
                'rss' => 'RSS',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'google' => '1',
                'pinterest' => '1',
                'vimeo' => '1',
                'dribbble' => '1',
                'youtube' => '1',
                'linkedin' => '1',
                'instagram' => '1',
                'rss' => '1',
            )
        ),
        array(
            'id'       => 'social_link_blog',
            'type'     => 'sortable',
            'mode'     => 'checkbox',
            'title'    => __('Social Share Box', '3dprinting'),
            'subtitle' => __('Controls the social share box on the blog post', '3dprinting'),
            'options'  => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'pinterest' => 'Pinterest',
                'google' => 'Google Plus',
                'linkedin' => 'LinkedIn',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'pinterest' => '1',
                'google' => '1',
                'linkedin' => '1',
            )
        ),
    )
);
$this->sections[] = array(
    'title' => __('Social Links', '3dprinting'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Input the Facebook Link', '3dprinting'),
            'id' => 'facebook',
            'type' => 'text',
            'title' => __('Facebook Link', '3dprinting'),
            'default' => '',
        ),
		array(
            'subtitle' => __('Input the Twitter Link', '3dprinting'),
            'id' => 'twitter',
            'type' => 'text',
            'title' => __('Twitter Link', '3dprinting'),
            'default' => '',
        ),
        array(
            'subtitle' => __('Input the Youtube Link', '3dprinting'),
            'id' => 'youtube',
            'type' => 'text',
            'title' => __('Youtube Link', '3dprinting'),
            'default' => '',
        ),
		array(
            'subtitle' => __('Input the Vimeo Link', '3dprinting'),
            'id' => 'vimeo',
            'type' => 'text',
            'title' => __('Vimeo Link', '3dprinting'),
            'default' => '',
        ),
        array(
            'subtitle' => __('Input the Instagram Link', '3dprinting'),
            'id' => 'instagram',
            'type' => 'text',
            'title' => __('Instagram Link', '3dprinting'),
            'default' => '',
        ),
		array(
            'subtitle' => __('Input the Google Plus Link', '3dprinting'),
            'id' => 'google',
            'type' => 'text',
            'title' => __('Google+ Link', '3dprinting'),
            'default' => '',
        ),
        array(
            'subtitle' => __('Input the Skype Link', '3dprinting'),
            'id' => 'skype',
            'type' => 'text',
            'title' => __('Skype Link', '3dprinting'),
            'default' => '',
        ),
		array(
            'subtitle' => __('Input the LinkedIn Link', '3dprinting'),
            'id' => 'linkedin',
            'type' => 'text',
            'title' => __('LinkedIn Link', '3dprinting'),
            'default' => '',
        ),
        array(
            'subtitle' => __('Input the RSS Link', '3dprinting'),
            'id' => 'rss',
            'type' => 'text',
            'title' => __('RSS Link', '3dprinting'),
            'default' => '',
        ),
		array(
            'subtitle' => __('Input the Yahoo Link', '3dprinting'),
            'id' => 'yahoo',
            'type' => 'text',
            'title' => __('Yahoo Link', '3dprinting'),
            'default' => '',
        ),
    )
);


/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */

$this->sections[] = array(
    'title' => __('Custom CSS', '3dprinting'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', '3dprinting'),
            'subtitle' => __('create your css code here.', '3dprinting'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);

/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Animations', '3dprinting'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation parallax for images...', '3dprinting'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', '3dprinting'),
            'default' => true
        ),
    )
);

/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Optimal Core', '3dprinting'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', '3dprinting'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', '3dprinting'),
            'default' => true
        )
    )
);
