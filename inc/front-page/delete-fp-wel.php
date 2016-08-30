<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
// get the background image & process
$float_image 	= get_post_meta( $id, 'rin_layimage', true );
$bg 			= ($float_image != '')?  'style="background: #fff url('  .   $float_image  .   ') no-repeat top; background-size: cover;"'  : '' ;
// get & process the mask
$mask 			= get_post_meta( $id, 'rin_laymask', true );
$maskcolor		= get_post_meta( $id, 'rin_maskcolor', true );
$maskstyle   	= ($maskcolor != '')?  ' background: ' . $maskcolor . '; ' : ''  ;
$maskopacity 	= $maskstyle . ' opacity:   '   .   ($mask/100)  .  '; ';
// format the label
$link_src 			= get_post_meta( $id, 'rin_laylink', true );
$link_label 		= get_post_meta( $id, 'rin_laylabel', true );
$linkme 			= ($link_label != '' && $link_src != '')?  '<a href="' .  $link_src . '" class="rin_fpblog_linkme rin_cust_bg">' .  $link_label . '</a>':  '' ;
// format the categories and columns to display
$cats 				= get_post_meta( $id, 'rin_laycat', true );
$noposts 			= get_post_meta( $id, 'rin_newscolumn', true );
$columns			= 4;
$args 				= ($cats == 0)? array( 'numberposts' => ($noposts + 1)) : array( 'numberposts' => ($noposts + 1), 'category'    => $cats) ;
$latestnewsposts 	= get_posts( $args );
$ctr = 1;
// date controller
$ringo 				= get_option('ringosh');
$title 				= (get_post_meta( $id, 'rin_maintitle', true ) != '')?  '<h2 class="header-title">' . get_post_meta( $id, 'rin_maintitle', true ) . '</h2>' : ''  ;
$subtitle 			= (get_post_meta( $id, 'rin_subtitle', true ) != '')?  '<h6 class="header-subtitle">' . get_post_meta( $id, 'rin_subtitle', true ) . '</h6>' : ''  ;
// format the categories and columns to display
$pagetoshow 		= get_post_meta( $id, 'rin_laypage', true );
$ringo_pbtest 		= get_post_meta( $pagetoshow, 'ringobox_yesnobar', true );
?>
<section class="fp-wel column-3 <?php echo $classname; ?>">
	<div class="column-2-3">
		<div class="title-block">
			<?php echo html_entity_decode($title); ?>
			<?php echo html_entity_decode($subtitle); ?>
		</div>
		<div class="body-block">
		<?php
			if ($ringo_pbtest == 1) {
				get_ringox_pagebuilder($pagetoshow);
			} else {
				$p_cn 			= get_post($pagetoshow);
				$p_classes 		= get_post_class('', $pagetoshow);
				$p_classesout 	= '';
				foreach ($p_classes as $p_v) {
					$p_classesout .= $p_v . ' ';
				}
			?>
			<article id="page-<?php echo $pagetoshow; ?>" class="<?php echo $p_classesout; ?>">
				<div class="page-content">
					<?php echo apply_filters('the_content', $p_cn->post_content); ?>
				</div>
			</article>
		<?php } ?>
		</div>
	</div>
	<div class="column-1-3" <?php echo $bg; ?>></div>
</section>