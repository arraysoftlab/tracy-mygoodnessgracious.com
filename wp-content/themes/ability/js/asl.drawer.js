//Subscriber drawer
jQuery(function(){
    var headerSecHeight = parseInt(jQuery('#header-section').css('height'));
    var drawerHeight = parseInt(jQuery("#drawer-content").css("height"));
    var hookHeight = parseInt(jQuery("#hook").css("height"));

    jQuery('#drawer-wrap').css('visibility', 'visible');
    jQuery("#drawer").css("top", -(drawerHeight+1));
       
    jQuery('#drawer-content').css('box-shadow', '0 0 0 #7278B1');
	jQuery("#up").css("display", "none");
    
    var drawerOpen = false;
    var blockBodyClick = true;
    
	jQuery("#down").click(function(){
	  jQuery("#drawer").animate({"top": "+="+drawerHeight}, 800);
	  jQuery("#down").css("display", "none");
	  jQuery("#up").css("display", "inline-block");
      jQuery('#drawer-content').css('box-shadow', '0 0 20px #7278B1');
      jQuery('#hook a').css('box-shadow', '0 0 20px #7278B1');
      drawerOpen = true;
      blockBodyClick = true;
	});
	 
	jQuery("#up").click(function(){
		jQuery("#drawer").animate({"top": "-="+drawerHeight}, 800, function(){
            jQuery('#drawer-content').css('box-shadow', '0 0 0 #7278B1');  	
		});
		jQuery("#up").css("display", "none");
		jQuery("#down").css("display", "inline-block");
        drawerOpen = false;
        blockBodyClick = true;
	});
    
    jQuery("body").click(function(e){
        var container = jQuery('#drawer-wrap');
        if(blockBodyClick){
            blockBodyClick = false;
        } else if(!blockBodyClick && drawerOpen) {
            if(container.has(e.target).length === 0){
                jQuery("#drawer").animate({"top": "-="+drawerHeight}, 800, function(){
                    jQuery('#drawer-content').css('box-shadow', '0 0 0 #7278B1');      
            	});
        		jQuery("#up").css("display", "none");
        		jQuery("#down").css("display", "inline-block");
                drawerOpen = false;
                blockBodyClick = true;
            }
        }
	});
});