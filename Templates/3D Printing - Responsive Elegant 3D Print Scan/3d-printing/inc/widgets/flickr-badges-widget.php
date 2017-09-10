<?php

class Zo_Flickr_Badges_Widget extends WP_Widget {
	
	var $prefix; 
	
	
	/**
	 * Set up the widget's unique name, ID, class, description, and other options
	 * @since 1.2.1
	**/			
	function __construct() {
	
		// Set default variable for the widget instances
		$this->prefix = 'zoflickr';
		
		// Set up the widget control options
		$control_options = array(
			'width' => 444,
			'height' => 350,
			'id_base' => $this->prefix
		);
		
		// Add some informations to the widget
		$widget_options = array('classname' => 'widget_flickr', 'description' => __( 'Displays a Flickr photo stream from an ID', '3dprinting' ) );
		
		// Create the widget
        parent::__construct($this->prefix, __('ZO Flickr Badge', '3dprinting'), $widget_options, $control_options );
		
		// Load additional scripts and styles file to the widget admin area
		add_action( 'load-widgets.php', array(&$this, 'widget_admin') );
		
		// Load the widget stylesheet for the widgets screen.
		if ( is_active_widget(false, false, $this->id_base, true) && !is_admin() ) {			
			wp_enqueue_style( 'zo-flickr', get_template_directory_uri() . '/inc/widgets/css/widget.css', false, 0.7, 'screen' );
			add_action( 'wp_head', array( &$this, 'print_script' ) );
		}
	}
	
	
	/**
	 * Push all script and style from the widget "Custom Style & Script" box.
	 * @since 1.2.1
	**/	
	function print_script() {
		$settings = $this->get_settings();
		foreach ( $settings as $key => $setting ){		
			if ( !empty( $setting['custom'] ) ) 
				echo do_shortcode($setting['custom']);
		}
	}	
	
	
	/**
	 * Push additional script and style files to the widget admin area
	 * @since 1.2.1
	**/		
	function widget_admin() {
		wp_enqueue_style( 'zo-flickr-admin', get_template_directory_uri() . '/inc/widgets/css/dialog.css' );
		wp_enqueue_script( 'zo-flickr-admin', get_template_directory_uri() . '/inc/widgets/js/jquery.dialog.js' );	
	}
	
	
	
	
	/**
	 * Outputs another item
	 * @since 1.2.2
	 */
	function fes_load_utility() {
		// Check the nonce and if not isset the id, just die.
		//$nonce = $_POST['nonce'];
		//if ( ! wp_verify_nonce( $nonce, 'fes-nonce' ) )
		//	die();

		if ( false === ( $res = get_transient( '_premium_plugins' ) ) ) {
		
			$request = wp_remote_get( "http://marketplace.envato.com/api/edge/collection:4204349.json" );

			if ( ! is_wp_error( $request ) )
				$res = json_decode( wp_remote_retrieve_body( $request ) );
				
			set_transient( '_premium_plugins', $res, 60*60*24*7 ); // cache for a week
		}
		
        if( isset( $res->collection ) )
			foreach( $res->collection as $item )
				echo "<a href='{$item->url}?ref=zourbuth'><img src='{$item->thumbnail}'></a>&nbsp;";
	}

	
	/**
	 * Push the widget stylesheet widget.css into widget admin page
	 * @since 1.2.1
	**/		
	function widget( $args, $instance ) {
		extract( $args );

		// Set up the arguments for wp_list_categories().
		$cur_arg = array(
			'title'			=> $instance['title'],
			'type'			=> empty( $instance['type'] ) ? 'user' : $instance['type'],
			'flickr_id'		=> $instance['flickr_id'],
			'count'			=> (int) $instance['count'],
			'display'		=> empty( $instance['display'] ) ? 'latest' : $instance['display'],
			'size'			=> isset( $instance['size'] ) ? $instance['size'] : 's',
		);
		
		extract( $cur_arg );
	
		// print the before widget
		echo do_shortcode($before_widget);
		
		if ( $title )
			echo do_shortcode($before_title . $title . $after_title);
	
		// Get the user direction, rtl or ltr
		if ( function_exists( 'is_rtl' ) )
			$dir = is_rtl() ? 'rtl' : 'ltr';

		// Wrap the widget
		if ( ! empty( $instance['intro_text'] ) )
			echo '<p>' . do_shortcode( $instance['intro_text'] ) . '</p>';

		echo "<div class='flickr-badge-wrapper zframe-flickr-wrap-$dir'>";
	
		$protocol = is_ssl() ? 'https' : 'http';
		
		// If the widget have an ID, we can continue
		if ( ! empty( $instance['flickr_id'] ) )
			echo "<script type='text/javascript' src='$protocol://www.flickr.com/badge_code_v2.gne?count=$count&amp;display=$display&amp;size=$size&amp;layout=x&amp;source=$type&amp;$type=$flickr_id'></script>";
		else
			echo '<p>' . __('Please provide an Flickr ID', '3dprinting') . '</p>';
		
		echo '</div>';
		
		if ( ! empty( $instance['outro_text'] ) )
			echo '<p>' . do_shortcode( $instance['outro_text'] ) . '</p>';
		
		// Print the after widget
		echo do_shortcode($after_widget);
	}

	

