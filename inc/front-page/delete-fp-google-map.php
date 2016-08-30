<?php
	// File Security Check
	if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
	}
?>
<section class="rin_frontpage_google-map rin_frontpage_layout rin-border-col">
<div id="rin-map" class="map" style="width: 100%; height: 400px;"></div>
</section>