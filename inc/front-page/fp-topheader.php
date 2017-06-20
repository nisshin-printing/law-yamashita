<?php
// Front Page Slider
$slides_args = array(
	'post_type' => 'dtdsh-slides',
	'posts_per_page' => -1,
	'post_status' => 'publish'
);
$slider = new WP_Query( $slides_args );
echo '<section class="fp-topheader">
	<div class="row">
		<div class="medium-6 column valign slides-wrapper">
			<div id="top-slides">';
if ( $slider->have_posts() ) : while ( $slider->have_posts() ) : $slider->the_post();
$img_id = get_post_thumbnail_id();
$thumb = wp_get_attachment_image_src( $img_id, 'full' );
$img = $thumb[0];
$width = $thumb[1];
$height = $thumb[2];
$link_src = get_post_meta( $id, 'slider_link', true );
$link_title = ( get_post_meta( $id, 'slider_link_title', true ) ) ? get_post_meta( $id, 'slider_link_title', true ) : get_the_title();
if ( '' != $post->post_content ) {
	echo '<article class="slide-item card">
		<div class="card-img"><img src="', $img, '" alt="', get_the_title(), '" width="', $width, '" height="', $height, '"></div>
		<div class="card-content">
			<p class="card-title">', get_the_title(), '</p>
			<p>', get_the_content(), '</p>
		</div>
	</article>';
} else {
	echo '<article class="slide-item card">
		<div class="card-img"><img src="', $img, '" alt="', get_the_title(), '" width="', $width, '" height="', $height, '"></div>
		<div class="card-content">
			<p class="card-title">', get_the_title(), '</p>
			<p><a href="', $link_src, '" title="', $link_title, '" class="waves-effect">', $link_title, '</a></p>
		</div>
	</article>';
}
endwhile;
endif;
?>
			<div id="slides-btn"></div></div>
		</div>
		<div class="medium-6 columns valign header-topbar">
			<h1>探しているのは、<br>「頼れる」<ruby><rb>弁護士</rb><rp><rt>みかた</rt></rp></ruby>。</h1>
			<p>相談件数12,000件以上。<small>※</small><br>選ぶなら広島最大級。<br>個人のお客様なら<strong style="background: yellow;" class="bg-line color-primary">相談無料。</strong></p>
			<small>※　平成27年12月時点</small>
			<p class="mt1 mb0"><a href="tel:0120783409" title="電話する" class="p1 waves-effect bg-white"><img src="<?php dtdsh_photon_img( '2284', 'src' ); ?>" alt="お問い合わせ" width="<?php dtdsh_photon_img( '2284', 'width' ); ?>" height="<?php dtdsh_photon_img( '2284', 'height' ); ?>"></a></p>
			<p class="mt1 mb0"><a href="<?php echo DTDSH_HOME_URL, 'contact'; ?>" class="button hollow expanded waves-effect mb0" title="メールで相談予約"><i class="fa fa-envelope mr1"></i>メールで相談予約</a></p>
<p class="mt1 mb0 button-group" style="display:table;margin:0 auto;width:376px"><a href="<?php echo DTDSH_HOME_URL, 'lp/3674'; ?>" class="button hollow waves-effect mb0" title="東広島支部について" style="display:table-cell;width:50%;">東広島支部について</a><a href="<?php echo DTDSH_HOME_URL, 'lp/4137'; ?>" class="button hollow waves-effect mb0" title="呉支部について" style="display:table-cell;width:50%;">呉支部について</a></p>
			<p class="mt1 mb0"><a href="<?php echo DTDSH_HOME_URL, 'seminar'; ?>" class="button hollow expanded waves-effect mb0" title="セミナーのご案内"><i class="fa fa-microphone mr1"></i>セミナーのご案内</a></p>
		</div>
	</div>
</section>
