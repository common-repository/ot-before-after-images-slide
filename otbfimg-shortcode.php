<?php
/**
 * Function otfb_message_shortcode()  is used to create shortcode for plugin.
*/
function otbfimg_shortcode($atts) {
	$settings = (array) get_option( 'otbfimg-plugin-settings' );
	extract(shortcode_atts(array(
      'image1' => '',
      'image2' => '',
      'display' => '',
      ), $atts));
	if($atts && $atts['display']) {
		if($atts['display'] == 'basic') {
			$otdisplay = '1';
		}
		if($atts['display'] == 'vertical') {
			$otdisplay = '2';	
		}
	 } else {
	    $otdisplay = $settings['otbfimg_otdisplay'];
  	}

	ob_start();

	if($otdisplay == 1) {
		$otdata='';
	} else {
		$otdata='data-orientation="vertical"';
	}
	?>
	<div class="row ot-beforeafter" style="margin-top: 2em;">
		<div class="large-<?php echo $settings['otbfimg_otcolumnwidth'] ?> columns">
			<div class="twentytwenty-container" <?php echo $otdata ?>>
				<img src="<?php echo $atts['image1'] ?>">
				<img src="<?php echo $atts['image2'] ?>">
			</div>
		</div>
	</div>
	<?php
	$shortcodeData = ob_get_contents(); 
	ob_end_clean();
	return $shortcodeData;
}

/**
 * Function otbfimg_register_shortcodes()  is used to register shortcode.
*/
function otbfimg_register_shortcodes(){
	add_shortcode('otbeforeafterimagesslide', 'otbfimg_shortcode');
}
add_action( 'init', 'otbfimg_register_shortcodes');

add_action( 'wp_enqueue_scripts', 'otbfimg_required_style_scripts' );
function otbfimg_required_style_scripts() {
	$settings = (array) get_option( 'otbfimg-plugin-settings' );
    wp_enqueue_style( 'otbfimg_twentytwenty_css', plugins_url('/assets/css/twentytwenty.css', __FILE__) );
    wp_enqueue_script( 'otbfimg-script', plugins_url('/assets/js/otbfimg.js', __FILE__), array( 'jquery' ) );
    wp_enqueue_script( 'otbfimg-event-move-script', plugins_url('/assets/js/jquery.event.move.js', __FILE__), array( 'jquery' ) );
    if($settings['otbfimg_otmove'] == '1') {
        wp_enqueue_script( 'otbfimg-twentytwenty2-script', plugins_url('/assets/js/jquery.twentytwenty2.js', __FILE__), array( 'jquery' ) );
    } elseif ($settings['otbfimg_otmove'] == '2') {
        wp_enqueue_script( 'otbfimg-twentytwenty-script', plugins_url('/assets/js/jquery.twentytwenty.js', __FILE__), array( 'jquery' ) );
    }
    if($settings['otbfimg_otbeforeafter'] == 1) {
		wp_enqueue_style( 'otbfimg_css', plugins_url('/assets/css/otbfimg.css', __FILE__) );
	} else {
		wp_enqueue_style( 'otbfimg2_css', plugins_url('/assets/css/otbfimg2.css', __FILE__) );
	}
}
