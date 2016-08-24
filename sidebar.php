<?php
global $wp_query;
$sidebarname = '0';
$curquer = $wp_query->get_queried_object();
if ( is_singular( 'cases' ) ) {
	$cat_data = wp_get_object_terms( $curquer->ID, 'cases-cat' );
	$cat_data = get_option( 'taxonomy_' . intval( $cat_data[0]->term_id ) );
	$sidebarname = $cat_data['rin_cat_sbar'];
	$sidebarname = ( $cat_data['rin_cat_sbar'] == '' ) ? 0 : $sidebarname;
} elseif ( is_singular( 'voice' ) ) {
	$cat_data = wp_get_object_terms( $curquer->ID, 'voice-cat' );
	$cat_data = get_option( 'taxonomy_'  . intval( $cat_data[0]->term_id ) );
	$sidebarname = $cat_data['rin_cat_sbar'];
	$sidebarname = ( $cat_data['rin_cat_sbar'] == '' ) ? 0 : $sidebarname;
} elseif ( is_post_type_archive( 'cases' ) ) {
	$sidebarname = 'casesarchive';
} elseif ( is_post_type_archive( 'voice' ) ) {
	$sidebarname = 'voicearchive';
} elseif ( is_archive() ) {
	$cat_data = get_option( 'taxonomy_' . intval( $curquer->term_id ) );
	$sidebarname = $cat_data['rin_cat_sbar'];
	$sidebarname = ( $cat_data['rin_cat_sbar'] == '' ) ? 0 : $sidebarname;
	if ( is_tax( 'cases-cat' ) || is_tax( 'cases-tag' ) ) {
		$sidebarname = ( $sidebarname !== '0' || $sidebarname !== null) ? $sidebarname : 'casesarchive';
	} elseif ( is_tax( 'voice-cat' ) || is_tax( 'voice-tag' ) ) {
		$sidebarname = ( $sidebarname == '0' || $sidebarname !== null) ? $sidebarname : 'voicearchive';
	}
} elseif ( is_page() || is_single() ) {
	$sidebarname 	= (get_post_meta( $curquer->ID, 'ringobox_sidebarnames', true) == '' ) ? 0 : get_post_meta( $curquer->ID, 'ringobox_sidebarnames', true);
}
$sidebarname = ( $sidebarname == '0' || $sidebarname == 'rin_sidebarmain' ) ? 'rin_sidebarmain' : 'rin_'.$sidebarname;
if ( is_active_sidebar( $sidebarname ) ) : ?>
<div class="side-bar">
	<?php dynamic_sidebar( $sidebarname ); ?>
</div>
<?php endif; ?>