//tooltip
jQuery(document).ready(function(){

    jQuery(".menu a").append("<span class='arrow'></span><em></em>");
	
	jQuery(".menu a").hover(function() {
		if(jQuery(this).attr("hover_text").length>0){
			jQuery(this).find("em").animate({opacity: "show", top: "35"}, "slow");
			var hoverText = jQuery(this).attr("hover_text");
			jQuery(this).find("em").html(hoverText);
			jQuery(this).find(".arrow").animate({opacity: "show", top: "15"}, "slow");
		}
	}, function() {
		jQuery(this).find("em").animate({opacity: "hide", top: "45"}, "fast");
		jQuery(this).find(".arrow").animate({opacity: "hide", top: "25"}, "fast");
	});

});