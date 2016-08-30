<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>

<?php
/**
 * front page page link
 *
 *
 * @author 		Ringo
 * @package 	templates
 * @version     1.0
 */




// format the map components
$address			= get_post_meta( $id, 'rin_layaddr', true );
$height				= get_post_meta( $id, 'rin_layheight', true );
$lt					= get_post_meta( $id, 'rin_latt', true );
$lg					= get_post_meta( $id, 'rin_lng', true );
$zoom				= get_post_meta( $id, 'rin_zoom', true );



?>


<!-- start the section & add the foater -->
<section class="rin_frontpage_map rin_frontpage_layout">
	<?php echo do_shortcode( '[ringox-streetmap address="' . $address . '" height="' . $height . '" zoom="'  . $zoom .  '" lt="' . $lt . '"  lg="' .  $lg . '"]' ); ?>
</section>


