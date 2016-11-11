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
	
	/*
	 * Removing Alert
	 */
	if (document.querySelector('.wpcf7-form')) {
		$('input, textarea, select').on('keyup change', () => {
			$(window).on('beforeunload', () => {
				return '他のページヘ移動すると入力データはすべて破棄されます。';
			});
		});
		$('a, input[type="submit"]').on('click', () => {
			$(window).off('beforeunload');
		});
		// 戻るボタンを押されたときに戻らずにModalを閉じる
		$('.js-select-modal').on('click', () => {
			location.hash = 'member-select';
		});
		window.onhashchange = backAndForward;
		function backAndForward() {
			if ('' == location.hash) {
				$('#select-member').foundation('close');
			};
		}
		// Inputをクリック時にReveal Modalを開く
		$('.js-select-member').on('click', (event) => {
			event.preventDefault();
			$('#select-member').foundation('open');
		});
		// 指名しないボタンを用意
		$('.close-select-members').on('click', (event) => {
			event.preventDefault();
			$('.js-select-member').val('指名しない');
			$('#select-member .focus').removeClass('focus');
			$('#select-member').foundation('close');
		});
		// メンバーを指名した場合の値の受け渡し
		$('#select-member .column').on('click', function() {
			var name,
				el = $(this),
				area = $('.js-select-member');
			if (!el.hasClass('.focus')) {
				el.parent('.row').children('.focus').removeClass('focus');
				el.addClass('focus');
				name = el.data('name');
			} else {
				el.removeClass('focus');
				name = '指名しない';
			}
			area.val(name);
			el.parents('#select-member').delay(300).foundation('close');
		});
	}
}(jQuery);