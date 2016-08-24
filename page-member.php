<?php
// The page template file.
// Template Name: メンバーページ
dtdsh_header();
ob_start();
?>
<section class="layout-page">
	<div class="row">
		<div class="column">
			<?php get_template_part( 'inc/templates/content-members' ); ?>
			<div class="section">
				<h3>担当者がわからないまま相談するのは不安...</h3>
				<div class="cta-select-members">
					<a href="<?php echo get_page_link( '1126' ); ?>" title="<?php echo get_the_title( '1126' ); ?>" class="waves-effect">ご希望の担当者に法律相談できます！</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
$page_member = ob_get_contents();
ob_end_clean();
$page_member = dtdsh_html_format( $page_member, false );
echo $page_member;
dtdsh_footer();