<?php
	
	global $data;
	require_once('../../../../../wp-load.php');
	
	header("Content-type: text/css; charset: UTF-8");

	// Standard Styling
	$body_color = "#fcfcfc";
	$alt_body_color = "#eee";
	$keyline_color = "#2285f3";
	$header_color = "#ffffff";
	$footer_color = "#222222";
	$border_color = "#e8e8e8";
	$box_color = "#ffffff"

?>
<?php

	// Custom Styling

	$custom_keyline_color = $data['ab_styling_colour'];
	$custom_header_color = $data['ab_header_background'];
	$custom_footer_color = $data['ab_footer_background'];
	
	$portfolio_upload_bg = $data['ab_portfolio_bg_upload'];
	$portfolio_preset_bg = $data['ab_preset_portfolio_bg'];

	$use_custom_font = $data['ab_use_custom_font'];
	$custom_font = $data['ab_standard_font'];
	$use_custom_tagline_font = $data['ab_use_custom_tagline_font'];
	$tagline_font = $data['ab_tagline_font'];

	$show_showcase_nav = $data['ab_show_showcase_nav'];
	$show_showcase_controls = $data['ab_show_showcase_controls'];

	$custom_css = $data['ab_custom_css'];

?>
/* Standard Styles
================================================== */

::selection {
	background: <?php echo $keyline_color; ?>;
	color: #fff;
}
::-moz-selection {
	background: <?php echo $keyline_color; ?>;
	color: #fff;
}
body {
	background-color: <?php echo $body_color; ?>;
	color: #444;
}
a, a:visited {
	color: #7278B1;
}

a:hover {
    color: #7C8E4A
    }
h1 {
	color: #222;
}
h2, h3, h4, h5, h6 {
	color: #181818;
}
nav .menu ul {
	background-color: <?php echo $header_color; ?>;
	border-color: <?php echo $border_color; ?>;
}
nav .menu ul li {
	border-bottom-color: <?php echo $border_color; ?>
}
nav ul.menu ul li.menu-item a {
	color: #222;
}
nav ul.menu ul li.menu-item a:hover {
	color: <?php echo $keyline_color; ?>;
}
.section-heading h1, .section-heading span.section-desc {
	text-shadow: 1px 1px 1px #fff;
}
.menu li.current a, #tagline span, .feature a.link, #tagline a, .pagenavi span.current, a:hover, #sidebar section.widget a:hover, section.widget a:hover, section.twitter-widget .twitter-date a:hover, .skills a:hover {
	color: <?php echo $keyline_color; ?>;
}
#homepage-widgets {
	background: transparent url(../../images/divider-line.png) no-repeat center top;
}
#home-slider .flex-control-nav {
   background-color: <?php echo $border_color; ?>;
   border-bottom-color: #ccc;
}
#home-slider .flex-control-nav a:hover, #home-slider .flex-control-nav a.active {
	background-color: <?php echo $keyline_color; ?>;
}
#tagline p {
	text-shadow: 1px 1px 3px #DDD;
}
.feature h3 {
	color: #666;
}
.feature a.link:hover, #tagline a:hover {
	color: #222;
}
#homepage-widgets .feature {
	background-color: <?php echo $box_color; ?>;
}
.top-left-corner {
	border-color: #222 transparent transparent #222;
}
.bottom-right-corner {
	border-color: transparent #222 #222 transparent;
}
.filter-wrap {
	background: transparent url(../../images/scanlines-sidebar.png) repeat top left;
}
#portfolio-filter {
	border-color: <?php echo $border_color; ?>;
}
#portfolio-filter li a, .blog-navigation a, .single-navigation a {
	background-color: <?php echo $body_color; ?>;
}
#portfolio-filter li a:hover {
	background-color: <?php echo $keyline_color; ?>;
	color: #fff;
}
#portfolio-filter li.selected a {
	background-color: <?php echo $keyline_color; ?>;
	color: #fff;
}
#header-section {
	background: <?php echo $header_color; ?> url(../../images/nav-bckground.gif) repeat scroll left top;
	border-bottom-color: #dfdfdf;
	border-top-color: <?php echo $keyline_color; ?>;
}
.section-heading h1 {
	border-color: <?php echo $keyline_color; ?>;
}
.sub-heading, nav.section-nav {
	border-color: <?php echo $border_color; ?>;
}
.section-heading span.section-desc, nav.section-nav a {
	color: #888;
}
.divider, .portfolio-detail-description .portfolio-heading {
	background: transparent url(../../images/divider-line.png) no-repeat center center;
}
.divider .back-to-top {
	background-color: <?php echo $body_color; ?>;
}
figure.portfolio-display {
	background-color: #222;
}
figure.portfolio-display a.image-post, article.type-portfolio .flexslider, article.type-portfolio .audio-player, article.type-portfolio .video-player {
	border-color: <?php echo $box_color; ?>;
	background-color: #222;
}
.portfolio-detail-description, .portfolio-detail-description h2, .portfolio-detail-description .skills {
	background-color: <?php echo $body_color; ?>;
}
.portfolio-detail-description .skills-wrap {
	color: #222;
	background: transparent url(../../images/scanlines-sidebar.png) repeat top left;
}
li.item p.date, .feature a.link, .detail-info ul li, .portfolio-detail-description .meta {
	border-color: #f4f4f4;
}
aside#sidebar, article.type-page {
	border-color: <?php echo $border_color; ?>;
}
.controls a, .view-all a {
	background-color: <?php echo $box_color; ?>;
	color: #222;
}
.controls a:hover, .view-all a:hover {
	background-color: #222;
	color: <?php echo $box_color; ?>;
}
.controls a, .view-all a, .small-loading {
	border-color: #efefef;
}
#footer, #footer section.widget h4 {
	background-color: <?php echo $footer_color; ?>;
}
#footer {
	border-top-color: <?php echo $keyline_color; ?>;
}
#copyright p {
	color: #fff;
}
#footer .divide {
	background-color: #292929;
}
section.widget a, section.widget a:visited {
	color: #f7f7f7;
	text-decoration: none;
}
section.widget p, #copyright p, .twitter-widget .twitter-link, section.widget h4 {
	color: #fff;
}
#sidebar section.widget a, #sidebar section.widget a:visited, #sidebar section.widget p, #sidebar .twitter-widget .twitter-link {
	color: #444;
}
#sidebar section.widget a:hover {
	color: <?php echo $keyline_color; ?>;
}
section.twitter-widget .twitter-text {
	background-color: #fff;
	color: #222;
}
section.twitter-widget .twitter-text a {
	color: #000;
}
section.twitter-widget .twitter-link a, #copyright a {
	color: <?php echo $keyline_color; ?>;
}
section.flickr-widget a.flickr-img-link:hover {
	border-color: <?php echo $keyline_color; ?>;
}
article.type-portfolio .audio-player {
	background-color: <?php echo $border_color; ?>;
}
section.widget h4 {
	background-color: <?php echo $body_color; ?>;
}
aside#sidebar h4 {
	color: #222;
}
.detail-info ul li p, .detail-info ul li a, .detail-info ul li span, .meta span, .blog-items .meta div, .meta span a, .skills, .skills a {
	color: #888;
}
.detail-info ul li a:hover, .meta span a:hover, .skills a:hover {
	color: <?php echo $keyline_color; ?>;;
}
#comments-list li .comment-content {
	background-color: <?php echo $box_color; ?>;
}
#comments-list li .comment-content {
	border-color: <?php echo $border_color; ?>;
}
.single-navigation {
	border-color: <?php echo $border_color; ?>; 
}
.blog-items li .blog-excerpt.quote, article.type-post .body-content.quote, blockquote {
	border-left-color: <?php echo $keyline_color; ?>;
}
.blog-items .meta span {
	color: #666;
}
.blog-items li.blog-item {
	border-color: <?php echo $border_color; ?>;
}
.horizontal-break {
	background-color: <?php echo $border_color; ?>;
}
span.highlighted {
	background-color: <?php echo $keyline_color; ?>;
}
.love a:hover {
	color: #333;
}
span.dropcap {
	background-color: <?php echo $keyline_color; ?>;
	color: #fff;
}

