<?php
add_action( 'admin_init', 'otbfimg_admin_init' );

function otbfimg_admin_init() {
  
  	register_setting( 'otbfimg-settings-group', 'otbfimg-plugin-settings' );
  	add_settings_section( 'section-1', __( 'OT Before After Images Slide', 'otbfimg' ), 'otbfimg_section_1_callback', 'otbfimg-plugin' );
  	
  	add_settings_field( 'otbfimg_otcolumnwidth', __( 'Column width', 'otbfimg' ), 'otbfimg_otcolumnwidth_callback', 'otbfimg-plugin', 'section-1' );
  	add_settings_field( 'otbfimg_otdisplay', __( 'Display', 'otbfimg' ), 'otbfimg_otdisplay_callback', 'otbfimg-plugin', 'section-1' );
  	add_settings_field( 'otbfimg_otbeforeafter', __( 'Before After hover', 'otbfimg' ), 'otbfimg_otbeforeafter_callback', 'otbfimg-plugin', 'section-1' );
  	add_settings_field( 'otbfimg_otmove', __( 'Moves across the image', 'otbfimg' ), 'otbfimg_otmove_callback', 'otbfimg-plugin', 'section-1' );
}

function otbfimg_section_1_callback() {
	_e( '<p>Plugin before after images slide works by stacking two images on top of each other. As the slider moves across the image, it makes use of the CSS clip property to trim the image on the left. This allows the image on the right to show through the container.</p>', 'otbfimg' );
}

function otbfimg_otcolumnwidth_callback() {
	
	$settings = (array) get_option( 'otbfimg-plugin-settings' );
	$field = "otbfimg_otcolumnwidth";
	if(esc_attr( $settings[$field] )) {
		$value = esc_attr( $settings[$field] );	
	} else {
		$value = '12';
	}
	
	echo "<input type='text' size='40' name='otbfimg-plugin-settings[$field]' value='$value' />";
}
function otbfimg_otdisplay_callback() {	
	$settings = (array) get_option( 'otbfimg-plugin-settings' );
	$field = "otbfimg_otdisplay";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otbfimg-plugin-settings[<?php echo $field ?>]' id='otbfimg-plugin-settings[<?php echo $field ?>]'>
		<option value="1" <?php selected( $value, '1' ); ?>><?php echo otbfimg_e('Basic Usage'); ?></option>
		<option value="2" <?php selected( $value, '2' ); ?>><?php echo otbfimg_e('Vertical Orientation'); ?></option>
	</select>
	<?php
}
function otbfimg_otbeforeafter_callback() {	
	$settings = (array) get_option( 'otbfimg-plugin-settings' );
	$field = "otbfimg_otbeforeafter";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otbfimg-plugin-settings[<?php echo $field ?>]' id='otbfimg-plugin-settings[<?php echo $field ?>]'>
		<option value="1" <?php selected( $value, '1' ); ?>><?php echo otbfimg_e('Show'); ?></option>
		<option value="0" <?php selected( $value, '0' ); ?>><?php echo otbfimg_e('Hidden'); ?></option>
	</select>
	<?php
}
function otbfimg_otmove_callback() {	
	$settings = (array) get_option( 'otbfimg-plugin-settings' );
	$field = "otbfimg_otmove";
	$value = esc_attr( $settings[$field] ); ?>
	 
	<select name='otbfimg-plugin-settings[<?php echo $field ?>]' id='otbfimg-plugin-settings[<?php echo $field ?>]'>
		<option value="1" <?php selected( $value, '1' ); ?>><?php echo otbfimg_e('Move by hover'); ?></option>
		<option value="2" <?php selected( $value, '2' ); ?>><?php echo otbfimg_e('Move by click'); ?></option>
	</select>
	<?php
}