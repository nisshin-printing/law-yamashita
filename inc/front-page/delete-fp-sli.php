<?php
// Front Page Slider
$slides_args = array(
	'post_type' => 'dtdsh-slides',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'ASC',
	);
$slider = new WP_Query( $slides_args );
?>
<section class="fp-slider bg-red column-3">
	<div class="slider-wrapper column-2-3 p1">
		<?php
			if ( $slider->have_posts() ) :
				while ( $slider->have_posts() ) : $slider->the_post();
			$link_src = get_post_meta( $id, 'slider_link', true );
			$link_title = ( get_post_meta( $id, 'slider_link_title', true ) ) ? get_post_meta( $id, 'slider_link_title', true ) : get_the_title();
		?>
		<article class="slide-item card">
			<div class="card-img"><?php the_post_thumbnail(); ?></div>
			<div class="card-content">
				<h1 class="card-title"><?php the_title(); ?></h1>
				<p class="text-right"><a class="button" href="<?php echo $link_src; ?>" title="<?php echo $link_title; ?>"><?php echo $link_title; ?></a></p>
			</div>
		</article>
		<?php
			endwhile;
			endif;
		?>
	</div>
	<div class="column-1-3 valign-wrapper">
		<div class="valign">
			<h1>探しているのは、<br>「頼れる」<ruby><rb>弁護士</rb><rp><rt>みかた</rt></rp></ruby>。</h1>
			<p class="text-center">相談件数12,000件以上。<small>※</small><br>選ぶなら広島最大級。<br>	個人のお客様なら<strong class="bg-line color-primary">相談無料。</strong></p>
			<small class="color-white">※　平成27年12月時点</small>
			<p class="mt1 mb0"><a href="tel:0120783409" title="電話する" class="p1 waves-effect bg-white"><img src="<?php bloginfo('template_directory'); ?>/assets/img/header-tel.jpg" alt="お問い合わせ"></a></p>
			<p class="mt1 mb0"><a href="<?php echo get_page_link( '1126' ); ?>" class="button secondary expand waves-effect" title="メールでお問い合わせ"><i class="fa fa-envelope mr1"></i>メールでお問い合わせ</a></p>
			<p class="mt1 mb0"><a href="http://www.law-yamashita.com/wp-content/uploads/2016/01/弁護士採用手続要項.pdf" class="button secondary expand waves-effect link-external" target="_blank" title="弁護士採用情報">弁護士採用情報</a></p>
		</div>
	</div>
</section>