/* Custom Styles
================================================== */

<?php if ($custom_keyline_color) { ?>
::selection {background: <?php echo $custom_keyline_color; ?>!important;}
::-moz-selection {background: <?php echo $custom_keyline_color; ?>!important;}
#header-section {border-top-color: <?php echo $custom_keyline_color; ?>!important;}
.feature .heading, .feature .image, .section-heading h1 {border-bottom-color: <?php echo $custom_keyline_color; ?>!important;}
li.item:hover a.view-item, span.highlighted, span.dropcap, #portfolio-filter li.selected a, #portfolio-filter li a:hover, #home-slider .flex-control-nav a:hover, #home-slider .flex-control-nav a.active {background-color: <?php echo $custom_keyline_color; ?>!important;}
.menu li.current a, #tagline span, .feature a.link, #tagline a, .pagenavi span.current, a:hover, section.twitter-widget .twitter-link a, #copyright a, #sidebar section.widget a:hover, section.widget a:hover, section.twitter-widget .twitter-date a:hover {color: <?php echo $custom_keyline_color; ?>!important;}
#footer {border-top-color: <?php echo $custom_keyline_color; ?>!important;}
section.flickr-widget a.flickr-img-link:hover {border-color: <?php echo $custom_keyline_color; ?>!important;}
.blog-items li .blog-excerpt.quote, article.type-post .body-content.quote, blockquote {border-left-color: <?php echo $custom_keyline_color; ?>!important;}
<?php } ?>
<?php if ($custom_header_color) { ?>#header-section {background-color: <?php echo $custom_header_color; ?>!important;}<?php } ?>
<?php if ($custom_footer_color) { ?>#footer, #footer section.widget h4 {background-color: <?php echo $custom_footer_color; ?>!important;}<?php } ?>
<?php if ($portfolio_preset_bg && !$portfolio_upload_bg) { ?>.single article.type-portfolio, .portfolio-ajax-drawer {background: #fff url(<?php echo $portfolio_preset_bg; ?>) repeat center top;}<?php } ?>
<?php if ($portfolio_upload_bg) { ?>.single article.type-portfolio, .portfolio-ajax-drawer {background: #fff url(<?php echo $portfolio_upload_bg; ?>) repeat center top;}<?php } ?>
<?php if (!$portfolio_preset_bg && !$portfolio_upload_bg) { ?>.single article.type-portfolio, .portfolio-ajax-drawer {background: #fff url(../../images/portfolio_bg/wood.jpg) repeat center top;}<?php } ?>
<?php if ($use_custom_font) { ?>body, h1, h2, h3, h4, h5, h6 {font-family: '<?php echo $custom_font; ?>', sans-serif!important;}<?php } ?>
<?php if ($use_custom_tagline_font) { ?>#tagline {font-family: '<?php echo $tagline_font; ?>', sans-serif!important;}<?php } ?>
<?php if (!$show_showcase_nav) { ?>#home-slider .flex-direction-nav {display: none!important;}<?php } ?>
<?php if (!$show_showcase_controls) { ?>#home-slider .flex-control-nav {display: none;} #home-slider {margin-bottom: 0!important;}<?php } ?>

/* User Specific Styles
================================================== */
<?php if ($custom_css) { ?><?php echo $custom_css; ?><?php } ?>