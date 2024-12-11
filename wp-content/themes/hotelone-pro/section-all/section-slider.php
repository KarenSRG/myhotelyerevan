<?php 
$disable_slider       = get_theme_mod( 'hotelone_slider_disable', 0 );
$images = hotelone_get_section_slider_data();


if ( empty( $images ) || !is_array( $images ) ) {
    $images = array();
}

if ( empty( $images ) ){
	$images = array( 
		array(
			'image' => array('url'=>get_template_directory_uri().'/images/slides/slide1.jpg','id'=>51),
            'rating' => 5,
            'large_text' => wp_kses_post( 'Welcome To Hotelone WP Theme', 'hotelone'),
            'large_text_color' => '#fff',
            'small_text' => wp_kses_post( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do.', 'hotelone'),                            
            'small_text_color' => '#fff',
            'buttontext1' => 'Our Services',
            'buttonlink1' => '#',
            'buttontarget1' => false,
			'buttontext2' => 'Contact Now',
            'buttonlink2' => '#',
            'buttontarget2' => false,
		),
	);
}

if( ! $disable_slider ){
if ( is_active_sidebar( 'front-page-slider-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-slider-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="slider" class="big_section">
		<div id="hero_carousel" class="carousel slide " data-ride="carousel" data-interval="6000">
			<?php if( count($images) > 1 ){ ?>
			<?php $i = 1; ?>
			<ol class="carousel-indicators">
			<?php foreach($images as $index => $image){ ?>
			 
				<li data-target="#hero_carousel" data-slide-to="<?php echo esc_attr( $index ); ?>" class="<?php if( $i == 1 ){ echo 'active'; } $i++; ?>"></li>		  
			
			<?php } ?>
			</ol>
			<?php } ?>
			
		<div class="carousel-inner" role="listbox">
			
			<?php $i = 1; ?>
			<?php foreach($images as $image){ 
				$rating = isset( $image['rating'] ) ?  $image['rating'] : 5;
				$rating_hide = isset( $image['rating_hide'] ) ?  $image['rating_hide'] : false;
				$large_text_color = isset( $image['large_text_color'] ) ?  $image['large_text_color'] : '#fff';
				$small_text_color = isset( $image['small_text_color'] ) ?  $image['small_text_color'] : '#fff';			
				$btnlink1 = isset( $image['buttonlink1'] ) ?  $image['buttonlink1'] : '';
				$btnlink2 = isset( $image['buttonlink2'] ) ?  $image['buttonlink2'] : '';			
				$slideimage = hotelone_get_media_url( $image['image'] );
				?>
			<div class="item <?php if( $i == 1 ){ echo 'active'; } $i++; ?>" style="background-image: url(<?php echo esc_url($slideimage); ?>);">
				<img class="slide_image" src="<?php echo esc_url($slideimage); ?>">
				<div class="slider_overlay">
					<div class="slider_overlay_inner text-center">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="slider_overlay_bg">
										<?php if( $rating_hide == false ){ ?>
										<?php if( $rating  ){ ?>
										<div class="slide_rate">
											<?php for( $i=1; $i<=5; $i++){ ?>
											
												<?php if($i<=$rating){ ?>
												<i class="fa fa-star star_yellow"></i>
												<?php }else{ ?>
												<i class="fa fa-star"></i>
												<?php } ?>
											
											<?php } ?>
										</div>
										<?php } ?>
										<?php } ?>
										
										<?php if(!empty( $image['large_text'] )){ ?>
										<h2 class="big_title animated fadeInDown" style="color:#<?php echo esc_attr($large_text_color); ?>;"><?php echo wp_kses_post( $image['large_text'] ); ?> </h2>
										<?php } ?>
										
										<?php if(!empty( $image['small_text'] )){ ?>
										<p class="slider_content animated fadeInDown" style="color:#<?php echo esc_attr($small_text_color); ?>;"><?php echo wp_kses_post( $image['small_text'] ); ?></p>
										<?php } ?>
										
										<?php if(!empty( $btnlink1 )){ ?>
										<a class="hotel-btn hotel-primary animated fadeInDown" href="<?php echo esc_url( $btnlink1 ); ?>" <?php if($image['buttontarget1']){ echo 'target="_blank"';} ?>><?php echo wp_kses_post( $image['buttontext1'] ); ?></a>
										<?php } ?>
										
										<?php if(!empty( $btnlink2 )){ ?>
										<a class="hotel-btn hotel-secondry animated fadeInDown" href="<?php echo esc_url( $btnlink2 ); ?>" <?php if($image['buttontarget2']){ echo 'target="_blank"';} ?>><?php echo wp_kses_post( $image['buttontext2'] ); ?></a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .slider_overlay -->
			</div>
			<?php } ?>	
			
		</div><!-- .carousel-inner -->
		
		<?php if( count($images) > 1 ){ ?>
		<a class="left carousel-control" href="#hero_carousel" role="button" data-slide="prev">
			<span class="fa fa-angle-left" aria-hidden="true"></span>
			<span class="sr-only"><?php _e('Previous','hotelone'); ?></span>
		</a>
		<a class="right carousel-control" href="#hero_carousel" role="button" data-slide="next">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
			<span class="sr-only"><?php _e('Next','hotelone'); ?></span>
		</a>
		<?php } ?>
	</div>
</div><!-- .big_section -->
<?php if ( is_active_sidebar( 'front-page-slider-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-slider-bottom' ); ?>
		</div>
	</div>
</div>
<?php }
 } ?>