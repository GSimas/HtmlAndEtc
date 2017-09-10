<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "cooper_wp";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'cooper_wp/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
		'class'                => 'admin-color',
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_attr__( 'Cooper Options', 'cooper' ),
        'page_title'           => esc_attr__( 'Cooper Options', 'cooper' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_attr__( '', 'cooper' ), $v );
    } else {
        $args['intro_text'] = esc_attr__( '', 'cooper' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_attr__( '', 'cooper' );

    Redux::setArgs( $opt_name, $args );

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_attr__( 'Theme Information 1', 'cooper' ),
            'content' => esc_attr__( '<p>This is the tab content, HTML is allowed.</p>', 'cooper' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_attr__( 'Theme Information 2', 'cooper' ),
            'content' => esc_attr__( '<p>This is the tab content, HTML is allowed.</p>', 'cooper' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_attr__( '<p>This is the sidebar content, HTML is allowed.</p>', 'cooper' );
    Redux::setHelpSidebar( $opt_name, $content );
	

    // -> START Basic Fields
	            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-home-alt',
                    'title'  => __( 'General Settings', 'cooper' ),
                    'fields' => array(
					
                    array(
							'id' => 'wr-site-logo',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Site Logo', 'cooper'),
							'desc' => esc_attr__('', 'cooper')
						
					),
					 
					 array(
							'id' => 'wr-logo-main',
							'type' => 'button_set',
							'title' => esc_attr__('Select Logo Type', 'cooper'),
							'subtitle' => esc_attr__('', 'cooper'),
							'compiler' => 'true',
							'options' => array(
									'st1'=> esc_attr__('Text Logo', 'cooper'),
									'st2' => esc_attr__('Image Logo', 'cooper')
					
							),
							'default'  => 'st1'
					),
					
                    array(
							'id' => 'logopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Site Logo (Small)', 'cooper'),
							'subtitle' => esc_attr__('Upload a 40px X 40px .jpg or .png size image.', 'cooper'),
							'required' => array('wr-logo-main', '=' , 'st2')
					),	
					
                    array(
							'id' => 'logopic2',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Site Logo (Full)', 'cooper'),
							'subtitle' => esc_attr__('Upload a 150px X 100px .jpg or .png size image.', 'cooper'),
							'required' => array('wr-logo-main', '=' , 'st2')
					),	

					array(
							'id' => 'wrlogotxt',
							'type' => 'text',
							'title' => esc_attr__('Logo Text (Small)', 'cooper'),
							'subtitle' => esc_attr__('E.X: C', 'cooper'),
							'required' => array('wr-logo-main', '=' , 'st1')
                    ),						
					array(
							'id' => 'wrlogotxt2',
							'type' => 'text',
							'title' => esc_attr__('Logo Text (Full)', 'cooper'),
							'subtitle' => esc_attr__('E.X: Cooper', 'cooper'),
							'required' => array('wr-logo-main', '=' , 'st1')
                    ),					
					array(
                    'id' => 'logo_padding',
                    'type' => 'spacing',
                    'units' => array('px','em','%'),
                    'output' => array('.menu-logo img'), // An array of CSS selectors to apply this font style to
                    'mode' => 'padding', // absolute, padding, margin, defaults to padding
                    'title' => __('Logo Padding', 'cooper'),
                    'default' => array('padding-top' => '', 'padding-right' => "", 'padding-bottom' => '', 'padding-left' => '')
					),									
									
					
				  )
                ) );									
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cogs',
                    'title'  => esc_attr__( 'Page Settings', 'cooper' ),
                    'fields' => array(					
						
					array(
							'id' => 'header-error',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('404 Error Page Option', 'cooper'),
							
					),	
                     array(
							'id' => 'error-page-bg-img',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Background Image', 'cooper'),
							'subtitle' => esc_attr__('Upload a .jpg or .png size image for 404 error page.', 'cooper'),
					),	
					array(
							'id' => 'error-page-title',
							'type' => 'text',
							'title' => esc_attr__('Title Text', 'cooper'),
							'subtitle' => esc_attr__('Change/Repalce "404" text here.', 'cooper'),
							'default' => '',
							
					),	
					array(
							'id' => 'error-page-subtitle',
							'type' => 'textarea',
							'title' => esc_attr__('Content Text', 'cooper'),
							'subtitle' => esc_attr__('Change/Repalce "Page not Found" text here.', 'cooper'),
							'default' => '',
							
					),	

					array(
							'id' => 'header-portfolio',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Portfolio Option', 'cooper'),
							
					),	
					array(
							'id' => 'prf-project-date-title',
							'type' => 'text',
							'title' => esc_attr__('Project Date Text', 'cooper'),
							'subtitle' => esc_attr__('Change/Repalce portfolio post details page "Date" text here.', 'cooper'),							
							'default' => '',
							
					),	
					array(
							'id' => 'prf-project-cat-title',
							'type' => 'text',
							'title' => esc_attr__('Project Category Text', 'cooper'),
							'subtitle' => esc_attr__('Change/Repalce portfolio post details page "Category" text here.', 'cooper'),							
							'default' => '',
							
					),	
					array(
							'id' => 'prf-project-filter-all',
							'type' => 'text',
							'title' => esc_attr__('Portfolio All Text', 'cooper'),
							'subtitle' => esc_attr__('Change/Repalce portfolio filter "All" text here.', 'cooper'),							
							'default' => '',
							
					),	
					array(
							'id' => 'header-portfolio-cat',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Portfolio Category Page Option', 'cooper'),
							
					),					
                     array(
							'id' => 'portfolio-single-image',
							'type' => 'media',
							'compiler' => 'true',
							'title' => __('Section Image', 'cooper'),
							'subtitle' => __('Upload a 800px X 1200px .jpg or .png size image.', 'cooper'),
							'required' => array('layout-blog-page', '=' , 'default')
					),					
							array(
							'id' => 'portfolio-section-title',
							'type' => 'text',
							'title' => __('Section Title Text', 'cooper'),
							'subtitle' => __('Write section title for portfolio category page here.', 'cooper'),
							'default' => '',
							'required' => array('layout-blog-page', '=' , 'default')
							
					),
					
                    )
                ));						
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cog',
                    'title'  => __( 'Blog Settings', 'cooper' ),
                    'fields' => array(					

			        array(
							'id' => 'layout-blog-page',
							'type' => 'image_select',
							'title' => __('Layout Style', 'cooper'),
							'subtitle' => __('Choose layout style for blog single, archives, category, tag & search page.', 'cooper'),
							'options' => array(
									'default'=> __( get_template_directory_uri().'/includes/metaboxes/img/default.png', 'cooper' ),
									'right'=> __( get_template_directory_uri().'/includes/metaboxes/img/sidebar-right.png', 'cooper' ),
									
							),
							'default'  => 'right'
					),
					
                     array(
							'id' => 'blog-single-image',
							'type' => 'media',
							'compiler' => 'true',
							'title' => __('Section Image', 'cooper'),
							'subtitle' => __('Upload a 800px X 1200px .jpg or .png size image.', 'cooper'),
							'required' => array('layout-blog-page', '=' , 'default')
					),	

							array(
							'id' => 'blog-section-title',
							'type' => 'text',
							'title' => __('Section Title Text', 'cooper'),
							'subtitle' => __('Write section title for blog single, archives, category, tag & search page title here.', 'cooper'),
							'default' => '',
							'required' => array('layout-blog-page', '=' , 'default')
							
					),					
			        array(
							'id' => 'blog-section-parallax-title-on-off',
							'type' => 'button_set',
							'title' => __('Page Parallax Title', 'cooper'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'cooper'),
									'no'=> __('Disable', 'cooper'),
							),
							
					),					
					
						array(
							'id' => 'blog-section-parallax-title',
							'type' => 'text',
							'title' => __('Page Parallax Title Text', 'cooper'),
							'subtitle' => __('Write section Parallax title for blog single, archives, category, tag & search page title here.', 'cooper'),
							'default' => '',
							'required' => array('blog-section-parallax-title-on-off', '=' , 'yes')
							
					),						
			        array(
							'id' => 'header-search-box',
							'type' => 'button_set',
							'title' => __('Header Search Box', 'cooper'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'cooper'),
									'no'=> __('Disable', 'cooper'),
							),
							
					),						

			        array(
							'id' => 'blog-page-title-on-off',
							'type' => 'button_set',
							'title' => __('Page Title', 'cooper'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'cooper'),
									'no'=> __('Disable', 'cooper'),
							),
							
					),					
					
						array(
							'id' => 'blog-page-title',
							'type' => 'text',
							'title' => __('Page Title Text', 'cooper'),
							'subtitle' => __('Write title for blog page title here.', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
							
					),	

						array(
							'id' => 'blog-page-subtitle',
							'type' => 'text',
							'title' => __('Page Subtitle Text', 'cooper'),
							'subtitle' => __('Write subtitle for blog page here.', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
							
					),					

			        array(
							'id' => 'blogauthorinfo',
							'type' => 'button_set',
							'title' => __('Author Info', 'cooper'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'cooper'),
									'no'=> __('Disable', 'cooper'),
							),
							
					),
					
					array(
							'id' => 'blog-posted-by',
							'type' => 'text',
							'title' => __('Written By Text', 'cooper'),
							'subtitle' => __('Change/Repalce blog post "Written By" text here.', 'cooper'),	
							'required' => array('blogauthorinfo', '=' , 'yes'),						
							'default' => '',
							
					),

					array(
							'id' => 'blog-read-more',
							'type' => 'text',
							'title' => __('Continue Reading Text', 'cooper'),
							'subtitle' => __('Change/Repalce blog post "Continue reading" text here.', 'cooper'),							
							'default' => '',
							
					),	

					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => __('Archive Page Title', 'cooper'),
							'subtitle' => __('Write header title for blog archive page here. Ex: Archive : ', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),	
					array(
							'id' => 'arch-page-sub-title',
							'type' => 'text',
							'title' => __('Archive Page Subtitle', 'cooper'),
							'subtitle' => __('Write header subtitle for blog archive page here.', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),
					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => __('Category Page Title', 'cooper'),
							'subtitle' => __('Write header title for blog category page here. Ex: Category : ', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),	
					array(
							'id' => 'cat-page-sub-title',
							'type' => 'text',
							'title' => __('Category Page Subtitle', 'cooper'),
							'subtitle' => __('Write header subtitle for blog category page here.', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),	
					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => __('Tag Page Title', 'cooper'),
							'subtitle' => __('Write header title for blog tag page here. Ex: Tag : ', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),						
					array(
							'id' => 'tag-page-sub-title',
							'type' => 'text',
							'title' => __('Tag Page Subtitle', 'cooper'),
							'subtitle' => __('Write header title for blog tag page here.', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),	
					array(
							'id' => 'src-page-title',
							'type' => 'text',
							'title' => esc_attr__('Search Page Title', 'cooper'),
							'subtitle' => esc_attr__('Write header title for blog search page title here. Ex: Search Results for :', 'cooper'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),
					
                    )
                ));
				
				if (class_exists('WooCommerce')) {
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el el-shopping-cart-sign',
                    'title'  => esc_attr__( 'Shop Options', 'cooper' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-shop-opt-dis',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Product Page Options', 'cooper'),
							'desc' => esc_attr__(' ', 'cooper')
							
					  ),

					array(
							'id' => 'product-st',
							'type' => 'button_set',
							'title' => __('Product Page Style', 'cooper'),
							'default'  => 'yes',
							'options' => array(
									'st1'=> __('Style 1', 'cooper'),
									'st2'=> __('Style 2', 'cooper'),
									'st3'=> __('Style 3', 'cooper'),
									'st4'=> __('Style 4', 'cooper'),
							),
							'default'  => 'st1'
							
					),
					
					array(
							'id' => 'wr-shop-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Shop Header Options', 'cooper'),
							'desc' => esc_attr__(' ', 'cooper'),
							
							
					  ),

					array(
							'id' => 'shopheaderimg',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Upload Shop Page Header Image GFXFULL.NET', 'cooper'),
							'subtitle' => esc_attr__('', 'cooper'),
							
							
					),
					
					
					
					
					
					
                    )
                ) );
				}
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-brush',
                    'title'  => __( 'Styling', 'cooper' ),
                    'fields' => array(
					
						array(
                            'id'       => 'opt-theme-style',
                            'type'     => 'color',
                            'title'    => __( 'Theme Color', 'cooper' ),
                            'subtitle' => __( 'Only color validation can be done on this field type.', 'cooper' ),
                            'desc'     => __( '', 'cooper' ),
                            //'regular'   => false, // Disable Regular Color
                            //'hover'     => false, // Disable Hover Color
                            //'active'    => false, // Disable Active Color
                            //'visited'   => true,  // Enable Visited Color
                            
                        ),						
					array(
                        'id'        => 'custom-css',
                        'type'      => 'ace_editor',
                        'title'     => __('Custom CSS', 'cooper'),
                        'subtitle'  => __('Write your CSS code here.', 'cooper'),
                        'mode'      => 'css',
						'theme'    => 'monokai',
                        
                    ),
																		
					)
               ) );				
				
            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-text-width',
                    'title'  => __( 'Typography', 'cooper' ),
                    'fields' => array(     

						array(
			                'id' => 'notice_critical11',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Entry Headings', 'cooper'),
			                'desc' => __('Entry Headings in posts/pages', 'cooper')
			            ),					
                        array(
                            'id'          => 'typography-h1',
                            'type'        => 'typography', 
                            'title'       => __('H1', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h1'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-h2',
                            'type'        => 'typography', 
                            'title'       => __('H2', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h2'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),      
                        ),
                        array(
                            'id'          => 'typography-h3',
                            'type'        => 'typography', 
                            'title'       => __('H3', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-h4',
                            'type'        => 'typography', 
                            'title'       => __('H4', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h4'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),                        	
                        array(
                            'id'          => 'typography-h5',
                            'type'        => 'typography', 
                            'title'       => __('H5', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h5'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-h6',
                            'type'        => 'typography', 
                            'title'       => __('H6', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h6'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
						  
						array(
			                'id' => 'notice_critical13',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Page', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),
                        array(
                            'id'          => 'typography-pgtl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title h2'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),	
                        array(
                            'id'          => 'typography-pgsubtl',
                            'type'        => 'typography', 
                            'title'       => __('Sub Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page sub title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),
                        array(
                            'id'          => 'typography-pgsectl',
                            'type'        => 'typography', 
                            'title'       => __('Section Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.bg-title span'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page section title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),  

                        array(
                            'id'          => 'typography-pgcontentl',
                            'type'        => 'typography', 
                            'title'       => __('Content', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page content text font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),							
						array(
			                'id' => 'notice_critical14',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Post', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),	
                        array(
                            'id'          => 'typography-bltl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('article h4'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the blog post title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),						
                        array(
                            'id'          => 'typography-blcon',
                            'type'        => 'typography', 
                            'title'       => __('Content', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('article p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the blog post content font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),	
						array(
			                'id' => 'notice_critical1_permalink1',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Permalink', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),	
                        array(
                            'id'          => 'typography-lnurl',
                            'type'        => 'typography', 
                            'title'       => __('Link URL', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the permalink link url font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),		
                        array(
                            'id'          => 'typography-introbutton',
                            'type'        => 'typography', 
                            'title'       => __('Button', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.btn.hide-icon span'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the button font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),						
						array(
			                'id' => 'notice_critical16',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Portfolio', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),	
                        array(
                            'id'          => 'typography-prfdt',
                            'type'        => 'typography', 
                            'title'       => __('Details Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.text-title'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the portfolio details page details title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),
                        array(
                            'id'          => 'typography-prfcon',
                            'type'        => 'typography', 
                            'title'       => __('Details Info', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.dec-list li'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the portfolio details page details info font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),					
						array(
			                'id' => 'notice_critical18',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Navigation', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),
                        array(
                            'id'          => 'typography-mainmenu',
                            'type'        => 'typography', 
                            'title'       => __('Main Menu', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.sliding-menu a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the main menu font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),	
                        array(
                            'id'          => 'typography-homemenu',
                            'type'        => 'typography', 
                            'title'       => __('Home Page Menu', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.scroll-nav li a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the home page menu font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),	
						array(
			                'id' => 'notice_critical17',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Intro', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),
                        array(
                            'id'          => 'typography-introtl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-wrap-item h2'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the intro section title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),							
                        array(
                            'id'          => 'typography-introsubtl',
                            'type'        => 'typography', 
                            'title'       => __('Sub Title', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-wrap-item h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the intro section sub title font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),
                        array(
                            'id'          => 'typography-introcont',
                            'type'        => 'typography', 
                            'title'       => __('Content', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-wrap-item p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the intro section content font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),	
						
						array(
			                'id' => 'notice_critical15',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Footer', 'cooper'),
			                'desc' => __('', 'cooper')
			            ),
                        array(
                            'id'          => 'typography-pgsdtl',
                            'type'        => 'typography', 
                            'title'       => __('Copyright', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.copyright p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the footer copyright text font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),
                        array(
                            'id'          => 'typography-pgsdtop',
                            'type'        => 'typography', 
                            'title'       => __('Back To Top', 'cooper'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.to-top-wrap a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the footer back to top text font properties.', 'cooper'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),							
						),					


               
                     						
						
                    )
               ) );		
            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-smiley-alt',
                    'title'  => esc_attr__( 'Social Icons', 'cooper' ),
                    'fields' => array(
					
					array(
							'id' => 'ht-home-wid-twit',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Nav Social Option', 'cooper'),
							'desc' => esc_attr__('Navigation menu social sahre icons.', 'cooper')
							
					),
					array(					
						   'id' => 'nav-share',
						   'type' => 'button_set',
						   'title' => esc_attr__('Nav Social Share', 'cooper'),
						   'desc' => '',
						   'subtitle' => esc_attr__('Enable/Disable social share icons show.', 'cooper'),'options' => array(
							 'yes'=> esc_attr__('Enable', 'cooper'),
							 'no'=> esc_attr__('Disable', 'cooper'),
						   ),
						   'default'  => 'no',
					
					),					  
	
					array(
							'id' => 'footer-social-icon-site',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Footer Socail Icon Option', 'cooper'),
							
					),						
					array(					
						   'id' => 'social-icon-site',
						   'type' => 'button_set',
						   'title' => esc_attr__('Social Icons Show', 'cooper'),
						   'desc' => '',
						   'subtitle' => esc_attr__('Enable/Disable social icons show.', 'cooper'),'options' => array(
							 'yes'=> esc_attr__('Enable', 'cooper'),
							 'no'=> esc_attr__('Disable', 'cooper'),
						   ),
						   'default'  => 'no'
					
					),		

					
					
			 array(
                'id'        => 'facebook',
                'type'      => 'text',
                'title'     => esc_attr__('Facebook Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your facebook url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

             array(
                'id'        => 'twitter',
                'type'      => 'text',
                'title'     => esc_attr__('Twitter Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your twitter url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

             array(
                'id'        => 'google-plus',
                'type'      => 'text',
                'title'     => esc_attr__('Google+ Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your google+ url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

             array(
                'id'        => 'linkedin',
                'type'      => 'text',
                'title'     => esc_attr__('LinkedIn Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your linkedin url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

             array(
                'id'        => 'instagram',
                'type'      => 'text',
                'title'     => esc_attr__('Instagram Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your instagram url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

             array(
                'id'        => 'pinterest',
                'type'      => 'text',
                'title'     => esc_attr__('Pinterest Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your pinterest url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),
             array(
                'id'        => 'youtube',
                'type'      => 'text',
                'title'     => esc_attr__('Youtube Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your youtube url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),	
             array(
                'id'        => 'vimeo',
                'type'      => 'text',
                'title'     => esc_attr__('Vimeo Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your vimeo url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),	
             array(
                'id'        => 'whatsapp',
                'type'      => 'text',
                'title'     => esc_attr__('Whatsapp link', 'cooper'),
                'subtitle'  => esc_attr__('Write your whatsapp url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),			

             array(
                'id'        => 'skype',
                'type'      => 'text',
                'title'     => esc_attr__('Skype Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your skype url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),
			 array(
                'id'        => 'dribbble',
                'type'      => 'text',
                'title'     => esc_attr__('Dribbble Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your dribbble url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

			 array(
                'id'        => 'dropbox',
                'type'      => 'text',
                'title'     => esc_attr__('Dropbox Link', 'cooper'),
                'subtitle'  => esc_attr__('Write your dropbox url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),			
             array(
                'id'        => 'github',
                'type'      => 'text',
                'title'     => esc_attr__('Github Link:', 'cooper'),
                'subtitle'  => esc_attr__('Write your github url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),
			
			array(
                'id'        => 'xing',
                'type'      => 'text',
                'title'     => esc_attr__('Xing Link:', 'cooper'),
                'subtitle'  => esc_attr__('Write your Xing url', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),

             array(
                'id'        => 'email',
                'type'      => 'text',
                'title'     => esc_attr__('E-mail:', 'cooper'),
                'subtitle'  => esc_attr__('Write your e-mail address', 'cooper'),
                'dece'      => esc_attr__('','cooper'),
				'validate'  => '',
				'required' => array('social-icon-site', '=' , 'yes')
            ),           	
                    )
                ));				   
		Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-map-marker',
                    'title'  => esc_attr__( 'Google Map Settings', 'cooper' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-map-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Map Location Info', 'cooper'),
							'desc' => esc_attr__(' ', 'cooper')
							
					  ),

					array(
							'id' => 'maploc',
							'type' => 'text',
							'title' => esc_attr__('Data Longitude ', 'cooper'),
							'subtitle' => esc_attr__('', 'cooper'),
							'desc' => esc_attr__('Ex: 40.7060895 ', 'cooper')
							
							
					),
					
					array(
							'id' => 'maploc2',
							'type' => 'text',
							'title' => esc_attr__('Data Latitude ', 'cooper'),
							'subtitle' => esc_attr__('', 'cooper'),
							'desc' => esc_attr__('Ex: -73.999053 ', 'cooper')
						
					),
					
					array(
							'id' => 'userdata',
							'type' => 'text',
							'title' => esc_attr__('Data Marker Location ', 'cooper'),
							'subtitle' => esc_attr__('', 'cooper'),
							'desc' => esc_attr__('Inser data marker location text here. Ex: Our Office:- New York City ', 'cooper')
							
					),
					
					array(
							'id' => 'mapmarker',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Map Marker Image', 'cooper'),
							'subtitle' => esc_attr__('', 'cooper')
					),
					
                    )
                ) );				
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-list',
                    'title'  => __( 'Footer Settings', 'cooper' ),
                    'fields' => array(		

					array(					
						   'id' => 'back-to-top',
						   'type' => 'button_set',
						   'title' => esc_attr__('Back To Top', 'cooper'),
						   'desc' => '',
						   'subtitle' => esc_attr__('Enable/Disable back to top at the content footer section.', 'cooper'),'options' => array(
							 'yes'=> esc_attr__('Enable', 'cooper'),
							 'no'=> esc_attr__('Disable', 'cooper'),
						   ),
						   'default'  => 'no'
					
					),		
					
					array(
							'id' => 'back-to-top-title',
							'type' => 'text',
							'title' => __('Back To Top Text', 'cooper'),
							'subtitle' => __('Change/Repalce blog post "Back To Top" text here.', 'cooper'),							
							'default' => '',
							
					),						
					array(
							'id' => 'copyright',
							'type' => 'editor',
							'wpautop'=>true,
							'compiler' => 'true',
							'title' => __('Copyright text of the WebSite', 'cooper'),
							'subtitle' => __('Write a Copyright text of your WebSite', 'cooper'),
							'default'          => '<span> &#169; Cooper 2017 | All rights reserved.',
							'args'   => array(
								'teeny'            => true,
								'textarea_rows'    => 10
							)
					),
			
					)
                ));
				
				
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => __( 'Documentation', 'cooper' ),
                    'fields' => array(					
					
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => __('Cooper Theme Documentation', 'cooper'),
							'desc' => __('<a href="http://webredox.net/demo/wp/cooper/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'cooper')
							
					),	

			
			
					)
                ));	
    /*
     * <--- END SECTIONS
     */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_attr__( 'Section via hook', 'cooper' ),
                'desc'   => esc_attr__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'cooper' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

