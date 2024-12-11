<?php 
/*
 * Template Name: Front Page
 */
if ( is_page_template() ) {
	
	get_header();

		hotelone_load_section( 'elementor' );
		
		$option = wp_parse_args(  
			get_option( 'hotelone_option', array() ), 
			array(
			'layout_manager_data' => 'service,video,room,testimonial,blog,counter,team,callout,client' 
			) );
		
		$data = is_array($option['layout_manager_data']) ? $option['layout_manager_data'] : explode(",",$option['layout_manager_data']);
		if($data){
			foreach($data as $key=>$value){
				hotelone_load_section( $value );
			}
		}
		
	get_footer();
	
} else {
	
	include( get_page_template() );
	
}