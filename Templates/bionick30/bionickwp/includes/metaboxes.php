<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;

/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pageseting',
	'title' => 'Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		
		array(
			'name'     => __( 'Section Title', 'rwmb' ),
			'id'   => $prefix . 'section-title-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Enable', 'rwmb' ),
				'no' => __( 'Disable', 'rwmb' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),				
		array(
			'name'		=> 'Section Title Text',
			'id'		=> $prefix . 'sec-menu-title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),						
		array(
			'name'		=> 'Section Subtitle Text',
			'id'		=> $prefix . 'sec-sub-title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),				
		array(
			'name'		=> 'Open as a separate page',
			'id'		=> $prefix . 'open_page',
			'type'      => 'checkbox',
			'desc'		=> 'Check it while using "One Page Menu" &amp; want to open this page as a separate page.',
			// Value can be 0 or 1
			'std'  => 0,
		),			
			
	
	)
);

/* ----------------------------------------------------- */
// Page Settings Intro
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pagesetingintro',
	'title' => 'Page Intro Section Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		
		array(
			'name'     => __( 'Intro Section', 'pgintro' ),
			'id'   => $prefix . 'section-intro-on-off',
			'type'     => 'radio',
			'desc'		=> 'Select "Default or Home or Blog Page Template" At Page Attributes Template Option.',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Enable', 'pgintro' ),
				'no' => __( 'Disable', 'pgintro' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'no',

		),				
		array(
			'name'		=> 'Intro Section Title',
			'id'		=> $prefix . 'intro-section-title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),						
		array(
			'name'		=> 'Intro Section Subtitle',
			'id'		=> $prefix . 'intro-section-subtitle',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),				
		array(
			'name'     => __( 'Intro Section Style', 'pgintrost' ),
			'id'   => $prefix . 'sec-intro-style',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'image' => __( 'Image', 'pgintrost' ),
				'slider' => __( 'Slider', 'pgintrost' ),
				'slideshow' => __( 'Slideshow', 'pgintrost' ),
				'video' => __( 'Video', 'pgintrost' ),
				'revolution' => __( 'Revolution Slider', 'pgintrost' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'image',

		),	
		array(
			'name'		=> 'Intro Section Images',
			'id'		=> $prefix . 'intro-section-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select "Image" At Intro Section Style Options &amp; Upload Image.',
		),
		array(
			'name'		=> 'Slider/Slideshow Category',
			'id'		=> $prefix . 'intro-slider-post-cat',
			'desc'		=> 'Select "Slider or Slideshow" At Intro Section Style Options &amp; Insert Slide Post Category Name Ex: Home (Optional)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),				
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'intro-section-video',
			'clone'		=> false,
			'type'		=> 'text',
			'desc'		=> 'Select "Video" At Intro Section Style &amp; Insert Youtube Video ID Ex: eZ70TaAUhQo',
		),		
		array(
			'name'     => __( 'Video Sound', 'introsecvds' ),
			'id'   => $prefix . 'intro-section-video-sound',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'0' => __( 'Enable', 'introsecvds' ),
				'1' => __( 'Disable', 'introsecvds' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => '0',

		),
		array(
			'name'		=> 'Revolution Slider ID',
			'id'		=> $prefix . 'rev-alias',
			'clone'		=> false,
			'type'		=> 'text',
			'desc'		=> 'Select "Revolution Slider" At Intro Section Style &amp; Insert Revolution Slider Shortcode ID.',
		),		
	
	)
);


/* ----------------------------------------------------- */
// Default Page Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'defaultpageseting',
	'title' => 'Default Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		
		array(
			'name'     => __( 'Default Page Layout', 'pgly' ),
			'id'   => $prefix . 'page-layout',
			'type'     => 'image_select',
			'desc'		=> 'Select "Default Template" At Page Attributes Template Option.',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
			    'full'   => __( get_template_directory_uri().'/includes/metaboxes/img/full.png', 'pgly' ),
			    'left'   => __( get_template_directory_uri().'/includes/metaboxes/img/left.png', 'pgly' ),
			    'right'  => __( get_template_directory_uri().'/includes/metaboxes/img/right.png', 'pgly' ),
			    'default'   => __( get_template_directory_uri().'/includes/metaboxes/img/default.png', 'pgly' ),
			),
            'std'   => 'default',
            'radio'     => true,			

		),				
		
	
	)
);

