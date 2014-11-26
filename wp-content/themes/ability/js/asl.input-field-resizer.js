//search field resizer
jQuery(function(){
    var searchFieldStatus = "close";
	jQuery("#search label").click(function(){
		if(searchFieldStatus == "close"){
			jQuery("#search-field").animate({"width": "+=100"}, 800);
			searchFieldStatus = "open";
		} else {
			jQuery("#search-field").animate({"width": "-=100"}, 800);
			searchFieldStatus = "close";
		}
	});

	jQuery("#search-field").focusout(function(){
		jQuery("#search-field").animate({"width": "-=100"}, 800);
		searchFieldStatus = "close";
	});
});