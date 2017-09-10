<?php

class Custom_Social_DeWidget extends WP_Widget {
    var $settings = array( 'title', 'fb', 'tw', 'gm', 'in', 'yt', 'sk', 'im', 'be', 'sn', 'dr', 'gt');

    function Custom_Social_DeWidget() {
        $widget_ops = array('description' => 'Use this widget to add any type of social links as a widget.' );
       parent::__construct(false, __('Bionick - Social Widget', 'bionick'),$widget_ops);
}


function widget($args, $instance) {
        $settings = $this->morpheus_get_settings();
        extract( $args, EXTR_SKIP );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
         echo $before_widget; 
        
        if ( $title != '' )
            echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
        
		echo'<div class="footer-social">';
		echo'<ul>';

	    if ( $fb != '' ) {
	   echo '<li><a href="';
	   echo $fb;
	   echo '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		}
		
		if ( $tw != '' ) {
	   echo '<li><a href="';
	   echo $tw;
	   echo '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		}
		
		if ( $gm != '' ) {
	   echo '<li><a href="';
	   echo $gm;
	   echo '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
		}

		
		if ( $sk != '' ) {
	   echo '<li><a href="';
	   echo $sk;
	   echo '" target="_blank"><i class="fa fa-skype"></i></a></li>';
		}
		
		
		if ( $in != '' ) {
	   echo '<li><a href="';
	   echo $in;
	   echo '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
		}	   
		
		if ( $yt != '' ) {
	   echo '<li><a href="';
	   echo $yt;
	   echo '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
		}
		
		if ( $im != '' ) {
	   echo '<li><a href="';
	   echo $im;
	   echo '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
		}	

		if ( $be != '' ) {
	   echo '<li><a href="';
	   echo $be;
	   echo '" target="_blank"><i class="fa fa-behance"></i></a></li>';
		}		

		if ( $sn != '' ) {
	   echo '<li><a href="';
	   echo $sn;
	   echo '" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
		}	

		if ( $dr != '' ) {
	   echo '<li><a href="';
	   echo $dr;
	   echo '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
		}	

		if ( $gt != '' ) {
	   echo '<li><a href="';
	   echo $gt;
	   echo '" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>';
		}		
		
		
       echo '</ul>';      
       echo '</div>';      
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title', 'address','phone','email' ) as $setting )
            $new_instance[$setting] = strip_tags( $new_instance[$setting] );
        // Users without unfiltered_html cannot update this arbitrary HTML field
        if ( !current_user_can( 'unfiltered_html' ) )
            $new_instance['address'] = $old_instance['address'];
        return $new_instance;
    }


    function morpheus_get_settings() {
        // Set the default to a blank string
        $settings = array_fill_keys( $this->settings, '' );
        // Now set the more specific defaults
        return $settings;
    }

    function form($instance) {
        $instance = wp_parse_args( $instance, $this->morpheus_get_settings() );
        extract( $instance, EXTR_SKIP );
?>

    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
    </p>
	
    <p>
        <label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('fb'); ?>" value="<?php echo esc_attr( $fb ); ?>" class="widefat" id="<?php echo $this->get_field_id('fb'); ?>" />
    </p>
	
	 <p>
        <label for="<?php echo $this->get_field_id('tw'); ?>"><?php _e('Twitter:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tw'); ?>" value="<?php echo esc_attr( $tw ); ?>" class="widefat" id="<?php echo $this->get_field_id('tw'); ?>" />
    </p>
	
	 <p>
        <label for="<?php echo $this->get_field_id('gm'); ?>"><?php _e('Goole+:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('gm'); ?>" value="<?php echo esc_attr( $gm ); ?>" class="widefat" id="<?php echo $this->get_field_id('gm'); ?>" />
    </p>	
	
    
    <p>
        <label for="<?php echo $this->get_field_id('sk'); ?>"><?php _e('Skype:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('sk'); ?>" value="<?php echo esc_attr( $sk ); ?>" class="widefat" id="<?php echo $this->get_field_id('sk'); ?>" />
    </p>
	
	 <p>
        <label for="<?php echo $this->get_field_id('in'); ?>"><?php _e('Linkedin:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('in'); ?>" value="<?php echo esc_attr( $in ); ?>" class="widefat" id="<?php echo $this->get_field_id('in'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('yt'); ?>"><?php _e('Youtube:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('yt'); ?>" value="<?php echo esc_attr( $yt ); ?>" class="widefat" id="<?php echo $this->get_field_id('yt'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('im'); ?>"><?php _e('Instagram:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('im'); ?>" value="<?php echo esc_attr( $im ); ?>" class="widefat" id="<?php echo $this->get_field_id('im'); ?>" />
    </p>	
    
	<p>
        <label for="<?php echo $this->get_field_id('be'); ?>"><?php _e('Behance:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('be'); ?>" value="<?php echo esc_attr( $be ); ?>" class="widefat" id="<?php echo $this->get_field_id('be'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('sn'); ?>"><?php _e('Soundcloud:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('sn'); ?>" value="<?php echo esc_attr( $sn ); ?>" class="widefat" id="<?php echo $this->get_field_id('sn'); ?>" />
    </p>

	<p>
        <label for="<?php echo $this->get_field_id('dr'); ?>"><?php _e('Dribbble:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('dr'); ?>" value="<?php echo esc_attr( $dr ); ?>" class="widefat" id="<?php echo $this->get_field_id('dr'); ?>" />
    </p>	

	<p>
        <label for="<?php echo $this->get_field_id('gt'); ?>"><?php _e('Pinterest:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('gt'); ?>" value="<?php echo esc_attr( $gt ); ?>" class="widefat" id="<?php echo $this->get_field_id('gt'); ?>" />
    </p>    

    <?php 

    }
}

register_widget('Custom_Social_DeWidget');