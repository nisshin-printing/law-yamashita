! function($) {
	if ($('[class^="count-"]')) {
		let get_url = $('#social-buttons').data('permalink');
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
				let content = $(data).find("content").text(),
					match = content.match(/window\.__SSR[\s*]=[\s*]{c:[\s*](\d+)/i),
					count = (match !== null) ? match[1] : 0;
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
				let content = $(data).find("content").text(),
					match = content.match(/<em id="cnt">(\d+)<\/em>/i),
					count = (match !== null) ? match[1] : 0;
				$('#countjs-pocket').text(count);
			},
			error: function() {
				$('#countjs-pocket').text('0');
			}
		});
	}
}(jQuery);