<?php 
/*
 *  Template Name: Contact Us
 */
 
get_header();
hotelone_load_section( 'elementor' );
$disable_mapsection   = get_theme_mod( 'map_section_hide', 0 ); 
$map_url   = get_theme_mod( 'map_section_url' ); 

$disable_map_shortcode_section   = get_theme_mod( 'map_shortcode_section_hide', 0 ); 
$map_shortcode   = get_theme_mod( 'map_shortcode' );

$enable_popup_map   = get_theme_mod( 'enable_popup_map', 0 );
$map_popup_btn_text   = get_theme_mod( 'map_popup_btn_text', 'Find us on the map' );

if( ! $disable_mapsection && !empty($map_url) ){
?>
<div id="googleMap" class="googleMap">
	<div class="container-fluid">
		<div class="row">
			<iframe width="100%" scrolling="no" height="450" frameborder="0" src="<?php echo esc_url( $map_url ); ?>" marginwidth="0" marginheight="0"></iframe>
		</div>
	</div>
</div><!-- .googleMap -->
<?php
}
 
$contactpage_title   = get_theme_mod( 'contactpage_title', wp_kses_post(__('Contact','hotelone')) ); 
$contactpage_form_title   = get_theme_mod( 'contactpage_form_title', wp_kses_post(__('Get In Touch','hotelone')) ); 
$contactpage_form_shortcode   = get_theme_mod( 'contactpage_form_shortcode', '' ); 

$contactpage_info_title   = get_theme_mod( 'contactpage_info_title', wp_kses_post(__('Contact Informations','hotelone')) ); 
$contactpage_info_subtitle   = get_theme_mod( 'contactpage_info_subtitle', '' ); 
$contactpage_info_address   = get_theme_mod( 'contactpage_info_address', '1516 Street West Palm Beach, 33401' ); 
$contactpage_info_phone   = get_theme_mod( 'contactpage_info_phone', '+33 555 66 777' ); 
$contactpage_info_email   = get_theme_mod( 'contactpage_info_email', 'info@demo.com' ); 
$contactpage_info_website   = get_theme_mod( 'contactpage_info_website', 'www.example.com' ); 
?>
<div id="contactPage" class="contactPage">
	<div class="container">
		<div class="row contact-row">
			<div class="col-md-12 text-center">
				<?php if( !empty( $contactpage_title ) ){ ?>
				<h2 class="contactPageTitle wow animated fadeInUp"><?php echo wp_kses_post( $contactpage_title ); ?></h2>
				<?php } ?>
			</div>
		</div>
		
		<div class="row contact-row">
			<div class="col-md-8 col-sm-8">
				
				<?php if( !empty( $contactpage_form_title ) ){ ?>
				<h2 class="wow animated slideInLeft"><?php echo wp_kses_post( $contactpage_form_title ); ?></h2>
				<?php } ?>
				 
				<?php echo do_shortcode( $contactpage_form_shortcode ); ?>
				
			</div>
			<div class="col-md-4 col-sm-4 contact-secondary">
				
				<?php if( !empty( $contactpage_info_title ) ){ ?>
				<h2 class="wow animated slideInLeft"><?php echo wp_kses_post( $contactpage_info_title ); ?></h2>
				<?php } ?>
				
				<?php if( !empty( $contactpage_info_subtitle ) ){ ?>
				<p><?php echo wp_kses_post( $contactpage_info_subtitle ); ?></p>
				<?php } ?>
				
				<ul class="contact_icons">
					
					<?php if( !empty( $contactpage_info_address ) ){ ?>
					<li class="wow animated fadeInUp"><span><i class="fa fa-map-marker "></i></span> 	<div><?php echo esc_html( $contactpage_info_address ); ?></div></li>
					<?php } ?>
					
					<?php if( !empty( $contactpage_info_phone ) ){ ?>
					<li class="wow animated fadeInUp"><span><i class="fa fa-phone"></i></span> <a href="tel:<?php echo esc_attr( $contactpage_info_phone ); ?>"><?php echo esc_html( $contactpage_info_phone ); ?></a></li>
					<?php } ?>
					
					<?php if( !empty( $contactpage_info_email ) ){ ?>
					<li class="wow animated fadeInUp"><span><i class="fa fa-envelope"></i></span> <a href="mailto:<?php echo esc_attr( $contactpage_info_email ); ?>"><?php echo esc_html( $contactpage_info_email ); ?></a></li>
					<?php } ?>
					
					<?php if( !empty( $contactpage_info_website ) ){ ?>
					<li class="wow animated fadeInUp"><span><i class="fa fa-globe"></i></span> <?php echo esc_html( $contactpage_info_website ); ?></li>
					<?php } ?>
				</ul>
			</div>				
		</div><!-- .row -->			
	</div><!-- .container -->
</div><!-- .contactPage -->

<?php if($enable_popup_map == true){ ?>
<div style="margin: 0 0 100px;">
	<div class="text-center">
		<a href="#" class="hotel-btn hotel-primary" data-toggle="modal" data-target="#largeModal"><?php echo $map_popup_btn_text; ?></a>
	</div>
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Find Us</h4>
	      </div>
	      <div class="modal-body">
	        <iframe width="100%" scrolling="no" height="450" frameborder="0" src="<?php echo esc_url( $map_url ); ?>" marginwidth="0" marginheight="0"></iframe>
	      </div>
	    </div>
	  </div>
	</div>
</div>			
<?php 
}

if( ! $disable_map_shortcode_section && !empty($map_shortcode) ){
?>
<div id="googleMap" class="googleMap">
	<div class="container-fluid">
		<div class="row">
			<?php echo do_shortcode( $map_shortcode ); ?>
		</div>
	</div>
</div><!-- .googleMap -->
<?php
}
get_footer(); ?>