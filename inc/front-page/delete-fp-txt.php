<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>

<?php
/**
 * Add 1 2 or three text columns
 *
 *
 * @author 		Ringo
 * @package 	templates
 * @version     1.0
 */

?>

<section class="rin_frontpage_txt rin_frontpage_layout <?php echo $classname; ?>">
	<div class="row">

<?php 

// determine the amount of columns that will be used
$col_used = 0;
for ($i=1; $i <4 ; $i++) { 
	$string_test = get_post_meta( $id, 'rin_layhead' . $i , true ) . get_post_meta( $id, 'rin_laycnt' . $i , true );
	$col_used = ($string_test != '')?  $col_used + 1 : $col_used;
}




// start with the loop to create the columns
if ($col_used >= 1) {
	for ($i=1; $i < ($col_used + 1) ; $i++) { 
		$laylink 		= get_post_meta( $id, 'rin_laylink' . $i , true );
		$laytarget 		= (get_post_meta( $id, 'rin_laytarget' . $i , true ) == '2')? ' target="_blank" ' : '';
		$linkbefore 	= ($laylink != '')?  '<a title="read more" ' . $laytarget . ' href="' .  $laylink   .    '">' : '';
		$linkafter 		= ($laylink != '')?  '</a>' : '';
?>


		<!-- write the loop parts -->
		<div class="large-<?php echo 12/$col_used; ?>  columns" data-srinllreveal>
			<?php echo ringo_meta_part ($id, 'rin_layhead' . $i , '<h4 class="rin_cust_font">' . $linkbefore, $linkafter . '</h4>'); ?>
			<?php echo ringo_meta_part ($id, 'rin_laycnt' . $i, '<p>' . $linkbefore, $linkafter . '</p>'); ?>
		</div>


<!--end the loops -->
<?php  }  } ?>

	</div>
</section>