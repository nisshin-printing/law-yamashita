let Highcharts = require('../vendor/highcharts');
! function($) {
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
}(jQuery);