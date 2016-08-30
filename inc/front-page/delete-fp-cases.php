<?php
	// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
// Get & Prosess the Background
$bgcolor = get_post_meta($id, 'rin_laybgcolor', true);
$bgcolstyle = ($bgcolor != '') ? 'style="background: ' .$bgcolor. ';"' : '';

	// format the label{
$link_label 		= get_post_meta( $id, 'rin_laylabel', true );
$linkme 			= ($link_label != '' && $link_src != '')?  '<a href="' . get_page_link( '490' ) .'" class="link-fp-cases waves-effect button expand" title="' .$link_label. '"><i class="fa fa-list mr1"></i>' .  $link_label . '</a>':  '' ;

	// format the categories and columns to display
$title 				= (get_post_meta( $id, 'rin_maintitle', true ) != '')?  '<h2 class="text-center">' . get_post_meta( $id, 'rin_maintitle', true ) . '</h2>' : ''  ;
?>
<section class="fp-cases <?php echo $classname; ?>" <?php echo $bgcolstyle; ?>>
	<?php echo html_entity_decode($title); ?>
	<div class="row">
		<div class="pr1 pl1 ml0 mr0 small-block-grid-1 medium-block-grid-2 large-block-grid-4">
		<?php
			cat_post_list('traffic-acc');
			cat_post_list('divorce');
			cat_post_list('inheritance');
			cat_post_list('debts');
			cat_post_list('criminal-case');
			cat_post_list('real-eatate');
			cat_post_list('corporation');
			cat_post_list('civil-case');
		?>
		</div>
		<?php echo $linkme; ?>
	</div>
</section>