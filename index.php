<?php
dtdsh_header();
ob_start();
if ( is_archive() || is_search() ) {
	$class_layout = 'archive';
} elseif ( is_single() ) {
	$class_layout = 'post';
} elseif ( is_page() ) {
	$class_layout = 'page';
} else {
	$class_layout = 'else';
}
$post_types = array(
	'cases',
	'members',
	'cases',
	'voice',
	'advice'
);
function casesCTA( $id ) {
	$template = '<h3>法律問題は早く対応することが大切です。</h3><div class="row"><div class="column medium-4"><img src="' . TIMG . 'cta/sodan-zero.png" alt="弁護士を指名してもメンタルケア心理士®への相談も無料！" width="360" height="360" class="alignnone size-full wp-image-3516" /></div><div class="column medium-8"><p>個人のお客様ならば、法律相談は無料です。<br>お困りごとがあれば、お気軽に弁護士に相談してください！</p><p class="text-center"><a class="button cta-button" href="' . get_the_permalink( $id ) . '" title="無料の法律相談を予約する">無料の法律相談</a></p><p>または、お電話でも承ります。</p><p class="text-center"><a href="tel:0120783409" class="waves-effect bg-white p1" title="電話する"><img src="//dev.law-yamashita.com/wp-content/uploads/2015/06/header-tel.jpg" alt="お問い合わせ" width="344" height="44"></a></p></div></div>';
	return $template;
}
?>
<section class="layout-<?php echo $class_layout; ?>">
	<div class="row">
		<?php
			echo '<div class="column">',
				'<div id="js-infinity-loads" class="article-body">';
			if ( is_post_type_archive() && $paged < 2 ) {
				get_template_part( 'inc/templates/archive-top' );
			}
			if ( have_posts() ) : while( have_posts() ) : the_post();
				if ( is_category( 'my-best-pro' ) ) {
					get_template_part( 'inc/templates/content-mybestpro' );
				} elseif ( is_post_type_archive() || is_tax() || is_singular( $post_types ) ) {
					get_template_part( 'inc/templates/content-custom-post-type' );
				} else {
					get_template_part( 'inc/templates/content' );
				}
				endwhile; else:
					get_template_part( 'inc/templates/no-content' );
			endif;
			echo '</div>';
			if ( is_post_type_archive( 'cases' ) ) {
				$contactForm = '1185';
				echo casesCTA( $contactForm );
			} elseif ( is_tax( 'cases-cat' ) || is_singular( 'cases' ) ) {
				if ( has_term( 'consolation', 'cases-cat' ) ) {
					$contactForm = '1179';
				} elseif ( has_term( 'real-eatate', 'cases-cat' ) ) {
					$contactForm = '1172';
				} elseif ( has_term( 'traffic-acc', 'cases-cat' ) ) {
					$contactForm = '1153';
				} elseif ( has_term( 'corporation', 'cases-cat' ) ) {
					$contactForm = '1161';
				} elseif ( has_term( 'corporation-debts', 'cases-cat' ) ) {
					$contactForm = '1167';
				} elseif ( has_term( 'debts', 'cases-cat' ) ) {
					$contactForm = '1144';
				} elseif ( has_term( 'criminal-case', 'cases-cat' ) ) {
					$contactForm = '1176';
				} elseif ( has_term( 'rosai', 'cases-cat' ) ) {
					$contactForm = '2528';
				} elseif ( has_term( 'inheritance', 'cases-cat' ) ) {
					$contactForm = '1155';
				} elseif ( has_term( 'divorce', 'cases-cat' ) ) {
					$contactForm = '1179';
				} else {
					$contactForm = '1185';
				}
				echo casesCTA( $contactForm );
			}
			echo '</div>';
		?>
	</div>
</section>
<?php
$index = ob_get_contents();
ob_end_clean();
$index = dtdsh_html_format( $index );
echo $index;
dtdsh_footer();
