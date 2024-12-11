<?php 
/*
 *  Template Name: Gallery 4 Col
 */
 
get_header();
?>
<div class="galleryPage">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
					$post_type = 'project';
					$tax = 'portfolio_categories'; 
					$term_args = array( 'hide_empty' => true);
					
					$tax_terms = get_terms($tax, $term_args);
					$defualt_tex_id = get_option('custom_texo_business');
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
					
					$args = array ('post_type' => $post_type,'portfolio_categories' => $tax_term->slug,	'posts_per_page' =>$count_posts,'post_status' => 'publish');
					
					$portfolio_loop = new WP_Query($args);	
					
					if( $portfolio_loop->have_posts() ):
				?>
				<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tax_term->term_id == $defualt_tex_id) echo "active"; ?>">
					<div class="row">
						
						<?php while( $portfolio_loop->have_posts() ): $portfolio_loop->the_post(); ?>
						<div class="col-md-3 col-sm-3 wow animated fadeInUp">
							<div class="gallery-area">
								
								<?php if( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								<?php endif; ?>
								
								<div class="gallery-overlay">
									<div class="gallery-overlay-inner">
										<?php 
										  $thumbId = get_post_thumbnail_id();
										  $thumbnailUrl = wp_get_attachment_url( $thumbId );
										  ?>
										<a class="gallery-icon gallerythumb" href="<?php echo esc_url( $thumbnailUrl ); ?>"><i class="fa fa-eye"></i></a>
										<a class="gallery-icon" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
									</div>
								</div>
							</div><!-- .gallery-area -->
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
		
	</div>
</div><!-- .galleryPage -->
	
<?php get_footer(); ?>