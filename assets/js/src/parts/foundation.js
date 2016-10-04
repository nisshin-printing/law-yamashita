let foundation = require('../vendor/foundation.js');
require('../vendor/jquery.sticky');
(function($) {
	'use strict';
	let adminBar = document.getElementById('wpadminbar') ? $('#wpadminbar').height() : 0,
		mainNav = document.getElementById('sticky-topbar') ? $('#sticky-topbar').height() : 0,
		headerHeight = parseInt(adminBar) + parseInt(mainNav);
	
	// Change default settings.
	Foundation.Accordion.defaults.allowAllClosed = true;
	Foundation.Sticky.defaults.marginTop = headerHeight / 16;
	// Init
	$(document).foundation();
	
	// Sticky Navigation.
	$('#sticky-topbar').sticky({
		topSpacing: adminBar
	});
})(jQuery);