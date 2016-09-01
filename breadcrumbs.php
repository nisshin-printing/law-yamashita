<ol class="devedBreadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="<?php bloginfo('url');?>" itemprop="url">
<span itemprop="name">名古屋でSEO対策なら株式会社APOLLO11</span>
</a>
<meta itemprop="position" content="1" />
<span class="breadTrail">&gt;</span>
</li>
<?php if(is_single()):?>
<!--singleの場合-->
<?php
$breadCat = get_the_category();
$breadCat_id = $breadCat[0]->term_id; // 最初のカテゴリのID
$ancestor_ids = get_ancestors( $breadCat_id, 'category' ); // 祖先カテゴリのIDを配列で取得
//配列の順番を逆にする
$ancestor_ids = array_reverse($ancestor_ids);
//配列に現カテゴリーidを追加する
array_push($ancestor_ids,$breadCat_id);
//配列の数を取得（カテゴリーIDの数）
$countBreadCat = count($ancestor_ids);
//配列の数だけwhile文を実行・パンくずリストを出力
$breadI=2;
while ($breadI < $countBreadCat+2) {
$breadAncId = $ancestor_ids[$breadI-2];//カテゴリーidを取得
$breadAnc = get_category($breadAncId);//カテゴリー情報を取得
$breadAnc_name = $breadAnc->name; //カテゴリー名を取得
$breadAnc_url = get_category_link($breadAncId); //カテゴリーurlを取得
$breadInum = $breadI; //contentの中に入る数値を取得
//パンくずリストを出力
echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$breadAnc_url.'" itemprop="url"><span itemprop="name">'.$breadAnc_name.'</span></a><meta itemprop="position" content="'.$breadInum.'" /><span class="breadTrail">&gt;</span></li>';
$breadI++;
}
?>
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="<?php echo get_permalink(); ?>" itemprop="url">
<span itemprop="name"><?php the_title();?></span>
</a>
<meta itemprop="position" content="<?php echo $countBreadCat+2;?>" />
</li>
<?php elseif(is_category()):?>
<!--現在のカテゴリー情報を取得-->
<?php
$breadCat_id = get_queried_object()->cat_ID;
//ここからsingleの時と同じ
$ancestor_ids = get_ancestors( $breadCat_id, 'category' ); // 祖先カテゴリのIDを配列で取得
//配列の数を取得（カテゴリーIDの数）
$countBreadCat = count($ancestor_ids);
//配列の順番を逆にする
$ancestor_ids = array_reverse($ancestor_ids);
//配列の数だけwhile文を実行・パンくずリストを出力
$breadI=2;
while ($breadI < $countBreadCat+2) {
$breadAncId = $ancestor_ids[$breadI-2];//カテゴリーidを取得
$breadAnc = get_category($breadAncId);//カテゴリー情報を取得
$breadAnc_name = $breadAnc->name; //カテゴリー名を取得
$breadAnc_url = get_category_link($breadAncId); //カテゴリーurlを取得
$breadInum = $breadI; //contentの中に入る数値を取得
//パンくずリストを出力
echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$breadAnc_url.'" itemprop="url"><span itemprop="name">'.$breadAnc_name.'</span></a><meta itemprop="position" content="'.$breadInum.'" /><span class="breadTrail">&gt;</span></li>';
$breadI++;
}
//現在のカテゴリの、カテゴリ名、カテゴリURLを取得
$breadCatCurrent = get_category($breadCat_id);
$breadCatCurrent_name = $breadCatCurrent->name; //カテゴリー名を取得
$breadCatCurrent_url = get_category_link($breadCat_id); //カテゴリーurlを取得

?>
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="<?php echo $breadCatCurrent_url; ?>" itemprop="url">
<span itemprop="name"><?php echo $breadCatCurrent_name;?></span>
</a>
<meta itemprop="position" content="<?php echo $countBreadCat+2;?>" />
</li>
<?php elseif(is_page()):?>
<!--pageの場合-->
<?php
$ancestor_ids = $post->ancestors;
//配列の数を取得（カテゴリーIDの数）
$countBreadPage = count($ancestor_ids);
//配列の順番を逆にする
$ancestor_ids = array_reverse($ancestor_ids);
//配列の数だけwhile文を実行・パンくずリストを出力
$breadI=2;
while ($breadI < $countBreadPage+2) {
$breadAncId = $ancestor_ids[$breadI-2];//ページidを取得
$breadAnc = get_post($breadAncId);//ページ情報を取得
$breadAnc_name = $breadAnc->post_title; //ページ名を取得
$breadAnc_url = get_permalink($breadAncId); //ページurlを取得
$breadInum = $breadI; //contentの中に入る数値を取得
//パンくずリストを出力
echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$breadAnc_url.'" itemprop="url"><span itemprop="name">'.$breadAnc_name.'</span></a><meta itemprop="position" content="'.$breadInum.'" /><span class="breadTrail">&gt;</span></li>';
$breadI++;
}
?>
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="<?php echo get_permalink(); ?>" itemprop="url">
<span itemprop="name"><?php the_title();?></span>
</a>
<meta itemprop="position" content="<?php echo $countBreadPage+2;?>" />
</li>
<?php elseif(is_search()):?>
<?php
$searchQueryUrl = get_search_query();
$searchQueryUrl = str_replace(" ", "+", $searchQueryUrl);
?>
<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="<?php bloginfo('url'); ?>/?s=<?php echo $searchQueryUrl;?>" itemprop="url">
<span itemprop="name">検索結果：<?php echo get_search_query(); ?></span>
</a>
<meta itemprop="position" content="2" />
</li>
<?php endif;?>
</ol><!--devedBreadcrumbs-->