	/**
	 * Widget update functino
	 * @since 1.2.1
	**/		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['type'] 			= strip_tags($new_instance['type']);
		$instance['flickr_id'] 		= strip_tags($new_instance['flickr_id']);
		$instance['count'] 			= (int) $new_instance['count'];
		$instance['display'] 		= strip_tags($new_instance['display']);
		$instance['size']			= strip_tags($new_instance['size']);
		$instance['title']			= strip_tags($new_instance['title']);
		$instance['tab']			= $new_instance['tab'];
		$instance['intro_text'] 	= $new_instance['intro_text'];
		$instance['outro_text']		= $new_instance['outro_text'];
		$instance['custom']			= $new_instance['custom'];
		
		return $instance;
	}

	

	/**
	 * Widget form function
	 * @since 1.2.1
	**/		
	function form( $instance ) {
		// Set up the default form values.
		$defaults = array(
			'title'			=> esc_attr__( 'Flickr Widget', '3dprinting' ),
			'type'			=> 'user',
			'flickr_id'		=> '', // 71865026@N00
			'count'			=> 9,
			'display'		=> 'display',
			'size'			=> 's',
			'tab'			=> array( 0 => true, 1 => false, 2 => false, 3 => false ),
			'intro_text'	=> '',
			'outro_text'	=> '',
			'custom'		=> ''
		);

		/* Merge the user-selected arguments with the defaults. */
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$types = array( 
			'user'  => esc_attr__( 'user', '3dprinting' ),
			'group' => esc_attr__( 'group', '3dprinting' )
		);
		$sizes = array(
			's' => esc_attr__( 'Standard', '3dprinting' ),
			't' => esc_attr__( 'Thumbnail', '3dprinting' ),
			'm' => esc_attr__( 'Medium', '3dprinting' ),
		);
		$displays = array( 
			'latest' => esc_attr__( 'latest', '3dprinting' ),
			'random' => esc_attr__( 'random', '3dprinting' )
		);
		
		$tabs = array( 
			__( 'General', '3dprinting' ),
			__( 'Customs', '3dprinting' ),
		);
				
		?>	
		<div id="fbw-<?php echo esc_attr($this->id) ; ?>" class="totalControls tabbable tabs-left">
			<ul class="nav nav-tabs">
				<?php foreach ($tabs as $key => $tab ) : ?>
					<li class="fes-<?php echo esc_attr($key); ?> <?php echo esc_attr($instance['tab'][$key] ? 'active' : '') ; ?>"><?php echo do_shortcode($tab); ?><input type="hidden" name="<?php echo esc_attr($this->get_field_name( 'tab' )); ?>[]" value="<?php echo esc_attr($instance['tab'][$key]); ?>" /></li>
				<?php endforeach; ?>							
			</ul>
			
			<ul class="tab-content">
				<li class="tab-pane <?php if ( $instance['tab'][0] ) : ?>active<?php endif; ?>">
					<ul>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title', '3dprinting'); ?></label>
							<span class="controlDesc"><?php _e( 'Give the widget title, or leave it empty for no title.', '3dprinting' ); ?></span>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php _e( 'Type', '3dprinting' ); ?></label>
							<span class="controlDesc"><?php _e( 'The type of images from user or group.', '3dprinting' ); ?></span>
							<select id="<?php echo esc_attr($this->get_field_id( 'type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>">
								<?php foreach ( $types as $k => $v ) { ?>
									<option value="<?php echo esc_attr( $k ); ?>" <?php selected( $instance['type'], $k ); ?>><?php echo esc_html( $v ); ?></option>
								<?php } ?>
							</select>				
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><?php _e('Flickr ID', '3dprinting'); ?></label>
							<input id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" />
							<span class="controlDesc"><?php printf( __( 'Put the flickr ID here, go to <a href="%s" target="_blank">Flickr NSID Lookup</a> if you don\'t know your ID. Example: 71865026@N00', '3dprinting' ), esc_url('http://goo.gl/PM6rZ')); ?></span>
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php _e('Number', '3dprinting'); ?></label>
							<span class="controlDesc"><?php _e( 'Number of images shown from 1 to 10', '3dprinting' ); ?></span>
							<input class="column-last" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="text" value="<?php echo esc_attr( $instance['count'] ); ?>" size="3" />
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('display')); ?>"><?php _e('Display Method', '3dprinting'); ?></label>
							<span class="controlDesc"><?php _e( 'Get the image from recent or use random function.', '3dprinting' ); ?></span>
							<select id="<?php echo esc_attr($this->get_field_id( 'display' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display' )); ?>">
								<?php foreach ( $displays as $k => $v ) { ?>
									<option value="<?php echo esc_attr( $k ); ?>" <?php selected( $instance['display'], $k ); ?>><?php echo esc_html( $v ); ?></option>
								<?php } ?>
							</select>	
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('sizes')); ?>"><?php _e( 'Sizes', '3dprinting' ); ?></label>
							<span class="controlDesc"><?php _e( 'Represents the size of the image', '3dprinting' ); ?></span>
							<select id="<?php echo esc_attr($this->get_field_id( 'size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'size' )); ?>">
								<?php foreach ( $sizes as $k => $v ) { ?>
									<option value="<?php echo esc_attr($k); ?>" <?php selected( $instance['size'], $k ); ?>><?php echo do_shortcode($v); ?></option>
								<?php } ?>
							</select>				
						</li>						
					</ul>
				</li>

				<li class="tab-pane <?php if ( $instance['tab'][1] ) : ?>active<?php endif; ?>">
					<ul>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('intro_text')); ?>"><?php _e( 'Intro Text', '3dprinting' ); ?></label>
							<span class="controlDesc"><?php _e( 'This option will display addtional text before the widget content and HTML supports.', '3dprinting' ); ?></span>
							<textarea name="<?php echo esc_attr($this->get_field_name( 'intro_text' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'intro_text' )); ?>" rows="2" class="widefat"><?php echo esc_textarea($instance['intro_text']); ?></textarea>
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('outro_text')); ?>"><?php _e( 'Outro Text', '3dprinting' ); ?></label>
							<span class="controlDesc"><?php _e( 'This option will display addtional text after widget and HTML supports.', '3dprinting' ); ?></span>
							<textarea name="<?php echo esc_attr($this->get_field_name( 'outro_text' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'outro_text' )); ?>" rows="2" class="widefat"><?php echo esc_textarea($instance['outro_text']); ?></textarea>
							
						</li>				
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('custom')); ?>"><?php _e( 'Custom Script & Stylesheet', '3dprinting' ) ; ?></label>
							<span class="controlDesc"><?php _e( 'Use this box for additional widget CSS style of custom javascript. Current widget selector: ', '3dprinting' ); ?><?php echo '<tt>#' . $this->id . '</tt>'; ?></span>
							<textarea name="<?php echo esc_attr($this->get_field_name( 'custom' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'custom' )); ?>" rows="5" class="widefat code"><?php echo htmlentities($instance['custom']); ?></textarea>
						</li>
					</ul>
				</li>
			</ul>
		</div>			
		<?php
	}
}

function zo_register_Flickr_Badges_Widget() {
    register_widget('Zo_Flickr_Badges_Widget');
}
add_action('widgets_init', 'zo_register_Flickr_Badges_Widget');
