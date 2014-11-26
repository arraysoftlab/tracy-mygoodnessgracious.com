<?php
	
	// Require config
	require_once('config.php');

	// Kill user if not logged in and can edit posts
	if ( !is_user_logged_in() || !current_user_can('edit_posts') ) wp_die(__('You are not allowed to access this page', 'swiftframework'));
?>

<!-- Swift Framework Shortcode Panel -->

<!-- OPEN html -->
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<!-- OPEN head -->
	<head>
		
		<!-- Title & Meta -->
		<title><?php _e('Swift Framework Shortcodes', 'swiftframework');?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />

		<!-- LOAD scripts -->
		<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/includes/sf_shortcodes/sf.shortcodes.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/includes/sf_shortcodes/sf.shortcode.embed.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>

		<base target="_self" />
		<link href="<?php echo get_template_directory_uri() ?>/css/base.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_template_directory_uri() ?>/includes/sf_shortcodes/style.css" rel="stylesheet" type="text/css" />

	<!-- CLOSE head -->
	</head>

	<!-- OPEN body -->
	<body onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" id="link" >
		
		<!-- OPEN swiftframework_shortcode_form -->
		<form name="swiftframework_shortcode_form" action="#">

			<!-- OPEN #shortcode_wrap -->
			<div id="shortcode_wrap">

				<!-- CLOSE #shortcode_panel -->
				<div id="shortcode_panel" class="current">

					<fieldset>

						<h4><?php _e('Select a shortcode', 'swiftframework');?></h4>
						<div class="option">
							<label for="shortcode-select"><?php _e('Shortcode', 'swiftframework');?></label>
							<select id="shortcode-select" name="shortcode-select">
								<option value="0"></option>
								<option value="shortcode-alerts"><?php _e('Alerts', 'swiftframework');?></option>
								<option value="shortcode-buttons"><?php _e('Buttons', 'swiftframework');?></option>
								<option value="shortcode-social"><?php _e('Social', 'swiftframework');?></option>
								<option value="shortcode-typography"><?php _e('Typography', 'swiftframework');?></option>
								<option value="shortcode-columns"><?php _e('Columns', 'swiftframework');?></option>
								<option value="shortcode-person"><?php _e('Person', 'swiftframework');?></option>
								<option value="shortcode-map"><?php _e('Map', 'swiftframework');?></option>
								<option value="shortcode-client"><?php _e('Client', 'swiftframework');?></option>
								<option value="shortcode-divider"><?php _e('Divider', 'swiftframework');?></option>
								<option value="shortcode-accordion"><?php _e('Accordion', 'swiftframework');?></option>
								<option value="shortcode-tabs"><?php _e('Tabs', 'swiftframework');?></option>
							</select>
						</div>

						
						<!--//////////////////////////////
						////	ALERTS
						//////////////////////////////-->

						<div id="shortcode-alerts">
							<h5><?php _e('Alerts', 'swiftframework');?></h5>
							<div class="option">
								<label for="alert-style"><?php _e('Alert style', 'swiftframework');?></label>
								<select id="alert-style" name="alert-style">
									<option value="0"></option>
									<option value="white"><?php _e('White', 'swiftframework');?></option>
									<option value="red"><?php _e('Red', 'swiftframework');?></option>
									<option value="green"><?php _e('Green', 'swiftframework');?></option>
									<option value="blue"><?php _e('Blue', 'swiftframework');?></option>
								</select>
							</div>
							<div class="option">
								<label for="alert-text"><?php _e('Alert text', 'swiftframework');?></label>
								<input id="alert-text" name="alert-text" type="text" value="<?php _e('Alert text', 'swiftframework');?>"/>
							</div>
						</div>


						<!--//////////////////////////////
						////	BUTTONS
						//////////////////////////////-->

						<div id="shortcode-buttons">
							<h5><?php _e('Buttons', 'swiftframework');?></h5>
							<div class="option">
								<label for="button-colour"><?php _e('Button colour', 'swiftframework');?></label>
								<select id="button-colour" name="button-colour">
									<option value="0"></option>
									<option value="blue"><?php _e('Blue', 'swiftframework');?></option>
									<option value="red"><?php _e('Red', 'swiftframework');?></option>
									<option value="green"><?php _e('Green', 'swiftframework');?></option>
									<option value="orange"><?php _e('Orange', 'swiftframework');?></option>
									<option value="yellow"><?php _e('Yellow', 'swiftframework');?></option>
									<option value="pink"><?php _e('Pink', 'swiftframework');?></option>
									<option value="purple"><?php _e('Purple', 'swiftframework');?></option>
									<option value="lightblue"><?php _e('Light Blue', 'swiftframework');?></option>
									<option value="turquoise"><?php _e('Turquoise', 'swiftframework');?></option>
									<option value="black"><?php _e('Black', 'swiftframework');?></option>
									<option value="grey"><?php _e('Grey', 'swiftframework');?></option>
									<option value="white"><?php _e('White', 'swiftframework');?></option>
								</select>
							</div>
							<div class="option">
								<label for="button-text"><?php _e('Button text', 'swiftframework');?></label>
								<input id="button-text" name="button-text" type="text" value="<?php _e('Button text', 'swiftframework');?>"/>
							</div>
							<div class="option">
								<label for="button-url"><?php _e('Button URL', 'swiftframework');?></label>
								<input id="button-url" name="button-url" type="text" value="http://"/>
							</div>
							<div class="option">
								<label for="button-target" class="for-checkbox"><?php _e('Open link in a new window?', 'swiftframework');?></label>
								<input id="button-target" class="checkbox" name="button-target" type="checkbox"/>
							</div>
						</div>


						<!--//////////////////////////////
						////	SOCIAL
						//////////////////////////////-->

						<div id="shortcode-social">
							<h5><?php _e('Social', 'swiftframework');?></h5>
						</div>


						<!--//////////////////////////////
						////	TYPOGRAPHY
						//////////////////////////////-->

						<div id="shortcode-typography">
							<h5><?php _e('Typography', 'swiftframework');?></h5>
							<div class="option">
								<label for="typography-type"><?php _e('Type', 'swiftframework');?></label>
								<select id="typography-type" name="typography-type">
									<option value="0"></option>
									<option value="highlight"><?php _e('Highlight', 'swiftframework');?></option>
									<option value="blockquote"><?php _e('Blockquote', 'swiftframework');?></option>
									<option value="dropcap"><?php _e('Dropcap', 'swiftframework');?></option>
								</select>
							</div>
						</div>


						<!--//////////////////////////////
						////	COLUMNS
						//////////////////////////////-->

						<div id="shortcode-columns" class="shortcode-option">
							<h5><?php _e('Columns', 'swiftframework');?></h5>
							<div class="option">
								<label for="column-options"><?php _e('Layout', 'swiftframework');?></label>
								<select id="column-options" name="column-options">
									<option value="0"></option>
									<option value="two_halves"><?php _e('1/2 + 1/2', 'swiftframework');?></option>
									<option value="three_thirds"><?php _e('1/3 + 1/3 + 1/3', 'swiftframework');?></option>
									<option value="one_third_two_thirds"><?php _e('1/3 + 2/3', 'swiftframework');?></option>
									<option value="two_thirds_one_third"><?php _e('2/3 + 1/3', 'swiftframework');?></option>
									<option value="four_quarters"><?php _e('1/4 + 1/4 + 1/4 + 1/4', 'swiftframework');?></option>
									<option value="one_quarter_three_quarters"><?php _e('1/4 + 3/4', 'swiftframework');?></option>
									<option value="three_quarters_one_quarter"><?php _e('3/4 + 1/4', 'swiftframework');?></option>
									<option value="one_quarter_one_quarter_one_half"><?php _e('1/4 + 1/4 + 1/2', 'swiftframework');?></option>
									<option value="one_quarter_one_half_one_quarter"><?php _e('1/4 + 1/2 + 1/4', 'swiftframework');?></option>
									<option value="one_half_one_quarter_one_quarter"><?php _e('1/2 + 1/4 + 1/4', 'swiftframework');?></option>
								</select>
							</div>
						</div>
						
						<!--//////////////////////////////
						////	PERSON
						//////////////////////////////-->

						<div id="shortcode-person">
							<h5><?php _e('Person', 'swiftframework');?></h5>
							<div class="option">
								<label for="person-image"><?php _e('Person image URL', 'swiftframework');?></label>
								<input id="person-image" name="person-image" type="text" value=""/>
								<p class="info">Ideally, this would be 460px wide, with any height.</p>
							</div>
							<div class="option">
								<label for="person-name"><?php _e('Person name', 'swiftframework');?></label>
								<input id="person-name" name="person-name" type="text" value=""/>
							</div>
							<div class="option">
								<label for="person-role"><?php _e('Person role', 'swiftframework');?></label>
								<input id="person-role" name="person-role" type="text" value=""/>
							</div>
							<div class="option">
								<label for="person-last" class="for-checkbox"><?php _e('Last', 'swiftframework');?></label>
								<input id="person-last" class="checkbox" name="person-last" type="checkbox"/>
								<p class="info">If this is the last client in the section then tick this box.</p>
							</div>
						</div>


						<!--//////////////////////////////
						////	MAP
						//////////////////////////////-->

						<div id="shortcode-map">
							<h5><?php _e('Map', 'swiftframework');?></h5>
							<div class="option">
								<label for="map-url"><?php _e('Google Map URL', 'swiftframework');?></label>
								<input id="map-url" name="map-url" type="text" value=""/>
								<p class="info">This is the embed URL from Google Maps.</p>
							</div>
							<div class="option">
								<label for="map-height"><?php _e('Height in px', 'swiftframework');?></label>
								<input id="map-height" name="map-height" type="text" value=""/>
							</div>
							<div class="option">
								<label for="map-width"><?php _e('Width in px', 'swiftframework');?></label>
								<input id="map-width" name="map-width" type="text" value=""/>
							</div>
						</div>


						<!--//////////////////////////////
						////	CLIENT
						//////////////////////////////-->

						<div id="shortcode-client">
							<h5><?php _e('Client', 'swiftframework');?></h5>
							<div class="option">
								<label for="client-image-url"><?php _e('Client Image URL', 'swiftframework');?></label>
								<input id="client-image-url" name="client-image-url" type="text" value=""/>
								<p class="info">This should be ideally be less than 150px wide, and 100px tall.</p>
							</div>
							<div class="option">
								<label for="client-last" class="for-checkbox"><?php _e('Last', 'swiftframework');?></label>
								<input id="client-last" class="checkbox" name="client-last" type="checkbox"/>
								<p class="info">If this is the last person in the section then tick this box.</p>
							</div>
						</div>


						<!--//////////////////////////////
						////	DIVIDER
						//////////////////////////////-->

						<div id="shortcode-divider">
							<h5><?php _e('Divider', 'swiftframework');?></h5>
						</div>


						<!--//////////////////////////////
						////	ACCORDION
						//////////////////////////////-->

						<div id="shortcode-accordion">
							<h5><?php _e('Accordion', 'swiftframework');?></h5>
						</div>


						<!--//////////////////////////////
						////	TABS
						//////////////////////////////-->

						<div id="shortcode-tabs">
							<h5><?php _e('Tabs', 'swiftframework');?></h5>
						</div>

					</fieldset>

				<!-- CLOSE #shortcode_panel -->					
				</div>

				<div class="buttons clearfix">
					<input type="submit" id="insert" name="insert" value="<?php _e('Insert Shortcode', 'swiftframework');?>" onClick="embedSelectedShortcode();" />
				</div>

			<!-- CLOSE #shortcode_wrap -->
			</div>

		<!-- CLOSE swiftframework_shortcode_form -->
		</form>

	<!-- CLOSE body -->
	</body>

<!-- CLOSE html -->	
</html>
