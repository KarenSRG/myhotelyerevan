<?php 

/*
 * Register post type room
 */
 function hotelone_room(){
	register_post_type( 'room',
		array(
			'labels' => array(
				'name' => 'Rooms',
				'add_new' => __('Add New Room', 'hotelone'),
				'add_new_item' => __('Add New Room','hotelone'),
				'edit_item' => __('Add New Room','hotelone'),
				'new_item' => __('New Link','hotelone'),
				'all_items' => __('All Room','hotelone'),
				'view_item' => __('View Link','hotelone'),
				'search_items' => __('Search Links','hotelone'),
				'not_found' =>  __('No Links found','hotelone'),
				'not_found_in_trash' => __('No Links found in Trash','hotelone'), 
			),
			'supports' => array('title','editor','thumbnail','comments'),
			'show_in' => true,
			'public' => true,
			'rewrite' => array('slug' => 'room'),
			'menu_position' =>20,
			'public' => true,
			'menu_icon' => get_template_directory_uri() . '/images/room.png',
		)
	);
}
add_action( 'init', 'hotelone_room' );

/*
 * Register post type project
 */
 function hotelone_project(){
	register_post_type( 'project',
		array(
			'labels' => array(
				'name' => 'Portfolio / Projects',
				'add_new' => __('Add New Item', 'hotelone'),
				'add_new_item' => __('Add New Project','hotelone'),
				'edit_item' => __('Add New Portfolio / project','hotelone'),
				'new_item' => __('New Link','hotelone'),
				'all_items' => __('All Portfolio Project','hotelone'),
				'view_item' => __('View Link','hotelone'),
				'search_items' => __('Search Links','hotelone'),
				'not_found' =>  __('No Links found','hotelone'),
				'not_found_in_trash' => __('No Links found in Trash','hotelone'), 
			),
			'supports' => array('title','editor','thumbnail','comments'),
			'show_in' => true,
			'public' => true,
			'rewrite' => array('slug' => 'project'),
			'menu_position' =>20,
			'public' => true,
			'menu_icon' => get_template_directory_uri() . '/images/project.png',
		)
	);
}
add_action( 'init', 'hotelone_project' );

/*
 * Register post type event
 */
 function hotelone_event(){
	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => 'Events',
				'add_new' => __('Add New Item', 'hotelone'),
				'add_new_item' => __('Add New Event','hotelone'),
				'edit_item' => __('Add New Event','hotelone'),
				'new_item' => __('New Link','hotelone'),
				'all_items' => __('All Events','hotelone'),
				'view_item' => __('View Link','hotelone'),
				'search_items' => __('Search Links','hotelone'),
				'not_found' =>  __('No Links found','hotelone'),
				'not_found_in_trash' => __('No Links found in Trash','hotelone'), 
			),
			'supports' => array('title','editor','thumbnail'),
			'show_in' => true,
			'public' => true,
			'rewrite' => array('slug' => 'event'),
			'menu_position' =>20,
			'public' => true,
			'menu_icon' => 'dashicons-calendar-alt',
		)
	);
}
add_action( 'init', 'hotelone_event' );