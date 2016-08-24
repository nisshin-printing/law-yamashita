<?php
dtdsh_header();
ob_start();
include( TFRONT . 'fp-topheader.php' );
include( TFRONT . 'fp-news.php' );
include( TFRONT . 'fp-scope.php' );
include( TFRONT . 'fp-cta-link.php' );
include( TFRONT . 'fp-feature.php' );
include( TFRONT . 'fp-cta-link.php' );
include( TFRONT . 'fp-welcome-mess.php' );
include( TFRONT . 'fp-cases.php' );
include( TFRONT . 'fp-special-sites.php' );
$front = ob_get_contents();
ob_end_clean();
$front = dtdsh_html_format( $front, false );
echo $front;
dtdsh_footer();