</div><!-- #content-wrapper -->
<?php
if ( ! is_front_page() && ! is_singular( 'dtdsh-lp' ) ) :
?>
<div class="large-3 large-pull-9 column nav-scope"><?php dtdsh_dynamic_navmenu(); ?></div>
</div><!-- .row -->
<?php
endif;
if ( is_archive() || is_home() ) {
	dtdsh_paging();
}
?>
<footer class="footer" role="contentinfo">
	<?php include( TFRONT . 'fp-cta-link.php' ); ?>
	<div class="bg-red">
		<div class="row">
			<div class="column large-8 medium-12 large-text-left">
				<p class="footer-title bb1 border-white pl1"><i class="fa fa-sitemap"></i>サイトマップ</p>
				<div class="row pl1">
					<?php
						$scope_nav_args = array(
							'theme_location' => 'ringo-scopenav',
							'container' => false,
							'items_wrap' => '<ul class="color-white no-bullet large-6 column show-for-large">%3$s</ul>'
						);
						wp_nav_menu( $scope_nav_args );
					?>
					<?php
						$ft_nav_args = array(
							'theme_location' => 'ringo-footernav',
							'container' => false,
							'items_wrap' => '<ul class="color-white no-bullet large-6 column">%3$s</ul>'
						);
						wp_nav_menu( $ft_nav_args );
					?>
				</div>
			</div>
			<div class="column large-4 medium-12 large-text-left">
				<p class="footer-title bb1 border-white pl1"><i class="fa fa-building"></i>事務所情報</p>
				<p class="footer-title"><i class="fa fa-map-marker"></i>住所</p>
				<address class="ml1">
					<a href="https://goo.gl/maps/RJUDyMEpiND2" title="Googleマップを見る" target="_blank">広島県広島市中区上八丁堀4-27<br>上八丁堀ビル703</a>
				</address>
				<p class="footer-title"><i class="fa fa-phone"></i>電話番号</p>
				<p class="ml1"><a href="tel:0822230695" title="電話する">082-223-0695</a></p>
				<p class="footer-title"><i class="fa fa-fax"></i>FAX番号</p>
				<p class="ml1">082-223-2652</p>
				<p class="footer-title"><i class="fa fa-envelope"></i>メール</p>
				<p class="ml1"><a href="<?php echo DTDSH_HOME_URL, 'contact'; ?>">info@law-yamashita.com</a></p>
			</div>
			<div class="column small-12 text-center mt2 mb2 footer-sns">
				<a href="<?php echo home_url(); ?>" class="bg-teal btn-circle waves-effect"><i class="fa fa-home"></i></a>
				<a href="https://www.facebook.com/yamashitakolawoffice" class="btn-circle waves-effect bg-facebook" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="https://plus.google.com/118124010942091667362?hl=ja" class="btn-circle waves-effect bg-googleplus" target="_blank"><i class="fa fa-google-plus"></i></a>
				<a href="https://www.youtube.com/channel/UCQepvNppunUj6BSQgAtbx1g" class="btn-circle waves-effect bg-youtube" target="_blank"><i class="fa fa-youtube"></i></a>
				<a href="tel:0120783409" title="電話する" class="btn-circle bg-facebook"><i class="fa fa-phone"></i></a>
				<a href="<?php echo DTDSH_HOME_URL, 'contact'; ?>" title="お問い合わせ" class="btn-circle bg-pink"><i class="fa fa-envelope"></i></a>
				<a href="#PageTop" class="btn-circle waves-effect bg-lime"><i class="fa fa-angle-up"></i></a>
				<p class="footer-title">© <span itemprop="copyrightYear"><?php echo date( 'Y' ); ?></span> <?php echo DTDSH_SITENAME; ?></p>
			</div>
		</div>
	</div>
</footer>
<div id="btn-fixed-actions"><a href="#PageTop" title="<?php echo DTDSH_SITENAME; ?>" class="btn-circle bg-lime"><i class="fa fa-2x fa-angle-up"></i></a></div>
</div><!-- .off-canvas-content -->
</div><!-- .off-canvas-wrapper-inner -->
</div><!-- .off-canvas-wrapper -->
<?php
if ( is_page( '1189' ) ) :
?>
<div id="fb-root"></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/ja_KS/sdk.js#xfbml=1&version=v2.5&appId=1469026710042384"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
<?php
endif;
wp_footer();
?>
</body>
</html>
