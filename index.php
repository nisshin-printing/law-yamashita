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
?>
<section class="layout-<?php echo $class_layout; ?>">
	<div class="row">
		<?php
			echo '<div class="column article-body">';
			if ( have_posts() ) : while( have_posts() ) : the_post();
				if ( is_post_type_archive() || is_tax() || is_singular( $post_types ) ) {
					get_template_part( 'inc/templates/content-custom-post-type' );
				} else {
					get_template_part( 'inc/templates/content' );
				}
				endwhile; else:
					get_template_part( 'inc/templates/no-content' );
			endif;
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