/* ----------------------------------------------------- */
// Blog Page Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'blogpageseting',
	'title' => 'Blog Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(				

		array(
			'name'     => __( 'Blog Page Layout', 'bgly' ),
			'id'   => $prefix . 'blog-page-layout',
			'type'     => 'image_select',
			'desc'		=> 'Select "Blog Page Template" At Page Attributes Template Option.',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
			    'default'   => __( get_template_directory_uri().'/includes/metaboxes/img/default.png', 'bgly' ),
			    'left'   => __( get_template_directory_uri().'/includes/metaboxes/img/left.png', 'bgly' ),
			    'right'  => __( get_template_directory_uri().'/includes/metaboxes/img/right.png', 'bgly' ),
			),
            'std'   => 'default',
            'radio'     => true,			

		),	

			array(
				'name'       => __( 'Number Of Post Show', 'blps' ),
				'id'         => $prefix . 'blog-post-show',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'blps' ),
				'suffix'     => __( ' Posts', 'blps' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),	

			array(
			'name'		=> 'Exclude Category',
			'id'		=> $prefix . 'blog-post-cat',
			'desc'		=> 'Enter category name ex: web design, web development (Optional)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
				
	
	)
);



/* ----------------------------------------------------- */
// Portfolio Page Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'portpageseting',
	'title' => 'Portfolio Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(				

		array(
			'name'     => __( 'Portfolio Page Layout', 'pfly' ),
			'id'   => $prefix . 'portfolio-page-layout',
			'desc'		=> 'Select "Portfolio Page Template" At Page Attributes Template Option.',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'default' => __( 'Default', 'pfly' ),
				'inner' => __( 'Inner', 'pfly' ),
				'full' => __( 'Full Width', 'pfly' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'default',		

		),             	
	
		array(
			'name'     => __( 'Portfolio Filter', 'pffl' ),
			'id'   => $prefix . 'portfolio-filter-category',
			'desc'		=> 'Select Portfolio Filter Category.',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'portfolio-filter-1' => __( 'Portfolio', 'pffl' ),
				'portfolio-filter-2' => __( 'Portfolio 2', 'pffl' ),
				'portfolio-filter-3' => __( 'Portfolio 3', 'pffl' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'portfolio-filter-1',		

		), 	
	
	)
);



/* ----------------------------------------------------- */
// Blog Post Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'blog_options',
	'title' => 'Post Options',
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(
	
		array(
			'name'		=> 'Gallery Images',
			'id'		=> $prefix . 'blog-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select "Gallery" At Post Format Options &amp; Upload Images.',
		),			
		array(
			'name'		=> 'Vimeo/Youtube Video Link',
			'id'		=> $prefix . 'bl-video',
			'clone'		=> false,
			'type'		=> 'textarea',
			'desc'		=> 'Select "Video" At Post Format Options &amp; Insert Vimeo/Youtube Embed Video Link URL.',
		),		
		array(
			'name'		=> 'Souncloud Audio Link',
			'id'		=> $prefix . 'bl-audio',
			'desc'		=> 'Select "Audio" At Post Format Options &amp; Insert Souncloud Audio Embed Link URL.',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),

		
	)
);


