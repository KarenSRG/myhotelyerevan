<?php 
$disable_room   = get_theme_mod( 'hotelone_room_hide', 0 );
$room_title    = get_theme_mod( 'hotelone_room_title', wp_kses_post('Our Featured Hotel <span>Rooms</span>','hotelone') );
$room_subtitle    = get_theme_mod( 'hotelone_room_subtitle', wp_kses_post('We are providing special categories of rooms.','hotelone') );
$roomlayout    = get_theme_mod( 'hotelone_room_layout', '4' );
$roomshow    = get_theme_mod( 'hotelone_room_no', '3' );
$roommorelink    = get_theme_mod( 'hotelone_room_more_link', '#' );
$roommoretext    = get_theme_mod( 'hotelone_room_more_text', __('View All','hotelone') );
$orderby = '';
$order = get_theme_mod( 'hotelone_room_order', 'desc' );
if( ! $disable_room ){
if ( is_active_sidebar( 'front-page-room-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-room-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="room" class="room_section section">
	
	<?php do_action('hotelone_section_before_inner', 'room'); ?>
	
	<div class="container">
		<?php if( $room_title || $room_subtitle ){ ?>
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( $room_title ){ ?>
				<h2 class="section-title wow animated fadeInDown"><?php echo wp_kses_post($room_title); ?></h2>
				<?php } ?>
				
				<?php if( $room_subtitle ){ ?>
				<div class="seprator wow animated slideInLeft"></div>
				<p class="section-desc wow animated fadeInUp"><?php echo wp_kses_post($room_subtitle); ?></p>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		
		<div class="row">
			
			<?php
			$args = array(
				'post_type' => 'room',
				'posts_per_page' => $roomshow,
			);
			if ( $cat > 0 ) {
                            $args['category__in'] = array( $cat );
                        }
						
			if ( $orderby && $orderby != 'default' ) {
				$args['orderby'] = $orderby;
			}

			if ( $order) {
				$args['order'] = $order;
			}

			$query = new WP_Query( $args );
			?>
			
			<?php if ( $query->have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			
			<?php 
			$meta = get_post_meta( get_the_ID(),'room_meta', true );
			$meta = wp_parse_args($meta, array(
                            'persons' => '3',
                            'rent' => '$59 / Per Night',
                            'rating' => '5',
                            'btntext' =>__('Book Now','hotelone'),
                            'btnurl' =>'',
                            'btntarget' => true,
                        ));
						
			if($meta['btnurl']!=''){
				$link = $meta['btnurl'];
			}else{
				$link = get_post_permalink();
			}
			?>
			<div class="col-md-<?php echo esc_attr( $roomlayout ); ?> col-sm-6 wow animated fadeInUp">
				<div class="card-room">
					
					<?php 
					$room_overlay_hide = get_theme_mod( 'room_overlay_hide', 0 );	
					if( has_post_thumbnail() ) { ?>
					<div class="room_thumbnial">
						<?php the_post_thumbnail('full'); 
						if($room_overlay_hide==false){
						?>
						<div class="room_overlay">
							<div class="room_overlay_inner">
								<?php 
								  $thumbId = get_post_thumbnail_id();
								  $thumbnailUrl = wp_get_attachment_url( $thumbId );
								  ?>
								<a class="overlay-btn roomimage" href="<?php echo esc_url( $thumbnailUrl ); ?>"><i class="fa fa-plus-circle"></i></a>
								<a class="overlay-btn" href="<?php echo esc_url( $link ); ?>" <?php if($meta['btntarget']==true){ echo 'target="_blank"';} ?>><i class="fa fa-link"></i></a>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					
					<div class="room_detail_info text-left">
						<span><?php echo $meta['rent']; ?></span>
						<span>
							<?php for($i=1; $i<=$meta['persons']; $i++){ ?>
							<i class="fa fa-male"></i>							
							<?php } ?>
						</span>
					</div>
					<div class="room-content text-center">
						<div class="room_rate">
							<?php for($r=1; $r<=5; $r++){ ?>
								<?php if($r<=$meta['rating']){ ?>
								<i class="fa fa-star star_yellow"></i>
								<?php }else{ ?>
								<i class="fa fa-star"></i>
								<?php } ?>
							<?php } ?>
						</div>
						
						<a href="<?php echo esc_url( $link ); ?>" <?php if($meta['btntarget']==true){ echo 'target="_blank"';} ?>>
							<?php the_title('<h4 class="room_title">','</h4>'); ?>
						</a>
						<div class="service_desc">
							<?php
								the_excerpt();
							?>
						</div>
					</div>
					<div class="text-center">
						<a class="hotel-btn hotel-primary hotel-small room-btn" href="<?php echo esc_url( $link ); ?>" <?php if($meta['btntarget']==true){ echo 'target="_blank"';} ?>><?php echo $meta['btntext']; ?> <i class="fa fa-arrow-right"></i></a>
					</div>						
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			
		</div><!-- .row -->	

		<?php if( $roommorelink ){ ?>
		<div class="row text-center">
			<a class="hotel-btn hotel-primary service-btn" href="<?php echo esc_url( $roommorelink); ?>"><?php printf( sprintf( wp_kses_post( $roommoretext ) ) ); ?></a>
		</div><!-- .row -->
		<?php } ?>
		
	</div><!-- .container -->
	
	<?php do_action('hotelone_section_after_inner', 'room'); ?>
	
</div><!-- .room_section -->
<?php if ( is_active_sidebar( 'front-page-room-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-room-bottom' ); ?>
		</div>
	</div>
</div>
<?php } 
 } ?>