<?php 
$disable_video   = get_theme_mod( 'hotelone_videolightbox_hide', 0 );
$video_title    = get_theme_mod( 'hotelone_videolightbox_title', wp_kses_post('Watch our video of our great Hotel location. Press on play icon.','hotelone') );
$video_url    = get_theme_mod( 'hotelone_video_url' ,'https://www.youtube.com/watch?v=a-Tq472-Rjw' );
$bgcolor    = get_theme_mod( 'hotelone_video_bgcolor', '#333');
$bgimage    = get_theme_mod( 'hotelone_video_bgimage', '');
$video_shortcode    = get_theme_mod( 'hotelone_video_shortcode', '');
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
if( ! $disable_video ){
if ( is_active_sidebar( 'front-page-video-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-video-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="video" class="video_section section <?php echo esc_attr( $class ); ?>" <?php if($styleAttr!=''){ echo "style='$styleAttr'"; } ?>>
	
	<?php do_action('hotelone_section_before_inner', 'video'); ?>
	
	<?php if( !empty( $bgimage ) ){ ?>
	<div class="sectionOverlay">
	<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center video_lightbox">
					<?php if($video_shortcode==''){ ?>
					<a href="<?php echo esc_url( $video_url  ); ?>" data-src="<?php echo esc_url( $video_url  ); ?>" class="video-icon popup-video wow animated fadeInDown"><i class="fa fa-play"></i></a>
					<?php } 

					if( $video_title ){ ?>
					<h2 class="video-title wow animated fadeInUp"><?php echo wp_kses_post( $video_title); ?></h2>	
					<?php } 

					if($video_shortcode!=''){
						echo '<div class="text-left text-white">'.do_shortcode($video_shortcode).'</div>';
					}
					?>
				</div>
			</div>		
		</div><!-- .container -->
		
	<?php if( !empty( $bgimage ) ){ ?>
	</div>
	<?php } ?>
	
	<?php do_action('hotelone_section_after_inner', 'video'); ?>
	
</div><!-- .video_section -->
<?php if ( is_active_sidebar( 'front-page-video-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-video-bottom' ); ?>
		</div>
	</div>
</div>
<?php }
 } ?>