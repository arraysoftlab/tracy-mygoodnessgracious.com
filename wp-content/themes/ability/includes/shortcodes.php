<?php

	/* ALERT SHORTCODES
	================================================== */

	function alert_white( $atts, $content = null ) {
	   return '<div class="alert white">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_white', 'alert_white');

	function alert_red( $atts, $content = null ) {
	   return '<div class="alert red">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_red', 'alert_red');

	function alert_green( $atts, $content = null ) {
	   return '<div class="alert green">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_green', 'alert_green');

	function alert_blue( $atts, $content = null ) {
	   return '<div class="alert blue">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_blue', 'alert_blue');


	/* BUTTON SHORTCODES
	================================================== */

	function button_blue($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button blue" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_blue', 'button_blue');

	function button_red($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button red" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_red', 'button_red');

	function button_green($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button green" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_green', 'button_green');

	function button_orange($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button orange" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_orange', 'button_orange');

	function button_yellow($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button yellow" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_yellow', 'button_yellow');

	function button_pink($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button pink" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_pink', 'button_pink');

	function button_purple($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button purple" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_purple', 'button_purple');

	function button_lightblue($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button lightblue" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_lightblue', 'button_lightblue');

	function button_turquoise($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button turquoise" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_turquoise', 'button_turquoise');

	function button_black($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button black" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_black', 'button_black');

	function button_grey($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button grey" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_grey', 'button_grey');

	function button_white($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#', 'target' => '_self'), $atts));
	   return '<a class="button white" href="'.$link.'" target="'.$target.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_white', 'button_white');


	/* COLUMN SHORTCODES
	================================================== */

	function one_third( $atts, $content = null ) {
	   return '<div class="one_third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_third', 'one_third');

	function one_third_last( $atts, $content = null ) {
	   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_third_last', 'one_third_last');

	function two_third( $atts, $content = null ) {
	   return '<div class="two_third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_third', 'two_third');

	function two_third_last( $atts, $content = null ) {
	   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('two_third_last', 'two_third_last');

	function one_half( $atts, $content = null ) {
	   return '<div class="one_half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_half', 'one_half');

	function one_half_last( $atts, $content = null ) {
	   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_half_last', 'one_half_last');

	function one_fourth( $atts, $content = null ) {
	   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fourth', 'one_fourth');

	function one_fourth_last( $atts, $content = null ) {
	   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_fourth_last', 'one_fourth_last');

	function three_fourth( $atts, $content = null ) {
	   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fourth', 'three_fourth');

	function three_fourth_last( $atts, $content = null ) {
	   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('three_fourth_last', 'three_fourth_last');


	/* PERSON SHORTCODE
	================================================= */

	function person_widget($atts, $content = null) {
		extract(shortcode_atts(array(
			"name" => '',
			"role" => '',
			"src" => ''
		), $atts));

	   $person_html = '<div class="person-widget">';
	   if ($src != '') {
	   		$person_html = $person_html . '<figure class="author-img"><img src="'.$src.'" alt="'.$name.'"/></figure>';
	   }
	   $person_html = $person_html .'<h4>'.$name.'</h4><p class="role">'.$role.'</p><p>' . do_shortcode($content) . '</p></div>';
	   		
	   	return $person_html;
	}
	add_shortcode("person", "person_widget");

	function person_widget_last($atts, $content = null) {
		extract(shortcode_atts(array(
			"name" => '',
			"role" => '',
			"src" => ''
		), $atts));

	   $person_html = '<div class="person-widget">';
	   if ($src != '') {
	   		$person_html = $person_html . '<figure class="author-img"><img src="'.$src.'" alt="'.$name.'"/></figure>';
	   }
	   $person_html = $person_html .'<h4>'.$name.'</h4><p class="role">'.$role.'</p><p>' . do_shortcode($content) . '</p></div><div class="clearboth"></div>';
	   		
	   	return $person_html;
	}
	add_shortcode("person_last", "person_widget_last");


	/* CLIENT SHORTCODE
	================================================= */

	function client_box( $atts, $content = null ) {
	   return '<div class="client-box" style="background-image: url('. do_shortcode($content) .');"></div>';
	}
	add_shortcode('client_box', 'client_box');

	function client_box_last( $atts, $content = null ) {
	   return '<div class="client-box" style="background-image: url('. do_shortcode($content) .');"></div><div class="clearboth"></div>';
	}
	add_shortcode('client_box_last', 'client_box_last');


	/* ACCORDION SHORTCODES
	================================================= */

	function accordion_widget($atts, $content = null) {
			
		return '<div class="accordion">'. do_shortcode($content) .'</div>';
	}
	add_shortcode("accordion", "accordion_widget");

	function accordion_panel($atts, $content = null) {
		extract(shortcode_atts(array(
			"title" => ''
		), $atts));

		return '<div class="accordion-header">'.$title.'</div><div class="accordion-body">'. do_shortcode($content) .'</div>';
	}
	add_shortcode("panel", "accordion_panel");


	/* TABS SHORTCODES
	================================================= */

	// Setup a global int variable to enable unique tabbed content identities
	$i = 0;

	function tabbed_asset( $atts, $content = null ) {
		global $i;
		extract(shortcode_atts(array(), $atts));

		$output = '<div class="tabbed-asset">';		
		$output .= '<ul class="tabs">';
		foreach ($atts as $tab) {
			$tab_id = "tab-" . $i++;
			$output .= '<li><a href="#' . $tab_id . '" class="tab">' .$tab. '</a></li>';
		}
		$output .= '<li class="clear"></li></ul>';

		$output .= do_shortcode($content) .'</div>';
		
		return $output;
		
	}
	add_shortcode('tabs', 'tabbed_asset');

	// Setup a global int variable to enable unique tab identities
	$t = 0;

	function tabbed_tab( $atts, $content = null ) {
		global $t;
		extract(shortcode_atts(array(), $atts));
		$tab_id = "tab-" . $t++;
		$output = '<div id="' . $tab_id . '" class="tab-content">' . do_shortcode($content) .'</div>';
		
		return $output;
	}
	add_shortcode('tab', 'tabbed_tab');


	/* TYPOGRAPHY SHORTCODES
	================================================= */

	// Highlight Text
	function highlighted($atts, $content = null) {
	   return '<span class="highlighted">'. do_shortcode($content) .'</span>';
	}
	add_shortcode("highlight", "highlighted");

	// Dropcap
	function dropcap($atts, $content = null) {
		return '<span class="dropcap">'. do_shortcode($content) .'</span>';
	}
	add_shortcode("dropcap", "dropcap");

	// Blockquote
	function blockquote($atts, $content = null) {
		return '<blockquote>'. do_shortcode($content) .'</blockquote>';
	}
	add_shortcode("blockquote", "blockquote");


	/* DIVIDER SHORTCODE
	================================================= */

	function horizontal_break($atts, $content = null) {
	   return '<div class="horizontal-break"> </div>';
	}
	add_shortcode("hr", "horizontal_break");


	/* MAP SHORTCODE
	================================================= */

	function fn_googleMaps($atts, $content = null) {
	   extract(shortcode_atts(array(
	      "width" => '940',
	      "height" => '400',
	      "src" => ''
	   ), $atts));
	   return '<div class="map"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe></div>';
	}
	add_shortcode("map", "fn_googleMaps");


	/* SOCIAL SHORTCODE
	================================================= */

	function social_icons($atts, $content = null) {
		global $data;

		$twitter = $data['ab_twitter_username'];
		$facebook = $data['ab_facebook_page_url'];
		$dribbble = $data['ab_dribbble_username'];
		$vimeo = $data['ab_vimeo_username'];
		$tumblr = $data['ab_tumblr_username'];
		$spotify = $data['ab_spotify_username'];
		$skype = $data['ab_skype_username'];
		$linkedin = $data['ab_linkedin_page_url'];
		$lastfm = $data['ab_lastfm_username'];
		$googleplus = $data['ab_googleplus_page_url'];
		$flickr = $data['ab_flickr_page_url'];
		$youtube = $data['ab_youtube_username'];
		$behance = $data['ab_behance_username'];
		$pinterest = $data['ab_pinterest_username'];

		$social_icons = '';

		if ($twitter) {
			$social_icons = $social_icons . '<li class="twitter"><a href="http://www.twitter.com/'.$twitter.'">Twitter</a></li>';
		}
		if ($facebook) {
			$social_icons = $social_icons . '<li class="facebook"><a href="'.$facebook.'">Facebook</a></li>';
		}
		if ($dribbble) {
			$social_icons = $social_icons . '<li class="dribbble"><a href="http://www.dribbble.com/'.$dribbble.'">Dribbble</a></li>';
		}
		if ($vimeo) {
			$social_icons = $social_icons . '<li class="vimeo"><a href="http://www.vimeo.com/'.$vimeo.'">Vimeo</a></li>';
		}
		if ($tumblr) {
			$social_icons = $social_icons . '<li class="tumblr"><a href="http://www.tumblr.com/'.$tumblr.'">Tumblr</a></li>';
		}
		if ($spotify) {
			$social_icons = $social_icons . '<li class="spotify"><a href="http://open.spotify.com/user/'.$spotify.'">Spotify</a></li>';
		}
		if ($skype) {
			$social_icons = $social_icons . '<li class="skype"><a href="skype:'.$skype.'">Skype</a></li>';
		}
		if ($linkedin) {
			$social_icons = $social_icons . '<li class="linkedin"><a href="'.$linkedin.'">LinkedIn</a></li>';
		}
		if ($lastfm) {
			$social_icons = $social_icons . '<li class="lastfm"><a href="http://www.last.fm/user/'.$lastfm.'">Last.fm</a></li>';
		}
		if ($googleplus) {
			$social_icons = $social_icons . '<li class="googleplus"><a href="'.$googleplus.'">Google+</a></li>';
		}
		if ($flickr) {
			$social_icons = $social_icons . '<li class="flickr"><a href="'.$flickr.'">Flickr</a></li>';
		}
		if ($youtube) {
			$social_icons = $social_icons . '<li class="youtube"><a href="http://www.youtube.com/user/'.$youtube.'">YouTube</a></li>';
		}
		if ($behance) {
			$social_icons = $social_icons . '<li class="behance"><a href="http://www.behance.net/'.$behance.'">Behance</a></li>';
		}
		if ($pinterest) {
			$social_icons = $social_icons . '<li class="pinterest"><a href="http://www.pinterest.com/'.$pinterest.'/">Pinterest</a></li>';
		}

		return '<ul class="social-icons">'. $social_icons .'</ul>';
	}
	add_shortcode("social", "social_icons");
	

	/* SOCIAL SHORTCODE FOR HEADER
	================================================= */

	function top_social_menu($atts, $content = null) {
		global $data;

		$pinterest = $data['ab_pinterest_username'];
		$twitter = $data['ab_twitter_username'];
		$facebook = $data['ab_facebook_page_url'];	
		$youtube = $data['ab_youtube_username'];
	

		$social_icons = '';
		if ($youtube) {
			$social_icons = $social_icons . '<li id="youtube" ><a href="http://www.youtube.com/user/'.$youtube.'"></a></li>';
		}
		if ($facebook) {			
            $social_icons = $social_icons . '<li id="facebook"><a href="'.$facebook.'"></a></li>';		
        }				
        if ($twitter) {			
            $social_icons = $social_icons . '<li id="twitter"><a href="http://www.twitter.com/'.$twitter.'"></a></li>';		
        }
		if ($pinterest) {
			$social_icons = $social_icons . '<li id="pinterest"><a href="http://www.pinterest.com/'.$pinterest.'/"></a></li>';
		}
        $social_icons = $social_icons . '<li id="instagram"><a href="http://instagram.com/mygoodnessg/"></a></li>';
        
		$social_icons = $social_icons .'<li id="cart"><a href="'.get_bloginfo('siteurl').'/store/cart"></a></li>
				                        <li id="search">
				                        	<form method="get" action="'.get_bloginfo('url').'" >
				                        	<label for="search-field"></label>
				                        	<input type="text" id="search-field" class="email" name="s" placeholder="SEARCH" />
				                        	</form>
				                        </li>';
		

		return '<div id="top-social-media"><ul>'. $social_icons .'</ul></div>';
	}
	add_shortcode("top_social", "top_social_menu");

	/* YEAR SHORTCODE
	================================================= */

	function year_shortcode() {
		$year = date('Y');
		return $year;
	}

	add_shortcode('the-year', 'year_shortcode');


	/* WORDPRESS LINK SHORTCODE
	================================================= */

	function wordpress_link() {
		return '<a href="http://wordpress.org/" target="_blank">WordPress</a>';
	}

	add_shortcode('wp-link', 'wordpress_link');
?>