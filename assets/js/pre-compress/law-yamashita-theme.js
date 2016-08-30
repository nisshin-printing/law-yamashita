jQuery(document).ready(function($) {
	var adminBar = ( document.getElementById('wpadminbar') != null ) ? $('#wpadminbar').height() : 0,
	mainNav = ( document.getElementById('sticky-topbar') != null ) ? $('#sticky-topbar').height() : 0,
	headerHeight = parseInt(adminBar) + parseInt(mainNav);
// ============================== Foundation 6 ============================================================================= //
	// Default Settings
	Foundation.Accordion.defaults.allowAllClosed = true;
	Foundation.Sticky.defaults.marginTop = headerHeight / 16;
	// Foundation Init
	$(document).foundation();
// ============================== Sticky Nav ============================================================================= //
$('#sticky-topbar').sticky({
	topSpacing: adminBar
});
// ============================== Slick Slider ============================================================================= //
$('#top-slides').slick({
	slide: '.slide-item',
	autoplay: true,
	fade: true,
	mobileFirst: false,
	appendArrows: $('#slides-btn'),
	prevArrow: '<button class="button btn-prev waves-effect"><i class="fa fa-angle-left"></i></button>',
	nextArrow: '<button class="button btn-next waves-effect"><i class="fa fa-angle-right"></i></button>'
});
$('#cta-member-carousel').slick({
	slide: '.slide-item',
	autoplay: true,
	arrows: false,
	lazyLoad: 'progressive',
	mobileFirst: false,
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
$('#js-clock').slick({
	slide: '.slide-item',
	autoplay: true,
	autoplaySpeed: 2000,
	fade: true,
	arrows: false,
	lazyLoad: 'progressive',
	mobileFirst: false,
	slidesToShow: 1,
});
if ( document.getElementById('js-clock') != null ) {
	$count = 0;
	$hour = $('#js-clock .hour-hand');
	$minute = $('#js-clock .minute-hand');
	$('#js-clock').on('afterChange', function(event, slick, currentSlide, nextSlide) {
			// 分針
			$minute.css({
				"-webkit-transform": "rotate(" + ( $count + 1 ) * 90 + "deg )",
				"-ms-transform": "rotate(" + ( $count + 1 ) * 90 + "deg )",
				"transform": "rotate(" + ( $count + 1 ) * 90 + "deg )"
			});
			// 時針
			if ( 0 == ( $count % 4 ) && 0 !== $count ) {
				$hour.css({
					"-webkit-transform": "rotate(" + ( $count / 4 + 1 ) * 30 + "deg)",
					"-ms-transform": "rotate(" + ( $count / 4 + 1 ) * 30 + "deg)",
					"transform": "rotate(" + ( $count / 4 + 1 ) * 30 + "deg)"
				});
			};
			$count++;
		});
};
// ============================== Isotope Grid Member ============================================================================= //
var $container = $('#grid-members').isotope({
	itemSelector: '.grid-item',
	masonry: {
		gutter: 10,
		columnWidth: 210,
		isFitWidth: true
	},
	animationOptions: {
		duration: 1000
	}
});
var filters = {};
$('.filter-group').on('change', function() {
	var filterGroup = $(this).attr('data-filter-group');
	filters[filterGroup] = this.value;
	var filterValue = concatValues(filters);
	$container.isotope({
		filter: filterValue
	});
});
function concatValues(obj) {
	var value = '';
	for (var prop in obj) {
		value += obj[prop];
	}
	return value;
}
// ============================== Page Top Effects ============================================================================= //
$(window).scroll(function() {
	var actionsBtn = $('#btn-fixed-actions');
	if ( $(this).scrollTop() > 200 ) {
		actionsBtn.fadeIn('slow');
	} else {
		actionsBtn.fadeOut('slow');
	}
})
$('[href^="#"]').on('click', function() {
	var href = $(this).attr('href'),
		target = $(href == '#' || href == '' ? 'html' : href);
		position = target.offset().top - headerHeight;
	$('html, body').animate({
			scrollTop: position
		}, 550, 'swing');
	return false;
});
// ============================== Highcharts ============================================================================= //
$('#chart-bar').highcharts({
	chart: {
		type: 'column'
	},
	title: {
		text: '相談・受任件数のグラフ（平成２３年から２７年末）'
	},
	xAxis: {
		categories: ['交通事故', '離婚・不倫慰謝料', '相続・遺言', '借金・過払い', '刑事事件', '企業法務', '会社の破産・整理']
	},
	yAxis: {
		title: {
			text: null
		},
		labels: {
			formatter: function() {
				return Highcharts.numberFormat(this.value, 0, '', ',') + '件';
			}
		}
	},
	tooltip: {
		formatter: function() {
			return '<b>' + this.x + '</b><br>' +
				this.series.name + '： <b>' + Highcharts.numberFormat(this.y, 0, '', ',') + '</b>件';
		}
	},
	series: [{
		name: '相談件数',
		data: [1578, 2289, 908, 4290, 0, 0, 72]
	}, {
		name: '受任件数',
		data: [701, 703, 276, 3927, 539, 80, 38]
	}]
});
// ============================== Scope Page Effects ============================================================================= //
	// 共通
	$('.rates-form .button').on('click', function(event) {
		event.preventDefault();
		var target = $(this).parents('.rates-form');
		target.velocity(
			'scroll', {
				duration: 1200,
				easing: 'easeOutQuart',
			});
		return false;
	});
	// 交渉・調停・裁判の着手金と報酬金
	$('.chakusyu').find('.num').on('change', function() {
		var inputNum  = $(this).val();
		if ( inputNum < 300 ) {
			resultNum01 = ( inputNum * 0.08 <= 20) ? 20 : inputNum * 0.08;
			resultNum02 = inputNum * 0.16;
		} else if ( 300 <= inputNum ) {
			resultNum01 = inputNum * 0.05 + 9;
			resultNum02 = inputNum * 0.1 + 18;
		} else {
			resultNum01 = '';
			resultNum02 = '';
		}
		if ( resultNum01 && resultNum02 ) {
			resultNum01 = parseInt( resultNum01 );
			resultNum02 = parseInt( resultNum02 );
		}
		$(this).parents('.chakusyu').find('.result01').val( resultNum01 );
		$(this).parents('.chakusyu').find('.result02').val( resultNum02 );
	});
	// 遺産分割協議書作成手数料
	$('.tesuryo').find('.num').on('change', function() {
		var inputNum  = $(this).val();
		if ( inputNum < 300 ) {
			resultNum = 10;
		} else if ( 300 <= inputNum ) {
			resultNum = inputNum * 0.01 + 7;
		} else {
			resultNum = '';
		}
		if ( resultNum ) {
			resultNum = parseInt( resultNum );
		}
		$(this).parents('.tesuryo').find('.result').val( resultNum );
	});
	// 遺言書作成手数料
	$('.igon').find('.type').on('change', function() {
		var inputType = $(this).val(),
		inputNum = $(this).parents('.igon').find('.num').val();
		if ( inputNum < 300 ) {
			resultNum = 20;
		} else if ( 300 <= inputNum ) {
			resultNum = inputNum * 0.01 + 17;
		} else {
			resultNum = '';
		}
		if ( resultNum ) {
			resultNum = parseInt( resultNum );
		}
		$(this).parents('.igon').find('.result').val( resultNum );
	});
	$('.igon').find('.num').on('change', function() {
		var inputType = $(this).parents('.igon').find('.type').val(),
		inputNum = $(this).val();
		if ( 0 == inputType ) {
			resultNum = '10～20';
		} else {
			if ( inputNum < 300 ) {
				resultNum = 20;
			} else if ( 300 <= inputNum ) {
				resultNum = inputNum * 0.01 + 17;
			} else {
				resultNum = '';
			}
			if ( resultNum ) {
				resultNum = parseInt( resultNum );
			}
		};
		$(this).parents('.igon').find('.result').val( resultNum );
	});
	// 遺言執行手数料
	$('.executor').find('.num').on('change', function() {
		var inputNum  = $(this).val();
		if ( inputNum < 300 ) {
			resultNum = 30;
		} else if ( 300 <= inputNum ) {
			resultNum = inputNum * 0.02 + 24;
		} else {
			resultNum = '';
		}
		if ( resultNum ) {
			resultNum = parseInt( resultNum );
		}
		$(this).parents('.executor').find('.result').val( resultNum );
	});
// ============================== Landing Page Effects ============================================================================= //
	// カウントアップ
	if ( $( '.js-countup') ) {
		ele   = $('.js-countup');
		start = ele.data('countup-start');
		end   = ele.data('countup-end');
		ele.appear(function() {
			$(this).countUp({
				start: start,
				last: end
			});
		});
	};
	// 郵便番号から住所自動入力
	if ($('#zip')[0]) {
		$('#zip').keyup(function(event) {
			AjaxZip3.zip2addr(this, '', 'addr', 'addr');
		});
	}
	// 名前のフリガナを自動入力
	if ($('#user-name, #user-name-kana')[0]) {
		$.fn.autoKana('#user-name', '#user-name-kana', {
			katakana: true
		});
	}
	// フォーム画面での離脱時アラート
	if ($('.wpcf7-form')[0]) {
		$('input, textarea, select').on('keyup change', function() {
			$(window).on('beforeunload', function() {
				return '他のページヘ移動すると入力データはすべて破棄されます。';
			});
		});
		$('a, input[type="submit"]').on('click', function(e) {
			$(window).off('beforeunload');
		});
		// 戻るボタンを押されたときに戻らずにModalを閉じる
		$('.js-select-modal').on('click', function() {
			location.hash = 'member-select';
		});
		window.onhashchange = backAndForward;
		function backAndForward() {
			if ( '' == location.hash ) {
				$('#select-member').foundation('close');
			};
		}
		// Inputをクリック時にReveal Modalを開く
		$('.js-select-member').on('click', function(event) {
			event.preventDefault();
			$('#select-member').foundation('open');
		});
		// 指名しないボタンを用意
		$('.close-select-members').on('click', function() {
			$('.js-select-member').val('指名しない');
			$('#select-member .focus').removeClass('focus');
			$('#select-member').foundation('close');
		});
		// メンバーを指名した場合の値の受け渡し
		$('#select-member .column').on('click', function() {
			var el = $(this),
			wrapper = el.parents('.select-member-wrapper'),
			area = $('.js-select-member');
			if ( ! el.hasClass('.focus') ) {
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
// ============================== Social Buttons ============================================================================= //
if ( $('[class^=count-]')[0] ) {
	var get_url = $('#social-buttons').data('permalink');
		// facebook
		$.ajax({
			url: 'https://graph.facebook.com/',
			dataType: 'jsonp',
			data: {
				id: get_url
			},
			success: function(res) {
				$('#countjs-facebook').text(res.shares || 0);
			},
			error: function() {
				$('#countjs-facebook').text('0');
			}
		});
		// hatena
		$.ajax({
			url: 'http://cdn.api.b.hatena.ne.jp/entry.count?url=' + get_url,
			dataType: 'jsonp',
			data: {
				id: get_url
			},
			success: function(res) {
				$('#countjs-hatena').text(res || 0);
			},
			error: function() {
				$('#countjs-hatena').text('0');
			}
		});
		// Twitter
		$.ajax({
			url: 'http://urlsapi.azurewebsites.net/count.json?url=' + get_url,
			dataType: 'jsonp',
			data: {
				id: get_url
			},
			success: function(res) {
				$('#countjs-twitter').text(count);
			},
			error: function() {
				$('#countjs-twitter').text('0');
			}
		});
		// Google Plus
		$.ajax({
			type: "get",
			dataType: "xml",
			url: "http://query.yahooapis.com/v1/public/yql",
			data: {
				q: "SELECT content FROM data.headers WHERE url='https://plusone.google.com/_/+1/fastbutton?hl=ja&url=" + get_url + "' and ua='#Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36'",
				format: "xml",
				env: "http://datatables.org/alltables.env"
			},
			success: function(data) {
				var content = $(data).find("content").text();
				var match = content.match(/window\.__SSR[\s*]=[\s*]{c:[\s*](\d+)/i);
					var count = (match != null) ? match[1] : 0;
					$('#countjs-googleplus').text(count);
				},
				error: function() {
					$('#countjs-googleplus').text('0');
				}
			});
		// Pocket
		$.ajax({
			type: "get",
			dataType: "xml",
			url: "http://query.yahooapis.com/v1/public/yql",
			data: {
				q: "SELECT content FROM data.headers WHERE url='https://widgets.getpocket.com/v1/button?label=pocket&count=vertical&v=1&url=" + get_url + "' and ua='#Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36'",
				format: "xml",
				env: "http://datatables.org/alltables.env"
			},
			success: function(data) {
				var content = $(data).find("content").text();
				var match = content.match(/<em id="cnt">(\d+)<\/em>/i);
				var count = (match != null) ? match[1] : 0;
				$('#countjs-pocket').text(count);
			},
			error: function() {
				$('#countjs-pocket').text('0');
			}
		});
	}
});

// ============================== Google Maps ============================================================================= //
function initialize() {
	var latlng1 = new google.maps.LatLng(34.399869, 132.4645053);
	var latlng2 = new google.maps.LatLng(34.3951325, 132.461194);
	var opts1 = {
		zoom: 17,
		center: latlng1,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};
	var opts2 = {
		zoom: 17,
		center: latlng2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};
	var map1 = new google.maps.Map(document.getElementById("section-map"), opts1);
	var map2 = new google.maps.Map(document.getElementById("bicycle-map"), opts2);
	var icon1 = new google.maps.MarkerImage("../wp-content/themes/law-yamashita/assets/img/map-logo.png",
		new google.maps.Size(64, 86),
		new google.maps.Point(0, 0));
	var markerOptions1 = {
		position: latlng1,
		map: map1,
		icon: icon1,
		title: "山下江法律事務所"
	};
	var iwopts2 = {
		position: latlng2,
		map: map2,
		content: '<a class="external-links no-ani" href="http://www.city.hiroshima.lg.jp/www/contents/1393215813133/index.html#kamiyatyou" title="市営基町駐輪場の詳細" target="_blank">市営の基町駐輪場（有料）</a>'
	};
	var marker1 = new google.maps.Marker(markerOptions1);
	var infoWindow = new google.maps.InfoWindow(iwopts2);
}