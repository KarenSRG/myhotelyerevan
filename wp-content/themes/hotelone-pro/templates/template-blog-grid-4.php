<?php 
/*
 *  Template Name: Blog Grid 4 Column
 */
 
get_header(); 
hotelone_load_section( 'elementor' );

$layout = hotelone_get_layout();
$layout = 'right';
$col = (is_active_sidebar( 'sidebar-1' )?'8':'12');
if($layout=='none'){
	$col = '12';
}
?>

<div id="site-content" class="site-content">
	<div class="container">		
		
		<?php 
			if ( $layout != 'none' && $layout=='left' ) {
				get_sidebar(); 
			} 
			?>
			
		<div class="col-md-<?php echo esc_attr( $col ); ?> primary">
			
			<?php
			global $paged;
			$paged  = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			$args = array( 'post_type' => 'post','paged'=>$paged);
			$loop = new WP_Query($args);

			$wp_query = $loop;
				
			if ( $loop->have_posts() ) :
				
				/* Start the Loop */
				echo '<div class="row">';

				while ( $loop->have_posts() ) : $loop->the_post();

					echo '<div class="col-md-3 col-sm-6 col-xs-12">';
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'grid' );

					echo '</div>';
					
				endwhile;

				echo '</div><div class="clearfix"></div>';
				
				the_posts_pagination( array(
						'prev_text' => '<i class="fa fa-angle-double-left"></i>',
						'next_text' => '<i class="fa fa-angle-double-right"></i>',
					) );
			
			else :
				
				get_template_part( 'template-parts/post/content', 'none' );
				
			endif;
			?>			
			
		</div>
		
		<?php 
			if ( $layout != 'none' && $layout=='right' ) {
				get_sidebar(); 
			} 
			?>
		
	</div>
</div><!-- .site-content -->
	
<?php get_footer(); ?>