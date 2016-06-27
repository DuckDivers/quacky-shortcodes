<?php
/* 
Registering Options Page
*/	
if(!class_exists('ESSLPluginOptions')) :

// DEFINE PLUGIN ID
define('ESSLPluginOptions_ID', 'essl-plugin-options');
// DEFINE PLUGIN NICK
define('ESSLPluginOptions_NICK', 'Anchor Settings');

    class ESSLPluginOptions
    {
		/** function/method
		* Usage: return absolute file path
		* Arg(1): string
		* Return: string
		*/
		public static function file_path($file)
		{
			return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
		}
		/** function/method
		* Usage: hooking the plugin options/settings
		* Arg(0): null
		* Return: void
		*/
		public static function register()
		{
			register_setting(ESSLPluginOptions_ID.'_options', 'enable_essl_aggressive');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_speed');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_active');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_offset');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_easing');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_begin_1');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_begin_2');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_begin_3');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_begin_4');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_begin_5');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_match_1');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_match_2');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_match_3');
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_match_4');			
			register_setting(ESSLPluginOptions_ID.'_options', 'essl_exclude_match_5');				
		}
		/** function/method
		* Usage: hooking (registering) the plugin menu
		* Arg(0): null
		* Return: void
		*/
		public static function menu()
		{
			// Create menu tab
			add_options_page(ESSLPluginOptions_NICK.' Plugin Options', ESSLPluginOptions_NICK, 'manage_options', ESSLPluginOptions_ID.'_options', array('ESSLPluginOptions', 'options_page'));
		}
		/** function/method
		* Usage: show options/settings form page
		* Arg(0): null
		* Return: void
		*/
		public static function options_page()
		{ 
			if (!current_user_can('manage_options')) 
			{
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			
			$plugin_id = ESSLPluginOptions_ID;
			// display options page
			include(self::file_path('anchor-options.php'));
		}
		
    }
	
	
	// Add settings link on plugin page
	function essl_plugin_action_links($links) { 
	  $settings_link = '<a href="options-general.php?page=essl-plugin-options_options">Settings</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}
	 
	$plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$plugin", 'essl_plugin_action_links' );


	if ( is_admin() )
	{
		add_action('admin_init', array('ESSLPluginOptions', 'register'));
		add_action('admin_menu', array('ESSLPluginOptions', 'menu'));
		
	}
	
	if (get_option('essl_active')){
	
	if ( !is_admin() )
	{
		add_action('wp_footer', 'essl_script',100);

		function essl_script() {			
			$essl_exclude_begin_1=$essl_exclude_begin_2=$essl_exclude_begin_3=$essl_exclude_begin_4=$essl_exclude_begin_5=$essl_exclude_begin_6=$essl_exclude_begin_7=$essl_exclude_begin_8=$essl_exclude_begin_9=$essl_exclude_begin_10=$essl_exclude_begin_11=$essl_exclude_match_1=$essl_exclude_match_2=$essl_exclude_match_3=$essl_exclude_match_4=$essl_exclude_match_5='';			
			if(get_option('essl_exclude_begin_1')){ $essl_exclude_begin_1=":not([href^='".get_option('essl_exclude_begin_1')."'])"; }			
			if(get_option('essl_exclude_begin_2')){ $essl_exclude_begin_2=":not([href^='".get_option('essl_exclude_begin_2')."'])"; }			
			if(get_option('essl_exclude_begin_3')){ $essl_exclude_begin_3=":not([href^='".get_option('essl_exclude_begin_3')."'])"; }			
			if(get_option('essl_exclude_begin_4')){ $essl_exclude_begin_4=":not([href^='".get_option('essl_exclude_begin_4')."'])"; }			
			if(get_option('essl_exclude_begin_5')){ $essl_exclude_begin_5=":not([href^='".get_option('essl_exclude_begin_5')."'])"; }
			if(get_option('essl_exclude_match_1')){ $essl_exclude_match_1=":not([href='".get_option('essl_exclude_match_1')."'])";}			
			if(get_option('essl_exclude_match_2')){ $essl_exclude_match_2=":not([href='".get_option('essl_exclude_match_2')."'])";}			
			if(get_option('essl_exclude_match_3')){ $essl_exclude_match_3=":not([href='".get_option('essl_exclude_match_3')."'])";}			
			if(get_option('essl_exclude_match_4')){ $essl_exclude_match_4=":not([href='".get_option('essl_exclude_match_4')."'])";}			
			if(get_option('essl_exclude_match_5')){ $essl_exclude_match_5=":not([href='".get_option('essl_exclude_match_5')."'])";}						
			$essl_exclude_begin= $essl_exclude_begin_1. $essl_exclude_begin_2. $essl_exclude_begin_3. $essl_exclude_begin_4. $essl_exclude_begin_5;
			$essl_exclude_match= $essl_exclude_match_1. $essl_exclude_match_2. $essl_exclude_match_3. $essl_exclude_match_4. $essl_exclude_match_5;		

			if(get_option('enable_essl_aggressive')=='1'){ ?>	
				<?php  }   ?>
			<script type="text/javascript">
				jQuery.noConflict();
				(function( $ ) {
					"use strict";
						$(function() {
						$(document).ready(function() {
								function scrollToAnchor(aid){
									var aTag = $("a[name='"+ aid +"']");
									$('html,body').animate({scrollTop: aTag.offset().top - <?php if (get_option('essl_offset')!='') {echo get_option('essl_offset');} else {echo '20';} ?>}, <?php if (get_option('essl_speed')!='') {echo get_option('essl_speed');} else {echo '900';} ?>);
								}
									$("a").click(function() {
									var href = $(this).attr('href').replace('#', '');
									scrollToAnchor(href);
								});			
							});
						});
				})(jQuery);	
			</script>				
				<?php
		}					
	}
}
endif;
