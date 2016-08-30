<?php
	// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}
	// get & process the mask
	// format the label
$link_src        = get_post_meta( $id, 'rin_laylink', true );
$link_label      = get_post_meta( $id, 'rin_laylabel', true );
$linkme          = ($link_label != '' && $link_src != '')?  '<a href="' .  $link_src . '" class="link-fp-news waves-effect button hollow" title="' .$link_label. '"><i class="fa fa-list"></i>' .  $link_label . '</a>':  '' ;
	// format the categories and columns to display
$cats            = get_post_meta( $id, 'rin_laycat', true );
$noposts         = 3;
$args            = ($cats == 0)? array( 'numberposts' => ($noposts + 1)) : array( 'numberposts' => ($noposts + 1), 'category'    => $cats) ;
$latestnewsposts = get_posts( $args );
$ctr             = 1;

$title = (get_post_meta( $id, 'rin_maintitle', true ) != '')?  '<h2>' . get_post_meta( $id, 'rin_maintitle', true ) . '</h2>' : ''  ;
?>
<section class="fp-news <?php echo $classname; ?>">
	<div class="row">
		<div class="title-block large-4 column">
			<?php echo html_entity_decode($title); ?>
			<?php echo $linkme; ?>
		</div>
		<ul class="large-8 column">
			<?php
				foreach($latestnewsposts as $post) {
					setup_postdata($post);
			?>
			<li>
				<time class="entry-date" datetime="<?php the_time('c'); ?>" itemprop="datePublished"><?php the_time('Y.m.d'); ?></time>
				<?php
					$cat = get_the_category();
					$cat = $cat[0];
				?>
				<a class="button waves-effect link-cat <?php echo $cat->category_nicename; ?>" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
				<a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>を見る"><?php the_title(); ?></a>
			</li>
			<?php
					$ctr++;
					wp_reset_postdata($post);
				}
			?>
		</ul>
	</div>
</section>


