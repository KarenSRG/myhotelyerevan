<?php 
/*
 *  Template Name: AboutUs Page
 */
 
get_header();
// hotelone_load_section( 'elementor' );
$disable_aboutsection   = get_theme_mod( 'aboutpage_section_hide', 0 ); 
$aboutsection_title   = get_theme_mod( 'aboutpage_title', wp_kses_post(__('Welcome to <span>Hotelone</span>','hotelone')) ); 
if( !$disable_aboutsection ){
	$post_id = intval( get_theme_mod( 'aboutpage_contentid', 0 ) );
	$post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
	$post = get_post( $post_id );
?>
<div id="aboutPage_section" class="aboutPage_section">
	<div class="container">
		<div class="row">
			
			<?php if( get_the_post_thumbnail( $post, 'full' ) ){ ?>
			<div class="col-md-6 col-sm-6">
				<div class="about_thumb">
					<a href="<?php echo esc_url( get_permalink( $post )  ); ?>">
					<?php echo get_the_post_thumbnail( $post, 'full' ); ?>
					</a>
				</div>
			</div>
			<?php } ?>
			
			<div class="col-md-<?php if( get_the_post_thumbnail( $post, 'full' ) ){ echo '6'; }else{ echo '12'; } ?> col-sm-<?php if( get_the_post_thumbnail( $post, 'full' ) ){ echo '6'; }else{ echo '12'; } ?>">
				<?php 
				if( !empty( $aboutsection_title ) ){
				?>
				<h2 class="wow animated fadeInUp"><?php echo wp_kses_post( $aboutsection_title ); ?></h2>
				<?php } ?>
				
				<?php
					$content = apply_filters( 'the_content', $post->post_content );
						$content = str_replace( ']]>', ']]&gt;', $content );
						echo $content;
					?>
			</div>
		</div>
	</div><!-- .container -->
</div><!-- .aboutPage_section -->
<?php } 

$disable_calloutsection   = get_theme_mod( 'aboutpage_callout_hide', 0 ); 
$calloutsection_title   = get_theme_mod( 'aboutpage_callout_title', wp_kses_post(__('Get 30 Percent Discount On Any Room Booking','hotelone')) ); 
$calloutsection_subtitle = get_theme_mod( 'aboutpage_callout_subtitle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ); 
$calloutsection_btntext = get_theme_mod( 'aboutpage_callout_butttontext', esc_html__('Quick Enquiry','hotelone') ); 
$calloutsection_btnurl = get_theme_mod( 'aboutpage_callout_butttonurl', '#' ); 
$calloutsection_btntarget   = get_theme_mod( 'aboutpage_callout_target', 0 );

$bgcolor    = get_theme_mod( 'aboutpage_callout_bgcolor', '#333');
$bgimage    = get_theme_mod( 'aboutpage_callout_bgimage', '');
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

$aboutpage_team   = get_theme_mod( 'aboutpage_team_hide', 0 );

if( !$aboutpage_team ){

	hotelone_load_section('team');  
}
get_footer(); ?>