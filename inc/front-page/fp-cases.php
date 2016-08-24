<?php
if ( ! function_exists( 'cases_post_list' ) ) :
function cases_post_list( $cat_slug ) {
	$args = array(
		'post_type'      => 'cases',
		'taxonomy'       => 'cases-cat',
		'term'           => $cat_slug,
		'posts_per_page' => 1,
		'orderby'        => 'modified',
	);
	$casesposts = get_posts( $args );
	if ( $casesposts ) {
		foreach( $casesposts as $post ) :
			setup_postdata( $post );
?>
<article class="column <?php echo $cat_slug; ?>">
	<a href="<?php echo get_post_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>" class="waves-effect"></a>
	<h4><?php echo get_term_by( 'slug', $cat_slug, 'cases-cat' )->name; ?><i class="fa fa-angle-right"></i></h4>
	<div class="body-block">
		<h3>
			<?php
				if(mb_strlen( $post->post_title ) > 11) {
					$title= mb_substr( $post->post_title, 0, 11 ) ;
					echo $title.'...';
				} else {
					echo $post->post_title;
				}
			?>
		</h3>
		<p><?php echo mb_substr( strip_tags( $post->post_content ), 0, 50 ), '...'; ?></p>
		<?php
			if( get_post_meta( $post->ID, 'duration', true ) ) {
				echo '<div class="cases-duration">解決まで<strong>',
				get_post_meta($post->ID, 'duration', true),
				'</strong>ヶ月</div>';
			}
		?>
	</div>
</article>
<?php
		endforeach;
	} else {
?>
<article class="column <?php echo $cat_slug; ?>">
	<a href="<?php echo get_post_permalink( $post->ID ); ?>" title="<?php echo $post->post_title; ?>"></a>
	<h4><?php echo get_term_by( 'slug', $cat_slug, 'cases-cat' )->name; ?><i class="fa fa-angle-right"></i></h4>
	<div class="body-block">
		<h3><?php echo $post->post_title; ?></h3>
		<p>まだ解決事例を登録していません。</p>
	</div>
</article>
<?php
	}
	wp_reset_postdata();
}
endif;
?>
<section class="fp-cases">
	<h2 class="text-center">解決事例</h2>
	<div class="column row">
		<div class="small-up-1 medium-up-2 large-up-4">
		<?php
			cases_post_list( 'traffic-acc' );
			cases_post_list( 'divorce' );
			cases_post_list( 'inheritance' );
			cases_post_list( 'debts' );
			cases_post_list( 'criminal-case' );
			cases_post_list( 'real-eatate' );
			cases_post_list( 'corporation' );
			cases_post_list( 'civil-case' );
		?>
		</div>
		<a href="<?php echo DTDSH_HOME_URL, 'cases'; ?>" class="waves-effect button expanded">一覧を見る</a>
	</div>
</section>