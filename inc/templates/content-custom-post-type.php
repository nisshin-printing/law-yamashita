<?php
if ( is_single() ) :
	if ( is_singular( 'cases' ) ) {
		$post_type = 'cases';
		$cat = 'cases-cat';
		$tag = 'cases-tag';
	} elseif ( is_singular( 'voice' ) ) {
		$post_type = 'voice';
		$cat = 'voice-cat';
		$tag = 'voice-tag';
	}
	elseif ( is_singular( 'advice' ) ) {
		$post_type = 'advice';
		$cat = 'advice-cat';
		$tag = 'advice-tag';
	}
	if ( get_adjacent_post( false, '', true ) ) {
		$pre_post = get_previous_post();
		$pre_post_title = $pre_post->post_title;
		if ( mb_strlen( $pre_post_title ) > 10 ) {
			$pre_post_title = mb_substr( $pre_post_title, 0, 10 ) . '...';
		}
	}
	if ( get_adjacent_post( false, '', false ) ) {
		$next_post = get_next_post();
		$next_post_title = $next_post->post_title;
		if ( mb_strlen( $next_post_title ) > 10 ) {
			$next_post_title = mb_substr( $next_post_title, 0, 10 ) . '...';
		}
	}
?>
<article id="post-<?php the_ID(); ?>">
	<?php
		if ( $user_ID && get_post_meta( $post->ID, 'box_numbers', true ) ) {
			echo '<p class="meta-inbox"><i class="fa fa-inbox"></i>' . get_post_meta( $post->ID, 'box_numbers', true ) . '</p>';
		}
	?>
	<h1><?php the_title(); ?></h1>
	<?php get_template_part( 'inc/templates/social-buttons' ); ?>
	<ul class="post-meta">
		<li itemprop="datePublished" datetime="<?php the_time( 'c' ); ?>"><i class="fa fa-calendar"></i><?php the_time( 'Y年m月d日' ); ?><span class="count-text ml1">（<?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . '前'; ?>）</span></li>
		<li>
			<i class="fa fa-clock-o"></i>
			<?php
				$post_content = $post->post_content;
				$word = mb_strlen( strip_tags( $post_content ) );
				$m = floor( $word / 600 ) + 1;
				$est = ( $m == 0 ? '' : $m );
				echo $word . '文字数（所要時間';
				echo $est . '分）';
			?>
		</li>
		<li>
			<i class="fa fa-archive"></i>
			<?php the_terms( 0, $cat, 'カテゴリ : ', ' / '); ?>
		</li>
		<?php
			if ( has_term( '', $tag, $post ) ) {
				echo '<li><i class="fa fa-tags"></i>';
				echo the_terms( 0, $tag, 'タグ : ', ' / ' );
				echo '</li>';
			}
			$members = get_post_meta( $post->ID, 'charge_lawyer', true );
			if ( is_array( $members ) ) {
				echo '<li><i class="fa fa-user"></i>関連メンバー : ';
				foreach ( $members as $member ) {
					$post_status = get_post_status( $member );
					if ( 'publish' == $post_status ) {
						echo '<a href="' . get_permalink( $member ) . '" title="' . get_the_title( $member ) . '">' . get_the_title( $member ) . '</a>';
					}
				}
				echo '</li>';
				unset( $member );
			}
		?>
	</ul>
	<div class="content-post content-cases">
		<?php
			the_content();
		?>
	</div>
</article>
<div class="nav-prenext">
	<ul>
		<li>
			<?php
				if ( ! empty( $pre_post ) ) {
					echo '<a href="' . get_permalink( $pre_post->ID ) . '" title="' . $pre_post->post_title . '"><i class="fa fa-angle-left"></i><span class="show-for-medium">' . $pre_post_title . '</span></a>';
				}
			?>
		</li>
		<li>
			<a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>" title="<?php echo get_post_type_object( get_post_type() )->label; ?>"><i class="fa fa-file-text"></i><span class="block-for-small-up">一覧へ戻る</span></a>
		</li>
		<li>
			<?php
				if ( ! empty( $next_post ) ) {
					echo '<a href="' . get_permalink( $next_post->ID ) . '" title="' . $next_post->post_title . '"><span class="show-for-medium">' . $next_post_title . '</span><i class="fa fa-angle-right"></i></a>';
				}
			?>
		</li>
	</ul>
</div>
<?php
else:
	if ( is_post_type_archive( 'cases' ) || is_tax( 'cases-cat' ) ) {
		$tax = 'cases-cat';
	} elseif ( is_post_type_archive( 'client' ) || is_tax( 'client-cat' ) ) {
		$tax = 'client-cat';
	} elseif ( is_post_type_archive( 'advice' ) || is_tax( 'advice-cat' ) ) {
		$tax = 'advice-cat';
	} else {
		$tax = 0;
	}
?>
<article class="card post-list clearfix">
	<a class="waves-effect" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
	<?php
		if ( has_post_thumbnail() ) {
			$img_id = get_post_thumbnail_id();
			$img_src = wp_get_attachment_image_src( $img_id, true );
			echo '<figure class="card-img">';
			if ( $tax != 0 ) {
				the_terms( 0, $tax );
			}
			echo '<img src="' . $img_src[0] . '" alt="' . get_the_title() . '">';
			echo '</figure>';
		} else {
			echo '<p class="link-category clearfix">';
			if ( $tax != 0 ) {
				the_terms( 0, $tax );
			}
			if ( $user_ID && get_post_meta( $post->ID, 'box_numbers', true ) ) {
				echo '<span class="float-right"><i class="fa fa-inbox mr1"></i>' . get_post_meta( $post->ID, 'box_numbers', true ) . '</span>';
			}
			echo '</p>';
		}
	?>
	<div class="card-content">
		<p class="card-time">
			<time datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished"><?php the_time( 'Y.m.d' ); ?></time>
		</p>
		<p class="card-title color-black"><?php the_title(); ?></p>
	</div>
</article>
<?php
endif;