<?php 
add_action( 'widgets_init','hotelone_about_widget'); 
/*
 * Hotelone About info widget
 */
function hotelone_about_widget() 
{ 
	return   register_widget( 'hotelone_about_widget' );
}

class hotelone_about_widget extends WP_Widget {

	function __construct() {
		parent::__construct('hotelone_about_widget', 
		__('Hotelone : About Widget', 'hotelone'),
		array( 
			'description' => __( 'Hotelone Information Widget', 'hotelone' ),
		) );
	}

	public function widget( $args , $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['description'] = ( isset($instance['description'] ) ? $instance['description'] : '' );
		$instance['image'] = ( isset($instance['image'] ) ? $instance['image'] : '' );
		
		echo $args['before_widget'];
		
			echo $args['before_title'];
				echo $instance['title'];
			echo $args['after_title'];
			echo '<img src="'.$instance['image'].'" alt="'.$instance['title'].'" style="margin-bottom: 10px"/>';
			echo '<p>'.$instance['description'].'</p>';
		
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['description'] = ( isset($instance['description'] ) ? $instance['description'] : '' );
		$instance['image'] = ( isset($instance['image'] ) ? $instance['image'] : '' );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:','hotelone' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" ><?php echo esc_attr( $instance['description'] ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Upload Image','hotelone' ); ?></label> 
		
			<input type="text" class="widefat custom_media_url_info" name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" value="<?php if( !empty($instance['image']) ): echo $instance['image']; endif; ?>" style="margin-top:5px;">
			<?php if( !empty($instance['image']) ): ?>
			<img id="custom_media_image_info" src="<?php echo $instance['image']; ?>" style="display:block; width:150px; margin-top:10px;">
			<?php endif; ?>
			<input type="button" class="button button-primary custom_media_button_info" id="custom_media_button_info" name="<?php echo $this->get_field_name('image'); ?>" value="<?php _e('Upload Image','hotelone'); ?>" style="margin-top:5px;"/>
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
		
		return $instance;
	}

} // class