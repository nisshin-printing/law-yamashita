<?php
dtdsh_header();
while ( have_posts() ) : the_post();

$args = array(
	'posts_per_page' => -1,
	'meta_key' => 'charge_lawyer',
	'meta_value_num' => $post->ID,
	'order' => 'ASC'
);
var_dump( $post->ID );
$relate_posts = new WP_Query( $args );
$return = '<div id="test">';
foreach ( $relate_posts->posts as $relate_post ) :
	$return .= '<a href="' . get_the_permalink( $relate_post->ID ) . '">' . get_the_title( $relate_post->ID ) . '</a>';
endforeach; wp_reset_postdata();
$return .= '</div>';
echo $return;

?>
<section class="layout-post post-members row mt2 article-body">
	<div class="column">
		<?php get_template_part('inc/templates/content-members', get_post_format()); ?>
	</div>
	<?php
		$args = array(
			'before'           => '<p class="column btn-next-page button expanded text-center clearfix waves-effect">',
			'after'            => '</p>',
			'next_or_number'   => 'next',
			'nextpagelink'     => get_the_title() . 'についてもっと見る<i class="fa fa-angle-right float-right hide-for-small-only"></i>',
			'previouspagelink' => '<i class="fa fa-angle-left left hide-forsmall-only"></i>' . get_the_title() . 'ページに戻る'
		);
		wp_link_pages($args);
	?>
	<div class="section column">
		<h3>担当者がわからないまま相談するのは不安...</h3>
		<div class="cta-select-members">
			<a href="<?php echo get_page_link( '1126' ); ?>" title="<?php echo get_the_title( '1126' ); ?>" class="waves-effect">ご希望の担当者に法律相談できます！</a>
		</div>
	</div>
</section>
<div class="pagination-members">
	<ul class="text-center no-bullet row">
		<li class="text-left"><?php previous_post_link('%link','<i class="fa fa-2x fa-angle-left mr1"></i><span class="hide-for-small-only">%title</span>'); ?></li>
		<li class="text-center"><a href="<?php echo get_permalink(get_page_by_path('members')); ?>" title="<?php echo get_post_type_object(get_post_type())->label; ?>"><i class="fa fa-2x fa-users"></i><span>弁護士等紹介</span></a></li>
		<li class="text-right"><?php next_post_link('%link','<span class="hide-for-small-only">%title</span><i class="fa fa-2x fa-angle-right ml1"></i>'); ?></li>
	</ul>
</div>
<?php
	endwhile;
dtdsh_footer();
