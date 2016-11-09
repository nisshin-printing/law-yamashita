! function($) {
	let ele = $('.js-countup');
	require('../vendor/countup');
	require('../vendor/appear');
	if (!ele[0]) {
		ele.each(function(i, _this) {
			let start = _this.data('countup-start'),
				end   = _this.data('countup-end');
			_this.appear(() => {
				_this.countUp({
					start: start,
					last: end
				});
			});
		});
	}
}(jQuery);