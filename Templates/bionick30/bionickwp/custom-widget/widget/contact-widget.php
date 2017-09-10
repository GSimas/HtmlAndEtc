<?php

class Custom_Contact_DeWidget extends WP_Widget {
    var $settings = array( 'title', 'phone','email', 'address');

    function Custom_Contact_DeWidget() {
        $widget_ops = array('description' => 'Use this widget to add any type of contact info.' );
        parent::__construct(false, __('Bionick - Contact Info Widget', 'bionick'),$widget_ops);
}


function widget($args, $instance) {
        $settings = $this->morpheus_get_settings();
        extract( $args, EXTR_SKIP );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
         echo $before_widget; 
        
        if ( $title != '' )
            echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
        
		
	   echo '<ul class="footer-contacts">';

	   	if ( $phone != '' ) {
			echo '<li>';
			echo '<a href="tel:';
			echo $phone;
			echo '" target="_top"><i class="fa fa-phone"></i> ';
			echo $phone;
			echo '</a></li>';			
		 }	

	   	if ( $address != '' ) {
			echo '<li>';
			echo '<a href="';
			echo $maplocation;
			echo '" target="_blank"><i class="fa fa-map-marker"></i> ';
			echo '<span>';
			echo $address;
			echo '</span>';
			echo '</a></li>';
		 }		 
	   
	   	if ( $email != '' ) {
			echo '<li>';
			echo '<a href="mailto:';
			echo $email;
			echo '" target="_top"><i class="fa fa-envelope-o"></i> ';
			echo $email;
			echo '</a></li>';
		 }
		
		
		echo '</ul>';
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title', 'phone','email','companyname', 'address','maplocation' ) as $setting )
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
        <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:','bionick'); ?></label>
        <textarea name="<?php echo $this->get_field_name('address'); ?>" class="widefat" id="<?php echo $this->get_field_id('address'); ?>"><?php echo esc_attr( $address ); ?></textarea>
        <label for="<?php echo $this->get_field_id('maplocation'); ?>"><?php _e('Map Location URL:','bionick'); ?></label>
        <textarea name="<?php echo $this->get_field_name('maplocation'); ?>" class="widefat" id="<?php echo $this->get_field_id('maplocation'); ?>"><?php echo esc_attr( $maplocation ); ?></textarea>		
    </p>
	
    <p>
        <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:','bionick'); ?></label>
        <textarea name="<?php echo $this->get_field_name('phone'); ?>" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>"><?php echo esc_textarea( $phone ); ?></textarea>
    </p>
    
   
    <p>
        <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('E-mail:','bionick'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo esc_attr( $email ); ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
    </p>
	

    <?php 

    }
}

register_widget('Custom_Contact_DeWidget');