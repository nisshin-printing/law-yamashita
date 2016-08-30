<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
	// get & process the mask
$mask 			= get_post_meta( $id, 'rin_laymask', true );
$maskcolor		= get_post_meta( $id, 'rin_maskcolor', true );
$maskstyle   	= ($maskcolor != '')?  ' background: ' . $maskcolor . '; ' : ''  ;
$maskopacity 	= $maskstyle . ' opacity:   '   .   ($mask/100)  .  '; ';
$textcol 		= (get_post_meta( $id, 'rin_textcolor', true ) != '')?  ' color: ' . stripslashes(html_entity_decode(get_post_meta( $id, 'rin_textcolor', true ))). '; ' : ''  ;
$rin_maintitle 	= (get_post_meta( $id, 'rin_maintitle', true ) != '')?  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_maintitle', true ))) : ''  ;
// handle links
$link_dest 		= get_post_meta( $id, 'rin_laylink', true );
$link_label 	= get_post_meta( $id, 'rin_laylabel', true );
$link_label 	= ($link_label != '')? $link_label : '';
$link_open = (get_post_meta($id, 'rin_linkopen', true) != '' || get_post_meta($id, 'rin_linkopen', true) == 1) ? ' target="_blank"' : '';
$linktext 		= ($link_dest != ''  && $link_label != '' )?  '<a href="' . $link_dest   . '" class="link-cta button waves-effect" '.$link_open.'>' . $link_label   . '</a>'  :  '';
?>
<section class="fp-cta" <?php echo $bg; ?>>
	<div class="bg-mask" style="<?php echo $maskopacity; ?>"></div>
	<div class="row valign-wrapper">
		<div class="cta-text valign" style="<?php echo $textcol; ?>">
			<?php echo $rin_maintitle; ?>
			<?php echo $linktext; ?>
		</div>
	</div>
</section>