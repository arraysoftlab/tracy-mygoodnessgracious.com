<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

    // Slider Transitions Array
	$slider_transitions = array(
							"fade" => "fade",
							"slide" => "slide"
							);

	$showcase_types = array( "0" => "Classic (Image)", "1" => "Video/Content");	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/bg_patterns/';
		
	$options = array();
		
	$options[] = array( "name" => "Styling Options",
						"type" => "heading");

	$options[] = array( "name" =>  "Background",
						"desc" => "This will be used for the themes background, you can also provide an image (optional).",
						"id" => "background",
						"std" => $background_defaults, 
						"type" => "background");

	$options[] = array( "name" => "Preset Background",
						"desc" => "If you choose a preset background, it will overwrite the above. If you'd like to use your own background, please select the none image below. Patterns by <a href='http://subtlepatterns.com' target='_blank'>Subtle Patterns</a>.",
						"id" => "example_images",
						"std" => "none",
						"type" => "images",
						"options" => array(
							'none' => $imagepath . 'none.png',
							'45degreee_fabric' => $imagepath . '45degreee_fabric.png',
							'beige_paper' => $imagepath . 'beige_paper.png',
							'bgnoise_lg' => $imagepath . 'bgnoise_lg.png',
							'black_denim' => $imagepath . 'black_denim.png',
							'black_linen_v2' => $imagepath . 'black_linen_v2.png',
							'black_paper' => $imagepath . 'black_paper.png',
							'black-Linen' => $imagepath . 'black-Linen.png',
							'blackmamba' => $imagepath . 'blackmamba.png',
							'bright_squares' => $imagepath . 'bright_squares.png',
							'brushed_alu_dark' => $imagepath . 'brushed_alu_dark.png',
							'brushed_alu' => $imagepath . 'brushed_alu.png',
							'cardboard' => $imagepath . 'cardboard.png',
							'concrete_wall_2' => $imagepath . 'concrete_wall_2.png',
							'concrete_wall_3' => $imagepath . 'concrete_wall_3.png',
							'concrete_wall' => $imagepath . 'concrete_wall.png',
							'cork_1' => $imagepath . 'cork_1.png',
							'crissXcross' => $imagepath . 'crissXcross.png',
							'dark_brick_wall' => $imagepath . 'dark_brick_wall.png',
							'dark_leather' => $imagepath . 'dark_leather.png',
							'dark_mosaic' => $imagepath . 'dark_mosaic.png',
							'darth_stripe' => $imagepath . 'darth_stripe.png',
							'diagonal-noise' => $imagepath . 'diagonal-noise.png',
							'exclusive_paper' => $imagepath . 'exclusive_paper.png',
							'fabric_1' => $imagepath . 'fabric_1.png',
							'felt' => $imagepath . 'felt.png',
							'flowers' => $imagepath . 'flowers.png',
							'gray_sand' => $imagepath . 'gray_sand.png',
							'green_dust_scratch' => $imagepath . 'green_dust_scratch.png',
							'green_gobbler' => $imagepath . 'green_gobbler.png',
							'green-fibers' => $imagepath . 'green-fibers.png',
							'grunge_wall' => $imagepath . 'grunge_wall.png',
							'handmadepaper' => $imagepath . 'handmadepaper.png',
							'inflicted' => $imagepath . 'inflicted.png',
							'leather_1' => $imagepath . 'leather_1.png',
							'light_alu' => $imagepath . 'light_alu.png',
							'light_checkered_tiles' => $imagepath . 'light_checkered_tiles.png',
							'light_honeycomb' => $imagepath . 'light_honeycomb.png',
							'little_pluses' => $imagepath . 'little_pluses.png',
							'mirrored_squares' => $imagepath . 'mirrored_squares.png',
							'noise_pattern_with_crosslines' => $imagepath . 'noise_pattern_with_crosslines.png',
							'noisy' => $imagepath . 'noisy.png',
							'old_mathematics' => $imagepath . 'old_mathematics.png',
							'padded' => $imagepath . 'padded.png',
							'paper_1' => $imagepath . 'paper_1.png',
							'paper_2' => $imagepath . 'paper_2.png',
							'paper_3' => $imagepath . 'paper_3.png',
							'pool_table' => $imagepath . 'pool_table.png',
							'project_papper' => $imagepath . 'project_papper.png',
							'random_grey_variations' => $imagepath . 'random_grey_variations.png',
							'real_cf' => $imagepath . 'real_cf.png',
							'robots' => $imagepath . 'robots.png',
							'rockywall' => $imagepath . 'rockywall.png',
							'roughcloth' => $imagepath . 'roughcloth.png',
							'smooth_wall' => $imagepath . 'smooth_wall.png',
							'soft_wallpaper' => $imagepath . 'soft_wallpaper.png',
							'square_bg' => $imagepath . 'square_bg.png',
							'stucco' => $imagepath . 'stucco.png',
							'subtle_freckles' => $imagepath . 'subtle_freckles.png',
							'subtle_orange_emboss' => $imagepath . 'subtle_orange_emboss.png',
							'type' => $imagepath . 'type.png',
							'vichy' => $imagepath . 'vichy.png',
							'washi' => $imagepath . 'washi.png',
							'white_sand' => $imagepath . 'white_sand.png',
							'white_texture' => $imagepath . 'white_texture.png',
							'whitey' => $imagepath . 'whitey.png',
							'wood_1' => $imagepath . 'wood_1.png',
							'woven' => $imagepath . 'woven.png',
							'xv' => $imagepath . 'xv.png'
							)
						);

	$options[] = array( "name" => "Detail Colour",
						"desc" => "The primary colour that is used for links, headings, theme detailing etc.",
						"id" => "primary_detail_colour",
						"std" => "#952E2E",
						"type" => "color");

	$options[] = array( "name" => "Text Colour",
						"desc" => "The standard text colour that is used for the body text such as descriptions and static text.",
						"id" => "standard_text_colour", 
						"std" => "#626262",
						"type" => "color");
	
	$options[] = array( "name" =>  "Content Background",
						"desc" => "Change this to set the content background colour. Default is #ffffff (white).",
						"id" => "container_background",
						"std" => "#ffffff", 
						"type" => "color");
	
	$options[] = array( "name" =>  "Border Colour",
						"desc" => "Change this to set the border colour for the content boxes. Default is #999 (grey).",
						"id" => "border_colour",
						"std" => "#999999", 
						"type" => "color");

	$options[] = array( "name" => "Font",
						"desc" => "Select the themes default font.",
						"id" => "typography",
						"std" => array('face' => 'Merriweather'),
						"type" => "typography");

	$options[] = array( "name" => "Custom CSS",
						"desc" => "Enter your own CSS here.",
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea"); 
							
	$options[] = array( "name" => "General Options",
						"type" => "heading");

	$options[] = array( "name" => "Show Top Drawer",
						"desc" => "Show the top drawer section of the site.",
						"id" => "show_top_drawer",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Logo",
						"desc" => "Upload your site logo here (298px wide).",
						"id" => "theme_logo",
						"type" => "upload");
	
	$options[] = array( "name" => "Twitter Username",
						"desc" => "Your Twitter username, which will be used for the social icon link.",
						"id" => "twitter_username",
						"std" => "",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Facebook Page URL",
						"desc" => "Your Facebook page URL, which will be used for the social icon link.",
						"id" => "facebook_page",
						"std" => "",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Google+ Page URL",
						"desc" => "Your Google+ page URL, which will be used for the social icon link.",
						"id" => "google_plus_page",
						"std" => "",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "YouTube Username",
						"desc" => "Your YouTube username, which will be used for the social icon link.",
						"id" => "youtube_user_id",
						"std" => "",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Portfolio Intro Text",
						"desc" => "The text that appears above the portfolio items / filter on the portfolio templates.",
						"id" => "portfolio_intro_text",
						"std" => "",
						"type" => "textarea");	

	$options[] = array( "name" => "Portfolio Items Per Page",
						"desc" => "Number of portfolio items shown per page with the single column Portfolio template.",
						"id" => "portfolio_items_per_page",
						"std" => "5",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "Blog Intro Text",
						"desc" => "The text that appears above the blog items.",
						"id" => "blog_intro_text",
						"std" => "",
						"type" => "textarea");	

	$options[] = array( "name" => "Blog Items Per Page",
						"desc" => "Number of blog items shown per page with the blog template.",
						"id" => "blog_items_per_page",
						"std" => "5",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Show Footer Blog Widget",
						"desc" => "Show the recent blog posts widget in the footer",
						"id" => "show_footer_blog",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Footer Widget Blog Items",
						"desc" => "Number of blog items to show in the footer blog widget.",
						"id" => "footer_blog_items",
						"std" => "4",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Footer Copyright Text",
						"desc" => "The copyright text that appears at the bottom of the footer.",
						"id" => "footer_copyright_text",
						"std" => "",
						"type" => "textarea");	

	$options[] = array( "name" => "Google Analytics ID",
						"desc" => "The ID for your Google Analytics profile.",
						"id" => "google_analytics",
						"std" => "",
						"class" => "mini",
						"type" => "text");	

	$options[] = array( "name" => "Homepage Options",
						"type" => "heading");

	$options[] = array( "name" => "Showcase",
						"desc" => "Show the showcase on the homepage.",
						"id" => "show_showcase",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Showcase Items",
						"desc" => "Enter how many showcase slider items you would like to appear on the homepage. Leave the field blank to show ALL items.",
						"id" => "homepage_showcase_items",
						"std" => "",
						"class" => "mini",
						"type" => "text");

	$options[] = array( "name" => "Tagline",
						"desc" => "Show the tagline on the homepage.",
						"id" => "show_tagline",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Tagline Text",
						"desc" => "The text that appears in the tagline section.",
						"id" => "tagline_text",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => "Homepage Portfolio Intro Text",
						"desc" => "The text that appears above the portfolio items on the homepage.",
						"id" => "home_portfolio_intro_text",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => "Homepage Portfolio Items",
						"desc" => "Select how many portfolio items you would like to appear on the homepage.",
						"id" => "homepage_portfolio_items",
						"std" => "16",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "Contact Options",
						"type" => "heading");

	$options[] = array( "name" => "Email Address",
						"desc" => "The email address that the contact form will send to.",
						"id" => "contact_email_address",
						"std" => "",
						"type" => "text");
							
	return $options;
}