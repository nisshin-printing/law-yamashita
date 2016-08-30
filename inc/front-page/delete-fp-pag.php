<?php
	// File Security Check
	if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
	}
	// format the title
	$title = (get_post_meta( $id, 'rin_layhead1', true ) != '')? '<h2 class="text-center">' .  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_layhead1', true )))  . '</h2>' : '' ;
	// format the categories and columns to display
	$pagetoshow = get_post_meta( $id, 'rin_laycat', true );
	$ringo_pbtest = get_post_meta( $pagetoshow, 'ringobox_yesnobar', true );
?>
<section class="fp-page pt2 pb2 <?php echo $classname; ?>">
	<div class="row">
		<?php
		echo $title;
			if ($ringo_pbtest == 1) {
				get_ringox_pagebuilder($pagetoshow);
			} else { 
				$p_cn = get_post($pagetoshow);
				$p_classes = get_post_class('', $pagetoshow); 
				$p_classesout = '';
				foreach ($p_classes as $p_v) {
					$p_classesout .= $p_v . ' ';
				}
		?>
		<article id="post-<?php echo $pagetoshow; ?>" class="<?php echo $p_classesout; ?>">
			<div class="body-block">
				<?php echo apply_filters('the_content', $p_cn->post_content); ?>
			</div>
		</article>
		<?php } ?>
	</div>
</section>


