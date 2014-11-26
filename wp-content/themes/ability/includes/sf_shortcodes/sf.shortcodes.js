/* ==================================================

Swift Framework Shortcode Panel jQuery Function

================================================== */

/////////////////////////////////////////////
// jQuery Show/Hide Option Functions
/////////////////////////////////////////////

// jQuery No Conflict
var $j = jQuery.noConflict();

// Shortcodes Function
(function($j) {

$j(document).ready(function() {
  
	// Setup the array of shortcode options
	$j.shortcode_select = {
		'0' : $j([]),
		'shortcode-alerts' : $j('#shortcode-alerts'),
		'shortcode-buttons' : $j('#shortcode-buttons'),
		'shortcode-social' : $j('#shortcode-social'),
		'shortcode-typography' : $j('#shortcode-typography'),
		'shortcode-columns' : $j('#shortcode-columns'),
		'shortcode-person' : $j('#shortcode-person'),
		'shortcode-map' : $j('#shortcode-map'),
		'shortcode-client' : $j('#shortcode-client'),
		'shortcode-divider' : $j('#shortcode-divider'),
		'shortcode-accordion' : $j('#shortcode-accordion'),
		'shortcode-tabs' : $j('#shortcode-tabs')
	};

	// Hide each option section
	$j.each($j.shortcode_select, function() {
		this.css({ display: 'none' });
	});
	
	// Show the selected option section
	$j('#shortcode-select').change(function() {
		$j.each($j.shortcode_select, function() {
			this.css({ display: 'none' });
		});
		$j.shortcode_select[$j(this).val()].css({
			display: 'block'
		});
	});
  
});

})($j);


/////////////////////////////////////////////
// Embed Shortcode Function
/////////////////////////////////////////////