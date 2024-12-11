<?php
function hotelone_customizer_page_settings( $wp_customize ){
	$wp_customize->add_panel( 'pagesettings_panel',
		array(
			'priority'       => 43,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Page Settings Panel', 'hotelone' ),
			'description'    => '',
		)
	);
		$wp_customize->add_section( 'pagesettings_section' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Default Page Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'pagesettings_panel',
			)
		);
			$wp_customize->add_setting( 'hide_page_title',
				array(
					'sanitize_callback' => 'hotelone_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'hide_page_title',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide title from default pages?', 'hotelone'),
					'section'     => 'pagesettings_section',
					'description' => esc_html__('Check this box to hide title from default pages.', 'hotelone'),
				)
			);
		$wp_customize->add_section( 'pagebg_section' ,
			array(
				'priority'    => 2,
				'title'       => esc_html__( 'Background Settings', 'hotelone' ),
				'description' => '',
				'panel'       => 'pagesettings_panel',
			)
		);
			$wp_customize->add_setting( 'page_bg_color' , array(
			'default'    => get_theme_mod('page_bg_color','#E5E5E5'),
			'sanitize_callback' => 'sanitize_text_field',
			));
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'page_bg_color' , array(
			'label' => __('Default page Background color','hotelone'),
			'description'      => __('Please select default page Background color.', 'hotelone'),
			'section' => 'pagebg_section',
			'settings'=>'page_bg_color'
			) ) );
}
add_action('customize_register','hotelone_customizer_page_settings');