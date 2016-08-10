(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			icon: 'dd-duck-icon',
			type: 'menubutton',
			tooltip: 'Insert a Quacky Shortcode',
			menu: [
				{
					text: 'Spacer',
					menu: [
						{
							text: 'Vertical Space',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Vertical Space Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'spaceheight',
											label: 'Space Height',
											value: '20'
										},
										{
											type:'container',
											html:'<p class="help">Enter the height of the spacer in pixels</p>'
										}
									],
									onsubmit: function( e ) {
										editor.insertContent( '[space height="' + e.data.spaceheight+ '"]');
									}
								});
							}
						},
						{
							text: 'Horizontal Space',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Horizontal Space Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'spacewidth',
											label: 'Space Width',
											value: '20',
										},
										{
											type:'container',
											html:'<p class="help">Enter the width of the spacer in pixels</p>'
										}
									],
									onsubmit: function( e ) {
										editor.insertContent( '[hspace width="' + e.data.spacewidth + '"]');
									}
								});
							}
						},
						
					]
				},
										{
							text: 'WIDE Row',
							onclick: function() {
										editor.insertContent( '[wide_row]'+ editor.selection.getContent() +'[/wide_row]');
							}
						},
				{
							text: 'Table',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert a Zebra Table',
									body: [
										{
											type: 'textbox',
											name: 'thcolor',
											label: 'TH Color',
											value: ''
										},
										{
											type:'container',
											html:'<p class="help">Enter the color code for table header.  Leave Blank if no header.</p>'
										},
										{
											type: 'textbox',
											name: 'color',
											label: 'BG Color',
											value: '#ccc'
										},
										{
											type:'container',
											html:'<p class="help">Enter the color code for the even rows.</p>'
										}
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[zebra color="' + e.data.color + '" thcolor="' + e.data.thcolor +'"]'+ editor.selection.getContent() +' [/zebra]');
									}
								});
							}
						},
						{
							text: 'FontAwesome',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Add a FontAwesome Icon',
									body: [
										{
											type: 'textbox',
											name: 'icon',
											label: 'Icon Code',
											value: ''
										},
										{
											type:'container',
											html:'<p class="help">Enter the icon code for the icon you want (Include fa-).</p>'
										},
										{
											type: 'textbox',
											name: 'color',
											label: 'Color Code',
											value: '#000000'
										},
										{
											type:'container',
											html:'<p class="help">Hex Color Code.</p>'
										},
										{
											type: 'textbox',
											name: 'size',
											label: 'Font Size',
											value: '14'
										},
										{
											type:'container',
											html:'<p class="help">Enter the Font Size in Pixels (px not required)</p>'
										}
										
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[dd-fontawesome icon="' + e.data.icon + '" size="' + e.data.size + '" color="' + e.data.color + '"]');
									}
								});
							}
						},
						{
							text: 'AntiSpambot Mailto',
							onclick: function() {
								editor.windowManager.open( {
									title: 'AntiSpamBot Mailto Email Link',
									body: [
										{
											type: 'textbox',
											name: 'mailto',
											label: 'E-Mail Address:',
											value: ''
										},
										{
											type:'container',
											html:'<p class="help">Enter the E-Mail Address for the mailto part of the link.</p>'
										},
										{
											type: 'textbox',
											name: 'mailtotxt',
											label: 'Text to Display:',
											value: ''
										},
										{
											type:'container',
											html:'<p class="help">Enter the text to display in the link that people click on.</p>'
										},
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[mailto mailto="' + e.data.mailto + '" txt="' + e.data.mailtotxt + '"]');
									}
								});
							}
						},
										{
							text: 'Text Box',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert a Text Box',
									body: [
										{
											type: 'textbox',
											name: 'bgcolor',
											label: 'Background Color',
											value: '#ccc'
										},
										{
											type:'container',
											html:'<p class="help">Enter the color code for Background Color.</p>'
										},
										{
											type: 'textbox',
											name: 'border',
											label: 'Border Thickness in PX',
											value: '1'
										},
										{
											type:'container',
											html:'<p class="help">Enter a number only for border thickness.</p>'
										},
										{
											type: 'textbox',
											name: 'bordercolor',
											label: 'Border Color',
											value: '#000'
										},
										{
											type:'container',
											html:'<p class="help">Enter Color Code for Border Color.</p>'
										},
										{
											type: 'textbox',
											name: 'padding',
											label: 'Padding can be entered like in CSS',
											value: '20px 10px'
										},
										{
											type:'container',
											html:'<p class="help">Enter Padding including px</p>'
										}
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[textbox bgcolor="' + e.data.bgcolor + '" border="' + e.data.border +'" bordercolor="'+e.data.bordercolor+'" padding="'+e.data.padding+'"]'+ editor.selection.getContent() +' [/textbox]');
									}
								});
							}
						},
						{
							text: 'Dive Flag List',
							onclick: function() {
								editor.insertContent( '[dive_flag_list]'+ editor.selection.getContent() +' [/dive_flag_list]');
							}
						},
						{
							text: 'Page Anchor',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Add a Page Anchor for Scroll',
									body: [
										{
											type: 'textbox',
											name: 'Hash',
											label: 'Name of the Anchor',
											value: ''
										},
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[page_anchor hash="' + e.data.Hash + '"]');
									}
								});
							}
						},
			]
		});
	});
})();
