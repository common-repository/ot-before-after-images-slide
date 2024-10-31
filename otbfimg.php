<?php
/*
Plugin Name: Before After Images Slide
Plugin URI: https://www.omegatheme.com/
Description: Visualize the differences between two images with this plugin. Simple to use, fully responsive and supports touch navigation, OT Before & After image slider is a must have with all Wordpress websites.
Author: Omegatheme
Version: 1.2.2
Company: XIPAT Flexible Solutions 
Author URI: http://www.omegatheme.com
*/

define('OTBFIMG_PLUGIN_NAME', 'Before After Images Slide');
define('OTBFIMG_PLUGIN_VERSION', '1.2.1');
define('OTBFIMG_PLUGIN_URL',plugins_url(basename(plugin_dir_path(__FILE__ )), basename(__FILE__)));

include_once("functions.php");
include_once("otbfimg-shortcode.php");

/*-------------------------------- Menu --------------------------------*/
function otbfimg_setting_menu() {
    add_submenu_page(
         'options-general.php',
         'OT Before After Images Slide',
         'OT Before After Images Slide',
         'moderate_comments',
         'otbfimg',
         'otbfimg_setting'
    );
}
add_action('admin_menu', 'otbfimg_setting_menu', 10);

function otbfimg_setting() {
    include_once(dirname(__FILE__) . '/otbfimg-setting.php');
}

/*-------------------------------- Links --------------------------------*/
function otbfimg_plugin_action_links($links, $file) {
    $plugin_file = basename(__FILE__);
    if (basename($file) == $plugin_file) {
        $settings_link = '<a href="' . admin_url('options-general.php?page=otbfimg') . '">' . otbfimg_e('Settings') . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links', 'otbfimg_plugin_action_links', 10, 2);


function otbfimg_e($text, $params=null) {
    if (!is_array($params)) {
        $params = func_get_args();
        $params = array_slice($params, 1);
    }
    return vsprintf(__($text, 'otbfimg'), $params);
}
