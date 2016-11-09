! function($) {
	'use strict';
	
	$(document).ready(() => {
		let adminBar = $('#wpadminbar')[0] ? $('#wpadminbar').height() : 0,
			mainNav = $('#sticky-topbar')[0] ? $('#sticky-topbar').height() : 0,
			headerHeight = adminBar + mainNav;

		$(window).scroll(function() {
			let actionsBtn = $('#btn-fixed-actions');
			if (200 < $(this).scrollTop()) {
				actionsBtn.fadeIn('slow');
			} else {
				actionsBtn.fadeOut('slow');
			}
		});
		$('[href^="#"]').click(function() {
			let href = $(this).attr('href'),
				target = $(href === '#' || href === '' ? 'html' : href),
				position = target.offset().top - headerHeight;
			$('html, body').animate({
				scrollTop: position
			}, 550, 'swing');
			return false;
		});
	});
}(jQuery);