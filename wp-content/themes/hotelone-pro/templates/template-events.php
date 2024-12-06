<?php 
/*
 *  Template Name: Events
 */
 
get_header(); 
hotelone_load_section( 'elementor' );
?>
<div class="room_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
					$post_type = 'event';
					$tax = 'event_categories'; 
					$term_args = array(
						'hide_empty' => true
						);
					
					$tax_terms = get_terms($tax,$term_args);
					$defualt_tex_id = get_option('custom_texo_event');
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
					
					$args = array ('post_type' => $post_type,'event_categories' => $tax_term->slug,	'posts_per_page' =>$count_posts,'post_status' => 'publish');
					
					$room_loop = new WP_Query($args);	
					
					if( $room_loop->have_posts() ):
				?>
				<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tax_term->term_id == $defualt_tex_id) echo "active"; ?>">
					<div class="row">
						
						<?php while( $room_loop->have_posts() ): $room_loop->the_post(); ?>
						
						<?php 
						$meta = get_post_meta( get_the_ID(),'event_meta', true );
						$meta = wp_parse_args($meta, array(
										'start_date' => '',
										'end_date' => '',
									));
						$link = get_post_permalink();
						?>
						<div class="col-md-4 col-sm-6 animated fadeInUp">
							<div class="card-event">
								<?php 
								if( has_post_thumbnail() ) { ?>
								<div class="event_thumbnial">
									<?php the_post_thumbnail('full'); ?>
									<div class="event-overlay text-center">
										<div class="row event-data">
											<div class="col-lg-9 col-md-9 col-9">
												<?php the_title('<h4 class="event-title"><a href="'.esc_url( $link ).'">','</a></h4>'); ?>
											</div>
											<div class="col-lg-3 col-md-3 col-3">
												<span class="event-icon"><i class="fa fa-chevron-right"></i></span>
		                               		</div>
										</div>									
									</div>
								</div>
								<?php } ?>													
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