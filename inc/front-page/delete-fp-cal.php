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



// front page animation
$animarr 			= array('','none','bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','bounceO','fadeInRightBig','fadeInUp','fadeInUpBig','flip','flipInX','flipInY','Lightspeed','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','slideInDown','slideInLeft','slideInRight','hinge','rollIn');

$rin_anim  			=   (get_post_meta( $id, 'rin_anim', true ) != '' || get_post_meta( $id, 'rin_anim', true ) != 0 )? 
					'data-rin-anim-data="' . $animarr[get_post_meta( $id, 'rin_anim', true )] . '"' 
					: '';
				
$rin_animclass  	=   (get_post_meta( $id, 'rin_anim', true ) != '' || get_post_meta( $id, 'rin_anim', true ) != 0 )? 
					' animated ' 
					: '';





// format the title
$title 				= (get_post_meta( $id, 'rin_layhead', true ) != '')? '<h3 class="rin_cust_font rin_header">' .  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_layhead', true )))  . '</h3>' : '' ;



// format the content
$content 			= (get_post_meta( $id, 'rin_laycnt1', true ) != '')? '<p class="rin_intro">' .  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laycnt1', true )))  . '</p>' : '' ;




// format the label{
$link_src 			= get_post_meta( $id, 'rin_laylink', true );
$link_label 		= get_post_meta( $id, 'rin_laylabel', true );
$linkme 			= ($link_label != '' && $link_src != '')?  '<a href="' .  $link_src . '" class="rin_fpblog_linkme rin_cust_font">' .  $link_label . '</a>':  '' ;



// number of events to show
$eventstoshow 		= (get_post_meta( $id, 'rin_evtoshow', true )  != '')? get_post_meta( $id, 'rin_evtoshow', true ) : 0;

$op 				= ringox_fetch_upc_events($eventstoshow, $rin_anim, 200, $rin_animclass);


?>


<!-- start the section & add the foater -->
<section class="rin_frontpage_cal rin_frontpage_layout <?php echo $classname; ?>" >



	<!-- render the section -->
	<div class="row">
		<div class="large-12 columns <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?>>
				<?php echo $title; ?>
				<?php echo $content; ?>
				<?php echo $op; ?>
				<div class="rin_directional">
					<div class="rin_wprev"> <i class="icon-chevron-left rin_cust_bg"></i></div>
					<div class="rin_wnext"><i class="icon-chevron-right rin_cust_bg"></i></div>
				</div>
				<div class="splinkme">
					<?php echo $linkme; ?>
				</div>
		</div>
	</div>

</section>


