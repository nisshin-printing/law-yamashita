<?php
//========================  Define ========================================================================//
define( 'DTDSH_HOME_URL', home_url( '/' ) );
define( 'DTDSH_SITENAME', get_bloginfo( 'name' ) );
define( 'DTDSH_DESCRIPTION', get_bloginfo( 'description' ) );
define( 'DSEP', DIRECTORY_SEPARATOR );
define( 'TPATH', get_template_directory() . DSEP );
define( 'TURI', get_template_directory_uri() . DSEP );
define( 'INC', TPATH . 'inc' . DSEP );
define( 'TLP', TPATH . 'inc' . DSEP . 'template' . DSEP . 'lp' . DSEP );
define( 'SURI', get_stylesheet_uri() );
define( 'TASSETS', TURI . 'assets' . DSEP );
define( 'TIMG', TURI . 'assets' . DSEP . 'img' . DSEP );
define( 'TSVG', TURI . 'assets' . DSEP . 'svg' . DSEP . 'icons.svg' );
define( 'TCSS', TURI . 'assets' . DSEP . 'css' . DSEP );
define( 'TJS', TURI . 'assets' . DSEP . 'js' . DSEP );
define( 'TFRONT', INC . 'front-page' . DSEP );
define( 'TADMIN', INC . 'admin' . DSEP );
define( 'TFUNC', INC . 'functions' . DSEP );
//========================  Initialization ========================================================================//
// include( TPATH . 'renewal.php' );
if ( ! isset( $content_width ) ){
	$content_width = 1200;
}
require_once( INC . 'dtdsh-theme.php' );
if ( ! function_exists( 'dtdsh_init' ) ) :
function dtdsh_init() {
	require_once( INC . 'widgets.php' );
	require_once( INC . 'post-types.php' );
	require_once( INC . 'side-bars.php' );
	require_once( INC . 'taxfields.php' );
}
add_action( 'init', 'dtdsh_init' );
endif;
if ( ! function_exists( 'dtdsh_setup_theme' ) ) :
function dtdsh_setup_theme() {
	// load_theme_textdomain( 'dtdsh', TPATH . DESEP . 'languages' );
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form'
	) );
	register_nav_menu( 'ringo-main', 'メインナビゲーション');
	register_nav_menu( 'ringo-topmini', 'メインナビの下');
	register_nav_menu( 'ringo-casesnav', '解決事例のカテゴリナビ');
	register_nav_menu( 'ringo-advicenav', '相談者のカテゴリナビ');
	register_nav_menu( 'ringo-clientnav', '依頼者のカテゴリナビ');
	register_nav_menu( 'ringo-scopenav', '取扱範囲ナビ');
	register_nav_menu( 'ringo-footernav', 'フッターナビゲーション');
}
add_action( 'after_setup_theme', 'dtdsh_setup_theme' );
endif;