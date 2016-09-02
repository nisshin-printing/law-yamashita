<?php
$li_class = ( ! is_front_page() && ! is_singular( 'dtdsh-lp' ) ) ? ' hide-for-large' : '';
if ( is_front_page() || is_singular( 'dtdsh-lp' ) ) {
	$btn = '<span class="hide-for-large">メニュー</span><span class="show-for-large">取扱範囲</span>';
} else {
	$btn = '<span>メニュー</span>';
}
$on_load = ( is_page( 'access' ) ) ? ' onload="initialize();"' : '';
$head = ( is_singular() ) ? '<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">' : '<html lang="ja" dir="ltr"><head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">';
$is_sticky = ( is_singular( 'dtdsh-lp' ) ) ? '' : ' id="sticky-topbar"';
$master = '3464';
$staging = '3585';
$logo_url = ( preg_match( '/dev/', $_SERVER['SERVER_NAME'] ) ) ? $staging : $master;
echo '<!DOCTYPE html>
<html lang="ja" dir="ltr">',
$head,
'<meta charset="UFT-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chorme=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>', file_get_contents( TJS . 'prefetch-onload.min.js' ),'</script>';
	dtdsh_schemaJson();
	dtdsh_dynamic_inlining_style();
	wp_head();
echo '</head>
<body id="PageTop" itemscope itemtype="http://schema.org/WebPage" ', body_class(), $on_load, '>',
google_tag_manager_install(),
'<div class="off-canvas-wrapper">
<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<div id="spNav" class="off-canvas position-left nav-scope" data-off-canvas>
	<button class="btn-close button waves-effect expanded" data-close>閉じる</button>',
	dtdsh_dynamic_navmenu( $global_nav = true ),
'</div>
<div class="off-canvas-content" data-off-canvas-content>
<header class="header" role="banner">
	<div class="topbar-wrapper row expanded">
		<div class="medium-8 column"><p><span class="show-for-medium">広島電鉄縮景園前駅徒歩1分</span>広島弁護士会所属山下江法律事務所</p></div>
		<div class="medium-4 column show-for-medium">', dtdsh_get_sociallist(), '</div>
	</div>
	<div', $is_sticky, '>
		<nav class="top-bar" role="navigation">
			<ul class="title">
				<li class="li-nav', $li_class, '"><a id="btn-nav" class="waves-effect button" data-open="spNav" title="メニュー"><i class="fa fa-bars"></i>', $btn, '</a></li>
				<li class="title-logo"><a class="waves-effect" href="', DTDSH_HOME_URL, '" title="', DTDSH_SITENAME, '"><img src="', wp_get_attachment_image_src( $logo_url, 'full' )[0], '" alt="', DTDSH_SITENAME, '" width="', wp_get_attachment_image_src( $logo_url, 'full' )[1], '" height="', wp_get_attachment_image_src( $logo_url, 'full' )[2], '"></a></li>
			</ul>';
				wp_nav_menu( array(
					'theme_location'  => 'ringo-main',
					'container_class' => 'top-bar-right show-for-large',
					'menu_class'      => 'dropdown menu',
					'items_wrap'      => '<ul class="%2$s" data-dropdown-menu role="menubar">%3$s</ul>',
					'walker'          => new Top_Bar_Walker_Nav_Menu()
				) );
		echo '</nav>
	</div>';
if ( is_front_page() || is_singular( 'dtdsh-lp' ) ) {
	echo '</header>', '<div id="content-wrapper" role="main">';
} else {
	get_template_part( 'inc/templates/dtdsh-header' );
	echo '</header>', '<div class="row expanded"><div id="content-wrapper" class="large-9 large-push-3 column pr0" role="main">';
}
