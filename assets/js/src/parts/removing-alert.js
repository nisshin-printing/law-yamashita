! function($) {
	'use strict';
	if (document.querySelector('.wpcf7-form')) {
		$('input, textarea, select').on('keyup change', () => {
			$(window).on('beforeunload', () => {
				return '他のページヘ移動すると入力データはすべて破棄されます。';
			});
		});
		$('a, input[type="submit"]').on('click', (e) => {
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
		$('.close-select-members').on('click', () => {
			$('.js-select-member').val('指名しない');
			$('#select-member .focus').removeClass('focus');
			$('#select-member').foundation('close');
		});
		// メンバーを指名した場合の値の受け渡し
		$('#select-member .column').on('click', () => {
			var el = $(this),
				wrapper = el.parents('.select-member-wrapper'),
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