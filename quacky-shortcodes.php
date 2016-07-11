<?php
/*
  	Plugin Name: Quacky Shortcodes
  	Plugin URI: http://www.duckdiverllc.com/
  	Version: 1.3.4
  	Author: Howard E
  	Description: Some Essential Shortcodes for Wordpress.  Also includes installation of FontAwesome 4.4.0, Customized Tag Cloud, Wide Container
	License:           GNU General Public License v3
	License URI:       http://www.gnu.org/licenses/gpl-3.0.html
	Domain Path:       /languages
	Text Domain:       quacky-updater
	GitHub Plugin URI: https://github.com/DuckDivers/quacky-shortcodes
	GitHub Branch:     master	
 */
if ( ! defined( 'ABSPATH' ) )
exit; 
// Define plugin file constant
define( 'DD_PLUGIN_FILE', __FILE__ );
define( 'DD_PLUGIN_VERSION', $plugin_data['Version']);
$plugin_url = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__));
 
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_style( 'quacky-plugin', plugins_url( 'quacky-shortcodes/css/style.min.css', false, '1.0', 'all' ) );
	wp_register_style( 'font-awesome-4', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', false, '4.4.0', 'all' );	
	wp_enqueue_style( 'quacky-plugin' );
	wp_enqueue_style( 'font-awesome-4' );
}

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
      function load_admin_style() {
          wp_enqueue_style( 'admin_css', plugins_url ('quacky-shortcodes/css/style.css', false, '1.0.0') );
       }

add_action( 'wp_enqueue_scripts', 'quacky_scripts', 99 );
function quacky_scripts() {
	wp_enqueue_script ('quack', plugins_url ('quacky-shortcodes/js/quack.js'), array('jquery'), '1.0', true);
}

//Add Font Size to WP Visual Editor
function wp_editor_fontsize_filter( $options ) {
	array_shift( $options );
	array_unshift( $options, 'fontsizeselect');
	array_unshift( $options, 'formatselect');
	return $options;
}

add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');
// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' ); 

// Require Shortcodes and Widgets
require_once "$plugin_url/assets/shortcodes.php";
require_once "$plugin_url/assets/duck-social-widget.php";
require_once "$plugin_url/assets/duck-tag-cloud.php";
require_once "$plugin_url/assets/anchor.php";

?>
