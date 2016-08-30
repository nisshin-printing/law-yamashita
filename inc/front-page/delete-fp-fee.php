<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
?>

<?php
/**
 * front feedback on frontpage
 *
 *
 * @author 		Ringo
 * @package 	templates
 * @version     1.0
 */



$postarr = get_post_custom($id);


// front page animation
$rin_anim  		=   (isset($postarr['rin_anim'][0]) && $postarr['rin_anim'][0] != 0 )? 
					'data-rin-anim-data="' . $animarr[$postarr['rin_anim'][0]] . '"' : '';	
$rin_animclass  =   ($rin_anim != '' )? ' animated ' : '';




// get the details of the background image 
$float_image 	= get_post_meta( $id, 'rin_layimage', true );
$bg 			= ($float_image != '')?  'style="background: url('  .   $float_image  .   ') no-repeat center fixed; background-size: cover; position: static;"'  : '' ;



// get the details of the text color
$tx_cl 			= get_post_meta( $id, 'rin_textcolor', true );
$txt_col 		=  ($tx_cl != '')?  'style="color: '  .   $tx_cl  .   ';"'  : '' ;




// get & process the mask
$mask 			= get_post_meta( $id, 'rin_bgmask', true );
$maskcolor		= get_post_meta( $id, 'rin_bgcolor', true );
$maskstyle   	= ($maskcolor != '')?  ' background: ' . $maskcolor . '; ' : ''  ;
$maskopacity 	= $maskstyle . ' opacity:   '   .   ($mask/100)  .  '; ';


// get $ manage the main title 
$main_title 	= get_post_meta( $id, 'rin_layhead', true )? '<h2 class="rin_cust_font" ' .  $txt_col  . '>' .  stripslashes(html_entity_decode( get_post_meta( $id, 'rin_layhead', true ) ) ) . '</h2>' : '';




?>





<section class="rin_frontpage_fee rin_frontpage_srinll rin_frontpage_layout" <?php echo $bg; ?>>


	<div class="rin_fee_block">

		<div class="rin_prodmask" style="<?php echo $maskopacity; ?>"></div>
	

			<div class="row">
 

 
				<div class="large-12 columns  <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?>>

					<?php echo $main_title; ?>

					<ul class="ringox_tweets">

						<?php 

							for ($i=1; $i < 5 ; $i++) { 
								$img_meta 	= get_post_meta( $id, 'rin_quotimg' . $i , true );
								$quot_meta 	= get_post_meta( $id, 'rin_quotee' . $i , true );
								$cnt_meta 	= get_post_meta( $id, 'rin_laycnt' . $i , true );


								$img_htm 	= ($img_meta != '')? '<span class="rin_images"><img src="' . rin_get_thumbnail($img_meta)  . '" alt="image"></span>' :  '' ;
								$quot_htm 	= ($quot_meta != '')? '<span class="rin_quotees rin_cust_font">' .  stripslashes(html_entity_decode($quot_meta))  . '</span>' :  '' ;
								$cnt_htm 	= ($cnt_meta != '')? '<span class="rin_quotes" ' .  $txt_col  . '>' . stripslashes(html_entity_decode($cnt_meta))   . '</span>' :  '' ;

							if ($img_meta != '' || $quot_meta != '' || $cnt_meta != '') {

						?>

							<li>
								<?php echo $img_htm; ?>
								<?php echo $cnt_htm; ?>
								<?php echo $quot_htm; ?>

							</li>

						<?php
							}

							}

						?>

				</ul>

			</div>
		</div>
	</div>
</section>
