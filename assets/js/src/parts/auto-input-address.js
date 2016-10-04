! function($) {
	if (document.getElementById('zip')) {
		let AjaxZip3 = require('../vendor/ajaxzip3');
		$('#zip').keyup(function() {
			AjaxZip3.zip2addr(this, '', 'addr', 'addr');
		});
	}
}(jQuery);