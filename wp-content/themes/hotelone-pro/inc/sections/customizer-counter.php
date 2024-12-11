<?php
function hotelone_customizer_counter( $wp_customize ){
	$wp_customize->add_panel( 'hotelone_counter_panel' ,
		array(
			'priority'        => 37,
			'title'           => esc_html__( 'Section: Counter', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
	
		$wp_customize->add_section( 'hotelone_counter_section' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Section Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_counter_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_counter_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => get_theme_mod('hotelone_counter_hide',false),
				)
			);
			$wp_customize->add_control( 'hotelone_counter_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'hotelone'),
					'section'     => 'hotelone_counter_section',
					'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'disable_automation_effect_counters',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => get_theme_mod('disable_automation_effect_counters',false),
				)
			);
			$wp_customize->add_control( 'disable_automation_effect_counters',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide automation effect from counter numbers?', 'hotelone'),
					'section'     => 'hotelone_counter_section',
					'description' => esc_html__('Check this box to hide automation effect from counter numbers.', 'hotelone'),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_counter_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => get_theme_mod('hotelone_counter_title',esc_html__('Our Numbers', 'hotelone')),
				)
			);
			$wp_customize->add_control( 'hotelone_counter_title',
				array(
					'label'     	=> esc_html__('Section Title', 'hotelone'),
					'section' 		=> 'hotelone_counter_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_counter_subtitle',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => get_theme_mod('hotelone_counter_subtitle',esc_html__('Section subtitle', 'hotelone')),
				)
			);
			$wp_customize->add_control( 'hotelone_counter_subtitle',
				array(
					'label'     	=> esc_html__('Section Subtitle', 'hotelone'),
					'section' 		=> 'hotelone_counter_section',
					'description'   => '',
				)
			);
			
		$wp_customize->add_section( 'hotelone_counter_content' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Section Content', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_counter_panel',
			)
		);
		
			$wp_customize->add_setting(
			'hotelone_counter_boxes',
			array(
				'sanitize_callback' => 'hotelone_sanitize_repeatable_data_field',
				'transport' => 'refresh', // refresh or postMessage
			) );


			$wp_customize->add_control(
				new HotelOne_Customize_Repeatable_Control(
					$wp_customize,
					'hotelone_counter_boxes',
					array(
						'label'     	=> esc_html__('Counter content', 'hotelone'),
						'description'   => '',
						'section'       => 'hotelone_counter_section',
						'live_title_id' => 'title', // apply for unput text and textarea only
						'title_format'  => esc_html__('[live_title]', 'hotelone'), // [live_title]
						'max_item'      => 30, // Maximum item can add
						'limited_msg' 	=> wp_kses_post( __('Upgrade to <a target="_blank" href="https://www.britetechs.com/plugins/hotelone-pro/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=hotelone_customizer#get-started">Hotelone Pro</a> to be able to add more items and unlock other premium features!', 'hotelone' ) ),
						'fields'    => array(
							'icon' => array(
								'title' => esc_html__('Icon', 'hotelone'),
								'type'  =>'icon',
								'desc'  => '',
								'default' => esc_html__( 'Your counter icon', 'hotelone' ),
							),
							'title' => array(
								'title' => esc_html__('Title', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
								'default' => esc_html__( 'Your counter label', 'hotelone' ),
							),
							'number' => array(
								'title' => esc_html__('Number', 'hotelone'),
								'type'  =>'text',
								'default' => 99,
							),
							'unit_before'  => array(
								'title' => esc_html__('Before number', 'hotelone'),
								'type'  =>'text',
								'default' => '',
							),
							'unit_after'  => array(
								'title' => esc_html__('After number', 'hotelone'),
								'type'  =>'text',
								'default' => '',
							),
						),

					)
				)
			);
			
		$wp_customize->add_section( 'hotelone_counterbg_section' , array(
			'title'      => __('Section Background', 'hotelone'),
			'panel'  => 'hotelone_counter_panel',
		) );
			$wp_customize->add_setting( 'hotelone_counter_bgcolor', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => get_theme_mod('hotelone_counter_bgcolor','#333'),
                'transport' => 'postMessage',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'hotelone_counter_bgcolor',
                array(
                    'label'       => esc_html__( 'Background Color', 'hotelone' ),
                    'section'     => 'hotelone_counterbg_section',
                    'description' => esc_html__( 'Change the background color of this section.', 'hotelone' ),
                )
            ));
			$wp_customize->add_setting( 'hotelone_counter_bgimage',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => get_theme_mod('hotelone_counter_bgimage',''),
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'hotelone_counter_bgimage',
				array(
					'label' 		=> esc_html__('Background image', 'hotelone'),
					'section' 		=> 'hotelone_counterbg_section',
					'description' => esc_html__('Upload the background image for this section.', 'hotelone' ),
				)
			));
}
add_action('customize_register','hotelone_customizer_counter');