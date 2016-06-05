<?php
/**
 * PayPal Shortcode for HLI
 *
 */
//* <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> *//

function paypal_shortcode($atts, $content = null) {
		
		$output = 	'
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_donations">
				<input type="hidden" name="business" value="finance@healthleadershipinternational.org">
				<input type="hidden" name="lc" value="US">
				<input type="hidden" name="item_name" value="Health Leadership International">
				<input type="hidden" name="no_note" value="0">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
				<input type="submit" name="Donate to HLI" class="btn btn-primary btn-large" value="Make a Donation">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				';
		return $output;
			}
	add_shortcode('paypal', 'paypal_shortcode');
?>