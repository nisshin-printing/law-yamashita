! function($) {
	// 共通
	let adminBar = document.getElementById('wpadminbar') ? $('#wpadminbar').height() : 0,
		mainNav = document.getElementById('sticky-topbar') ? $('#sticky-topbar').height() : 0,
		headerHeight = parseInt(adminBar) + parseInt(mainNav);
	$('.rates-form .button').on('click', function(event) {
		event.preventDefault();
		let target = $(this).parents('.rates-form'),
			position = target.offset().top - headerHeight;
		target.animate({
			scrollTop: position
		}, 550, 'ease');
		return false;
	});
	// 交渉・調停・裁判の着手金と報酬金
	$('.chakusyu').find('.num').on('change', function() {
		let inputNum  = $(this).val(),
			resultNum01,
			resultNum02;
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
		let inputNum  = $(this).val(),
			resultNum;
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
		let inputType = $(this).val(),
			resultNum,
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
		let inputType = $(this).parents('.igon').find('.type').val(),
			resultNum;
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
		let inputNum  = $(this).val(),
			resultNum;
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
}(jQuery);