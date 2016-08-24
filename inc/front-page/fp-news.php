<?php
$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 4,
	'post_status'    => 'publish'
);
$news = new WP_Query( $args );
if ( $news->have_posts() ) :
?>
<section class="fp-news">
	<div class="row">
		<div class="title-block large-4 column">
			<h2>最新情報<span>NEWS</span></h2>
			<a href="<?php echo DTDSH_HOME_URL, 'topics' ?>" class="fp-link-news waves-effect button hollow" title="一覧を見る"><i class="fa fa-list"></i>一覧を見る</a>
		</div>
		<ul class="large-8 column">
			<?php
				while ( $news->have_posts() ) : $news->the_post();
			?>
			<li>
				<time class="entry-date" datetime="<?php the_time('c'); ?>" itemprop="datePublished"><?php the_time('Y.m.d'); ?></time>
				<?php
					$cat = get_the_category();
					$cat = $cat[0];
				?>
				<a class="button waves-effect link-cat <?php echo $cat->category_nicename; ?>" href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->nat_name; ?>の一覧を見る"><?php echo $cat->cat_name; ?></a>
				<a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>を見る"><?php the_title(); ?></a>
			</li>
			<?php
				endwhile;
			?>
		</ul>
	</div>
</section>
<?php
endif;

