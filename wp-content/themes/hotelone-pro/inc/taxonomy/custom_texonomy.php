<?php
/*
 * Room custom texonomy register
 */
 
function hotelone_room_taxonomy() {

    register_taxonomy(
	
	'room_categories', 
	
	'room', array( 
	
		'hierarchical' => true,
		
		'show_in_nav_menus' => true,
		
        'label' => __('Room Categories','hotelone'),
		
        'query_var' => true
		
		)
		
	);
			
	// Default category id
	
	$defualt_tex_id = get_option('custom_texo_room');
	
	// quick update category
	
	if( ( isset($_POST['action'] ) ) && ( isset($_POST['taxonomy'] ) ) ) {	
	
		wp_update_term($_POST['tax_ID'], 'room_categories', array(
		
		  'name' => $_POST['name'],
		  
		  'slug' => $_POST['slug']
		  
		) );
		
		update_option( 'custom_texo_room' , $defualt_tex_id );
		
	}else{ 	
		
		// insert default category 
		
		if(!$defualt_tex_id){
			
			wp_insert_term(
				__('ALL Room','hotelone'),
				'room_categories', array(
					'description'=> 'Default Category',
					'slug' => 'ALL Room'
					)
			);
			
			$Current_text_id = term_exists( __('ALL Room','hotelone') , 'room_categories' );
			
			update_option('custom_texo_room', $Current_text_id['term_id']);
		}
		
	}
	
	// update category
	
	if( isset( $_POST['submit'] ) && isset( $_POST['action'] ) ) {	
	
		wp_update_term( $_POST['tag_ID'], 'room_categories', array(
		
		  'name' => $_POST['name'],
		  
		  'slug' => $_POST['slug'],
		  
		  'description' => $_POST['description']
		  
		));
	}
	
	// Delete default category
	
	if( isset( $_POST['action'] ) && isset( $_POST['tag_ID'] ) )	{	
	
		if(($_POST['tag_ID'] == $defualt_tex_id) &&$_POST['action']	 =="delete-tag"){
			
			delete_option('custom_texo_room'); 
			
		} 
		
	}	
	
}
add_action( 'init', 'hotelone_room_taxonomy' );

/*
 * Portfolio custom texonomy register
 */ 
function hotelone_portfolio_taxonomy() {

    register_taxonomy(
	
	'portfolio_categories', 
	
	'project', array( 
	
		'hierarchical' => true,
		
		'show_in_nav_menus' => true,
		
        'label' => __('Portfolio Categories','hotelone'),
		
        'query_var' => true
		
		)
		
	);
			
	// Default category id
	
	$defualt_tex_id = get_option('custom_texo_business');
	
	// quick update category
	
	if( ( isset($_POST['action'] ) ) && ( isset($_POST['taxonomy'] ) ) ) {	
	
		wp_update_term($_POST['tax_ID'], 'portfolio_categories', array(
		
		  'name' => $_POST['name'],
		  
		  'slug' => $_POST['slug']
		  
		) );
		
		update_option( 'custom_texo_business' , $defualt_tex_id );
		
	}else{ 	
		
		// insert default category 
		
		if(!$defualt_tex_id){
			
			wp_insert_term(
				__('ALL','hotelone'),
				'portfolio_categories', array(
					'description'=> 'Default Category',
					'slug' => 'ALL'
					)
			);
			
			$Current_text_id = term_exists( __('ALL','hotelone') , 'portfolio_categories' );
			
			update_option('custom_texo_business', $Current_text_id['term_id']);
		}
		
	}
	
	// update category
	
	if( isset( $_POST['submit'] ) && isset( $_POST['action'] ) ) {	
	
		wp_update_term( $_POST['tag_ID'], 'portfolio_categories', array(
		
		  'name' => $_POST['name'],
		  
		  'slug' => $_POST['slug'],
		  
		  'description' => $_POST['description']
		  
		));
	}
	
	// Delete default category
	
	if( isset( $_POST['action'] ) && isset( $_POST['tag_ID'] ) )	{	
	
		if(($_POST['tag_ID'] == $defualt_tex_id) &&$_POST['action']	 =="delete-tag"){
			
			delete_option('custom_texo_business'); 
			
		} 
		
	}	
	
}
add_action( 'init', 'hotelone_portfolio_taxonomy' );



/*
 * Event custom texonomy register
 */ 
function hotelone_event_taxonomy() {

    register_taxonomy(
	
	'event_categories', 
	
	'event', array( 
	
		'hierarchical' => true,
		
		'show_in_nav_menus' => true,
		
        'label' => __('Event Categories','hotelone'),
		
        'query_var' => true
		
		)
		
	);
			
	// Default category id
	
	$defualt_tex_id = get_option('custom_texo_event');
	
	// quick update category
	
	if( ( isset($_POST['action'] ) ) && ( isset($_POST['taxonomy'] ) ) ) {	
	
		wp_update_term($_POST['tax_ID'], 'event_categories', array(
		
		  'name' => $_POST['name'],
		  
		  'slug' => $_POST['slug']
		  
		) );
		
		update_option( 'custom_texo_event' , $defualt_tex_id );
		
	}else{ 	
		
		// insert default category 
		
		if(!$defualt_tex_id){
			
			wp_insert_term(
				__('All Event','hotelone'),
				'event_categories', array(
					'description'=> 'Default Category',
					'slug' => 'All Event'
					)
			);
			
			$Current_text_id = term_exists( __('All Event','hotelone') , 'event_categories' );
			
			update_option('custom_texo_event', $Current_text_id['term_id']);
		}
		
	}
	
	// update category
	
	if( isset( $_POST['submit'] ) && isset( $_POST['action'] ) ) {	
	
		wp_update_term( $_POST['tag_ID'], 'event_categories', array(
		
		  'name' => $_POST['name'],
		  
		  'slug' => $_POST['slug'],
		  
		  'description' => $_POST['description']
		  
		));
	}
	
	// Delete default category
	
	if( isset( $_POST['action'] ) && isset( $_POST['tag_ID'] ) )	{	
	
		if(($_POST['tag_ID'] == $defualt_tex_id) &&$_POST['action']	 =="delete-tag"){
			
			delete_option('custom_texo_event'); 
			
		} 
		
	}
	
}
add_action( 'init', 'hotelone_event_taxonomy' );