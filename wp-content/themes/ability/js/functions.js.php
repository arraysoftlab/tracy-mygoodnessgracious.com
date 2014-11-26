<?php
	
	header('Content-Type: text/javascript; charset=UTF-8');
    
    global $data;
    require_once('../../../../wp-load.php');

    $dynamic_header = $data['ab_enable_dynamic_header'];

    $about_page = $data['ab_about_page'];
    $about_page_title = get_page_by_path( $about_page );
    $about_page_id = $about_page_title->ID;

    $cpone_page = $data['ab_custom_page_one'];
    $cpone_page_title = get_page_by_path( $cpone_page );
    $cpone_page_id = $cpone_page_title->ID;

    $cptwo_page = $data['ab_custom_page_two'];
    $cptwo_page_title = get_page_by_path( $cptwo_page );
    $cptwo_page_id = $cptwo_page_title->ID;

    $cpthree_page = $data['ab_custom_page_three'];
    $cpthree_page_title = get_page_by_path( $cpthree_page );
    $cpthree_page_id = $cpthree_page_title->ID;

    $use_custom_font = $data['ab_use_custom_font'];
    $custom_font = $data['ab_standard_font'];
    $use_custom_tagline_font = $data['ab_use_custom_tagline_font'];
    $tagline_font = $data['ab_tagline_font'];

    $portfolio_upload_bg = $data['ab_portfolio_bg_upload'];
    $portfolio_preset_bg = $data['ab_preset_portfolio_bg'];

?>
/* ==================================================

Custom jQuery functions.

================================================== */

/////////////////////////////////////////////
// NO CONFLICT
/////////////////////////////////////////////

var $j = jQuery.noConflict();

var onLoad = {
    init: function(){
        var deviceAgent = navigator.userAgent.toLowerCase();
        var agentID = deviceAgent.match(/(iphone|ipad|ipod|android)/);
        if (!agentID) {
            header.init();
        }
        nav.init();
        portfolioAjax.init();
        onePageAjax.init();
        slider.init();
        portfolioSorting.init();
        prettyPhoto.init();
        contactForm.init();
        reloadFunctions.init();
        baseFunctions.init();
    }
};


/////////////////////////////////////////////
// HEADER
/////////////////////////////////////////////

var header = {
init: function () {
        var $header = $j('#header-section'),
            $logo = $j('#logo').find('img'),
            $nav = $j('#main-navigation'),
            $window = $j(window),
            $headerIsDynamic = true;
            <?php if ($dynamic_header) { ?>
                $headerIsDynamic = true;
            <?php } else { ?>
                $headerIsDynamic = false;
            <?php } ?>
            if ($headerIsDynamic) {
                $window.scroll(function () {
                    if ($window.scrollTop() > 70 && $window.width() > 959) {
                        header.animate($header, $logo, $nav);
                    } else {
                        setTimeout(function () {
                            if ($window.scrollTop() < 70) {
                                header.reset($header, $logo, $nav);
                            }
                        }, 700);
                    }
                });
            }
        },
        animate: function ($header, $logo, $nav) {
            $header.filter(':not(:animated)').animate({
                    "height": 53,
                    "borderTopWidth": 5
            });
            $logo.filter(':not(:animated)').animate({
                "height": 58
            });
            $nav.filter(':not(:animated)').animate({
                "marginTop": 16,
                "marginBottom": 16
            });
        },
        reset: function ($header, $logo, $nav) {
            $header.filter(':not(:animated)').animate({
                "height": 95,
                "borderTopWidth": 10
            });
            $logo.filter(':not(:animated)').animate({
                "height": 100
            });
            $nav.filter(':not(:animated)').animate({
                "marginTop": 38,
                "marginBottom": 38
        });
    }
};


/////////////////////////////////////////////
// NAVIGATION
/////////////////////////////////////////////

