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




$postarr = get_post_custom($id);


// front page animation
$rin_anim  		=   (isset($postarr['rin_anim'][0]) && $postarr['rin_anim'][0] != 0 )? 
					'data-rin-anim-data="' . $animarr[$postarr['rin_anim'][0]] . '"' : '';	
$rin_animclass  =   ($rin_anim != '' )? ' animated ' : '';




// get the background image & process
$bg_image 		= get_post_meta( $id, 'rin_backimg', true );
$bg 			= ($bg_image  != '')?  'style="background: url('  .   $bg_image   .   ') no-repeat center top fixed; background-size: cover;"'  : '' ;



// get & process the mask
$mask 			= get_post_meta( $id, 'rin_bgmask', true );
$maskcolor		= get_post_meta( $id, 'rin_bgcolor', true );
$maskstyle   	= ($maskcolor != '')?  ' background: ' . $maskcolor . '; ' : ''  ;
$maskopacity 	= $maskstyle . ' opacity:   '   .   ($mask/100)  .  '; ';




// format the title
$title 				= (get_post_meta( $id, 'rin_maintitle', true ) != '')? '<h3 class="rin_cust_font rin_header">' .  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_maintitle', true )))  . '</h3>' : '' ;



// format the content
$content		    = (get_post_meta( $id, 'rin_laydesc', true ) != '')? '<p class="rin_men_desc">' .  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laydesc', true )))  . '</p>' : '' ;





$menucnt = array();
$mencounter 	= 1;
// get the menuitems that's needed
for ($i=1; $i < 4 ; $i++) { 
	$menname 		= get_post_meta( $id, 'rin_laymen' . $i , true );
	$mentitle 		= ( stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laytitle' . $i , true ))) )?  '<h4 class="rin_cust_font">' .  stripslashes(html_entity_decode(get_post_meta( $id, 'rin_laytitle' . $i , true )))   . '</h4>' :  '' ; 
	$menucnt[$i] 	= array(
						'prices' 		=> json_decode(  rawurldecode( get_post_meta( $menname , 'ringox_foodmenu_price',true ))),
						'titles' 		=> json_decode(  rawurldecode( get_post_meta( $menname , 'ringox_foodmenu_title',true ))),
						'titling' 		=> $mentitle ,
						'background' 	=> stripslashes(html_entity_decode(get_post_meta( $id, 'rin_banimg' . $i , true )))
					);
}

?>


<!-- start the section & add the foater -->
<section class="rin_frontpage_fdm rin_frontpage_layout <?php echo $classname; ?>" <?php echo $bg; ?>>


	<div class="rin_fdm_block">
	

		<div class="rin_fdm_mask clearfix" style="<?php echo $maskopacity; ?>"></div>


		<!--  main title and content  -->
		<?php echo $title; ?>
		<?php echo $content; ?>

	

		<div class="fdm_outer">

		<?php  foreach ($menucnt as $v) {  ?>
			<div class="fdm_menu_part<?php echo $mencounter; ?> fdm_menu_col <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?>  data-rin-anim-delay="<?php echo  150*$mencounter ; ?>">


				<!-- render the menu outside -->
				<div class="rin_menu_inside">


					<!--  render the masks -->									
					<div class="rin_menu_backdrop" style="background: rgba(0,0,0,0.6);"></div>
					<div class="rin_menu_bkd_mask"></div>
					<div class="rin_menu_content">


						<!-- render the images and titles -->
						<?php $img_id  = rin_attachment_id_from_src ($v['background']); ?>
						<?php echo wp_get_attachment_image( $img_id , 'thumbnail' ); ?>
						<?php echo $v['titling']; ?>



						<!-- render the foodmenu items -->
						<ul>
						<?php for ($i=0; $i < count($v['prices']) ; $i++) { ?>


							<li class="clearfix">
								<span class="rin_menitem_title"><?php echo  stripslashes(html_entity_decode($v['titles'][$i]))  ; ?></span>
								<span class="rin_menitem_price rin_cust_font"><?php echo  stripslashes(html_entity_decode($v['prices'][$i])) ; ?></span>
							</li>
																							

						<?php }  ?>
						</ul>



					</div>
				</div>
			</div>
			<?php  $mencounter++;  }  ?>
		</div>
	</div>
</section>


