<?php
/**
 * Auto create .css file from Theme Options
 * @author ZoTheme
 * @version 1.0.0
 */
 
class ZoTheme_StaticCss
{

    public $scss;

    function __construct()
    {
        global $smof_data;

        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data;
        if (! empty($smof_data)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */
            
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644 ) ) {
				_e( 'Error saving file!', '3dprinting' );
			}

            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            /* compile scss to css */
            $css = $this->scss_render();

            $file = "static.css";

            if(!empty($smof_data['presets_color']) && $smof_data['presets_color']){
                $file = "presets-".$smof_data['presets_color'].".css";
            }

            /* write static.css file */
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/css/' . $file, $css, 0644) ) {
				_e( 'Error saving file!', '3dprinting' );
			}
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_base, $zo_meta;
        ob_start();

        /* Local Fonts */
        $zo_base->setTypographyLocal($smof_data['local-fonts-1'], $smof_data['local-fonts-selector-1']);
        $zo_base->setTypographyLocal($smof_data['local-fonts-2'], $smof_data['local-fonts-selector-2']);
		/* Extra Fonts */
		$zo_base->setGoogleFont($smof_data['google-font-1'], wp_filter_nohtml_kses($smof_data['google-font-selector-1']));
		$zo_base->setGoogleFont($smof_data['google-font-2'], wp_filter_nohtml_kses($smof_data['google-font-selector-2']));
		$zo_base->setGoogleFont($smof_data['google-font-3'], wp_filter_nohtml_kses($smof_data['google-font-selector-3']));
		zo_setvariablescss($smof_data['primary_color'],'$primary_color','#fcc403');
		zo_setvariablescss($smof_data['link_color']['regular'],'$link_color','#333333');
		zo_setvariablescss($smof_data['link_color']['hover'],'$link_color_hover','#fcc403');
        /* ==========================================================================
           Start Header
        ========================================================================== */
        // Page Layout
        if(!empty($smof_data['body_width']) && is_numeric($smof_data['body_width'])){
            $width = (int)$smof_data['body_width'];
        }
        echo '@media(min-width: 1170px) {';
            echo 'body.zo-boxed #page{';
            echo 'width: ' . $width . 'px;';
            echo '}';
            echo 'body.zo-boxed #page .header-fixed{';
            echo 'width: ' . $width . 'px;';
            echo 'max-width: 100%;';
            echo '}';
            echo 'body.zo-boxed #page .header-transparent{';
            echo 'width: ' . $width . 'px;';
            echo 'max-width: 100%;';
            echo '}';
            echo 'body.zo-boxed #zo-header{';
            echo 'width: ' . $width . 'px;';
            echo '}';
        echo '}';
        /* Header Main */
        if(!empty($smof_data['header_padding'])) {
            echo '#zo-header {';

            // Padding
            if(!empty($smof_data['header_padding']['padding-top']))
                echo 'padding-top: ' . esc_attr($smof_data['header_padding']['padding-top']) . ';';
            if(!empty($smof_data['header_padding']['padding-left']))
                echo 'padding-left: ' . esc_attr($smof_data['header_padding']['padding-left']) . ';';
            if(!empty($smof_data['header_padding']['padding-bottom']))
                echo 'padding-bottom: ' . esc_attr($smof_data['header_padding']['padding-bottom']) . ';';
            if(!empty($smof_data['header_padding']['padding-right']))
                echo 'padding-right: ' . esc_attr($smof_data['header_padding']['padding-right']) . ';';

            echo '}';
        }
        //SETTING LOGO
        if(!empty($smof_data['logo_margin'])){
            echo '#zo-header #zo-header-logo{ display: block;';
            // Margin
            if(!empty($smof_data['logo_margin']['margin-top']))
                echo 'margin-top: ' . esc_attr($smof_data['logo_margin']['margin-top']) . ';';
            if(!empty($smof_data['logo_margin']['margin-left']))
                echo 'margin-left: ' . esc_attr($smof_data['logo_margin']['margin-left']) . ';';
            if(!empty($smof_data['logo_margin']['margin-bottom']))
                echo 'margin-bottom: ' . esc_attr($smof_data['logo_margin']['margin-bottom']) . ';';
            if(!empty($smof_data['logo_margin']['margin-right']))
                echo 'margin-right: ' . esc_attr($smof_data['logo_margin']['margin-right']) . ';';
            if(!empty($smof_data['logo_position'])){
                if($smof_data['logo_position']=='right'){
                    echo 'float: right;';
                }else{
                    echo 'float: left;';
                }
            }
            echo '}';
			echo '@media (max-width: 768px) { ';
				echo '#zo-header #zo-header-logo{ margin-right: 0; }';
			echo '}';
        }
        if(isset($smof_data['sticky_logo']['url']) && !empty($smof_data['sticky_logo']['url'])){
            echo '#zo-header.header-fixed .zo-main-logo{
                    display: none;
            }';
        }
        //SETTING STICKY LOGO
        if(!empty($smof_data['sticky_logo_margin'])){
            echo '#zo-header.header-fixed #zo-header-logo{';
            // Margin
            if(!empty($smof_data['sticky_logo_margin']['margin-top']))
                echo 'margin-top: ' . esc_attr($smof_data['sticky_logo_margin']['margin-top']) . ';';
            if(!empty($smof_data['sticky_logo_margin']['margin-left']))
                echo 'margin-left: ' . esc_attr($smof_data['sticky_logo_margin']['margin-left']) . ';';
            if(!empty($smof_data['sticky_logo_margin']['margin-bottom']))
                echo 'margin-bottom: ' . esc_attr($smof_data['sticky_logo_margin']['margin-bottom']) . ';';
            if(!empty($smof_data['sticky_logo_margin']['margin-right']))
                echo 'margin-right: ' . esc_attr($smof_data['sticky_logo_margin']['margin-right']) . ';';
            echo '}';
        }
        if(!empty($smof_data['logo_position'])){
            echo '#zo-header .zo-header-secondary{';
            if($smof_data['logo_position']=='right'){
                echo 'float: left;';
            }else if($smof_data['menu_alignment']=='left'){
                echo 'float: left;';
            }else{
                echo 'float: right;';
            }
            echo '}';
            if($smof_data['logo_position']=='right'){
                echo '#zo-menu-mobile {
                    position: absolute;
                    left: 15px;
                    bottom: calc(50% - 15px);
                }';
            }else{
                echo '#zo-menu-mobile {
                    position: absolute;
                    right: 15px;
                    bottom: calc(50% - 15px);
                }';
            }
        }
        //MENU HEIGHT
        if(!empty($smof_data['nav_height'])){
            echo '#zo-header .zo-header-navigation .nav-menu > li > a {';
            echo 	'line-height: ' . esc_attr($smof_data['nav_height']) . 'px;';
            echo '}';
            echo '#zo-header-navigation-right { line-height: ' . esc_attr($smof_data['nav_height']) . 'px;}';
            echo '@media (max-width: 992px){ .widget_cart_search_wrap_item > a.icon { line-height: ' . esc_attr($smof_data['nav_height']) . 'px;} }';
            echo '#zo-header .zo-header-secondary .header-top-contact{ line-height: ' . esc_attr($smof_data['nav_height']) . 'px;}';
        }
        //MENU STICKY HEIGHT
        if(!empty($smof_data['sticky_nav_height'])){
            echo '.header-fixed .nav-menu > li > a {';
            echo 'line-height: ' . esc_attr($smof_data['sticky_nav_height']) . 'px;';
            echo '}';
            echo '.header-fixed #zo-header-navigation-right{ line-height: ' . esc_attr($smof_data['sticky_nav_height']) . 'px;}';
        }

        //Header Top Background
        if(!empty($smof_data['bg_header_top_color'])){
            echo '#zo-header-top{';
            echo zo_general_background($smof_data['bg_header_top_color']);
            echo '}';
        }

        if(!empty($smof_data['header_top_height'])){
            echo '#zo-header-top{';
            echo 'min-height: ' . esc_attr($smof_data['header_top_height']) . 'px;';
            echo '}';
            echo '#zo-header-top .header-top-social li{';
            echo 'line-height: ' . esc_attr($smof_data['header_top_height']) . 'px;';
            echo '}';
            echo '#zo-header-top .header-top-contact li{';
            echo 'line-height: ' . esc_attr($smof_data['header_top_height']) . 'px;';
            echo '}';
            echo '#zo-header-top .header-top-navigation > li > a{';
            echo 'line-height: ' . esc_attr($smof_data['header_top_height']) . 'px;';
            echo '}';
        }//'output'  => array('body #zo-header-top'),
        //Header content left
        if(!empty($smof_data['content_left_alignment'])){
            echo '#zo-header-top .header-top-left {';
            echo 'text-align: ' . esc_attr($smof_data['content_left_alignment']) . ';';
            echo '}';
        }
        //Header content right
        if(!empty($smof_data['content_right_alignment']) && $smof_data['content_right_alignment'] == 'right'){
            echo '#zo-header-top .header-top-right {';
            echo 'text-align: ' . esc_attr($smof_data['content_right_alignment']) . ';';
            echo '}';
        }

        //Navigation padding
        if(!empty($smof_data['nav_padding'])){
            echo '.zo-header-navigation .nav-menu > li {
                padding-right: ' . $smof_data['nav_padding'] . 'px;
            }';
        }
        //Nav Indicator
        if(!empty($smof_data['nav_indicator']) && !$smof_data['nav_indicator']){
            echo '.zo-header-navigation .zo-menu-toggle {display: none;}';
        }

        /* End Header Main */

        /* Sticky Header */
        if(!empty($smof_data['sticky_header_bg_image'])) {
            echo '#zo-header.header-fixed {';
            $sticky_bg = $smof_data['sticky_header_bg_image'];

            echo zo_general_background($sticky_bg);
            if(!empty($smof_data['sticky_header_bg_color'])){
                echo 'background-color:' . $smof_data['sticky_header_bg_color']['rgba'] . ';';
            }else{
                echo 'background-color: #FFFFFF;';
            }
            // Padding
            if(!empty($smof_data['sticky_header_padding']['padding-top']))
                echo 'padding-top: ' . esc_attr($smof_data['sticky_header_padding']['padding-top']) . ';';
            if(!empty($smof_data['sticky_header_padding']['padding-left']))
                echo 'padding-left: ' . esc_attr($smof_data['sticky_header_padding']['padding-left']) . ';';
            if(!empty($smof_data['sticky_header_padding']['padding-bottom']))
                echo 'padding-bottom: ' . esc_attr($smof_data['sticky_header_padding']['padding-bottom']) . ';';
            if(!empty($smof_data['sticky_header_padding']['padding-right']))
                echo 'padding-right: ' . esc_attr($smof_data['sticky_header_padding']['padding-right']) . ';';

            echo '}';
        }
        //SETTING LOGO
        if(!empty($smof_data['sticky_logo_margin'])){
            echo '#zo-header .header-fixed #zo-header-logo{';
            // Margin
            if(!empty($smof_data['sticky_logo_margin']['margin-top']))
                echo 'margin-top: ' . esc_attr($smof_data['sticky_logo_margin']['margin-top']) . ';';
            if(!empty($smof_data['sticky_logo_margin']['margin-left']))
                echo 'margin-left: ' . esc_attr($smof_data['sticky_logo_margin']['margin-left']) . ';';
            if(!empty($smof_data['sticky_logo_margin']['margin-bottom']))
                echo 'margin-bottom: ' . esc_attr($smof_data['sticky_logo_margin']['margin-bottom']) . ';';
            if(!empty($smof_data['sticky_logo_margin']['margin-right']))
                echo 'margin-right: ' . esc_attr($smof_data['sticky_logo_margin']['margin-right']) . ';';
            echo '}';
        }
        /* End Sticky Header */
        /* Color - Main Menu */
		if(!empty($smof_data['menu_color_first_level']) && !empty($smof_data['menu_color_first_level']['regular'])) {
			echo ".nav-menu > li,
			.nav-menu > li > a,
			.widget_cart_search_wrap a {
				color: ".esc_attr($smof_data['menu_color_first_level']['regular']). ";
			}";
		}

		if(!empty($smof_data['menu_color_first_level']) && !empty($smof_data['menu_color_first_level']['hover'])) {
			echo ".nav-menu > li:hover,
			.nav-menu > li:hover > a,
			.widget_cart_search_wrap a:hover {
				color:".esc_attr($smof_data['menu_color_first_level']['hover']).";
			}";
			echo ".nav-menu > li:hover {
				border-bottom-color: ".esc_attr($smof_data['menu_color_first_level']['hover']).";
			}";
		}
		if(!empty($smof_data['menu_color_first_level']) && !empty($smof_data['menu_color_first_level']['active'])) {
			echo ".nav-menu > li.current-menu-item,
			.nav-menu > li.current-menu-ancestor,
			.nav-menu > li.current_page_item,
			.nav-menu > li.current_page_ancestor,
			.nav-menu > li.current-menu-parent,
			.nav-menu > li.current-menu-item > a,
			.nav-menu > li.current-menu-ancestor > a,
			.nav-menu > li.current_page_item > a,
			.nav-menu > li.current_page_ancestor > a,
			.nav-menu > li.current-menu-parent > a,
			.widget_cart_search_wrap a:active,
			.widget_cart_search_wrap a:focus {
				color:".esc_attr($smof_data['menu_color_first_level']['active']).";

			}";
			echo ".nav-menu > li.current-menu-parent a,
			.nav-menu > li.current-menu-item a,
			.nav-menu > li.current-menu-ancestor a,
			.nav-menu > li.current_page_item a,
			.nav-menu > li.current_page_ancestor a{
				border-bottom: 2px solid ".esc_attr($smof_data['menu_color_first_level']['active']).";
			}";
		}
		/* Sub Menu */
		if(!empty($smof_data['menu_color_sub_level']) && !empty($smof_data['menu_color_sub_level']['regular'])){
			echo ".nav-menu > li ul li,
			.nav-menu > li ul li > a {
				color:".esc_attr($smof_data['menu_color_sub_level']['regular']).";
			}";
		}
		if(!empty($smof_data['menu_color_sub_level']) && !empty($smof_data['menu_color_sub_level']['hover'])){
			echo ".nav-menu > li ul a:focus,
			.nav-menu > li ul li:hover,
			.nav-menu > li ul li.current-menu-item,
			.nav-menu > li ul li.current-menu-parent,
			.nav-menu > li ul li.current-menu-ancestor,
			.nav-menu > li ul li.current_page_item,
			.nav-menu > li ul li:hover > a,
			.nav-menu > li ul li.current-menu-item > a,
			.nav-menu > li ul li.current-menu-parent > a,
			.nav-menu > li ul li.current-menu-ancestor > a,
			.nav-menu > li ul li.current_page_item > a {
				color:".esc_attr($smof_data['menu_color_sub_level']['hover']).";
			}";
		}
		
		/* Sticky Menu */
		if(!empty($smof_data['sticky_menu_color_first_level'])){
			echo ".header-fixed .nav-menu > li,
			.header-fixed .nav-menu > li > a,
			.header-fixed .widget_cart_search_wrap a {
				color:".esc_attr($smof_data['sticky_menu_color_first_level']).";
			}";
		}
		if(!empty($smof_data['sticky_menu_color_hover_first_level'])){
			echo ".header-fixed .nav-menu > li:hover,
			.header-fixed .nav-menu > li:hover > a,
			.header-fixed .widget_cart_search_wrap a:hover {
				color:".esc_attr($smof_data['sticky_menu_color_hover_first_level']).";
			}";
			echo ".header-fixed .nav-menu > li:hover {
				border-bottom-color: ".esc_attr($smof_data['sticky_menu_color_hover_first_level']).";
			}";
		}
		if(!empty($smof_data['sticky_menu_color_active_first_level'])){
			echo ".header-fixed .nav-menu > li.current-menu-item,
			.header-fixed .nav-menu > li.current-menu-ancestor,
			.header-fixed .nav-menu > li.current_page_item,
			.header-fixed .nav-menu > li.current_page_ancestor,
			.header-fixed .nav-menu > li.current-menu-parent,
			.header-fixed .nav-menu > li.current-menu-item > a,
			.header-fixed .nav-menu > li.current-menu-ancestor > a,
			.header-fixed .nav-menu > li.current_page_item > a,
			.header-fixed .nav-menu > li.current_page_ancestor > a,
			.header-fixed .nav-menu > li.current-menu-parent > a,
			.header-fixed .widget_cart_search_wrap a:active,
			.header-fixed .widget_cart_search_wrap a:focus {
				color:".esc_attr($smof_data['sticky_menu_color_active_first_level']).";
			}";

		}

		/* Sub Menu */
		if(!empty($smof_data['sticky_menu_color_sub_level'])){
			echo ".header-fixed .nav-menu > li ul li,
			.header-fixed .nav-menu > li ul li > a {
				color:".esc_attr($smof_data['sticky_menu_color_sub_level']).";
			}";
		}
		if(!empty($smof_data['sticky_menu_color_hover_sub_level'])){
			echo ".header-fixed .nav-menu > li ul a:focus,
			.header-fixed .nav-menu > li ul li:hover,
			.header-fixed .nav-menu > li ul li.current-menu-item,
			.header-fixed .nav-menu > li ul li.current-menu-parent,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor,
			.header-fixed .nav-menu > li ul li.current_page_item,
			.header-fixed .nav-menu > li ul li:hover > a,
			.header-fixed .nav-menu > li ul li.current-menu-item > a,
			.header-fixed .nav-menu > li ul li.current-menu-parent > a,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor > a,
			.header-fixed .nav-menu > li ul li.current_page_item > a {
				color:".esc_attr($smof_data['sticky_menu_color_hover_sub_level']).";
			}";
		}
		/* End Sub Menu */
		/* End Sticky Menu */
        /* End Main Menu */


        /* ==========================================================================
           End Header
        ========================================================================== */
		

		
        /* ==========================================================================
           Start Footer
        ========================================================================== */

        if(!empty($smof_data['footer_padding'])){
            echo '#zo-footer{';
            // Padding
            if(!empty($smof_data['footer_padding']['padding-top']))
                echo 'padding-top: ' . esc_attr($smof_data['footer_padding']['padding-top']) . ';';
            if(!empty($smof_data['footer_padding']['padding-left']))
                echo 'padding-left: ' . esc_attr($smof_data['footer_padding']['padding-left']) . ';';
            if(!empty($smof_data['footer_padding']['padding-bottom']))
                echo 'padding-bottom: ' . esc_attr($smof_data['footer_padding']['padding-bottom']) . ';';
            if(!empty($smof_data['footer_padding']['padding-right']))
                echo 'padding-right: ' . esc_attr($smof_data['footer_padding']['padding-right']) . ';';

            echo '}';
        }
        // Footer Copyright Borders
        if(!empty($smof_data['footer_copyright_padding'])){
            echo '#zo-footer-copyright {';
            // Padding
            if(!empty($smof_data['footer_copyright_padding']['padding-top']))
                echo 'padding-top: ' . esc_attr($smof_data['footer_copyright_padding']['padding-top']) . ';';
            if(!empty($smof_data['footer_copyright_padding']['padding-left']))
                echo 'padding-left: ' . esc_attr($smof_data['footer_copyright_padding']['padding-left']) . ';';
            if(!empty($smof_data['footer_copyright_padding']['padding-bottom']))
                echo 'padding-bottom: ' . esc_attr($smof_data['footer_copyright_padding']['padding-bottom']) . ';';
            if(!empty($smof_data['footer_copyright_padding']['padding-right']))
                echo 'padding-right: ' . esc_attr($smof_data['footer_copyright_padding']['padding-right']) . ';';

            // Footer Content Borders
            if(!empty($smof_data['footer_copyright_border_color'])){
                if(!empty($smof_data['footer_copyright_border_width_top'])){
                    echo 'border-top: ' . $smof_data['footer_copyright_border_width_top'] . 'px solid ' . $smof_data['footer_copyright_border_color'] . ';';
                }
            }
            /*Copyright Font Color*/
            if(!empty($smof_data['footer_copyright_font_color'])){
                    echo 'color: ' .$smof_data['footer_copyright_font_color']. ';';
            }
            /*Copyright Link Color*/
            if(!empty($smof_data['footer_copyright_link_color'])){
                    echo 'a {color: ' .$smof_data['footer_copyright_link_color']. ';}';
            }
            echo '}';

        }
        if(!empty($smof_data['footer_copyright_alignment']) && !empty($smof_data['footer_copyright_extra_position']) && $smof_data['footer_copyright_alignment']!='center' && $smof_data['footer_copyright_extra_position']=='symmetric'){
            echo '#zo-footer-copyright footer{ display: table; width: 100%;}';
            echo '#zo-footer-copyright .zo-footer-copyright-notice{ display: table-cell; width: 60%;}';
            echo '#zo-footer-copyright .zo-copyright-secondary{ display: table-cell; width: 40%;}';
        }
        if(!empty($smof_data['footer_copyright_alignment']) && $smof_data['footer_copyright_alignment']=='center'){
            echo '#zo-footer-copyright footer{ text-align: center;}';
        }
        /* End Footer */
		
        // TYPOGRAPHY
        if(!empty($smof_data['font_h1'])){
            echo 'body h1{';
            echo zo_general_typography($smof_data['font_h1']);
            if(!empty($smof_data['font_h1_margin'])){
                echo 'margin-top:' . $smof_data['font_h1_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $smof_data['font_h1_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if(!empty($smof_data['font_h2'])){
            echo 'body h2{';
            echo zo_general_typography($smof_data['font_h2']);
            if(!empty($smof_data['font_h2_margin'])){
                echo 'margin-top:' . $smof_data['font_h2_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $smof_data['font_h2_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if(!empty($smof_data['font_h3'])){
            echo 'body h3{';
            echo zo_general_typography($smof_data['font_h3']);
            if(!empty($smof_data['font_h3_margin'])){
                echo 'margin-top:' . $smof_data['font_h3_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $smof_data['font_h3_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if(!empty($smof_data['font_h4'])){
            echo 'body h4{';
            echo zo_general_typography($smof_data['font_h4']);
            if(!empty($smof_data['font_h4_margin'])){
                echo 'margin-top:' . $smof_data['font_h4_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $smof_data['font_h4_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if(!empty($smof_data['font_h5'])){
            echo 'body h5{';
            echo zo_general_typography($smof_data['font_h5']);
            if(!empty($smof_data['font_h5_margin'])){
                echo 'margin-top:' . $smof_data['font_h5_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $smof_data['font_h5_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if(!empty($smof_data['font_h6'])){
            echo 'body h6{';
            echo zo_general_typography($smof_data['font_h6']);
            if(!empty($smof_data['font_h6_margin'])){
                echo 'margin-top:' . $smof_data['font_h6_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $smof_data['font_h6_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if(!empty($smof_data['mobile_heading_sensitivity'])){
            $scale = (int)$smof_data['mobile_heading_sensitivity'];
            echo '@media(max-width: 767px) {';
            if(!empty($smof_data['font_h1']))
                echo 'body h1{ font-size: ' . zo_calc_font_size($smof_data['font_h1']['font-size'],$scale) . ';}';
            if(!empty($smof_data['font_h2']))
                echo 'body h2{ font-size: ' . zo_calc_font_size($smof_data['font_h2']['font-size'],$scale) . ';}';
            if(!empty($smof_data['font_h3']))
                echo 'body h3{ font-size: ' . zo_calc_font_size($smof_data['font_h3']['font-size'],$scale) . ';}';
            if(!empty($smof_data['font_h4']))
                echo 'body h4{ font-size: ' . zo_calc_font_size($smof_data['font_h4']['font-size'],$scale) . ';}';
            if(!empty($smof_data['font_h5']))
                echo 'body h5{ font-size: ' . zo_calc_font_size($smof_data['font_h5']['font-size'],$scale) . ';}';
            if(!empty($smof_data['font_h6']))
                echo 'body h6{ font-size: ' . zo_calc_font_size($smof_data['font_h6']['font-size'],$scale) . ';}';
            echo '}';
        }
        //BUTTON
        if(!empty($smof_data['btn_primary'])){
            echo '.btn-primary{';
            if(!empty($smof_data['btn_primary']['regular']))
                echo 'background:' . $smof_data['btn_primary']['regular'] . ';';
            if(!empty($smof_data['btn_primary_color']['regular']))
                echo 'color:' . $smof_data['btn_primary_color']['regular'] . ';';
            if(!empty($smof_data['btn_primary_padding'])){
                // Padding
                if(!empty($smof_data['btn_primary_padding']['padding-top']) || $smof_data['btn_primary_padding']['padding-top'] == '0')
                    echo 'padding-top: ' . esc_attr($smof_data['btn_primary_padding']['padding-top']) . ';';
                if(!empty($smof_data['btn_primary_padding']['padding-left']) || $smof_data['btn_primary_padding']['padding-left'] == '0')
                    echo 'padding-left: ' . esc_attr($smof_data['btn_primary_padding']['padding-left']) . ';';
                if(!empty($smof_data['btn_primary_padding']['padding-bottom']) || $smof_data['btn_primary_padding']['padding-bottom'] == '0')
                    echo 'padding-bottom: ' . esc_attr($smof_data['btn_primary_padding']['padding-bottom']) . ';';
                if(!empty($smof_data['btn_primary_padding']['padding-right']) || $smof_data['btn_primary_padding']['padding-right'] == '0')
                    echo 'padding-right: ' . esc_attr($smof_data['btn_primary_padding']['padding-right']) . ';';
            }
            if(!empty($smof_data['btn_primary_font'])){
                echo zo_general_typography($smof_data['btn_primary_font']);
            }
            if(!empty($smof_data['btn_primary_border_radius'])){
                echo 'border-radius: ' . $smof_data['btn_primary_border_radius'] . 'px;';
            }
            if(!empty($smof_data['btn_primary_border'])){
                if(!empty($smof_data['btn_primary_border']['border-top']) && !empty($smof_data['btn_primary_border']['border-color']) &&!empty($smof_data['btn_primary_border']['border-style'])){
                    echo 'border: ' . $smof_data['btn_primary_border']['border-top'] . ' ' . $smof_data['btn_primary_border']['border-style'] . ' ' . $smof_data['btn_primary_border']['border-color'] . ' !important;';
                }
            }
            echo '}';
            echo '.btn-primary:hover{';
            if(!empty($smof_data['btn_primary']['hover']))
                echo 'background:' . $smof_data['btn_primary']['hover'] . ';';
            if(!empty($smof_data['btn_primary_color']['hover']))
                echo 'color:' . $smof_data['btn_primary_color']['hover'] . ';';
            echo '}';
        }
        if(!empty($smof_data['btn_secondary'])){
            echo '.btn-secondary{';
            if(!empty($smof_data['btn_secondary']['regular']))
                echo 'background:' . $smof_data['btn_secondary']['regular'] . ';';
            if(!empty($smof_data['btn_secondary_color']['regular']))
                echo 'color:' . $smof_data['btn_secondary_color']['regular'] . ';';
            if(!empty($smof_data['btn_secondary_padding'])){
                // Padding
                if(!empty($smof_data['btn_secondary_padding']['padding-top']))
                    echo 'padding-top: ' . esc_attr($smof_data['btn_secondary_padding']['padding-top']) . ';';
                if(!empty($smof_data['btn_secondary_padding']['padding-left']))
                    echo 'padding-left: ' . esc_attr($smof_data['btn_secondary_padding']['padding-left']) . ';';
                if(!empty($smof_data['btn_secondary_padding']['padding-bottom']))
                    echo 'padding-bottom: ' . esc_attr($smof_data['btn_secondary_padding']['padding-bottom']) . ';';
                if(!empty($smof_data['btn_secondary_padding']['padding-right']))
                    echo 'padding-right: ' . esc_attr($smof_data['btn_secondary_padding']['padding-right']) . ';';
            }
            if(!empty($smof_data['btn_secondary_font'])){
                echo zo_general_typography($smof_data['btn_secondary_font']);
            }
            if(!empty($smof_data['btn_secondary_border_radius'])){
                echo 'border-radius: ' . $smof_data['btn_secondary_border_radius'] . 'px;';
            }
            if(!empty($smof_data['btn_secondary_border'])){
                if(!empty($smof_data['btn_secondary_border']['border-top']) && !empty($smof_data['btn_secondary_border']['border-color']) &&!empty($smof_data['btn_secondary_border']['border-style'])){
                    echo 'border: ' . $smof_data['btn_secondary_border']['border-top'] . ' ' . $smof_data['btn_secondary_border']['border-style'] . ' ' . $smof_data['btn_secondary_border']['border-color'] . ';';
                }
            }
            echo '}';
            echo '.btn-secondary:hover{';
            if(!empty($smof_data['btn_secondary']['hover']))
                echo 'background:' . $smof_data['btn_secondary']['hover'] . ';';
            if(!empty($smof_data['btn_secondary_color']['hover']))
                echo 'color:' . $smof_data['btn_secondary_color']['hover'] . ';';
            echo '}';
        }
        if(!empty($smof_data['breacrumb_typography'])){
            echo '#breadcrumb-text{';
            echo zo_general_typography($smof_data['breacrumb_typography']);
            echo '}';
        }
        return ob_get_clean();
    }
}

new ZoTheme_StaticCss();
