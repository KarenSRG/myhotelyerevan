<?php 
add_action( 'widgets_init','hotelone_contact_widget'); 
/*
 * Hotelone Contact widget
 */
function hotelone_contact_widget() 
{ 
	return   register_widget( 'hotelone_contact_widget' );
}

class hotelone_contact_widget extends WP_Widget {

	function __construct() {
		parent::__construct('hotelone_contact_widget', 
		__('Hotelone : Contact Widget', 'hotelone'),
		array( 
			'description' => __( 'Hotelone Contact Widget', 'hotelone' ),
		) );
	}

	public function widget( $args , $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['subtitle'] = ( isset($instance['subtitle'] ) ? $instance['subtitle'] : '' );
		$instance['address'] = ( isset($instance['address'] ) ? $instance['address'] : '' );
		$instance['website'] = ( isset($instance['website'] ) ? $instance['website'] : '' );
		$instance['phone'] = ( isset($instance['phone'] ) ? $instance['phone'] : '' );
		$instance['email'] = ( isset($instance['email'] ) ? $instance['email'] : '' );
		
		echo $args['before_widget'];
			
			if(!empty($instance['title']))
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
			
			if(!empty($instance['subtitle']))
			echo '<p class="footer-contact-title">'.$instance['subtitle'].'</p>';
			
			echo '<div>';	
				
				if(!empty($instance['address']))
				echo '<div class="media footer-addr">
						  <div class="media-left">
							<div class="footer-cont-icon"><i class="fa fa-map-marker"></i></div>
						  </div>
						  <div class="media-body">
							<div class="footer-addr-info">'.$instance['address'].'</div>
						  </div>
						</div>';
				
				if(!empty($instance['phone']))				
				echo '<div class="media footer-addr">
						  <div class="media-left">
							<div class="footer-cont-icon"><i class="fa fa-phone"></i></div>
						  </div>
						  <div class="media-body">
							<div class="footer-addr-info"><a href="tel:'.$instance['phone'] . '">'.$instance['phone'] . '</a></div>
						  </div>
						</div>';
			
				if(!empty($instance['email']))
				echo '<div class="media footer-addr">
						  <div class="media-left">
							<div class="footer-cont-icon"><i class="fa fa-envelope-o"></i></div>
						  </div>
						  <div class="media-body">
							<div class="footer-addr-info"><a href="mailto:'.$instance['email'] . '">'.$instance['email'] . '</a></div>
						  </div>
						</div>';
				
				if(!empty($instance['website']))
				echo '<div class="media footer-addr">
						  <div class="media-left">
							<div class="footer-cont-icon"><i class="fa fa-globe"></i></div>
						  </div>
						  <div class="media-body">
							<div class="footer-addr-info">'.$instance['website'] . '</div>
						  </div>
						</div>';
			
			echo '</div>';
		
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['subtitle'] = ( isset($instance['subtitle'] ) ? $instance['subtitle'] : '' );
		$instance['address'] = ( isset($instance['address'] ) ? $instance['address'] : '' );
		$instance['website'] = ( isset($instance['website'] ) ? $instance['website'] : '' );
		$instance['phone'] = ( isset($instance['phone'] ) ? $instance['phone'] : '' );
		$instance['email'] = ( isset($instance['email'] ) ? $instance['email'] : '' );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Description:','hotelone' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>"><?php echo esc_attr( $instance['subtitle'] ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address','hotelone' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" ><?php echo esc_attr( $instance['address'] ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'website' ); ?>"><?php _e( 'Website:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'website' ); ?>" name="<?php echo $this->get_field_name( 'website' ); ?>" type="text" value="<?php echo esc_attr( $instance['website'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $instance['phone'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>" />
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? $new_instance['subtitle'] : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? $new_instance['address'] : '';
		$instance['website'] = ( ! empty( $new_instance['website'] ) ) ? $new_instance['website'] : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? $new_instance['phone'] : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? $new_instance['email'] : '';
		
		return $instance;
	}

} // class