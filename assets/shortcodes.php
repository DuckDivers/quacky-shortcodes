<?php 
//* The Shortcodes *//

//Anti-Spambot Mailto
function dd_secure_mail($atts) {
	extract(shortcode_atts(array(
		"mailto" => '',
		"txt" => ''
	), $atts));
	$mailto = antispambot($mailto);
	$txt = antispambot($txt);
	return '<a href="mailto:' . $mailto . '">' . $txt . '</a>';
}

add_shortcode('mailto', 'dd_secure_mail');

// Cool Icon
function cool_icon_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'effect' => '',
		'style'	 => '',
		'icon' 	 => '',
		'link'   => '',
	), $atts ) );
	
	$output  = '<div class="no-touch"><div class="hi-icon-wrap hi-icon-effect-'.$effect.' hi-icon-effect-'.$style.'">';
	$output .= '<a href="'.$link.'" class="hi-icon hi-icon-'.$icon.'">'.$icon.'</a>';
	$output .= '</div></div>';
return $output;
}
add_shortcode('cool', 'cool_icon_shortcode');

// Variable Spacer Shortcode //
function space_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'height' => '',
	), $atts ) );

	return '<span class="space" style="height:' . $height . 'px;"></span>';
}
add_shortcode('space', 'space_shortcode');

// Horizontal Spacer Shortcode//
function hspace_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'width' => '',
	), $atts ) );

	return '<span class="hspace" style="padding-right:' . $width . 'px;"></span>';
}
add_shortcode('hspace', 'hspace_shortcode');

// Striped Table Shortcode
function zebra_shortcode($atts, $content = null){
	extract(shortcode_atts( array(
		'color' => '#ccc',
		'thcolor' => ''
	), $atts ) );
	
	$output	 = '<div class="zebra">';
	$output .= '<script type="text/javascript">';
	$output .= 'jQuery(function(){jQuery(".zebra table").addClass("zebra");';
	$output .= 'jQuery(".zebra tr:odd").css("background", "'. $color .'")';
	if ($thcolor !== ''){$output .= ',jQuery(".zebra tr:first-child").css({"background":"'.$thcolor.'", "text-align":"center", "font-size":"1.2em", "height":"2.5em"})';}
	$output .= '});';
	$output .= '</script>';
	$output .= 	$content;
	$output .= '</div>';	
	
return $output;
}
add_shortcode ('zebra', 'zebra_shortcode');

// Text Box Shortcode
function textbox_shortcode ($atts, $content = null) {
	extract (shortcode_atts( array(
		'bgcolor'	=> '',
		'border'	=> '',
		'bordercolor' => '',
		'padding' 	=> ''
	), $atts ) );
	$output = '<div class="duck-textbox" style="background: '.$bgcolor.'; border:'.$border.'px solid '.$bordercolor.'; padding:'.$padding.';">';
	$output .= $content;
	$output .= '</div>';
	
return $output;
	
	}
add_shortcode ('textbox' , 'textbox_shortcode');

// Hooks your functions into the correct filters
function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugins_url() .'/quacky-shortcodes/js/mce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}

function dd_fontawesome_shortcode ($atts) {
	extract (shortcode_atts( array(
		'icon' => '',
		'size' => '14',
		'color' => '#000'
	), $atts ) );
	$output = '<i class="fa '. $icon .'" style="font-size:  '. $size .'px; color: '. $color .';"></i>';
	
return $output;
	}
add_shortcode ('dd-fontawesome' , 'dd_fontawesome_shortcode');
// Dive Flag List
function dive_flag_list_shortcode($atts, $content = null) {
		$output = '<div class="list styled dive-flag">';
		$output .= $content;
		$output .= '</div>';
		return $output;
	}
add_shortcode('dive_flag_list', 'dive_flag_list_shortcode');

// ADD DIV Shortcode
function div_shortcode($atts, $content = null){
	extract (shortcode_atts (array(
		'class' => ''
	), $atts ));
		$output =  '<div class="'.$class.'">';
		$output .= $content;
		$output .= '</div>';
		return $output;
		}
add_shortcode('div', 'div_shortcode');
	/*   page_anchor_SHORTCODE    */
function page_anchor_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
				'hash'  => ''
		), $atts));
		$output = '<a class="anchor" id="'.$hash.'" name="'.$hash.'"></a>';
	    return $output;
	}
	add_shortcode('page_anchor', 'page_anchor_shortcode');
// Wide Shortcode - to Break Container and Re-Establish
function wide_row_shortcode	($atts, $content = null){
	$output = '<div class="container-wide">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	return $output;
	}
add_shortcode('wide_row', 'wide_row_shortcode');
?>
