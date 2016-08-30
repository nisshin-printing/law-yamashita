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



// background image & mask
$float_image 		= get_post_meta( $id, 'rin_layimage', true );
$mask 				= get_post_meta( $id, 'rin_laymask', true );
$maskcolor			= get_post_meta( $id, 'rin_maskcolor', true );
$maskstyle   		= ($maskcolor != '')?  ' background: ' . $maskcolor . '; ' : ''  ;
$maskopacity 		=  $maskstyle . ' opacity:   '   .   ($mask/100)  .  '; ';
$bg 				= ($float_image != '')?  'style="background: url('  .   $float_image  .   ') no-repeat center top fixed; background-size: cover; position: static;overflow: hidden;"'  : '' ;



// titles and content
$page_title 		= get_post_meta( $id, 'rin_pagetitle', true );
$title 				= ($page_title != '')?  '<h2 class="rin_cust_font">' . $page_title . '</h2>' : ''  ;



// twitter details
$num_tweets			= get_post_meta( $id, 'rin_numtweets', true );
$user_tweets		= get_post_meta( $id, 'rin_twitname', true );
$conskey_tweets		= get_post_meta( $id, 'rin_conskey', true );
$consecret_tweets	= get_post_meta( $id, 'rin_consecr', true );
$acctoken_tweets	= get_post_meta( $id, 'rin_acctoken', true );
$accsecret_tweets	= get_post_meta( $id, 'rin_accsecr', true );
$follabel_tweets 	= get_post_meta( $id, 'rin_follabel', true );



// link details
$link_dest 			= 'https://twitter.com/' . $user_tweets;
$link_label 		= get_post_meta( $id, 'rin_follabel', true );
$link_label 		= ($link_label != '')? $link_label : '';
$linktext 			= ($link_dest != '')?  '<p class="rin_fp_linkp"><a href="' . $link_dest   . '" class="rin_cust_bg" title="' . $link_label   . '" target="_blank">' . $link_label   . '</a></p>'  :  '';

?>


<!-- start the section -->
<section class="rin_frontpage_twi  rin_frontpage_scroll rin_frontpage_layout <?php echo $classname; ?>" <?php echo $bg; ?>>
	
	<div class="rin_twi_block">

		<div class="rin_prodmask" style="<?php echo $maskopacity; ?>"></div>

		<!-- content for twitter -->
		<div class="row">
			<div class="large-12 columns <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?>>
				<?php echo $title; ?>
				<?php echo do_shortcode( '[ringox-twitter username="' . $user_tweets . '" conskey="' . $conskey_tweets . '" consecret="'  . $consecret_tweets .  '" acctoken="'  . $acctoken_tweets .  '" accsecret="'  . $accsecret_tweets .  '" acclabel="'  . $follabel_tweets .  '"  tweetnum="'  . $num_tweets .  '"]' ); ?>
				<?php echo $linktext; ?>
			</div>
		</div>


	</div>

</section>


