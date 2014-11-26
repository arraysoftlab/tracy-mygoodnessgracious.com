<!DOCTYPE html>
<!-- OPEN html -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<!-- Ability - A Responsive One Page AJAX Wordpress Theme designed and coded by Ed Cousins | www.swiftpsd.com / www.edcousins.com -->

	<!-- OPEN head -->
	<head>
		<title>My Goodness Gracious | Macrobiotic, Plant Based, and Vegan Recipes for body, mind and spirit</title>
		<?php global $data; ?>
		
		<!-- Site Meta -->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		
		

		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
		
		<!-- Pingback & Favicon -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php $favicon = $data['ab_custom_favicon'];?>
		<?php if ($favicon) { ?>
		<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
		<?php } ?>
		<link rel="icon" type="image/ico" href="/favicon.ico">
		
		<!-- LOAD Stylesheets -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/base.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/skeleton.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/flexslider.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/prettyPhoto.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/js/jplayer/skin/swiftpsd/jplayer.swiftpsd.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/layout.css" />
		

		<?php $skin = $data['ab_skin_select']; ?>
		<?php if ($skin) { ?>
 			<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/skins/<?php echo $skin; ?>.php" />
 		<?php } else { ?>
 		 	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/skins/light.php" />
 		<?php } ?>

	    <!-- Legacy HTML5 Support -->
	    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/asl.base.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/asl.layout.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory'); ?>/css/asl.drawer.css" />
		<link rel="stylesheet" type="text/css" media="print" href="<?php echo get_bloginfo('template_directory'); ?>/css/asl.print.css" />
        
        
		<!-- WordPress Hook -->
		<?php wp_head(); ?>
        
<!-- Sharethis -->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "566f12da-e935-4a6a-9451-94a232c19aff"});</script>
<!--End Share this -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17383268-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
	//Category Icon setter
  	jQuery(function(){

  		//use category class with its anchor and icon name
  		var catIconMap = {
  			'.cat-item-8>a'		:	'quotes.png',
			'.cat-item-9>a'		:	'recipes.png',
			'.cat-item-10>a'	:	'wellness.png',
			'.cat-item-16>a'	:	'inspiration.png',
			'.cat-item-19>a'	:	'affirmations.png'
  		}

  		jQuery.fn.initCatIconMap(catIconMap);
		
  	});


  	jQuery.fn.initCatIconMap = function(map){
		for(cat in map){
			jQuery.fn.setCategoryIcon(cat, map[cat]);
		}
  	}
  	
  	jQuery.fn.setCategoryIcon = function(targetDom, innerImgName){
  		var templateDir = "<?php echo get_bloginfo('template_directory'); ?>";
  		var text = jQuery(targetDom).text();
  	  	var newHTML = jQuery(targetDom).text().replace(text,'<img src="'+templateDir+'/images/'+innerImgName+'" style="margin-left:-60px;" />');
  	  	jQuery(targetDom).html(newHTML);
  	}

</script>

    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/asl.drawer.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/asl.tooltip.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/asl.input-field-resizer.js"></script>
	<!-- CLOSE head -->
	</head>
		
	<!-- OPEN Body -->
	<body <?php body_class(); ?>>

	<noscript>
		<div class="no-js-alert">
			<?php echo do_shortcode(stripslashes($data['ab_no_js_message'])); ?>
		</div>
	</noscript>

		<div id="header-section">

			<div class="container">

				<header class="sixteen columns">
					
					<div id="logo" class="seven columns alpha">
						<a href="<?php bloginfo('url'); ?>">
							<?php $logo = $data['ab_logo_upload'];?>
							<?php if ($logo) { ?>
							<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
							<?php } else { ?>
							<img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo-light.png" alt="<?php bloginfo( 'name' ); ?>" />
							<?php } ?>
						</a>
					</div>

					<div class="nav-wrap nine columns omega">
					
						<!-- Menu for Top Social Links -->
						<?php echo do_shortcode("[top_social]"); ?>
	
						<!-- OPEN #main-navigation -->
						
		
						<!-- OPEN #mobile-navigation -->
						<nav id="mobile-navigation">
							<span class="selected-option"><?php _e("- Menu -", "swiftframework"); ?></span>
							<?php
								dropdown_menu( array(
	
									'theme_location' => 'Main_Navigation',
	
								    // You can alter the blanking text eg. "- Navigate -" using the following
								    'dropdown_title' => '-- Menu --',
	
								    // indent_string is a string that gets output before the title of a
								    // sub-menu item. It is repeated twice for sub-sub-menu items and so on
								    'indent_string' => '- ',
	
								    // indent_after is an optional string to output after the indent_string
								    // if the item is a sub-menu item
								    'indent_after' => ''
	
								) );
							?>
						<!-- CLOSE #mobile-navigation -->
						</nav>
					
					</div>

					<div class="site-loading loading"></div>
				
				</header>

			</div>
		</div>


				
		<div id="drawer-wrap">
			<div id="drawer" >
				<div id="drawer-content">
					<div style="background:#6e75b6;padding:10px" class="newsletter">
	                    <div style="border:1px #fff solid; padding:10px">
	                    <h2 style="color:#fff">Goodness Gracious Newsletter</h2>
	                    <p>A daily publication delivered directly to your inbox offering healthy recipes & wellness tips.</p>
	                    <!-- Begin MailChimp Signup Form -->
	                    <link type="text/css" rel="stylesheet" href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css">
	                    <div id="mc_embed_signup">
		                    <form novalidate target="_blank" class="validate" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form" method="post" action="http://mygoodnessgracious.us1.list-manage.com/subscribe/post?u=07897d6b39a131bd870f10240&amp;id=08ab8e8ecb">
		                    	<input type="email" style="width:90%" required placeholder="your email address" id="mce-EMAIL" class="email" name="EMAIL" value="">
		                    	<input type="submit" class="button" id="mc-embedded-subscribe" name="subscribe" value="Subscribe">
		                    </form>
	                    </div>
	                    
	                    <!--End mc_embed_signup-->
	                    
	                    </div>
                    </div>
				</div>
				<div id="hook">
					<a id="down">Subscribe</a>
					<a id="up">Close</a>
				</div>
			</div>
		</div>

		<!-- OPEN #main-container -->
		<div id="main-container">

			<!-- OPEN #content -->
			<div id="content">