var nav = {
    init: function(){

        // Main Nav
      
        var $body = $j('body'), $current_page = $j('.current-menu-item'), $header = $j('#header-section'), $logo = $j('#logo').find('img'), $nav = $j('#main-navigation').find('ul.menu'), $window = $j(window);
        var $offset = 0, $standard_offset = 0, $home_offset = -145; $headerIsDynamic = true;
        
        <?php if ($dynamic_header) { ?>
            $headerIsDynamic = true;
        <?php } else { ?>
            $headerIsDynamic = false;
        <?php } ?>
        
        if ($window.width() < 1024) {
            $standard_offset = -15;
        } else if (!$headerIsDynamic) {
            $standard_offset = -50;
            $j('.section').css('padding-top', '50px');
            $j('.section:first-child').css('padding-top', '0');   
        } else {
            $standard_offset = -45;
        }
        $current_page.addClass('current');
        
        if ($body.hasClass('home')) {

            var $nav_link_parent = $j('.menu').find('li');
            $nav_link_parent.on('click', 'a', function(e) {

                var $nav_link_title = $j(this).attr('title');

                if ($nav_link_title) {
                    e.preventDefault();
                }

                if ($j(this).parent().is(':first-child')) {
                    $offset = $home_offset;       
                } else {
                    $offset = $standard_offset;
                }

                $j.smoothScroll({
                    scrollTarget: '#' + $nav_link_title,
                    offset: $offset,
                    easing: 'easeInOutExpo',
                    speed: 700
                });

                var $current = $j(this);
                $nav_link_parent.removeClass('current');
                $current.parent().addClass('current');
            });
        }

        // Mobile Nav
        var $mobile_select = $j('.dropdown-menu');
		
		$j('.selected-option').html($mobile_select.find('option:selected').text());
		
        if ($body.hasClass('home')) {

            $mobile_select.change(function(e) {
                e.preventDefault();

                var $mob_nav_selected = '#' + $j('.dropdown-menu option:selected').attr('class');
				
				if ($mob_nav_selected == '#') {
				
					window.location = $j(this).find("option:selected").val();
				
				} else {
				
	                var $offset = -20;
	
	                $j.smoothScroll({
	                    scrollTarget: $mob_nav_selected,
	                    offset: $offset,
	                    easing: 'easeInOutExpo',
	                    speed: 700
	                });
	                
	                $j('.selected-option').html($mobile_select.find('option:selected').text());
                }
            });
        
        } else {

            $mobile_select.change(function() {
                window.location = $j(this).find("option:selected").val();
            });

        }
    }   
};

// Change menu active when scroll through sections
$j(window).scroll(function () {
    var $inview = $j('#content > section:in-viewport:first').attr('id');
    var $menu_item = $j('.menu li a');
    var $link = $menu_item.filter('[title=' + $inview + ']');

    if ($link.length && !$link.is('.current')) {
        $menu_item.parent().removeClass('current');
        $link.parent().addClass('current');
    }
});

/////////////////////////////////////////////
// PORTFOLIO AJAX FUNCTIONS
/////////////////////////////////////////////

