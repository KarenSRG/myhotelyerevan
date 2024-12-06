<?php
function hotelone_customizer_aboutpage( $wp_customize ){
	$wp_customize->add_panel( 'about_panel',
		array(
			'priority'       => 41,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'About Page Panel', 'hotelone' ),
			'description'    => '',
		)
	);
		$wp_customize->add_section( 'aboutpage_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'About Page Content', 'hotelone' ),
				'description' => '',
				'panel'       => 'about_panel',
			)
		);
			$wp_customize->add_setting( 'aboutpage_section_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_section_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide about page section?', 'hotelone'),
					'section'     => 'aboutpage_section',
					'description' => esc_html__('Check this box to hide about page section.', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'aboutpage_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Welcome to <span>Our Hotel</span>', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'aboutpage_title',
				array(
					'label'    		=> esc_html__('About Page Title', 'hotelone'),
					'section' 		=> 'aboutpage_section',
					'description'   => '',
				)
			);
			
			$pages  =  get_pages();
			$option_pages = array();
			$option_pages[0] = esc_html__( 'Select page', 'hotelone' );
			foreach( $pages as $p ){
				$option_pages[ $p->ID ] = $p->post_title;
			}
	
			$wp_customize->add_setting( 'aboutpage_contentid',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => 0,
				)
			);
			$wp_customize->add_control( 'aboutpage_contentid',
				array(
					'label'    		=> esc_html__('Select Page', 'hotelone'),
					'description' => __('Choose your content page.','hotelone' ),
					'section' 		=> 'aboutpage_section',
					'type'=>'select',
					'choices' => $option_pages,
				)
			);
		$wp_customize->add_section( 'aboutpage_callout_section' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'About Page Callout', 'hotelone' ),
				'description' => '',
				'panel'       => 'about_panel',
			)
		);
			$wp_customize->add_setting( 'aboutpage_callout_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_callout_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide about page callout section?', 'hotelone'),
					'section'     => 'aboutpage_callout_section',
					'description' => esc_html__('Check this box to hide about page callout section.', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'aboutpage_callout_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__('Hotelone is well design wordpress theme', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'aboutpage_callout_title',
				array(
					'label'    		=> esc_html__('About Page Callout Title', 'hotelone'),
					'section' 		=> 'aboutpage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'aboutpage_callout_subtitle',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_callout_subtitle',
				array(
					'label'    		=> esc_html__('About Page callout Content', 'hotelone'),
					'section' 		=> 'aboutpage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'aboutpage_callout_butttontext',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_callout_butttontext',
				array(
					'label'    		=> esc_html__('About Page callout Button Text', 'hotelone'),
					'section' 		=> 'aboutpage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'aboutpage_callout_butttonurl',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_callout_butttonurl',
				array(
					'label'    		=> esc_html__('About Page callout Button URL', 'hotelone'),
					'section' 		=> 'aboutpage_callout_section',
					'description'   => '',
				)
			);
			$wp_customize->add_setting( 'aboutpage_callout_target',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_callout_target',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Open link in new tab', 'hotelone'),
					'section'     => 'aboutpage_callout_section',
					'description' => esc_html__('Check this box to open link in new tab.', 'hotelone'),
				)
			);
			$wp_customize->add_setting( 'aboutpage_callout_bgcolor', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '#ffffff',
                'transport' => 'postMessage',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'aboutpage_callout_bgcolor',
                array(
                    'label'       => esc_html__( 'Background Color', 'hotelone' ),
                    'section'     => 'aboutpage_callout_section',
                    'description' => esc_html__( 'Change the background color of this section.', 'hotelone' ),
                )
            ));
			$wp_customize->add_setting( 'aboutpage_callout_bgimage',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'aboutpage_callout_bgimage',
				array(
					'label' 		=> esc_html__('Background image', 'hotelone'),
					'section' 		=> 'aboutpage_callout_section',
					'description' => esc_html__('Upload the background image for this section.', 'hotelone' ),
				)
			));
			
		$wp_customize->add_section( 'aboutpage_team_section' ,
			array(
				'priority'    => 7,
				'title'       => esc_html__( 'About Page Team', 'hotelone' ),
				'description' => '',
				'panel'       => 'about_panel',
			)
		);
			$wp_customize->add_setting( 'aboutpage_team_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'aboutpage_team_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide about page team section?', 'hotelone'),
					'section'     => 'aboutpage_team_section',
					'description' => esc_html__('Check this box to hide about page team section.', 'hotelone'),
				)
			);
}
add_action('customize_register','hotelone_customizer_aboutpage');