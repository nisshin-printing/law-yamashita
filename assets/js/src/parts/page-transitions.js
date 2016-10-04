! function($) {
	$(window).scroll(function() {
		let actionsBtn = $('#btn-fixed-actions');
		if (200 < $(this).scrollTop()) {
			actionsBtn.fadeIn('slow');
		} else {
			actionsBtn.fadeOut('slow');
		}
	});
	$('[href^="#"]').click(function() {
		let href = $(this).attr('href'),
			target = $(href === '#' || href === '' ? 'html' : href),
			positioin = target.offset().top - headerHeight;
		$('html, body').animate({
			scrollTop: position
		}, 550, 'swing');
		return false;
	});
}(jQuery);