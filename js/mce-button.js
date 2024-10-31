(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'S Testimonial',
			icon: false,
			onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'postparpagecount',
											label: 'Posts Per Page',
											value: '5'
										},
										{
											type: 'textbox',
											name: 'postcategory',
											label: 'Category',
											value: 's_t_c'
										}
									],
								onsubmit: function( e ) {
										editor.insertContent( '[sanchari_testi_shortcode count="' + e.data.postparpagecount + '" category="' + e.data.postcategory + '"]');
									}
								});
							}
		});
	});
})();