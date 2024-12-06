<?php 
$disable_counter   = get_theme_mod( 'hotelone_counter_hide', 0 );
$counter_title    = get_theme_mod( 'hotelone_counter_title', 'Our <span>Funfacts</span>' );
$counter_subtitle    = get_theme_mod( 'hotelone_counter_subtitle', 'See our funfacts are in below' );
$counter_data =  hotelone_get_section_counter_data();

$bgcolor    = get_theme_mod( 'hotelone_counter_bgcolor', '#333');
$bgimage    = get_theme_mod( 'hotelone_counter_bgimage', '');
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
if( ! $disable_counter ){
if ( is_active_sidebar( 'front-page-counter-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-counter-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="count" class="count_section section <?php echo esc_attr( $class ); ?>" <?php if($styleAttr!=''){ echo "style='$styleAttr'"; } ?>>
	
	<?php do_action('hotelone_section_before_inner', 'counter'); ?>
	
	<?php if( !empty( $bgimage ) ){ ?>
	<div class="sectionOverlay">
	<?php } ?>
	
	<div class="container">
	
		
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty($counter_title) ){ ?>
				<h2 class="section-title wow animated fadeInDown"><?php echo wp_kses_post($counter_title); ?></h2>
				<?php } ?>
				<?php if( !empty($counter_subtitle) ){ ?>
				<div class="seprator wow animated slideInLeft"></div>
				<p class="section-desc wow animated fadeInUp"><?php echo wp_kses_post($counter_subtitle); ?></p>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			
			<?php 
			
			$col = 3;
			$num_col = 4;
			$n = count( $counter_data );
			if ( $n < 4 ) {
				switch ($n) {
					case 3:
						$col = 4;
						$num_col = 3;
						break;
					case 2:
						$col = 6;
						$num_col = 2;
						break;
					default:
						$col = 12;
						$num_col = 1;
				}
			}
				
			$j = 0;
			
			foreach( $counter_data as $key => $c ){ 
			
			$class = 'col-lg-' . $col . ' col-md-' . $col . ' col-sm-3 col-xs-12';
			if ($j >= $num_col) {
				$j = 1;
				$class .= ' clearleft';
			} else {
				$j++;
			}
			?>
			<div class="<?php echo esc_attr($class); ?> wow animated fadeInUp">
				<div class="count text-center">
					<div class="count_icon">
						<i class="fa <?php echo esc_attr( $c['icon'] ); ?>"></i>
					</div>
					<?php echo esc_html( $c['unit_before'] ); ?>

					<?php if($c['number']!=''){?> 
					<span class="counter_count"><?php echo esc_html( $c['number'] ); ?></span> 
					<?php } ?>
					
					<?php echo esc_html( $c['unit_after'] ); ?>
					<h3 class="counter_title wow animated fadeInDown"><?php echo esc_html( $c['title'] ); ?></h3>
				</div><!-- .count -->
			</div>	
			<?php } ?>

		</div><!-- .row -->			
	</div><!-- .container -->
	
	<?php if( !empty( $bgimage ) ){ ?>
	</div><!-- .sectionOverlay -->
	<?php } ?>
	
	<?php do_action('hotelone_section_after_inner', 'counter'); ?>
	
</div><!-- .count_section -->
<?php if ( is_active_sidebar( 'front-page-counter-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-counter-bottom' ); ?>
		</div>
	</div>
</div>
<?php }
 } ?>