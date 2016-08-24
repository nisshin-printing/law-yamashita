<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Ringotheme ajax functions
 *
 *
 * @author   Ringotheme
 * @category  Core
 * @package  theme/inc
 * @version     1.0
 */




/**
 * Sort frontpage post order
 *
 * @access public
 * @return void
 */
function ringosh_update_fp_order() {

	
	if (!wp_verify_nonce($_POST['nonce'], 'ringo_themeadmin'))
	exit();
		$id 		= $_POST['idees'];
		$id 		= ltrim($id, "/");
		$arr_id 	= explode('/',$id);
		$arr_cnt 	= count($arr_id);
		for ($i = 1; $i <= $arr_cnt; $i++) {
			$b = $i - 1;
			update_post_meta($arr_id[$b], 'ringosh_post_order',$i);
		}
	die();
}
add_action( 'wp_ajax_ringosh_update_fp_order', 'ringosh_update_fp_order' );
?>
