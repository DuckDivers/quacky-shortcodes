<div class="wrap">
    <?php screen_icon(); ?> 
	<form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">
 
	<?php settings_fields($plugin_id.'_options'); ?>
    
    <h2>Duck Diver Smooth Scroll &raquo; Settings</h2>
    <table class="widefat">
		<thead>
		   <tr>
			 <th><strong>Enter in your options below to exclude anchors.</strong></th>
			 <th>
		</thead>

		<tbody>
		   <tr>
			 <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="essl_speed">
                     <p>Scroll Speed ( smaller number, faster, default is 900 )</p>
                     <p><input  size="10" id="speed" type="text" name="essl_speed" value="<?php echo get_option('essl_speed'); ?>" /></p>
                 </label>
             </td>
		   </tr>
		   <tr>
			 <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="essl_offset">
                     <p>Offset ( default is 20 )</p>
                     <p><input  size="10"  id="offset" type="text" name="essl_offset" value="<?php echo get_option('essl_offset'); ?>" /></p>
                 </label>
             </td>
		   </tr>





		   
		</tbody>
		

		<tfoot>
		   <tr>
			 <th><input type="submit" name="submit" value="Save Settings" class="button button-primary" onClick="return empty()"  /></th>
		   </tr>
		</tfoot>
	</table>

	</form>
  
</div>