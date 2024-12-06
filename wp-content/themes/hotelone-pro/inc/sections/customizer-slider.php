<?php
function hotelone_customizer_slider( $wp_customize ){
	
	$wp_customize->add_panel( 'hotelone_slider_panel' ,
		array(
			'priority'        => 31,
			'title'           => esc_html__( 'Section: Slider', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
		
		$wp_customize->add_section( 'hotelone_slider_section' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Slider Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_slider_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_slider_disable',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => get_theme_mod('hotelone_slider_disable',false),
				)
			);
			$wp_customize->add_control( 'hotelone_slider_disable',
					array(
						'type'        => 'checkbox',
						'label'       => esc_html__('Hide this section?', 'hotelone'),
						'section'     => 'hotelone_slider_section',
						'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
					)
				);
				
			$wp_customize->add_section( 'hotelone_slider_images' ,
				array(
					'priority'    => 6,
					'title'       => esc_html__( 'Slider Background Images', 'hotelone' ),
					'description' => '',
					'panel'       => 'hotelone_slider_panel',
				)
			);
			
			$wp_customize->add_setting(
				'hotelone_slider_images',
				array(
					'sanitize_callback' => 'hotelone_sanitize_repeatable_data_field',
					'transport' => 'refresh', // refresh or postMessage
					'default' => json_encode( array(
						array(
							'image'=> array(
								'url' => get_template_directory_uri().'/images/slides/slide1.jpg',
								'id' => ''
							)
						)
					) )
				) );

			$wp_customize->add_control(
				new HotelOne_Customize_Repeatable_Control(
					$wp_customize,
					'hotelone_slider_images',
					array(
						'label'     => esc_html__('Background Images', 'hotelone'),
						'description'   => '',
						'priority'     => 40,
						'section'       => 'hotelone_slider_images',
						'title_format'  => esc_html__( 'Background', 'hotelone'), // [live_title]
						'max_item'      => 30, // Maximum item can add

						'fields'    => array(
							'image' => array(
								'title' => esc_html__('Background Image', 'hotelone'),
								'type'  =>'media',
								'default' => array(
									'url' => get_template_directory_uri().'/images/slides/slide1.jpg',
									'id' => ''
								)
							),
							'rating' => array(
								'title' => esc_html__('Rating', 'hotelone'),
								'type'  =>'select',
								'desc'  => '',
								'options'  => array(
									1 => 1,
									2 => 2,
									3 => 3,
									4 => 4,
									5 => 5,
								),
							),
							'rating_hide' => array(
								'title' => esc_html__('Rating Disable?', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),
							'large_text' => array(
								'title' => esc_html__('Large Text', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'large_text_color' => array(
								'title' => esc_html__('Large Text Color', 'hotelone'),
								'type'  =>'color',
								'desc'  => '',
							),
							'small_text' => array(
								'title' => esc_html__('Small Text', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'small_text_color' => array(
								'title' => esc_html__('Small Text Color', 'hotelone'),
								'type'  =>'color',
								'desc'  => '',
							),
							'buttontext1' => array(
								'title' => esc_html__('Primary Button Text', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'buttonlink1' => array(
								'title' => esc_html__('Primary Button Link', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'buttontarget1' => array(
								'title' => esc_html__('Open Window In New Tab.', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),
							'buttontext2' => array(
								'title' => esc_html__('Secondary Button Text', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'buttonlink2' => array(
								'title' => esc_html__('Secondary Button Link', 'hotelone'),
								'type'  =>'text',
								'desc'  => '',
							),
							'buttontarget2' => array(
								'title' => esc_html__('Open Window In New Tab.', 'hotelone'),
								'type'  =>'checkbox',
								'desc'  => '',
							),

						),

					)
				)
			);
}
add_action('customize_register','hotelone_customizer_slider');