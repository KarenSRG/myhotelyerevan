<?php 
$disable_client   = get_theme_mod( 'hotelone_client_hide', 0 );
$client_title    = get_theme_mod( 'hotelone_client_title', wp_kses_post('Our <span>Clients</span>','hotelone') );
$client_subtitle    = get_theme_mod( 'hotelone_client_subtitle', wp_kses_post('Lorem ipsum dolor sit amet consectetur adipiscing elit.','hotelone') );
$client_data =  hotelone_get_section_client_data();
if( ! $disable_client ){
if ( is_active_sidebar( 'front-page-client-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-client-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="client" class="client_section section" >
	<div class="">
		
		<?php do_action('hotelone_section_before_inner', 'client'); ?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if( !empty($client_title) ){ ?>
				<h2 class="section-title wow animated fadeInDown"><?php echo wp_kses_post($client_title); ?></h2>
				<?php } ?>
				<?php if( !empty($client_subtitle) ){ ?>
				<div class="seprator wow animated slideInLeft"></div>
				<p class="section-desc wow animated fadeInUp"><?php echo wp_kses_post($client_subtitle); ?></p>
				<?php } ?>
				</div>
			</div>
			
			<div class="row client_area">
			
				<div class="col-md-12">
						
						<div class="owl-carousel owl-theme">
							
							<?php foreach( $client_data as $key => $c ){ ?>
							<?php 
							if( $c['user_id'] ){
							$url = hotelone_get_media_url( $c['user_id'] );
							?>
							<div class="item">
								<div class="client_thumbnial">
									<a href="<?php echo esc_url( $c['link'] ); ?>" target="_blank">
									<img src="<?php echo esc_url( $url ); ?>" alt="client">
									</a>
								</div>
							</div>
							<?php } } ?>
						</div>						
						
				</div>		
				
			</div><!-- .row -->			
		</div><!-- .container -->
		
		<?php do_action('hotelone_section_after_inner', 'client'); ?>
		
	</div><!-- .sectionOverlay -->
</div><!-- .client_section -->
<?php if ( is_active_sidebar( 'front-page-client-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-client-bottom' ); ?>
		</div>
	</div>
</div>
<?php }
 } ?>