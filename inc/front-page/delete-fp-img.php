<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>

<?php
/**
 * front image banner blocks
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



// format background color
$bg_col			=  (get_post_meta( $id, 'rin_maskcolor', true ) != '' )? 
					' background: ' .get_post_meta( $id, 'rin_maskcolor', true ) . ' '
					: ' background: #fff; ';





?>



<!-- START THE SECTION-->
<section class="rin_frontpage_img rin_frontpage_layout clearfix" style="<?php echo $bg_col; ?>">
	<ul>

	
		<!-- GET THE VALRIABLES FOR THE FIRST IMAGE-->
		<?php 
			if (get_post_meta( $id, 'rin_banimg1', true ) != '') { 
			$imgurl 	= get_post_meta( $id, 'rin_banimg1', true ); 
			$imid 		= rin_attachment_id_from_src ($imgurl);
			if ($imgurl !== '' && !isset($imid)) {
				$theimg1 = '<img src="' . $imgurl . '" alt="image">';
			} else {
			    $theimg1 = wp_get_attachment_image($imid,'rin_third');
			}
			$imtarg 	= get_post_meta( $id, 'rin_linktarg1', true ); 
			$linktarg 	= (get_post_meta( $id, 'rin_link1', true ) != '')? get_post_meta( $id, 'rin_link1', true ) : '' ;
		?> 

		<!-- SET THE HTML FOR THE FIRST IMAGE-->
		<li class="rin_fpage_img" data-rin-linker="<?php echo $linktarg; ?>" data-rin-linktarg="<?php echo $imtarg; ?>">
			<div class="rin_imginner">
			
				<?php echo $theimg1 ?>
				<div class="rin_img_textpart">
					<?php echo ringo_meta_part ($id, 'rin_title1', '<h2 class="rin_hp_header ' . $rin_animclass . '" ' .  $rin_anim  . ' >', '</h2>'); ?>
					<?php echo ringo_meta_part ($id, 'rin_subtitle1', '<h3 class="rin_hp_body rin_cust_bg ' . $rin_animclass . '"  ' .  $rin_anim  . ' >', '</h3>'); ?>
				</div>

			</div>

		</li>

		<?php } ?>



		<!-- GET THE VALRIABLES FOR THE SECOND IMAGE-->
		<?php 
			if (get_post_meta( $id, 'rin_banimg2', true ) != '') { 
			$imgurl 	= get_post_meta( $id, 'rin_banimg2', true ); 
			$imid 		= rin_attachment_id_from_src ($imgurl);
			if ($imgurl !== '' && !isset($imid)) {
				$theimg1 = '<img src="' . $imgurl . '" alt="image">';
			} else {
			    $theimg1 = wp_get_attachment_image($imid,'rin_third');
			}
			$imtarg 	= get_post_meta( $id, 'rin_linktarg2', true ); 
			$linktarg 	= (get_post_meta( $id, 'rin_link2', true ) != '')? get_post_meta( $id, 'rin_link2', true ) : '' ;
		?> 


		<!-- SET THE HTML FOR THE SECOND IMAGE-->
		<li class="rin_fpage_img" data-rin-linker="<?php echo $linktarg; ?>" data-rin-linktarg="<?php echo $imtarg; ?>">

			<div class="rin_imginner">
			
				<?php echo $theimg1 ?>
				<div class="rin_img_textpart">
					<?php echo ringo_meta_part ($id, 'rin_title2', '<h2 class="rin_hp_header ' . $rin_animclass . '"  ' .  $rin_anim  . '  data-rin-anim-delay="150">', '</h2>'); ?>
					<?php echo ringo_meta_part ($id, 'rin_subtitle2', '<h3 class="rin_hp_body rin_cust_bg ' . $rin_animclass . '"  ' .  $rin_anim  . '  data-rin-anim-delay="150">', '</h3>'); ?>
				</div>

			</div>

		</li>

		<?php } ?>



		<!-- GET THE VALRIABLES FOR THE THIRD IMAGE-->
		<?php 
			if (get_post_meta( $id, 'rin_banimg3', true ) != '') { 
			$imgurl 	= get_post_meta( $id, 'rin_banimg3', true ); 
			$imid 		= rin_attachment_id_from_src ($imgurl);
			if ($imgurl !== '' && !isset($imid)) {
				$theimg1 = '<img src="' . $imgurl . '" alt="image">';
			} else {
			    $theimg1 = wp_get_attachment_image($imid,'rin_third');
			}
			$imtarg 	= get_post_meta( $id, 'rin_linktarg3', true ); 
			$linktarg 	= (get_post_meta( $id, 'rin_link3', true ) != '')? get_post_meta( $id, 'rin_link3', true ) : '' ;
		?> 


		<!-- SET THE HTML FOR THE THIRD IMAGE-->
		<li class="rin_fpage_img" data-rin-linker="<?php echo $linktarg; ?>" data-rin-linktarg="<?php echo $imtarg; ?>">
			<div class="rin_imginner">
				<?php echo $theimg1 ?>
				<div class="rin_img_textpart">
					<?php echo ringo_meta_part ($id, 'rin_title3', '<h2 class="rin_hp_header ' . $rin_animclass . '"  ' .  $rin_anim  . ' data-rin-anim-delay="300">', '</h2>'); ?>
					<?php echo ringo_meta_part ($id, 'rin_subtitle3', '<h3 class="rin_hp_body rin_cust_bg ' . $rin_animclass . '"  ' .  $rin_anim  . '  data-rin-anim-delay="300">', '</h3>'); ?>
				</div>
			</div>
		</li>

		<?php } ?>
	
	</ul>
</section>
