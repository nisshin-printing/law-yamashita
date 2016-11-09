let foundation = require('../vendor/foundation.js');
require('../vendor/jquery.sticky.js');
! function($) {
	$(document).ready(function() {
		'use strict';

		let adminBar = $('#wpadminbar')[0] ? $('#wpadminbar').height() : 0,
			mainNav = $('#sticky-topbar')[0] ? $('#sticky-topbar').height() : 0,
			headerHeight = adminBar + mainNav;

		// Change default settings.
		Foundation.Accordion.defaults.allowAllClosed = true;
		Foundation.Sticky.defaults.marginTop = headerHeight / 16 + 1;
		Foundation.Sticky.defaults.stickyOn = 'large';
		Foundation.Sticky.defaults.anchor = 'content-wrapper';
		Foundation.Sticky.defaults.topAnchor = 'content-wrapper';
		Foundation.Sticky.defaults.btmAnchor = 'content-wrapper';
		
		$(document).foundation();

		// Sticky Navigation.
		$('#sticky-topbar').sticky({
			topSpacing: adminBar
		});
	});
}(jQuery);