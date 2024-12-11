<?php 
function hotelone_reset_data(){
	$default_data = array(
		'switcher_hide' => true,
		
		/* Home Page Room Section Settings */
		'room_overlay_hide' => false,

		'typo_subset' => 'latin',
		'typo_p_fontfamily' => 'Roboto',
		'typo_p_fontsize' => '',
		'typo_p_fontweight' => '',
		'typo_p_lineheight' => '',
		'typo_p_letterspace' => '',
		'typo_p_textdecoration' => '',
		'typo_p_texttransform' => '',
		'typo_p_color' => '',
		
		'typo_m_fontfamily' => 'Roboto',
		'typo_m_fontsize' => '',
		'typo_m_fontweight' => '',
		'typo_m_lineheight' => '',
		'typo_m_letterspace' => '',
		'typo_m_textdecoration' => '',
		'typo_m_texttransform' => '',
		'typo_m_color' => '',
		
		'typo_h_fontfamily' => 'Roboto',
		'typo_h1_fontsize' => '',
		'typo_h2_fontsize' => '',
		'typo_h3_fontsize' => '',
		'typo_h4_fontsize' => '',
		'typo_h5_fontsize' => '',
		'typo_h6_fontsize' => '',
	);

	$frontpage_sidebar_data = array(
		0 => 'Slider',
		1 => 'Service',
		2 => 'Video',
		3 => 'Room',
		4 => 'Testimonial',
		5 => 'News',
		6 => 'Counter',
		7 => 'Team',
		8 => 'CallToAction',
		9 => 'Client',
	);

	foreach ($frontpage_sidebar_data as $key => $fpdata) {
			$fpdataid = strtolower($fpdata);
			$default_data['frontpage_'.$fpdataid.'_top_layout'] = 12;
			$default_data['frontpage_'.$fpdataid.'_bottom_layout'] = 12;
	}

	$default_data = apply_filters('hotelone_reset_data',$default_data);
	return $default_data;
}