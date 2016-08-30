<?php
if ( ! function_exists( 'dtdsh_dynamic_navmenu' ) ) :
function dtdsh_dynamic_navmenu( $global_nav = false ) {
	$master_nav_tel = '3465';
	$staging_nav_tel = '3507';
	$nav_tel_id = ( preg_match( '/dev/', $_SERVER['SERVER_NAME'] ) ) ? $staging_nav_tel : $master_nav_tel;
	$is_column = ( ! $global_nav ) ? ' class="column"' : '';
	// All
	echo '<nav role="navigation"', $is_column, '>
		<form action="', DTDSH_HOME_URL, '" role="search" method="search" itemprop="potentialAction" itemscope="itemscope" itemtype="http://schema.org/SearchAction">
			<input type="search" name="s" placeholder="気になるキーワードを入力" required="required">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
		<a href="', DTDSH_HOME_URL, 'contact" title="お問い合わせ" class="btn-call waves-effect"><img src="', dtdsh_photon_img( $nav_tel_id, 'src' ), '" alt="お問い合わせ" width="', dtdsh_photon_img( $nav_tel_id, 'width' ), '" height="', dtdsh_photon_img( $nav_tel_id, 'height' ), '"></a>
		<a href="', DTDSH_HOME_URL, 'contact" class="button expanded waves-effect btn-contact" title="今すぐ無料の法律相談">メールでお問い合わせ</a>';

	// 交通事故
	if ( is_page( array( 'traffic-accident', 'rate-jiko', 'contact-jiko' ) ) || is_tax( 'cases-cat', 'traffic-acc' ) || is_tax( 'voice-cat', 'traffic-acc' ) || is_category( 'jiko' ) ) {
		echo '<h5 class="nav-title">交通事故メニュー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-page-jiko',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '<a class="nav-cta" title="交通事故サイトのリンク" href="http://www.hiroshima-jiko.com" target="_blank"><img src="', TIMG, 'external-links-1-2.png" alt="交通事故サイトのリンク" width="245" height="56"></a>';
	} elseif ( is_page( array( 'divorce-and-gender-trouble', 'rate-rikon', 'contact-rikon' ) ) || is_tax( 'cases-cat', 'divorce' ) || is_tax( 'voice-cat', 'divorce' ) || is_category( 'rikon' ) ) {
		echo '<h5 class="nav-title">離婚・男女トラブルメニュー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-page-rikon',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '<a class="nav-cta" title="離婚・男女トラブルサイトのリンク" href="http://www.hiroshima-rikon.com" target="_blank"><img src="', TIMG, 'external-links-2-2.png" alt="離婚・男女トラブルサイトのリンク" width="245" height="56"></a>';
	} elseif ( is_page( 'isyaryo' ) || is_tax( 'cases-cat', 'consolation' ) || is_tax( 'voice-cat', 'consolation' ) || is_category( 'isyaryo' ) ) {
		echo '<h5 class="nav-title">不倫慰謝料メニュー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-page-isyaryo',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '<a class="nav-cta" title="男女トラブルサイトのリンク" href="http://www.hiroshima-rikon.com" target="_blank"><img src="', TIMG, 'external-links-2-2.png" alt="男女トラブルサイトのリンク" width="245" height="56"></a>';
	} elseif ( is_page( array( 'debts-and-overpaid-problem', 'rate-saimu', 'contact-saimu' ) ) || is_tax( 'cases-cat', 'debts' ) || is_tax( 'voice-cat', 'debts' ) || is_category( 'saimu' ) ) {
		echo '<h5 class="nav-title">借金・過払いメニュー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-page-saimu',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '<a class="nav-cta" title="借金・過払いサイトのリンク" href="http://www.hiroshima-saimu.com" target="_blank"><img src="', TIMG, 'external-links-4-2.png" alt="借金・過払いサイトのリンク" width="245" height="56"></a>';
	} elseif ( is_page( array( 'corporate-legal-services', 'seminar-resume', 'seminar' ) ) || is_tax( 'cases-cat', 'corporation' ) || is_tax( 'voice-cat', 'corporation' ) || is_category( 'kigyo' ) ) {
		echo '<h5 class="nav-title">企業法務メニュー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-page-seminar',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '<a class="nav-cta" title="企業法務サイト" href="http://www.hiroshima-kigyo.com" target="_blank"><img src="', TIMG, 'external-links-7-2.png" alt="企業法務サイト" width="245" height="56"></a>';
	} elseif ( is_page( array( 'rate-sozoku', 'wills-and-inheritance', 'contact-sozoku' ) ) || is_tax( 'inheritance' ) || is_category( 'sozoku' ) ) {
		echo '<h5 class="nav-title">「相続・遺言」メニュー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-page-sozoku',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '<a class="nav-cta" title="広島の弁護士による相続・遺言の無料相談" href="http://www.hiroshima-sozoku.com" target="_blank"><img src="', TIMG, 'external-links-3-2.png" alt="広島の弁護士による相続・遺言の無料相談" width="245" height="56"></a>';
	} elseif ( is_home() || is_category() || is_tag() || is_single() ) {
		echo '<h5 class="nav-title">カテゴリー</h5>';
		wp_nav_menu( array(
			'menu' => 'nav-home-category',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
	}
	// All
	echo '<h5 class="nav-title">取扱範囲一覧</h5>';
	wp_nav_menu( array(
		'theme_location' => 'ringo-scopenav',
		'container' => false,
		'menu_class' => 'menu vertical',
		'items_wrap' => '<ul class="%2$s">%3$s</ul>',
		'walker' => new Side_Nav_Walker_Nav_Menu()
	) );
	// メニュー統合条件分岐
	if ( $global_nav ) {
		echo '<div class="hide-for-large"><h5 class="nav-title">メニュー</h5>';
		wp_nav_menu( array(
			'theme_location' => 'ringo-main',
			'container' => false,
			'menu_class' => 'menu vertical',
			'items_wrap' => '<ul class="%2$s">%3$s</ul>',
			'walker' => new Side_Nav_Walker_Nav_Menu()
		) );
		echo '</div>';
	}
	echo '</nav>';
}
endif;
if ( ! function_exists( 'dtdsh_footer' ) ) :
function dtdsh_footer() {
	ob_start();
	get_footer();
	$foot = ob_get_contents();
	ob_end_clean();
	$foot = preg_replace( '/<script.+text\/javascript.+src=[\'|\"](.+)[\'|\"].+>/', '<script src="$1"></script>', $foot );
	$foot = str_replace( '" />', '">', $foot );
	$foot = dtdsh_html_format( $foot, false );
	echo $foot;
}
endif;
