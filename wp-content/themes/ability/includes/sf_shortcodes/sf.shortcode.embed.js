function embedSelectedShortcode() {
	
	var shortcodeHTML;	
	var shortcode_panel = document.getElementById('shortcode_panel');
	var current_shortcode = shortcode_panel.className.indexOf('current');

	if (current_shortcode != -1) {
		
		// SHORTCODE SELECT
		var shortcode_select = document.getElementById('shortcode-select').value;
		

		/////////////////////////////////////////
		////	SHORTCODE OPTION VARIABLES
		/////////////////////////////////////////
						
		// Alert
		var alert_style = document.getElementById('alert-style').value;
		var alert_text = document.getElementById('alert-text').value;
		
		// Button
		var button_colour = document.getElementById('button-colour').value;
		var button_text = document.getElementById('button-text').value;
		var button_url = document.getElementById('button-url').value;
		var button_target = "";
			
		if (document.getElementById('button-target').checked) {
			button_target = "_blank";
		} else {
			button_target = "_self";
		}
		
		// Typography
		var typography_type = document.getElementById('typography-type').value;

		// Columns
		var column_options = document.getElementById('column-options').value;

		// Person
		var person_image = document.getElementById('person-image').value;
		var person_name = document.getElementById('person-name').value;
		var person_role = document.getElementById('person-role').value;
		var person_last = "";

		if (document.getElementById('person-last').checked) {
			person_last = "yes";
		} else {
			person_last = "no";
		}

		// Map
		var map_url = document.getElementById('map-url').value;
		var map_height = document.getElementById('map-height').value;
		var map_width = document.getElementById('map-width').value;

		// Client
		var client_image_url = document.getElementById('client-image-url').value;
		var client_last = "";
			
		if (document.getElementById('client-last').checked) {
			client_last = "yes";
		} else {
			client_last = "no";
		}

		
		/////////////////////////////////////////
		////	ALERT SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-alerts' && alert_style != '0' && alert_text != '') {
			shortcodeHTML = "[alert_"+alert_style+"]"+alert_text+"[/alert_"+alert_style+"]";	
		}

		/////////////////////////////////////////
		////	BUTTON SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-buttons' && button_colour != '0') {
			shortcodeHTML = "[button_"+button_colour+" link='"+button_url+"' target='"+button_target+"']"+button_text+"[/button_"+button_colour+"]";	
		}

		/////////////////////////////////////////
		////	SOCIAL SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-social') {
			shortcodeHTML = "[social]";	
		}

		/////////////////////////////////////////
		////	TYPOGRAPHY SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-typography') {
			shortcodeHTML = "["+typography_type+"]TEXT HERE[/"+typography_type+"]";	
		}

		/////////////////////////////////////////
		////	COLUMNS SHORTCODE OUTPUT
		/////////////////////////////////////////


		if (shortcode_select == 'shortcode-columns' && column_options == 'two_halves') {
			shortcodeHTML = "[one_half]1/2 Text[/one_half][one_half_last]1/2 Text[/one_half_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'three_thirds') {
			shortcodeHTML = "[one_third]1/3 Text[/one_third][one_third]1/3 Text[/one_third][one_third_last]1/3 Text[/one_third_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'three_thirds') {
			shortcodeHTML = "[one_third]1/3 Text[/one_third][two_third_last]2/3 Text[/two_third_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'three_thirds') {
			shortcodeHTML = "[two_third]2/3 Text[/two_third][one_third_last]1/3 Text[/one_third_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'four_quarters') {
			shortcodeHTML = "[one_fourth]1/4 Text[/one_fourth][one_fourth]1/4 Text[/one_fourth][one_fourth]1/4 Text[/one_fourth][one_fourth_last]1/4 Text[/one_fourth_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'one_quarter_three_quarters') {
			shortcodeHTML = "[one_fourth]1/4 Text[/one_fourth][three_fourth_last]3/4 Text[/three_fourth_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'one_quarter_three_quarters') {
			shortcodeHTML = "[three_fourth]3/4 Text[/three_fourth][one_fourth_last]1/4 Text[/one_fourth_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'one_quarter_one_quarter_one_half') {
			shortcodeHTML = "[one_fourth]1/4 Text[/one_fourth][one_fourth]1/4 Text[/one_fourth][one_half_last]1/2 Text[/one_half_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'one_quarter_one_half_one_quarter') {
			shortcodeHTML = "[one_fourth]1/4 Text[/one_fourth][one_half]1/2 Text[/one_half][one_fourth_last]1/4 Text[/one_fourth_last]";	
		}

		if (shortcode_select == 'shortcode-columns' && column_options == 'one_half_one_quarter_one_quarter') {
			shortcodeHTML = "[one_half]1/2 Text[/one_half][one_fourth]1/4 Text[/one_fourth][one_fourth_last]1/4 Text[/one_fourth_last]";	
		}

		/////////////////////////////////////////
		////	PERSON SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-person' && person_last == 'no') {
			shortcodeHTML = '[person src='+person_image+' name='+person_name+' role='+person_role+']Person detail text[/person]';	
		}
		if (shortcode_select == 'shortcode-person' && person_last == 'yes') {
			shortcodeHTML = '[person_last src='+person_image+' name='+person_name+' role='+person_role+']Person detail text[/person_last]';	
		}

		/////////////////////////////////////////
		////	MAP SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-map') {
			shortcodeHTML = '[map width="'+map_width+'" height="'+map_height+'" src="'+map_url+'"]';	
		}

		/////////////////////////////////////////
		////	CLIENT SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-client' && client_last == 'no') {
			shortcodeHTML = '[client_box]'+client_image_url+'[/client_box]';
		}

		if (shortcode_select == 'shortcode-client' && client_last == 'yes') {
			shortcodeHTML = '[client_box_last]'+client_image_url+'[/client_box_last]';			
		}

		/////////////////////////////////////////
		////	DIVIDER SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-divider') {
			shortcodeHTML = '[hr]';	
		}

		/////////////////////////////////////////
		////	ACCORDION SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-accordion') {
			shortcodeHTML = '[accordion]<br />[panel title="Panel #1"]First panel text[/panel]<br />[panel title="Panel #2"]Second panel text[/panel]<br />[panel title="Panel #3"]Third panel text[/panel]<br />[/accordion]';
		}

		/////////////////////////////////////////
		////	TABS SHORTCODE OUTPUT
		/////////////////////////////////////////

		if (shortcode_select == 'shortcode-tabs') {
			shortcodeHTML = '[tabs tab_one="Tab #1" tab_two="Tab #2" tab_three="Tab #3" tab_four="Tab #4"]<br />[tab]Tab #1 Content[/tab]<br />[tab]Tab #2 Content[/tab]<br />[tab]Tab #3 Content[/tab]<br />[tab]Tab #4 Content[/tab]<br />[/tabs]';
		}

	}

	/////////////////////////////////////////
	////	TinyMCE Callback & Embed
	/////////////////////////////////////////

	if (window.tinyMCE && current_shortcode != -1) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodeHTML);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	} else {
		tinyMCEPopup.close();		
	}

	return;
}