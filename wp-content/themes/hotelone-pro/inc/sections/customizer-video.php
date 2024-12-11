<?php
function hotelone_customizer_video( $wp_customize ){
	$wp_customize->add_panel( 'hotelone_video_panel' ,
		array(
			'priority'        => 33,
			'title'           => esc_html__( 'Section: Video Lightbox', 'hotelone' ),
			'description'     => '',
			//'active_callback' => 'hotelone_showon_frontpage'
		)
	);
	
		$wp_customize->add_section( 'hotelone_video_section' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Section Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'hotelone_video_panel',
			)
		);
		
			$wp_customize->add_setting( 'hotelone_videolightbox_hide',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => get_theme_mod('hotelone_videolightbox_hide',false),
				)
			);
			$wp_customize->add_control( 'hotelone_videolightbox_hide',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'hotelone'),
					'section'     => 'hotelone_video_section',
					'description' => esc_html__('Check this box to hide this section.', 'hotelone'),
				)
			);
			
			$wp_customize->add_setting( 'hotelone_videolightbox_title',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => get_theme_mod('hotelone_videolightbox_title',esc_html__('Powerful Theme with Video Lightbox', 'hotelone')),
				)
			);
			$wp_customize->add_control( 'hotelone_videolightbox_title',
				array(
					'label'     => esc_html__('Video Lightbox Title', 'hotelone'),
					'section' 		=> 'hotelone_video_section',
					'description'   => '',
				)
			);
			
			$wp_customize->add_setting( 'hotelone_video_url',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => get_theme_mod('hotelone_video_url',''),
				)
			);
			$wp_customize->add_control( 'hotelone_video_url',
				array(
					'label' 		=> esc_html__('Video url', 'hotelone'),
					'section' 		=> 'hotelone_video_section',
					'description'   =>  esc_html__('Paste Youtube or Vimeo url here', 'hotelone'),
				)
			);

			$wp_customize->add_setting( 'hotelone_video_shortcode_heading',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '',
				)
			);
			$wp_customize->add_control( new HotelOne_Misc_Control( $wp_customize, 'hotelone_video_shortcode_heading', array(
					'type'              => 'heading',
					'label'     => esc_html__('OR', 'hotelone'),
					'section' 		=> 'hotelone_video_section',
					'description'   => '',
				)
			) );

			$wp_customize->add_setting( 'hotelone_video_shortcode',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'hotelone_video_shortcode',
				array(
					'type'              => 'textarea',
					'label'     => esc_html__('Video Shortcode Here', 'hotelone'),
					'section' 		=> 'hotelone_video_section',
					'description'   => '',
				)
			);
		
		$wp_customize->add_section( 'hotelone_videobg_section' , array(
			'title'      => __('Section Background', 'hotelone'),
			'panel'  => 'hotelone_video_panel',
		) );
			$wp_customize->add_setting( 'hotelone_video_bgcolor', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => get_theme_mod('hotelone_video_bgcolor','#333'),
                'transport' => 'postMessage',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'hotelone_video_bgcolor',
                array(
                    'label'       => esc_html__( 'Background Color', 'hotelone' ),
                    'section'     => 'hotelone_videobg_section',
                    'description' => esc_html__( 'Change the background color of this section.', 'hotelone' ),
                )
            ));
			$wp_customize->add_setting( 'hotelone_video_bgimage',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => get_theme_mod('hotelone_video_bgimage',''),
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'hotelone_video_bgimage',
				array(
					'label' 		=> esc_html__('Background image', 'hotelone'),
					'section' 		=> 'hotelone_videobg_section',
					'description' => esc_html__('Upload the background image for this section.', 'hotelone' ),
				)
			));
}
add_action('customize_register','hotelone_customizer_video');