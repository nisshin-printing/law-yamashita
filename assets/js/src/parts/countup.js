require('../vendor/countup');
require('../vendor/appear');
! function($) {
	let ele = $('.js-countup');
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