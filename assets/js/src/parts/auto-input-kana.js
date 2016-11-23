! function($) {
	'use strict';
	if (document.getElementById('user-name')) {
		import '../vendor/jquery.autoKana';
		$.fn.autoKana('#user-name', '#user-name-kana', {
			katakana: true
		});
	}
	
	// Yubinbango
	if ($('.wpcf7-form') && document.getElementById('zip')) {
		require('../vendor/yubinbango');
		$('.wpcf7-form').addClass('h-adr').append('<input type="hidden" class="p-country-name" value="Japan">');
		$('#zip').addClass('p-postal-code');
		$('#addr').toggleClass('p-region p-locality p-street-address p-extended-address');
	}
}(jQuery);