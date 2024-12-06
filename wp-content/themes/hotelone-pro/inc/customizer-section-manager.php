<?php 
function hotelone_section_manager( $wp_customize ){
	
	$option = wp_parse_args(  
			get_option( 'hotelone_option', array() ), 
			array(
			'layout_manager_data' => 'service,video,room,testimonial,blog,counter,team,callout,client' 
			) );

    class WP_hotelone_manager_control extends WP_Customize_Control {
        
        public function render_content() {

            $option = wp_parse_args(  
			get_option( 'hotelone_option', array() ), 
			array(
			'layout_manager_data' => 'service,video,room,testimonial,blog,counter,team,callout,client' 
			) );
			
            $de              = explode(",",$option['layout_manager_data']);
            $defaultshowdata = array('service','video','room','testimonial','blog','counter','team','callout','client');
            $ld              = array_diff($defaultshowdata,$de);

            ?>
            <h3><?php _e('Active Sections:','hotelone'); ?></h3>
            <ul class="businessacontentsort busienss_customizer_layout" id="bacitve">
                <?php if( !empty($de[0]) )    { foreach( $de as $value ){ ?>
                    <li class="businessa-section" id="<?php echo $value; ?>"><?php echo $value; ?> <i class="dashicons-move"></i></li>
                <?php } } ?>
            </ul>


            <h3><?php _e('Disable Sections:','hotelone'); ?></h3>
            <ul class="businessacontentsort busienss_customizer_layout" id="bdeactive">
                <?php if(!empty($ld)){ foreach($ld as $val){ ?>
                    <li class="businessa-section" id="<?php echo $val; ?>"><?php echo $val; ?> <i class="dashicons-move"></i></li>
                <?php } } ?>
            </ul>
            <div class="section">
                <p> <b><?php _e('Slider section fixed on front page.','hotelone'); ?></b></p>
                <p> <b><?php _e('Note','hotelone'); ?>:- </b> <?php _e('All front page section are visible by default. If you do not show some sections on forntpage. Please just drag and drop that section in disable box.','hotelone'); ?><p>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $( ".businessacontentsort" ).sortable({
                        connectWith: '.businessacontentsort'
                    });
                });

                jQuery(document).ready( function( $ ) {

                    function allactivedata( web ) {
                        var col = [];
                        $(web + ' #bacitve').each(function(){
                            col.push($(this).sortable('toArray').join(','));
                        });
                        return col.join('|');
                    }

                    function alldeactivedata( web ) {
                        var col = [];
                        $(web + ' #bdeactive').each(function(){
                            col.push($(this).sortable('toArray').join(','));
                        });
                        return col.join('|');
                    }

                    $( '#bacitve .businessa-section, #bdeactive .businessa-section' ).mouseleave( function() {
                        var bacitve   = allactivedata('#customize-control-hotelone_option-lmc');
                        var bdeactive = alldeactivedata('#customize-control-hotelone_option-lmc');

                        $("#customize-control-hotelone_option-layout_manager_data input[type = 'text']").val(bacitve);
                        $("#customize-control-hotelone_option-lmdc input[type = 'text']").val(bdeactive);
                        $("#customize-control-hotelone_option-layout_manager_data input[type = 'text']").change();
                    });

                });
            </script>

            <?php
        }
    }
		/* Sections Manager Settings */
		$wp_customize->add_section( 'manage_section_settings' , array(
			'title'      => __('Sections Manager', 'hotelone'),
			'priority'       => 44,
		) );
		
		$wp_customize->add_setting( 'hotelone_option[lmc]', array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		) );
		$wp_customize->add_control( new WP_hotelone_manager_control( $wp_customize, 'hotelone_option[lmc]', array(
		'section' => 'manage_section_settings',
		'setting' => 'hotelone_option[lmc]',
		) ) );

		$wp_customize->add_setting( 'hotelone_option[layout_manager_data]', array(
        'default' => $option['layout_manager_data'],
		'type' => 'option'
		) );
		$wp_customize->add_control( 'hotelone_option[layout_manager_data]', array(
        'label' => __('Enable','hotelone'),
        'section' => 'manage_section_settings',
        'type' => 'text',
		) );
		
		$wp_customize->add_setting( 'hotelone_option[lmdc]', array(
		'default' => '',
		'type'=>'option'
		) );
		$wp_customize->add_control( 'hotelone_option[lmdc]', array(
		'label' => __('Disable','hotelone'),
		'section' => 'manage_section_settings',
		'type' => 'text',
		) );
}
add_action( 'customize_register', 'hotelone_section_manager' );