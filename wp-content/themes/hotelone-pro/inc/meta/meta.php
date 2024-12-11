<?php 
add_action('admin_init','hotelone_add_metabox_fields');
function hotelone_add_metabox_fields(){	

	/* Meta Custom Fields For Room Cusotm Post Type */
	add_meta_box(
		'hotelone_room', 
		__('Hotelone Room Settings','hotelone'), 
		'hotelone_room_meta_content', 
		'room', 
		'normal', 
		'high'
	);

	/* Meta Custom Fields For Event Cusotm Post Type */
	add_meta_box(
		'hotelone_event', 
		__('Event Settings','hotelone'), 
		'hotelone_event_meta_content', 
		'event', 
		'normal', 
		'high'
	);

	add_action(
		'save_post',
		'hotelone_save_meta_content'
	);  
}

function hotelone_room_meta_content( $post ){ 
	global $post ;
	$meta = get_post_meta($post->ID,'room_meta',TRUE );
	$meta = wp_parse_args($meta, array(
                            'persons' => '',
                            'rent' => '',
                            'rating' => '',
                            'btntext' =>'',
                            'btnurl' =>'',
                            'btntarget' =>'',
                        ));
	?>
	<style>
	.hotelone_wrap{ 
		width: 60%; 
		margin: 20px auto; 
		border: 1px solid #ddd;
		padding: 20px;
		box-shadow: 2px 5px 7px rgba(0,0,0,.16);
	}
	.hotelone_wrap h3{ 
		text-align: center; 
	}
	.hotelone_wrap p label{ 
		font-weight: 600;
	}
	.hotelone_wrap .large{
		width: 100%;
	}
	.room_container{}
	.room_container .room-card{ position: relative; width: 28%; padding: 7px; margin:0 10px 10px 0; float: left; border: 1px solid #f3f3f3; }
	.room_container .room-card img{ height: 100px; }
	.room_container .room-card p{ margin:0; }
	.room_container .room-card .room_image_btn{ width: 100%; margin:3px 0 0 0; }
	.room_close{
		width: 26px;
		height: 22px;
		padding: 5px;
		text-align: center;
		border: 1px solid #f3f3f3;
		background: #ccc;
		position: absolute;
		right: 0;
		top: 0;
		cursor: pointer;
	}
	</style>
	<div class="wrap about-wrap hotelone_wrap">
		<h3><?php _e('Hotelone Room Settings','hotelone');?></h3>
		<p>
			<label><?php _e('Persons:','hotelone');?></label>
		</p>
		<p>
		<select class="large" name="room_meta[persons]">
			<option value="">-- Select Persons --</option>
			<?php for( $i=1; $i<=10; $i++ ){ ?>
			<option value='<?php echo $i; ?>' <?php if($meta['persons']==$i){ echo 'selected';} ?>><?php echo $i; ?> <?php _e('Persons','hotelone');?></option>
			<?php } ?>
		</select>
		Please select persons from this setting. It will display it's related fontwesome icons in rooms.
		</p>
		
		<p>
			<label><?php _e('Rent:','hotelone');?></label>
		</p>
		<p>
		<input class="large" placeholder="$73.00 / Per Night" type="text" name="room_meta[rent]" value="<?php echo $meta['rent']; ?>">
		</p>
		
		<p>
			<label><?php _e('Rating:','hotelone');?></label>
		</p>
		<p>
		<input class="large" placeholder="5" type="number" name="room_meta[rating]" value="<?php echo $meta['rating']; ?>" min="0" max="5">
		</p>
		
		<p>
			<label><?php _e('Button Text:','hotelone');?></label>
		</p>
		<p>
		<input class="large" placeholder="Room Button Text" type="text" name="room_meta[btntext]" value="<?php echo $meta['btntext']; ?>">
		</p>
		
		<p>
			<label><?php _e('Button URL:','hotelone');?></label>
		</p>
		<p>
		<input class="large" placeholder="Your Custom Link" type="text" name="room_meta[btnurl]" value="<?php echo $meta['btnurl']; ?>">
		</p>
		
		<p>
			<label><?php _e('Open link in new tab','hotelone');?></label>
		</p>
		<p>
		<input type="checkbox" name="room_meta[btntarget]" value="1" <?php if($meta['btntarget']==true){ echo 'checked';} ?>>
		</p>
		
		<div class="room_container">
			<h3><?php _e('Room Photos','hotelone');?></h3>
			<?php 
			$default_image = 'http://placehold.it/1920x1080';
			?>
			<div class="room-card">
				<p> 
					<input type="hidden" class="widefat room_image_text" name="room_meta[room_image_1]" value="<?php echo $meta['room_image_1']; ?>">					
					<?php 
					if(empty($meta['room_image_1'])){
						$meta['room_image_1'] = $default_image;
					}
					?>
					<img id="room_image_prev" src="<?php echo $meta['room_image_1']; ?>">					
					<input type="button" class="button button-primary room_image_btn" id="room_image_btn" name="room_meta[room_image_1]" value="<?php _e('Upload Image','hotelone'); ?>">
					<span class="room_close dashicons-before dashicons-trash"></span>
				</p>
			</div>
			
			<div class="room-card">
				<p> 
					<input type="hidden" class="widefat room_image_text" name="room_meta[room_image_2]" value="<?php echo $meta['room_image_2']; ?>">					
					<?php 
					if(empty($meta['room_image_2'])){
						$meta['room_image_2'] = $default_image;
					}
					?>
					<img id="room_image_prev" src="<?php echo $meta['room_image_2']; ?>">					
					<input type="button" class="button button-primary room_image_btn" id="room_image_btn" name="room_meta[room_image_2]" value="<?php _e('Upload Image','hotelone'); ?>">
					<span class="room_close dashicons-before dashicons-trash"></span>
					
				</p>
			</div>
			
			<div class="room-card">
				<p> 
					<input type="hidden" class="widefat room_image_text" name="room_meta[room_image_3]" value="<?php echo $meta['room_image_3']; ?>">					
					<?php 
					if(empty($meta['room_image_3'])){
						$meta['room_image_3'] = $default_image;
					}
					?>
					<img id="room_image_prev" src="<?php echo $meta['room_image_3']; ?>">					
					<input type="button" class="button button-primary room_image_btn" id="room_image_btn" name="room_meta[room_image_3]" value="<?php _e('Upload Image','hotelone'); ?>">
					<span class="room_close dashicons-before dashicons-trash"></span>
				</p>
			</div>
			
			<div class="room-card">
				<p> 
					<input type="hidden" class="widefat room_image_text" name="room_meta[room_image_4]" value="<?php echo $meta['room_image_4']; ?>">
					<?php 
					if(empty($meta['room_image_4'])){
						$meta['room_image_4'] = $default_image;
					}
					?>
					<img id="room_image_prev" src="<?php echo $meta['room_image_4']; ?>">					
					<input type="button" class="button button-primary room_image_btn" id="room_image_btn" name="room_meta[room_image_4]" value="<?php _e('Upload Image','hotelone'); ?>">
					<span class="room_close dashicons-before dashicons-trash"></span>
				</p>
			</div>
			
			<div class="room-card">
				<p> 
					<input type="hidden" class="widefat room_image_text" name="room_meta[room_image_5]" value="<?php echo $meta['room_image_5']; ?>">	
					<?php 
					if(empty($meta['room_image_5'])){
						$meta['room_image_5'] = $default_image;
					}
					?>
					<img id="room_image_prev" src="<?php echo $meta['room_image_5']; ?>">					
					<input type="button" class="button button-primary room_image_btn" id="room_image_btn" name="room_meta[room_image_5]" value="<?php _e('Upload Image','hotelone'); ?>">
					<span class="room_close dashicons-before dashicons-trash"></span>
				</p>
			</div>
			
			<div class="room-card">
				<p> 
					<input type="hidden" class="widefat room_image_text" name="room_meta[room_image_6]" value="<?php echo $meta['room_image_6']; ?>">	
					<?php 
					if(empty($meta['room_image_6'])){
						$meta['room_image_6'] = $default_image;
					}
					?>
					<img id="room_image_prev" src="<?php echo $meta['room_image_6']; ?>">					
					<input type="button" class="button button-primary room_image_btn" id="room_image_btn" name="room_meta[room_image_6]" value="<?php _e('Upload Image','hotelone'); ?>">
					<span class="room_close dashicons-before dashicons-trash"></span>
				</p>
			</div>
			
			<br class="clear">
		</div>
	</div>
	<?php
}


function hotelone_event_meta_content($post){
	global $post;
	$meta = get_post_meta($post->ID,'event_meta',TRUE );
	$meta = wp_parse_args($meta, array(
                            'start_date' => '',
                            'end_date' => '',
                        ));
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.start_date,.end_date').datepicker({
            dateFormat : 'dd-mm-yy'
        });
    });
    </script>
    <p>
		<label><?php _e('Start Date:','hotelone');?></label>
	</p>
	<p>
	<input class="large start_date" placeholder="Start Date" type="text" name="event_meta[start_date]" value="<?php echo $meta['start_date']; ?>">
	</p>

	<p>
		<label><?php _e('End Date:','hotelone');?></label>
	</p>
	<p>
	<input class="large end_date" placeholder="End Date" type="text" name="event_meta[end_date]" value="<?php echo $meta['end_date']; ?>">
	</p>
    <?php
}



function hotelone_save_meta_content( $post ){
	
	if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
		return;
	
	if ( ! current_user_can( 'edit_page', $post ) ){   return ;} 
	
	if(isset($_POST['post_ID'])){
		$post_ID   = $_POST['post_ID'];				
		$post_type = get_post_type( $post_ID );

		if( $post_type == 'room' ){
			$_POST['room_meta']['btntarget'] = isset($_POST['room_meta']['btntarget']) && $_POST['room_meta']['btntarget'] == true?1:0;
			update_post_meta( $post_ID ,'room_meta', $_POST['room_meta'] );
		}

		if( $post_type == 'event' ){
			update_post_meta( $post_ID ,'event_meta', $_POST['event_meta'] );
		}
	}
}


function hotelone_admin_meta_enqueue_script() {
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style( 'jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
}
add_action( 'admin_enqueue_scripts', 'hotelone_admin_meta_enqueue_script' );
