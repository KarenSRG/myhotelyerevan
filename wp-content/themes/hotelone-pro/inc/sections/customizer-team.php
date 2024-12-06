<?php
function hotelone_customizer_team( $wp_customize ){
	$wp_customize->add_panel( 'hotelone_team_panel' ,
		array(
			'priority'        => 38,
			'title'           => esc_html__( 'Section: Team', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
	
		$wp_customize->add_section( 'hotelone_team_section' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Section Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_team_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_team_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'hotelone_team_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'hotelone'),
					'section'     => 'hotelone_team_section',
					'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'hotelone_team_social_icons_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'hotelone_team_social_icons_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide social media icons with overlay?', 'hotelone'),
					'section'     => 'hotelone_team_section',
					'description' => esc_html__('Check this box to hide team social media icons with overlay in team section.', 'hotelone'),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_team_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Our Team', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_team_title',
				array(
					'label'    		=> esc_html__('Section Title', 'hotelone'),
					'section' 		=> 'hotelone_team_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_team_subtitle',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Section subtitle', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_team_subtitle',
				array(
					'label'     => esc_html__('Section Subtitle', 'hotelone'),
					'section' 		=> 'hotelone_team_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_team_layout',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => 4,
				)
			);

			$wp_customize->add_control( 'hotelone_team_layout',
				array(
					'label' 		=> esc_html__('Team Layout Settings', 'hotelone'),
					'section' 		=> 'hotelone_team_section',
					'description'   => '',
					'type'          => 'select',
					'choices'       => array(
						'3' => esc_html__( '4 Columns', 'hotelone' ),
						'4' => esc_html__( '3 Columns', 'hotelone' ),
						'6' => esc_html__( '2 Columns', 'hotelone' ),
						'12' => esc_html__( '1 Columns', 'hotelone' ),
					),
				)
			);

			$wp_customize->add_setting( 'teamButtonTitle',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__('Join Now', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'teamButtonTitle',
				array(
					'label'     => esc_html__('Team Bottom Button Text', 'hotelone'),
					'section' 		=> 'hotelone_team_section',
					'description'   => 'Enter text for team section bottom button text',
				)
			);

			$wp_customize->add_setting( 'teamButtonUrl',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '#',
				)
			);
			$wp_customize->add_control( 'teamButtonUrl',
				array(
					'label'     => esc_html__('Team Bottom Button URL', 'hotelone'),
					'section' 		=> 'hotelone_team_section',
					'description'   => 'Enter link for team section bottom button',
				)
			);

			$wp_customize->add_setting( 'teamButtonTarget',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => true,
				)
			);
			$wp_customize->add_control( 'teamButtonTarget',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Open link in new tab.', 'hotelone'),
					'section'     => 'hotelone_team_section',
					'description' => '',
				)
			);
			
		$wp_customize->add_section( 'hotelone_team_content' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Section Content', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_team_panel',
			)
		);
		
			$wp_customize->add_setting(
				'hotelone_team_members',
				array(
					'sanitize_callback' => 'hotelone_sanitize_repeatable_data_field',
					'transport' => 'refresh', // refresh or postMessage
				) );


			$wp_customize->add_control(
				new HotelOne_Customize_Repeatable_Control(
					$wp_customize,
					'hotelone_team_members',
					array(
						'label'     => esc_html__('Team members', 'hotelone'),
						'description'   => '',
						'section'       => 'hotelone_team_content',
						'live_title_id' => 'name', // apply for unput text and textarea only
						'title_format'  => esc_html__( '[live_title]', 'hotelone'), // [live_title]
						'max_item'      => 30, // Maximum item can add
						'limited_msg' 	=> wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.britetechs.com/plugins/hotelone-pro/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=hotelone_customizer#get-started">Hotelone Pro</a> to be able to add more items and unlock other premium features!', 'hotelone' ) ),
						'fields'    => array(
							'image' => array(
								'title' => esc_html__('User media', 'hotelone'),
								'type'  =>'media',
								'desc'  => '',
							),
							'name' => array(
								'title' => esc_html__('Name', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'designation' => array(
								'title' => esc_html__('Designation', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'facebook_hide' => array(
								'title' => esc_html__('Hide Facebook Icon', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),
							'facebook' => array(
								'title' => esc_html__('Facebook URL', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'twitter_hide' => array(
								'title' => esc_html__('Hide Twitter Icon', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),
							'twitter' => array(
								'title' => esc_html__('Twitter URL', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'google_plus_hide' => array(
								'title' => esc_html__('Hide Google Plus Icon', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),
							'google-plus' => array(
								'title' => esc_html__('Google Plus URL', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'linkedin_hide' => array(
								'title' => esc_html__('Hide LinkedIn Icon', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),
							'linkedin' => array(
								'title' => esc_html__('Linked In URL', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'link' => array(
								'title' => esc_html__('Custom Link', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
						),

					)
				)
			);
}
add_action('customize_register','hotelone_customizer_team');