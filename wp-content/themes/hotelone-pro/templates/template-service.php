<?php 
/*
 *  Template Name: Services Page
 */
 
get_header();
hotelone_load_section( 'elementor' );
$disable_servicesection   = get_theme_mod( 'servicepage_section_hide', 0 ); 
$servicesection_title   = get_theme_mod( 'servicepage_title', sprintf( wp_kses_post('Our Featured <span>Services</span>','hotelone') ) ); 
$layout = intval( get_theme_mod( 'hotelone_service_layout', '4') );

if( ! $disable_servicesection ){
	$page_ids =  hotelone_get_section_services_data();
?>
<div id="service" class="service_section section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php 
				if( !empty( $servicesection_title ) ){
				?>
				<h2 class="wow animated fadeInUp"><?php echo wp_kses_post($servicesection_title); ?></h2>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			<?php  if ( ! empty( $page_ids ) ) { ?>
			
			<?php
			$columns = 2;
			switch ( $layout ) {
				case 12:
					$columns =  1;
					break;
				case 6:
					$columns =  2;
					break;
				case 4:
					$columns =  3;
					break;
				case 3:
					$columns =  4;
					break;
			} 
			
			$si = 0;
			
			$size = sanitize_text_field( get_theme_mod( 'hotelone_service_icon_size', '5x' ) );
			
			foreach ($page_ids as $settings) {
				$post_id = $settings['content_page'];
				$post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
				$post = get_post($post_id);
				setup_postdata( $post );
				$settings['icon'] = trim($settings['icon']);
				
				$media = '';
				
				if ( $settings['icon'] ) {
					$settings['icon'] = trim( $settings['icon'] );
					if ( $settings['icon'] != '' && strpos($settings['icon'], 'fa') !== 0) {
						$settings['icon'] = 'fa-' . $settings['icon'];
					}
					$media = '<a href="'.esc_url(get_the_permalink()).'" target="_blank"><i class="fa '.esc_attr( $settings['icon'] ).'"></i></a>';
				}
				if ( $layout == 12 ) {
					$classes = 'col-sm-12 col-lg-'.$layout;
				} else {
					$classes = 'col-sm-6 col-lg-'.$layout;
				}

				if ($si >= $columns) {
					$si = 1;
					$classes .= ' clearleft';
				} else {
					$si++;
				}
			?>
			<div class="<?php echo esc_attr( $classes ); ?> wow animated fadeInUp">
				<div class="card-service">
					<?php if ( $settings['icon'] && $settings['icon_type'] == 'icon' ) { ?>
					<div class="service-icon text-center <?php echo 'fa-' . esc_attr( $size ); ?>">
						<?php if ( $media != '' ) {
							echo wp_kses_post($media);
						} ?>
					</div>
					<?php } ?>
					<div class="service-content text-center">
					<?php 
					if ( $settings['icon_type'] == 'image' && $settings['image'] ){
						$url = hotelone_get_media_url( $settings['image'] );
						if ( $url ) {
							$media = '<div class="service-icon-image"><img src="'.esc_url( $url ).'" alt="'.esc_attr(get_the_title()).'"></div>';
						}
						echo $media;
					}
					?>
					<?php if ( has_post_thumbnail( $post ) ) { ?>
					<div class="service-icon-image">
					<?php
						echo get_the_post_thumbnail( $post, 'hotelone-medium' );
						?>
					</div>
					<?php } ?>
					
						<h4 class="service_title"><?php echo get_the_title( $post ); ?></h4>
						<div class="service_desc">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php  } wp_reset_postdata(); ?>
			<?php  } ?>
			
		</div>			
	</div><!-- .container -->
</div><!-- .service_section -->
<?php 
} 
$disable_calloutsection   = get_theme_mod( 'servicepage_callout_hide', 0 ); 
$calloutsection_title   = get_theme_mod( 'servicepage_callout_title', wp_kses_post(__('Hotelone is well design wordpress theme','hotelone')) ); 
$calloutsection_subtitle = get_theme_mod( 'servicepage_callout_subtitle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ); 
$calloutsection_btntext = get_theme_mod( 'servicepage_callout_butttontext', esc_html__('Get In Touch','hotelone') ); 
$calloutsection_btnurl = get_theme_mod( 'servicepage_callout_butttonurl', '#' ); 
$calloutsection_btntarget   = get_theme_mod( 'servicepage_callout_target', 0 );

$bgcolor    = get_theme_mod( 'servicepage_callout_bgcolor', '#333');
$bgimage    = get_theme_mod( 'servicepage_callout_bgimage', '');
$styleAttr = '';
if($bgcolor!=''){
	$styleAttr .= 'background-color:'.esc_attr( $bgcolor ).';';
}
if($bgimage!=''){
	$styleAttr .= 'background-image: url('.esc_url( $bgimage ).');';
}

$class = '';
if( !empty( $bgimage ) ){
	$class = 'section-overlay';
}
if( !$disable_calloutsection ){
?>
<div id="callout" class="callout_section section <?php echo esc_attr( $class ); ?>" <?php if($styleAttr!=''){ echo "style='$styleAttr'"; } ?>>
	
	<?php if( !empty( $bgimage ) ){ ?>
	<div class="sectionOverlay">
	<?php } ?>
	
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if( !empty( $calloutsection_title ) ){ ?>
					<h2 class="callout-title wow animated fadeInDown"><?php echo wp_kses_post( $calloutsection_title ); ?></h2>
					<?php } ?>
					
					<?php if( !empty( $calloutsection_subtitle ) ){ ?>
					<p class="callout-subtitle wow animated fadeInDown"><?php echo wp_kses_post( $calloutsection_subtitle ); ?></p>
					<?php } ?>
					
					<?php if( !empty( $calloutsection_btnurl ) ){ ?>
					<a href="<?php echo esc_url( $calloutsection_btnurl ); ?>" <?php if( !empty( $calloutsection_btntarget ) ){ echo 'target="_blank"'; } ?> class="callout-btn wow animated fadeInUp"><?php echo wp_kses_post( $calloutsection_btntext ); ?></a>
					<?php } ?>
				</div>
			</div>		
		</div><!-- .container -->
	
	<?php if( !empty( $bgimage ) ){ ?>
	</div>
	<?php } ?>
	
</div><!-- .callout_section -->
<?php }

get_footer(); ?>