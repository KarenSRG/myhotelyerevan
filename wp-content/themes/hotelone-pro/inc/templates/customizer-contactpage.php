<?php
function hotelone_customizer_contactpage( $wp_customize ){
	
	$mapurl = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114018.46205465568!2d-80.19908020878992!3d26.741920747096586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d5ccb595adc1%3A0x15efc7b51fe16bde!2sWest+Palm+Beach%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1520350846521';
	
	$wp_customize->add_panel( 'contactpage_panel',
		array(
			'priority'       => 43,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Contact Page Panel', 'hotelone' ),
			'description'    => '',
		)
	);
		
		$wp_customize->add_section( 'contactpage_settings_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'contactpage_panel',
			)
		);
			$wp_customize->add_setting( 'contactpage_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__( 'Contact', 'hotelone' ),
				)
			);
			$wp_customize->add_control( 'contactpage_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Contact Page Title', 'hotelone'),
					'section'     => 'contactpage_settings_section',
					'description' => esc_html__('Change the title for contact page.', 'hotelone'),
				)
			);
			
		$wp_customize->add_section( 'contactpage_map_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Map Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'contactpage_panel',
			)
		);
			$wp_customize->add_setting( 'map_section_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'map_section_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide Map section?', 'hotelone'),
					'section'     => 'contactpage_map_section',
					'description' => esc_html__('Check this box to hide map section.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'enable_popup_map',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => false,
				)
			);
			$wp_customize->add_control( 'enable_popup_map',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Show map in popup box', 'hotelone'),
					'section'     => 'contactpage_map_section',
					'description' => esc_html__('Check this box to show map in popup box.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'map_popup_btn_text',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__( 'Find us on the map', 'hotelone' ),
				)
			);
			$wp_customize->add_control( 'map_popup_btn_text',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Map popup button text', 'hotelone'),
					'section'     => 'contactpage_map_section',
					'description' => esc_html__('Change the text for map popup button.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'map_section_url',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'map_section_url',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Google Map URL', 'hotelone'),
					'section'     => 'contactpage_map_section',
					'description' => esc_html__('Please go to google map and search your palace. Click on share button then embed tab copy this iframe and open notepad and paste it into the file. After that, copy href value and paste this value in Map URL settings.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'map_shortcode_section_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'map_shortcode_section_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide Map Shorcode section?', 'hotelone'),
					'section'     => 'contactpage_map_section',
					'description' => esc_html__('Check this box to hide map shortcode section.', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'map_shortcode',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'map_shortcode',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Map Shorcode', 'hotelone'),
					'section'     => 'contactpage_map_section',
					'description' => esc_html__('Please enter your map shortcode in this setting box.', 'hotelone'),
				)
			);
		$wp_customize->add_section( 'contactpage_form_section' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Contact Form Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'contactpage_panel',
			)
		);
			$wp_customize->add_setting( 'contactpage_form_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __('Get In Touch','hotelone'),
				)
			);
			$wp_customize->add_control( 'contactpage_form_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Contact Form Title', 'hotelone'),
					'section'     => 'contactpage_form_section',
					'description' => esc_html__('Change contact form title from this settings', 'hotelone'),
				)
			);
			$wp_customize->add_setting(
				'hotelone_contactpageform_info', array(
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new Hotelone_Contactform_Info(
					$wp_customize, 'hotelone_contactpageform_info', array(
						'label' => esc_html__( 'Instructions', 'hotelone' ),
						'section' => 'contactpage_form_section',
						'capability' => 'install_plugins',
					)
				)
			);
			$wp_customize->add_setting( 'contactpage_form_shortcode',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'contactpage_form_shortcode',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Contact Form Shortcode', 'hotelone'),
					'section'     => 'contactpage_form_section',
					'description' => esc_html__('Please add your contact form shortcode in this settings.', 'hotelone'),
				)
			);
			
		$wp_customize->add_section( 'contactpage_info_section' ,
			array(
				'priority'    => 7,
				'title'       => esc_html__( 'Contact Info Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'contactpage_panel',
			)
		);
			$wp_customize->add_setting( 'contactpage_info_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __('Contact Information','hotelone'),
				)
			);
			$wp_customize->add_control( 'contactpage_info_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Contact Info Title', 'hotelone'),
					'section'     => 'contactpage_info_section',
					'description' => esc_html__('Change contact info title from this settings', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'contactpage_info_subtitle',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'contactpage_info_subtitle',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Contact info subtitle', 'hotelone'),
					'section'     => 'contactpage_info_section',
					'description' => esc_html__('Please add your contact info subtitle from this settings.', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'contactpage_info_address',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __('1516 Street West Palm Beach, 33401','hotelone'),
				)
			);
			$wp_customize->add_control( 'contactpage_info_address',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Address:', 'hotelone'),
					'section'     => 'contactpage_info_section',
					'description' => esc_html__('Change your address from this settings', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'contactpage_info_phone',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __('+30 561-352-5973','hotelone'),
				)
			);
			$wp_customize->add_control( 'contactpage_info_phone',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Phone:', 'hotelone'),
					'section'     => 'contactpage_info_section',
					'description' => esc_html__('Change your phone no. from this settings', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'contactpage_info_email',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __('info@hotelone.com','hotelone'),
				)
			);
			$wp_customize->add_control( 'contactpage_info_email',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Email:', 'hotelone'),
					'section'     => 'contactpage_info_section',
					'description' => esc_html__('Change your email address from this settings', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'contactpage_info_website',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __('www.example.com','hotelone'),
				)
			);
			$wp_customize->add_control( 'contactpage_info_website',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Website:', 'hotelone'),
					'section'     => 'contactpage_info_section',
					'description' => esc_html__('Change your website url from this settings', 'hotelone'),
				)
			);
}
add_action('customize_register','hotelone_customizer_contactpage');