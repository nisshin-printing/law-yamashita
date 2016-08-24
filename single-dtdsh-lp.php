<?php
dtdsh_header();
ob_start();
while( have_posts() ) : the_post();
?>
<div class="layout-lp">
<?php
	if ( '2915' == $post->ID ) {
		get_template_part( 'inc/templates/lp/jiko' );
	} elseif( '2916' == $post->ID ) {
		get_template_part( 'inc/templates/lp/rikon' );
	} elseif( '2917' == $post->ID ) {
		get_template_part( 'inc/templates/lp/sozoku' );
	} elseif( '2918' == $post->ID ) {
		get_template_part( 'inc/templates/lp/kabarai' );
	} elseif ( '3674' == $post->ID ) {
		get_template_part( 'inc/templates/lp/e-hiroshima' );
	}
?>
</div>
<?php
endwhile;
$lp = ob_get_contents();
ob_end_clean();
$lp = dtdsh_html_format( $lp, false );
echo $lp;
dtdsh_footer();