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


/** If woo commerce is not active, return nothing. **/
if ( class_exists( 'Woocommerce' ) ) {

global $woocommerce;



$postarr = get_post_custom($id);


// front page animation
$rin_anim  		=   (isset($postarr['rin_anim'][0]) && $postarr['rin_anim'][0] != 0 )? 
					'data-rin-anim-data="' . $animarr[$postarr['rin_anim'][0]] . '"' : '';	
$rin_animclass  =   ($rin_anim != '' )? ' animated ' : '';



/** Is there a floating image? **/
$float_image 			= get_post_meta( $id, 'rin_layimage', true );
$float_class 			= (get_post_meta( $id, 'rin_layimage', true ) != '')? 'rin_wsh_hasfloater' : '' ;


/** Prepare the title **/
$title_info 			= get_post_meta( $id, 'rin_laytitle', true );
$title 					= ($title_info != '')? '<h3 class="rin_cust_font rin_header">' .  stripslashes(html_entity_decode($title_info))  . '</h3>' : '' ;


/** Prepare the content **/
$content_info 			= get_post_meta( $id, 'rin_laydesc', true );
$content 				= ($content_info != '')? '<p class="rin_wsh_content">' .  stripslashes(html_entity_decode($content_info))  . '</p>' : '' ;



/** Prepare the store components **/
$category 				= get_post_meta( $id, 'rin_laycat', true );
$numbermeta 			= get_post_meta( $id, 'rin_laynumber', true );
$number 				= (is_numeric($numbermeta))?  $numbermeta  :   4;
$rin_ids_on_sale 		= woocommerce_get_product_ids_on_sale();
$rin_meta_query 		= $woocommerce->query->get_meta_query();

switch ($category) {
	case 1:
		$args = array(
			'post_type' 				=> 'product',
			'post_status' 				=> 'publish',
			'ignore_sticky_posts'   	=> 1,
			'posts_per_page' 			=> $number
		);
	break;

		case 2:
		$args = array(
			'post_status' 				=> 'publish',
			'post_type' 				=> 'product',
			'ignore_sticky_posts'   	=> 1,
			'meta_key' 					=> '_featured',
			'meta_value' 				=> 'yes',
			'posts_per_page' 			=> $number
		);
	break;

		case 3:
		$args = array(
			'posts_per_page' 			=> $number,
			'no_found_rows' 			=> 1,
			'post_status' 				=> 'publish',
			'post_type' 				=> 'product',
			'orderby' 					=> 'date',
			'order' 					=> 'ASC',
			'meta_query' 				=> $rin_meta_query,
			'post__in'					=> $rin_ids_on_sale 
		);
	break;

	case 4:
		$args = array(
			'post_type' 				=> 'product',
			'post_status' 				=> 'publish',
			'ignore_sticky_posts'   	=> 1,
			'posts_per_page' 			=> $number,
			'meta_key' 					=> 'total_sales',
			'orderby' 					=> 'meta_value'
         );
	break;

}


/** Prepare the link details **/
$rin_laylink 			= (get_post_meta( $id, 'rin_laylink', true ) != '')? get_post_meta( $id, 'rin_laylink', true ) :   0;
$linklabel 				= (get_post_meta( $id, 'rin_laylabel', true ) != '')? get_post_meta( $id, 'rin_laylabel', true )  : '' ;
$linkshop 				= ($rin_laylink == 1 && $linklabel != '') ?  '<p class="rin_productshoplink"><a class="rin_productspage_visitshop rin_cust_font" href="' . get_permalink(esc_attr( get_option('woocommerce_shop_page_id')))  . '">' . $linklabel   . '</a></p>' :  '';



/** Prepare the slider details **/
$rin_linkrand			= ringosh_randstring(5);
$rin_slide_sw 			= ($number >= 4)?   'rin_hashorslider' : ''  ;





?>

<!-- start hte woocommerce section -->
<section class="rin_frontpage_wsh rin_frontpage_layout <?php echo $classname; ?> <?php echo $float_class; ?>">


	<!-- add the content -->
	<?php if ($float_image  != '') { ?>
		<div class="floater rin_floaters" style="background: url(<?php echo $float_image; ?>) no-repeat center top fixed; background-size: cover;">
			&nbsp;
		</div>
	<?php } ?>



	<div class="wsh_titlebg">
		<div class="row">

			<?php echo $title; ?>

			<?php echo $content; ?>

		</div>

	</div>

	<!-- add the code foe the woocommerce loop -->
	<div class="row">

		<div class="large-12 columns <?php echo $rin_animclass; ?>" <?php echo $rin_anim; ?>>
			<ul class="rin_archiveprod rin_horslider <?php  echo $rin_slide_sw; ?>" data-rin-showslide="<?php  echo $rin_slide_sw; ?>" data-rin-linkstring="<?php echo $rin_linkrand; ?>" data-rin-maxslides="3" data-rin-maxwidth="325" data-rin-maxspacer="5">
				<?php $products = new WP_Query( $args );
					if ( $products->have_posts() ) :
						while ( $products->have_posts() ) : $products->the_post();
							woocommerce_get_template_part( 'content', 'product' ); 
						endwhile; 
					endif; 
				wp_reset_query();
			?>
			</ul>


			<div class="rin_shopdircol">
				<?php if ($number >= 4) { ?>
					<ul>
						<li class="<?php echo $rin_linkrand; ?>-linkleft"></li>
						<li class="<?php echo $rin_linkrand; ?>-linkright"></li>
					</ul>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</div>
		</div>
	</div>


	<?php echo $linkshop; ?>

</section>

<?php } ?>