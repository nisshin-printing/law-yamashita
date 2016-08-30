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

$userarray 		= array();


for ($i=1; $i < 7; $i++) { 
	if (get_post_meta( $id, 'rin_user' . $i , true ) != 0) {
		$userarray[] = get_post_meta( $id, 'rin_user' . $i , true );
	}
}



?>



<!-- START THE SECTION-->
<section class="rin_frontpage_peo rin_frontpage_layout">

	<ul>


	<?php 
	if (!empty($userarray)) { 

		foreach ($userarray as $value) {

			$userlargeimage = wp_get_attachment_image_src( get_user_meta( $value, 'rin_user_large_image', true ), 'full' );  

			$pastortitle 	= (get_the_author_meta( 'rin_user_designation', $value) != '')? '<h3 class="rin_cust_col rin_hp_body">' . stripslashes(html_entity_decode(get_the_author_meta( 'rin_user_designation', $value))) . '</h3>' : '' ;

			$pastordesc		= (get_the_author_meta( 'description', $value) != '')? '<p class="rin_hp_body">' . stripslashes(html_entity_decode(get_the_author_meta( 'description', $value))) . '</p>' : '' ;


	?>

		<li>
			<div class="rin_fppeo_outer">

				<div class="rin_fppeo_contentside">

				<h2 class="rin_hp_header"><?php echo get_the_author_meta( 'display_name', $value); ?></h2>
				<?php echo $pastortitle; ?>
				<?php echo $pastordesc; ?>


				</div>


				<div class="rin_fppeo_imageside" style="background: url(<?php echo $userlargeimage[0]; ?>) no-repeat center; background-size: cover;">



				</div>

			</div>

		</li>

	<?php } } ?>


	</ul>


</section>
