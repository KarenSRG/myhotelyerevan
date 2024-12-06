<?php
$disable_team   = get_theme_mod( 'hotelone_team_hide', 0 );
$team_title    = get_theme_mod( 'hotelone_team_title', wp_kses_post('Meet Our <span>Team</span>','hotelone') );
$team_subtitle    = get_theme_mod( 'hotelone_team_subtitle', wp_kses_post('Our team members are caring of our customers','hotelone') );
$layout   = absint( get_theme_mod( 'hotelone_team_layout', 4 ) );
$team_social_icons_hide   = get_theme_mod( 'hotelone_team_social_icons_hide', 0 );
$team_data =  hotelone_get_section_team_data();

$teamButtonTitle  = get_theme_mod( 'teamButtonTitle', wp_kses_post('Join Now','hotelone') );
$teamButtonUrl  = get_theme_mod( 'teamButtonUrl', '#' );
$teamButtonTarget  = get_theme_mod( 'teamButtonTarget', true );


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

if( ! $disable_team ){
if ( is_active_sidebar( 'front-page-team-top' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-team-top' ); ?>
		</div>
	</div>
</div>
<?php } ?>
<div id="team" class="team_section section">
	
	<?php do_action('hotelone_section_before_inner', 'team'); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if( !empty($team_title) ){ ?>
				<h2 class="section-title wow animated fadeInDown"><?php echo wp_kses_post($team_title); ?></h2>
				<?php } ?>
				<?php if( !empty($team_subtitle) ){ ?>
				<div class="seprator wow animated slideInLeft"></div>
				<p class="section-desc wow animated fadeInUp"><?php echo wp_kses_post($team_subtitle); ?></p>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			
			<?php 
			$ti = 0;
			foreach( $team_data as $key => $t ){ 

				if ( $layout == 12 ) {
					$classes = 'col-sm-12 col-lg-'.$layout;
				} else {
					$classes = 'col-sm-6 col-lg-'.$layout;
				}

				if ($ti >= $columns) {
					$ti = 1;
					$classes .= ' clearleft';
				} else {
					$ti++;
				}
				?>
			<div class="<?php echo esc_attr( $classes ); ?> wow animated fadeInUp">
				<div class="team">
					
					<?php 
					  if( $t['image'] ){
						$url = hotelone_get_media_url( $t['image'] );
					  ?>
					<div class="team_thumbnial">
						
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>">

						<?php if($team_social_icons_hide==0){ ?>
						<div class="team_overlay">
							<div class="team_overlay_inner">

								<?php if($t['facebook_hide'] == false ){?>
								<a class="team_social_icons facebook" href="<?php echo esc_url( $t['facebook'] ); ?>"><i class="fa fa-facebook"></i></a>
								<?php } ?>

								<?php if($t['twitter_hide'] == false ){?>
								<a class="team_social_icons twitter" href="<?php echo esc_url( $t['twitter'] ); ?>"><i class="fa fa-twitter"></i></a>
								<?php } ?>

								<?php if($t['google_plus_hide'] == false ){?>
								<a class="team_social_icons google-plus" href="<?php echo esc_url( $t['google-plus'] ); ?>"><i class="fa fa-google-plus"></i></a>
								<?php } ?>

								<?php if($t['linkedin_hide'] == false ){?>
								<a class="team_social_icons linkedin" href="<?php echo esc_url( $t['linkedin'] ); ?>"><i class="fa fa-linkedin"></i></a>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					
					<div class="team_body text-center">
						<a class="team_title" href="<?php echo esc_url( $t['link'] ); ?>"><h3><?php echo esc_html( $t['name'] ); ?></h3></a>							
						<div class="team_content">
							<p class="team_designation"><?php echo esc_html( $t['designation'] ); ?></p>
						</div>							
					</div>
				</div><!-- .team -->
			</div>	
			<?php } ?>
			
			
		</div><!-- .row -->	
		<div class="row callout_section" style="ma">
			<div class="col-md-12 text-center" style="margin-top: 5px;">
				<?php if(!empty($teamButtonUrl)){ ?>
				<a class="callout-btn wow animated fadeInUp" href="<?php echo esc_url( $teamButtonUrl ); ?>" <?php if($teamButtonTarget==true){ echo 'target="_blank"'; } ?>><?php echo esc_html( $teamButtonTitle ); ?></a>
				<?php } ?>
			</div>			
		</div><!-- .row -->

	</div><!-- .container -->
	
	<?php do_action('hotelone_section_after_inner', 'team'); ?>
	
</div><!-- .team_section -->
<?php if ( is_active_sidebar( 'front-page-team-bottom' ) ) { ?>
<div class="frontpage_siderbar">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'front-page-team-bottom' ); ?>
		</div>
	</div>
</div>
<?php }
 } ?>