/* ----------------------------------------------------- */
/* Portfolio Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'portfolio_options',
	'title' => 'Portfolio Options',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'     => __( 'Image Size', 'prfimg' ),
			'id'   => $prefix . 'port-img-size',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Small', 'prfimg' ),
				'no' => __( 'Large', 'prfimg' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),
		array(
			'name'		=> 'Icon Name',
			'id'		=> $prefix . 'port_icon',
			'desc'		=> 'Insert font awesome icon name ex: fa-laptop',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),			
		array(
			'name'     => __( 'Post Formats', 'prtfrm' ),
			'id'   => $prefix . 'portfolio-post-formats',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'image' => __( 'Image', 'prtfrm' ),
				'slider' => __( 'Slider', 'prtfrm' ),
				'gallery' => __( 'Gallery', 'prtfrm' ),
				'video' => __( 'Video', 'prtfrm' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'image',

		),
		array(
			'name'		=> 'Slider/Gallery Images',
			'id'		=> $prefix . 'portfolio-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select "Slider or Gallery" At Portfolio Post Formats Options &amp; Upload Image.',
		),	
		array(
			'name'     => __( 'Video Player', 'prvdfr' ),
			'id'   => $prefix . 'portfolio-video-player',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'YouTube', 'prvdfr' ),
				'no' => __( 'Vimeo', 'prvdfr' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),		
		array(
			'name'		=> 'YouTube/Vimeo Video Link',
			'id'		=> $prefix . 'portfolio-video',
			'clone'		=> false,
			'type'		=> 'textarea',
			'desc'		=> 'Select "YouTube or Vimeo" At Portfolio Video Player Options &amp; Insert YouTube/Vimeo Embed Video Link URL.',
		),					
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_details',
	'title' => 'Portfolio Details',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Title Name',
			'id'		=> $prefix . 'prf_details_title',
			'desc'		=> 'Ex: Project Details',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Link Name',
			'id'		=> $prefix . 'prf_link_title',
			'desc'		=> 'Ex: Launch Project',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Link URL',
			'id'		=> $prefix . 'prf_link_url',
			'desc'		=> 'Write project link url ex: http://themeforest.net/user/webRedox/portfolio',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'     => __( 'Details Info Show', 'prfinf' ),
			'id'   => $prefix . 'prf_details_info-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Yes', 'prfinf' ),
				'no' => __( 'No', 'prfinf' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),		
		array(
			'name'		=> 'Details Info',
			'id'		=> $prefix . 'prf_info_details',
			'desc'		=> '',
			'type'		=> 'textarea',
			'clone' => true,
			'desc'		=> 'Insert details info ex: &lt;span&gt;Address : &lt;/span&gt; &lt;h4&gt;webredox.net&lt;/h4&gt;',
		),		
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_social',
	'title' => 'Portfolio Social',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'     => __( 'Social Share Icon', 'prfsh' ),
			'id'   => $prefix . 'prf-social-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Enable', 'prfsh' ),
				'no' => __( 'Disable', 'prfsh' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),	
		array(
			'name'		=> 'Title Name',
			'id'		=> $prefix . 'prf_social_title',
			'desc'		=> 'Ex: Share : ',
			'type'		=> 'text',
			'std'		=> ''
		),	

	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_section',
	'title' => 'Portfolio Section',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Section Title',
			'id'		=> $prefix . 'port-section-title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'     => __( 'Section Style', 'prtscst' ),
			'id'   => $prefix . 'portfolio-section-style',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'default' => __( 'Default', 'prtscst' ),
				'image' => __( 'Image', 'prtscst' ),
				'slider' => __( 'Slider', 'prtscst' ),
				'video' => __( 'Video', 'prtscst' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'default',

		),
		array(
			'name'		=> 'Section Images',
			'id'		=> $prefix . 'portfolio-section-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select A Style Type At Section Style Options &amp; Upload Image.',
		),
	
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'portfolio-section-video',
			'clone'		=> false,
			'type'		=> 'text',
			'desc'		=> 'Select "Video" At Section Style &amp; Insert Youtube Video ID Ex: RRPU_mfhYGA',
		),		
		array(
			'name'     => __( 'Section Video Sound', 'portsecvds' ),
			'id'   => $prefix . 'portfolio-section-video-sound',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'0' => __( 'Enable', 'portsecvds' ),
				'1' => __( 'Disable', 'portsecvds' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => '0',

		),	
		
	)
);


/* ----------------------------------------------------- */
/* Portfolio 2 Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'portfolio_options',
	'title' => 'Portfolio Options',
	'pages' => array( 'portfolio2' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'     => __( 'Image Size', 'prfimg' ),
			'id'   => $prefix . 'port-img-size',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Small', 'prfimg' ),
				'no' => __( 'Large', 'prfimg' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),
		array(
			'name'		=> 'Icon Name',
			'id'		=> $prefix . 'port_icon',
			'desc'		=> 'Insert font awesome icon name ex: fa-laptop',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),			
		array(
			'name'     => __( 'Post Formats', 'prtfrm' ),
			'id'   => $prefix . 'portfolio-post-formats',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'image' => __( 'Image', 'prtfrm' ),
				'slider' => __( 'Slider', 'prtfrm' ),
				'gallery' => __( 'Gallery', 'prtfrm' ),
				'video' => __( 'Video', 'prtfrm' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'image',

		),
		array(
			'name'		=> 'Slider/Gallery Images',
			'id'		=> $prefix . 'portfolio-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select "Slider or Gallery" At Portfolio Post Formats Options &amp; Upload Image.',
		),			
		array(
			'name'     => __( 'Video Player', 'prvdfr' ),
			'id'   => $prefix . 'portfolio-video-player',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'YouTube', 'prvdfr' ),
				'no' => __( 'Vimeo', 'prvdfr' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),		
		array(
			'name'		=> 'YouTube/Vimeo Video Link',
			'id'		=> $prefix . 'portfolio-video',
			'clone'		=> false,
			'type'		=> 'textarea',
			'desc'		=> 'Select "YouTube or Vimeo" At Portfolio Video Player Options &amp; Insert YouTube/Vimeo Embed Video Link URL.',
		),		
		
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_details',
	'title' => 'Portfolio Details',
	'pages' => array( 'portfolio2' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Title Name',
			'id'		=> $prefix . 'prf_details_title',
			'desc'		=> 'Ex: Project Details',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Link Name',
			'id'		=> $prefix . 'prf_link_title',
			'desc'		=> 'Ex: Launch Project',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Link URL',
			'id'		=> $prefix . 'prf_link_url',
			'desc'		=> 'Write project link url ex: http://themeforest.net/user/webRedox/portfolio',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'     => __( 'Details Info Show', 'prfinf' ),
			'id'   => $prefix . 'prf_details_info-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Yes', 'prfinf' ),
				'no' => __( 'No', 'prfinf' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),		
		array(
			'name'		=> 'Details Info',
			'id'		=> $prefix . 'prf_info_details',
			'desc'		=> '',
			'type'		=> 'textarea',
			'clone' => true,
			'desc'		=> 'Insert details info ex: &lt;span&gt;Address : &lt;/span&gt; &lt;h4&gt;webredox.net&lt;/h4&gt;',
		),		
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_social',
	'title' => 'Portfolio Social',
	'pages' => array( 'portfolio2' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'     => __( 'Social Share Icon', 'prfsh' ),
			'id'   => $prefix . 'prf-social-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Enable', 'prfsh' ),
				'no' => __( 'Disable', 'prfsh' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),	
		array(
			'name'		=> 'Title Name',
			'id'		=> $prefix . 'prf_social_title',
			'desc'		=> 'Ex: Share : ',
			'type'		=> 'text',
			'std'		=> ''
		),	

	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_section',
	'title' => 'Portfolio Section',
	'pages' => array( 'portfolio2' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Section Title',
			'id'		=> $prefix . 'port-section-title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'     => __( 'Section Style', 'prtscst' ),
			'id'   => $prefix . 'portfolio-section-style',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'default' => __( 'Default', 'prtscst' ),
				'image' => __( 'Image', 'prtscst' ),
				'slider' => __( 'Slider', 'prtscst' ),
				'video' => __( 'Video', 'prtscst' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'default',

		),
		array(
			'name'		=> 'Section Images',
			'id'		=> $prefix . 'portfolio-section-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select A Style Type At Section Style Options &amp; Upload Image.',
		),
	
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'portfolio-section-video',
			'clone'		=> false,
			'type'		=> 'text',
			'desc'		=> 'Select "Video" At Section Style &amp; Insert Youtube Video ID Ex: RRPU_mfhYGA',
		),		
		array(
			'name'     => __( 'Section Video Sound', 'portsecvds' ),
			'id'   => $prefix . 'portfolio-section-video-sound',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'0' => __( 'Enable', 'portsecvds' ),
				'1' => __( 'Disable', 'portsecvds' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => '0',

		),	
		
	)
);

/* ----------------------------------------------------- */
/* Portfolio 3 Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'portfolio_options',
	'title' => 'Portfolio Options',
	'pages' => array( 'portfolio3' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'     => __( 'Image Size', 'prfimg' ),
			'id'   => $prefix . 'port-img-size',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Small', 'prfimg' ),
				'no' => __( 'Large', 'prfimg' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),
		array(
			'name'		=> 'Icon Name',
			'id'		=> $prefix . 'port_icon',
			'desc'		=> 'Insert font awesome icon name ex: fa-laptop',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),			
		array(
			'name'     => __( 'Post Formats', 'prtfrm' ),
			'id'   => $prefix . 'portfolio-post-formats',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'image' => __( 'Image', 'prtfrm' ),
				'slider' => __( 'Slider', 'prtfrm' ),
				'gallery' => __( 'Gallery', 'prtfrm' ),
				'video' => __( 'Video', 'prtfrm' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'image',

		),
		array(
			'name'		=> 'Slider/Gallery Images',
			'id'		=> $prefix . 'portfolio-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select "Slider or Gallery" At Portfolio Post Formats Options &amp; Upload Image.',
		),			
		array(
			'name'     => __( 'Video Player', 'prvdfr' ),
			'id'   => $prefix . 'portfolio-video-player',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'YouTube', 'prvdfr' ),
				'no' => __( 'Vimeo', 'prvdfr' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),		
		array(
			'name'		=> 'YouTube/Vimeo Video Link',
			'id'		=> $prefix . 'portfolio-video',
			'clone'		=> false,
			'type'		=> 'textarea',
			'desc'		=> 'Select "YouTube or Vimeo" At Portfolio Video Player Options &amp; Insert YouTube/Vimeo Embed Video Link URL.',
		),			
		
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_details',
	'title' => 'Portfolio Details',
	'pages' => array( 'portfolio3' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Title Name',
			'id'		=> $prefix . 'prf_details_title',
			'desc'		=> 'Ex: Project Details',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Link Name',
			'id'		=> $prefix . 'prf_link_title',
			'desc'		=> 'Ex: Launch Project',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Link URL',
			'id'		=> $prefix . 'prf_link_url',
			'desc'		=> 'Write project link url ex: http://themeforest.net/user/webRedox/portfolio',
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'     => __( 'Details Info Show', 'prfinf' ),
			'id'   => $prefix . 'prf_details_info-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Yes', 'prfinf' ),
				'no' => __( 'No', 'prfinf' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),		
		array(
			'name'		=> 'Details Info',
			'id'		=> $prefix . 'prf_info_details',
			'desc'		=> '',
			'type'		=> 'textarea',
			'clone' => true,
			'desc'		=> 'Insert details info ex: &lt;span&gt;Address : &lt;/span&gt; &lt;h4&gt;webredox.net&lt;/h4&gt;',
		),		
	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_social',
	'title' => 'Portfolio Social',
	'pages' => array( 'portfolio3' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'     => __( 'Social Share Icon', 'prfsh' ),
			'id'   => $prefix . 'prf-social-on-off',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'yes' => __( 'Enable', 'prfsh' ),
				'no' => __( 'Disable', 'prfsh' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'yes',

		),	
		array(
			'name'		=> 'Title Name',
			'id'		=> $prefix . 'prf_social_title',
			'desc'		=> 'Ex: Share : ',
			'type'		=> 'text',
			'std'		=> ''
		),	

	)
);

$meta_boxes[] = array(
	'id' => 'portfolio_section',
	'title' => 'Portfolio Section',
	'pages' => array( 'portfolio3' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Section Title',
			'id'		=> $prefix . 'port-section-title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'     => __( 'Section Style', 'prtscst' ),
			'id'   => $prefix . 'portfolio-section-style',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'default' => __( 'Default', 'prtscst' ),
				'image' => __( 'Image', 'prtscst' ),
				'slider' => __( 'Slider', 'prtscst' ),
				'video' => __( 'Video', 'prtscst' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'default',

		),
		array(
			'name'		=> 'Section Images',
			'id'		=> $prefix . 'portfolio-section-image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Select A Style Type At Section Style Options &amp; Upload Image.',
		),
	
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'portfolio-section-video',
			'clone'		=> false,
			'type'		=> 'text',
			'desc'		=> 'Select "Video" At Section Style &amp; Insert Youtube Video ID Ex: RRPU_mfhYGA',
		),		
		array(
			'name'     => __( 'Section Video Sound', 'portsecvds' ),
			'id'   => $prefix . 'portfolio-section-video-sound',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'0' => __( 'Enable', 'portsecvds' ),
				'1' => __( 'Disable', 'portsecvds' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => '0',

		),	
		
	)
);

/* ----------------------------------------------------- */
/* Resume Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'resume_options',
	'title' => 'Resume Options',
	'pages' => array( 'resume' ),
	'context' => 'normal',	
	'fields' => array(

		array(
			'name'		=> 'Icon',
			'id'		=> $prefix . 'resume_icon',
			'desc'		=> 'Insert font awesome icon name ex: fa-briefcase',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Time Duration',
			'id'		=> $prefix . 'resume_time',
			'desc'		=> 'Insert Time Duration Ex: 2007-2010',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'		=> 'Main Category',
			'id'		=> $prefix . 'resume_title',
			'desc'		=> 'Insert Main Category Ex: Web Developer',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Sub Category',
			'id'		=> $prefix . 'resume_subtitle',
			'desc'		=> 'Insert Sub Category Ex: PHP',
			'clone'		=> true,
			'type'		=> 'text',
			'std'		=> ''
		),	
		
	)
);

/* ----------------------------------------------------- */
/* Services Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'services_options',
	'title' => 'Services Options',
	'pages' => array( 'services' ),
	'context' => 'normal',	
	'fields' => array(
	
		array(
			'name'		=> 'List Item',
			'id'		=> $prefix . 'services_subtitle',
			'desc'		=> 'Insert Services List Item Ex: Concept',
			'clone'		=> true,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'		=> 'Price',
			'id'		=> $prefix . 'services_price',
			'desc'		=> 'Insert Price Amount Ex: 50$-600$',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
	)
);

/* ----------------------------------------------------- */
/* Testimonial Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'testimonial_options',
	'title' => 'Testimonial Options',
	'pages' => array( 'testimonial' ),
	'context' => 'normal',	
	'fields' => array(
	
		array(
			'name'		=> 'Link Name',
			'id'		=> $prefix . 'testimonial_linkname',
			'desc'		=> 'Insert Link Name Ex: Via Twitter',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'		=> 'Link URL',
			'id'		=> $prefix . 'testimonial_linkurl',
			'desc'		=> 'Insert Link URL Ex: https://twitter.com/webRedox',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
	)
);


/* ----------------------------------------------------- */
/* Slider Post Type Metaboxes
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'slider_options',
	'title' => 'Slider Options',
	'pages' => array( 'slider' ),
	'context' => 'normal',	
	'fields' => array(
	
		array(
			'name'		=> 'Slide Title',
			'id'		=> $prefix . 'intro-slider-title',
			'desc'		=> 'Insert Slide Title Text.',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),		
		array(
			'name'		=> 'Slide Subtitle',
			'id'		=> $prefix . 'intro-slider-subtitle',
			'desc'		=> 'Insert Slide Subtitle Text.',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		array(
			'name'		=> 'Slide Subtitle Link',
			'id'		=> $prefix . 'intro-slider-link',
			'desc'		=> 'Insert Slide Subtitle Text Link Here. Ex: #about (Scrolling Page Slug Name)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'     => __( 'Slide Title Style', 'sldtlst' ),
			'id'   => $prefix . 'intro-slider-title-style',
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'left' => __( 'Left', 'sldtlst' ),
				'right' => __( 'Right', 'sldtlst' ),
				'center' => __( 'Center', 'sldtlst' ),
				
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'left',

		),	
		
		
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function rocknrolla_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'rocknrolla_register_meta_boxes' );