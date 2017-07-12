<?php
/*
Plugin Name: infoGeniuz Form Analytics for Gravity Forms
Plugin Script: infogeniuz-form-analytics-for-gravity-forms.php
Plugin URI: http://www.infogeniuz.com/products/wp-plugins/
Description: Enhance Gravity Forms plugin with hidden data that can now be added to each and every lead filling out your online form using Gravity Forms. Upgrade to <a href="http://www.infogeniuz.com/products/wp-plugins/">infoGeniuz PAID</a> for more data points and analytics! <strong>Upgrade for only $9.95 for a Limited Time!</strong> 
Author: Lance Brown
Version: 1.0
Author URI: http://www.infogeniuz.com

=== RELEASE NOTES ===
2011-09-23 - v1.0 - first version
*/
 
	 global $wpdb;
	 register_activation_hook( __FILE__, array('MyPlugin', 'install') );
	 register_deactivation_hook(__FILE__, array('MyPlugin', 'myplugin_deactivation'));

 class MyPlugin {
    static function install() {	
			  
					MyPlugin::load_file("bkp_common.txt","common.php");
					MyPlugin::load_file("bkp_form_display.txt","form_display.php");
					
					MyPlugin::save_file("common.php","rep_common.txt");
					MyPlugin::save_file("form_display.php","rep_form_display.txt");	
				    }
					
					
	function save_file($src,$dest){
					$get_plugin_dir=WP_CONTENT_DIR . '/plugins';	
					$myFile = $get_plugin_dir."/gravityforms/".$src;
					$fh = fopen($myFile, 'w') or die("can't open file");
					$file = file_get_contents($get_plugin_dir.'/infogeniuz-form-analytics-for-gravity-forms/'.$dest, true);
					fwrite($fh, $file );
					fclose($fh);
					}
	function load_file($src,$dest){
					$get_plugin_dir=WP_CONTENT_DIR . '/plugins';										
					$myFile = $get_plugin_dir."/infogeniuz-form-analytics-for-gravity-forms/".$src;
					$fh = fopen($myFile, 'w') or die("can't open file");
					$file = file_get_contents($get_plugin_dir.'/gravityforms/'.$dest, true);
					fwrite($fh, $file );
					fclose($fh);
					}
    function myplugin_deactivation() {
					
					MyPlugin::unload_file("common.php","bkp_common.txt");
					MyPlugin::unload_file("form_display.php","bkp_form_display.txt");
					MyPlugin::unsave_file("bkp_common.txt");
					MyPlugin::unsave_file("bkp_form_display.txt");
					}
		
    function unload_file($src,$dest){
					$get_plugin_dir=WP_CONTENT_DIR . '/plugins';	
					$myFile = $get_plugin_dir."/gravityforms/".$src;
					$fh = fopen($myFile, 'w') or die("can't open file");
					$file = file_get_contents($get_plugin_dir.'/infogeniuz-form-analytics-for-gravity-forms/'.$dest, true);
					fwrite($fh, $file );
					fclose($fh);
					}  
	function unsave_file($src){
					$get_plugin_dir=WP_CONTENT_DIR . '/plugins';	
					$myFile = $get_plugin_dir."/infogeniuz-form-analytics-for-gravity-forms/".$src;
					$fh = fopen($myFile, 'w') or die("can't open file");
					$file = "";
					fwrite($fh, $file );
					fclose($fh);
					}
}
