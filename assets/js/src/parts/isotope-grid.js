! function($) {
	if (document.getElementById('grid-members')) {
		let Isotope = require('isotope-layout'),
			jQueryBridget = require('jquery-bridget');
		jQueryBridget('isotope', Isotope, $);
		let container = $('#grid-members').isotope({
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
		let filters = {};
		$('.filter-group').on('change', function() {
			let filterGroup = $(this).attr('data-filter-group');
			filters[filterGroup] = this.value;
			let filterValue = concatValues(filters);
			container.isotope({
				filter: filterValue
			});
		});
		function concatValues(obj) {
			let value = '';
			for (let prop in obj) {
				value += obj[prop];
			}
			return value;
		}
	}
}(jQuery);