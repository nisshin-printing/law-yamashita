require('../vendor/slick');
! function($) {
	/*
	 * トップスライダー
	 */
	$('#top-slides').slick({
		slide: '.slide-item',
		autoplay: true,
		fade: true,
		mobileFirst: true,
		appendArrows: $('#slides-btn'),
		prevArrow: '<button class="button btn-prev waves-effect"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button class="button btn-next waves-effect"><i class="fa fa-angle-right"></i></button>',
		useCSS: true,
		useTransform: true
	});
	/*
	 * メンバーカルーセル
	 */
	$('#cta-member-carousel').slick({
		slide: '.slide-item',
		autoplay: true,
		arrows: false,
		lazyLoad: 'progressive',
		mobileFirst: true,
		slidesToShow: 3,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 750,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 500,
				settings: {
					slidesToShow: 2
				}
			}
		]
	});
	/*
	 * LPの時計
	 */
	$('#js-clock').slick({
		slide: '.slide-item',
		autoplay: true,
		autoplaySpeed: 2000,
		fade: true,
		arrows: false,
		lazyLoad: 'progressive',
		mobileFirst: true,
		slidesToShow: 1,
	});
	if (document.getElementById('js-clock') !== null) {
		let count = 0,
			hour = $('#js-clock .hour-hand'),
			minute = $('#js-clock .minute-hand');
		$('#js-clock').on('afterChange', () => {
			// 分針
			minute.css({
				"-webkit-transform": "rotate(" + (count + 1) * 90 + "deg)",
				"-ms-transform": "rotate(" + (count + 1) * 90 + "deg)",
				"transform": "rotate(" + (count + 1) * 90 + "deg)"
			});
			// 時針
			if (0 === (count % 4) && 0 !== count) {
				hour.css({
					"-webkit-transform": "rotate(" + (count / 4 + 1) * 90 + "deg)",
					"-ms-transform": "rotate(" + (count / 4 + 1) * 90 + "deg)",
					"transform": "rotate(" + (count / 4 + 1) * 90 + "deg)"
				});
			}
			count++;
		});
	}
}(jQuery);