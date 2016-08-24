<?php
dtdsh_header();
ob_start();
while ( have_posts() ) : the_post();
?>
<section class="layout-page">
	<div class="row">
		<div class="column article-body">
		<?php
			get_template_part( 'inc/templates/content' );
		?>
		</div>
	</div>
</section>
<?php
endwhile;
$page = ob_get_contents();
ob_end_clean();
$page = dtdsh_html_format( $page, false );
echo $page;
dtdsh_footer();