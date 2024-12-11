<?php 
/*
 *  Template Name: Room 4 Column
 */
 
get_header(); 
hotelone_load_section( 'elementor' );
?>
<div class="room_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
					$post_type = 'room';
					$tax = 'room_categories'; 
					$term_args = array( 'hide_empty' => true);
					
					$tax_terms = get_terms($tax, $term_args);
					$defualt_tex_id = get_option('custom_texo_room');
				?>
				<ul class="rooms-tabs">		
					<?php	foreach ($tax_terms  as $tax_term) { ?>
					<li <?php if($tax_term->term_id == $defualt_tex_id) echo "class='active'"; ?>><a data-toggle="tab" href="#<?php echo esc_attr( $tax_term->slug ); ?>"><?php echo esc_html( $tax_term->name ); ?></a></li>
					<?php } ?>					
				</ul>
			</div>
		</div>
		
		<div class="tab-content" id="myTabContent">
			<?php if ($tax_terms) { ?>
				<?php foreach ( $tax_terms  as $tax_term ) { 
					
					$count_posts = wp_count_posts( $post_type)->publish;
					
					$args = array ('post_type' => $post_type,'room_categories' => $tax_term->slug,	'posts_per_page' =>$count_posts,'post_status' => 'publish');
					
					$room_loop = new WP_Query($args);	
					
					if( $room_loop->have_posts() ):
				?>
				<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tax_term->term_id == $defualt_tex_id) echo "active"; ?>">
					<div class="row">
						
						<?php while( $room_loop->have_posts() ): $room_loop->the_post(); ?>
						
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
						<div class="col-md-3 col-sm-6 animated fadeInUp">
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
						
					</div>
				</div>
				<?php 
				
					endif;
					
					wp_reset_query();
					
					} 
					
				} 
				
				?>
			
		</div>		
		
	</div><!-- .container -->
</div><!-- .room_section -->

<?php get_footer(); ?>