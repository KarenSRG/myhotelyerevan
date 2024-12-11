<?php 
$disable_testimonial   = get_theme_mod( 'hotelone_testimonial_hide', 0 );
$testimonial_title    = get_theme_mod( 'hotelone_testimonial_title', wp_kses_post('Our <span>Testimonials</span>','hotelone') );
$testimonial_subtitle    = get_theme_mod( 'hotelone_testimonial_subtitle', wp_kses_post('What says our customers about us.','hotelone') );
$testimonial_data =  hotelone_get_section_testimonial_data();

$bgcolor    = get_theme_mod( 'hotelone_testimonial_bgcolor', '#333');
$bgimage    = get_theme_mod( 'hotelone_testimonial_bgimage', '');
$styleAttr = '';
if($bgcolor!=''){
	$styleAttr .= 'background-color:'.esc_attr( $bgcolor ).';';
}
if($bgimage!=''){
	$styleAttr .= 'background-image: url('.esc_url( $bgimage ).');';
}

$testimonial_bottom_content   = get_theme_mod( 'testimonial_bottom_content', '' );

$class = '';
if( !empty( $bgimage ) ){
	$class = 'section-overlay';
}

if( ! $disable_testimonial ){
if ( is_active_sidebar( 'front-page-testimonial-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-testimonial-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="testimonial" class="testimonial_section section <?php echo esc_attr( $class ); ?>" <?php if($styleAttr!=''){ echo "style='$styleAttr'"; } ?>>
	
	<?php do_action('hotelone_section_before_inner', 'testimonial'); ?>
	
	<?php if( !empty( $bgimage ) ){ ?>
	<div class="sectionOverlay">
	<?php } ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty($testimonial_title) ){ ?>
				<h2 class="section-title wow animated fadeInDown"><?php echo wp_kses_post($testimonial_title); ?></h2>
				<?php } ?>
				<?php if( !empty($testimonial_subtitle) ){ ?>
				<div class="seprator wow animated slideInLeft"></div>
				<p class="section-desc wow animated fadeInUp"><?php echo wp_kses_post($testimonial_subtitle); ?></p>
				<?php } ?>
			</div>
		</div>
		
		<?php if(!empty($testimonial_data)){ ?>
		<div class="row">
		
			<div class="col-md-12">
				<div class="testimonial">
				<div id="testimonial_carousel" class="carousel slide " data-ride="carousel" data-interval="6000">
					
					<?php $p_active = 1; ?>
					<ol class="carousel-indicators"> 
					<?php if( count($testimonial_data) > 1){ foreach( $testimonial_data as $key => $t ){ ?>
						<li data-target="#testimonial_carousel" data-slide-to="<?php echo esc_attr($key); ?>" class="<?php if( $p_active == 1){ echo 'active'; } ?>"></li>
					<?php $p_active++; } } ?>
					</ol>
					<div class="carousel-inner" role="listbox">
						
						<?php $p_active = 1; ?>
						<?php foreach( $testimonial_data as $key => $t ){ ?>
						<div class="item <?php if( $p_active == 1){ echo 'active'; } ?>">
							<div class="media">
							  
							  <?php 
							  $url = hotelone_get_media_url( $t['photo'] );
							  if( !empty($url) ){				
							  ?>
							  <div class="media-left">
								<img class="animated zoomIn" src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>">
							  </div>
							  <?php } ?>
							  
							  <div class="media-body">	
								<?php if( $t['review'] ){ ?>
								<p class="testimonial_desc animated zoomIn"><?php echo wp_kses_post( $t['review'] ); ?></p>
								<?php } ?>
								<?php if( $t['name'] ){ ?>
								- <h4 class="testimonial_title animated zoomIn"><?php echo wp_kses_post( $t['name'] ); ?></h4>
								<?php } ?>
								<?php if( $t['designation'] ){ ?>
								<span class="testimonial_designation animated zoomIn"><?php echo wp_kses_post( $t['designation'] ); ?></span>
								<?php } ?>
							  </div>
							</div>
						</div>
						<?php $p_active++; }  ?>
					
					</div>
				</div>
				</div><!-- .testimonial -->
			</div>	
			
		</div><!-- .row -->	
		<?php } ?>

		<?php if(!empty($testimonial_bottom_content)){ ?>
		<div class="row">
			<div class="col-md-12">
				<?php 
				$post_id = intval( $testimonial_bottom_content );
				$post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
				$post = get_post( $post_id );
				$content = apply_filters( 'the_content', $post->post_content );
						$content = str_replace( ']]>', ']]&gt;', $content );
						echo $content;
				?>
			</div>
		</div><!-- .row -->	
		<?php } ?>

	</div><!-- .container -->
	
	<?php if( !empty( $bgimage ) ){ ?>
	</div><!-- .sectionOverlay -->
	<?php } ?>
	
	<?php do_action('hotelone_section_after_inner', 'testimonial'); ?>
	
</div><!-- .testimonial_section -->
<?php if ( is_active_sidebar( 'front-page-testimonial-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-testimonial-bottom' ); ?>
		</div>
	</div>
</div>
<?php }
 } ?>