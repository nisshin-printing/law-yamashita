! function($) {
	'use strict';
	let href = window.location.href,
		regexp = new RegExp(dtdsh_vars.homeurl + '[cases|voice|client|advice]', 'g');
	if ( href.match(regexp) ) {
		require('../vendor/infinitescroll');
		$('#js-infinity-loads').infinitescroll({
			navSelector: '#js-infinity-nav',
			nextSelector: '#js-infinity-next',
			itemSelector: '.article-body article',
			loading: {
				finishedMsg: '',
				msgText: '',
				img: dtdsh_vars.homeurl + 'wp-content/themes/law-yamashita/assets/svg/icons.svg#loadings'
			},
			bufferPx: 1200
		});
	}
}(jQuery);