var portfolioAjax = {
    init: function(){
        var $portfolio_section = $j('#portfolio'), $portfolio_items = $j('.portfolio-items'), $cont = $j('.portfolio-ajax-drawer'), $loading_bay = $j('.loading-bay'), $controls = $j('.controls'), $loading = $j('#portfolio').find('.loading'), $small_loading = $j('#portfolio').find('.small-loading');
        var $current = null, $current_item = null, $currentPostID  = null, $nextPortfolioPost = null, $prevPortfolioPost = null, $prevPortfolioPostID = null, $nextPortfolioPostID = null;
        var $offset = -55, $window_width = $j(window).width();

        function itemChanged() {
            $current_item = $j($current).parent().parent();
            $current_item.addClass('current-item');
            $currentPostID = $j($current).attr('href');
            $nextPost = $j($current_item).closest('li.item').next('li.item').find('a.link');
            $prevPost = $j($current_item).closest('li.item').prev('li.item').find('a.link');
            $prevPostID = $j($prevPost).attr('href');
            $nextPostID = $j($nextPost).attr('href');
            $controls.find('#portfolio-prev').attr('href', $prevPostID);
            $controls.find('#portfolio-next').attr('href', $nextPostID);
            if(typeof $nextPostID  == 'string') {
                $j('a#portfolio-next').show();
            } else {
                $j('a#portfolio-next').hide();
            }
            if(typeof $prevPostID  == 'string') {
                $j('a#portfolio-prev').show();
            } else {
                $j('a#portfolio-prev').hide();
            }
        }

        function countItems() {
            var $count = $cont.children().length;
            if ($count > 1) {
                $cont.find('article:first-child').remove();
            }
        }

        function onAfter(curr, next, opts, fwd) {
            var index = opts.currSlide;

            //get the height of the current slide
            var $slide_height = $j(this).outerHeight(true);

            //set the container's height to that of the current slide
            $cont.animate({height: $slide_height});
            
            $cont.find('img.size-full').each(function() {
            	$j(this).css("height", "auto");
            });

            setTimeout(function() {
                $controls.css('display', 'inline-block');
                $small_loading.hide();
            }, 1000);
        }

        $portfolio_items.on('click','a.link',function(e){
            e.preventDefault();
            if ($current_item) {
                $current_item.removeClass('current-item');
            }

            $j.smoothScroll({
                scrollTarget: $portfolio_section,
                offset: $offset
            });

            // Set current item and next/prev controls
            $current = $j(this);
            itemChanged();
            
            if ($cont.is(":visible")) {
                countItems();
                $controls.hide();
                $small_loading.css('display', 'inline-block');
                $loading_bay.load($currentPostID + ' article.type-portfolio', function(response, status, xhr){
                    var $error = $j("#error");
                    if (status != 'error') {
                        $cont.append($loading_bay.find('article'));
                        $cont.cycle({
                            fx: "scrollUp",
                            delay: -4000,
                            autostop: 1,
                            after: onAfter
                        });
                        slider.init();
                        $cont.find('.body-text').fitVids();
                        prettyPhoto.init();
                        reloadFunctions.init();
                    } else {
                        $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            
            } else {

                $loading.slideDown(400);

                $cont.load($currentPostID + ' article.type-portfolio', function(response, status, xhr){
                    var $error = $j("#error");
                    if (status != 'error') {
                    	$cont.imagesLoaded(function() {
                       		$loading.hide();
                       		
	                        var $bg_image;
	
	                        <?php if ($portfolio_preset_bg) { ?>
	                            $bg_image = '<?php echo $portfolio_preset_bg; ?>';
	                        <?php } else if ($portfolio_upload_bg) { ?>
	                            $bg_image = '<?php echo $portfolio_upload_bg; ?>';
	                        <?php } else { ?> 
	                            $bg_image = '<?php echo get_bloginfo('template_directory'); ?>/images/portfolio_bg/wood.jpg';
	                        <?php } ?>
	
	                        $cont.css('background-image', 'url(' + $bg_image + ')');
	                        
	                        $cont.find('.body-text').fitVids();
	                        
	                        $cont.slideDown(600);
	                        
	                        reloadFunctions.init();
	                        
	                        //get the height of the current slide
	                        var $slide_height = $cont.find('article').outerHeight(true);
	
	                        //set the container's height to that of the current slide
	                        $cont.animate({height: $slide_height});
							
							$cont.find('img.size-full').each(function() {
								$j(this).css("height", "auto");
							});
                       		
                       		$controls.css('display', 'inline-block');
                       		slider.init();
                       		prettyPhoto.init();
                       		
                       	});       						
                 
                    } else {
                        $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });

            }

         });
        
        
        $controls.on('click', 'a#portfolio-close',function(e) {
            e.preventDefault();
            portfolioAjax.removeVideo();
            $cont.slideUp(600);
            $controls.hide();
            $current_item.removeClass('current-item');
            $j.smoothScroll({
                scrollTarget:$portfolio_section,
                offset: $offset
            });
        });

        $controls.on('click', 'a#portfolio-prev',function(e) {
            e.preventDefault();
            portfolioAjax.removeVideo();
            $current_item.removeClass('current-item');
            $j.smoothScroll({
                scrollTarget: $portfolio_section,
                offset: $offset
            });
            countItems();
            $controls.hide();
            $small_loading.css('display', 'inline-block');
            $loading_bay.load($prevPostID + ' article.type-portfolio', function(response, status, xhr){
                var $error = $j("#error");
                if (status != 'error') {
                    $cont.append($loading_bay.find('article'));
                    $cont.cycle({
                        fx: "scrollRight",
                        delay: -4000,
                        autostop: 1,
                        after: onAfter
                    });
                    slider.init();
                    $cont.find('.body-text').fitVids();                
                    prettyPhoto.init();
                    reloadFunctions.init();
                } else {
                    $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                }
                $current = $j($prevPost);
                itemChanged();
            });
        });

        $controls.on('click', 'a#portfolio-next',function(e) {
            e.preventDefault();
            portfolioAjax.removeVideo();
            $current_item.removeClass('current-item');
            $j.smoothScroll({
                scrollTarget: $portfolio_section,
                offset: $offset
            });
            countItems();
            $controls.hide();
            $small_loading.css('display', 'inline-block');
            $loading_bay.load($nextPostID + ' article.type-portfolio', function(response, status, xhr){
                var $error = $j("#error");
                if (status != 'error') {
                    $cont.append($loading_bay.find('article'));
                    $cont.cycle({
                        fx: "scrollLeft",
                        delay: -4000,
                        autostop: 1,
                        after: onAfter
                    });
                    slider.init();   
                    $cont.find('.body-text').fitVids();                 
                    prettyPhoto.init();
                    reloadFunctions.init();
                } else {
                    $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                }
                $current = $j($nextPost);
                itemChanged();
            });
        });

    },
    removeVideo: function() {
    	setTimeout(function() {
    		$cont.find('.video-player').remove();
    	}, 600);
    },
};



/////////////////////////////////////////////
// ONE PAGE AJAX FUNCTION
/////////////////////////////////////////////

var onePageAjax = {
    init: function(){

        <?php if ($about_page) { ?>

        var $about_section = $j('#about');
        var $about_cont = $j('#about .ajax-content');
        var $about_loading = $j('#about .loading');

        $about_loading.show();
        $about_cont.load('<?php echo get_permalink( $about_page_id ); ?>' + ' .ajax-load-content', function(response, status, xhr){
            var $error = $j("#error");
            if (status != 'error') {
                $about_loading.hide();
                $about_cont.fadeIn(600);
                reloadFunctions.init();
                prettyPhoto.init();
            } else {
                $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
            }
        });

        <?php } ?>

        <?php if($cpone_page) { ?>

                var $cpone_section = $j('#custom-page-one');
                var $cpone_cont = $j('#custom-page-one .ajax-content');
                var $cpone_loading = $j('#custom-page-one .loading');

                $cpone_loading.show();
                $cpone_cont.load('<?php echo get_permalink( $cpone_page_id ); ?>' + ' .ajax-load-content', function(response, status, xhr){
                    var $error = $j("#error");
                    if (status != 'error') {
                        $cpone_loading.hide();
                        $cpone_cont.fadeIn(600);
                        reloadFunctions.init();
                        prettyPhoto.init();
                    } else {
                        $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
                
        <?php } ?>

        <?php if($cptwo_page) { ?>

                var $cptwo_section = $j('#custom-page-two');
                var $cptwo_cont = $j('#custom-page-two .ajax-content');
                var $cptwo_loading = $j('#custom-page-two .loading');

                $cptwo_loading.show();
                $cptwo_cont.load('<?php echo get_permalink( $cptwo_page_id ); ?>' + ' .ajax-load-content', function(response, status, xhr){
                    var $error = $j("#error");
                    if (status != 'error') {
                        $cptwo_loading.hide();
                        $cptwo_cont.fadeIn(600);
                        reloadFunctions.init();
                        prettyPhoto.init();
                    } else {
                        $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
                
        <?php } ?>

        <?php if($cpthree_page) { ?>

                var $cpthree_section = $j('#custom-page-three');
                var $cpthree_cont = $j('#custom-page-three .ajax-content');
                var $cpthree_loading = $j('#custom-page-three .loading');

                $cpthree_loading.show();
                $cpthree_cont.load('<?php echo get_permalink( $cpthree_page_id ); ?>' + ' .ajax-load-content', function(response, status, xhr){
                    var $error = $j("#error");
                    if (status != 'error') {
                        $cpthree_loading.hide();
                        $cpthree_cont.fadeIn(600);
                        reloadFunctions.init();
                        prettyPhoto.init();
                    } else {
                        $error.html('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
                
        <?php } ?>

    }   
};


/////////////////////////////////////////////
// Flexslider
/////////////////////////////////////////////

var slider = {
    init: function() {
        $j('.flexslider').flexslider({
            animation: "fade",             //String: Select your animation type, "fade" or "slide"
            slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
            slideshow: true,                //Boolean: Animate slider automatically
            slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
            animationDuration: 400,         //Integer: Set the speed of animations, in milliseconds
            directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
            controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
            keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
            mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
            prevText: "Previous",           //String: Set the text for the "previous" directionNav item
            nextText: "Next",               //String: Set the text for the "next" directionNav item
            pausePlay: false,               //Boolean: Create pause/play dynamic element
            pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
            playText: 'Play',               //String: Set the text for the "play" pausePlay item
            randomize: false,               //Boolean: Randomize slide order
            slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
            animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
            pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
            pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
            controlsContainer: "",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.
            manualControls: "",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
            start: function(slider){
                $j(slider).css('background-image', 'none');
            },                              //Callback: function(slider) - Fires when the slider loads the first slide
            before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
            after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
            end: function(){}               //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
        });
    }
}

/////////////////////////////////////////////
// Portfolio Sorting
/////////////////////////////////////////////

var portfolioSorting = {
    init: function() {

        (function($j) {
            $j.fn.sorted = function(customOptions) {
                var options = {
                  reversed: false,
                  by: function(a) { return a.text(); }
                };

                $j.extend(options, customOptions);

                $data = $j(this);
                arr = $data.get();

                return $j(arr);
        
            };

        })($j);

        $j(function() {

            var read_button = function(class_names) {
                
                var r = {
                    selected: false,
                    type: 0
                };
                
                for (var i=0; i < class_names.length; i++) {
                    
                    if (class_names[i].indexOf('selected-') == 0) {
                        r.selected = true;
                    }
                
                    if (class_names[i].indexOf('segment-') == 0) {
                        r.segment = class_names[i].split('-')[1];
                    }
                };
                
                return r;
                
            };
        
            var sort = function($buttons) {
                var $selected = $buttons.parent().filter('[class*="selected"]');
                return $selected.find('a').attr('data-value');
            };

            // get the first collection
            var $portfolio_items = $j('.portfolio-items');

            // clone applications to get a second collection
            var $data = $portfolio_items.clone();

            var $filter_selection = $j('#portfolio-filter')

            $filter_selection.each(function(i) {

                var $selection = $j(this);
                var $buttons = $selection.find('a');

                $buttons.bind('click', function(e) {
            
                    var $button = $j(this);
                    var $button_container = $button.parent();
                    var button_properties = read_button($button_container.attr('class').split(' '));
                    var selected = button_properties.selected;

                    if (!selected) {

                        $buttons.parent().removeClass();
                        $button_container.addClass('selected');

                        var sorting = sort($filter_selection.eq(0).find('a'));

                        if (sorting == 'all') {
                            var $filtered_data = $data.find('li');
                        } else {
                            var $filtered_data = $data.find('li.' + sorting);
                        }

                        var $sorted_data = $filtered_data.sorted({
                            by: function(v) {
                                return $j(v).find('strong').text().toLowerCase();
                            }
                        });

                        $portfolio_items.quicksand($sorted_data, {
                          duration: 1000,
                          adjustHeight: 'dynamic',
                          easing: 'easeOutQuint'
                        }, function(){prettyPhoto.init();});
            
                    }
                
                    e.preventDefault();

                });

            });

        });        

    }
}


/////////////////////////////////////////////
// PrettyPhoto Functions
/////////////////////////////////////////////

var prettyPhoto = {
    init: function() {
		
		var deviceAgent = navigator.userAgent.toLowerCase();
		var agentID = deviceAgent.match(/(iphone|ipod|android)/);
		if (agentID) {
			$j("a[data-gal^='prettyPhoto']").on("click", function(e) {
				e.preventDefault();
			});
		} else {
	        $j("a[data-gal^='prettyPhoto']").prettyPhoto({
	            animation_speed: 'fast', /* fast/slow/normal */
	            slideshow: 5000, /* false OR interval time in ms */
	            autoplay_slideshow: false, /* true/false */
	            opacity: 0.80, /* Value between 0 and 1 */
	            show_title: true, /* true/false */
	            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
	            default_width: 500,
	            default_height: 344,
	            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
	            // theme: 'light_square', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
	            horizontal_padding: 20, /* The padding on each side of the picture */
	            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
	            wmode: 'opaque', /* Set the flash wmode attribute */
	            autoplay: true, /* Automatically start videos: True/False */
	            modal: false, /* If set to true, only the close button will close the window */
	            deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
	            overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
	            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
	            changepicturecallback: function(){}, /* Called everytime an item is shown/changed */
	            callback: function(){}, /* Called when prettyPhoto is closed */
	            ie6_fallback: true
	        });
        }
    }
}


/////////////////////////////////////////////
// Contact Form Functions
/////////////////////////////////////////////

var contactForm = {
    init: function() {

        $j('form#contactForm').submit(function() {
            
            $j('form#contactForm label.error').remove();
            $j('form#contactForm span.error').remove();
            var hasError = false;
            
            $j('.requiredField').each(function() {
                $this = $j(this);
                if($j.trim($this.val()) == '') {
                    $this.addClass('invalid');
                    hasError = true;
                } else if($this.hasClass('email-input')) {
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if(!emailReg.test($j.trim($this.val()))) {
                        $this.addClass('invalid');
                        hasError = true;
                    } else {
                        $this.removeClass('invalid');
                    }
                } else {
                    $this.removeClass('invalid');
                }
            });
            
            if(!hasError) {
                $j('form#contactForm li.buttons button').fadeOut('normal', function() {
                    $j(this).parent().append('<span class="form-loading"></span>');
                });
                var formInput = $j(this).serialize();
                $j.post($j(this).attr('action'),formInput, function(data){
                    $j('form#contactForm').slideUp("fast", function() {                
                        $j('p.thanks').fadeIn(1000);
                    });
                });
            }
            
            return false;
            
        });

    }
}


/////////////////////////////////////////////
// Reload Functions
/////////////////////////////////////////////

var reloadFunctions = {
    init:function() {

        // Remove title attributes from images to avoid showing on hover 
        $j('img[title]').each(function() {
            $j(this).removeAttr('title');
        });

        $j('.gallery-icon a[title]').each(function() {
            $j(this).removeAttr('title');
        });

        // Tabs Shortcode Function
        $j('.tabbed-asset').tabs();
        
        // Accordion Shortcode Function
        $j('.accordion').accordion({
            collapsible: true,
            autoHeight: false
        });

    }
}


/////////////////////////////////////////////
// Base Functions
/////////////////////////////////////////////

var baseFunctions = {
    init: function() {

        // Back to top scroll button
        $j('.back-to-top').click(function() {
            $j('body,html').animate({scrollTop:0},800);
        });

        // Site loading
        $j('.site-loading').fadeOut(200);
        $j('.nav-wrap').fadeIn(1000);

        // Remove last divider on homepage
        $j('.home').find('.divider:last').hide();
    }
}


$j(document).ready(onLoad.init);

<?php if (($use_custom_font) || ($use_custom_tagline_font)) { ?>

/////////////////////////////////////////////
// GOOGLE WEB FONT FUNCTION
/////////////////////////////////////////////

<?php if ($use_custom_font && $use_custom_tagline_font) { ?>

WebFontConfig = {
    google: { families: ['<?php echo $custom_font; ?>', '<?php echo $tagline_font; ?>'] }
};

<?php } else if ($use_custom_font) { ?>

WebFontConfig = {
    google: { families: [ '<?php echo $custom_font; ?>'] }
};

<?php } else if ($use_custom_tagline_font) { ?>

WebFontConfig = {
    google: { families: [ '<?php echo $tagline_font; ?>'] }
};

<?php } ?>

(function() {
    var webfontscript = document.createElement('script');
    webfontscript.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    webfontscript.type = 'text/javascript';
    webfontscript.async = 'true';
    var script = document.getElementsByTagName('script')[0];
    script.parentNode.insertBefore(webfontscript, script);
})();

<?php } ?>