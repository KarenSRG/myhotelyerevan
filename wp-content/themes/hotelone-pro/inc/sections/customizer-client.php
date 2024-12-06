<?php
function hotelone_customizer_client( $wp_customize ){
	$wp_customize->add_panel( 'hotelone_client_panel' ,
		array(
			'priority'        => 40,
			'title'           => esc_html__( 'Section: Client', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
	
		$wp_customize->add_section( 'hotelone_client_section' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Section Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_client_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_client_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'hotelone_client_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'hotelone'),
					'section'     => 'hotelone_client_section',
					'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_client_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Our Clients', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_client_title',
				array(
					'label'    		=> esc_html__('Section Title', 'hotelone'),
					'section' 		=> 'hotelone_client_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_client_subtitle',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Section subtitle', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_client_subtitle',
				array(
					'label'     => esc_html__('Section Subtitle', 'hotelone'),
					'section' 		=> 'hotelone_client_section',
					'description'   => '',
				)
			);
			
		$wp_customize->add_section( 'hotelone_client_content' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Section Content', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_client_panel',
			)
		);
		
			$wp_customize->add_setting(
				'hotelone_client_members',
				array(
					'sanitize_callback' => 'hotelone_sanitize_repeatable_data_field',
					'transport' => 'refresh', // refresh or postMessage
				) );


			$wp_customize->add_control(
				new HotelOne_Customize_Repeatable_Control(
					$wp_customize,
					'hotelone_client_members',
					array(
						'label'     => esc_html__('Client', 'hotelone'),
						'description'   => '',
						'section'       => 'hotelone_client_content',
						'live_title_id' => 'user_id', // apply for unput text and textarea only
						'title_format'  => esc_html__( '[live_title]', 'hotelone'), // [live_title]
						'max_item'      => 30, // Maximum item can add
						'limited_msg' 	=> wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.britetechs.com/plugins/hotelone-pro/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=hotelone_customizer#get-started">Hotelone Pro</a> to be able to add more items and unlock other premium features!', 'hotelone' ) ),
						'fields'    => array(
							'user_id' => array(
								'title' => esc_html__('User media', 'hotelone'),
								'type'  =>'media',
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
add_action('customize_register','hotelone_customizer_client');