<?php
function hotelone_customizer_room( $wp_customize ){
	$wp_customize->add_panel( 'hotelone_room_panel' ,
		array(
			'priority'        => 34,
			'title'           => esc_html__( 'Section: Room', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
	
		$wp_customize->add_section( 'hotelone_room_section' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Section Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_room_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_room_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => false,
				)
			);
			$wp_customize->add_control( 'hotelone_room_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'hotelone'),
					'section'     => 'hotelone_room_section',
					'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_room_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Hotel Rooms', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_room_title',
				array(
					'label'     => esc_html__('Section Title', 'hotelone'),
					'section' 		=> 'hotelone_room_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_room_subtitle',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => esc_html__('Section subtitle', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_room_subtitle',
				array(
					'label'     => esc_html__('Section Subtitle', 'hotelone'),
					'section' 		=> 'hotelone_room_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_room_layout',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '6',
				)
			);

			$wp_customize->add_control( 'hotelone_room_layout',
				array(
					'label' 		=> esc_html__('Room Layout Settings', 'hotelone'),
					'section' 		=> 'hotelone_room_section',
					'description'   => '',
					'type'          => 'select',
					'choices'       => array(
						'3' => esc_html__( '4 Columns', 'hotelone' ),
						'4' => esc_html__( '3 Columns', 'hotelone' ),
						'6' => esc_html__( '2 Columns', 'hotelone' ),
						'12' => esc_html__( '1 Column', 'hotelone' ),
					),
				)
			);
			
			$wp_customize->add_setting( 'room_overlay_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => false,
				)
			);
			$wp_customize->add_control( 'room_overlay_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Overlay Hide From Room Images?', 'hotelone'),
					'section'     => 'hotelone_room_section',
					'description' => esc_html__('Check this box to hide overlay from room images from all rooms.', 'hotelone'),
				)
			);
			
		$wp_customize->add_section( 'hotelone_room_content' ,
			array(
				'priority'    => 2,
				'title'       => esc_html__( 'Section Content', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_room_panel',
			)
		);
			
			$wp_customize->add_setting( 'hotelone_room_no',
				array(
					'sanitize_callback' => 'hotelone_sanitize_number',
					'default'           => '3',
				)
			);
			$wp_customize->add_control( 'hotelone_room_no',
				array(
					'label'     	=> esc_html__('Number of room to show', 'hotelone'),
					'section' 		=> 'hotelone_room_content',
					'description'   => '',
				)
			);

			$wp_customize->add_setting( 'hotelone_room_order',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => 'desc',
				)
			);

			$wp_customize->add_control( 'hotelone_room_order',
				array(
					'label' 		=> esc_html__('Room Display Order', 'hotelone'),
					'section' 		=> 'hotelone_room_content',
					'description'   => '',
					'type'          => 'select',
					'choices'       => array(
						'asc' => esc_html__( 'Ascending', 'hotelone' ),
						'desc' => esc_html__( 'Descending', 'hotelone' ),
					),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_room_more_link',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => '#',
				)
			);
			$wp_customize->add_control( 'hotelone_room_more_link',
				array(
					'label'       => esc_html__('More Rooms button link', 'hotelone'),
					'section'     => 'hotelone_room_content',
					'description' => esc_html__(  'It should be your room page link.', 'hotelone' )
				)
			);
			$wp_customize->add_setting( 'hotelone_room_more_text',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__('More Rooms', 'hotelone'),
				)
			);
			$wp_customize->add_control( 'hotelone_room_more_text',
				array(
					'label'     	=> esc_html__('More Rooms Button Text', 'hotelone'),
					'section' 		=> 'hotelone_room_content',
					'description'   => '',
				)
			);
}
add_action('customize_register','hotelone_customizer_room');