<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>

<?php
/**
 * front page paypal payments
 *
 *
 * @author 		Ringo
 * @package 	templates
 * @version     1.0
 */


// front page animation
$animarr 		= array('','none','bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','bounceO','fadeInRightBig','fadeInUp','fadeInUpBig','flip','flipInX','flipInY','Lightspeed','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','slideInDown','slideInLeft','slideInRight','hinge','rollIn');

$rin_anim  		=   (get_post_meta( $id, 'rin_anim', true ) != '' || get_post_meta( $id, 'rin_anim', true ) != 0 )? 
				'data-rin-anim-data="' . $animarr[get_post_meta( $id, 'rin_anim', true )] . '"' 
				: '';
				
$rin_animclass  =   (get_post_meta( $id, 'rin_anim', true ) != '' || get_post_meta( $id, 'rin_anim', true ) != 0 )? 
				' animated ' 
				: '';


$title 		= (get_post_meta( $id, 'rin_title', true ) != '')? '<h3 class="rin_hp_body">' . stripslashes(html_entity_decode(get_post_meta( $id, 'rin_title', true ))) . '</h3>' : '' ;
$desc		= (get_post_meta( $id, 'rin_subtitle', true ) != '')? '<p class="rin_hp_body">' . stripslashes(html_entity_decode(get_post_meta( $id, 'rin_subtitle', true ))) . '</p>' : '' ;


$min		= (get_post_meta( $id, 'rin_laymin', true ) != '')? get_post_meta( $id, 'rin_laymin', true ) : 0 ;
$max		= (get_post_meta( $id, 'rin_laymax', true ) != '')? get_post_meta( $id, 'rin_laymax', true ) : 100 ;
$def		= (get_post_meta( $id, 'rin_laydef', true ) != '')? get_post_meta( $id, 'rin_laydef', true ) : 20;
$sign		= (get_post_meta( $id, 'rin_currsign', true ) != '')? get_post_meta( $id, 'rin_currsign', true ) : '$' ;
$code		= (get_post_meta( $id, 'rin_currcode', true ) != '')? get_post_meta( $id, 'rin_currcode', true ) : 'USD' ;
$repeat		= (get_post_meta( $id, 'rin_repdon', true ) != '')? get_post_meta( $id, 'rin_repdon', true ) : 1 ;
$position	= (get_post_meta( $id, 'rin_currpos', true ) != '')? get_post_meta( $id, 'rin_currpos', true ) : 1 ;


?>


<!-- start the section & add the foater -->
<section class="rin_frontpage_pay <?php echo $classname; ?> <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?>>


	<!-- do the title & link -->
	<div class="blg_titlebg">
		<div class="row">
			<div class="large-12 columns">

				<?php echo $title; ?>

				<?php echo $desc; ?>
				
				<?php echo do_shortcode('[ringo-paypal min="' . $min . '" max="' . $max . '" def="' . $def . '" sign="' . $sign . '" curr="' . $code . '" repeat="' . $repeat . '" position="' . $position . '"]');  ?>
				
			</div>
		</div>
	</div>

</section>


