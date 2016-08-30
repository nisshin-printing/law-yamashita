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
$animarr 		= array('','none','bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','bounceO','fadeInRightBig','fadeInUp','fadeInUpBig','flip','flipInX','flipInY','Lightspeed','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','slideInDown','slideInLeft','slideInRight','hinge','rollIn');

$rin_anim  		=   (get_post_meta( $id, 'rin_anim', true ) != '' || get_post_meta( $id, 'rin_anim', true ) != 0 )? 
				'data-rin-anim-data="' . $animarr[get_post_meta( $id, 'rin_anim', true )] . '"' 
				: '';
				
$rin_animclass  =   (get_post_meta( $id, 'rin_anim', true ) != '' || get_post_meta( $id, 'rin_anim', true ) != 0 )? 
				' animated ' 
				: '';



// get the background image & process
$float_image 	= get_post_meta( $id, 'rin_layimage', true );
$bg 			= ($float_image != '')?  'style="background: url('  .   $float_image  .   ') no-repeat center top fixed; background-size: cover; position: static;overflow: hidden;"'  : '' ;


// get & process the mask
$mask 			= get_post_meta( $id, 'rin_laymask', true );
$maskcolor		= get_post_meta( $id, 'rin_maskcolor', true );
$maskstyle   	= ($maskcolor != '')?  ' background: ' . $maskcolor . '; ' : ''  ;
$maskopacity 	= $maskstyle . ' opacity:   '   .   ($mask/100)  .  '; ';



$textcol 		= (get_post_meta( $id, 'rin_laytxtcolor', true ) != '')?  ' color: ' . stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laytxtcolor', true ))). '; ' : ''  ;




// handle the title and content
$title 			= (get_post_meta( $id, 'rin_laytitle', true ) != '')?  '<h2 class="rin_hp_header" style="' . $textcol . '">' . stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laytitle', true ))). '</h2>' : ''  ;
$desc 			= (get_post_meta( $id, 'rin_laydesc', true ) != '')?  '<p class="rin_hp_body" style="' . $textcol . '">' . stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laydesc', true ))). '</p>' : ''  ;


// handle links
$link_dest 		= get_post_meta( $id, 'rin_laylink', true );
$link_label 	= get_post_meta( $id, 'rin_laylabel', true );
$link_label 	= ($link_label != '')? $link_label : '';
$linktext 		= ($link_dest != ''  && $link_label != '' )?  '<p class="rin_fp_linkp"><a href="' . $link_dest   . '" class="rin_cust_bg" >' . $link_label   . '</a></p>'  :  '';


// render complete page content
$page_content =  $title . $desc . $linktext;

?>


<!-- render the section and the background -->
<section class="rin_frontpage_ctb rin_frontpage_layout <?php echo $classname; ?> rin_parra" <?php echo $bg; ?> data-rin-parra="true">

	<div class="rin_ctb_block">

		<div class="rin_prodmask" style="<?php echo $maskopacity; ?>"></div>


		<div class="row">

			<div class="large-12 columns <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?> data-rin-anim-delay="400">
				<?php echo $page_content; ?>
			</div>

		</div>

	</div>

</section>


