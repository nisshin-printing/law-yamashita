<?php
	echo '<style>', file_get_contents( TCSS . 'top--sites.css' ), '</style>';
	$sites = array(
		array(
			'name' => 'jiko',
			'ssl' => true,
			'bg' => true
		),
		array(
			'name' => 'rikon',
			'ssl' => true,
			'bg' => true
		),
		array(
			'name' => 'sozoku',
			'ssl' => true,
			'bg' => true
		),
		array(
			'name' => 'saimu',
			'ssl' => false,
			'bg' => true
		),
		array(
			'name' => 'keiji',
			'ssl' => false,
			'bg' => true
		),
		array(
			'name' => 'fudosan',
			'ssl' => false,
			'bg' => false
		),
		array(
			'name' => 'kigyo',
			'ssl' => true,
			'bg' => false
		),
		array(
			'name' => 'hasan',
			'ssl' => false,
			'bg' => false
		),
		array(
			'name' => 'rosai',
			'ssl' => false,
			'bg' => true
		),
		array(
			'name' => 'another',
			'ssl' => false,
			'bg' => true
		)
	);
echo '<div class="l-sites_wrapper row">',
'<h2 class="column small-12">山下江法律事務所サイトへようこそ。各種専門サイト等もあります。</h2>',
'<div class="column small-12 row small-up-2 medium-up-3 large-up-5">';
foreach ( $sites as $site ) :
	$url = ( $site['ssl'] ) ? 'https://hiroshima-' : 'http://www.hiroshima-';
	$img = TIMG . 'front-page/sites_';
	if ( 'fudosan' === $site['name'] ) {
		$img_class = 'l-sites_img';
		echo '<div class="column"><a href="', $url, $site['name'], '.com" target="_blank"><img src="', $img, $site['name'], '.png" class="', $img_class, '" style="border:1px solid #33CC66"></a></div>';
	} elseif ( 'another' === $site['name'] ) {
			$url = 'https://www.law-yamashita.com/scope/civil-case';
			echo '<div class="column"><a href="', $url, '"><img src="', $img, $site['name'], '.png" class="l-sites_img bg-primary"></a></div>';
	} else {
		$img_class = ( $site['bg'] ) ? 'l-sites_img bg-' . $site['name'] : 'l-sites_img b1 border-' . $site['name'];
		echo '<div class="column"><a href="', $url, $site['name'], '.com" target="_blank"><img src="', $img, $site['name'], '.png" class="', $img_class, '"></a></div>';
	}
endforeach;
echo '</div></div>';
