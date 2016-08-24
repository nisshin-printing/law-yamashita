<?php
//========================  Template Redirect ========================================================================//
if ( ! function_exists( 'dtdsh_get_header' ) ) :
function dtdsh_get_header() {
	require_once( TFUNC . 'title-and-desc.php' );
}
add_action( 'template_redirect', 'dtdsh_get_header', 99 );
endif;

//========================  Header周り ========================================================================//
if ( ! function_exists( 'dtdsh_dynamic_inlining_style' ) ) :
function dtdsh_dynamic_inlining_style() {
	echo '<link rel=stylesheet href="' . SURI . '">';
	if ( function_exists( 'wpcf7_enqueue_styles' ) && is_page( array( '1185', '1172', '1153', '1161', '1167', '1144', '1176', '2528', '1155', '1179' ) ) ) {
		wpcf7_enqueue_styles();
	}
}
endif;
if ( ! function_exists( 'dtdsh_header' ) ) :
function dtdsh_header() {
	ob_start();
	get_header();
	$head = ob_get_contents();
	ob_end_clean();
	$head = str_replace( "'", '"', $head );
	$head = str_replace( ' type="text/javascript"', '', $head );
	$head = str_replace( ' type="text/css"', '', $head );
	$head = str_replace( '" />', '">', $head );
	$head = dtdsh_html_format( $head, false );
	echo $head;
}
endif;

// Custom Menu Walker
class Top_Bar_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n" . '<ul class="submenu menu vertical is-dropdown-submenu" data-submenu role="menu">' . "\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$classes = 'menu-item-' . $item->object_id;
		if ( ! empty( $item->classes ) ) {
			$classes .= in_array('menu-item-has-children',$item->classes) ? ' is-dropdown-submenu-parent opens-right' : '';
			$classes .= in_array('current-menu-item',$item->classes) ? ' active' : '';
		}
		$class_att = ! empty( $classes ) ? ' class="' . trim( $classes ) . '"' : '';
		if ( $depth ) {
			$output .= '<li' . $class_att . ' role="menuitem" data-is-click="false">';
		} else {
			$output .= '<li' . $class_att . ' role="menuitem">';
		}
		$attributes    = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes    .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target )  . '"' : '';
		$attributes    .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes    .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes    .= ' class="waves-effect"';
		$item_output   = $args->before;
		$item_output   .= '<a' . $attributes . '>';
		$item_output   .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output   .= '</a>';
		$item_output   .= $args->after;
		$output        .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
class Side_Nav_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n" . '<ul class="submenu menu vertical is-dropdown-submenu" data-submenu role="menu">' . "\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$classes = 'menu-item-' . $item->object_id;
		if ( ! empty( $item->classes ) ) {
			$classes .= in_array('menu-item-has-children',$item->classes) ? ' is-dropdown-submenu-parent opens-right' : '';
			$classes .= in_array('current-menu-item',$item->classes) ? ' active' : '';
		}
		$class_att = ! empty( $classes ) ? ' class="' . trim( $classes ) . '"' : '';
		if ( $depth ) {
			$output .= '<li' . $class_att . ' role="menuitem" data-is-click="false">';
		} else {
			$output .= '<li' . $class_att . ' role="menuitem">';
		}
		$attributes    = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes    .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target )  . '"' : '';
		$attributes    .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes    .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes    .= ' class="waves-effect"';
		$item_output   = $args->before;
		$item_output   .= '<a' . $attributes . '>';
		$item_output   .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output   .= '</a>';
		$item_output   .= $args->after;
		$output        .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
/*
function dtdsh_scope_nav() {
	$menu_name = 'ringo-scopenav';
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menu_items = wp_get_nav_menu_items( $menu->term_id );
	foreach ( $menu_items as $key => $menu_item ) {
		$arrayScope[] = [
			'pv'    => get_post_meta( $menu_item->object_id, 'view', true ),
			'id'    => $menu_item->object_id,
			'title' => $menu_item->title,
			'url'   => $menu_item->url
		];
	}
	foreach ( (array) $arrayScope as $key => $value ) {
		$pv[$key] = $value['pv'];
	}
	array_multisort(  $pv, SORT_DESC, $arrayScope );
	$menu_list = '<ul class="menu-wrapper">';
	foreach ( (array) $arrayScope as $item => $val ) {
		$active = ( $val['id'] == get_the_ID() ) ? ' class="current-menu-item"' : '';
		$menu_list .= '<li' . $active . '>';
		$menu_list .= '<a href="' . $val['url'] . '" title="' . $val['title'] . '" class="waves-effect">' . $val['title'] . ' (' . $val['pv'] . ')</a>';
		$menu_list .= '</li>';
	}
	$menu_list .= '</ul>';
	echo $menu_list;
}
*/

// PW保護ページタイトルから「保護中：」を削除
if ( ! is_admin() ) {
	add_filter( 'protected_title_format', 'remove_protected' );
	function remove_protected( $title ) {
		return '%s';
	}
}

// PW記事のテキストを変更する
// add_filter( 'the_password_form', 'passpost_form_customize' );

