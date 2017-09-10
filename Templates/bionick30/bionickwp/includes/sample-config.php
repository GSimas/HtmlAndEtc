<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "bionick_wp";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'bionick_wp/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Bionick Options', 'bionick_wp' ),
        'page_title'           => __( 'Bionick Options', 'bionick_wp' ),
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
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'bionick_wp' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'bionick_wp' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'bionick_wp' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'bionick_wp' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'bionick_wp' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'bionick_wp' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'bionick_wp' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'bionick_wp' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
	            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-home-alt',
                    'title'  => __( 'General Settings', 'bionick_wp' ),
                    'fields' => array(
					
                     array(
							'id' => 'logopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => __('Site Logo', 'bionick_wp'),
							'subtitle' => __('Upload a 200px X 70px .jpg or .png size image.', 'bionick_wp')
					),					
					
					array(
                    'id' => 'logo_padding',
                    'type' => 'spacing',
                    'units' => array('px','em','%'),
                    'output' => array('.logo-holder img'), // An array of CSS selectors to apply this font style to
                    'mode' => 'padding', // absolute, padding, margin, defaults to padding
                    'title' => __('Logo Padding', 'framework'),
                    'default' => array('padding-top' => '', 'padding-right' => "", 'padding-bottom' => '', 'padding-left' => '')
					),									
					
					array(
							'id' => 'favicon',
							'type' => 'media',
							'title' => __('Favicon', 'bionick_wp'),
							'subtitle' => __('Upload a 16px x 16px .png or .gif size image.', 'bionick_wp'),
							'compiler' => 'true'
					),	
					
					array(
							'id' => 'ht-home-wid-twit',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => __('Portfolio Options', 'bionick_wp'),
							
					),					
					
					array(
							'id' => 'port-page-link',
							'type' => 'text',
							'title' => __('Portfolio Page Link', 'bionick_wp'),
							'subtitle' => __('Write portfolio page link url.', 'bionick_wp'),
							'default' => '',
							'validate' => 'url'
							
					),	
					array(
							'id' => 'prf-project-filter-all',
							'type' => 'text',
							'title' => __('All Filter Text', 'bionick_wp'),
							'subtitle' => __('Change/Repalce portfolio post "ALL" text here.', 'bionick_wp'),
							'default' => '',
							
					),					
					
				  )
                ) );									
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cogs',
                    'title'  => __( 'Blog Settings', 'bionick_wp' ),
                    'fields' => array(					

			        array(
							'id' => 'layout-blog-page',
							'type' => 'image_select',
							'title' => __('Layout Style', 'bionick_wp'),
							'subtitle' => __('Choose layout style for blog single, archives, category, tag & search page.', 'bionick_wp'),
							'options' => array(
							        'left'=> __( get_template_directory_uri().'/includes/metaboxes/img/sidebar-left.png', 'bionick_wp' ),
									'default'=> __( get_template_directory_uri().'/includes/metaboxes/img/default.png', 'bionick_wp' ),
									'right'=> __( get_template_directory_uri().'/includes/metaboxes/img/sidebar-right.png', 'bionick_wp' ),
									
							),
							'default'  => 'default'
					),
					
                     array(
							'id' => 'blog-single-image',
							'type' => 'media',
							'compiler' => 'true',
							'title' => __('Section Image', 'bionick_wp'),
							'subtitle' => __('Upload a 800px X 1200px .jpg or .png size image.', 'bionick_wp'),
							'required' => array('layout-blog-page', '=' , 'default')
					),	

							array(
							'id' => 'blog-section-title',
							'type' => 'text',
							'title' => __('Section Title Text', 'bionick_wp'),
							'subtitle' => __('Write section title for blog single, archives, category, tag & search page title here.', 'bionick_wp'),
							'default' => '',
							'required' => array('layout-blog-page', '=' , 'default')
							
					),					
					
			        array(
							'id' => 'header-search-box',
							'type' => 'button_set',
							'title' => __('Header Search Box', 'bionick_wp'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'bionick_wp'),
									'no'=> __('Disable', 'bionick_wp'),
							),
							
					),						

			        array(
							'id' => 'blog-page-title-on-off',
							'type' => 'button_set',
							'title' => __('Page Title', 'bionick_wp'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'bionick_wp'),
									'no'=> __('Disable', 'bionick_wp'),
							),
							
					),					
					
						array(
							'id' => 'blog-page-title',
							'type' => 'text',
							'title' => __('Page Title Text', 'bionick_wp'),
							'subtitle' => __('Write title for blog page title here.', 'bionick_wp'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
							
					),	

						array(
							'id' => 'blog-page-subtitle',
							'type' => 'text',
							'title' => __('Page Subtitle Text', 'bionick_wp'),
							'subtitle' => __('Write subtitle for blog page here.', 'bionick_wp'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
							
					),					

			        array(
							'id' => 'blog-share',
							'type' => 'button_set',
							'title' => __('Post Social Share', 'bionick_wp'),
							'default'  => 'yes',
							'options' => array(
									'yes'=> __('Enable', 'bionick_wp'),
									'no'=> __('Disable', 'bionick_wp'),
							),
							
					),
					
					array(
							'id' => 'blog-share-title',
							'type' => 'text',
							'title' => __('Share Text', 'bionick_wp'),
							'default' => '',
							'required' => array('blog-share', '=' , 'yes')
							
					),

					array(
							'id' => 'blog-posted-by',
							'type' => 'text',
							'title' => __('Posted By Text', 'bionick_wp'),
							'subtitle' => __('Change/Repalce blog post "Posted By" text here.', 'mountainwp'),							
							'default' => '',
							
					),	
					array(
							'id' => 'blog-read-more',
							'type' => 'text',
							'title' => __('Continue Reading Text', 'mountainwp'),
							'subtitle' => __('Change/Repalce blog post "Continue reading ..." text here.', 'bionick_wp'),							
							'default' => '',
							
					),	

					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => __('Archive Page Title', 'mountainwp'),
							'subtitle' => __('Write header title for blog archive page title here. Ex: Archive', 'mountainwp'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),	

					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => __('Category Page Title', 'mountainwp'),
							'subtitle' => __('Write header title for blog category page title here. Ex: Category', 'mountainwp'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),	

					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => __('Tag Page Title', 'mountainwp'),
							'subtitle' => __('Write header title for blog tag page title here. Ex: Tag', 'mountainwp'),
							'default' => '',
							'required' => array('blog-page-title-on-off', '=' , 'yes')
					),						
					
                    )
                ));
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-brush',
                    'title'  => __( 'Styling', 'bionick_wp' ),
                    'fields' => array(
					
						array(
                            'id'       => 'opt-theme-style',
                            'type'     => 'color',
                            'title'    => __( 'Theme Color', 'bionick_wp' ),
                            'subtitle' => __( 'Only color validation can be done on this field type.', 'bionick_wp' ),
                            'desc'     => __( '', 'bionick_wp' ),
                            //'regular'   => false, // Disable Regular Color
                            //'hover'     => false, // Disable Hover Color
                            //'active'    => false, // Disable Active Color
                            //'visited'   => true,  // Enable Visited Color
                            
                        ),						
					array(
                        'id'        => 'custom-css',
                        'type'      => 'ace_editor',
                        'title'     => __('Custom CSS', 'bionick_wp'),
                        'subtitle'  => __('Write your CSS code here.', 'bionick_wp'),
                        'mode'      => 'css',
						'theme'    => 'monokai',
                        
                    ),
																		
					)
               ) );				
				
            Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-text-width',
                    'title'  => __( 'Typography', 'bionick_wp' ),
                    'fields' => array(     

						array(
			                'id' => 'notice_critical11',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => __('Entry Headings', 'framework'),
			                'desc' => __('Entry Headings in posts/pages', 'framework')
			            ),					
                        array(
                            'id'          => 'typography-h1',
                            'type'        => 'typography', 
                            'title'       => __('H1', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h1'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'bionick_wp'),
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
                            'title'       => __('H2', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h2'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'bionick_wp'),
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
                            'title'       => __('H3', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'bionick_wp'),
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
                            'title'       => __('H5', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h5'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'bionick_wp'),
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
                            'title'       => __('H6', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('h6'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the Heading font properties.', 'bionick_wp'),
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
			                'title' => __('Page', 'framework'),
			                'desc' => __('', 'framework')
			            ),
                        array(
                            'id'          => 'typography-pgtl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title h2'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page title font properties.', 'bionick_wp'),
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
                            'title'       => __('Sub Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page sub title font properties.', 'bionick_wp'),
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
                            'title'       => __('Section Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.bg-title span'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page section title font properties.', 'bionick_wp'),
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
			                'title' => __('Post', 'framework'),
			                'desc' => __('', 'framework')
			            ),	
                        array(
                            'id'          => 'typography-bltl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('article h4'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the blog post title font properties.', 'bionick_wp'),
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
                            'title'       => __('Content', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('article p'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the blog post content font properties.', 'bionick_wp'),
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
			                'title' => __('Portfolio', 'framework'),
			                'desc' => __('', 'framework')
			            ),
                        array(
                            'id'          => 'typography-prftl',
                            'type'        => 'typography', 
                            'title'       => __('Section Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.fw-title h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the portfolio details page section title font properties.', 'bionick_wp'),
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
                            'id'          => 'typography-prfdt',
                            'type'        => 'typography', 
                            'title'       => __('Details Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.text-title'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the portfolio details page details title font properties.', 'bionick_wp'),
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
                            'title'       => __('Details Info', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.pr-list li span, .pr-list li h4'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the portfolio details page details info font properties.', 'bionick_wp'),
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
			                'title' => __('Navigation', 'framework'),
			                'desc' => __('', 'framework')
			            ),
                        array(
                            'id'          => 'typography-mainmenu',
                            'type'        => 'typography', 
                            'title'       => __('Main Menu', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.nav-inner nav li a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the main menu font properties.', 'bionick_wp'),
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
                            'id'          => 'typography-mainmenusub',
                            'type'        => 'typography', 
                            'title'       => __('Main Menu Sub Items', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.nav-inner nav li ul li a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the main menu sub items font properties.', 'bionick_wp'),
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
                            'title'       => __('Home/One Page Menu', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.scroll-nav li a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the home/one page menu font properties.', 'bionick_wp'),
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
			                'title' => __('Intro', 'framework'),
			                'desc' => __('', 'framework')
			            ),
                        array(
                            'id'          => 'typography-introtl',
                            'type'        => 'typography', 
                            'title'       => __('Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-title h3'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the intro section title font properties.', 'bionick_wp'),
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
                            'title'       => __('Sub Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-title h4 a, .hero-title h4'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the intro section sub title font properties.', 'bionick_wp'),
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
			                'title' => __('Widget', 'framework'),
			                'desc' => __('', 'framework')
			            ),
                        array(
                            'id'          => 'typography-pgsdtl',
                            'type'        => 'typography', 
                            'title'       => __('Sidebar Widget Title', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.spo-sidebar-widget-title'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page sidebar widget title font properties.', 'bionick_wp'),
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
                            'id'          => 'typography-pgsdcon',
                            'type'        => 'typography', 
                            'title'       => __('Sidebar Widget Content', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.spo-sidebar-widget'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page sidebar widget content font properties.', 'bionick_wp'),
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
                            'id'          => 'typography-pgsdlst',
                            'type'        => 'typography', 
                            'title'       => __('Sidebar Widget List Items', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.spo-sidebar-widget ul li'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page sidebar widget list items font properties.', 'bionick_wp'),
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
                            'id'          => 'typography-pgsdln',
                            'type'        => 'typography', 
                            'title'       => __('Sidebar Widget Link', 'bionick_wp'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.spo-sidebar-widget ul li a'),
                            'units'       =>'px',
                            'subtitle'    => __('Specify the page sidebar widget link font properties.', 'bionick_wp'),
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
                    'icon'   => 'el-icon-list',
                    'title'  => __( 'Footer Settings', 'bionick_wp' ),
                    'fields' => array(														
					
					array(
							'id' => 'copyright',
							'type' => 'editor',
							'wpautop'=>true,
							'compiler' => 'true',
							'title' => __('Copyright text of the WebSite', 'bionick_wp'),
							'subtitle' => __('Write a Copyright text of your WebSite', 'bionick_wp'),
							'default'          => '<span> &#169; BioNick 2015 Developed by <a href="http://webredox.net" target="_blank">webRedox</a></span> | All rights reserved.',
							'args'   => array(
								'teeny'            => true,
								'textarea_rows'    => 10
							)
					),
			
					)
                ));
				
				
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => __( 'Documentation', 'bionick_wp' ),
                    'fields' => array(					
					
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => __('Bionick Theme Documentation', 'bionick_wp'),
							'desc' => __('<a href="http://webredox.net/demo/wp/bionick/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'bionick_wp')
							
					),	

			
			
					)
                ));	
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

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
                'title'  => __( 'Section via hook', 'bionick_wp' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'bionick_wp' ),
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

