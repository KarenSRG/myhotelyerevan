<?php
function hotelone_customizer_testimonial( $wp_customize ){

	$pages  =  get_pages();
	$hotelone_option_pages = array();
	$hotelone_option_pages[0] = esc_html__( 'Select page', 'hotelone' );
	foreach( $pages as $page ){
		$hotelone_option_pages[ $page->ID ] = $page->post_title;
	}

	$wp_customize->add_panel( 'hotelone_testimonial_panel' ,
		array(
			'priority'        => 35,
			'title'           => esc_html__( 'Section: Testimonial', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
	
		$wp_customize->add_section( 'hotelone_testimonial_section' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Section Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_testimonial_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_testimonial_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => get_theme_mod('hotelone_testimonial_hide',false),
				)
			);
			$wp_customize->add_control( 'hotelone_testimonial_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'hotelone'),
					'section'     => 'hotelone_testimonial_section',
					'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_testimonial_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => get_theme_mod('hotelone_testimonial_title',esc_html__('Client`s Testimonials', 'hotelone')),
				)
			);
			$wp_customize->add_control( 'hotelone_testimonial_title',
				array(
					'label'    		=> esc_html__('Section Title', 'hotelone'),
					'section' 		=> 'hotelone_testimonial_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_testimonial_subtitle',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => get_theme_mod('hotelone_testimonial_subtitle',esc_html__('Section subtitle', 'hotelone')),
				)
			);
			$wp_customize->add_control( 'hotelone_testimonial_subtitle',
				array(
					'label'     => esc_html__('Section Subtitle', 'hotelone'),
					'section' 		=> 'hotelone_testimonial_section',
					'description'   => '',
				)
			);
			
		$wp_customize->add_section( 'hotelone_testimonial_content' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Section Content', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_testimonial_panel',
			)
		);
		
			$wp_customize->add_setting(
				'hotelone_testimonial_items',
				array(
					'sanitize_callback' => 'hotelone_sanitize_repeatable_data_field',
					'transport' => 'refresh', // refresh or postMessage
				) );


			$wp_customize->add_control(
				new HotelOne_Customize_Repeatable_Control(
					$wp_customize,
					'hotelone_testimonial_items',
					array(
						'label'     => esc_html__('Testimonial', 'hotelone'),
						'description'   => '',
						'section'       => 'hotelone_testimonial_content',
						'live_title_id' => 'name', // apply for unput text and textarea only
						'title_format'  => esc_html__( '[live_title]', 'hotelone'), // [live_title]
						'max_item'      => 30, // Maximum item can add
						'limited_msg' 	=> wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.britetechs.com/plugins/hotelone-pro/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=hotelone_customizer#get-started">Hotelone Pro</a> to be able to add more items and unlock other premium features!', 'hotelone' ) ),
						'fields'    => array(
							'photo' => array(
								'title' => esc_html__('Client Photo', 'hotelone'),
								'type'  =>'media',
								'desc'  => '',
							),
							'name' => array(
								'title' => esc_html__('Client Name', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'review' => array(
								'title' => esc_html__('Review Content', 'hotelone'),
								'type'  =>'textarea',
								'desc'  => '',
							),
							'designation' => array(
								'title' => esc_html__('Designation', 'hotelone'),
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

			$wp_customize->add_setting( 'testimonial_bottom_content',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'testimonial_bottom_content',
				array(
					'label'     => esc_html__('Select Content Page', 'hotelone'),
					'description'   => esc_html__('Select page for section bottom contents.', 'hotelone'),
					'section' 		=> 'hotelone_testimonial_content',
					'type' 		=> 'dropdown-pages',					
				)
			);
		
		$wp_customize->add_section( 'hotelone_testimonialbg_section' , array(
			'title'      => __('Section Background', 'hotelone'),
			'panel'  => 'hotelone_testimonial_panel',
		) );
			$wp_customize->add_setting( 'hotelone_testimonial_bgcolor', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => get_theme_mod('hotelone_testimonial_subtitle','#333'),
                'transport' => 'postMessage',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'hotelone_testimonial_bgcolor',
                array(
                    'label'       => esc_html__( 'Background Color', 'hotelone' ),
                    'section'     => 'hotelone_testimonialbg_section',
                    'description' => esc_html__( 'Change the background color of this section.', 'hotelone' ),
                )
            ));
			$wp_customize->add_setting( 'hotelone_testimonial_bgimage',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => get_theme_mod('hotelone_testimonial_bgimage',''),
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'hotelone_testimonial_bgimage',
				array(
					'label' 		=> esc_html__('Background image', 'hotelone'),
					'section' 		=> 'hotelone_testimonialbg_section',
					'description' => esc_html__('Upload the background image for this section.', 'hotelone' ),
				)
			));
}
add_action('customize_register','hotelone_customizer_testimonial');