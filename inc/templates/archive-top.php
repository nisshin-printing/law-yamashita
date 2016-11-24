<?php
/*
 * お客様の声限定
 */
if ( 'voice' === $post_type ) {
	echo '<div class="l-archive_hero"><img src="', TIMG, 'voice/voice-top.png" width="1024" height="450" alt="山下江法律事務所の口コミ・お客様の声"></div>';
}
/*
 * アーカイブページヘッダー部分
 */
echo
'<h2 class="l-archive_header">', $wp_query->found_posts, '件の', get_post_type_object( $post_type )->labels->name, 'を公開しています。</h2>';