<?php 
add_action( 'widgets_init','hotelone_latest_post_widget'); 
/*
 * Hotelone Latest post widget
 */
function hotelone_latest_post_widget() 
{ 
	return   register_widget( 'hotelone_latest_post_widget' );
}

class hotelone_latest_post_widget extends WP_Widget {

	function __construct() {
		parent::__construct('hotelone_latest_post_widget', 
		__('Hotelone : Latest Post Widget', 'hotelone'),
		array( 
			'description' => __( 'Hotelone Latest Post Widget', 'hotelone' ),
		) );
	}

	public function widget( $args , $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['show_post'] = ( isset($instance['show_post'] ) ? $instance['show_post'] : '' );
		
		echo $args['before_widget'];
		
			echo $args['before_title'];
				echo $instance['title'];
			echo $args['after_title'];
			
			$loop = new WP_Query(array( 'post_type' => 'post', 'showposts' => $instance['show_post'] ));
			
			if( $loop->have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="media footer-post">
					  <?php if( has_post_thumbnail() ): ?>
					  <div class="media-left footer-post-thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
						</a>
					  </div>
					  <?php endif; ?>
					  
					  <div class="media-body">
						<a class="footer-post-title" href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						<span class="footer-post-date"><?php echo  get_the_date( 'M j,Y' ); ?></span>
					  </div>
					</div>										
				<?php endwhile;
			endif;
		
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['show_post'] = ( isset($instance['show_post'] ) ? $instance['show_post'] : 4 );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'show_post' ); ?>"><?php _e( 'Number of post to show:','hotelone' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'show_post' ); ?>" name="<?php echo $this->get_field_name( 'show_post' ); ?>" type="number" value="<?php echo esc_attr( $instance['show_post'] ); ?>" />
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['show_post'] = ( ! empty( $new_instance['show_post'] ) ) ? $new_instance['show_post'] : '';
		
		return $instance;
	}

} // class