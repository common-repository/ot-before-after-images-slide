<?php

if (!current_user_can('manage_options')) {
    die('The account you\'re logged in to doesn\'t have permission to access this page.');
}

wp_enqueue_script('jquery');

wp_register_script('otbfimg_admin_js', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
wp_enqueue_script('otbfimg_admin_js', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
wp_register_style('otbfimg_admin_css', plugins_url('/assets/css/bootstrap.min.css', __FILE__));
wp_enqueue_style('otbfimg_admin_css', plugins_url('/assets/css/bootstrap.min.css', __FILE__));

wp_register_style('otbfimg_setting_css', plugins_url('/assets/css/otbfimg-setting.css', __FILE__));
wp_enqueue_style('otbfimg_setting_css', plugins_url('/assets/css/otbfimg-setting.css', __FILE__));

?>
<span class="version"><?php echo otbfimg_e('Version: %s', esc_html(OTBFIMG_PLUGIN_VERSION)); ?></span>
<div class="otbfimg-setting container-fluid">
	<div class="otbfimg-facebook"><?php echo otbfimg_e('OT Before After Images Slide'); ?></div>
	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#about" aria-controls="about" role="tab" data-toggle="tab"><?php echo otbfimg_e('About'); ?></a>
        </li>
        <li role="presentation">
            <a href="#setting" aria-controls="setting" role="tab" data-toggle="tab"><?php echo otbfimg_e('Setting'); ?></a>
        </li>
    </ul>
    <div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="about">
    		<div class="col-sm-6">
            	<h5><?php echo otbfimg_e('OT Before After Images Slide Plugin for WordPress'); ?></h5>

                <p><?php echo otbfimg_e('Visualize the differences between two images with this plugin. Simple to use, fully responsive and supports touch navigation, OT Before & After image slider is a must have with all Wordpress websites.'); ?></p>
                <p><?php echo otbfimg_e('OT Before & After image slider brings you a stunning way to highlight the differences between two images. Instead of placing the images side by side, your visitors now can compare 2 images in details via a swipable slider. You are offered the most visual way to focus on the difference between two images. It increases the engagement between your content and your users better than ever.'); ?></p>
                <p><?php echo otbfimg_e('There is shortcode [otbeforeafterimagesslide] with 3 available parameters.'); ?></p>
                <p><?php echo otbfimg_e('Note:OT Before After Images Slide is compatible with most of all the browsers like Firefox, Internet Explorer (IE9+), Chrome, Opera, Safari etc.'); ?></p>
            </div>
            <div class="col-sm-6">
            	<h5><?php echo otbfimg_e('Change log'); ?></h5>
            	
				<p>= 1.0 =<pp>
				<p>* <?php echo otbfimg_e('Plugin release. Operate all the basic functions.'); ?></p>

				<p>= 1.1 =</p>
				<p>* <?php echo otbfimg_e('Add shortcode function'); ?></p>

				<p>= 1.2 =</p>
				<p>* <?php echo otbfimg_e('Change plugin setting layout, fix bug'); ?></p>
            </div>
    	</div>
    	<div role="tabpanel" class="tab-pane" id="setting">
         	<form action="options.php" method="POST">
		        <?php settings_fields('otbfimg-settings-group'); ?>
		        <?php do_settings_sections('otbfimg-plugin'); ?>
		        <?php submit_button(); ?>
	      	</form>
        </div>
	</div>
</div>