<?php
function hotelone_customizer_servicepage( $wp_customize ){
	$wp_customize->add_panel( 'servicepage_panel',
		array(
			'priority'       => 42,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Service Page Panel', 'hotelone' ),
			'description'    => '',
		)
	);
		$wp_customize->add_section( 'servicepage_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Service Page Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'servicepage_panel',
			)
		);
			$wp_customize->add_setting( 'servicepage_section_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'servicepage_section_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide Service section?', 'hotelone'),
					'section'     => 'servicepage_section',
					'description' => esc_html__('Check this box to hide service section.', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'servicepage_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Our <span>Services</span>', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'servicepage_title',
				array(
					'label'    		=> esc_html__('Service Page Title', 'hotelone'),
					'section' 		=> 'servicepage_section',
					'description'   => '',
				)
			);			
			
		$wp_customize->add_section( 'servicepage_callout_section' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Service Page Callout', 'hotelone' ),
				'description' => '',
				'panel'       => 'servicepage_panel',
			)
		);
			$wp_customize->add_setting( 'servicepage_callout_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'servicepage_callout_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide service page callout section?', 'hotelone'),
					'section'     => 'servicepage_callout_section',
					'description' => esc_html__('Check this box to hide service page callout section.', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'servicepage_callout_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__('Hotelone is well design wordpress theme', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'servicepage_callout_title',
				array(
					'label'    		=> esc_html__('Service Page Callout Title', 'hotelone'),
					'section' 		=> 'servicepage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'servicepage_callout_subtitle',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'servicepage_callout_subtitle',
				array(
					'label'    		=> esc_html__('Service Page callout Content', 'hotelone'),
					'section' 		=> 'servicepage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'servicepage_callout_butttontext',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'servicepage_callout_butttontext',
				array(
					'label'    		=> esc_html__('Service Page callout Button Text', 'hotelone'),
					'section' 		=> 'servicepage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'servicepage_callout_butttonurl',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'servicepage_callout_butttonurl',
				array(
					'label'    		=> esc_html__('Service Page callout Button URL', 'hotelone'),
					'section' 		=> 'servicepage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'servicepage_callout_target',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'servicepage_callout_target',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Open link in new tab', 'hotelone'),
					'section'     => 'servicepage_callout_section',
					'description' => esc_html__('Check this box to open link in new tab.', 'hotelone'),
				)
			);			
			$wp_customize->add_setting( 'servicepage_callout_bgcolor', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '#ffffff',
                'transport' => 'postMessage',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'servicepage_callout_bgcolor',
                array(
                    'label'       => esc_html__( 'Background Color', 'hotelone' ),
                    'section'     => 'servicepage_callout_section',
                    'description' => esc_html__( 'Change the background color of this section.', 'hotelone' ),
                )
            ));
			$wp_customize->add_setting( 'servicepage_callout_bgimage',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'servicepage_callout_bgimage',
				array(
					'label' 		=> esc_html__('Background image', 'hotelone'),
					'section' 		=> 'servicepage_callout_section',
					'description' => esc_html__('Upload the background image for this section.', 'hotelone' ),
				)
			));
}
add_action('customize_register','hotelone_customizer_servicepage');