// ソーシャルリンクのリスト
function dtdsh_get_sociallist() {
	$facebook = '<li class="social-item"><a class="color-facebook hover-bg-facebook" href="https://www.facebook.com/yamashitakolawoffice" target="_blank"><i class="fa fa-facebook"></i></a></li>';
	$googleplus = '<li class="social-item"><a class="hover-bg-googleplus color-googleplus" href="https://plus.google.com/118124010942091667362?hl=ja" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
	$youtube = '<li class="social-item"><a class="hover-bg-youtube color-youtube" href="https://www.youtube.com/channel/UCQepvNppunUj6BSQgAtbx1g" target="_blank"><i class="fa fa-youtube"></i></a></li>';
	echo '<ul class="social-box no-bullet clearfix">', $facebook, $googleplus, $youtube, '</ul>';
}

// Breadcrumbs
if ( ! function_exists( 'breadcrumbs' ) ) :
function breadcrumbs( $args = array() ){
	global $post;
	$str ='';
	$defaults = array(
		'id'         => 'breadcrumbs',
		'home'       => 'トップページ',
		'search'     => 'で検索した結果',
		'tag'        => 'タグ',
		'author'     => 'タグ',
		'notfound'   => 'ページがありません！',
		'liOption'   => 'itemscope itemtype="http://data-vocabulary.org/Breadcrumb"',
		'aOption'    => 'itemprop="url"',
		'spanOption' => 'itemprop="title"'
	);
	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
	if(!is_front_page() && !is_admin()){
		$str.= '<ul class="' . $id . '" itemprop="breadcrumb">';
		$str.= '<li '.$liOption.'>';
		$str.= '<a href="'. home_url() .'/" '.$aOption.'><span '.$spanOption.'>'. $home .'</span></a></li>';
		$my_taxonomy = get_query_var('taxonomy');
		$cpt = get_query_var('post_type');
		if($my_taxonomy &&  is_tax($my_taxonomy)) {//カスタム分類のページ
			$my_tax = get_queried_object();  //print_r($my_tax);
			$post_types = get_taxonomy( $my_taxonomy )->object_type;
			$cpt = $post_types[0];  //カスタム分類名からカスタム投稿名を取得。
			$str.='<li '.$liOption.'><a href="' .get_post_type_archive_link($cpt).'" '.$aOption.'><span '.$spanOption.'>' .get_post_type_object($cpt)->label.'</span></a></li>';  //カスタム投稿のアーカイブへのリンクを出力
		if($my_tax->parent != 0) {  //親があればそれらを取得して表示
			$ancestors = array_reverse(get_ancestors( $my_tax->term_id, $my_tax->taxonomy ));
			foreach($ancestors as $ancestor){
				$str.='<li '.$liOption.'><a href="'. get_term_link($ancestor, $my_tax->taxonomy) .'" '.$aOption.'><span '.$spanOption.'>'. get_term($ancestor, $my_tax->taxonomy)->name .'</span></a></li>';
			}
		}
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $my_tax->name . '</span></li>';
		} elseif(is_category()) {  //カテゴリーのアーカイブページ
			$cat = get_queried_object();
			$str.='<li ' .$liOption. '><a href="'.get_home_url().'/topics/" '.$aOption.'><span '.$spanOption.'>トピックス</span></a></li>';
			if($cat->parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li '.$liOption.'><a href="'. get_category_link($ancestor) .'" '.$aOption.'><span '.$spanOption.'>'. get_cat_name($ancestor) .'</span></a></li>';
				}
			}
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $cat->name . '</span></li>';



		}elseif(is_post_type_archive()) {  //カスタム投稿のアーカイブページ
			$cpt = get_query_var('post_type');
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. get_post_type_object($cpt)->label . '</span></li>';



		} elseif(is_singular('members')) {
			$str .= '<li '.$liOption.'><a '.$aOption.' href="'.get_permalink(get_page_by_path('members')).'"><span '.$spanOption.'>'.get_post_type_object(get_post_type())->label.'</span></a></li>';
			$str .= '<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'.$post->post_title.'</span></li>';




		} elseif($cpt && is_singular($cpt)){  //カスタム投稿の個別記事ページ
			$taxes = get_object_taxonomies($cpt);
			$mytax = $taxes[0];
			$str.='<li '.$liOption.'><a href="' .get_post_type_archive_link($cpt).'" '.$aOption.'><span '.$spanOption.'>'. get_post_type_object($cpt)->label.'</span></a></li>';  //カスタム投稿のアーカイブへのリンクを出力
			$taxes = get_the_terms($post->ID, $mytax);
			$tax = get_youngest_tax($taxes, $mytax );
			if($tax->parent != 0){
				$ancestors = array_reverse(get_ancestors( $tax->term_id, $mytax ));
				foreach($ancestors as $ancestor){
					$str.='<li '.$liOption.'><a href="'. get_term_link($ancestor, $mytax).'" '.$aOption.'><span '.$spanOption.'>'. get_term($ancestor, $mytax)->name . '</span></a></li>';
				}
			}
			$str.='<li '.$liOption.'><a href="'. get_term_link($tax, $mytax).'" '.$aOption.'><span '.$spanOption.'>'. $tax->name . '</span></a></li>';
			$str.= '<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $post->post_title .'</span></li>';
		}elseif(is_single()){  //個別記事ページ
			$str.='<li ' .$liOption. '><a href="'.get_home_url().'/topics/" '.$aOption.'><span '.$spanOption.'>トピックス</span></a></li>';
			$categories = get_the_category($post->ID);
			$cat = get_youngest_cat($categories);
			if($cat->parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li '.$liOption.'><a href="'. get_category_link($ancestor).'" '.$aOption.'><span '.$spanOption.'>'. get_cat_name($ancestor). '</span></a></li>';
				}
			}
			$str.='<li '.$liOption.'><a href="'. get_category_link($cat->term_id). '" '.$aOption.'><span '.$spanOption.'>'. $cat->cat_name . '</span></a></li>';
			$str.= '<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $post->post_title .'</span></li>';
		} elseif(is_page()){  //固定ページ
			if($post->post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li '.$liOption.'><a href="'. get_permalink($ancestor).'" '.$aOption.'><span '.$spanOption.'>'. get_the_title($ancestor) .'</span></a></li>';
				}
			}
			$str.= '<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $post->post_title .'</span></li>';
		} elseif(is_date()){  //日付ベースのアーカイブページ
			$str.='<li ' .$liOption. '><a href="'.get_home_url().'/topics/" '.$aOption.'><span '.$spanOption.'>トピックス</span></a></li>';
			if(get_query_var('day') != 0){  //年別アーカイブ
				$str.='<li '.$liOption.'><a href="'. get_year_link(get_query_var('year')). '" '.$aOption.'><span '.$spanOption.'>' . get_query_var('year'). '年</span></a></li>';
				$str.='<li '.$liOption.'><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '" '.$aOption.'><span '.$spanOption.'>'. get_query_var('monthnum') .'月</span></a></li>';
				$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. get_query_var('day'). '日</span></li>';
			} elseif(get_query_var('monthnum') != 0){  //月別アーカイブ
				$str.='<li '.$liOption.'><a href="'. get_year_link(get_query_var('year')) .'" '.$aOption.'><span '.$spanOption.'>'. get_query_var('year') .'年</span></a></li>';
				$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. get_query_var('monthnum'). '月</span></li>';
			} else {  //年別アーカイブ
				$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. get_query_var('year') .'年</span></li>';
			}
		} elseif(is_search()) {  //検索結果表示ページ
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>「'. get_search_query() .'」'. $search .'</span></li>';
		} elseif(is_author()){  //投稿者のアーカイブページ
			$str .='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $author .' : '. get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
		} elseif(is_tag()){  //タグのアーカイブページ
			$str.='<li ' .$liOption. '><a href="'.get_home_url().'/topics/" '.$aOption.'><span '.$spanOption.'>トピックス</span></a></li>';
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $tag .' : '. single_tag_title( '' , false ). '</span></li>';
		} elseif(is_attachment()){  //添付ファイルページ
			$str.= '<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. $post->post_title .'</span></li>';
		} elseif(is_404()){  //404 Not Found ページ
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'.$notfound.'</span></li>';
		} elseif(is_home()) {
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>トピックス</span></li>';
		} else{  //その他
			$str.='<li class="current hide-for-small-only" '.$liOption.'><span '.$spanOption.'>'. wp_title('', false).'</span></li>';
		}
		$str.='</ul>';
	}
	echo $str;
}
endif;
if ( ! function_exists( 'get_youngest_cat' ) ) :
//一番下の階層のカテゴリーを返す関数
function get_youngest_cat( $categories ) {
	global $post;
	if ( count( $categories ) == 1 ) {
		$youngest = $categories[0];
	} else {
		$count = 0;
		foreach ( $categories as $category ) {
			$children = get_term_children( $category->term_id, 'category' );
			if ( $children ) {
				if ( $count < count( $children ) ) {
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ) {
						if( in_category( $child, $post->ID ) ){
							$youngest = get_category( $child );
						}
					}
				}
			} else {
				$youngest = $category;
			}
		}
	}
	return $youngest;
}
endif;
if ( ! function_exists( 'get_youngest_tax' ) ) :
//一番下の階層のタクソノミーを返す関数
function get_youngest_tax( $taxes, $mytaxonomy ) {
	global $post;
	if( count( $taxes ) == 1 ) {
		$youngest = $taxes[key( $taxes )];
	} else {
		$count = 0;
		foreach ( $taxes as $tax ) {
			$children = get_term_children( $tax->term_id, $mytaxonomy );
			if( $children ) {
				if ( $count < count( $children ) ) {
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ) {
						if ( is_object_in_term( $post->ID, $mytaxonomy ) ) {
							$youngest = get_term( $child, $mytaxonomy );
						}
					}
				}
			} else {
				$youngest = $tax;
			}
		}
	}
	return $youngest;
}
endif;